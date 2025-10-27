<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Postoffice extends MY_Controller
{
    public $data = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Postoffice_Model', 'message', true);
        $this->load->model('Ajax_Model', 'ajax', true);
        $this->load->helper('custom');
    }

    public function index()
    {
        $this->inbox();
    }
    
public function inbox()
{
    if (!$this->session->userdata('id')) {
        redirect('login');
    }

    $user_id = $this->session->userdata('id');

    $this->db->select('p.*, MAX(pr.is_read) AS is_read'); // Use MAX() to aggregate is_read
    $this->db->from('postoffice AS p');
    $this->db->join('postoffice_relationships AS pr', 'p.id = pr.message_id');

    $this->db->where('p.receiver_id', $user_id);
    $this->db->where('pr.owner_id', $user_id);
    $this->db->where('pr.is_draft', 0);
    $this->db->where('pr.is_trash', 0);
    
    $this->db->group_by('p.id'); // Group by the unique letter ID
    
    $this->db->order_by('p.created_at', 'DESC');
    $query = $this->db->get();

    $this->data['inboxs'] = $query->result();
    $this->data['inbox']  = TRUE;

    $this->layout->title($this->lang->line('inbox') . ' | ' . SMS);
    $this->layout->view('postoffice/inbox', $this->data);
}


