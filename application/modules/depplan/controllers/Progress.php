<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************Route.php**********************************
 * @product name    : PDMS
 * @type            : Class
 * @class name      : Route
 * @description     : Manage transport route.  
 * @author          : Rameca Team 	
 * @url             : https://www.ramecats.lk     
 * @support         : info@ramecats.lk	
 * @copyright       : All Rights Reserved. Design & Developed by Rameca Technology Solutions		
 * ********************************************************** */

class Progress extends MY_Controller {

    public $data = array();

    function __construct() {
        parent::__construct();

        $this->load->model('Route_Model', 'route', true);
        $this->load->model('Ajax_Model', 'ajax', true);
        $listdepartment = $this->ajax->listdepartment();
        $this->data['listdepartment'] = $listdepartment;

        $monthlist = $this->ajax->monthlist();
        $this->data['monthlist'] = $monthlist;

        $pr_type = $this->ajax->pr_type();
        $this->data['pr_type'] = $pr_type;

        $pr_data = $this->ajax->pr_data();
        $this->data['pr_data'] = $pr_data;
    }

    /*     * ***************Function index**********************************
     * @type            : Function
     * @function name   : index
     * @description     : Load "Transport Route List" user interface                 
     *                    
     * @param           : null
     * @return          : null 
     * ********************************************************** */

