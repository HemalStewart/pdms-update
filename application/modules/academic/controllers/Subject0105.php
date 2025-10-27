<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************Subject.php**********************************
 * @product name    : PDMS
 * @type            : Class
 * @class name      : Subject
 * @description     : Manage academic subject for each academic class.  
 * @author          : Rameca Team 	
 * @url             : https://www.ramecats.lk     
 * @support         : info@ramecats.lk	
 * @copyright       : All Rights Reserved. Design & Developed by Rameca Technology Solutions	 	
 * ********************************************************** */

class Subject extends MY_Controller {

    public $data = array();

    function __construct() {
        parent::__construct();

        $this->load->model('Subject_Model', 'subject', true);

        $this->load->model('Ajax_Model', 'ajax', true);
        $listprovincial = $this->ajax->listprovincial();
        $this->data['listprovincial'] = $listprovincial;

        $listpirtype = $this->subject->listpirtype();
        $this->data['listpirtype'] = $listpirtype;
    }

    /*     * ***************Function index**********************************
     * @type            : Function
     * @function name   : index
     * @description     : Load "Class Subject List" user interface                 
     *                    with class wise listing    
     * @param           : $id integer value
     * @return          : null 
     * ********************************************************** */

    public function index($class_id = null) {

        check_permission(VIEW);

        if (isset($class_id) && !is_numeric($class_id)) {
            error($this->lang->line('unexpected_error'));
            redirect('academic/subject/index');
        }

        // for super admin 
        $school_id = '';
        if ($_POST) {
            $school_id = $this->input->post('school_id');
            $class_id = $this->input->post('class_id');
        }

        $this->data['class_id'] = $class_id;
        $this->data['filter_class_id'] = $class_id;
        $this->data['filter_school_id'] = $school_id;
        $this->data['subjects'] = $this->subject->get_subject_list($class_id, $school_id);

        $condition = array();
        $condition['status'] = 1;
        if ($this->session->userdata('role_id') != SUPER_ADMIN) {
            $condition['school_id'] = $this->session->userdata('school_id');
            $this->data['classes'] = $this->subject->get_list('classes', $condition, '', '', '', 'id', 'ASC');
            $this->data['teachers'] = $this->subject->get_list('teachers', $condition, '', '', '', 'id', 'ASC');
        }

        $this->data['list'] = TRUE;
        $this->data['schools'] = $this->schools;
        $this->layout->title($this->lang->line('manage_subject') . ' | ' . SMS);
        $this->layout->view('subject/index', $this->data);
    }

    /*     * ***************Function add**********************************
     * @type            : Function
     * @function name   : add
     * @description     : Load "Add new Subject" user interface                 
     *                    and process to store "Subject" into database 
     * @param           : null
     * @return          : null 
     * ********************************************************** */

    public function add() {

        check_permission(ADD);

        if ($_POST) {
            $this->_prepare_subject_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_subject_data();

                $insert_id = $this->subject->insert('subjects', $data);
                if ($insert_id) {

                    $class = $this->subject->get_single('classes', array('id' => $data['class_id'], 'school_id' => $data['school_id']));
                    create_log('Has been added a sucject : ' . $data['name'] . ' for class : ' . $class->name);

                    success($this->lang->line('insert_success'));
                    redirect('academic/subject/index/' . $data['class_id']);
                } else {
                    error($this->lang->line('insert_failed'));
                    redirect('academic/subject/add/' . $data['class_id']);
                }
            } else {
                error($this->lang->line('insert_failed'));
                $this->data['post'] = $_POST;
            }
        }

        $class_id = $this->uri->segment(4);
        if (!$class_id) {
            $class_id = $this->input->post('class_id');
        }

        $this->data['class_id'] = $class_id;
        $this->data['subjects'] = $this->subject->get_subject_list($class_id);

        $condition = array();
        $condition['status'] = 1;
        if ($this->session->userdata('role_id') != SUPER_ADMIN) {
            $condition['school_id'] = $this->session->userdata('school_id');
            $this->data['classes'] = $this->subject->get_list('classes', $condition, '', '', '', 'id', 'ASC');
            $this->data['teachers'] = $this->subject->get_list('teachers', $condition, '', '', '', 'id', 'ASC');
        }

