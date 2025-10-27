<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************Report.php**********************************
 * @product name    : PDMS
 * @type            : Class
 * @class name      : Report
 * @description     : Manage all reports of the system.  
 * @author          : Rameca Team 	
 * @url             : https://www.ramecats.lk     
 * @support         : info@ramecats.lk	
 * @copyright       : All Rights Reserved. Design & Developed by Rameca Technology Solutions	
 * ********************************************************** */

class Formsapply extends My_Controller {

    public $data = array();
    public $date_from = '';
    public $date_to = '';

    public function __construct() {
        parent::__construct();

        $this->load->model('Formsapply_Model', 'forms', true);

        if ($this->session->userdata('role_id') != SUPER_ADMIN) {
            $school_id = $this->session->userdata('school_id');
            $this->data['academic_years'] = $this->forms->get_list('academic_years', array('status' => 1, 'school_id' => $school_id));
        }

        $this->date_from = date('Y-m-01');
        $this->date_to = date('Y-m-t');
        $this->db->query("SET SESSION sql_mode = ''");
    }

    /*     * ***************Function examresult**********************************
     * @type            : Function
     * @function name   : Annual Report
     * @description     : Load examresult report user interface                 
     *                    with various filtering options
     *                    and process to load balance report   
     * @param           : null
     * @return          : null 
     * ********************************************************** */

    public function teacherapplicationform($school_id = null) {


        //check_permission(VIEW);

        $conschoolid = $this->session->userdata('school_id');

        //$this->data['schools'] = $this->report->get_single('schools', array('id' => $conschoolid));
        $this->data['teacherapplicationformval'] = $this->forms->get_teacherapplicationformval($conschoolid);
        $this->data['schools'] = $this->forms->get_school_by_idno($conschoolid);

        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('teacher_applicatin_form') . ' | ' . SMS);
        $this->layout->view('teacherapplication/index_teacher_application', $this->data);
    }

    public function teacherapplicationformadd() {

//        check_permission(ADD);
//        
//        if (!is_numeric($id)) {
//            error($this->lang->line('unexpected_error'));
//            redirect('report/pannualreport');
//        }

        $conschoolid = $this->session->userdata('school_id');

        if ($_POST) {
            $this->_prepare_teacherapp_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_teacherapp_data1(); //method for db


                $insert_id = $this->forms->insert('new_teacher_app_01', $data); //db 
                //$insert_id2 = $this->report->insert('annual_report_02', $data);
                if ($insert_id) {
                   			$this->_get_teacherapp_data1_i($insert_id);
					        $this->_save_teacherapp_data1_i_working($insert_id);
					        $this->_get_teacherapp_data2($insert_id);
					        $this->_save_teacherapp_data2_subclass($insert_id);
					        $this->_get_teacherapp_data3($insert_id);
					//$this->_save_edu($insert_id);
                    /*    $this->_get_teacherapp_data2($insert_id);
                      */

                    create_log('Has been added a Teacher Application : ' . $data['title']);

                    success($this->lang->line('insert_success'));
                    redirect('forms/formsapply/teacherapplicationform');
                } else {
                    error($this->lang->line('insert_failed'));
                    redirect('forms/formsapply/teacherapplicationformadd');
                }
            } else {
                error($this->lang->line('insert_failed'));
                $this->data['post'] = $_POST;
            }
        }





        //$this->data['schools'] = $this->report->get_single('schools', array('id' => $conschoolid));
        $this->data['schools'] = $this->forms->get_school_by_idno($conschoolid);
        $this->data['teacherapplicationformval'] = $this->forms->get_teacherapplicationformval($conschoolid);
        $this->data['add'] = TRUE;
        $this->layout->title($this->lang->line('add') . ' | ' . SMS);
        $this->layout->view('teacherapplication/index_teacher_application', $this->data);
    }

    private function _prepare_teacherapp_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error-message" style="color: red;">', '</div>');
       // $this->form_validation->set_rules('type', $this->lang->line('type'), 'trim|required');
       $this->form_validation->set_rules('full_name_s', $this->lang->line('full_name_s'), 'trim|required');
		
		$this->form_validation->set_rules('applicant_sig1', $this->lang->line('applicant_sig1'), 'trim|callback_applicant_sig1');
		$this->form_validation->set_rules('t2_kruthy_sig1', $this->lang->line('t2_kruthy_sig1'), 'trim|callback_t2_kruthy_sig1');
		$this->form_validation->set_rules('officer_sig1', $this->lang->line('officer_sig1'), 'trim|callback_officer_sig1');
		$this->form_validation->set_rules('zonal_sig1', $this->lang->line('zonal_sig1'), 'trim|callback_zonal_sig1');
		$this->form_validation->set_rules('zonalstamp_sig2', $this->lang->line('zonalstamp_sig2'), 'trim|callback_zonalstamp_sig2');
		$this->form_validation->set_rules('asst_province_sig1', $this->lang->line('asst_province_sig1'), 'trim|callback_asst_province_sig1');
		$this->form_validation->set_rules('asst_provincestamp_sig2', $this->lang->line('asst_provincestamp_sig2'), 'trim|callback_asst_provincestamp_sig2');
		$this->form_validation->set_rules('edu_clerk_sig1', $this->lang->line('edu_clerk_sig1'), 'trim|callback_edu_clerk_sig1');
		$this->form_validation->set_rules('asdic_sig', $this->lang->line('asdic_sig'), 'trim|callback_asdic_sig');
		$this->form_validation->set_rules('commitee_mem_sig', $this->lang->line('commitee_mem_sig'), 'trim|callback_commitee_mem_sig');
		$this->form_validation->set_rules('min_director_sig', $this->lang->line('min_director_sig'), 'trim|callback_min_director_sig');

    }
	
	public function applicant_sig1() {
        if ($_FILES['applicant_sig1']['name']) {
            $name = $_FILES['applicant_sig1']['name'];
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif') {
                return TRUE;
            } else {
                $this->form_validation->set_message('applicant_sig1', $this->lang->line('select_valid_file_format'));
                return FALSE;
            }
        }
    }
	
	public function t2_kruthy_sig1() {
        if ($_FILES['t2_kruthy_sig1']['name']) {
            $name = $_FILES['t2_kruthy_sig1']['name'];
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif') {
                return TRUE;
            } else {
                $this->form_validation->set_message('t2_kruthy_sig1', $this->lang->line('select_valid_file_format'));
                return FALSE;
            }
        }
    }
	
	public function officer_sig1() {
        if ($_FILES['officer_sig1']['name']) {
            $name = $_FILES['officer_sig1']['name'];
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif') {
                return TRUE;
            } else {
                $this->form_validation->set_message('officer_sig1', $this->lang->line('select_valid_file_format'));
                return FALSE;
            }
        }
    }
	
	public function zonal_sig1() {
        if ($_FILES['zonal_sig1']['name']) {
            $name = $_FILES['zonal_sig1']['name'];
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif') {
                return TRUE;
            } else {
                $this->form_validation->set_message('zonal_sig1', $this->lang->line('select_valid_file_format'));
                return FALSE;
            }
        }
    }

	public function zonalstamp_sig2() {
        if ($_FILES['zonalstamp_sig2']['name']) {
            $name = $_FILES['zonalstamp_sig2']['name'];
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif') {
                return TRUE;
            } else {
                $this->form_validation->set_message('zonalstamp_sig2', $this->lang->line('select_valid_file_format'));
                return FALSE;
            }
        }
    }
	
	
	public function asst_province_sig1() {
        if ($_FILES['asst_province_sig1']['name']) {
            $name = $_FILES['asst_province_sig1']['name'];
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif') {
                return TRUE;
            } else {
                $this->form_validation->set_message('asst_province_sig1', $this->lang->line('select_valid_file_format'));
                return FALSE;
            }
        }
    }
	
	public function asst_provincestamp_sig2() {
        if ($_FILES['asst_provincestamp_sig2']['name']) {
            $name = $_FILES['asst_provincestamp_sig2']['name'];
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif') {
                return TRUE;
            } else {
                $this->form_validation->set_message('asst_provincestamp_sig2', $this->lang->line('select_valid_file_format'));
                return FALSE;
            }
        }
    }
	
	public function edu_clerk_sig1() {
        if ($_FILES['edu_clerk_sig1']['name']) {
            $name = $_FILES['edu_clerk_sig1']['name'];
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif') {
                return TRUE;
            } else {
                $this->form_validation->set_message('edu_clerk_sig1', $this->lang->line('select_valid_file_format'));
                return FALSE;
            }
        }
    }
	
	public function asdic_sig() {
        if ($_FILES['asdic_sig']['name']) {
            $name = $_FILES['asdic_sig']['name'];
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif') {
                return TRUE;
            } else {
                $this->form_validation->set_message('asdic_sig', $this->lang->line('select_valid_file_format'));
                return FALSE;
            }
        }
    }
	
	public function commitee_mem_sig() {
        if ($_FILES['commitee_mem_sig']['name']) {
            $name = $_FILES['commitee_mem_sig']['name'];
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif') {
                return TRUE;
            } else {
                $this->form_validation->set_message('commitee_mem_sig', $this->lang->line('select_valid_file_format'));
                return FALSE;
            }
        }
    }
	
		
	public function min_director_sig() {
        if ($_FILES['min_director_sig']['name']) {
            $name = $_FILES['min_director_sig']['name'];
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif') {
                return TRUE;
            } else {
                $this->form_validation->set_message('min_director_sig', $this->lang->line('select_valid_file_format'));
                return FALSE;
            }
        }
    }
	
	
    private function _get_teacherapp_data1() {

        $items = array();

        $items[] = 'school_id';
        $items[] = 'type';
        $items[] = 'initial_name_s';
        $items[] = 'full_name_s';
        $items[] = 'initial_name_e';
        $items[] = 'nationality';
        $items[] = 'nic_no';
		$items[] = 'red_address';
		$items[] = 'mobile_no';
		$items[] = 'whatsapp_no';
		$items[] = 'e_mail';
        $items[] = 'piriven_name';
        $items[] = 'piriven_address';
        $items[] = 'year1';
        $items[] = 'exam_no1';
        $items[] = 'ex1_sub1';
        $items[] = 'ex1_sub1_grade';
        $items[] = 'ex1_sub2';
        $items[] = 'ex1_sub2_grade';
        $items[] = 'ex1_sub3';
        $items[] = 'ex1_sub3_grade';
        $items[] = 'ex1_sub4';
        $items[] = 'ex1_sub4_grade';
        $items[] = 'ex1_sub5';
        $items[] = 'ex1_sub5_grade';
        $items[] = 'ex1_sub6';
        $items[] = 'ex1_sub6_grade';
        $items[] = 'ex1_sub7';
        $items[] = 'ex1_sub7_grade';
        $items[] = 'ex1_sub8';
        $items[] = 'ex1_sub8_grade';
        $items[] = 'ex1_sub9';
        $items[] = 'ex1_sub9_grade';
        $items[] = 'ex1_sub10';
        $items[] = 'ex1_sub10_grade';

        $items[] = 'year2';
        $items[] = 'exam_no2';
        $items[] = 'ex2_sub1';
        $items[] = 'ex2_sub1_grade';
        $items[] = 'ex2_sub2';
        $items[] = 'ex2_sub2_grade';
        $items[] = 'ex2_sub3';
        $items[] = 'ex2_sub3_grade';
        $items[] = 'ex2_sub4';
        $items[] = 'ex2_sub4_grade';
        $items[] = 'ex2_sub5';
        $items[] = 'ex2_sub5_grade';
        $items[] = 'ex2_sub6';
        $items[] = 'ex2_sub6_grade';
        $items[] = 'ex2_sub7';
        $items[] = 'ex2_sub7_grade';
        $items[] = 'ex2_sub8';
        $items[] = 'ex2_sub8_grade';
        $items[] = 'ex2_sub9';
        $items[] = 'ex2_sub9_grade';
        $items[] = 'ex2_sub10';
        $items[] = 'ex2_sub10_grade';

        $data = elements($items, $_POST);

        //date('Y-m-d', strtotime($this->input->post('fdate')))

        /* $data['fdate'] = date('Y-m-d', strtotime($this->input->post('fdate'))); */

        $data['school_id'] = $this->session->userdata('school_id');
        $data['status'] = 1;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = logged_in_user_id();

        return $data;
    }
	
