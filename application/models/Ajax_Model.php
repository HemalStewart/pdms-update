<?php

if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Ajax_Model extends MY_Model {



    function __construct() {

        parent::__construct();

    }



    public function get_student_list($class_id, $school_id, $academic_year_id){

        $this->db->select('E.roll_no,  S.id, S.user_id, S.name');

        $this->db->from('enrollments AS E');

        $this->db->join('students AS S', 'S.id = E.student_id', 'left');



        if($academic_year_id){

            $this->db->where('E.academic_year_id', $academic_year_id);

        }

        $this->db->where('E.class_id', $class_id);

        $this->db->where('E.school_id', $school_id);

        $this->db->where('S.status_type', 'regular');

        return $this->db->get()->result();

    }



    public function get_student_list_by_section($school_id = null, $section_id = null, $status_type = null){



        $school = $this->get_school_by_id($school_id);



        $this->db->select('E.roll_no, S.name, S.id');

        $this->db->from('enrollments AS E');

        $this->db->join('students AS S', 'S.id = E.student_id', 'left');



        if(!empty($school)){

             $this->db->where('E.academic_year_id', $school->academic_year_id);

             $this->db->where('E.school_id', $school_id);

        }



        $this->db->where('E.section_id', $section_id);



        if($this->session->userdata('role_id') == GUARDIAN){

            $this->db->where('S.guardian_id', $this->session->userdata('profile_id'));

        }

        if($status_type){

            $this->db->where('S.status_type', $status_type);

        }



        return $this->db->get()->result();

    }



    public function get_user_list($school_id, $type) {



        if ($type == 'teacher') {



            $this->db->select('T.name, T.user_id, T.responsibility AS designation, SG.grade_name, U.username, U.role_id');

            $this->db->from('teachers AS T');

            $this->db->join('users AS U', 'U.id = T.user_id', 'left');

            $this->db->join('salary_grades AS SG', 'SG.id = T.salary_grade_id', 'left');

            $this->db->where('T.salary_grade_id >', 0);

            $this->db->where('T.school_id', $school_id);

            $this->db->order_by('T.id', 'ASC');

            return $this->db->get()->result();



        } elseif ($type == 'employee') {



            $this->db->select('E.name, E.user_id, SG.grade_name, U.username, U.role_id, D.name AS designation');

            $this->db->from('employees AS E');

            $this->db->join('users AS U', 'U.id = E.user_id', 'left');

            $this->db->join('designations AS D', 'D.id = E.designation_id', 'left');

            $this->db->join('salary_grades AS SG', 'SG.id = E.salary_grade_id', 'left');

            $this->db->where('E.salary_grade_id >', 0);

             $this->db->where('E.school_id', $school_id);

            $this->db->order_by('E.id', 'ASC');

            return $this->db->get()->result();



        } else {

            return array();

        }

    }

          public function fetch_provincial($provincial_id) {
        $this->db->select('district.id,district.districtname');
        $this->db->from('district');

        $this->db->where('district.provinceid', $provincial_id);
        $this->db->order_by('district.id');
        $query = $this->db->get();
        return $query->result_array();


        // return $section;
    }

    public function fetch_zonal($dist_id) {
        $this->db->select('zone.zoneid,zone.zonename');
        $this->db->from('zone');

        $this->db->where('zone.districtid', $dist_id);
        $this->db->order_by('zone.zoneid');
        $query = $this->db->get();
        return $query->result_array();


        // return $section;
    }

    public function fetch_ds($dist_id) {
        $this->db->select('dsview.dsid,dsview.dsname');
        $this->db->from('dsview');

        $this->db->where('dsview.districtid', $dist_id);
        $this->db->order_by('dsview.dsid');
        $query = $this->db->get();
        return $query->result_array();


        // return $section;
    }

    public function fetch_zoneblock($zone_id) {
        $this->db->select('zoneblock.zoneblockid,zoneblock.zoneblock');
        $this->db->from('zoneblock');

        $this->db->where('zoneblock.zoneid', $zone_id);
        $this->db->order_by('zoneblock.zoneblockid');
        $query = $this->db->get();
        return $query->result_array();


        // return $section;
    }

    public function fetch_gn($dist_id) {
        $this->db->select('gndivision.gnid,gndivision.gnname');
        $this->db->from('gndivision');

        $this->db->where('gndivision.districtid', $dist_id);
        $this->db->order_by('gndivision.gnid');
        $query = $this->db->get();
        return $query->result_array();


        // return $section;
    }

      public function fetch_school($education_id) {
        $this->db->select('schools.id,schools.school_name,schools.cencus_number');
        $this->db->from('schools');

        $this->db->where('schools.educational_id', $education_id);
        $this->db->order_by('schools.id');
        $query = $this->db->get();
        return $query->result_array();


        // return $section;
    }

      public function listprovincial() {

        $this->db->select()->from('provincial');
        $listhostel = $this->db->get();
        return $listhostel->result_array();
    }


        public function listdesignation() {

        $this->db->select()->from('designations');
        $listhostel = $this->db->get();
        return $listhostel->result();
    }

         public function listsalarygrade() {

        $this->db->select()->from('salary_grades');
        $listhostel = $this->db->get();
        return $listhostel->result_array();
    }



      public function fetch_schoolclass($class_id) {
        $this->db->select('schoolclass.School_classesid,schoolclass.School_className');
        $this->db->from('schoolclass');

        $this->db->where('schoolclass.School_Typeid', $class_id);
        $this->db->order_by('schoolclass.School_classesid');
        $query = $this->db->get();
        return $query->result_array();


        // return $section;
    }


    public function fetch_subjectdefine($pirtype_id) {

         $this->db->select('S.*');
        $this->db->from('subject_define AS S');

        $this->db->where('S.id', $pirtype_id);
        $listhostel = $this->db->get();
        return $listhostel->row_array();
    }

      public function fetch_teachertype($teacher_id) {

        $this->db->select(' teacher_types.id, teacher_types.type');
        $this->db->from(' teacher_types');

        $this->db->where(' teacher_types.school_id', $teacher_id);
        $this->db->order_by(' teacher_types.id');
        $query = $this->db->get();
        return $query->result_array();
    }


    //Progress


      public function monthlist() {

        $this->db->select()->from('month');
        $listhostel = $this->db->get();
        return $listhostel->result_array();
    }

      public function pr_type() {

        $this->db->select()->from('program_type');
        $listhostel = $this->db->get();
        return $listhostel->result_array();
    }


    public function pr_data() {

        $this->db->select()->from('program_data');
        $listhostel = $this->db->get();
        return $listhostel->result_array();
    }

        public function get_listsub() {

        $this->db->select()->from('sub_list');
        $listhostel = $this->db->get();
        return $listhostel->result_array();
    }

    public function listdepartment() {

        $this->db->select()->from('department');
        $listhostel = $this->db->get();
        return $listhostel->result_array();
    }


    public function listsubject() {

        $this->db->select()->from('sub_list');
        $listhostel = $this->db->get();
        return $listhostel->result_array();
    }


        public function fetch_subid() {
        $sub_id = $this->input->get('sub_id');
        $this->db->select("*");
        $this->db->from('sub_list');

        $this->db->where('sub_name', $sub_id);
        $query = $this->db->get();
         return $query->row();
    }


    public function fetch_classid() {
        $class_id = $this->input->get('class_id');
        $this->db->select("*");
        $this->db->from('schoolclass');

        $this->db->where('School_classesid', $class_id);
        $query = $this->db->get();
         return $query->row();
    }

        public function fetch_subcode() {
        $sub_id = $this->input->get('sub_id');
        $this->db->select("*");
        $this->db->from('subject_define');

        $this->db->where('id', $sub_id);
        $query = $this->db->get();
         return $query->row();
    }

    public function getsubjectData($sub_id = null) {
        $str_area = explode(',', $sub_id);
//
        $this->db->select('sub_list.id,sub_list.sub_name,sub_list.sub_code');

        $this->db->from('sub_list');
        $this->db->where_in('sub_list.id', $str_area);
//
        $query = $this->db->get();
        return $query->result_array();
    }

        public function getsubjectallData() {
        //$str_area = explode(',', $sub_id);
//
        $this->db->select('sub_list.id,sub_list.sub_name,sub_list.sub_code');

        $this->db->from('sub_list');
     //   $this->db->where_in('sub_list.id', $str_area);
//
        $query = $this->db->get();
        return $query->result_array();
    }

       public function selectsubArea() {
        $id = $this->input->get('class_id');


        $this->db->select("*");
        $this->db->from('schoolclass');

        $this->db->where('School_classesid', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }


    /*-------------------------------------------------------------------------------------------------------*/



	 public function pr_type1() {

        $this->db->select()->from('subject_program_type');
        $listhostel = $this->db->get();
        return $listhostel->result_array();
    }


    public function pr_data1() {

        $this->db->select()->from('subject_program_data');
        $listhostel = $this->db->get();
        return $listhostel->result_array();
    }
}
