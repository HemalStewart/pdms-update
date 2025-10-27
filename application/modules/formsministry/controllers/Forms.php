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

class Forms extends My_Controller {

    public $data = array();
    public $date_from = '';
    public $date_to = '';

    public function __construct() {
        parent::__construct();

        $this->load->model('Forms_Model', 'forms', true);
       

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

    public function teachertransferform($school_id = null) {


        //check_permission(VIEW);

        $conschoolid = $this->session->userdata('school_id');


        //$this->data['schools'] = $this->report->get_single('schools', array('id' => $conschoolid));
        $this->data['teachertransferformval'] = $this->forms->get_teachertransferformval($conschoolid);
        $this->data['schools'] = $this->forms->get_school_by_id($conschoolid);

        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('teacher_transfer_form') . ' | ' . SMS);
        $this->layout->view('teachertransfer/index_teacher_transfer', $this->data);
    }

   
	/*     * ***************Function add**********************************
     * @type            : Function
     * @function name   : add
     * @description     : Load "Add new Language" user interface                 
     *                    and process to store "Language" column into database 
     * @param           : null
     * @return          : null 
     * ********************************************************** */

    public function teachertransferformadd() {


        $conschoolid = $this->session->userdata('school_id');

        if ($_POST) {
            $this->_prepare_teachertransferform_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_teachertransferform_data();//method for db
               

                $insert_id = $this->forms->insert('teacher_transfer', $data);//db 
				
                //$insert_id2 = $this->report->insert('annual_report_02', $data);
                if ($insert_id) {
					//$this->_get_annual_data1_i($insert_id);
			

                    create_log('Has been added a Teacher Transfer Form : ' . $data['title']);

                    success($this->lang->line('insert_success'));
                    redirect('forms/teachertransferform');
                } else {
                    error($this->lang->line('insert_failed'));
                    redirect('forms/teachertransferformadd');
                }
            } else {
                error($this->lang->line('insert_failed'));
                $this->data['post'] = $_POST;
            }
        }

        $this->data['teachertransferformval'] = $this->forms->get_teachertransferformval($conschoolid);
        //$this->data['teaworkreportval'] = $this->report->get_teaworkreportval('teacher_performance_01', array('status' => 1), '', '', '', 'id', 'ASC');


        //$this->data['schools'] = $this->report->get_single('schools', array('id' => $conschoolid));
        $this->data['schools'] = $this->forms->get_school_by_id($conschoolid);
		
		 $this->data['schools'] = $this->schools;