        $this->data['schools'] = $this->schools;
        $this->data['add'] = TRUE;
        $this->layout->title($this->lang->line('add') . ' | ' . SMS);
        $this->layout->view('subject/index', $this->data);
    }

    /*     * ***************Function edit**********************************
     * @type            : Function
     * @function name   : edit
     * @description     : Load Update "Subject" user interface                 
     *                    with populate "Subject" value 
     *                    and process to update "Subject" into database    
     * @param           : $id integer value
     * @return          : null 
     * ********************************************************** */

    public function edit($id = null) {

        check_permission(EDIT);
        if (!is_numeric($id)) {
            error($this->lang->line('unexpected_error'));
            redirect('academic/subject/index');
        }

        if ($_POST) {
            $this->_prepare_subject_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_subject_data();
                $updated = $this->subject->update('subjects', $data, array('id' => $this->input->post('id')));

                if ($updated) {

                    $class = $this->subject->get_single('classes', array('id' => $data['class_id'], 'school_id' => $data['school_id']));
                    create_log('Has been updated a sucject : ' . $data['name'] . ' for class : ' . $class->name);

                    success($this->lang->line('update_success'));
                    redirect('academic/subject/index/' . $data['class_id']);
                } else {
                    error($this->lang->line('updtae_failed'));
                    redirect('academic/subject/edit/' . $this->input->post('id'));
                }
            } else {
                error($this->lang->line('updtae_failed'));
                $this->data['subject'] = $this->subject->get_single('subjects', array('id' => $this->input->post('id')));
            }
        }

        if ($id) {
            $this->data['subject'] = $this->subject->get_single('subjects', array('id' => $id));

            if (!$this->data['subject']) {
                redirect('academic/subject/index');
            }
        }


        $class_id = $this->data['subject']->class_id;
        if (!$class_id) {
            $class_id = $this->input->post('class_id');
        }

        $this->data['class_id'] = $class_id;
        $this->data['filter_class_id'] = $class_id;
        $this->data['subjects'] = $this->subject->get_subject_list($class_id, $this->data['subject']->school_id);

        $condition = array();
        $condition['status'] = 1;
        if ($this->session->userdata('role_id') != SUPER_ADMIN) {
            $condition['school_id'] = $this->session->userdata('school_id');
            $this->data['classes'] = $this->subject->get_list('classes', $condition, '', '', '', 'id', 'ASC');
            $this->data['teachers'] = $this->subject->get_list('teachers', $condition, '', '', '', 'id', 'ASC');
        }

        $this->data['schools'] = $this->schools;
        $this->data['edit'] = TRUE;
        $this->data['school_id'] = $this->data['subject']->school_id;
        $this->data['filter_school_id'] = $this->data['subject']->school_id;

        $this->layout->title($this->lang->line('edit') . ' | ' . SMS);
        $this->layout->view('subject/index', $this->data);
    }

    /*     * ***************Function view**********************************
     * @type            : Function
     * @function name   : view
     * @description     : Load user interface with specific subject data                 
     *                       
     * @param           : $subject_id integer value
     * @return          : null 
     * ********************************************************** */

    public function view($subject_id = null) {

        check_permission(VIEW);

        if (!is_numeric($subject_id)) {
            error($this->lang->line('unexpected_error'));
            redirect('academic/subject/index');
        }

        $this->data['subject'] = $this->subject->get_single_subject($subject_id);
        $class_id = $this->data['subject']->class_id;

        $this->data['subjects'] = $this->subject->get_subject_list($class_id);

        $condition = array();
        $condition['status'] = 1;
        if ($this->session->userdata('role_id') != SUPER_ADMIN) {
            $condition['school_id'] = $this->session->userdata('school_id');
        }
        $this->data['classes'] = $this->subject->get_list('classes', $condition, '', '', '', 'id', 'ASC');
        $this->data['teachers'] = $this->subject->get_list('teachers', $condition, '', '', '', 'id', 'ASC');

        $this->data['class_id'] = $class_id;
        $this->data['schools'] = $this->schools;
        $this->data['detail'] = TRUE;
        $this->layout->title($this->lang->line('view') . ' | ' . SMS);
        $this->layout->view('subject/index', $this->data);
    }

    /*     * ***************Function get_single_subject**********************************
     * @type            : Function
     * @function name   : get_single_subject
     * @description     : "Load single subject information" from database                  
     *                    to the user interface   
     * @param           : null
     * @return          : null 
     * ********************************************************** */

    public function get_single_subject() {

        $subject_id = $this->input->post('subject_id');

        $this->data['subject'] = $this->subject->get_single_subject($subject_id);
        echo $this->load->view('subject/get-single-subject', $this->data);
    }

    /*     * ***************Function _prepare_subject_validation**********************************
     * @type            : Function
     * @function name   : _prepare_subject_validation
     * @description     : Process "subject" user input data validation                 
     *                       
     * @param           : null
     * @return          : null 
     * ********************************************************** */

    private function _prepare_subject_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error-message" style="color: red;">', '</div>');

        $this->form_validation->set_rules('school_id', $this->lang->line('school_name'), 'trim|required');
        $this->form_validation->set_rules('teacher_id', $this->lang->line('teacher'), 'trim|required');
        $this->form_validation->set_rules('class_id', $this->lang->line('class'), 'trim|required');
        $this->form_validation->set_rules('type', $this->lang->line('type'), 'trim');
        $this->form_validation->set_rules('code', $this->lang->line('subject_code'), 'trim');
        // $this->form_validation->set_rules('author', $this->lang->line('author'), 'trim');
        $this->form_validation->set_rules('note', $this->lang->line('note'), 'trim');
        $this->form_validation->set_rules('name', $this->lang->line('name'), 'required|trim|callback_name');
    }

    private function _prepare_addsubject_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error-message" style="color: red;">', '</div>');

