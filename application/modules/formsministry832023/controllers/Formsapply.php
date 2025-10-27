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
	$conschoolid = array();
        $conschoolid['status'] = 1;

        $conschoolid = $this->session->userdata('school_id');
         $zonal_id = $this->session->userdata('zonal_id');

        //$this->data['schools'] = $this->report->get_single('schools', array('id' => $conschoolid));
        $this->data['teacherapplicationformval'] = $this->forms->get_applicationpending_list($conschoolid,$zonal_id);
        $this->data['schools'] = $this->forms->get_school_by_idno($conschoolid);

        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('teacher_applicatin_form') . ' | ' . SMS);
        $this->layout->view('teacherapplication/index_teacher_application', $this->data);
    }



    private function _prepare_teacherapp_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error-message" style="color: red;">', '</div>');
        $this->form_validation->set_rules('person1', $this->lang->line('person1'), 'trim|required');
        /*   $this->form_validation->set_rules('sch_year', $this->lang->line('year'), 'trim|required');
          $this->form_validation->set_rules('fdate', $this->lang->line('fdate'), 'trim'); */
        //$this->form_validation->set_rules('sig1', $this->lang->line('photo'), 'trim|callback_photo');
        //$this->form_validation->set_rules('photo', $this->lang->line('photo'), 'trim|callback_photo');
    }

    private function _get_teacherapp_data1() {

        $items = array();

        $items[] = 'school_id';
        $items[] = 'person1';
        $items[] = 'initial_name_s';
        $items[] = 'full_name_s';
        $items[] = 'initial_name_e';
        $items[] = 'red_address';
        $items[] = 'nationality';
        $items[] = 'nic_no';
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

    public function get_single_teacher_application_form() {

        $teacherapplicationform_id = $this->input->post('teacherapplicationform_id');
        $this->data['forms'] = $this->forms->get_single_teacher_application_form($teacherapplicationform_id);

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

    public function _get_teacherapp_data1_i($teacherapp_id) {

        $items = array();
        $items[] = 'exam_name';

        $items[] = 'yearh1';
        $items[] = 'exam_noh1';

        $data = elements($items, $_POST);

        /* 		 $data['datei'] = date('Y-m-d', strtotime($this->input->post('datei')));
          $data['dateii'] = date('Y-m-d', strtotime($this->input->post('dateii'))); */



        $data['teacher_app_id'] = $teacherapp_id;
        $data['school_id'] = $this->session->userdata('school_id');
        $data['status'] = 1;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = logged_in_user_id();

        $this->forms->insert('new_teacher_app_01_i', $data);
    }

    public function teacher_application_print($id) {

        //check_permission(VIEW);
        $this->data['schools'] = $this->forms->get_school_by_idno($conschoolid);
        $this->data['forms'] = $this->forms->get_single_teacher_application_print($id); /* see in modal */


        create_log('Has been generate the teacher application form : ' . $this->data['forms']->name);

        $this->layout->title($this->lang->line('teacher_application_form') . ' | ' . SMS);
        $this->load->view('teacherapplication/teacher_application_print', $this->data);
    }

    public function teacherapplicationformdelete($id = null) {

        if (!is_numeric($id)) {
            error($this->lang->line('unexpected_error'));
            redirect('forms/formsapply/teacherapplicationform');
        }
        // $this->data['academic_years'] = $this->forms->get_list('academic_years', array('status' => 1, 'school_id' => $school_id));
        $forms = $this->forms->get_single('new_teacher_app_01', array('id' => $id));
        if (!empty($forms)) {

            // delete employee data
            $this->forms->delete('new_teacher_app_01', array('id' => $id));

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
              } */

            create_log('Has been deleted a Teacher Application Form : ' . $forms->name);
            success($this->lang->line('delete_success'));
        } else {
            error($this->lang->line('delete_failed'));
        }

        redirect('forms/formsapply/teacherapplicationform' . $forms->conschoolid);
    }

    public function teacherapplicationformedit($id = null) {

        $conschoolid = $this->session->userdata('school_id');
//		  echo("dddddddddd");
        if ($_POST) {

            $this->_prepare_teacherapp_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_teacherapp_data1(); //method for db
                $updated = $this->forms->update('new_teacher_app_01', $data, array('id' => $this->input->post('schlform_id')));

                if ($updated) {

                    /* $this->_get_teacherapp_data1_i($this->input->post('id')); */

                    success($this->lang->line('update_success'));
                    redirect('forms/formsapply/teacherapplicationform' . $data['school_id']);
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

    public function confirm($id = null) {

           //    check_permission(EDIT);

        if (!is_numeric($id)) {
            error($this->lang->line('unexpected_error'));
            redirect('formsministry/formsapply/teacherapplicationform');
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
               redirect('formsministry/formsapply/teacherapplicationform');
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
                     redirect('formsministry/formsapply/teacherapplicationform' . $data['school_id']);
                } else {
                    error($this->lang->line('update_failed'));
                    redirect('formsministry/formsapply/confirm/' . $this->input->post('id'));
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
        $items[] = 'ministrynote';

        $data = elements($items, $_POST);

        $data['cur_status'] = 4;
        $data['ministryconfirmstatus'] = 3;
        $data['ministryconfirm_at'] = date('Y-m-d H:i:s');
        $data['ministryconfirm_by'] = logged_in_user_id();


        return $data;
    }
	
	
	
	    public function approve($id = null) {

           //    check_permission(EDIT);

        if (!is_numeric($id)) {
            error($this->lang->line('unexpected_error'));
            redirect('formsministry/formsapply/teacherapplicationform');
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
               redirect('formsministry/formsapply/teacherapplicationform');
            }
        }
        
        if ($_POST) {
            $this->_prepare_approve_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_approve_data();
                $updated = $this->forms->update('new_teacher_app_01', $data, array('id' => $this->input->post('id')));

                if ($updated) {

                    // $this->_save_prozo($this->input->post('id'));
                    success($this->lang->line('approve'));
                     redirect('formsministry/formsapply/teacherapplicationform' . $data['school_id']);
                } else {
                    error($this->lang->line('update_failed'));
                    redirect('formsministry/formsapply/approve/' . $this->input->post('id'));
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
        $this->layout->view('teacherapplication/indexapprove', $this->data);
    }

    private function _prepare_approve_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error-message" style="color: red;">', '</div>');

//        $this->form_validation->set_rules('school_id', $this->lang->line('school_name'), 'trim|required');
        $this->form_validation->set_rules('id', $this->lang->line('month'), 'trim|required');
//        $this->form_validation->set_rules('title', $this->lang->line('prozo') . ' ' . $this->lang->line('title'), 'trim|required|callback_title');
//        $this->form_validation->set_rules('date', $this->lang->line('date'), 'trim|required');
//        $this->form_validation->set_rules('prozo', $this->lang->line('prozo'), 'trim|required');
    }

    
      private function _get_posted_approve_data() {

        $items = array();
//        $items[] = 'school_id';
//        $items[] = 'title';
//        $items[] = 'route_start';
//        $items[] = 'route_end';
        $items[] = 'ministryapprovenote';

        $data = elements($items, $_POST);

        $data['cur_status'] = 5;
        $data['ministryapprovestatus'] = 4;
        $data['ministryapprove_at'] = date('Y-m-d H:i:s');
        $data['ministryapprove_by'] = logged_in_user_id();


        return $data;
    }
	
	
	
	
	
	
	
    public function indexcom($school_id = null) {

   //check_permission(VIEW);

        $conschoolid = $this->session->userdata('school_id');
         $zonal_id = $this->session->userdata('zonal_id');

        //$this->data['schools'] = $this->report->get_single('schools', array('id' => $conschoolid));
        $this->data['teacherapplicationformval'] = $this->forms->get_applicationapproved_list($conschoolid,$zonal_id);
        $this->data['schools'] = $this->forms->get_school_by_idno($conschoolid);

        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('teacher_applicatin_form') . ' | ' . SMS);
        $this->layout->view('teacherapplication/index_teacher_application', $this->data);
	}

	
	public function reject($id = null) {

        //    check_permission(EDIT);

        if (!is_numeric($id)) {
            error($this->lang->line('unexpected_error'));
            redirect('formsministry/formsapply/teacherapplicationform');
        }

        if ($_POST) {
            $this->_prepare_confirm_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_reject_data();
                $updated = $this->forms->update('new_teacher_app_01', $data, array('id' => $this->input->post('id')));

                if ($updated) {

                    // $this->_save_prozo($this->input->post('id'));
                    success($this->lang->line('confirm'));
                    redirect('formsministry/formsapply/teacherapplicationform/' . $data['school_id']);
                } else {
                    error($this->lang->line('update_failed'));
                    redirect('formsministry/formsapply/teacherapplicationformedit/' . $this->input->post('id'));
                }
            } else {
                error($this->lang->line('update_failed'));
                $this->data['teacherapplicationformval'] = $this->forms->get_single('new_teacher_app_01', array('id' => $this->input->post('id')));
            }
        }

        if ($id) {
            $this->data['teacherapplicationformval'] = $this->forms->get_single('new_teacher_app_01', array('id' => $id));

            if (!$this->data['teacherapplicationformval']) {
                redirect('formsministry/formsapply/teacherapplicationform');
            }
        }


        $condition = array();
        $condition['status'] = 1;
        if ($this->session->userdata('role_id') != SUPER_ADMIN) {
             $conschoolid = $this->session->userdata('school_id');
            //   $this->data['edit_vehicles'] = $this->route->get_vehicle_list($condition['school_id'], $this->data['route']->id); 
        }

         $this->data['schools'] = $this->forms->get_school_by_idno($conschoolid);
        $this->data['route_stops'] = $this->forms->get_list('new_teacher_app_01', array('status' => 1, 'id' => $id), '', '', '', '', 'id', 'ASC');


        $this->data['edit'] = TRUE;
        $this->layout->title($this->lang->line('edit') . ' | ' . SMS);
        $this->layout->view('formsministry/formsapply/indexreject', $this->data);
    }
	
	  private function _get_posted_reject_data() {

        $items = array();
//        $items[] = 'school_id';
//        $items[] = 'title';
//        $items[] = 'route_start';
//        $items[] = 'route_end';
//        $items[] = 'note';

        $data = elements($items, $_POST);

        $data['cur_status'] = 7;
        $data['approved_status'] = 1;
        $data['reject_status'] = 2;
        $data['reject_at'] = date('Y-m-d H:i:s');
        $data['reject_by'] = logged_in_user_id();


        return $data;
    }

	
	
	
	

}