/*SINGLE_VIEW*/
    public function get_single_teacher_application_form() {

        $teacherapplicationform_id = $this->input->post('teacherapplicationform_id');
        $this->data['forms'] = $this->forms->get_single_teacher_application_form($teacherapplicationform_id);
		
		$this->data['new_teacher_app_01_i'] = $this->forms->get_new_teacher_app_01_i($teacherapplicationform_id);
		$this->data['new_teacher_app_01_working'] = $this->forms->get_new_teacher_app_01_working($teacherapplicationform_id);
		$this->data['new_teacher_app_02_class_sub'] = $this->forms->get_new_teacher_app_01_subclass($teacherapplicationform_id);
		$this->data['new_teacher_app_02'] = $this->forms->get_new_teacher_app_02($teacherapplicationform_id);
		$this->data['new_teacher_app_03'] = $this->forms->get_new_teacher_app_03($teacherapplicationform_id);

        echo $this->load->view('teacherapplication/get-single-teacher-application-form', $this->data);
    }

    public function view($id = null) {

        check_permission(VIEW);

        $this->data['teacherapplicationformval'] = $this->forms->get_single_teacher_application_form('new_teacher_app_01', array('status' => 1), '', '', '', 'id', 'ASC');
		

        $this->data['schools'] = $this->schools;
        $this->data['detail'] = TRUE;
        $this->layout->title($this->lang->line('teacher_application_form') . ' | ' . SMS);
        $this->layout->view('teacherapplication/get-single-teacher-application-form', $this->data);
    }

    public function _get_teacherapp_data1_i($teacher_app_id) {

        $items = array();
        $items[] = 'exam_name';
        $items[] = 'year_h1';
        $items[] = 'year_h2';
        $items[] = 'exam_noh1';
        $items[] = 'exam_noh2';
		
        $items[] = 'hex1_sub1'; 
		$items[] = 'hex1_sub1_grade';
		$items[] = 'hex1_sub2'; 
		$items[] = 'hex1_sub2_grade';
		$items[] = 'hex1_sub3'; 
		$items[] = 'hex1_sub3_grade';
		$items[] = 'hex1_sub4'; 
		$items[] = 'hex1_sub4_grade';
		$items[] = 'hex1_sub5'; 
		$items[] = 'hex1_sub5_grade';
	    $items[] = 'hex1_sub6'; 
		$items[] = 'hex1_sub6_grade';
	    $items[] = 'hex1_sub7'; 
		$items[] = 'hex1_sub7_grade';
		$items[] = 'hex1_sub8'; 
		$items[] = 'hex1_sub8_grade';
	    $items[] = 'hex1_sub9'; 
		$items[] = 'hex1_sub9_grade';
	    $items[] = 'hex1_sub10'; 
		$items[] = 'hex1_sub10_grade';
		
		$items[] = 'hex2_sub1';
        $items[] = 'hex2_sub1_grade';
        $items[] = 'hex2_sub2';
        $items[] = 'hex2_sub2_grade';
	    $items[] = 'hex2_sub3';
        $items[] = 'hex2_sub3_grade';
		$items[] = 'hex2_sub4';
        $items[] = 'hex2_sub4_grade';
		$items[] = 'hex2_sub5';
        $items[] = 'hex2_sub5_grade';
		$items[] = 'hex2_sub6';
        $items[] = 'hex2_sub6_grade';
		$items[] = 'hex2_sub7';
        $items[] = 'hex2_sub7_grade';
		$items[] = 'hex2_sub8'; 
		$items[] = 'hex2_sub8_grade';
	    $items[] = 'hex2_sub9'; 
		$items[] = 'hex2_sub9_grade';
	    $items[] = 'hex2_sub10'; 
		$items[] = 'hex2_sub10_grade';
		
		$items[] = 'other_qualifications';
		$items[] = 'yes_no';
		$items[] = 'leave_reson';
		$items[] = 'piriven_name1';
		$items[] = 'piriven_type';


        $data = elements($items, $_POST);

        /* 		 $data['datei'] = date('Y-m-d', strtotime($this->input->post('datei')));
          $data['dateii'] = date('Y-m-d', strtotime($this->input->post('dateii'))); */
        $data['datehi'] = date('Y-m-d', strtotime($this->input->post('datehi')));
        $data['datehii'] = date('Y-m-d', strtotime($this->input->post('datehii')));
        $data['dateiv'] = date('Y-m-d', strtotime($this->input->post('dateiv')));
        $data['datev'] = date('Y-m-d', strtotime($this->input->post('datev')));


        $data['teacher_app_id'] = $teacher_app_id;
        $data['school_id'] = $this->session->userdata('school_id');
        $data['status'] = 1;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = logged_in_user_id();
		
		 if ($_FILES['applicant_sig1']['name']) {
            $data['applicant_sig1'] = $this->_upload_applicant_sig1();
        }
		
		

        $this->forms->insert('new_teacher_app_01_i', $data);
		
		 return $data;
    }
	
	
	
     private function _upload_applicant_sig1() {

        $prev_applicant_sig1 = $this->input->post('prev_applicant_sig1');
        $applicant_sig1 = $_FILES['applicant_sig1']['name'];
        $applicant_sig1_type = $_FILES['applicant_sig1']['type'];
        $return_applicant_sig1 = '';
        if ($applicant_sig1 != "") {
            if ($applicant_sig1_type == 'image/jpeg' || $applicant_sig1_type == 'image/pjpeg' ||
                    $applicant_sig1_type == 'image/jpg' || $applicant_sig1_type == 'image/png' ||
                    $applicant_sig1_type == 'image/x-png' || $applicant_sig1_type == 'image/gif') {

                $destination = 'assets/uploads/forms/teacher_application/';

                $file_type = explode(".", $applicant_sig1);
                $extension = strtolower($file_type[count($file_type) - 1]);
                $applicant_sig1_path = 'photo-' . time() . '-sms.' . $extension;

                move_uploaded_file($_FILES['applicant_sig1']['tmp_name'], $destination . $applicant_sig1_path);

                // need to unlink previous mother_photo
                if ($prev_applicant_sig1 != "") {
                    if (file_exists($destination . $prev_applicant_sig1)) {
                        @unlink($destination . $prev_applicant_sig1);
                    }
                }

                $return_applicant_sig1 = $applicant_sig1_path;
            }
        } else {
            $return_applicant_sig1 = $prev_applicant_sig1;
        }

        return $return_applicant_sig1;
    }

	
	
	 private function _save_teacherapp_data1_i_working($teacher_app_id) {

        $school_id = $this->input->post('school_id');

        foreach ($this->input->post('working_place') as $key => $value) {

            if ($value) {

                $data = array();
                $exist = '';
                //$stop_id = @$this->input->post('stop_id')[$key];
                $tea_id = @$_POST['teacher_app_id'][$key];

                if ($tea_id) {
                    $exist = $this->forms->get_single('new_teacher_app_01_working', array('teacher_app_id' => $teacher_app_id, 'id' => $tea_id));
                }

                $data['school_id'] = $school_id;
                $data['working_place'] = $value;
                $data['working_designation'] = @$_POST['working_designation'][$key];
                $data['working_from'] = @$_POST['working_from'][$key];
                $data['working_to'] = @$_POST['working_to'][$key];

                if ($this->input->post('teacher_app_id') && $exist) {

                    $data['modified_at'] = date('Y-m-d H:i:s');
                    $data['modified_by'] = logged_in_user_id();
                    $this->forms->update('new_teacher_app_01_working', $data, array('id' => $exist->id));
                } else {

                    $data['teacher_app_id'] = $teacher_app_id;
                    $data['status'] = 1;
                    $data['created_at'] = date('Y-m-d H:i:s');
                    $data['created_by'] = logged_in_user_id();
                    $this->forms->insert('new_teacher_app_01_working', $data);
                }
            }
        }
    }
	
	
	 public function _get_teacherapp_data2($teacher_app_id) {

        $items = array();
		 
		$items[] = 'annual_year1';
		$items[] = 'annual_month1';
		$items[] = 'annual_date1';
		$items[] = 'annual_year2';
		$items[] = 'annual_month2';
		$items[] = 'annual_date2';
		$items[] = 'annual_monk';
		$items[] = 'annual_lay';
		$items[] = 'annual_total';
		$items[] = 'vacancy_extra';
		$items[] = 'vacancy_year';
		$items[] = 'vacancy_month';
		$items[] = 'vacancy_date';
		 
		$items[] = 'time1';
		$items[] = 'mon1';
		$items[] = 'tues1';
		$items[] = 'wend1';
		$items[] = 'thur1';
		$items[] = 'fri1';
		 
		$items[] = 'time2';
		$items[] = 'mon2';
		$items[] = 'tues2';
		$items[] = 'wend2';
		$items[] = 'thur2';
		$items[] = 'fri2';
		 
		$items[] = 'time3';
		$items[] = 'mon3';
		$items[] = 'tues3';
		$items[] = 'wend3';
		$items[] = 'thur3';
		$items[] = 'fri3';
		 
		$items[] = 'time4';
		$items[] = 'mon4';
		$items[] = 'tues4';
		$items[] = 'wend4';
		$items[] = 'thur4';
		$items[] = 'fri4';
		 
		$items[] = 'time5';
		$items[] = 'mon5';
		$items[] = 'tues5';
		$items[] = 'wend5';
		$items[] = 'thur5';
		$items[] = 'fri5';
		 
		$items[] = 'time6';
		$items[] = 'mon6';
		$items[] = 'tues6';
		$items[] = 'wend6';
		$items[] = 'thur6';
		$items[] = 'fri6';
	 
		$items[] = 'time7';
		$items[] = 'mon7';
		$items[] = 'tues7';
		$items[] = 'wend7';
		$items[] = 'thur7';
		$items[] = 'fri7';
		 
		$items[] = 'time8';
		$items[] = 'mon8';
		$items[] = 'tues8';
		$items[] = 'wend8';
		$items[] = 'thur8';
		$items[] = 'fri8';
		 
		$items[] = 'hours_total';
		$items[] = 'minuts_total';
		$items[] = 'proposed_monk';
		$items[] = 'proposed_lay';
		$items[] = 'proposed_total';
		$items[] = 'additional_appointment';
		$items[] = 'piriven_teacher_name';
		$items[] = 'jobtitle_subject';
		$items[] = 'highedu_subjects';
		$items[] = 'teacher_rej_no';
		 
		 



        $data = elements($items, $_POST);

        /* 		 $data['datei'] = date('Y-m-d', strtotime($this->input->post('datei')));
          $data['dateii'] = date('Y-m-d', strtotime($this->input->post('dateii'))); */
          $data['datevi'] = date('Y-m-d', strtotime($this->input->post('datevi')));
          $data['datevii'] = date('Y-m-d', strtotime($this->input->post('datevii')));
          $data['dateviii'] = date('Y-m-d', strtotime($this->input->post('dateviii')));



        $data['teacher_app_id'] = $teacher_app_id;
        $data['school_id'] = $this->session->userdata('school_id');
        $data['status'] = 1;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = logged_in_user_id();
		
		 
		  if ($_FILES['t2_kruthy_sig1']['name']) {
            $data['t2_kruthy_sig1'] = $this->_upload_t2_kruthy_sig1();
        }
		
		

        $this->forms->insert('new_teacher_app_02', $data);
		
		 return $data;
    }
	
	 private function _upload_t2_kruthy_sig1() {

        $prev_t2_kruthy_sig1= $this->input->post('prev_t2_kruthy_sig1');
        $t2_kruthy_sig1 = $_FILES['t2_kruthy_sig1']['name'];
        $t2_kruthy_sig1_type = $_FILES['t2_kruthy_sig1']['type'];
        $return_t2_kruthy_sig1 = '';
        if ($t2_kruthy_sig1 != "") {
            if ($t2_kruthy_sig1_type == 'image/jpeg' || $t2_kruthy_sig1_type == 'image/pjpeg' ||
                    $t2_kruthy_sig1_type == 'image/jpg' || $t2_kruthy_sig1_type == 'image/png' ||
                    $t2_kruthy_sig1_type == 'image/x-png' || $t2_kruthy_sig1_type == 'image/gif') {

                $destination = 'assets/uploads/forms/teacher_application/';

                $file_type = explode(".", $t2_kruthy_sig1);
                $extension = strtolower($file_type[count($file_type) - 1]);
                $t2_kruthy_sig1_path = 'photo-' . time() . '-sms.' . $extension;

                move_uploaded_file($_FILES['t2_kruthy_sig1']['tmp_name'], $destination . $t2_kruthy_sig1_path);

                // need to unlink previous mother_photo
                if ($prev_t2_kruthy_sig1 != "") {
                    if (file_exists($destination . $prev_t2_kruthy_sig1)) {
                        @unlink($destination . $prev_t2_kruthy_sig1);
                    }
                }

                $return_t2_kruthy_sig1 = $t2_kruthy_sig1_path;
            }
        } else {
            $return_t2_kruthy_sig1 = $prev_t2_kruthy_sig1;
        }

        return $return_t2_kruthy_sig1;
    }
	
	
	private function _save_teacherapp_data2_subclass($teacher_app_id) {

        $school_id = $this->input->post('school_id');

        foreach ($this->input->post('subclass1') as $key => $value) {

            if ($value) {

                $data = array();
                $exist = '';
                //$stop_id = @$this->input->post('stop_id')[$key];
                $tea_id = @$_POST['teacher_app_id'][$key];

                if ($tea_id) {
                    $exist = $this->forms->get_single('new_teacher_app_02_class_sub', array('teacher_app_id' => $teacher_app_id, 'id' => $tea_id));
                }

                $data['school_id'] = $school_id;
                $data['subclass1'] = $value;
                $data['subsubject1'] = @$_POST['subsubject1'][$key];
                $data['subperiods1'] = @$_POST['subperiods1'][$key];
                $data['subhours1'] = @$_POST['subhours1'][$key];
                $data['subminuts'] = @$_POST['subminuts1'][$key];

                if ($this->input->post('teacher_app_id') && $exist) {

                    $data['modified_at'] = date('Y-m-d H:i:s');
                    $data['modified_by'] = logged_in_user_id();
                    $this->forms->update('new_teacher_app_02_class_sub', $data, array('id' => $exist->id));
                } else {

                    $data['teacher_app_id'] = $teacher_app_id;
                    $data['status'] = 1;
                    $data['created_at'] = date('Y-m-d H:i:s');
                    $data['created_by'] = logged_in_user_id();
                    $this->forms->insert('new_teacher_app_02_class_sub', $data);
                }
            }
        }
    }
	
	
	
	 public function _get_teacherapp_data3($teacher_app_id) {

        $items = array();
		 
		$items[] = 'kpiriven_name1';
		$items[] = 'kpiriven_type';
		$items[] = 'kcount';
		$items[] = 'zonal_office';
		$items[] = 'asst_province_type';
		$items[] = 'asst_province_name';
		$items[] = 'asst_province_pname';
		$items[] = 'asst_province_ptype';
		$items[] = 'recommentaion';
		$items[] = 'min_piriven_name';
		$items[] = 'min_piriven_type';
		$items[] = 'true_not';
		$items[] = 'approved_not';
		$items[] = 'submition';
		$items[] = 'given_not';
		$items[] = 'min_note';
		
		 



        $data = elements($items, $_POST);

        /* 		 $data['datei'] = date('Y-m-d', strtotime($this->input->post('datei')));
          $data['dateii'] = date('Y-m-d', strtotime($this->input->post('dateii'))); */
          $data['dateix'] = date('Y-m-d', strtotime($this->input->post('dateix')));
          $data['datex'] = date('Y-m-d', strtotime($this->input->post('datex')));
          $data['datexi'] = date('Y-m-d', strtotime($this->input->post('datexi')));
          $data['datexii'] = date('Y-m-d', strtotime($this->input->post('datexii')));
          $data['datexiii'] = date('Y-m-d', strtotime($this->input->post('datexiii')));
          $data['datexiv'] = date('Y-m-d', strtotime($this->input->post('datexiv')));
          $data['datexv'] = date('Y-m-d', strtotime($this->input->post('datexv')));



        $data['teacher_app_id'] = $teacher_app_id;
        $data['school_id'] = $this->session->userdata('school_id');
        $data['status'] = 1;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = logged_in_user_id();
		
		 if ($_FILES['officer_sig1']['name']) {
           $data['officer_sig1'] = $this->_upload_officer_sig1();
       }
		
		 	 if ($_FILES['zonal_sig1']['name']) {
           $data['zonal_sig1'] = $this->_upload_zonal_sig1();
       }
				 
		if ($_FILES['zonalstamp_sig2']['name']) {
           $data['zonalstamp_sig2'] = $this->_upload_zonalstamp_sig2();
       }
		 
		 		 
		if ($_FILES['asst_province_sig1']['name']) {
           $data['asst_province_sig1'] = $this->_upload_asst_province_sig1();
       }
		
		 		 
		if ($_FILES['asst_provincestamp_sig2']['name']) {
           $data['asst_provincestamp_sig2'] = $this->_upload_asst_provincestamp_sig2();
       }
		
		  		 
	    if ($_FILES['edu_clerk_sig1']['name']) {
           $data['edu_clerk_sig1'] = $this->_upload_edu_clerk_sig1();
       }
		
		 if ($_FILES['asdic_sig']['name']) {
           $data['asdic_sig'] = $this->_upload_asdic_sig();
       }
		 
	  if ($_FILES['commitee_mem_sig']['name']) {
           $data['commitee_mem_sig'] = $this->_upload_commitee_mem_sig();
       }
		 
	  if ($_FILES['min_director_sig']['name']) {
           $data['min_director_sig'] = $this->_upload_min_director_sig();
       }
		
		

        $this->forms->insert('new_teacher_app_03', $data);
		
		 return $data;
    }
	
	
	private function _upload_officer_sig1() {

        $prev_officer_sig1 = $this->input->post('prev_officer_sig1');
        $officer_sig1 = $_FILES['officer_sig1']['name'];
        $officer_sig1_type = $_FILES['officer_sig1']['type'];
        $return_officer_sig1 = '';
        if ($officer_sig1 != "") {
            if ($officer_sig1_type == 'image/jpeg' || $officer_sig1_type == 'image/pjpeg' ||
                    $officer_sig1_type == 'image/jpg' || $officer_sig1_type == 'image/png' ||
                    $officer_sig1_type == 'image/x-png' || $officer_sig1_type == 'image/gif') {

                $destination = 'assets/uploads/forms/teacher_application/';

                $file_type = explode(".", $officer_sig1);
                $extension = strtolower($file_type[count($file_type) - 1]);
                $officer_sig1_path = 'photo-' . time() . '-sms.' . $extension;

                move_uploaded_file($_FILES['officer_sig1']['tmp_name'], $destination . $officer_sig1_path);

                // need to unlink previous mother_photo
                if ($prev_officer_sig1 != "") {
                    if (file_exists($destination . $prev_officer_sig1)) {
                        @unlink($destination . $prev_officer_sig1);
                    }
                }

                $return_officer_sig1 = $officer_sig1_path;
            }
        } else {
            $return_officer_sig1 = $prev_officer_sig1;
        }

        return $return_officer_sig1;
    }
	
	
	private function _upload_zonal_sig1() {

        $prev_zonal_sig1 = $this->input->post('prev_zonal_sig1');
        $zonal_sig1 = $_FILES['zonal_sig1']['name'];
        $zonal_sig1_type = $_FILES['zonal_sig1']['type'];
        $return_zonal_sig1 = '';
        if ($zonal_sig1 != "") {
            if ($zonal_sig1_type == 'image/jpeg' || $zonal_sig1_type == 'image/pjpeg' ||
                    $zonal_sig1_type == 'image/jpg' || $zonal_sig1_type == 'image/png' ||
                    $zonal_sig1_type == 'image/x-png' || $zonal_sig1_type == 'image/gif') {

                $destination = 'assets/uploads/forms/teacher_application/';

                $file_type = explode(".", $zonal_sig1);
                $extension = strtolower($file_type[count($file_type) - 1]);
                $zonal_sig1_path = 'photo-' . time() . '-sms.' . $extension;

                move_uploaded_file($_FILES['zonal_sig1']['tmp_name'], $destination . $zonal_sig1_path);

                // need to unlink previous mother_photo
                if ($prev_zonal_sig1 != "") {
                    if (file_exists($destination . $prev_zonal_sig1)) {
                        @unlink($destination . $prev_zonal_sig1);
                    }
                }

                $return_zonal_sig1 = $zonal_sig1_path;
            }
        } else {
            $return_zonal_sig1 = $prev_zonal_sig1;
        }

        return $return_zonal_sig1;
    }
	
	private function _upload_zonalstamp_sig2() {

        $prev_zonalstamp_sig2 = $this->input->post('prev_zonalstamp_sig2');
        $zonalstamp_sig2 = $_FILES['zonalstamp_sig2']['name'];
        $zonalstamp_sig2_type = $_FILES['zonalstamp_sig2']['type'];
        $return_zonalstamp_sig2 = '';
        if ($zonalstamp_sig2 != "") {
            if ($zonalstamp_sig2_type == 'image/jpeg' || $zonalstamp_sig2_type == 'image/pjpeg' ||
                    $zonalstamp_sig2_type == 'image/jpg' || $zonalstamp_sig2_type == 'image/png' ||
                    $zonalstamp_sig2_type == 'image/x-png' || $zonalstamp_sig2_type == 'image/gif') {

                $destination = 'assets/uploads/forms/teacher_application/';

                $file_type = explode(".", $zonalstamp_sig2);
                $extension = strtolower($file_type[count($file_type) - 1]);
                $zonalstamp_sig2_path = 'photo-' . time() . '-sms.' . $extension;

                move_uploaded_file($_FILES['zonalstamp_sig2']['tmp_name'], $destination . $zonalstamp_sig2_path);

                // need to unlink previous mother_photo
                if ($prev_zonalstamp_sig2 != "") {
                    if (file_exists($destination . $prev_zonalstamp_sig2)) {
                        @unlink($destination . $prev_zonalstamp_sig2);
                    }
                }

                $return_zonalstamp_sig2 = $zonalstamp_sig2_path;
            }
        } else {
            $return_zonalstamp_sig2 = $prev_zonalstamp_sig2;
        }

        return $return_zonalstamp_sig2;
    }
	
	
	private function _upload_asst_province_sig1() {

        $prev_asst_province_sig1 = $this->input->post('prev_asst_province_sig1');
        $asst_province_sig1 = $_FILES['asst_province_sig1']['name'];
        $asst_province_sig1_type = $_FILES['asst_province_sig1']['type'];
        $return_asst_province_sig1 = '';
        if ($asst_province_sig1 != "") {
            if ($asst_province_sig1_type == 'image/jpeg' || $asst_province_sig1_type == 'image/pjpeg' ||
                    $asst_province_sig1_type == 'image/jpg' || $asst_province_sig1_type == 'image/png' ||
                    $asst_province_sig1_type == 'image/x-png' || $asst_province_sig1_type == 'image/gif') {

                $destination = 'assets/uploads/forms/teacher_application/';

                $file_type = explode(".", $asst_province_sig1);
                $extension = strtolower($file_type[count($file_type) - 1]);
                $asst_province_sig1_path = 'photo-' . time() . '-sms.' . $extension;

                move_uploaded_file($_FILES['asst_province_sig1']['tmp_name'], $destination . $asst_province_sig1_path);

                // need to unlink previous mother_photo
                if ($prev_asst_province_sig1 != "") {
                    if (file_exists($destination . $prev_asst_province_sig1)) {
                        @unlink($destination . $prev_asst_province_sig1);
                    }
                }

                $return_asst_province_sig1 = $asst_province_sig1_path;
            }
        } else {
            $return_asst_province_sig1 = $prev_asst_province_sig1;
        }

        return $return_asst_province_sig1;
    }
	
	
	private function _upload_asst_provincestamp_sig2() {

        $prev_asst_provincestamp_sig2 = $this->input->post('prev_asst_provincestamp_sig2');
        $asst_provincestamp_sig2 = $_FILES['asst_provincestamp_sig2']['name'];
        $asst_provincestamp_sig2_type = $_FILES['asst_provincestamp_sig2']['type'];
        $return_asst_provincestamp_sig2 = '';
        if ($asst_provincestamp_sig2 != "") {
            if ($asst_provincestamp_sig2_type == 'image/jpeg' || $asst_provincestamp_sig2_type == 'image/pjpeg' ||
                    $asst_provincestamp_sig2_type == 'image/jpg' || $asst_provincestamp_sig2_type == 'image/png' ||
                    $asst_provincestamp_sig2_type == 'image/x-png' || $asst_provincestamp_sig2_type == 'image/gif') {

                $destination = 'assets/uploads/forms/teacher_application/';

                $file_type = explode(".", $asst_provincestamp_sig2);
                $extension = strtolower($file_type[count($file_type) - 1]);
                $asst_provincestamp_sig2_path = 'photo-' . time() . '-sms.' . $extension;

                move_uploaded_file($_FILES['asst_provincestamp_sig2']['tmp_name'], $destination . $asst_provincestamp_sig2_path);

                // need to unlink previous mother_photo
                if ($prev_asst_provincestamp_sig2 != "") {
                    if (file_exists($destination . $prev_asst_provincestamp_sig2)) {
                        @unlink($destination . $prev_asst_provincestamp_sig2);
                    }
                }

                $return_asst_provincestamp_sig2 = $asst_provincestamp_sig2_path;
            }
        } else {
            $return_asst_provincestamp_sig2 = $prev_asst_provincestamp_sig2;
        }

        return $return_asst_provincestamp_sig2;
    }
	
	
	private function _upload_edu_clerk_sig1() {

        $prev_edu_clerk_sig1 = $this->input->post('prev_edu_clerk_sig1');
        $edu_clerk_sig1 = $_FILES['edu_clerk_sig1']['name'];
        $edu_clerk_sig1_type = $_FILES['edu_clerk_sig1']['type'];
        $return_edu_clerk_sig1 = '';
        if ($edu_clerk_sig1 != "") {
            if ($edu_clerk_sig1_type == 'image/jpeg' || $edu_clerk_sig1_type == 'image/pjpeg' ||
                    $edu_clerk_sig1_type == 'image/jpg' || $edu_clerk_sig1_type == 'image/png' ||
                    $edu_clerk_sig1_type == 'image/x-png' || $edu_clerk_sig1_type == 'image/gif') {

                $destination = 'assets/uploads/forms/teacher_application/';

                $file_type = explode(".", $edu_clerk_sig1);
                $extension = strtolower($file_type[count($file_type) - 1]);
                $edu_clerk_sig1_path = 'photo-' . time() . '-sms.' . $extension;

                move_uploaded_file($_FILES['edu_clerk_sig1']['tmp_name'], $destination . $edu_clerk_sig1_path);

                // need to unlink previous mother_photo
                if ($prev_edu_clerk_sig1 != "") {
                    if (file_exists($destination . $prev_edu_clerk_sig1)) {
                        @unlink($destination . $prev_edu_clerk_sig1);
                    }
                }

                $return_edu_clerk_sig1 = $edu_clerk_sig1_path;
            }
        } else {
            $return_edu_clerk_sig1 = $prev_edu_clerk_sig1;
        }

        return $return_edu_clerk_sig1;
    }
	
	
	private function _upload_asdic_sig() {

        $prev_asdic_sig = $this->input->post('prev_asdic_sig');
        $asdic_sig = $_FILES['asdic_sig']['name'];
        $asdic_sig_type = $_FILES['asdic_sig']['type'];
        $return_asdic_sig = '';
        if ($asdic_sig != "") {
            if ($asdic_sig_type == 'image/jpeg' || $asdic_sig_type == 'image/pjpeg' ||
                    $asdic_sig_type == 'image/jpg' || $asdic_sig_type == 'image/png' ||
                    $asdic_sig_type == 'image/x-png' || $asdic_sig_type == 'image/gif') {

                $destination = 'assets/uploads/forms/teacher_application/';

                $file_type = explode(".", $asdic_sig);
                $extension = strtolower($file_type[count($file_type) - 1]);
                $asdic_sig_path = 'photo-' . time() . '-sms.' . $extension;

                move_uploaded_file($_FILES['asdic_sig']['tmp_name'], $destination . $asdic_sig_path);

                // need to unlink previous mother_photo
                if ($prev_asdic_sig != "") {
                    if (file_exists($destination . $prev_asdic_sig)) {
                        @unlink($destination . $prev_asdic_sig);
                    }
                }

                $return_asdic_sig = $asdic_sig_path;
            }
        } else {
            $return_asdic_sig = $prev_asdic_sig;
        }

        return $return_asdic_sig;
    }
	
	
    private function _upload_commitee_mem_sig() {

        $prev_commitee_mem_sig = $this->input->post('prev_commitee_mem_sig');
        $commitee_mem_sig = $_FILES['commitee_mem_sig']['name'];
        $commitee_mem_sig_type = $_FILES['commitee_mem_sig']['type'];
        $return_commitee_mem_sig = '';
        if ($commitee_mem_sig != "") {
            if ($commitee_mem_sig_type == 'image/jpeg' || $commitee_mem_sig_type == 'image/pjpeg' ||
                    $commitee_mem_sig_type == 'image/jpg' || $commitee_mem_sig_type == 'image/png' ||
                    $commitee_mem_sig_type == 'image/x-png' || $commitee_mem_sig_type == 'image/gif') {

                $destination = 'assets/uploads/forms/teacher_application/';

                $file_type = explode(".", $commitee_mem_sig);
                $extension = strtolower($file_type[count($file_type) - 1]);
                $commitee_mem_sig_path = 'photo-' . time() . '-sms.' . $extension;

                move_uploaded_file($_FILES['commitee_mem_sig']['tmp_name'], $destination . $commitee_mem_sig_path);

                // need to unlink previous mother_photo
                if ($prev_commitee_mem_sig != "") {
                    if (file_exists($destination . $prev_commitee_mem_sig)) {
                        @unlink($destination . $prev_commitee_mem_sig);
                    }
                }

                $return_commitee_mem_sig = $commitee_mem_sig_path;
            }
        } else {
            $return_commitee_mem_sig = $prev_commitee_mem_sig;
        }

        return $return_commitee_mem_sig;
    }
	
	
	private function _upload_min_director_sig() {

        $prev_min_director_sig = $this->input->post('prev_min_director_sig');
        $min_director_sig = $_FILES['min_director_sig']['name'];
        $min_director_sig_type = $_FILES['min_director_sig']['type'];
        $return_min_director_sig = '';
        if ($min_director_sig != "") {
            if ($min_director_sig_type == 'image/jpeg' || $min_director_sig_type == 'image/pjpeg' ||
                    $min_director_sig_type == 'image/jpg' || $min_director_sig_type == 'image/png' ||
                    $min_director_sig_type == 'image/x-png' || $min_director_sig_type == 'image/gif') {

                $destination = 'assets/uploads/forms/teacher_application/';

                $file_type = explode(".", $min_director_sig);
                $extension = strtolower($file_type[count($file_type) - 1]);
                $min_director_sig_path = 'photo-' . time() . '-sms.' . $extension;

                move_uploaded_file($_FILES['min_director_sig']['tmp_name'], $destination . $min_director_sig_path);

                // need to unlink previous mother_photo
                if ($prev_asdic_sig != "") {
                    if (file_exists($destination . $prev_min_director_sig)) {
                        @unlink($destination . $prev_min_director_sig);
                    }
                }

                $return_min_director_sig = $min_director_sig_path;
            }
        } else {
            $return_min_director_sig = $prev_min_director_sig;
        }

        return $return_min_director_sig;
    }


	