public function sent()
{
    $this->load->library('session');
    $this->load->helper('url');
    
    $user_id = $this->session->userdata('id');
    $role_id = $this->session->userdata('role_id');
    
    $search_letter_code = $this->input->get('search_letter_code');
    $search_cencus_no = $this->input->get('search_cencus_no');

    $this->db->select('p.*');
    $this->db->from('postoffice AS p');
    
    if ($role_id == SUPER_ADMIN) {
        // SUPER ADMINS view: Show all letters that are not drafts or trashed by the creator.
        // This is a global view of all valid letters in the system.
        $this->db->join(
            'postoffice_relationships AS pr',
            'p.id = pr.message_id AND (pr.owner_id = p.created_by AND pr.is_trash = 1)',
            'left'
        );
        $this->db->where('pr.id IS NULL');
        $this->db->where_not_in('p.id', '(SELECT message_id FROM postoffice_relationships WHERE is_draft = 1)', FALSE);
        $this->db->where('p.parent_id', 0); // Only show original letters, not forwarded ones
        
    } elseif ($role_id == 31) { // Postman Role
        // Postman sees letters they CREATED, as long as their copy is not in the trash.
        $this->db->join('postoffice_relationships AS pr', 'p.id = pr.message_id');
        $this->db->where('p.created_by', $user_id);
        $this->db->where('pr.owner_id', $user_id);
        $this->db->where('pr.is_trash', 0);
        $this->db->where('pr.is_draft', 0);

    } else { // Normal User
        // Normal users see letters they SENT (forwarded), as long as their copy is not in the trash.
        $this->db->join('postoffice_relationships AS pr', 'p.id = pr.message_id');
        $this->db->where('pr.sender_id', $user_id); 
        $this->db->where('pr.owner_id', $user_id);
        $this->db->where('pr.is_trash', 0);
        $this->db->where('pr.is_draft', 0);
    }
    
    if (!empty($search_letter_code)) {
        $this->db->like('p.letter_code', $search_letter_code);
    }
    if (!empty($search_cencus_no)) {
        $this->db->like('p.cencus_no', $search_cencus_no);
    }

    $this->db->group_by('p.id');
    $this->db->order_by('p.id', 'DESC');
    $query = $this->db->get();

    $this->data['sents'] = $query->result();
    $this->data['search_letter_code'] = $search_letter_code;
    $this->data['search_cencus_no'] = $search_cencus_no;
    $this->data['sent'] = TRUE;

    $this->layout->title($this->lang->line('send') . ' | ' . SMS);
    $this->layout->view('postoffice/sent', $this->data);
}
    // public function compose($id = null)
    // {

    //     if ($_POST) {
    //         $data = array();
    //         $letter_from_piriven = (int) $this->input->post('letter_from_piriven');
    //         $data['letter_from_piriven'] = $letter_from_piriven;

    //         if ($letter_from_piriven === 1) {
    //             $data['sender_name'] = $this->input->post('school_name');
    //         } else {
    //             $data['sender_name'] = $this->input->post('sender_name');
    //         }

    //         $data['school_id'] = $this->input->post('school_id');
    //         $data['subject'] = $this->input->post('subject');
    //         $data['cencus_no'] = $this->input->post('cencus_no');
    //         $data['sender_role_id'] = $this->input->post('sender_role_id');
    //         $data['sender_id'] = $this->input->post('sender_id');
    //         $data['receiver_role_id'] = $this->input->post('receiver_role_id');
    //         $data['receiver_id'] = $this->input->post('receiver_id');
    //         $data['body'] = nl2br($this->input->post('body'));
            
    //         $letter_code = $this->message->generate_letter_code();
    //         if ($letter_code === false) {
    //             error('Could not generate a unique letter code. Please try again.');
    //             redirect('postoffice/compose');
    //             return;
    //         }
    //         $data['letter_code'] = $letter_code;

    //         $data['status'] = 1;
    //         $data['created_at'] = date('Y-m-d H:i:s');
    //         $data['modified_at'] = date('Y-m-d H:i:s');
    //         $data['created_by'] = logged_in_user_id();
            
    //         $message_id = $this->message->insert('postoffice', $data);

    //         $relation_data = array();
    //         $relation_data['message_id'] = $message_id;
    //         $relation_data['letter_code'] = $letter_code;
    //         $relation_data['school_id'] = $data['school_id'];
    //         $relation_data['sender_id'] = $this->input->post('sender_id');
    //         $relation_data['receiver_id'] = $this->input->post('receiver_id');
    //         $relation_data['sender_role_id'] = $this->input->post('sender_role_id');
    //         $relation_data['receiver_role_id'] = $this->input->post('receiver_role_id');
    //         $relation_data['status'] = 1;
    //         $relation_data['created_at'] = date('Y-m-d H:i:s');
    //         $relation_data['created_by'] = logged_in_user_id();

    //         if (isset($_POST['draft'])) {
    //             $relation_data['owner_id'] = logged_in_user_id();
    //             $relation_data['is_draft'] = 1;
    //             $relation_data['is_read'] = 1;
    //             $this->message->insert('postoffice_relationships', $relation_data);
    //             success($this->lang->line('insert_success'));
    //             redirect('postoffice/draft');
    //         } else {
    //             $sender_copy = $relation_data;
    //             $sender_copy['owner_id'] = logged_in_user_id();
    //             $sender_copy['is_draft'] = 0;
    //             $sender_copy['is_read'] = 1;
    //             $this->message->insert('postoffice_relationships', $sender_copy);

    //             $receiver_copy = $relation_data;
    //             $receiver_copy['owner_id'] = $this->input->post('receiver_id');
    //             $receiver_copy['is_draft'] = 0;
    //             $receiver_copy['is_read'] = 0; 
    //             $this->message->insert('postoffice_relationships', $receiver_copy);

    //             $this->session->set_flashdata('success', 'Message posted successfully! Your letter code is: <strong>' . $letter_code . '</strong>');
    //             redirect('postoffice/sent');
    //         }
    //     }

    //     $this->data['roles'] = $this->message->get_list('roles', array('status' => 1), '', '', '', 'id', 'ASC');
    //     $this->data['schools'] = get_school_list();
    //     $this->layout->title($this->lang->line('compose') . ' | ' . SMS);
    //     $this->layout->view('postoffice/compose', $this->data);
    // }

