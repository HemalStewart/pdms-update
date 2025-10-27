<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Teacher_Model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    public function get_teacher_list($province_id = null, $district_id = null, $zonal_id = null, $edu_id = null, $school_id = null, $schools_id = null) {
        $this->db->select('T.*, S.school_name,S.cencus_number, U.username, U.role_id, P.provincialname,DI.districtname,Z.zonename,ZB.zoneblock');
        $this->db->from('teachers AS T');
        $this->db->join('users AS U', 'U.id = T.user_id', 'left');
        $this->db->join('schools AS S', 'S.id = T.school_id', 'left');
        $this->db->join('provincial AS P', 'S.provincial = P.provincialid', 'left');
        $this->db->join('district AS DI', 'S.district_id = DI.id', 'left');
        $this->db->join('zone AS Z', 'S.zonal_id = Z.zoneid', 'left');
        $this->db->join('zoneblock AS ZB', 'S.educational_id = ZB.zoneblockid', 'left');

        if ($this->session->userdata('role_id') == ADMIN || $this->session->userdata('role_id') == GUARDIAN || $this->session->userdata('role_id') == STUDENT || $this->session->userdata('role_id') == TEACHER || $this->session->userdata('role_id') == ACCOUNTANT || $this->session->userdata('role_id') == LIBRARIN || $this->session->userdata('role_id') == RECEPTIONIST || $this->session->userdata('role_id') == STAFF || $this->session->userdata('role_id') == PROVINCIAL || $this->session->userdata('role_id') == ZONAL) {
            $this->db->where('T.school_id', $this->session->userdata('school_id'));
        } else {
            if ($province_id) {
                $this->db->where('S.provincial', $province_id);
            }
            if ($district_id) {
                $this->db->where('S.district_id', $district_id);
            }
            if ($zonal_id) {
                $this->db->where('S.zonal_id', $zonal_id);
            }
            if ($edu_id) {
                $this->db->where('S.educational_id', $edu_id);
            }
            if ($schools_id) {
                $this->db->where('S.id', $schools_id);
            }
        }

        $this->db->where('S.status', 1);
        $this->db->order_by('T.display_order', 'ASC');

        return $this->db->get()->result();
    }

    public function get_single_teacher($id) {
        $this->db->select('T.*, S.school_name, U.username, U.role_id, R.name AS role, SG.grade_name, P.provincialname,DI.districtname,Z.zonename,ZB.zoneblock,HH.type AS teacher_type');
        $this->db->from('teachers AS T');
        $this->db->join('users AS U', 'U.id = T.user_id', 'left');
        $this->db->join('roles AS R', 'R.id = U.role_id', 'left');
        $this->db->join('salary_grades AS SG', 'SG.id = T.salary_grade_id', 'left');
        $this->db->join('teacher_types AS HH', 'HH.id = T.type_id', 'left');
        $this->db->join('schools AS S', 'S.id = T.school_id', 'left');
        $this->db->join('provincial AS P', 'S.provincial = P.provincialid', 'left');
        $this->db->join('district AS DI', 'S.district_id = DI.id', 'left');
        $this->db->join('zone AS Z', 'S.zonal_id = Z.zoneid', 'left');
        $this->db->join('zoneblock AS ZB', 'S.educational_id = ZB.zoneblockid', 'left');
        $this->db->where('T.id', $id);

        return $this->db->get()->row();
    }

    function duplicate_check($username, $id = null) {
        if ($id) {
            $this->db->where_not_in('id', $id);
        }
        $this->db->where('username', $username);

        return $this->db->get('users')->num_rows();
    }

    public function listprovincial() {
        $this->db->select()->from('provincial');
        $listhostel = $this->db->get();

        return $listhostel->result_array();
    }

    public function get_teacher_provincelist($school_id = null, $provincial_id = null) {
        $Role_id = 18;
        $this->db->select('T.*, S.school_name, U.username, U.role_id, P.provincialname,DI.districtname,Z.zonename,ZB.zoneblock');
        $this->db->from('teachers AS T');
        $this->db->join('users AS U', 'U.id = T.user_id', 'left');
        $this->db->join('schools AS S', 'S.id = T.school_id', 'left');
        $this->db->join('provincial AS P', 'S.provincial = P.provincialid', 'left');
        $this->db->join('district AS DI', 'S.district_id = DI.id', 'left');
        $this->db->join('zone AS Z', 'S.zonal_id = Z.zoneid', 'left');
        $this->db->join('zoneblock AS ZB', 'S.educational_id = ZB.zoneblockid', 'left');
        $this->db->where('S.provincial', $provincial_id);

        if ($this->session->userdata('role_id') == SUPER_ADMIN || $this->session->userdata('role_id') == PROVINCIAL && $school_id) {
            $this->db->where('S.id', $school_id);
        }

        $this->db->where('S.status', 1);
        $this->db->order_by('T.display_order', 'ASC');

        return $this->db->get()->result();
    }

    public function get_teacher_zonallist($school_id = null, $zonal_id = null) {
        $str_area = explode(',', $zonal_id);
        $Role_id = 19;
        $this->db->select('T.*, S.school_name, U.username, U.role_id, P.provincialname,DI.districtname,Z.zonename,ZB.zoneblock');
        $this->db->from('teachers AS T');
        $this->db->join('users AS U', 'U.id = T.user_id', 'left');
        $this->db->join('schools AS S', 'S.id = T.school_id', 'left');
        $this->db->join('provincial AS P', 'S.provincial = P.provincialid', 'left');
        $this->db->join('district AS DI', 'S.district_id = DI.id', 'left');
        $this->db->join('zone AS Z', 'S.zonal_id = Z.zoneid', 'left');
        $this->db->join('zoneblock AS ZB', 'S.educational_id = ZB.zoneblockid', 'left');
        $this->db->where_in('S.zonal_id', $str_area);
        $this->db->where('U.role_id', $Role_id);
        $this->db->where('S.status', 1);
        $this->db->order_by('T.display_order', 'ASC');

        return $this->db->get()->result();
    }

    function duplicate_typecheck($type, $id = null) {
        if ($id) {
            $this->db->where_not_in('id', $id);
        }
        $this->db->where('type', $type);

        return $this->db->get('teacher_types')->num_rows();
    }

    public function get_type($schol_id = null) {
        $this->db->select('T.*');
        $this->db->from('teacher_types AS T');
        $this->db->where('T.status', 1);
        $this->db->order_by('T.id', 'ASC');

        return $this->db->get()->result();
    }

    public function get_edulist($teacher_id) {
        $this->db->select('T.*');
        $this->db->from('teacher_edu AS T');
        $this->db->where('T.teacher_id', $teacher_id);
        $this->db->order_by('T.id');
        $query = $this->db->get();

        return $query->result();
    }

    public function get_prulist($teacher_id) {
        $this->db->select('T.*');
        $this->db->from('teacher_pru AS T');
        $this->db->where('T.teacher_id', $teacher_id);
        $this->db->order_by('T.id');
        $query = $this->db->get();

        return $query->result();
    }

    public function get_worklist($teacher_id) {
        $this->db->select('T.*');
        $this->db->from('teacher_work AS T');
        $this->db->where('T.teacher_id', $teacher_id);
        $this->db->order_by('T.id');
        $query = $this->db->get();

        return $query->result();
    }

    public function get_school_list($edu_id = null) {
        $this->db->select('D.*');
        $this->db->from('schools AS D');
        $this->db->where('D.educational_id', $edu_id);
        $this->db->order_by('D.id');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getdistrictData($provincial_id = null) {
        $this->db->select('district.id,district.districtname');
        $this->db->from('district');
        $this->db->where('district.provinceid', $provincial_id);
        $query = $this->db->get();

        return $query->result();
    }

    public function get_teacher_sublist($subject_id = null) {
        $str_area = explode(',', $subject_id);
        $Role_id = 5;
        $this->db->select('T.*, S.school_name, U.username, U.role_id, P.provincialname,DI.districtname,Z.zonename,ZB.zoneblock,T.name');
        $this->db->from('teachers AS T');
        $this->db->join('users AS U', 'U.id = T.user_id', 'left');
        $this->db->join('schools AS S', 'S.id = T.school_id', 'left');
        $this->db->join('subjects AS Sub', 'Sub.teacher_id = T.id', 'left');
        $this->db->join('provincial AS P', 'S.provincial = P.provincialid', 'left');
        $this->db->join('district AS DI', 'S.district_id = DI.id', 'left');
        $this->db->join('zone AS Z', 'S.zonal_id = Z.zoneid', 'left');
        $this->db->join('zoneblock AS ZB', 'S.educational_id = ZB.zoneblockid', 'left');
        $this->db->where_in('Sub.Submainid', $str_area);
        $this->db->where('U.role_id', $Role_id);
        $this->db->where('S.status', 1);
        $this->db->order_by('T.display_order', 'ASC');

        return $this->db->get()->result();
    }

    public function listsubjects($id) {
        $this->db->select('S.*');
        $this->db->from('sub_list AS S');
        $this->db->order_by('S.id');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function log_teacher_history($data) {
    return $this->db->insert('teacher_history', $data);
}

// Fetches all active teachers, possibly filtered by a school.
public function get_active_teachers_report($school_id = null) {
    $this->db->select('T.id, T.name, S.school_name, T.joining_date');
    $this->db->from('teachers AS T');
    $this->db->join('schools AS S', 'S.id = T.school_id', 'left');
    $this->db->where('T.status', 1); // Only fetch active teachers

    if ($school_id) {
        $this->db->where('T.school_id', $school_id);
    }
    
    $this->db->order_by('S.school_name', 'ASC');
    
    return $this->db->get()->result();
}

// Fetches all teacher transfers within a date range.
public function get_transfers_report($start_date = null, $end_date = null) {
    $this->db->select('TH.id, T.name, S_from.school_name AS from_school, S_to.school_name AS to_school, TH.created_at');
    $this->db->from('teacher_history AS TH');
    $this->db->join('teachers AS T', 'T.id = TH.teacher_id', 'left');
    $this->db->join('schools AS S_from', 'S_from.id = TH.from_school_id', 'left');
    $this->db->join('schools AS S_to', 'S_to.id = TH.to_school_id', 'left');
    $this->db->where('TH.reason', 'Receiving transfer');

    if ($start_date && $end_date) {
        $this->db->where('DATE(TH.created_at) >=', $start_date);
        $this->db->where('DATE(TH.created_at) <=', $end_date);
    }

    $this->db->order_by('TH.created_at', 'DESC');
    
    return $this->db->get()->result();
}

// Fetches a single termination report type within a date range and by school.
public function get_terminations_report_by_reason_and_school($reason, $start_date, $end_date, $school_id = null) {
    $this->db->select('TH.id, T.name, S_from.school_name AS from_school, S_to.school_name AS to_school, TH.reason, TH.reason_note, TH.start_date, TH.end_date, TH.created_at');
    $this->db->from('teacher_history AS TH');
    $this->db->join('teachers AS T', 'T.id = TH.teacher_id', 'left');
    $this->db->join('schools AS S_from', 'S_from.id = TH.from_school_id', 'left');
    $this->db->join('schools AS S_to', 'S_to.id = TH.to_school_id', 'left');

    $this->db->where('TH.reason', $reason);
    $this->db->where('DATE(TH.created_at) >=', $start_date);
    $this->db->where('DATE(TH.created_at) <=', $end_date);
    
    if ($school_id) {
        $this->db->where('TH.from_school_id', $school_id);
    }

    $this->db->order_by('TH.created_at', 'DESC');
    
    return $this->db->get()->result();
}

// Fetches all pending transfers that have reached their effective date.
public function get_pending_transfers() {
    $today = date('Y-m-d');
    
    $this->db->select('TH.id, TH.teacher_id, TH.to_school_id, TH.start_date, TH.transfer_by, T.user_id');
    $this->db->from('teacher_history AS TH');
    $this->db->join('teachers AS T', 'T.id = TH.teacher_id'); // Join to get the user_id
    $this->db->where('T.transfer_effective_date <=', $today);
    $this->db->where('TH.reason', 'Receiving transfer');
    
    return $this->db->get()->result();
}


}