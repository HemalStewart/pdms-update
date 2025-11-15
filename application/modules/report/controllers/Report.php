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



class Report extends My_Controller {



    public $data = array();

    public $date_from = '';

    public $date_to = '';



    public function __construct() {

        parent::__construct();



        $this->load->model('Report_Model', 'report', true);

        $this->load->helper('report');



        if ($this->session->userdata('role_id') != SUPER_ADMIN) {

            $school_id = $this->session->userdata('school_id');

            $this->data['academic_years'] = $this->report->get_list('academic_years', array('status' => 1, 'school_id' => $school_id));

        }



        $this->date_from = date('Y-m-01');

        $this->date_to = date('Y-m-t');

        $this->db->query("SET SESSION sql_mode = ''");

    }



    /*     * ***************Function income**********************************

     * @type            : Function

     * @function name   : income

     * @description     : Load Income report user interface                 

     *                    with various filtering options

     *                    and process to load income report   

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    public function income() {



        check_permission(VIEW);



        if ($_POST) {



            $school_id = $this->input->post('school_id');

            $academic_year_id = $this->input->post('academic_year_id');

            $group_by = $this->input->post('group_by');



            if ($group_by == 'daily') {

                $date_from = $this->input->post('date_from') ? date('Y-m-d', strtotime($this->input->post('date_from'))) : $this->date_from;

                $date_to = $this->input->post('date_to') ? date('Y-m-d', strtotime($this->input->post('date_to'))) : $this->date_to;

            } else {

                $date_from = '';

                $date_to = '';

            }



            $this->data['school_id'] = $school_id;

            $this->data['academic_year_id'] = $academic_year_id;

            $this->data['group_by'] = $group_by;

            $this->data['date_from'] = $date_from;

            $this->data['date_to'] = $date_to;



            $this->data['school'] = $this->report->get_school_by_id($school_id);



            $this->data['income'] = $this->report->get_income_report($school_id, $academic_year_id, $group_by, $date_from, $date_to);

        }



        $this->data['report_url'] = site_url('report/income');



        $this->layout->title($this->lang->line('income_report') . ' | ' . SMS);

        $this->layout->view('income/index', $this->data);

    }



    /*     * ***************Function expenditure**********************************

     * @type            : Function

     * @function name   : expenditure

     * @description     : Load expenditure report user interface                 

     *                    with various filtering options

     *                    and process to load expenditure report   

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    public function expenditure() {



        check_permission(VIEW);



        if ($_POST) {



            $school_id = $this->input->post('school_id');

            $academic_year_id = $this->input->post('academic_year_id');

            $group_by = $this->input->post('group_by');



            if ($group_by == 'daily') {

                $date_from = $this->input->post('date_from') ? date('Y-m-d', strtotime($this->input->post('date_from'))) : $this->date_from;

                $date_to = $this->input->post('date_to') ? date('Y-m-d', strtotime($this->input->post('date_to'))) : $this->date_to;

            } else {

                $date_from = '';

                $date_to = '';

            }



            $this->data['school_id'] = $school_id;

            $this->data['academic_year_id'] = $academic_year_id;

            $this->data['group_by'] = $group_by;

            $this->data['date_from'] = $date_from;

            $this->data['date_to'] = $date_to;



            $this->data['school'] = $this->report->get_school_by_id($school_id);



            $this->data['expenditure'] = $this->report->get_expenditure_report($school_id, $academic_year_id, $group_by, $date_from, $date_to);

        }



        $this->data['report_url'] = site_url('report/expenditure');

        $this->layout->title($this->lang->line('expenditure_report') . ' | ' . SMS);

        $this->layout->view('expenditure/index', $this->data);

    }



    /*     * ***************Function invoice**********************************

     * @type            : Function

     * @function name   : invoice

     * @description     : Load invoice report user interface                 

     *                    with various filtering options

     *                    and process to load invoice report   

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    public function invoice() {



        check_permission(VIEW);



        if ($_POST) {



            $school_id = $this->input->post('school_id');

            $academic_year_id = $this->input->post('academic_year_id');

            $group_by = $this->input->post('group_by');



            if ($group_by == 'daily') {

                $date_from = $this->input->post('date_from') ? date('Y-m-d', strtotime($this->input->post('date_from'))) : $this->date_from;

                $date_to = $this->input->post('date_to') ? date('Y-m-d', strtotime($this->input->post('date_to'))) : $this->date_to;

            } else {



                $date_from = '';

                $date_to = '';

            }



            $this->data['school_id'] = $school_id;

            $this->data['academic_year_id'] = $academic_year_id;

            $this->data['group_by'] = $group_by;

            $this->data['date_from'] = $date_from;

            $this->data['date_to'] = $date_to;



            $this->data['school'] = $this->report->get_school_by_id($school_id);



            $this->data['invoice'] = $this->report->get_invoice_report($school_id, $academic_year_id, $group_by, $date_from, $date_to);

        }



        $this->data['report_url'] = site_url('report/invoice');

        $this->layout->title($this->lang->line('invoice_report') . ' | ' . SMS);

        $this->layout->view('invoice/index', $this->data);

    }



    /*     * ***************Function duefees**********************************

     * @type            : Function

     * @function name   : duefees

     * @description     : Load duefees report user interface                 

     *                    with various filtering options

     *                    and process to load balance report   

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    public function duefee() {



        check_permission(VIEW);



        if ($_POST) {



            $school_id = $this->input->post('school_id');

            $academic_year_id = $this->input->post('academic_year_id');

            $class_id = $this->input->post('class_id');

            $student_id = $this->input->post('student_id');



            $this->data['school_id'] = $school_id;

            $this->data['academic_year_id'] = $academic_year_id;

            $this->data['student_id'] = $student_id;

            $this->data['class_id'] = $class_id;

            $this->data['school'] = $this->report->get_school_by_id($school_id);



            $this->data['sbalance'] = $this->report->get_student_due_fee_report($school_id, $academic_year_id, $class_id, $student_id);

        }



        if ($this->session->userdata('role_id') != SUPER_ADMIN) {

            $school_id = $this->session->userdata('school_id');

            $this->data['classes'] = $this->report->get_list('classes', array('status' => 1, 'school_id' => $school_id), '', '', '', 'id', 'ASC');

        }



        $this->data['report_url'] = site_url('report/duefee');

        $this->layout->title($this->lang->line('due_fee_report') . ' | ' . SMS);

        $this->layout->view('invoice/duefee', $this->data);

    }



    /*     * ***************Function feecollection**********************************

     * @type            : Function

     * @function name   : feecollection

     * @description     : Load fee collection report user interface                 

     *                    with various filtering options

     *                    and process to load balance report   

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    public function feecollection() {



        check_permission(VIEW);



        if ($_POST) {



            $school_id = $this->input->post('school_id');

            $academic_year_id = $this->input->post('academic_year_id');

            $class_id = $this->input->post('class_id');

            $student_id = $this->input->post('student_id');



            $date_from = $this->input->post('date_from') ? date('Y-m-d', strtotime($this->input->post('date_from'))) : '';

            $date_to = $this->input->post('date_to') ? date('Y-m-d', strtotime($this->input->post('date_to'))) : '';



            $this->data['school_id'] = $school_id;

            $this->data['date_from'] = $date_from;

            $this->data['date_to'] = $date_to;

            $this->data['academic_year_id'] = $academic_year_id;

            $this->data['student_id'] = $student_id;

            $this->data['class_id'] = $class_id;

            $this->data['school'] = $this->report->get_school_by_id($school_id);



            $this->data['feecollection'] = $this->report->get_student_fee_collection_report($school_id, $academic_year_id, $class_id, $student_id, $date_from, $date_to);

        }



        if ($this->session->userdata('role_id') != SUPER_ADMIN) {



            $school_id = $this->session->userdata('school_id');



            $this->data['classes'] = $this->report->get_list('classes', array('status' => 1, 'school_id' => $school_id), '', '', '', 'id', 'ASC');

            $this->data['fee_types'] = $this->report->get_list('income_heads', array('status' => 1, 'head_type !=' => 'income', 'school_id' => $school_id), '', '', '', 'id', 'ASC');

        }



        $this->data['report_url'] = site_url('report/feecollection');

        $this->layout->title($this->lang->line('fee_collection_report') . ' | ' . SMS);

        $this->layout->view('invoice/fee_collection', $this->data);

    }



    /*     * ***************Function balance**********************************

     * @type            : Function

     * @function name   : balance

     * @description     : Load balance report user interface                 

     *                    with various filtering options

     *                    and process to load balance report   

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    public function balance() {



        check_permission(VIEW);



        if ($_POST) {



            $school_id = $this->input->post('school_id');

            $academic_year_id = $this->input->post('academic_year_id');

            $group_by = $this->input->post('group_by');



            if ($group_by == 'daily') {

                $date_from = $this->input->post('date_from') ? date('Y-m-d', strtotime($this->input->post('date_from'))) : $this->date_from;

                $date_to = $this->input->post('date_to') ? date('Y-m-d', strtotime($this->input->post('date_to'))) : $this->date_to;

            } else {



                $date_from = '';

                $date_to = '';

            }



            $this->data['school_id'] = $school_id;

            $this->data['academic_year_id'] = $academic_year_id;

            $this->data['group_by'] = $group_by;

            $this->data['date_from'] = $date_from;

            $this->data['date_to'] = $date_to;





            if ($group_by == 'daily') {

                $this->data['balance'] = $this->_get_daily_balance_data($school_id, $date_from, $date_to);

            } else {

                $this->data['expenditure'] = $this->report->get_expenditure_report($school_id, $academic_year_id, $group_by, $date_from, $date_to);

                $this->data['income'] = $this->report->get_income_report($school_id, $academic_year_id, $group_by, $date_from, $date_to);

                $this->data['balance'] = $this->_combine_balance_data($this->data['expenditure'], $this->data['income']);

            }



            $this->data['school'] = $this->report->get_school_by_id($school_id);

        }



        $this->data['report_url'] = site_url('report/balance');

        $this->layout->title($this->lang->line('accounting_balance_report') . ' | ' . SMS);

        $this->layout->view('balance/index', $this->data);

    }



    /*     * ***************Function _get_daily_balance_data**********************************

     * @type            : Function

     * @function name   : _get_daily_balance_data

     * @description     : format the daily balanace report data for user friendly data presentation                

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    private function _get_daily_balance_data($school_id, $date_from, $date_to) {



        $data = array();



        $days = date('d', strtotime($date_to));



        for ($i = 0; $i < $days; $i++) {



            $date = date('Y-m-d', strtotime($date_from . '+' . $i . ' day'));

            $data[$i]['expenditure'] = $this->report->get_expenditure_by_date($school_id, $date);

            $data[$i]['income'] = $this->report->get_income_by_date($school_id, $date);

            $data[$i]['group_by_field'] = date($this->global_setting->date_format, strtotime($date));

        }



        return $data;

    }



    /*     * ***************Function _combine_balance_data**********************************

     * @type            : Function

     * @function name   : _combine_balance_data

     * @description     : combined expenditure and income report data for user friendly data presentation                

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    private function _combine_balance_data($expenditure, $income) {

        $data = array();

        foreach ($expenditure as $obj) {

            $data[$obj->group_by_field]['expenditure'] = $obj->total_amount;

            $data[$obj->group_by_field]['group_by_field'] = $obj->group_by_field;

            if (empty($data[$obj->group_by_field]['income'])) {

                $data[$obj->group_by_field]['income'] = 0;

            }

        }

        foreach ($income as $obj) {

            $data[$obj->group_by_field]['income'] = $obj->total_amount;

            $data[$obj->group_by_field]['group_by_field'] = $obj->group_by_field;



            if (empty($data[$obj->group_by_field]['expenditure'])) {

                $data[$obj->group_by_field]['expenditure'] = 0;

            }

        }

        return $data;

    }



    /*     * ***************Function library**********************************

     * @type            : Function

     * @function name   : library

     * @description     : Load library report user interface                 

     *                    with various filtering options

     *                    and process to load library report   

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    public function library() {



        check_permission(VIEW);



        if ($_POST) {



            $school_id = $this->input->post('school_id');

            $academic_year_id = $this->input->post('academic_year_id');

            $group_by = $this->input->post('group_by');



            if ($group_by == 'daily') {

                $date_from = $this->input->post('date_from') ? date('Y-m-d', strtotime($this->input->post('date_from'))) : $this->date_from;

                $date_to = $this->input->post('date_to') ? date('Y-m-d', strtotime($this->input->post('date_to'))) : $this->date_to;

            } else {



                $date_from = '';

                $date_to = '';

            }



            $this->data['school_id'] = $school_id;

            $this->data['academic_year_id'] = $academic_year_id;

            $this->data['group_by'] = $group_by;

            $this->data['date_from'] = $date_from;

            $this->data['date_to'] = $date_to;



            $this->data['school'] = $this->report->get_school_by_id($school_id);



            $this->data['library'] = $this->report->get_library_report($school_id, $academic_year_id, $group_by, $date_from, $date_to);

        }



        $this->data['report_url'] = site_url('report/library');

        $this->layout->title($this->lang->line('library_report') . ' | ' . SMS);

        $this->layout->view('library/index', $this->data);

    }



    /*     * ***************Function sattendance**********************************

     * @type            : Function

     * @function name   : sattendance

     * @description     : Load student attendance report user interface                 

     *                    with various filtering options

     *                    and process to load student attendance report   

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    public function sattendance() {



        check_permission(VIEW);



        $this->data['month_number'] = 1;

        $this->data['days'] = 31;



        if ($_POST) {



            $school_id = $this->input->post('school_id');

            $academic_year_id = $this->input->post('academic_year_id');

            $class_id = $this->input->post('class_id');

            $section_id = $this->input->post('section_id');

            $month = $this->input->post('month');





            $this->data['school_id'] = $school_id;

            $this->data['academic_year_id'] = $academic_year_id;

            $this->data['class_id'] = $class_id;

            $this->data['section_id'] = $section_id;

            $this->data['month'] = $month;

            $this->data['month_number'] = date('m', strtotime($this->data['month']));



            $session = $this->report->get_single('academic_years', array('id' => $academic_year_id, 'school_id' => $school_id));

            $this->data['school'] = $this->report->get_school_by_id($school_id);



            $this->data['students'] = $this->report->get_student_list($school_id, $academic_year_id, $class_id, $section_id);



            $this->data['year'] = substr($session->session_year, 7);

            $this->data['days'] = @date('t', mktime(0, 0, 0, $this->data['month_number'], 1, $this->data['year']));

            //$this->data['days'] = cal_days_in_month(CAL_GREGORIAN, $this->data['month_number'], $this->data['year']);

        }







        $condition = array();

        $condition['status'] = 1;

        if ($this->session->userdata('role_id') != SUPER_ADMIN) {



            $condition['school_id'] = $this->session->userdata('school_id');

            $this->data['classes'] = $this->report->get_list('classes', $condition, '', '', '', 'id', 'ASC');

        }





        $this->data['report_url'] = site_url('report/sattendance');

        $this->layout->title($this->lang->line('student_attendance_report') . ' | ' . SMS);

        $this->layout->view('sattendance/index', $this->data);

    }



    /*     * ***************Function syattendance**********************************

     * @type            : Function

     * @function name   : syattendance

     * @description     : Load student yearly attendance report user interface                 

     *                    with various filtering options

     *                    and process to load student yearly attendance report   

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    public function syattendance() {



        check_permission(VIEW);



        if ($_POST) {



            $school_id = $this->input->post('school_id');

            $academic_year_id = $this->input->post('academic_year_id');

            $class_id = $this->input->post('class_id');

            $section_id = $this->input->post('section_id');

            $student_id = $this->input->post('student_id');



            $this->data['school_id'] = $school_id;

            $this->data['academic_year_id'] = $academic_year_id;

            $this->data['class_id'] = $class_id;

            $this->data['section_id'] = $section_id;

            $this->data['student_id'] = $student_id;



            $this->data['school'] = $this->report->get_school_by_id($school_id);

        }





        $this->data['days'] = 31;



        $condition = array();

        $condition['status'] = 1;

        if ($this->session->userdata('role_id') != SUPER_ADMIN) {



            $condition['school_id'] = $this->session->userdata('school_id');

            $this->data['classes'] = $this->report->get_list('classes', $condition, '', '', '', 'id', 'ASC');

        }



        $this->data['report_url'] = site_url('report/syattendance');

        $this->layout->title($this->lang->line('student_yearly_attendance_report') . ' | ' . SMS);

        $this->layout->view('sattendance/yearly', $this->data);

    }



    /*     * ***************Function tattendance**********************************

     * @type            : Function

     * @function name   : tattendance

     * @description     : Load teacher attendance report user interface                 

     *                    with various filtering options

     *                    and process to load teacher attendance report   

     * @param           : null

     * @return          : null 

     * ********************************************************** */