public function compose($id = null)
{
    $this->load->helper('custom');
    
    if ($_POST) {
        $data = array();
        
        // Check if the submission is a Memo
        if ($this->input->post('is_memo')) {
            // --- MEMO-SPECIFIC LOGIC ---
            $data['is_memo'] = 1;
            
            // Sender details from the memo form
            $data['sender_role_id'] = $this->input->post('memo_from_role_id');
            $data['sender_id'] = $this->input->post('memo_from_user_id');
            
            // Receiver details from the memo form
            $data['receiver_role_id'] = $this->input->post('memo_to_role_id');
            $data['receiver_id'] = $this->input->post('memo_to_user_id');

            // Set letter details based on memo inputs
            $data['letter_from_piriven'] = 0;
            $data['sender_name'] = get_user_name_by_id($data['sender_id'])->name;
            $data['school_id'] = $this->session->userdata('school_id'); 
            $data['subject'] = $this->input->post('subject');
            $data['body'] = nl2br($this->input->post('body'));
            $data['cencus_no'] = ''; 
            
        } else {
            // --- STANDARD LETTER LOGIC ---
            $data['is_memo'] = 0;
            
            $letter_from_piriven = (int) $this->input->post('letter_from_piriven');
            $data['letter_from_piriven'] = $letter_from_piriven;

            if ($letter_from_piriven === 1) {
                $data['sender_name'] = $this->input->post('school_name');
                $data['school_id'] = $this->input->post('school_id');
                $data['sender_role_id'] = $this->input->post('sender_role_id');
                $data['sender_id'] = $this->input->post('sender_id');
            } else {
                $data['sender_name'] = $this->input->post('sender_name');
                $data['sender_role_id'] = $this->session->userdata('role_id'); 
                $data['sender_id'] = $this->session->userdata('id');
                $data['school_id'] = $this->session->userdata('school_id');
            }

            $data['subject'] = $this->input->post('subject');
            $data['cencus_no'] = $this->input->post('cencus_no');
            $data['receiver_role_id'] = $this->input->post('receiver_role_id');
            $data['receiver_id'] = $this->input->post('receiver_id');
            $data['body'] = nl2br($this->input->post('body'));
        }

        // --- COMMON LOGIC FOR BOTH MEMO AND LETTERS ---
        $letter_code = $this->message->generate_letter_code();
        if ($letter_code === false) {
            error('Could not generate a unique letter code. Please try again.');
            redirect('postoffice/compose');
            return;
        }
        $data['letter_code'] = $letter_code;

        $data['status'] = 1;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['modified_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = logged_in_user_id();
        
        $message_id = $this->message->insert('postoffice', $data);

        $relation_data = array();
        $relation_data['message_id'] = $message_id;
        $relation_data['letter_code'] = $letter_code;
        $relation_data['school_id'] = isset($data['school_id']) ? $data['school_id'] : null;
        $relation_data['sender_id'] = $data['sender_id'];
        $relation_data['receiver_id'] = $data['receiver_id'];
        $relation_data['sender_role_id'] = $data['sender_role_id'];
        $relation_data['receiver_role_id'] = $data['receiver_role_id'];
        $relation_data['status'] = 1;
        $relation_data['created_at'] = date('Y-m-d H:i:s');
        $relation_data['created_by'] = logged_in_user_id();

        if (isset($_POST['draft'])) {
            $relation_data['owner_id'] = logged_in_user_id();
            $relation_data['is_draft'] = 1;
            $relation_data['is_read'] = 1;
            $this->message->insert('postoffice_relationships', $relation_data);
            success($this->lang->line('insert_success'));
            redirect('postoffice/draft');
        } else {
            $sender_copy = $relation_data;
            $sender_copy['owner_id'] = logged_in_user_id();
            $sender_copy['is_draft'] = 0;
            $sender_copy['is_read'] = 1;
            $this->message->insert('postoffice_relationships', $sender_copy);

            $receiver_copy = $relation_data;
            $receiver_copy['owner_id'] = $data['receiver_id'];
            $receiver_copy['is_draft'] = 0;
            $receiver_copy['is_read'] = 0; 
            $this->message->insert('postoffice_relationships', $receiver_copy);

            $this->session->set_flashdata('success', 'Message posted successfully! Your letter code is: <strong>' . $letter_code . '</strong>');
            redirect('postoffice/sent');
        }
    }

    $this->data['roles'] = $this->message->get_list('roles', array('status' => 1), '', '', '', 'id', 'ASC');
    $this->data['schools'] = get_school_list();
    $this->layout->title($this->lang->line('compose') . ' | ' . SMS);
    $this->layout->view('postoffice/compose', $this->data);
}

public function forward($id = null)
{
    // check_permission(ADD);

    $original_message = $this->message->get_single('postoffice', array('id' => $id));
    if ($original_message && $original_message->status == 0) {
        error('This letter has been marked as complete and cannot be forwarded.');
        redirect('postoffice/view/' . $id);
        return; // Stop the function
    }

    if (isset($_POST['forwards'])) {
        $original_message_id = $id;
        $original_message = $this->message->get_single('postoffice', array('id' => $original_message_id));
        $note = nl2br($this->input->post('body1'));
        
        $update_data = array();
        $update_data['receiver_id'] = $this->input->post('user_id2');
        $update_data['receiver_role_id'] = $this->input->post('role_id2');
        $update_data['modified_at'] = date('Y-m-d H:i:s');
        $this->message->update('postoffice', $update_data, array('id' => $original_message_id));
        
        // Sender's copy
        $sender_relation = array();
        $sender_relation['message_id'] = $original_message_id;
        $sender_relation['letter_code'] = $original_message->letter_code;
        $sender_relation['owner_id'] = logged_in_user_id();
        $sender_relation['sender_id'] = logged_in_user_id();
        $sender_relation['receiver_id'] = $this->input->post('user_id2');
        $sender_relation['is_read'] = 1;
        $sender_relation['status'] = 1;
        $sender_relation['created_at'] = date('Y-m-d H:i:s'); // ADDED LINE
        $sender_relation['created_by'] = logged_in_user_id();
        $sender_relation['note'] = $note;
        $this->message->insert('postoffice_relationships', $sender_relation);

        // Recipient's copy
        $receiver_relation = array();
        $receiver_relation['message_id'] = $original_message_id;
        $receiver_relation['letter_code'] = $original_message->letter_code;
        $receiver_relation['owner_id'] = $this->input->post('user_id2');
        $receiver_relation['sender_id'] = logged_in_user_id();
        $receiver_relation['receiver_id'] = $this->input->post('user_id2');
        $receiver_relation['is_read'] = 0;
        $receiver_relation['status'] = 1;
        $receiver_relation['created_at'] = date('Y-m-d H:i:s'); // ADDED LINE
        $receiver_relation['created_by'] = logged_in_user_id();
        $receiver_relation['note'] = $note;
        $this->message->insert('postoffice_relationships', $receiver_relation);
        
        success($this->lang->line('insert_success'));
        redirect('postoffice/inbox');
    }
    redirect('postoffice/inbox');
}

    public function view($id = null)
    {

        if ($id) {
            $this->data['message'] = $this->message->get_single_message($id);
            if ($this->data['message']) {
                 $this->message->update('postoffice_relationships', array('is_read' => 1), array('message_id' => $id, 'owner_id' => logged_in_user_id()));
                 $this->data['history'] = $this->message->get_message_history($id);
            }

            $this->data['forwards'] = $this->message->get_list('postoffice', array('parent_id' => $id), '', '', '', 'id', 'ASC');
            $this->data['roles'] = $this->message->get_list('roles', array('status' => 1), '', '', '', 'id', 'ASC');
            
            $school_id_context = (isset($this->data['message']->school_id) && $this->data['message']->school_id > 0) ? $this->data['message']->school_id : $this->session->userdata('school_id');

            if (!$school_id_context || $school_id_context == 0) {
                $this->data['show_school_selector'] = true;
                $this->data['schools'] = $this->message->get_list('schools', array('status'=>1), '', '', '', 'school_name', 'ASC');
            } else {
                $this->data['show_school_selector'] = false;
            }
        }
        $this->data['view'] = TRUE;
        $this->layout->title($this->lang->line('read_message') . ' | ' . SMS);
        $this->layout->view('postoffice/view', $this->data);
    }
    
    public function delete($id = null)
    {

        check_permission(DELETE);
        if ($id) {
            // Move the user's copy of the message to trash instead of deleting
            $this->message->update('postoffice_relationships', ['is_trash' => 1], ['message_id' => $id, 'owner_id' => logged_in_user_id()]);
            success($this->lang->line('delete_success'));
        }
        redirect('postoffice/inbox');
    }

    public function draft()
    {

        check_permission(VIEW);
        
        $this->db->select('p.*');
        $this->db->from('postoffice_relationships AS pr');
        $this->db->join('postoffice AS p', 'p.id = pr.message_id', 'left');
        $this->db->where('pr.owner_id', logged_in_user_id());
        $this->db->where('pr.is_draft', 1);
        $this->db->where('pr.is_trash', 0);
        $this->db->order_by('p.modified_at', 'DESC');
        $this->data['drafts'] = $this->db->get()->result();

        $this->data['draft'] = TRUE;
        $this->layout->title($this->lang->line('draft') . ' | ' . SMS);
        $this->layout->view('postoffice/draft', $this->data);
    }

    public function trash()
    {

        check_permission(VIEW);

        // This query loads all trashed items specifically for the current user
        $this->db->select('p.*');
        $this->db->from('postoffice_relationships AS pr');
        $this->db->join('postoffice AS p', 'p.id = pr.message_id', 'left');
        $this->db->where('pr.owner_id', logged_in_user_id());
        $this->db->where('pr.is_trash', 1);
        $this->db->order_by('p.modified_at', 'DESC');
        $this->data['trashs'] = $this->db->get()->result();

        $this->data['trash'] = TRUE;
        $this->layout->title($this->lang->line('trash') . ' | ' . SMS);
        
        $this->layout->view('postoffice/trash', $this->data);
    }

    public function report()
    {
        // List the role IDs that should have access to the report.
        // Assuming SUPER_ADMIN is a constant, and Postman is 31 and Director-Ministry is 26.
        $allowed_roles = [SUPER_ADMIN, 31, 30];

        // Check if the current user's role ID is NOT in the list of allowed roles.
        if (!in_array($this->session->userdata('role_id'), $allowed_roles)) {
            redirect('dashboard/index');
        }

        $this->data['report_data'] = NULL;
        $this->data['start_date'] = NULL;
        $this->data['end_date'] = NULL;

        if ($_POST) {
            $start_date_input = $this->input->post('start_date');
            $end_date_input = $this->input->post('end_date');

            if ($start_date_input && $end_date_input) {
                
                $start_date_db = date('Y-m-d', strtotime($start_date_input));
                $end_date_db = date('Y-m-d', strtotime($end_date_input));
                
                $this->data['report_data'] = $this->message->get_detailed_letter_report($start_date_db, $end_date_db);
                
                $this->data['start_date'] = $start_date_input;
                $this->data['end_date'] = $end_date_input;
            }
        }
        
        $this->data['report'] = TRUE; // To set the sidebar link as active

        $this->layout->title("Detailed Letter Report | " . SMS);
        $this->layout->view('postoffice/report', $this->data);
    }
        
    public function get_users_by_role()
    {
        $role_id = $this->input->post('role_id');

        if (!$role_id) {
            echo '<option value="">--Select--</option>';
            return;
        }

        $this->db->select("U.id, CASE WHEN D.id IS NOT NULL THEN D.name WHEN T.id IS NOT NULL THEN T.name WHEN G.id IS NOT NULL THEN G.name ELSE U.username END AS full_name", false);
        $this->db->from('users AS U');
        $this->db->join('department_dir AS D', 'D.user_id = U.id', 'left');
        $this->db->join('teachers AS T', 'T.user_id = U.id', 'left');
        $this->db->join('guardians AS G', 'G.user_id = U.id', 'left');
        $this->db->where('U.role_id', $role_id);
        $this->db->where('U.status', 1);
        $this->db->order_by('full_name', 'ASC');

        $query = $this->db->get();
        $users = $query->result();

        $str = '<option value="">-- ' . $this->lang->line('select') . ' --</option>';
        if (!empty($users)) {
            foreach ($users as $user) {
                $str .= '<option value="' . htmlspecialchars($user->id) . '">' . htmlspecialchars($user->full_name) . '</option>';
            }
        }
        echo $str;
    }
    
    public function fetch_pirivena_data()
    {
        $value = $this->input->post('value');
        $this->db->select('id, school_name, cencus_number');
        $this->db->from('schools');
        $this->db->group_start();
        $this->db->like('school_name', $value);
        $this->db->or_like('cencus_number', $value);
        $this->db->group_end();
        $this->db->where('status', 1);
        $result = $this->db->get()->row();

        if ($result) {
            echo json_encode($result);
        } else {
            echo json_encode(null);
        }
    }

    public function hold_letter($id = null)
    {
        if (!$this->input->is_ajax_request()) {
            if ($_POST) {
                $message_id = $id;
                $hold_note = $this->input->post('hold_note');

                // Set the status to 2 for 'On Hold' and add the hold note
                $update_data = [
                    'status' => 2,
                    'hold_note' => $hold_note,
                    'modified_at' => date('Y-m-d H:i:s'),
                ];

                $this->message->update('postoffice', $update_data, ['id' => $message_id]);

                // Update all related records to 'On Hold' status
                $this->message->update('postoffice_relationships', ['status' => 2], ['message_id' => $message_id]);

                success('The letter has been put on hold successfully!');
            }
        }
        redirect('postoffice/view/' . $id);
    }

    // Add this new function to your Postoffice controller
    public function unhold_letter($id = null)
    {
        if ($_POST) {
            $message_id = $id;
            $unhold_note = $this->input->post('unhold_note');

            // Set the status back to 1 for 'Active' and add the un-hold note
            $update_data = [
                'status' => 1,
                'unhold_note' => $unhold_note,
                'modified_at' => date('Y-m-d H:i:s'),
            ];
            $this->message->update('postoffice', $update_data, ['id' => $message_id]);

            // Update all related records to 'Active' status as well
            $this->message->update('postoffice_relationships', ['status' => 1], ['message_id' => $message_id]);

            success('The letter has been resumed successfully!');
            redirect('postoffice/view/' . $id);
        }
        // If somehow a GET request hits this, just redirect
        redirect('postoffice/view/' . $id);
    }

    public function complete_job($id = null)
    {
        if ($id) {
            // Get the completion note from the form input
            $completion_note = $this->input->post('completion_note');

            // Update the main 'postoffice' table with status and completion note
            $this->message->update(
                'postoffice', 
                ['status' => 0, 'completion_note' => $completion_note], // Added completion_note here
                ['id' => $id]
            );

            // Update status in relationships table as well
            $this->message->update('postoffice_relationships', ['status' => 0], ['message_id' => $id]);

            success('The letter has been marked as complete.');
        }
        redirect('postoffice/inbox');
    }

    public function move_to_trash($message_id = null)
    {
        if ($message_id) {
            $user_id = logged_in_user_id();

            // Get the original message to check who created it
            $message = $this->message->get_single('postoffice', array('id' => $message_id));

            // Check if the current user is the original creator of the letter
            if ($message && $message->created_by == $user_id) {
                
                // --- CREATOR'S ACTION: RECALL FOR EVERYONE ---
                // Update all relationship records for this message_id
                $this->message->update(
                    'postoffice_relationships', 
                    ['is_trash' => 1], 
                    ['message_id' => $message_id]
                );
                success('Letter has been recalled and moved to trash for all recipients.');

            } else {
                
                // --- RECIPIENT'S ACTION: TRASH FOR SELF ONLY ---
                $this->message->update(
                    'postoffice_relationships', 
                    ['is_trash' => 1], 
                    ['message_id' => $message_id, 'owner_id' => $user_id]
                );
                success('Message moved to your trash successfully.');
            }
        }
        // Redirect back to the page the user was on
        redirect($_SERVER['HTTP_REFERER'] ? $_SERVER['HTTP_REFERER'] : 'postoffice/sent');
    }

}