//PRINT--------------
    public function teacher_application_print($id) {

        //check_permission(VIEW);
        $this->data['schools'] = $this->forms->get_school_by_idno($conschoolid);
        $this->data['forms'] = $this->forms->get_single_teacher_application_print($id); /* see in modal */


        create_log('Has been generate the teacher application form : ' . $this->data['forms']->name);

        $this->layout->title($this->lang->line('teacher_application_form') . ' | ' . SMS);
        $this->load->view('teacherapplication/teacher_application_print', $this->data);
    }
//DELET-----------------
    public function teacherapplicationformdelete($id = null) {

       if(!is_numeric($id)){
             error($this->lang->line('unexpected_error'));
             redirect('forms/formsapply/teacherapplicationform');       
        }
       // $this->data['academic_years'] = $this->forms->get_list('academic_years', array('status' => 1, 'school_id' => $school_id));
        $forms = $this->forms->get_single('new_teacher_app_01', array('id' => $id));
        if (!empty($forms)) {

            // delete new_teacher_app_01 data
            $this->forms->delete('new_teacher_app_01', array('id' => $id));
			
			// delete  new_teacher_app_01_i data
            $this->forms->delete('new_teacher_app_01_i', array('teacher_app_id' => $id));
			
			// delete new_teacher_app_01_working data
            $this->forms->delete('new_teacher_app_01_working', array('teacher_app_id' => $id));
			
		  // delete  new_teacher_app_02 data
            $this->forms->delete('new_teacher_app_02', array('teacher_app_id' => $id));
			
			 // delete  new_teacher_app_02_class_sub data
            $this->forms->delete('new_teacher_app_02_class_sub', array('teacher_app_id' => $id));
						
			 // delete  new_teacher_app_03 data
            $this->forms->delete('new_teacher_app_03', array('teacher_app_id' => $id));
			
			 // delete employee resume and photo
            $destination = 'assets/uploads/forms/';
			if (file_exists($destination . '/teacher_application/' . $forms->applicant_sig1)) {
                @unlink($destination . '/teacher_application/' . $forms->applicant_sig1);
            }
			
			 // delete employee resume and photo
            $destination = 'assets/uploads/forms/';
			if (file_exists($destination . '/teacher_application/' . $forms->t2_kruthy_sig1)) {
                @unlink($destination . '/teacher_application/' . $forms->t2_kruthy_sig1);
            }
			
			 // delete employee resume and photo
            $destination = 'assets/uploads/forms/';
			if (file_exists($destination . '/teacher_application/' . $forms->officer_sig1)) {
                @unlink($destination . '/teacher_application/' . $forms->officer_sig1);
            }
			
			 // delete employee resume and photo
            $destination = 'assets/uploads/forms/';
			if (file_exists($destination . '/teacher_application/' . $forms->zonal_sig1)) {
                @unlink($destination . '/teacher_application/' . $forms->zonal_sig1);
            }
			
			 // delete employee resume and photo
            $destination = 'assets/uploads/forms/';
			if (file_exists($destination . '/teacher_application/' . $forms->zonalstamp_sig1)) {
                @unlink($destination . '/teacher_application/' . $forms->zonalstamp_sig1);
            }


            // delete employee resume and photo
           /* $destination = 'assets/uploads/';
			if (file_exists($destination . '/form/' . $forms->sig1_photo)) {
                @unlink($destination . '/form/' . $forms->sig1_photo);
            }
			if (file_exists($destination . '/form/' . $forms->sig2_photo)) {
                @unlink($destination . '/form/' . $forms->sig2_photo);
            }
			if (file_exists($destination . '/form/' . $forms->sig3_photo)) {
                @unlink($destination . '/form/' . $forms->sig3_photo);
            }
            if (file_exists($destination . '/form/' . $forms->sig4_photo)) {
                @unlink($destination . '/form/' . $forms->sig4_photo);
            }
            if (file_exists($destination . '/form/' . $forms->sig5_photo)) {
                @unlink($destination . '/form/' . $forms->sig5_photo);
            }
            */
            create_log('Has been deleted a Teacher Application Form : '.$forms->name);
            success($this->lang->line('delete_success'));
			
            
        } else {
            error($this->lang->line('delete_failed'));
        }
        
        redirect('forms/formsapply/teacherapplicationform'.$forms->conschoolid);
    }
	

    public function confirm($id = null) {

           //    check_permission(EDIT);

        if (!is_numeric($id)) {
            error($this->lang->line('unexpected_error'));
            redirect('forms/formsapply/teacherapplicationform');
        }
     
        $condition = array();
        $condition['status'] = 1;
        if ($this->session->userdata('role_id') != SUPER_ADMIN) {
            $condition['school_id'] = $this->session->userdata('school_id');
            //   $this->data['edit_vehicles'] = $this->route->get_vehicle_list($condition['school_id'], $this->data['route']->id); 
        }
        
         if ($id) {
            $this->data['route'] = $this->forms->get_single('new_teacher_app_01', array('id' => $id));

            if (!$this->data['route']) {
               redirect('forms/formsapply/teacherapplicationform');
            }
        }
        
        if ($_POST) {
            $this->_prepare_confirm_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_confirm_data();
                $updated = $this->forms->update('new_teacher_app_01', $data, array('id' => $this->input->post('id')));

                if ($updated) {

                    // $this->_save_prozo($this->input->post('id'));
                    success($this->lang->line('confirm'));
                     redirect('forms/formsapply/teacherapplicationform' . $data['school_id']);
                } else {
                    error($this->lang->line('update_failed'));
                    redirect('forms/formsapply/confirm/' . $this->input->post('id'));
                }
            } else {
                error($this->lang->line('update_failed'));
                $this->data['route'] = $this->forms->get_single('new_teacher_app_01', array('id' => $this->input->post('id')));
            }
        }