  public function tattendance() {



        check_permission(VIEW);



        $this->data['month_number'] = 1;

        $this->data['days'] = 31;



        if ($_POST) {



            $school_id = $this->input->post('school_id');

            $academic_year_id = $this->input->post('academic_year_id');

            $month = $this->input->post('month');



            $this->data['school_id'] = $school_id;

            $this->data['academic_year_id'] = $academic_year_id;

            $this->data['month'] = $month;

            $this->data['month_number'] = date('m', strtotime($this->data['month']));



            $this->data['teachers'] = $this->report->get_list('teachers', array('status' => 1, 'school_id' => $school_id));

            $session = $this->report->get_single('academic_years', array('id' => $academic_year_id, 'school_id' => $school_id));

            $this->data['school'] = $this->report->get_school_by_id($school_id);



            $this->data['year'] = substr($session->session_year, 7);

            //$this->data['days'] = cal_days_in_month(CAL_GREGORIAN, $this->data['month_number'], $this->data['year']);

            $this->data['days'] = @date('t', mktime(0, 0, 0, $this->data['month_number'], 1, $this->data['year']));

        }



        $this->data['report_url'] = site_url('report/tattendance');

        $this->layout->title($this->lang->line('teacher_attendance_report') . ' | ' . SMS);

        $this->layout->view('tattendance/index', $this->data);

    }