    public function index($school_id = null) {

        // check_permission(VIEW);
        $user_id = $this->session->userdata('id');
        $condition = array();
        $condition['status'] = 1;
        if ($this->session->userdata('role_id') != SUPER_ADMIN) {
            $condition['school_id'] = $this->session->userdata('school_id');
//            $this->data['add_vehicles'] = $this->route->get_vehicle_list($condition['school_id'], '');
        }
        $this->data['routes'] = $this->route->get_progress_list($user_id);


        $listdepartment = $this->ajax->listdepartment();
        $this->data['listdepartment'] = $listdepartment;


        $monthlist = $this->ajax->monthlist();
        $this->data['monthlist'] = $monthlist;

        $pr_type = $this->ajax->pr_type();
        $this->data['pr_type'] = $pr_type;

        $pr_data = $this->ajax->pr_data();
        $this->data['pr_data'] = $pr_data;

        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('planprogress') . ' | ' . SMS);
        $this->layout->view('progress/index', $this->data);
    }

    /*     * ***************Function add**********************************
     * @type            : Function
     * @function name   : add
     * @description     : Load "Add new Transport Route" user interface                 
     *                    and process to store "Transport Route" into database 
     * @param           : null
     * @return          : null 
     * ********************************************************** */

    public function add() {

        //    check_permission(ADD);
        $user_id = $this->session->userdata('id');
        if ($_POST) {
            $this->_prepare_prozo_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_prozo_data();

                $insert_id = $this->route->insert('deptplan_monthlydetails', $data);
                if ($insert_id) {

                    $this->_save_prozo($insert_id);
                    success($this->lang->line('insert_success'));
                    redirect('depplan/progress/index/' . $data['school_id']);
                } else {
                    error($this->lang->line('insert_failed'));
                    redirect('depplan/progress/add' . $this->input->post('id'));
                }
            } else {
                error($this->lang->line('insert_failed'));
                $this->data['post'] = $_POST;
            }
        }

        $condition = array();
        $condition['status'] = 1;
        if ($this->session->userdata('role_id') != SUPER_ADMIN) {
            $condition['school_id'] = $this->session->userdata('school_id');
            $this->data['routes'] = $this->route->get_progress_list($user_id);
     
        }
        $this->data['routes'] = $this->route->get_progress_list($user_id);
        $this->data['schools'] = $this->schools;



        $this->data['add'] = TRUE;
        $this->layout->title($this->lang->line('add') . ' | ' . SMS);
        $this->layout->view('progress/index', $this->data);
    }

    /*     * ***************Function edit**********************************
     * @type            : Function
     * @function name   : edit
     * @description     : Load Update "Transport Route" user interface                 
     *                    with populate "Transport Route" value 
     *                    and process to update "Transport Route" into database    
     * @param           : $id integer value
     * @return          : null 
     * ********************************************************** */

    public function edit($id = null) {

        //    check_permission(EDIT);

        if (!is_numeric($id)) {
            error($this->lang->line('unexpected_error'));
            redirect('depplan/progress/index');
        }

        if ($_POST) {
            $this->_prepare_prozo_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_prozo_data();
                $updated = $this->route->update('deptplan_monthlydetails', $data, array('id' => $this->input->post('id')));

                if ($updated) {

                    $this->_save_prozo($this->input->post('id'));
                    success($this->lang->line('update_success'));
                    redirect('depplan/progress/index/' . $data['school_id']);
                } else {
                    error($this->lang->line('update_failed'));
                    redirect('depplan/progress/edit/' . $this->input->post('id'));
                }
            } else {
                error($this->lang->line('update_failed'));
                $this->data['route'] = $this->route->get_single('deptplan_monthlydetails', array('id' => $this->input->post('id')));
            }
        }

        if ($id) {
            $this->data['route'] = $this->route->get_single('deptplan_monthlydetails', array('id' => $id));

            if (!$this->data['route']) {
                redirect('depplan/progress/index');
            }
        }


        $condition = array();
        $condition['status'] = 1;
        if ($this->session->userdata('role_id') != SUPER_ADMIN) {
            $condition['school_id'] = $this->session->userdata('school_id');
            //   $this->data['edit_vehicles'] = $this->route->get_vehicle_list($condition['school_id'], $this->data['route']->id); 
        }
        $user_id = $this->session->userdata('id');

        $this->data['routes'] = $this->route->get_progress_list($user_id);
        $this->data['route_stops'] = $this->route->get_list('depplan_programme', array('status' => 1, 'prozo_id' => $id), '', '', '', '', 'id', 'ASC');
        $this->data['pr_data'] = $this->route->get_list('program_data', array('type_id' => $id), '', '', '', '', 'id', 'ASC');


        $this->data['edit'] = TRUE;
        $this->layout->title($this->lang->line('edit') . ' | ' . SMS);
        $this->layout->view('progress/index', $this->data);
    }

    public function confirm($id = null) {

        //    check_permission(EDIT);

        if (!is_numeric($id)) {
            error($this->lang->line('unexpected_error'));
            redirect('plan/progress/index');
        }

        if ($_POST) {
            $this->_prepare_confirm_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_confirm_data();
                $updated = $this->route->update('plan_monthlydetails', $data, array('id' => $this->input->post('id')));

                if ($updated) {

                    // $this->_save_prozo($this->input->post('id'));
                    success($this->lang->line('confirm'));
                    redirect('depplan/progress/index/' . $data['school_id']);
                } else {
                    error($this->lang->line('update_failed'));
                    redirect('depplan/progress/edit/' . $this->input->post('id'));
                }
            } else {
                error($this->lang->line('update_failed'));
                $this->data['route'] = $this->route->get_single('plan_monthlydetails', array('id' => $this->input->post('id')));
            }
        }

        if ($id) {
            $this->data['route'] = $this->route->get_single('plan_monthlydetails', array('id' => $id));

            if (!$this->data['route']) {
                redirect('prozo/progress/index');
            }
        }


        $condition = array();
        $condition['status'] = 1;
        if ($this->session->userdata('role_id') != SUPER_ADMIN) {
            $condition['school_id'] = $this->session->userdata('school_id');
            //   $this->data['edit_vehicles'] = $this->route->get_vehicle_list($condition['school_id'], $this->data['route']->id); 
        }

        $this->data['routes'] = $this->route->get_route_list($this->data['route']->school_id);
        $this->data['route_stops'] = $this->route->get_list('plan_programme', array('status' => 1, 'prozo_id' => $id), '', '', '', '', 'id', 'ASC');

        $this->data['school_id'] = $this->data['route']->school_id;
        $this->data['filter_school_id'] = $this->data['route']->school_id;
        $this->data['schools'] = $this->schools;

        $this->data['edit'] = TRUE;
        $this->layout->title($this->lang->line('edit') . ' | ' . SMS);
        $this->layout->view('progress/indexconfirm', $this->data);
    }

    /*     * ***************Function get_single_route**********************************
     * @type            : Function
     * @function name   : get_single_route
     * @description     : "Load single route information" from database                  
     *                    to the user interface   
     * @param           : null
     * @return          : null 
     * ********************************************************** */

    public function get_single_route() {

        $route_id = $this->input->post('route_id');

        $this->data['route'] = $this->route->get_single_route($route_id);
        $this->data['plan'] = $this->route->get_progress_Details($route_id);
        echo $this->load->view('progress/get-single-route', $this->data);
    }

    /*     * ***************Function _prepare_route_validation**********************************
     * @type            : Function
     * @function name   : _prepare_route_validation
     * @description     : Process "Transport Route" user input data validation                 
     *                       
     * @param           : null
     * @return          : null 
     * ********************************************************** */

    private function _prepare_prozo_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error-message" style="color: red;">', '</div>');