//        $this->form_validation->set_rules('school_id', $this->lang->line('school_name'), 'trim|required');   
//        $this->form_validation->set_rules('teacher_id', $this->lang->line('teacher'), 'trim|required');   
//        $this->form_validation->set_rules('class_id', $this->lang->line('class'), 'trim|required');   
//        $this->form_validation->set_rules('type', $this->lang->line('type'), 'trim');   
        $this->form_validation->set_rules('code', $this->lang->line('subject_code'), 'trim');
        $this->form_validation->set_rules('pirtype', $this->lang->line('pir_type'), 'trim');
        $this->form_validation->set_rules('class_id', $this->lang->line('class'), 'trim');
        $this->form_validation->set_rules('name', $this->lang->line('name'), 'required|trim');
    }

    private function _prepare_editsubject_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error-message" style="color: red;">', '</div>');

//        $this->form_validation->set_rules('school_id', $this->lang->line('school_name'), 'trim|required');   
//        $this->form_validation->set_rules('teacher_id', $this->lang->line('teacher'), 'trim|required');   
//        $this->form_validation->set_rules('class_id', $this->lang->line('class'), 'trim|required');   
//        $this->form_validation->set_rules('type', $this->lang->line('type'), 'trim');   
        $this->form_validation->set_rules('code', $this->lang->line('subject_code'), 'trim');
        $this->form_validation->set_rules('editpirtype', $this->lang->line('pir_type'), 'trim');