    /*     * ***************Function tyattendance**********************************

     * @type            : Function

     * @function name   : tyattendance

     * @description     : Load teacher yearly attendance report user interface                 

     *                    with various filtering options

     *                    and process to load teacher yearly attendance report   

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    public function tyattendance() {



        check_permission(VIEW);



        if ($_POST) {



            $school_id = $this->input->post('school_id');

            $academic_year_id = $this->input->post('academic_year_id');

            $teacher_id = $this->input->post('teacher_id');



            $this->data['school_id'] = $school_id;

            $this->data['academic_year_id'] = $academic_year_id;

            $this->data['teacher_id'] = $teacher_id;



            $this->data['school'] = $this->report->get_school_by_id($school_id);

        }



        $condition = array();

        $condition['status'] = 1;

        if ($this->session->userdata('role_id') != SUPER_ADMIN) {



            $condition['school_id'] = $this->session->userdata('school_id');

            $this->data['teachers'] = $this->report->get_list('teachers', $condition);

        }





        $this->data['days'] = 31;

        $this->data['report_url'] = site_url('report/tyattendance');

        $this->layout->title($this->lang->line('teacher_yearly_attendance_report') . ' | ' . SMS);

        $this->layout->view('tattendance/yearly', $this->data);

    }



    /*     * ***************Function eattendance**********************************

     * @type            : Function

     * @function name   : eattendance

     * @description     : Load Employee attendance report user interface                 

     *                    with various filtering options

     *                    and process to load Employee attendance report   

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    public function eattendance() {



        check_permission(VIEW);



        $this->data['month_number'] = 1;

        $this->data['days'] = 31;



        if ($_POST) {



            $school_id = $this->input->post('school_id');

            $academic_year_id = $this->input->post('academic_year_id');

            $month = $this->input->post('month');



            $this->data['school_id'] = $school_id;

            $this->data['academic_year_id'] = $academic_year_id;

            $this->data['month'] = $month;

            $this->data['month_number'] = date('m', strtotime($this->data['month']));



            $this->data['employees'] = $this->report->get_list('employees', array('status' => 1, 'school_id' => $school_id));

            $session = $this->report->get_single('academic_years', array('id' => $academic_year_id, 'school_id' => $school_id));

            $this->data['school'] = $this->report->get_school_by_id($school_id);



            $this->data['year'] = substr($session->session_year, 7);

            //$this->data['days'] = cal_days_in_month(CAL_GREGORIAN, $this->data['month_number'], $this->data['year']);

            $this->data['days'] = @date('t', mktime(0, 0, 0, $this->data['month_number'], 1, $this->data['year']));

        }





        $this->data['report_url'] = site_url('report/eattendance');

        $this->layout->title($this->lang->line('employee_attendance_report') . ' | ' . SMS);

        $this->layout->view('eattendance/index', $this->data);

    }



    /*     * ***************Function eyattendance**********************************

     * @type            : Function

     * @function name   : eyattendance

     * @description     : Load Employee yearly attendance report user interface                 

     *                    with various filtering options

     *                    and process to load Employee yearly attendance report   

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    public function eyattendance() {



        check_permission(VIEW);



        if ($_POST) {



            $school_id = $this->input->post('school_id');

            $academic_year_id = $this->input->post('academic_year_id');

            $employee_id = $this->input->post('employee_id');



            $this->data['school_id'] = $school_id;

            $this->data['academic_year_id'] = $academic_year_id;

            $this->data['employee_id'] = $employee_id;



            $this->data['school'] = $this->report->get_school_by_id($school_id);

        }





        $condition = array();

        $condition['status'] = 1;

        if ($this->session->userdata('role_id') != SUPER_ADMIN) {



            $condition['school_id'] = $this->session->userdata('school_id');

            $this->data['employees'] = $this->report->get_list('employees', $condition);

        }



        $this->data['days'] = 31;



        $this->data['report_url'] = site_url('report/eyattendance');

        $this->layout->title($this->lang->line('employee_yearly_attendance_report') . ' | ' . SMS);

        $this->layout->view('eattendance/yearly', $this->data);

    }



    /*     * ***************Function student**********************************

     * @type            : Function

     * @function name   : student

     * @description     : Load student report user interface                 

     *                    with various filtering options

     *                    and process to load student report   

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    public function student() {



        check_permission(VIEW);



        if ($_POST) {



            $school_id = $this->input->post('school_id');

            $academic_year_id = $this->input->post('academic_year_id');

            $group_by = $this->input->post('group_by');



            $this->data['school_id'] = $school_id;

            $this->data['academic_year_id'] = $academic_year_id;

            $this->data['group_by'] = $group_by;



            $this->data['school'] = $this->report->get_school_by_id($school_id);



            $this->data['students'] = $this->report->get_student_report($school_id, $academic_year_id, $group_by);

            $this->data['students'] = $this->_get_pormatted_student_report($school_id, $group_by, $this->data['students']);

        }



        $this->data['report_url'] = site_url('report/student');

        $this->layout->title($this->lang->line('student_report') . ' | ' . SMS);

        $this->layout->view('student/index', $this->data);

    }



    /*     * ***************Function _get_pormatted_student_report**********************************

     * @type            : Function

     * @function name   : _get_pormatted_student_report

     * @description     : Format the student report for better representation                 

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    private function _get_pormatted_student_report($school_id, $group_by, $students = null) {



        $data = array();

        if (!empty($students)) {

            foreach ($students as $obj) {



                $male = $this->report->get_student_by_gender($school_id, $group_by, $obj->class_id, $obj->academic_year_id, 'male');

                $obj->male = $male ? $male : 0;

                $female = $this->report->get_student_by_gender($school_id, $group_by, $obj->class_id, $obj->academic_year_id, 'female');

                $obj->female = $female ? $female : 0;

                $data[] = $obj;

            }

        }



        return $data;

    }



    /*     * ***************Function sbalance**********************************

     * @type            : Function

     * @function name   : sbalance

     * @description     : Load sbalance report user interface                 

     *                    with various filtering options

     *                    and process to load balance report   

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    public function sinvoice() {



        check_permission(VIEW);



        if ($_POST) {



            $school_id = $this->input->post('school_id');

            $academic_year_id = $this->input->post('academic_year_id');

            $class_id = $this->input->post('class_id');

            $student_id = $this->input->post('student_id');



            $this->data['school_id'] = $school_id;

            $this->data['academic_year_id'] = $academic_year_id;

            $this->data['student_id'] = $student_id;

            $this->data['class_id'] = $class_id;



            if ($academic_year_id) {

                $this->data['academic_year'] = $this->db->get_where('academic_years', array('id' => $academic_year_id))->row()->session_year;

            }



            $this->data['school'] = $this->report->get_school_by_id($school_id);



            $this->data['sbalance'] = $this->report->get_student_invoice_report($school_id, $academic_year_id, $class_id, $student_id);

        }



        $condition = array();

        $condition['status'] = 1;

        if ($this->session->userdata('role_id') != SUPER_ADMIN) {



            $condition['school_id'] = $this->session->userdata('school_id');

            $this->data['classes'] = $this->report->get_list('classes', $condition, '', '', '', 'id', 'ASC');

        }



        $this->data['report_url'] = site_url('report/sinvoice');

        $this->layout->title($this->lang->line('student_invoice_report') . ' | ' . SMS);

        $this->layout->view('student/sinvoice', $this->data);

    }



    /*     * ***************Function sactivity**********************************

     * @type            : Function

     * @function name   : sactivity

     * @description     : Load balance report user interface                 

     *                    with various filtering options

     *                    and process to load balance report   

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    public function sactivity() {



        check_permission(VIEW);



        if ($_POST) {



            $school_id = $this->input->post('school_id');

            $academic_year_id = $this->input->post('academic_year_id');

            $class_id = $this->input->post('class_id');

            $student_id = $this->input->post('student_id');



            $this->data['school_id'] = $school_id;

            $this->data['academic_year_id'] = $academic_year_id;

            $this->data['student_id'] = $student_id;

            $this->data['class_id'] = $class_id;



            $this->data['school'] = $this->report->get_school_by_id($school_id);



            if ($academic_year_id) {

                $this->data['academic_year'] = $this->db->get_where('academic_years', array('id' => $academic_year_id))->row()->session_year;

            }



            $this->data['activities'] = $this->report->get_student_activity_report($school_id, $academic_year_id, $class_id, $student_id);

        }



        $condition = array();

        $condition['status'] = 1;

        if ($this->session->userdata('role_id') != SUPER_ADMIN) {



            $condition['school_id'] = $this->session->userdata('school_id');

            $this->data['classes'] = $this->report->get_list('classes', $condition, '', '', '', 'id', 'ASC');

        }



        $this->data['report_url'] = site_url('report/sactivity');

        $this->layout->title($this->lang->line('student_activity_report') . ' | ' . SMS);

        $this->layout->view('student/activity', $this->data);

    }



    /*     * ***************Function payroll**********************************

     * @type            : Function

     * @function name   : payroll

     * @description     : Load payroll report user interface                 

     *                    with various filtering options

     *                    and process to load payroll report   

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    public function payroll() {



        check_permission(VIEW);



        if ($_POST) {



            $school_id = $this->input->post('school_id');

            $academic_year_id = $this->input->post('academic_year_id');

            $group_by = $this->input->post('group_by');

            $month = $this->input->post('month');

            $payment_to = $this->input->post('payment_to');





            $this->data['school_id'] = $school_id;

            $this->data['academic_year_id'] = $academic_year_id;

            $this->data['group_by'] = $group_by;

            $this->data['payment_to'] = $payment_to;

            $this->data['month'] = $month;



            $this->data['school'] = $this->report->get_school_by_id($school_id);



            if ($academic_year_id) {

                $this->data['academic_year'] = $this->db->get_where('academic_years', array('id' => $academic_year_id, 'school_id' => $school_id))->row()->session_year;

            }



            $this->data['payrolls'] = $this->report->get_payroll_report($school_id, $academic_year_id, $group_by, $payment_to, $month);

        }



        $this->data['report_url'] = site_url('report/payroll');

        $this->layout->title($this->lang->line('payroll_report') . ' | ' . SMS);

        $this->layout->view('payroll/index', $this->data);

    }



    /*     * ***************Function statement**********************************

     * @type            : Function

     * @function name   : statement

     * @description     : Load balance report user interface                 

     *                    with various filtering options

     *                    and process to load balance report   

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    public function statement() {



        check_permission(VIEW);



        if ($_POST) {



            $school_id = $this->input->post('school_id');

            $date_from = $this->input->post('date_from') ? date('Y-m-d', strtotime($this->input->post('date_from'))) : $this->date_from;

            $date_to = $this->input->post('date_to') ? date('Y-m-d', strtotime($this->input->post('date_to'))) : $this->date_to;



            $this->data['school_id'] = $school_id;

            $this->data['date_from'] = $date_from;

            $this->data['date_to'] = $date_to;



            $this->data['school'] = $this->report->get_school_by_id($school_id);







            $this->data['statement'] = $this->_get_daily_actbalance_data($school_id, $date_from, $date_to);

        }



        $this->data['report_url'] = site_url('report/statement');

        $this->layout->title($this->lang->line('daily_statement_report') . ' | ' . SMS);

        $this->layout->view('balance/statement', $this->data);

    }



    /*     * ***************Function _get_daily_actbalance_data**********************************

     * @type            : Function

     * @function name   : _get_daily_actbalance_data

     * @description     : format the daily balanace report data for user friendly data presentation                

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    private function _get_daily_actbalance_data($school_id, $date_from, $date_to) {



        $data = array();



        $start = strtotime($date_from);

        $end = strtotime($date_to);

        $days = ceil(abs($end - $start) / 86400) + 1;

        $j = 0;

        for ($i = 0; $i < $days; $i++) {



            $date = date('Y-m-d', strtotime($date_from . '+' . $i . ' day'));



            $expenditure = $this->report->get_debit_by_date($school_id, $date);

            if (!empty($expenditure)) {



                foreach ($expenditure as $exp) {

                    $data[$j + 1]['head'] = $exp->head;

                    $data[$j + 1]['debit'] = $exp->debit;

                    $data[$j + 1]['credit'] = 0;

                    $data[$j + 1]['gross'] = $exp->debit;

                    $data[$j + 1]['tax'] = 0;

                    $data[$j + 1]['note'] = $exp->note;

                    $data[$j + 1]['date'] = $date;



                    $j++;

                }

            }



            $income = $this->report->get_credit_by_date($school_id, $date);

            if (!empty($income)) {



                foreach ($income as $inc) {

                    $data[$j + 1]['head'] = $inc->head;

                    $data[$j + 1]['debit'] = 0;

                    $data[$j + 1]['credit'] = $inc->credit;

                    $data[$j + 1]['gross'] = $inc->credit;

                    $data[$j + 1]['tax'] = 0;

                    $data[$j + 1]['note'] = $inc->note;

                    $data[$j + 1]['date'] = $date;



                    $j++;

                }

            }

        }



        return $data;

    }



    /*     * ***************Function transaction**********************************

     * @type            : Function

     * @function name   : transaction

     * @description     : Load balance report user interface                 

     *                    with various filtering options

     *                    and process to load balance report   

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    public function transaction() {



        check_permission(VIEW);



        if ($_POST) {



            $school_id = $this->input->post('school_id');

            $academic_year_id = $this->input->post('academic_year_id');

            $date_from = $this->input->post('date_from') ? date('Y-m-d', strtotime($this->input->post('date_from'))) : $this->date_from;

            $date_to = $this->input->post('date_to') ? date('Y-m-d', strtotime($this->input->post('date_to'))) : $this->date_to;



            $this->data['school_id'] = $school_id;

            $this->data['academic_year_id'] = $academic_year_id;

            $this->data['date_from'] = $date_from;

            $this->data['date_to'] = $date_to;



            $this->data['school'] = $this->report->get_school_by_id($school_id);



            if ($academic_year_id) {

                $this->data['academic_year'] = $this->db->get_where('academic_years', array('id' => $academic_year_id, 'school_id' => $school_id))->row()->session_year;

            }



            $this->data['transaction'] = $this->report->get_transaction_report($school_id, $academic_year_id, $date_from, $date_to);

        }



        $this->data['report_url'] = site_url('report/transaction');

        $this->layout->title($this->lang->line('daily_transaction_report') . ' | ' . SMS);

        $this->layout->view('balance/transaction', $this->data);

    }



    /*     * ***************Function examresult**********************************

     * @type            : Function

     * @function name   : examresult

     * @description     : Load examresult report user interface                 

     *                    with various filtering options

     *                    and process to load balance report   

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    public function examresult() {



        check_permission(VIEW);



        if ($_POST) {



            $school_id = $this->input->post('school_id');

            $academic_year_id = $this->input->post('academic_year_id');

            $class_id = $this->input->post('class_id');

            $section_id = $this->input->post('section_id');



            $this->data['school_id'] = $school_id;

            $this->data['academic_year_id'] = $academic_year_id;

            $this->data['class_id'] = $class_id;

            $this->data['section_id'] = $section_id;



            $this->data['school'] = $this->report->get_school_by_id($school_id);



            $this->data['class'] = $this->db->get_where('classes', array('id' => $class_id, 'school_id' => $school_id))->row()->name;



            if ($section_id) {

                $this->data['section'] = $this->db->get_where('sections', array('id' => $section_id, 'school_id' => $school_id))->row()->name;

            }



            $this->data['academic_year'] = $this->db->get_where('academic_years', array('id' => $academic_year_id, 'school_id' => $school_id))->row()->session_year;

            $this->data['examresult'] = $this->report->get_student_examresult_report($school_id, $academic_year_id, $class_id, $section_id);

        }



        $condition = array();

        $condition['status'] = 1;

        if ($this->session->userdata('role_id') != SUPER_ADMIN) {



            $condition['school_id'] = $this->session->userdata('school_id');

            $this->data['classes'] = $this->report->get_list('classes', $condition, '', '', '', 'id', 'ASC');

        }



        $this->data['report_url'] = site_url('report/examresult');

        $this->layout->title($this->lang->line('exam_result_report') . ' | ' . SMS);

        $this->layout->view('student/exam_result', $this->data);

    }



  public function planproc() {



        check_permission(VIEW);



        if ($_POST) {



            $month_id = $this->input->post('month');

            $apprstatus = $this->input->post('apprstatus');

//            $academic_year_id = $this->input->post('academic_year_id');

//            $group_by = $this->input->post('group_by');

//            if ($group_by == 'daily') {

//                $date_from = $this->input->post('date_from') ? date('Y-m-d', strtotime($this->input->post('date_from'))) : $this->date_from;

//                $date_to = $this->input->post('date_to') ? date('Y-m-d', strtotime($this->input->post('date_to'))) : $this->date_to;

//            } else {

//

//                $date_from = '';

//                $date_to = '';

//            }



            $monthlist = $this->report->monthlist();

            $this->data['monthlist'] = $monthlist;

            $this->data['month_id'] = $month_id;

            $date_from = $this->input->post('date_from') ? date('Y-m-d', strtotime($this->input->post('date_from'))) : $this->date_from;

            $date_to = $this->input->post('date_to') ? date('Y-m-d', strtotime($this->input->post('date_to'))) : $this->date_to;

//            $this->data['academic_year_id'] = $academic_year_id;

//            $this->data['group_by'] = $group_by;

//            $this->data['date_from'] = $date_from;

//            $this->data['date_to'] = $date_to;

            //    $this->data['school'] = $this->report->get_school_by_id($school_id);



            $this->data['planproc'] = $this->report->get_plan_report($month_id, $date_from, $date_to, $apprstatus);

            $this->data['subplanproc'] = $this->report->get_subplan_report($month_id, $date_from, $date_to, $apprstatus);

            $this->data['depplanproc'] = $this->report->get_deptplan_report($month_id, $date_from, $date_to, $apprstatus);

        }



        $monthlist = $this->report->monthlist();

        $this->data['monthlist'] = $monthlist;





        $this->data['report_url'] = site_url('report/planproc');

        $this->layout->title($this->lang->line('planproc_report') . ' | ' . SMS);

        $this->layout->view('plan/index', $this->data);

    }



    public function progressproc() {



        check_permission(VIEW);



        if ($_POST) {



            $month_id = $this->input->post('month');

            $apprstatus = $this->input->post('apprstatus');

//            $academic_year_id = $this->input->post('academic_year_id');

//            $group_by = $this->input->post('group_by');

//            if ($group_by == 'daily') {

//                $date_from = $this->input->post('date_from') ? date('Y-m-d', strtotime($this->input->post('date_from'))) : $this->date_from;

//                $date_to = $this->input->post('date_to') ? date('Y-m-d', strtotime($this->input->post('date_to'))) : $this->date_to;

//            } else {

//

//                $date_from = '';

//                $date_to = '';

//            }



            $monthlist = $this->report->monthlist();

            $this->data['monthlist'] = $monthlist;

            $this->data['month_id'] = $month_id;

            $date_from = $this->input->post('date_from') ? date('Y-m-d', strtotime($this->input->post('date_from'))) : $this->date_from;

            $date_to = $this->input->post('date_to') ? date('Y-m-d', strtotime($this->input->post('date_to'))) : $this->date_to;

//            $this->data['academic_year_id'] = $academic_year_id;

//            $this->data['group_by'] = $group_by;

//            $this->data['date_from'] = $date_from;

//            $this->data['date_to'] = $date_to;

            //    $this->data['school'] = $this->report->get_school_by_id($school_id);



            $this->data['progressproc'] = $this->report->get_progress_report($month_id, $date_from, $date_to, $apprstatus);

            $this->data['subprogressproc'] = $this->report->get_subprogress_report($month_id, $date_from, $date_to, $apprstatus);

            $this->data['depprogressproc'] = $this->report->get_depprogress_report($month_id, $date_from, $date_to, $apprstatus);

        }



        $monthlist = $this->report->monthlist();

        $this->data['monthlist'] = $monthlist;





        $this->data['report_url'] = site_url('report/progressproc');

        $this->layout->title($this->lang->line('progressproc_report') . ' | ' . SMS);

        $this->layout->view('progress/index', $this->data);

    }



    //Forum





    /*     * ***************Function examresult**********************************

     * @type            : Function

     * @function name   : Annual Report

     * @description     : Load examresult report user interface                 

     *                    with various filtering options

     *                    and process to load balance report   

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    public function pannualreport($school_id = null) {





        check_permission(VIEW);



        $conschoolid = $this->session->userdata('school_id');





        //$this->data['schools'] = $this->report->get_single('schools', array('id' => $conschoolid));

        $this->data['annualreportval'] = $this->report->get_annualreportval($conschoolid);

        $this->data['schools'] = $this->report->get_school_by_id($conschoolid);

        $this->data['stumonk'] = $this->report->get_studentMonk();

        $this->data['lay'] = $this->report->get_studentLay();









        $this->data['list'] = TRUE;

        $this->layout->title($this->lang->line('manage_annualreport') . ' | ' . SMS);

        $this->layout->view('form/index', $this->data);

    }



    /*     * ***************Function add**********************************

     * @type            : Function

     * @function name   : add

     * @description     : Load "Add new Language" user interface                 

     *                    and process to store "Language" column into database 

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    public function pannualreportadd() {



//        check_permission(ADD);

//        

//        if (!is_numeric($id)) {

//            error($this->lang->line('unexpected_error'));

//            redirect('report/pannualreport');

//        }



        $conschoolid = $this->session->userdata('school_id');



        if ($_POST) {

            $this->_prepare_annual_validation();

            if ($this->form_validation->run() === TRUE) {

                $data = $this->_get_annual_data();//method for db

                // $data = $this->_get_annual_data1();



                $insert_id = $this->report->insert('annual_report', $data);//db 

                // $insert_id1 = $this->report->insert('annual_report1', $data);

                if ($insert_id) {



                    create_log('Has been added a Annual Report : ' . $data['title']);



                    success($this->lang->line('insert_success'));

                    redirect('report/pannualreport');

                } else {

                    error($this->lang->line('insert_failed'));

                    redirect('report/pannualreportadd');

                }

            } else {

                error($this->lang->line('insert_failed'));

                $this->data['post'] = $_POST;

            }

        }











        //$this->data['schools'] = $this->report->get_single('schools', array('id' => $conschoolid));

        $this->data['schools'] = $this->report->get_school_by_id($conschoolid);





        $this->data['add'] = TRUE;

        $this->layout->title($this->lang->line('add') . ' | ' . SMS);

        $this->layout->view('form/index', $this->data);

    }



    /*     * ***************Function _prepare_language_validation**********************************

     * @type            : Function

     * @function name   : _prepare_annual_validation

     * @description     : Process "Annual" user input data validation                 

     *                       

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    private function _prepare_annual_validation() {

        $this->load->library('form_validation');

        $this->form_validation->set_error_delimiters('<div class="error-message" style="color: red;">', '</div>');

        $this->form_validation->set_rules('sch_name', $this->lang->line('language_name'), 'trim|required');

        $this->form_validation->set_rules('sch_year', $this->lang->line('year'), 'trim|required');

        $this->form_validation->set_rules('fdate', $this->lang->line('fdate'), 'trim');

    }



    /*     * ***************Function _get_posted_annual_data**********************************

     * @type            : Function

     * @function name   : _get_posted_annual_data

     * @description     : Prepare "Annual" user input data to save into database                  

     *                       

     * @param           : null

     * @return          : $data array(); value 

     * ********************************************************** */