//        $this->data['routes'] = $this->route->get_route_list($this->data['route']->school_id);
//        $this->data['route_stops'] = $this->route->get_list('prom_programme', array('status' => 1, 'prozo_id' => $id), '', '', '', '', 'id', 'ASC');

        $this->data['school_id'] = $this->data['route']->school_id;
        $this->data['filter_school_id'] = $this->data['route']->school_id;
        $this->data['schools'] = $this->schools;
        $this->data['edit'] = TRUE;
        $this->layout->title($this->lang->line('edit') . ' | ' . SMS);
        $this->layout->view('teacherapplication/indexconfirm', $this->data);
    }

    private function _prepare_confirm_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error-message" style="color: red;">', '</div>');

//        $this->form_validation->set_rules('school_id', $this->lang->line('school_name'), 'trim|required');
        $this->form_validation->set_rules('id', $this->lang->line('month'), 'trim|required');
//        $this->form_validation->set_rules('title', $this->lang->line('prozo') . ' ' . $this->lang->line('title'), 'trim|required|callback_title');
//        $this->form_validation->set_rules('date', $this->lang->line('date'), 'trim|required');
//        $this->form_validation->set_rules('prozo', $this->lang->line('prozo'), 'trim|required');
    }

    
      private function _get_posted_confirm_data() {

        $items = array();
//        $items[] = 'school_id';
//        $items[] = 'title';
//        $items[] = 'route_start';
//        $items[] = 'route_end';
        $items[] = 'note';

        $data = elements($items, $_POST);

        $data['cur_status'] = 2;
        $data['confirmstatus'] = 2;
        $data['confirm_at'] = date('Y-m-d H:i:s');
        $data['confirm_by'] = logged_in_user_id();


        return $data;
    }
	
 //EDIT----------------------
	public function teacherapplicationformedit($id = null) {
		

        $conschoolid = $this->session->userdata('school_id');
		//$message = "wrong answer";
//		  echo("dddddddddd");
        if ($_POST) {

 
            $this->_prepare_teacherapp_validation();
            if ($this->form_validation->run() === TRUE) {
				 // echo "<script type='text/javascript'>alert('$message');</script>";
                $data = $this->_get_teacherapp_data1(); //method for db
                $updated = $this->forms->update('new_teacher_app_01', $data, array('id' => $this->input->post('schlform_id')));

                if ($updated) {
                    /*$this->_get_teacherapp_data1_i($this->input->post('id'));*/
					/*$this->__update_new_teacher_app_01_i();
					$this->_edit_teacherapp_data1_i($schlform_id);*/
					
                    success($this->lang->line('update_success'));
                    redirect('forms/formsapply/teacherapplicationform' . $data['id']);
                } else {
                    error($this->lang->line('update_failed'));
                    redirect('forms/formsapply/teacherapplicationformedit/' . $this->input->post('schlform_id'));
                }
            } else {
                error($this->lang->line('update_failed'));
                $this->data['forms'] = $this->forms->get_single_teacher_application_form($this->input->post('id'));
            }
        }

        if ($id) {
            $this->data['forms'] = $this->forms->get_single_teacher_application_form($id);
			$this->data['forms1'] = $this->forms->get_new_teacher_app_01_i($id);
			$this->data['forms2'] = $this->forms->get_new_teacher_app_02($id);
			$this->data['forms3'] = $this->forms->get_new_teacher_app_03($id);

            if (!$this->data['forms']) {
                redirect('forms/formsapply/teacherapplicationform');
            }
        }

        $this->data['teacherapplicationformval'] = $this->forms->get_teacherapplicationformval($conschoolid);
        $this->data['schools'] = $this->forms->get_school_by_idno($conschoolid);

        $this->data['edit'] = TRUE;
        $this->layout->title($this->lang->line('edit') . ' | ' . SMS);
        $this->layout->view('teacherapplication/index_teacher_application', $this->data);
    }
	