//        $this->form_validation->set_rules('class_id', $this->lang->line('class'), 'trim');
        $this->form_validation->set_rules('name', $this->lang->line('name'), 'required|trim');
    }

    /*     * ***************Function name**********************************
     * @type            : Function
     * @function name   : name
     * @description     : Unique check for "subject name" data/value                  
     *                       
     * @param           : null
     * @return          : boolean true/false 
     * ********************************************************** */

    public function name() {
        if ($this->input->post('id') == '') {
            $subject = $this->subject->duplicate_check($this->input->post('school_id'), $this->input->post('class_id'), $this->input->post('name'));
            if ($subject) {
                $this->form_validation->set_message('name', $this->lang->line('already_exist'));
                return FALSE;
            } else {
                return TRUE;
            }
        } else if ($this->input->post('id') != '') {
            $subject = $this->subject->duplicate_check($this->input->post('school_id'), $this->input->post('class_id'), $this->input->post('name'), $this->input->post('id'));
            if ($subject) {
                $this->form_validation->set_message('name', $this->lang->line('already_exist'));
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return TRUE;
        }
    }

    public function subname() {
        if ($this->input->post('id') == '') {
            $subject = $this->subject->duplicate_check($this->input->post('school_id'), $this->input->post('class_id'), $this->input->post('name'));
            if ($subject) {
                $this->form_validation->set_message('name', $this->lang->line('already_exist'));
                return FALSE;
            } else {
                return TRUE;
            }
        } else if ($this->input->post('id') != '') {
            $subject = $this->subject->duplicate_check($this->input->post('school_id'), $this->input->post('class_id'), $this->input->post('name'), $this->input->post('id'));
            if ($subject) {
                $this->form_validation->set_message('name', $this->lang->line('already_exist'));
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return TRUE;
        }
    }

    /*     * ***************Function _get_posted_subject_data**********************************
     * @type            : Function
     * @function name   : _get_posted_subject_data
     * @description     : Prepare "Subject" user input data to save into database                  
     *                       
     * @param           : null
     * @return          : $data array(); value 
     * ********************************************************** */

    private function _get_posted_subject_data() {

        $items = array();
        $items[] = 'school_id';
        $items[] = 'class_id';
        $items[] = 'teacher_id';
        $items[] = 'type';
        $items[] = 'code';
        // $items[] = 'author';
        $items[] = 'name';
        $items[] = 'note';
        $data = elements($items, $_POST);

        if ($this->input->post('id')) {
            $data['modified_at'] = date('Y-m-d H:i:s');
            $data['modified_by'] = logged_in_user_id();
        } else {
            $data['status'] = 1;
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['created_by'] = logged_in_user_id();
        }

        return $data;
    }

    private function _get_posted_subjectdefine_data() {

        $items = array();
    //    $items[] = 'pirtype';

////        $items[] = 'author';
//        $items[] = 'name';
//        $items[] = 'note';
        $data = elements($items, $_POST);

        if ($this->input->post('id')) {
            $editpirtype = $this->input->post('editpirtype');
            $hiddenpritype = $this->input->post('hiddenpritype');
            $editclass_id = $this->input->post('edit_class_id');



            if ($editpirtype != $hiddenpritype) {
                $data['pirtype'] = $this->input->post('editpirtype');
                if($editclass_id){
                $data['class_id'] = $this->input->post('class_id');}
                
//                if($editclass_id){
//                $data['class_id'] = $this->input->post('edit_class_id');}
//                else{
//                    $data['class_id'] = $this->input->post('hiddenpriclass');
//                }
            } else {
                $data['class_id'] = $this->input->post('hiddenpriclass');
            }
            $data['Subject_Code'] = $this->input->post('code');
            $data['Subject_Name'] = $this->input->post('name');
            $data['note'] = $this->input->post('note');
            $data['modified_at'] = date('Y-m-d H:i:s');
            $data['modified_by'] = logged_in_user_id();
        } else {
            $data['status'] = 1;
            $data['pirtype'] = $this->input->post('pirtype');
            $data['class_id'] = $this->input->post('class_id');
            $data['Subject_Code'] = $this->input->post('code');
            $data['Subject_Name'] = $this->input->post('name');
            $data['note'] = $this->input->post('note');
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['created_by'] = logged_in_user_id();
        }


        return $data;
    }

    
        private function _get_posted_subjectdefineedit_data() {

        $items = array();
    //    $items[] = 'pirtype';

////        $items[] = 'author';
//        $items[] = 'name';
//        $items[] = 'note';
        $data = elements($items, $_POST);


            $editpirtype = $this->input->post('editpirtype');
            $hiddenpritype = $this->input->post('hiddenpritype');
            $editclass_id = $this->input->post('edit_class_id');
            $edit_priclass = $this->input->post('edit_priclass');

 $data['pirtype'] = $this->input->post('editpirtype');
    
 
    
    if ($editclass_id == $edit_priclass) {
        
        $data['class_id'] =$this->input->post('edit_class_id');
        
    }
    else{
        $data['class_id'] = $this->input->post('edit_class_id');
        
    }
    

//            if ($editpirtype != $hiddenpritype) {
//                $data['pirtype'] = $this->input->post('editpirtype');
//                if($editclass_id){
//                $data['class_id'] = $this->input->post('edit_class_id');}
//                
////                if($editclass_id){
////                $data['class_id'] = $this->input->post('edit_class_id');}
////                else{
////                    $data['class_id'] = $this->input->post('hiddenpriclass');
////                }
//            } else {
//                $data['class_id'] = $this->input->post('hiddenpriclass');
//            }
            $data['Subject_Code'] = $this->input->post('code');
            $data['Subject_Name'] = $this->input->post('name');
            $data['note'] = $this->input->post('note');
            $data['modified_at'] = date('Y-m-d H:i:s');
            $data['modified_by'] = logged_in_user_id();
        
        return $data;
    }
    
    /*     * ***************Function delete**********************************
     * @type            : Function
     * @function name   : delete
     * @description     : delete "Subject" data from database                  
     *                       
     * @param           : $id integer value
     * @return          : null 
     * ********************************************************** */

    public function delete($id = null) {

        check_permission(DELETE);

        if (!is_numeric($id)) {
            error($this->lang->line('unexpected_error'));
            redirect('academic/subject/index');
        }

        $subject = $this->subject->get_single('subjects', array('id' => $id));

        if ($this->subject->delete('subjects', array('id' => $id))) {

            $class = $this->subject->get_single('classes', array('id' => $subject->class_id, 'school_id' => $subject->school_id));
            create_log('Has been deleted a sucject : ' . $subject->name . ' for class : ' . $class->name);

            success($this->lang->line('delete_success'));
        } else {
            error($this->lang->line('delete_failed'));
        }
        redirect('academic/subject/index/' . $subject->class_id);
    }

    public function indexdefine($class_id = null) {

        check_permission(VIEW);
        
        $listsubject = $this->ajax->listsubject();
        $this->data['listsubject'] = $listsubject;

        if (isset($class_id) && !is_numeric($class_id)) {
            error($this->lang->line('unexpected_error'));
            redirect('academic/subject/indexdefine');
        }

//        // for super admin 
//        $school_id = '';
//        if ($_POST) {
//            $school_id = $this->input->post('school_id');
//            $class_id = $this->input->post('class_id');
//        }
//
//        $this->data['class_id'] = $class_id;
//        $this->data['filter_class_id'] = $class_id;
//        $this->data['filter_school_id'] = $school_id;
        $this->data['subjects'] = $this->subject->get_subject_definelist();

        $condition = array();
        $condition['status'] = 1;
//        if ($this->session->userdata('role_id') != SUPER_ADMIN) {
//            $condition['school_id'] = $this->session->userdata('school_id');
//            $this->data['classes'] = $this->subject->get_list('classes', $condition, '', '', '', 'id', 'ASC');
//            $this->data['teachers'] = $this->subject->get_list('teachers', $condition, '', '', '', 'id', 'ASC');
//        }

        $this->data['list'] = TRUE;
        $this->data['schools'] = $this->schools;
        $this->layout->title($this->lang->line('manage_subject') . ' | ' . SMS);
        $this->layout->view('subject/indexsubject', $this->data);
    }

    public function addsub() {

        check_permission(ADD);

        if ($_POST) {
            $this->_prepare_addsubject_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_subjectdefine_data();

                $insert_id = $this->subject->insert('subject_define', $data);
                if ($insert_id) {

                    $class = $this->subject->get_single('classes', array('id' => $data['class_id'], 'school_id' => $data['school_id']));
                    create_log('Has been added a subject : ' . $data['name'] . ' for class : ' . $class->name);

                    success($this->lang->line('insert_success'));
                    redirect('academic/subject/indexdefine/' . $data['class_id']);
                } else {
                    error($this->lang->line('insert_failed'));
                    redirect('academic/subject/addsub/' . $data['class_id']);
                }
            } else {
                error($this->lang->line('insert_failed'));
                $this->data['post'] = $_POST;
            }
        }

        $class_id = $this->uri->segment(4);
        if (!$class_id) {
            $class_id = $this->input->post('class_id');
        }

        $this->data['class_id'] = $class_id;
        $this->data['subjects'] = $this->subject->get_subject_definelist();

        $condition = array();
        $condition['status'] = 1;
        if ($this->session->userdata('role_id') != SUPER_ADMIN) {
            $condition['school_id'] = $this->session->userdata('school_id');
            $this->data['classes'] = $this->subject->get_list('classes', $condition, '', '', '', 'id', 'ASC');
            $this->data['teachers'] = $this->subject->get_list('teachers', $condition, '', '', '', 'id', 'ASC');
        }

        $listsubject = $this->ajax->listsubject();
        $this->data['listsubject'] = $listsubject;
        $this->data['schools'] = $this->schools;
        $this->data['add'] = TRUE;
        $this->layout->title($this->lang->line('add') . ' | ' . SMS);
        $this->layout->view('subject/indexsubject', $this->data);
    }

    public function editsub($id = null) {

        check_permission(EDIT);
        if (!is_numeric($id)) {
            error($this->lang->line('unexpected_error'));
            redirect('academic/subject/indexdefine');
        }

        if ($_POST) {
            $this->_prepare_editsubject_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_subjectdefineedit_data();
                $updated = $this->subject->update('subject_define', $data, array('id' => $this->input->post('id')));

                if ($updated) {

                    $class = $this->subject->get_single('classes', array('id' => $data['class_id'], 'school_id' => $data['school_id']));
                    create_log('Has been updated a sucject : ' . $data['name'] . ' for class : ' . $class->name);

                    success($this->lang->line('update_success'));
                    redirect('academic/subject/indexdefine/' . $data['class_id']);
                } else {
                    error($this->lang->line('updtae_failed'));
                    redirect('academic/subject/editsub/' . $this->input->post('id'));
                }
            } else {
                error($this->lang->line('updtae_failed'));
                $this->data['subject'] = $this->subject->get_single('subject_define', array('id' => $this->input->post('id')));
            }
        }

        if ($id) {
            $this->data['subject'] = $this->subject->get_single('subject_define', array('id' => $id));
            $this->data['subjectdata'] = $this->subject->geteditSubjectData($id);

            if (!$this->data['subject']) {
                redirect('academic/subject/indexdefine');
            }
        }


        $class_id = $this->data['subject']->class_id;
        if (!$class_id) {
            $class_id = $this->input->post('class_id');
        }

        $listsubject = $this->ajax->listsubject();
        $this->data['listsubject'] = $listsubject;
        $this->data['class_id'] = $class_id;
        $this->data['filter_class_id'] = $class_id;
        $this->data['subjects'] = $this->subject->get_subject_definelist();

        $condition = array();
        $condition['status'] = 1;
//        if ($this->session->userdata('role_id') != SUPER_ADMIN) {
//            $condition['school_id'] = $this->session->userdata('school_id');
//            $this->data['classes'] = $this->subject->get_list('classes', $condition, '', '', '', 'id', 'ASC');
//            $this->data['teachers'] = $this->subject->get_list('teachers', $condition, '', '', '', 'id', 'ASC');
//        }
//        $this->data['schools'] = $this->schools;
        $this->data['edit'] = TRUE;
//        $this->data['school_id'] = $this->data['subject']->school_id;
//        $this->data['filter_school_id'] = $this->data['subject']->school_id;

        $this->layout->title($this->lang->line('edit') . ' | ' . SMS);
        $this->layout->view('subject/indexsubject', $this->data);
    }

    public function viewsub($subject_id = null) {

        check_permission(VIEW);

        if (!is_numeric($subject_id)) {
            error($this->lang->line('unexpected_error'));
            redirect('academic/subject/indexdefine');
        }

        $this->data['subject'] = $this->subject->get_single_subject($subject_id);
        $class_id = $this->data['subject']->class_id;

        $this->data['subjects'] = $this->subject->get_subject_list($class_id);

        $condition = array();
        $condition['status'] = 1;
        if ($this->session->userdata('role_id') != SUPER_ADMIN) {
            $condition['school_id'] = $this->session->userdata('school_id');
        }
        $this->data['classes'] = $this->subject->get_list('classes', $condition, '', '', '', 'id', 'ASC');
        $this->data['teachers'] = $this->subject->get_list('teachers', $condition, '', '', '', 'id', 'ASC');

        $this->data['class_id'] = $class_id;
        $this->data['schools'] = $this->schools;
        $this->data['detail'] = TRUE;
        $this->layout->title($this->lang->line('view') . ' | ' . SMS);
        $this->layout->view('subject/indexsubject', $this->data);
    }

    public function deletesub($id = null) {

        check_permission(DELETE);

        if (!is_numeric($id)) {
            error($this->lang->line('unexpected_error'));
            redirect('academic/subject/indexdefine');
        }

        $subject = $this->subject->get_single('subject_define', array('id' => $id));

        if ($this->subject->delete('subject_define', array('id' => $id))) {

            $class = $this->subject->get_single('classes', array('id' => $subject->class_id, 'school_id' => $subject->school_id));
            create_log('Has been deleted a sucject : ' . $subject->name . ' for class : ' . $class->name);

            success($this->lang->line('delete_success'));
        } else {
            error($this->lang->line('delete_failed'));
        }
        redirect('academic/subject/indexdefine/' . $subject->class_id);
    }

    public function indexassign($class_id = null) {

        check_permission(VIEW);

        if (isset($class_id) && !is_numeric($class_id)) {
            error($this->lang->line('unexpected_error'));
            redirect('academic/subject/indexassign');
        }

        // for super admin 
        $school_id = '';
        if ($_POST) {
            $school_id = $this->input->post('school_id');
            $class_id = $this->input->post('class_id');
        }

        $pirtype = $this->session->userdata('pirtype');
        $listclass = $this->subject->listclassid($pirtype);
        $this->data['listclass'] = $listclass;

        $this->data['class_id'] = $class_id;
        $this->data['filter_class_id'] = $class_id;
        $this->data['filter_school_id'] = $school_id;
        $this->data['subjects'] = $this->subject->get_subject_list($class_id, $school_id);

        $condition = array();
        $condition['status'] = 1;
        if ($this->session->userdata('role_id') != SUPER_ADMIN) {
            $condition['school_id'] = $this->session->userdata('school_id');
            $this->data['classes'] = $this->subject->get_list('classes', $condition, '', '', '', 'id', 'ASC');
            $this->data['teachers'] = $this->subject->get_list('teachers', $condition, '', '', '', 'id', 'ASC');
        }

        $this->data['list'] = TRUE;
        $this->data['schools'] = $this->schools;
        $this->layout->title($this->lang->line('manage_subject') . ' | ' . SMS);
        $this->layout->view('subject/indexassign', $this->data);
    }

    public function subaddassign() {

        check_permission(ADD);

        if ($_POST) {
            $this->_prepare_subjectassign_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_subjectassign_data();

                $insert_id = $this->subject->insert('subjects', $data);
                if ($insert_id) {

                    $class = $this->subject->get_single('classes', array('id' => $data['class_id'], 'school_id' => $data['school_id']));
                    create_log('Has been added a sucject : ' . $data['name'] . ' for class : ' . $class->name);

                    success($this->lang->line('insert_success'));
                    redirect('academic/subject/indexassign/' . $data['class_id']);
                } else {
                    error($this->lang->line('insert_failed'));
                    redirect('academic/subject/subaddassign/' . $data['class_id']);
                }
            } else {
                error($this->lang->line('insert_failed'));
                $this->data['post'] = $_POST;
            }
        }

        $class_id = $this->uri->segment(4);
        if (!$class_id) {
            $class_id = $this->input->post('class_id');
        }

        $this->data['class_id'] = $class_id;
        $this->data['subjects'] = $this->subject->get_subject_list($class_id);

        $condition = array();
        $condition['status'] = 1;
        if ($this->session->userdata('role_id') != SUPER_ADMIN) {
            $condition['school_id'] = $this->session->userdata('school_id');
            $this->data['classes'] = $this->subject->get_list('classes', $condition, '', '', '', 'id', 'ASC');
            $this->data['teachers'] = $this->subject->get_list('teachers', $condition, '', '', '', 'id', 'ASC');
        }

        $pirtype = $this->session->userdata('pirtype');
        $listclass = $this->subject->listclassid($pirtype);
        $this->data['listclass'] = $listclass;


        $this->data['schools'] = $this->schools;
        $this->data['add'] = TRUE;
        $this->layout->title($this->lang->line('add') . ' | ' . SMS);
        $this->layout->view('subject/indexassign', $this->data);
    }

    public function subeditassign($id = null) {

        check_permission(EDIT);
        if (!is_numeric($id)) {
            error($this->lang->line('unexpected_error'));
            redirect('academic/subject/indexassign');
        }

        if ($_POST) {
            $this->_prepare_editsubjectassign_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_subjectassign_data();
                $updated = $this->subject->update('subjects', $data, array('id' => $this->input->post('id')));

                if ($updated) {

                    $class = $this->subject->get_single('classes', array('id' => $data['class_id'], 'school_id' => $data['school_id']));
                    create_log('Has been updated a sucject : ' . $data['name'] . ' for class : ' . $class->name);

                    success($this->lang->line('update_success'));
                    redirect('academic/subject/indexassign/' . $data['class_id']);
                } else {
                    error($this->lang->line('updtae_failed'));
                    redirect('academic/subject/subeditassign/' . $this->input->post('id'));
                }
            } else {
                error($this->lang->line('updtae_failed'));
                $this->data['subject'] = $this->subject->get_single('subjects', array('id' => $this->input->post('id')));
            }
        }

        if ($id) {
            $this->data['subject'] = $this->subject->get_single('subjects', array('id' => $id));

            if (!$this->data['subject']) {
                redirect('academic/subject/indexassign');
            }
        }


        $class_id = $this->data['subject']->class_id;
        if (!$class_id) {
            $class_id = $this->input->post('class_id');
        }

        $this->data['class_id'] = $class_id;
        $this->data['filter_class_id'] = $class_id;
        $this->data['subjects'] = $this->subject->get_subject_list($class_id, $this->data['subject']->school_id);

        $condition = array();
        $condition['status'] = 1;
        if ($this->session->userdata('role_id') != SUPER_ADMIN) {
            $condition['school_id'] = $this->session->userdata('school_id');
            $this->data['classes'] = $this->subject->get_list('classes', $condition, '', '', '', 'id', 'ASC');
            $this->data['teachers'] = $this->subject->get_list('teachers', $condition, '', '', '', 'id', 'ASC');
        }

        $pirtype = $this->session->userdata('pirtype');
        $listclass = $this->subject->listclassid($pirtype);
        $this->data['listclass'] = $listclass;


        $this->data['schools'] = $this->schools;
        $this->data['edit'] = TRUE;
        $this->data['school_id'] = $this->data['subject']->school_id;
        $this->data['filter_school_id'] = $this->data['subject']->school_id;

        $this->layout->title($this->lang->line('edit') . ' | ' . SMS);
        $this->layout->view('subject/indexassign', $this->data);
    }

    private function _prepare_subjectassign_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error-message" style="color: red;">', '</div>');