        $this->data['add'] = TRUE;
        $this->layout->title($this->lang->line('add') . ' | ' . SMS);
        $this->layout->view('teachertransfer/index_teacher_transfer', $this->data);
    }

	 /*     * ***************Function _prepare_language_validation**********************************
     * @type            : Function
     * @function name   : _prepare_annual_validation
     * @description     : Process "Annual" user input data validation                 
     *                       
     * @param           : null
     * @return          : null 
     * ********************************************************** */

    private function _prepare_teachertransferform_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error-message" style="color: red;">', '</div>');
        $this->form_validation->set_rules('applicant_name', $this->lang->line('language_name'), 'trim|required');
        //$this->form_validation->set_rules('schwork_year', $this->lang->line('year'), 'trim|required');
        //$this->form_validation->set_rules('fdate', $this->lang->line('fdate'), 'trim');
		//$this->form_validation->set_rules('sig1', $this->lang->line('sig1'), 'trim|callback_sig1');
		$this->form_validation->set_rules('sig1_photo', $this->lang->line('sig1_photo'), 'trim|callback_sig1_photo');
		$this->form_validation->set_rules('sig2_photo', $this->lang->line('sig2_photo'), 'trim|callback_sig2_photo');
	    $this->form_validation->set_rules('sig3_photo', $this->lang->line('sig3_photo'), 'trim|callback_sig3_photo');
        $this->form_validation->set_rules('sig4_photo', $this->lang->line('sig4_photo'), 'trim|callback_sig4_photo');
        $this->form_validation->set_rules('sig5_photo', $this->lang->line('sig5_photo'), 'trim|callback_sig5_photo');
	
    }
	
	public function sig1_photo() {
        if ($_FILES['sig1_photo']['name']) {
            $name = $_FILES['sig1_photo']['name'];
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif') {
                return TRUE;
            } else {
                $this->form_validation->set_message('sig1_photo', $this->lang->line('select_valid_file_format'));
                return FALSE;
            }
        }
    }
	
	public function sig2_photo() {
        if ($_FILES['sig2_photo']['name']) {
            $name = $_FILES['sig2_photo']['name'];
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif') {
                return TRUE;
            } else {
                $this->form_validation->set_message('sig2_photo', $this->lang->line('select_valid_file_format'));
                return FALSE;
            }
        }
    }
	
	public function sig3_photo() {
        if ($_FILES['sig3_photo']['name']) {
            $name = $_FILES['sig3_photo']['name'];
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif') {
                return TRUE;
            } else {
                $this->form_validation->set_message('sig3_photo', $this->lang->line('select_valid_file_format'));
                return FALSE;
            }
        }
    }
	
	public function sig4_photo() {
        if ($_FILES['sig4_photo']['name']) {
            $name = $_FILES['sig4_photo']['name'];
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif') {
                return TRUE;
            } else {
                $this->form_validation->set_message('sig4_photo', $this->lang->line('select_valid_file_format'));
                return FALSE;
            }
        }
    }
	
	public function sig5_photo() {
        if ($_FILES['sig5_photo']['name']) {
            $name = $_FILES['sig5_photo']['name'];
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif') {
                return TRUE;
            } else {
                $this->form_validation->set_message('sig5_photo', $this->lang->line('select_valid_file_format'));
                return FALSE;
            }
        }
    }
	


	
	  /*     * ***************Function _get_posted_annual_data**********************************
     * @type            : Function
     * @function name   : _get_posted_annual_data
     * @description     : Prepare "Annual" user input data to save into database                  
     *                       
     * @param           : null
     * @return          : $data array(); value 
     * ********************************************************** */

    private function _get_teachertransferform_data() {

        $items = array();
        $items[] = 'school_id';
        $items[] = 'applicant_name';
        $items[] = 'piriven_name';
		$items[] = 'piriven_address';
        $items[] = 'district';
	    $items[] = 'approval_no';
		$items[] = 'qualifications';
        $items[] = 'grade_subject';
		$items[] = 'salary_info';
		$items[] = 'transfer_piriven_name';
        $items[] = 'transfer_piriven_address';
        $items[] = 'transfer_district';
		$items[] = 'person1';
      /*  $items[] = 'person2';*/
        $items[] = 'yes_no';
		$items[] = 'count1';
        $items[] = 'count2';
        $items[] = 'monk';
        $items[] = 'lay';
        $items[] = 'count3';
        $items[] = 'person_name';
        $items[] = 'person3';
        $items[] = 'person4';
      /*  $items[] = 'person5';*/
        $items[] = 'piriven_name1';


        $data = elements($items, $_POST);

       $data['datei'] = date('Y-m-d', strtotime($this->input->post('datei')));
       $data['dateii'] = date('Y-m-d', strtotime($this->input->post('dateii')));
	   $data['dateiii'] = date('Y-m-d', strtotime($this->input->post('dateiii')));
	   $data['dateiv'] = date('Y-m-d', strtotime($this->input->post('dateiv')));
	   $data['datev'] = date('Y-m-d', strtotime($this->input->post('datev')));
	   $data['datevi'] = date('Y-m-d', strtotime($this->input->post('datevi')));
	   $data['datevii'] = date('Y-m-d', strtotime($this->input->post('datevii')));
	   $data['dateviii'] = date('Y-m-d', strtotime($this->input->post('dateviii')));
	   $data['dateix'] = date('Y-m-d', strtotime($this->input->post('dateix')));

		
        $data['status'] = 1;
        $data['school_id'] = $this->input->post('school_id');
        
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = logged_in_user_id();
		
		 if ($_FILES['sig1_photo']['name']) {
            $data['sig1_photo'] = $this->_upload_sig1_photo();
        }
		
		 if ($_FILES['sig2_photo']['name']) {
            $data['sig2_photo'] = $this->_upload_sig2_photo();
        }
		
		if ($_FILES['sig3_photo']['name']) {
            $data['sig3_photo'] = $this->_upload_sig3_photo();
        }
		
		if ($_FILES['sig4_photo']['name']) {
            $data['sig4_photo'] = $this->_upload_sig4_photo();
        }
		
		if ($_FILES['sig5_photo']['name']) {
            $data['sig5_photo'] = $this->_upload_sig5_photo();
        }
		
        return $data;
    }
	
	
