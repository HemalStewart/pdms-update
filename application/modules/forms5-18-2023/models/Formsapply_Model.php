<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Formsapply_Model extends MY_Model {

    function __construct() {

        parent::__construct();
    }

   
    

	
	
	 public function get_school_by_idno($id) {


        $this->db->select('schools.id,schools.school_name AS piriname,schools.school_code,schools.address,provincial.provincialname,district.districtname,zone.zonename,zoneblock.zoneblock,schools.provincial');

        $this->db->from('schools');
        $this->db->join('provincial', 'schools.provincial = provincial.provincialid', 'left');
        $this->db->join('district', 'schools.district_id = district.id', 'left');
        $this->db->join('zone', 'schools.zonal_id = zone.zoneid', 'left');
        $this->db->join('zoneblock', 'schools.educational_id = zoneblock.zoneblockid', 'left');
        $this->db->where('schools.id', $id);
        return $this->db->get()->row();
    }

    
    public function get_teacherapplicationformval($id) {
        

        $this->db->select('TP.*');

        $this->db->from('new_teacher_app_01 AS TP');
		
        return $this->db->get()->result();
    }
    

  
   public function get_single_teacher_application_form($id = null) {


/*
        $this->db->select('S.*,  SC.school_name, T.type, D.amount, D.title AS discount_title, SC.school_name, G.name as guardian, E.academic_year_id, E.roll_no, E.class_id, E.section_id, U.username, U.role_id, R.name AS role,  C.name AS class_name, SE.name AS section, P.provincialname,DI.districtname,Z.zonename,ZB.zoneblock');*/

        $this->db->select('TP.*');
        $this->db->from('new_teacher_app_01 AS TP');

       // $this->db->join('schools AS S', 'S.id = TP.school_id', 'left');

       

         $this->db->where('TP.id', $id);
			 

        

         return $this->db->get()->row();
    }

public function get_single_teacher_application_print($id) {

        $this->db->select('TP.*');
        $this->db->from('new_teacher_app_01 AS TP');

        $this->db->where('TP.id', $id);

        return $this->db->get()->row();
    }

	
	

	
}