//        $this->form_validation->set_rules('school_id', $this->lang->line('school_name'), 'trim|required');
        $this->form_validation->set_rules('teacher_id', $this->lang->line('teacher'), 'trim|required');
        $this->form_validation->set_rules('class_id', $this->lang->line('class'), 'trim|required');
        $this->form_validation->set_rules('type', $this->lang->line('type'), 'trim');
        $this->form_validation->set_rules('code', $this->lang->line('subject_code'), 'trim');
//        $this->form_validation->set_rules('author', $this->lang->line('author'), 'trim');
        $this->form_validation->set_rules('note', $this->lang->line('note'), 'trim');
        $this->form_validation->set_rules('name', $this->lang->line('name'), 'required|trim|callback_name');
    }

    private function _prepare_editsubjectassign_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error-message" style="color: red;">', '</div>');

//        $this->form_validation->set_rules('school_id', $this->lang->line('school_name'), 'trim|required');
        $this->form_validation->set_rules('edit_teacher_id', $this->lang->line('teacher'), 'trim|required');
        $this->form_validation->set_rules('edit_class_id', $this->lang->line('class'), 'trim|required');
        $this->form_validation->set_rules('edit_type', $this->lang->line('type'), 'trim');
        $this->form_validation->set_rules('edit_code', $this->lang->line('subject_code'), 'trim');