/*     * ***************Function _upload_frontend_logo**********************************
     * @type            : Function
     * @function name   : _upload_frontend_logo
     * @description     : Process to upload school front end logo in the server                  
     *                     and return logo name   
     * @param           : null
     * @return          : $logo string value 
     * ********************************************************** */

	 private function _upload_sig1_photo() {

        $prev_sig1_photo = $this->input->post('prev_sig1_photo');
        $sig1_photo = $_FILES['sig1_photo']['name'];
        $sig1_photo_type = $_FILES['sig1_photo']['type'];
        $return_sig1_photo = '';
        if ($sig1_photo != "") {
            if ($sig1_photo_type == 'image/jpeg' || $sig1_photo_type == 'image/pjpeg' ||
                    $sig1_photo_type == 'image/jpg' || $sig1_photo_type == 'image/png' ||
                    $sig1_photo_type == 'image/x-png' || $sig1_photo_type == 'image/gif') {

                $destination = 'assets/uploads/form/';

                $file_type = explode(".", $sig1_photo);
                $extension = strtolower($file_type[count($file_type) - 1]);
                $sig1_photo_path = 'photo-' . time() . '-sms.' . $extension;

                move_uploaded_file($_FILES['sig1_photo']['tmp_name'], $destination . $sig1_photo_path);

                // need to unlink previous mother_photo
                if ($prev_sig1_photo != "") {
                    if (file_exists($destination . $prev_sig1_photo)) {
                        @unlink($destination . $prev_sig1_photo);
                    }
                }

                $return_sig1_photo = $sig1_photo_path;
            }
        } else {
            $return_sig1_photo = $prev_sig1_photo;
        }

        return $return_sig1_photo;
    }

	
	 private function _upload_sig2_photo() {

        $prev_sig2_photo = $this->input->post('prev_sig2_photo');
        $sig2_photo = $_FILES['sig2_photo']['name'];
        $sig2_photo_type = $_FILES['sig2_photo']['type'];
        $return_sig2_photo = '';
        if ($sig2_photo != "") {
            if ($sig2_photo_type == 'image/jpeg' || $sig2_photo_type == 'image/pjpeg' ||
                    $sig2_photo_type == 'image/jpg' || $sig2_photo_type == 'image/png' ||
                    $sig2_photo_type == 'image/x-png' || $sig2_photo_type == 'image/gif') {

                $destination = 'assets/uploads/form/';

                $file_type = explode(".", $sig2_photo);
                $extension = strtolower($file_type[count($file_type) - 1]);
                $sig2_photo_path = 'photo-' . time() . '-sms.' . $extension;

                move_uploaded_file($_FILES['sig2_photo']['tmp_name'], $destination . $sig2_photo_path);

                // need to unlink previous mother_photo
                if ($prev_sig2_photo != "") {
                    if (file_exists($destination . $prev_sig2_photo)) {
                        @unlink($destination . $prev_sig2_photo);
                    }
                }

                $return_sig2_photo = $sig2_photo_path;
            }
        } else {
            $return_sig2_photo = $prev_sig2_photo;
        }

        return $return_sig2_photo;
    }
	
	
	 private function _upload_sig3_photo() {

        $prev_sig3_photo = $this->input->post('prev_sig3_photo');
        $sig3_photo = $_FILES['sig3_photo']['name'];
        $sig3_photo_type = $_FILES['sig3_photo']['type'];
        $return_sig3_photo = '';
        if ($sig3_photo != "") {
            if ($sig3_photo_type == 'image/jpeg' || $sig3_photo_type == 'image/pjpeg' ||
                    $sig3_photo_type == 'image/jpg' || $sig3_photo_type == 'image/png' ||
                    $sig3_photo_type == 'image/x-png' || $sig3_photo_type == 'image/gif') {

                $destination = 'assets/uploads/form/';

                $file_type = explode(".", $sig3_photo);
                $extension = strtolower($file_type[count($file_type) - 1]);
                $sig3_photo_path = 'photo-' . time() . '-sms.' . $extension;

                move_uploaded_file($_FILES['sig3_photo']['tmp_name'], $destination . $sig3_photo_path);

                // need to unlink previous mother_photo
                if ($prev_sig3_photo != "") {
                    if (file_exists($destination . $prev_sig3_photo)) {
                        @unlink($destination . $prev_sig3_photo);
                    }
                }

                $return_sig3_photo = $sig3_photo_path;
            }
        } else {
            $return_sig3_photo = $prev_sig3_photo;
        }

        return $return_sig3_photo;
    }
	
	
	 private function _upload_sig4_photo() {

        $prev_sig4_photo = $this->input->post('prev_sig4_photo');
        $sig4_photo = $_FILES['sig4_photo']['name'];
        $sig4_photo_type = $_FILES['sig4_photo']['type'];
        $return_sig4_photo = '';
        if ($sig4_photo != "") {
            if ($sig4_photo_type == 'image/jpeg' || $sig4_photo_type == 'image/pjpeg' ||
                    $sig4_photo_type == 'image/jpg' || $sig4_photo_type == 'image/png' ||
                    $sig4_photo_type == 'image/x-png' || $sig4_photo_type == 'image/gif') {

                $destination = 'assets/uploads/form/';

                $file_type = explode(".", $sig4_photo);
                $extension = strtolower($file_type[count($file_type) - 1]);
                $sig4_photo_path = 'photo-' . time() . '-sms.' . $extension;

                move_uploaded_file($_FILES['sig4_photo']['tmp_name'], $destination . $sig4_photo_path);

                // need to unlink previous mother_photo
                if ($prev_sig4_photo != "") {
                    if (file_exists($destination . $prev_sig4_photo)) {
                        @unlink($destination . $prev_sig4_photo);
                    }
                }

                $return_sig4_photo = $sig4_photo_path;
            }
        } else {
            $return_sig4_photo = $prev_sig4_photo;
        }

        return $return_sig4_photo;
    }
	
	
	 private function _upload_sig5_photo() {

        $prev_sig5_photo = $this->input->post('prev_sig5_photo');
        $sig5_photo = $_FILES['sig5_photo']['name'];
        $sig5_photo_type = $_FILES['sig5_photo']['type'];
        $return_sig5_photo = '';
        if ($sig5_photo != "") {
            if ($sig5_photo_type == 'image/jpeg' || $sig5_photo_type == 'image/pjpeg' ||
                    $sig5_photo_type == 'image/jpg' || $sig5_photo_type == 'image/png' ||
                    $sig5_photo_type == 'image/x-png' || $sig5_photo_type == 'image/gif') {

                $destination = 'assets/uploads/form/';

                $file_type = explode(".", $sig5_photo);
                $extension = strtolower($file_type[count($file_type) - 1]);
                $sig5_photo_path = 'photo-' . time() . '-sms.' . $extension;

                move_uploaded_file($_FILES['sig5_photo']['tmp_name'], $destination . $sig5_photo_path);

                // need to unlink previous mother_photo
                if ($prev_sig5_photo != "") {
                    if (file_exists($destination . $prev_sig5_photo)) {
                        @unlink($destination . $prev_sig5_photo);
                    }
                }

                $return_sig5_photo = $sig5_photo_path;
            }
        } else {
            $return_sig5_photo = $prev_sig5_photo;
        }

        return $return_sig5_photo;
    }
	
	
	 public function get_single_teacher_transfer_form(){
        
        $teachertransferform_id = $this->input->post('teachertransferform_id');
        $this->data['forms'] = $this->forms->get_single_teacher_transfer_form($teachertransferform_id);

        
        echo $this->load->view('teachertransfer/get-single-teacher-transfer-form', $this->data);
    }
	
	  public function view($id = null) {

        check_permission(VIEW);

        $this->data['teachertransferformval'] = $this->forms->get_single_teacher_transfer_form('teacher_transfer', array('status' => 1), '', '', '', 'id', 'ASC');

        $this->data['schools'] = $this->schools;
        $this->data['detail'] = TRUE;
        $this->layout->title($this->lang->line('teacher_transfer_form') . ' | ' . SMS);
        $this->layout->view('form/get-single-teacher-transfer-form', $this->data);
    }
	
	
	 
    /*****************Function delete**********************************
    * @type            : Function
    * @function name   : delete
    * @description     : delete "Employee" data from database                  
    *                     and unlink employee photo and Resume from server  
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function teachertransferformdelete($id = null) {

        if(!is_numeric($id)){
             error($this->lang->line('unexpected_error'));
             redirect('forms/form');       
        }
       // $this->data['academic_years'] = $this->forms->get_list('academic_years', array('status' => 1, 'school_id' => $school_id));
        $forms = $this->forms->get_single('teacher_transfer', array('id' => $id));
        if (!empty($forms)) {

            // delete employee data
            $this->forms->delete('teacher_transfer', array('id' => $id));

            // delete employee resume and photo
            $destination = 'assets/uploads/';
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
            
            create_log('Has been deleted a Teacher Tranfer Form : '.$forms->name);
            success($this->lang->line('delete_success'));
            
        } else {
            error($this->lang->line('delete_failed'));
        }
        
        redirect('forms/teachertransferform'.$forms->conschoolid);
    }
	
	
	
	  public function teachertransferformedit($id = null) {

        $conschoolid = $this->session->userdata('school_id');
//		  echo("dddddddddd");
           if ($_POST) {
			   
            $this->_prepare_teachertransferform_validation();
            if ($this->form_validation->run() === TRUE) {
               $data = $this->_get_teachertransferform_data();//method for db
                $updated = $this->forms->update('teacher_transfer', $data, array('id' => $this->input->post('schlformid')));

                if ($updated) {
					
                    success($this->lang->line('update_success'));
                    redirect('forms/teachertransferform/' . $data['school_id']);
                } else {
                    error($this->lang->line('update_failed'));
                    redirect('forms/teachertransferformedit/' . $this->input->post('schlformid'));
                }
            } else {
                error($this->lang->line('update_failed'));
               $this->data['forms'] = $this->forms->get_single_teacher_transfer_form($this->input->post('id'));
            }
        }

        if ($id) {
            $this->data['forms'] = $this->forms->get_single_teacher_transfer_form($id);
			

            if (!$this->data['forms']) {
               redirect('forms/teachertransferform');
            }
        }
    
        //$this->data['teachers'] = $this->teacher->get_teacher_list($this->data['teacher']->school_id);
       $this->data['teachertransferformval'] = $this->forms->get_teachertransferformval($conschoolid);
		  //$this->data['teachertransferformval'] = $this->forms->get_teachertransferformval($this->data['teachertransferformva']->conschoolid);
		$this->data['schools'] = $this->forms->get_school_by_id($conschoolid);


        $this->data['edit'] = TRUE;
        $this->layout->title($this->lang->line('edit') . ' | ' . SMS);
        $this->layout->view('teachertransfer/index_teacher_transfer', $this->data);
    }
	
	
	
	
    
      public function teacher_transfer_print($id){
        
		 //check_permission(VIEW);
        $this->data['schools'] = $this->forms->get_school_by_id($conschoolid);
		 $this->data['forms'] = $this->forms->get_single_teacher_transfer_print($id);/*see in modal*/

        
        create_log('Has been generate the teacher transfer form : '.$this->data['forms']->name); 
        
        $this->layout->title($this->lang->line('teacher_transfer_form') .' | ' . SMS);
        $this->load->view('teachertransfer/teacher_transfer_print', $this->data); 
        
    }
	

}


