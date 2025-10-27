<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Routine_Model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    public function get_section_list($province_id = null, $district_id = null, $zonal_id = null, $edu_id = null, $schools_id = null, $class_id = null) {

        if (!$class_id) {
            return;
        }

        $this->db->select('S.*, C.School_className AS class_name');
        $this->db->from('sections AS S');
        //   $this->db->join('classes AS C', 'C.id = S.class_id', 'left');
        $this->db->join('schoolclass AS C', 'C.School_classesid = S.class_id', 'left');
        $this->db->join('schools AS SC', 'SC.id = S.school_id', 'left');
        $this->db->join('routines AS R', 'R.section_id = S.id', 'left');
         $this->db->group_by('S.id');

//                
//        if($this->session->userdata('role_id') != SUPER_ADMIN){
//            $this->db->where('S.school_id', $this->session->userdata('school_id'));
//        }
////        
//        if($school_id && $this->session->userdata('role_id') == SUPER_ADMIN){
//            $this->db->where('S.school_id', $school_id); 
//        } 
//        

        if ($this->session->userdata('role_id') == ADMIN || $this->session->userdata('role_id') == GUARDIAN || $this->session->userdata('role_id') == STUDENT || $this->session->userdata('role_id') == TEACHER || $this->session->userdata('role_id') == ACCOUNTANT || $this->session->userdata('role_id') == LIBRARIN || $this->session->userdata('role_id') == RECEPTIONIST || $this->session->userdata('role_id') == STAFF) {

            $this->db->where('S.school_id', $this->session->userdata('school_id'));

            if ($class_id) {
                $this->db->where('S.class_id', $class_id);
            }
        } else {
//
//            if ($province_id) {
//
//                $this->db->where('SC.provincial', $province_id);
//            }
////
//            if ($district_id) {
//
//                $this->db->where('SC.district_id', $district_id);
//            }
////
//            if ($zonal_id) {
//
//                $this->db->where('SC.zonal_id', $zonal_id);
//            }
////
//            if ($edu_id) {
//
//                $this->db->where('SC.educational_id', $edu_id);
//            }
//
            if ($schools_id) {

                $this->db->where('S.school_id', $schools_id);
            }

            if ($class_id) {
                $this->db->where('S.class_id', $class_id);
            }
        }

        if ($this->session->userdata('role_id') == SUBJECT) {

            $subject_id = $this->session->userdata('subject_id');
            $str_area = explode(',', $subject_id);

            $this->db->where_in('R.subject_id', $str_area);
        }

        if ($this->session->userdata('role_id') == PROVINCIAL) {

            $provincial_id = $this->session->userdata('provincial_id');


            $this->db->where('SC.provincial', $provincial_id);
        }

        if ($this->session->userdata('role_id') == ZONAL) {

            $zonal_id = $this->session->userdata('zonal_id');
            $str_area = explode(',', $zonal_id);

            $this->db->where_in('SC.zonal_id', $str_area);
        }

        return $this->db->get()->result();
    }

    public function get_single_routine($id) {

        $this->db->select('S.*, C.name AS class_name, T.name AS teacher');
        $this->db->from('subjects AS S');
        $this->db->join('teachers AS T', 'T.id = S.teacher_id', 'left');
        $this->db->join('classes AS C', 'C.id = S.class_id', 'left');
        $this->db->where('S.id', $id);
        return $this->db->get()->row();
    }

    function duplicate_routine($condition, $id = null) {
        if ($id) {
            $this->db->where_not_in('id', $id);
        }
        $this->db->where($condition);
        return $this->db->get('routines')->num_rows();
    }

    public function getclassData($School_TypeId = null) {

//
        $this->db->select('schoolclass.School_classesid,schoolclass.School_className');

        $this->db->from('schoolclass');
        $this->db->where('schoolclass.School_Typeid', $School_TypeId);
//
        $query = $this->db->get();
        return $query->result();
    }

    public function getsingleclassData($School_Id = null) {

//
        $this->db->select('schoolclass.School_classesid,schoolclass.School_className');

        $this->db->from('schoolclass');
        $this->db->where('schoolclass.School_classesid', $School_Id);
//
        $query = $this->db->get();
        return $query->row();
    }
    
    
     public function getdistrictData($provincial_id = null) {

//
        $this->db->select('district.id,district.districtname');

        $this->db->from('district');
        $this->db->where('district.provinceid', $provincial_id);
//
        $query = $this->db->get();
        return $query->result();
    }
    
    
        public function getzonalData($zonal_id = null) {
        $str_area = explode(',', $zonal_id);
//
        $this->db->select('zoneblock.zoneblockid,zoneblock.zoneblock');

        $this->db->from('zoneblock');
        $this->db->where_in('zoneblock.zoneid', $str_area);
//
        $query = $this->db->get();
        return $query->result();
    }


}
