<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Forms_Model extends MY_Model {

    function __construct() {

        parent::__construct();
    }

   
    public function get_school_by_id($id) {


        $this->db->select('schools.id,schools.school_name AS piriname,schools.school_code,schools.address,provincial.provincialname,district.districtname,zone.zonename,zoneblock.zoneblock,schools.provincial');

        $this->db->from('schools');
        $this->db->join('provincial', 'schools.provincial = provincial.provincialid', 'left');
        $this->db->join('district', 'schools.district_id = district.id', 'left');
        $this->db->join('zone', 'schools.zonal_id = zone.zoneid', 'left');
        $this->db->join('zoneblock', 'schools.educational_id = zoneblock.zoneblockid', 'left');
        $this->db->where('schools.id', $id);
        return $this->db->get()->row();
    }

    
    public function get_teachertransferformval($id) {


        $this->db->select('teacher_transfer.id,teacher_transfer.applicant_name,teacher_transfer.created_at ,schools.school_name,schools.school_code,schools.address,teacher_transfer.datei');

        $this->db->from('teacher_transfer');
        $this->db->join('schools', 'teacher_transfer.school_id = schools.id', 'left');
        $this->db->where('teacher_transfer.school_id', $id);
        return $this->db->get()->result();
    }
    

   public function get_single_teacher_transfer_form($id = null) {


/*
        $this->db->select('S.*,  SC.school_name, T.type, D.amount, D.title AS discount_title, SC.school_name, G.name as guardian, E.academic_year_id, E.roll_no, E.class_id, E.section_id, U.username, U.role_id, R.name AS role,  C.name AS class_name, SE.name AS section, P.provincialname,DI.districtname,Z.zonename,ZB.zoneblock');*/

        $this->db->select('TT.*');
        $this->db->from('teacher_transfer AS TT');

       // $this->db->join('schools AS S', 'S.id = TP.school_id', 'left');

       

         $this->db->where('TT.id', $id);
			 

        

         return $this->db->get()->row();
    }


 public function get_single_teacher_transfer_print($id) {

        $this->db->select('TP.*');
        $this->db->from('teacher_transfer AS TP');

        $this->db->where('TP.id', $id);

        return $this->db->get()->row();
    }

	
	
}