//        $this->form_validation->set_rules('author', $this->lang->line('author'), 'trim');
        $this->form_validation->set_rules('note', $this->lang->line('note'), 'trim');
        $this->form_validation->set_rules('edit_name', $this->lang->line('name'), 'required|trim|callback_name');
    }

    private function _get_posted_subjectassign_data() {
        $school_id = $this->session->userdata('school_id');
        $items = array();
//        $items[] = 'school_id';
//        $items[] = 'class_id';
//        $items[] = 'teacher_id';
//        $items[] = 'type';
//        $items[] = 'code';
//        $items[] = 'author';
//        $items[] = 'name';
        $items[] = 'note';
        $data = elements($items, $_POST);

        if ($this->input->post('id')) {

            $data['school_id'] = $school_id;
            $data['pirevn_id'] = $this->input->post('edit_privname');
            $data['class_id'] = $this->input->post('edit_class_id');
            $data['teacher_id'] = $this->input->post('edit_teacher_id');
            $data['type'] = $this->input->post('edit_type');
            $data['code'] = $this->input->post('edit_code');
            $data['name'] = $this->input->post('edit_name');

            $data['modified_at'] = date('Y-m-d H:i:s');
            $data['modified_by'] = logged_in_user_id();
        } else {
//            $school_id = $this->session->userdata('school_id');
            $data['school_id'] = $school_id;
            $data['pirevn_id'] = $this->input->post('privname');
            $data['class_id'] = $this->input->post('class_id');
            $data['teacher_id'] = $this->input->post('teacher_id');
            $data['type'] = $this->input->post('type');
            $data['code'] = $this->input->post('code');
            $data['name'] = $this->input->post('name');

            $data['status'] = 1;
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['created_by'] = logged_in_user_id();
        }

        return $data;
    }

}