    private function _get_annual_data() {



        $items = array();

        $items[] = 'sch_year';

        $items[] = 'school_id';

        $items[] = 'sch_name';

        $items[] = 'sch_address';

        $items[] = 'sch_province';

        $items[] = 'sch_zone';

        $items[] = 'sch_divition';

        $items[] = 'sch_office';

        $items[] = 'sch_district';

        $items[] = '5i';

        $items[] = '5ii';

        $items[] = '5iii';

        $items[] = '5iv';

        $items[] = '5v';

        $items[] = '5vi';

        $items[] = '6i';

        $items[] = '6ii';

        $items[] = '6iii';

        $items[] = '6iv';

        $items[] = '6v';

        $items[] = '6vi';

        $items[] = '7i';

        //$items[] = '7ivtime';

        

   

//        $items[] = 'qty';

//        $items[] = 'rack_no';



        $data = elements($items, $_POST);

        

        //date('Y-m-d', strtotime($this->input->post('fdate')))

        

        $data['fdate'] = date('Y-m-d', strtotime($this->input->post('fdate')));

        $data['tdate'] = date('Y-m-d', strtotime($this->input->post('tdate')));

        $data['gdate'] = date('Y-m-d', strtotime($this->input->post('gdate')));

        $data['7iidate'] = date('Y-m-d', strtotime($this->input->post('7iidate')));

        $data['7iiidate'] = date('Y-m-d', strtotime($this->input->post('7iiidate')));

		$data['date_submit'] = date('Y-m-d', strtotime($this->input->post('date_submit')));

        $data['date_submiti'] = date('Y-m-d', strtotime($this->input->post('date_submiti')));

        //$data['7iiidate'] = date('Y-m-d', strtotime($this->input->post('7iiidate')));

         // $data['k_personx'] = $_POST['k_personx'];

          







//        if ($this->input->post('id')) {

//            $data['modified_at'] = date('Y-m-d H:i:s');

//            $data['modified_by'] = logged_in_user_id();

//        } else {





        $data['status'] = 1;

        $data['created_at'] = date('Y-m-d H:i:s');

        $data['created_by'] = logged_in_user_id();

//        }

//        if (isset($_FILES['cover']['name'])) {

//            $data['cover'] = $this->_upload_cover();

//        }



        return $data;

    }

