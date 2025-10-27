<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Postoffice_Model extends MY_Model {



    function __construct() {

        parent::__construct();

    }



    public function get_message_list($type, $department_idx = null,){



        $this->db->select('MR.*, M.*, S.school_name,PF.department_id,D.department,PF.role_id2,R.name AS rolename,PF.user_id2,DD.name AS dirname');

        $this->db->from('postoffice_relationships AS MR');

        $this->db->join('postoffice AS M', 'M.id = MR.message_id', 'left');

        $this->db->join('schools AS S', 'S.id = MR.school_id', 'left');

        $this->db->join('postoffice_forward AS PF', 'PF.message_id = MR.message_id', 'left');

        // $this->db->join('users AS U', 'U.id = MR.sender_id', 'left');

        $this->db->join('department AS D', 'D.id = PF.department_id', 'left'); //Join with department table

        $this->db->join('roles AS R', 'R.id = PF.role_id2', 'left');

        $this->db->join('department_dir AS DD', 'DD.user_id = PF.user_id2', 'left');


        if($type == 'draft'){

            $this->db->where('MR.status', 1);

            $this->db->where('MR.is_draft', 1);

            $this->db->where('MR.owner_id', logged_in_user_id());

            $this->db->where('MR.sender_id', logged_in_user_id());

        }

        if($type == 'inbox'){

            $department_idx = $this->session->userdata('department_id');
          //echo "<script>alert('" . $department_idx . "');</script>";

          $this->db->where('MR.is_trash', 0);
          //
          $this->db->where('MR.status', 1);


          if($department_idx !== null){
            $this->db->where('PF.department_id', $department_idx);

          }
          else{
            //
            $this->db->where('MR.owner_id', logged_in_user_id());
            //
            $this->db->where('MR.receiver_id', logged_in_user_id());
          }


        }

        if($type == 'new'){

            $this->db->where('MR.status', 1);

            $this->db->where('MR.owner_id', logged_in_user_id());

            $this->db->where('MR.is_read', 0);

            $this->db->where('MR.receiver_id', logged_in_user_id());

        }

        if($type == 'trash'){

            $this->db->where('MR.status', 1);

            $this->db->where('MR.is_trash', 1);

            $this->db->where('MR.owner_id', logged_in_user_id());

        }

        if($type == 'sent'){

            $this->db->where('MR.status', 1);

            $this->db->where('MR.is_draft', 0);

            $this->db->where('MR.is_trash', 0);

            $this->db->where('MR.sender_id', logged_in_user_id());

            $this->db->where('MR.owner_id', logged_in_user_id());

        }



        if($this->session->userdata('role_id') != SUPER_ADMIN){

            $this->db->where('MR.school_id', $this->session->userdata('school_id'));

        }

        $this->db->where('S.status', 1);

        return $this->db->get()->result();



    }



    public function get_single_message($id){

        $this->db->select('MR.*, M.*, S.school_name,PF.department_id,D.department');

        $this->db->from('postoffice_relationships AS MR');

        $this->db->join('postoffice AS M', 'M.id = MR.message_id', 'left');

        $this->db->join('schools AS S', 'S.id = MR.school_id', 'left');

        $this->db->join('postoffice_forward AS PF', 'PF.message_id = MR.message_id', 'left');

        $this->db->join('department AS D', 'D.id = PF.department_id', 'left'); //Join with department table

        $this->db->join('roles AS R', 'R.id = PF.role_id2', 'left');

        $this->db->join('department_dir AS DD', 'DD.user_id = PF.user_id2', 'left');

        $this->db->where('MR.message_id', $id);

        $this->db->where('MR.owner_id', logged_in_user_id());

        return $this->db->get()->row();

    }


           public function get_departmentadmin_list(){



            $this->db->select('SA.*, U.username, U.role_id, R.name AS role,D.department,SD.subdepartment');

            $this->db->from('department_dir AS SA');

            $this->db->join('users AS U', 'U.id = SA.user_id', 'left');

            $this->db->join('roles AS R', 'R.id = U.role_id', 'left');

            $this->db->join('department AS D', 'D.id = SA.department_id', 'left');

            $this->db->join('subdepartment AS SD', 'SD.department_id = D.id', 'left');

            return $this->db->get()->result();



        }

}

 //Department