/*  private function _edit_teacherapp_data1_i($schlform_id) {

          $school = $this->forms->get_school_by_idno($this->input->post('school_id'));

	  
	  
	    $items = array();
        $items['exam_name'] =  $this->input->post('exam_name');
        $items[] = 'year_h1';
        $items[] = 'year_h2';
        $items[] = 'exam_noh1';
        $items[] = 'exam_noh2';
		
        $items[] = 'hex1_sub1'; 
		$items[] = 'hex1_sub1_grade';
		$items[] = 'hex1_sub2'; 
		$items[] = 'hex1_sub2_grade';
		$items[] = 'hex1_sub3'; 
		$items[] = 'hex1_sub3_grade';
		$items[] = 'hex1_sub4'; 
		$items[] = 'hex1_sub4_grade';
		$items[] = 'hex1_sub5'; 
		$items[] = 'hex1_sub5_grade';
	    $items[] = 'hex1_sub6'; 
		$items[] = 'hex1_sub6_grade';
	    $items[] = 'hex1_sub7'; 
		$items[] = 'hex1_sub7_grade';
		$items[] = 'hex1_sub8'; 
		$items[] = 'hex1_sub8_grade';
	    $items[] = 'hex1_sub9'; 
		$items[] = 'hex1_sub9_grade';
	    $items[] = 'hex1_sub10'; 
		$items[] = 'hex1_sub10_grade';
		
		$items[] = 'hex2_sub1';
        $items[] = 'hex2_sub1_grade';
        $items[] = 'hex2_sub2';
        $items[] = 'hex2_sub2_grade';
	    $items[] = 'hex2_sub3';
        $items[] = 'hex2_sub3_grade';
		$items[] = 'hex2_sub4';
        $items[] = 'hex2_sub4_grade';
		$items[] = 'hex2_sub5';
        $items[] = 'hex2_sub5_grade';
		$items[] = 'hex2_sub6';
        $items[] = 'hex2_sub6_grade';
		$items[] = 'hex2_sub7';
        $items[] = 'hex2_sub7_grade';
		$items[] = 'hex2_sub8'; 
		$items[] = 'hex2_sub8_grade';
	    $items[] = 'hex2_sub9'; 
		$items[] = 'hex2_sub9_grade';
	    $items[] = 'hex2_sub10'; 
		$items[] = 'hex2_sub10_grade';
		
		$items[] = 'other_qualifications';
		$items[] = 'yes_no';
		$items[] = 'leave_reson';
		$items[] = 'piriven_name1';
		$items[] = 'piriven_type';


        $data = elements($items, $_POST);

   
        $data['datehi'] = date('Y-m-d', strtotime($this->input->post('datehi')));
        $data['datehii'] = date('Y-m-d', strtotime($this->input->post('datehii')));
        $data['dateiv'] = date('Y-m-d', strtotime($this->input->post('dateiv')));
        $data['datev'] = date('Y-m-d', strtotime($this->input->post('datev')));


        $data['teacher_app_id'] = $teacher_app_id;
        $data['school_id'] = $this->session->userdata('school_id');
        $data['status'] = 1;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = logged_in_user_id();
	  $data['modified_at'] = date('Y-m-d H:i:s');
        $data['modified_by'] = logged_in_user_id();
		
		 if ($_FILES['applicant_sig1']['name']) {
            $data['applicant_sig1'] = $this->_upload_applicant_sig1();
        }
		
		

        $this->forms->insert('new_teacher_app_01_i', $data);
		
		 return $data;
    }
*/
	

}