  /*  

    private function _get_annual_data1() {



        $items = array();

        $items[] = 'sch_year';

        $items[] = 'school_id';

        $items[] = 'sch_name';

        $items[] = 'sch_address';

        $items[] = 'sch_province';

        $items[] = 'sch_zone';

        $items[] = 'sch_divition';

        $items[] = 'sch_office';

        $items[] = 'sch_district';





        $data = elements($items, $_POST);







        $data['status'] = 1;

        $data['created_at'] = date('Y-m-d H:i:s');

        $data['created_by'] = logged_in_user_id();

      



        return $data;

    }

*/

    public function pirivendetails() {
    $allowed_roles = [1,18,19,26,27,31,33,34,35,36]; // Use your specific role IDs.
    
    if (!in_array($this->session->userdata('role_id'), $allowed_roles)) {
        redirect('dashboard/index'); // Redirect to a safe page.
        return; // Stop execution.
    }
    
    $this->load->model('report/Report_Model', 'report');
    $data['piriven_details'] = $this->report->get_all_piriven_details();
    $this->layout->title($this->lang->line('piriven_details_report') . ' | ' . SMS);
    $this->layout->view('pirivendetails/index', $data);
}

public function studsub() {
    check_permission(VIEW);

    // Get filter inputs
    $province_id = $this->input->post('provincial_id');
    $province_id = ($province_id !== null) ? $province_id : '';
    $district_id = $this->input->post('district_id');
    $district_id = ($district_id !== null) ? $district_id : '';
    $zonal_id = $this->input->post('zonal_id');
    $zonal_id = ($zonal_id !== null) ? $zonal_id : '';
    $edu_id = $this->input->post('edu_id');
    $edu_id = ($edu_id !== null) ? $edu_id : '';

    $this->data['provincial'] = $this->provincial;

    // Pass filters to view
    $this->data['filter_prov_id'] = $province_id;
    $this->data['filter_district_id'] = $district_id;
    $this->data['filter_zonal_id'] = $zonal_id;
    $this->data['filter_edu_id'] = $edu_id;

    // Fetch grade-wise aggregated data
    $grade_sums = $this->report->get_grade_sums($province_id, $district_id, $zonal_id, $edu_id);

    $this->data['grades'] = [
        'R10o' => $grade_sums,
        'R10i' => $grade_sums,
        'R10ii' => $grade_sums,
        'R10iii' => $grade_sums,
        'R10iv' => $grade_sums,
        'R10v' => $grade_sums,
        'R10vi' => $grade_sums,
        'R10vii' => $grade_sums,
        'R10viii' => $grade_sums,
        'R10ix' => $grade_sums,
        'R10x' => $grade_sums,
        'R10xi' => $grade_sums,
        'R10xii' => $grade_sums,
        'R10xiii' => $grade_sums,
        'R10pS' => $grade_sums,
        'R10pM' => $grade_sums,
        'R10pE' => $grade_sums,
        'R10Vtest' => $grade_sums,
        'R10Deg' => $grade_sums,
        'R10Other' => $grade_sums,

       
        // Continue for all prefixes...
    ];

    $this->data['report_url'] = site_url('report/studsub');

    $this->layout->title($this->lang->line('student_sub_report') . ' | ' . SMS);
    $this->layout->view('studsubjectreport/index', $this->data);
}


public function studcal() {
    check_permission(VIEW);

    // Get filter inputs
    $province_id = $this->input->post('provincial_id');
    $province_id = ($province_id !== null) ? $province_id : '';
    $district_id = $this->input->post('district_id');
    $district_id = ($district_id !== null) ? $district_id : '';
    $zonal_id = $this->input->post('zonal_id');
    $zonal_id = ($zonal_id !== null) ? $zonal_id : '';
    $edu_id = $this->input->post('edu_id');
    $edu_id = ($edu_id !== null) ? $edu_id : '';

    $this->data['provincial'] = $this->provincial;

    // Pass filters to view
    $this->data['filter_prov_id'] = $province_id;
    $this->data['filter_district_id'] = $district_id;
    $this->data['filter_zonal_id'] = $zonal_id;
    $this->data['filter_edu_id'] = $edu_id;

    // Fetch filtered data
    $this->data['studcal'] = $this->report->get_stud_cal_report($province_id, $district_id, $zonal_id, $edu_id);

    // Calculate totals in tfooter
    $totals = $this->report->get_totals($province_id, $district_id, $zonal_id, $edu_id);
    $get_total = function ($property) use ($totals) {
        return (isset($totals) && isset($totals->$property)) ? $totals->$property : 0;
    };
    $this->data['totalMonk'] = $get_total('totalMonk');
    $this->data['totalLay'] = $get_total('totalLay');
    $this->data['totalCount'] = $get_total('totalCount');
    $this->data['totalSin'] = $get_total('totalSin');
    $this->data['totalPali'] = $get_total('totalPali');
    $this->data['totalSan'] = $get_total('totalSan');
    $this->data['totalThri'] = $get_total('totalThri');
    $this->data['totalEng'] = $get_total('totalEng');
    $this->data['totalMath'] = $get_total('totalMath');
    $this->data['totalTam'] = $get_total('totalTam');
    $this->data['totalHis'] = $get_total('totalHis');
    $this->data['totalGeo'] = $get_total('totalGeo');
    $this->data['totalSoc'] = $get_total('totalSoc');
    $this->data['totalGen'] = $get_total('totalGen');
    $this->data['totalHeal'] = $get_total('totalHeal');

    $this->data['report_url'] = site_url('report/studcal');

    $this->layout->title($this->lang->line('student_cal_report') . ' | ' . SMS);
    $this->layout->view('studcalreport/index', $this->data);
}


}

