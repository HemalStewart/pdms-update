<?php



/*

 * To change this license header, choose License Headers in Project Properties.

 * To change this template file, choose Tools | Templates

 * and open the template in the editor.

 */



/**

 * Description of Auth_Model

 *

 * @author

 */

if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Auth_Model extends MY_Model {



    function __construct() {

        parent::__construct();

    }



    public function get_single_student($user_id){



        $this->db->select('S.*, E.roll_no, E.class_id, E.section_id, U.role_id,  C.name AS class_name, SE.name AS section');

        $this->db->from('enrollments AS E');

        $this->db->join('students AS S', 'S.id = E.student_id', 'left');

        $this->db->join('users AS U', 'U.id = S.user_id', 'left');

        $this->db->join('classes AS C', 'C.id = E.class_id', 'left');

        $this->db->join('sections AS SE', 'SE.id = E.section_id', 'left');

        $this->db->where('S.user_id', $user_id);

        return $this->db->get()->row();

   }


       public function get_single_provincial($user_id){



        $this->db->select('E.*, U.role_id,P.provincialname');

        $this->db->from('provincial_dir AS E');



        $this->db->join('users AS U', 'U.id = E.user_id', 'left');

        $this->db->join('provincial AS P', 'P.provincialid = E.provincial_id', 'left');


        $this->db->where('E.user_id', $user_id);

        return $this->db->get()->row();

   }


       public function get_single_zonal($user_id){
 //$str_area = explode(',', $LogSubject);


        $this->db->select('E.*, U.role_id');

        $this->db->from('zonal_dir AS E');



        $this->db->join('users AS U', 'U.id = E.user_id', 'left');

      //  $this->db->join('provincial AS P', 'P.provincialid = E.provincial_id', 'left');


        $this->db->where('E.user_id', $user_id);

        return $this->db->get()->row();

   }



       public function get_role_details($user_id){
 //$str_area = explode(',', $LogSubject);


        $this->db->select('U.*');

        $this->db->from('users AS E');



        $this->db->join('roles AS U', 'U.id = E.role_id', 'left');

        //$this->db->join('provincial AS P', 'P.provincialid = E.provincial_id', 'left');


        $this->db->where('E.id', $user_id);

        return $this->db->get()->row();

   }




}
