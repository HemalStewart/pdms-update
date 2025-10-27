<?php



if (!defined('BASEPATH')) exit('No direct script access allowed');

class Postoffice_Model extends MY_Model
{

  function __construct()
  {
    parent::__construct();
  }



//   public function get_single_message($id)
//   {

//     // $this->db->select('MR.*, M.*, S.school_name, RS.name AS sender_role,RR.name AS receiver_role,MR.modified_at AS modified_date');
//     // $this->db->select('MR.*, M.*, MR.school_id AS school_id, S.school_name, RS.name AS sender_role,RR.name AS receiver_role,MR.modified_at AS modified_date');
//     // $this->db->select('MR.*, M.*, MR.school_id AS school_id, S.school_name, RS.name AS sender_role, RR.name AS receiver_role, MR.modified_at AS modified_date');
    
//     $this->db->select('MR.*, M.*, MR.school_id AS school_id, S.school_name, RS.name AS sender_role, RR.name AS receiver_role, MR.modified_at AS modified_date');
//     $this->db->from('postoffice_relationships AS MR');
//     $this->db->join('postoffice AS M', 'M.id = MR.message_id', 'left');
//     $this->db->join('schools AS S', 'S.id = MR.school_id', 'left');
//     $this->db->join('postoffice_forward AS PF', 'PF.message_id = MR.message_id', 'left');
//     //$this->db->join('department AS D', 'D.id = PF.department_id', 'left'); //Join with department table
//     $this->db->join('roles AS RS', 'RS.id = MR.sender_role_id', 'left');
//     $this->db->join('roles AS RR', 'RR.id = MR.receiver_role_id', 'left');
//     //$this->db->join('department_dir AS DD', 'DD.user_id = PF.user_id2', 'left');
//     $this->db->where('MR.message_id', $id);

//     return $this->db->get()->row();
//   }


public function get_single_message($id)
{
    // Added M.completion_note and M.hold_note to the select statement
    $this->db->select('MR.*, M.*, M.completion_note, M.hold_note, MR.school_id AS school_id, S.school_name, RS.name AS sender_role, RR.name AS receiver_role, MR.modified_at AS modified_date');
    $this->db->from('postoffice_relationships AS MR');
    $this->db->join('postoffice AS M', 'M.id = MR.message_id', 'left');
    $this->db->join('schools AS S', 'S.id = MR.school_id', 'left');
    $this->db->join('postoffice_forward AS PF', 'PF.message_id = MR.message_id', 'left');
    $this->db->join('roles AS RS', 'RS.id = MR.sender_role_id', 'left');
    $this->db->join('roles AS RR', 'RR.id = MR.receiver_role_id', 'left');
    $this->db->where('MR.message_id', $id);
    return $this->db->get()->row();
}


  
  //Hemal
  public function get_pirivena_by_input($input)
  {
      $this->db->select('school_name, cencus_number');
      $this->db->from('schools');
      $this->db->group_start();
      
      //exact match
      //$this->db->where('cencus_number', $input);
      //$this->db->or_where('school_name', $input);

      $this->db->like('cencus_number', $input);
      $this->db->or_like('school_name', $input);

      $this->db->group_end();
      $query = $this->db->get();
      return $query->row();
  }


public function generate_letter_code() {
    $this->db->trans_start();

    // Lock the counter row to prevent two users from getting the same number
    $query = $this->db->query("SELECT last_number FROM letter_code_tracker WHERE id = 1 FOR UPDATE");
    $row = $query->row();
    $next_number = $row->last_number + 1;

    // Update the counter to the new number
    $this->db->where('id', 1);
    $this->db->update('letter_code_tracker', ['last_number' => $next_number]);

    $this->db->trans_complete();

    // Check if the transaction was successful before returning
    if ($this->db->trans_status() === FALSE) {
        log_message('error', 'Failed to generate a unique letter code.');
        return false; // Return false on failure
    }

    // Return the number formatted as an 8-digit string (e.g., 00000001)
    return str_pad($next_number, 8, '0', STR_PAD_LEFT);
}

public function get_message_history($message_id) {
    
    // Select all columns from postoffice_relationships, including the new 'note' column
    $this->db->select('pr.*');
    $this->db->from('postoffice_relationships AS pr');
    $this->db->where('pr.message_id', $message_id);
    
    // Only get the record where the owner is the sender.
    $this->db->where('pr.owner_id = pr.sender_id');
    
    $this->db->order_by('pr.created_at', 'ASC');
    $query = $this->db->get();
    
    return $query->result();
} 


public function get_incomplete_letters_report() {
    $this->db->select('P.*, S.school_name, U.username AS current_holder_username, R.name AS current_holder_role');
    $this->db->from('postoffice AS P');
    $this->db->join('schools AS S', 'S.id = P.school_id', 'left');
    $this->db->join('users AS U', 'U.id = P.receiver_id', 'left');
    $this->db->join('roles AS R', 'R.id = P.receiver_role_id', 'left');
    
    // An incomplete letter is one that is not a draft and has status = 1
    $this->db->where('P.status', 1);
    $this->db->where_not_in('P.id', '(SELECT message_id FROM postoffice_relationships WHERE is_draft = 1)', FALSE);

    $this->db->order_by('P.created_at', 'ASC');
    return $this->db->get()->result();
}


public function get_detailed_letter_report($start_date, $end_date)
{
    // Ensure the end date includes the entire day
    $end_date_adjusted = $end_date . ' 23:59:59';

    $this->db->select("
        P.id,
        P.letter_code,
        P.subject,
        P.created_at,
        P.status,
        P.created_by,
        P.receiver_id,
        P.receiver_role_id
    ");

    $this->db->from('postoffice AS P');
    
    $this->db->join(
        'postoffice_relationships AS PR_TRASH',
        'PR_TRASH.message_id = P.id AND (PR_TRASH.owner_id = P.created_by AND PR_TRASH.is_trash = 1)',
        'left'
    );
    
    $this->db->where('P.created_at >=', $start_date);
    $this->db->where('P.created_at <=', $end_date_adjusted);
    $this->db->where('P.parent_id', 0);
    $this->db->where('PR_TRASH.id IS NULL');

    $this->db->order_by('P.created_at', 'DESC');
    
    return $this->db->get()->result();
}

}



 //Department


 