//        $this->form_validation->set_rules('school_id', $this->lang->line('school_name'), 'trim|required');
        $this->form_validation->set_rules('month', $this->lang->line('month'), 'trim|required');
//        $this->form_validation->set_rules('title', $this->lang->line('prozo') . ' ' . $this->lang->line('title'), 'trim|required|callback_title');
//        $this->form_validation->set_rules('date', $this->lang->line('date'), 'trim|required');
//        $this->form_validation->set_rules('prozo', $this->lang->line('prozo'), 'trim|required');
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

    /*     * ***************Function title**********************************
     * @type            : Function
     * @function name   : title
     * @description     : Validate title for the Transport Route                  
     *                       
     * @param           : null
     * @return          : boolean true/false 
     * ********************************************************** */

    public function title() {
        if ($this->input->post('id') == '') {
            $route = $this->route->duplicate_check($this->input->post('school_id'), $this->input->post('title'));
            if ($route) {
                $this->form_validation->set_message('title', $this->lang->line('already_exist'));
                return FALSE;
            } else {
                return TRUE;
            }
        } else if ($this->input->post('id') != '') {
            $route = $this->route->duplicate_check($this->input->post('school_id'), $this->input->post('title'), $this->input->post('id'));
            if ($route) {
                $this->form_validation->set_message('title', $this->lang->line('already_exist'));
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return TRUE;
        }
    }

    private function _get_posted_prozo_data() {

        $items = array();
        $items[] = 'month';


        $role_id = $this->session->userdata('role_id');

        $name = $this->session->userdata('name');
        $user_id = $this->session->userdata('id');
            $month = $this->input->post('month');
        $remarks = $this->input->post('remarks');
        $department_id = $this->input->post('department_id');
        $subdepartment_id = $this->input->post('subdepartment_id');




        $data = elements($items, $_POST);

        $data['role_id'] = $role_id;
        $data['user_id'] = $user_id;
        $data['department_id'] = $department_id;
        $data['subdepartment_id'] = $subdepartment_id;
        $data['cur_status'] = 1;

        $data['name'] = $name;
        $data['note'] = $remarks;



        if ($this->input->post('id')) {

            $data['monthyear'] = date("Y") . "-" . $month;
            $data['modified_at'] = date('Y-m-d H:i:s');
            $data['modified_by'] = logged_in_user_id();
        } else {



            $data['monthyear'] = date("Y") . "-" . $month;
            $data['status'] = 1;
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['created_by'] = logged_in_user_id();
        }

        return $data;
    }

    /*     * ***************Function _get_posted_route_data**********************************
     * @type            : Function
     * @function name   : _get_posted_route_data
     * @description     : Prepare "Transport Route" user input data to save into database                  
     *                       
     * @param           : null
     * @return          : $data array(); value 
     * ********************************************************** */

    private function _get_posted_confirm_data() {

        $items = array();
//        $items[] = 'school_id';
//        $items[] = 'title';
//        $items[] = 'route_start';
//        $items[] = 'route_end';
//        $items[] = 'note';

        $data = elements($items, $_POST);

        $data['cur_status'] = 2;
        $data['confirmstatus'] = 2;
        $data['confirm_at'] = date('Y-m-d H:i:s');
        $data['confirm_by'] = logged_in_user_id();


        return $data;
    }

    /*     * ***************Function delete**********************************
     * @type            : Function
     * @function name   : delete
     * @description     : delete "Transpoer Route" data from database                  
     *                       
     * @param           : $id integer value
     * @return          : null 
     * ********************************************************** */

    public function delete($id = null) {

        //      check_permission(DELETE);

        if (!is_numeric($id)) {
            error($this->lang->line('unexpected_error'));
            redirect('depplan/progress/index');
        }

        // update vehicle status
        $route = $this->route->get_single('deptplan_monthlydetails', array('id' => $id));

        if ($this->route->delete('deptplan_monthlydetails', array('id' => $id))) {


            // delete route stop
            $this->route->delete('depplan_programme', array('route_id' => $id));


            success($this->lang->line('delete_success'));
        } else {
            error($this->lang->line('delete_failed'));
        }
        redirect('depplan/progress/index/' . $route->user_id);
    }

    /*     * ***************Function _save_stop**********************************
     * @type            : Function
     * @function name   : _save_stop
     * @description     : delete "Save bus stop " into database                  
     *                       
     * @param           : $route_id integer value
     * @return          : null 
     * ********************************************************** */

    private function _save_prozo($prozo_id) {

        //    $school_id = $this->input->post('school_id');

        $role_id = $this->session->userdata('role_id');
        $user_id = $this->session->userdata('id');


        foreach ($this->input->post('proposed_date') as $key => $value) {

            if ($value) {

                $data = array();
                $exist = '';
                //$stop_id = @$this->input->post('stop_id')[$key];
                $tea_id = @$_POST['stop_id'][$key];

                if ($tea_id) {
                    $exist = $this->route->get_single('depplan_programme', array('prozo_id' => $prozo_id, 'id' => $tea_id));
                }


                $data['proposed_date'] = $value;
                $data['prozon_start_time'] = @$_POST['prozon_start_time'][$key];
                $data['prozon_end_time'] = @$_POST['prozon_end_time'][$key];
                $data['program_type'] = @$_POST['program_type'][$key];
                $data['program'] = @$_POST['program'][$key];
                $data['reason'] = @$_POST['reason'][$key];
                $data['address'] = @$_POST['address'][$key];
                $data['expected_beneficiaries'] = @$_POST['expected_beneficiaries'][$key];
                $data['expected_cost'] = @$_POST['expected_cost'][$key];
//                $data['cost_institution'] = @$_POST['cost_institution'][$key];


                if ($this->input->post('id') && $exist) {

                    $data['modified_at'] = date('Y-m-d H:i:s');
                    $data['modified_by'] = logged_in_user_id();
                    $this->route->update('depplan_programme', $data, array('id' => $exist->id));
                } else {

                    $data['role_id'] = $role_id;
                    $data['prozo_id'] = $prozo_id;
                    $data['user_id'] = $user_id;
                    $data['month'] = $this->input->post('month');
                    $data['status'] = 1;
                    $data['created_at'] = date('Y-m-d H:i:s');
                    $data['created_by'] = logged_in_user_id();
                    $this->route->insert('depplan_programme', $data);
                }
            }
        }
    }

    public function remove_stop() {

        $stop_id = $this->input->post('stop_id');
        echo $this->route->delete('depplan_programme', array('id' => $stop_id));
    }

    public function remove_event() {

        $stop_id = $this->input->post('stop_id');
        echo $this->route->delete('depplan_programme', array('id' => $stop_id));
    }

    public function getTableProductRow() {
        $products = $this->route->getProductData();
        echo json_encode($products);
    }

    public function getTableProgrammeType() {
        $products = $this->route->getProductType();
        echo json_encode($products);
    }

}
