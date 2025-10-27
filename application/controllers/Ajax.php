<?php



defined('BASEPATH') OR exit('No direct script access allowed');



/* * ***************Ajax.php**********************************

 * @product name    : Global Multi School Management System Express

 * @type            : Class

 * @class name      : Ajax

 * @description     : This class used to handle ajax call from view file 

 *                    of whole application.  

 * @author          : Codetroopers Team 	

 * @url             : https://themeforest.net/user/codetroopers      

 * @support         : yousuf361@gmail.com	

 * @copyright       : Codetroopers Team	 	

 * ********************************************************** */



class Ajax extends My_Controller {



    function __construct() {



        parent::__construct();

        $this->load->model('Ajax_Model', 'ajax', true);

    }



    /**     * *************Function get_user_by_role**********************************

     * @type            : Function

     * @function name   : get_user_by_role

     * @description     : this function used to manage user role list for user interface   

     * @param           : null 

     * @return          : $str string value with user role list 

     * ********************************************************** */

    /* REPLACE your existing get_user_by_role() function with this */

/* REPLACE your existing get_user_by_role() function with this */

/* REPLACE your existing get_user_by_role() function with this */

public function get_user_by_role() {

    $role_id = $this->input->post('role_id');
    $school_id = $this->input->post('school_id');
    $user_id = $this->input->post('user_id');
    $message = $this->input->post('message');

    // This single, robust query works for all roles
    $this->db->select("U.id AS user_id, 
        CASE 
            WHEN T.id IS NOT NULL THEN T.name 
            WHEN D.id IS NOT NULL THEN D.name 
            WHEN G.id IS NOT NULL THEN G.name 
            WHEN SA.id IS NOT NULL THEN SA.name
            WHEN E.id IS NOT NULL THEN E.name
            ELSE U.username 
        END AS name", false);
    $this->db->from('users AS U');
    $this->db->join('teachers AS T', 'T.user_id = U.id', 'left');
    $this->db->join('department_dir AS D', 'D.user_id = U.id', 'left');
    $this->db->join('guardians AS G', 'G.user_id = U.id', 'left');
    $this->db->join('system_admin AS SA', 'SA.user_id = U.id', 'left');
    $this->db->join('employees AS E', 'E.user_id = U.id', 'left');

    $this->db->where('U.role_id', $role_id);
    $this->db->where('U.status', 1);

    // IMPORTANT: This applies the school filter ONLY if a school_id is provided.
    // For a Super Admin, the school_id is often blank, so this filter is skipped,
    // and they get all users.
    if ($school_id) {
        $this->db->group_start();
            $this->db->where('T.school_id', $school_id);
            $this->db->or_where('D.school_id', $school_id);
            $this->db->or_where('G.school_id', $school_id);
            $this->db->or_where('E.school_id', $school_id);
        $this->db->group_end();
    }

    $this->db->order_by('name', 'ASC');
    $users = $this->db->get()->result();

    
    $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

    $select = 'selected="selected"';
    if (!empty($users)) {
        foreach ($users as $obj) {
            $selected = $user_id == $obj->user_id ? $select : '';
            // Added the user ID in brackets for clarity
            $str .= '<option value="' . $obj->user_id . '" ' . $selected . '>' . $obj->name . ' (' . $obj->user_id . ')</option>';
        }
    }

    echo $str;
}


    /*     * **************Function get_tag_by_role**********************************

     * @type            : Function

     * @function name   : get_tag_by_role

     * @description     : this function used to manage user role tag list for user interface   

     * @param           : null 

     * @return          : $str string value with user role tag list 

     * ********************************************************** */



    public function get_tag_by_role() {



        $role_id = $this->input->post('role_id');

        $tags = get_template_tags($role_id);

        $str = '';

        foreach ($tags as $value) {

            $str .= $value . ' ';

        }



        echo $str;

    }



    /**     * *************Function update_user_status**********************************

     * @type            : Function

     * @function name   : update_user_status

     * @description     : this function used to update user status   

     * @param           : null 

     * @return          : boolean true/false 

     * ********************************************************** */

    public function update_user_status() {



        $user_id = $this->input->post('user_id');

        $status = $this->input->post('status');

        if ($this->ajax->update('users', array('status' => $status), array('id' => $user_id))) {

            echo TRUE;

        } else {

            echo FALSE;

        }

    }



    /**     * *************Function get_student_by_class**********************************

     * @type            : Function

     * @function name   : get_student_by_class

     * @description     : this function used to populate student list by class 

      for user interface

     * @param           : null 

     * @return          : $str string  value with student list

     * ********************************************************** */

    public function get_student_by_class() {



        $school_id = $this->input->post('school_id');

        $class_id = $this->input->post('class_id');

        $student_id = $this->input->post('student_id');

        $is_bulk = $this->input->post('is_bulk');



        $school = $this->ajax->get_school_by_id($school_id);

        $students = $this->ajax->get_student_list($class_id, $school_id, $school->academic_year_id);



        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        if ($is_bulk) {

            $str .= '<option value="all">' . $this->lang->line('all') . '</option>';

        }



        $select = 'selected="selected"';

        if (!empty($students)) {

            foreach ($students as $obj) {

                $selected = $student_id == $obj->id ? $select : '';

                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->name . ' [' . $obj->roll_no . ']</option>';

            }

        }



        echo $str;

    }



    /**     * *************Function get_section_by_class**********************************

     * @type            : Function

     * @function name   : get_section_by_class

     * @description     : this function used to populate section list by class 

      for user interface

     * @param           : null 

     * @return          : $str string  value with section list

     * ********************************************************** */

    public function get_section_by_class() {



        $school_id = $this->input->post('school_id');

        $class_id = $this->input->post('class_id');

        $section_id = $this->input->post('section_id');



        $sections = $this->ajax->get_list('sections', array('status' => 1, 'school_id' => $school_id, 'class_id' => $class_id), '', '', '', 'id', 'ASC');



        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';



        $guardian_section_data = get_guardian_access_data('section');



        $select = 'selected="selected"';

        if (!empty($sections)) {

            foreach ($sections as $obj) {



                if ($this->session->userdata('role_id') == GUARDIAN && !in_array($obj->id, $guardian_section_data)) {

                    continue;

                } elseif ($this->session->userdata('role_id') == TEACHER && $obj->teacher_id != $this->session->userdata('profile_id')) {

                    continue;

                }



                $selected = $section_id == $obj->id ? $select : '';

                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->name . '</option>';

            }

        }



        echo $str;

    }



    public function get_section_by_newclass() {



        $school_id = $this->input->post('school_id');

        $class_id = $this->input->post('class_id');

        $section_id = $this->input->post('section_id');



        $sections = $this->ajax->get_list('subjects', array('status' => 1, 'school_id' => $school_id, 'class_id' => $class_id), '', '', '', 'id', 'ASC');



        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';



        $guardian_section_data = get_guardian_access_data('section');



        $select = 'selected="selected"';

        if (!empty($sections)) {

            foreach ($sections as $obj) {



                if ($this->session->userdata('role_id') == GUARDIAN && !in_array($obj->id, $guardian_section_data)) {

                    continue;

                } elseif ($this->session->userdata('role_id') == TEACHER && $obj->teacher_id != $this->session->userdata('profile_id')) {

                    continue;

                }



                $selected = $section_id == $obj->id ? $select : '';

                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->name . '</option>';

            }

        }



        echo $str;

    }



    /*     * **************Function get_student_by_section**********************************

     * @type            : Function

     * @function name   : get_student_by_section

     * @description     : this function used to populate student list by section 

      for user interface

     * @param           : null 

     * @return          : $str string  value with student list

     * ********************************************************** */



    public function get_student_by_section() {



        $student_id = $this->input->post('student_id');

        $section_id = $this->input->post('section_id');

        $school_id = $this->input->post('school_id');

        $is_all = $this->input->post('is_all');



        $students = $this->ajax->get_student_list_by_section($school_id, $section_id, 'regular');



        if ($is_all) {

            $str = '<option value="0">' . $this->lang->line('all_student') . '</option>';

        } else {

            $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        }



        $select = 'selected="selected"';

        if (!empty($students)) {

            foreach ($students as $obj) {

                $selected = $student_id == $obj->id ? $select : '';

                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->name . ' [' . $obj->roll_no . ']</option>';

            }

        }



        echo $str;

    }



    /**     * *************Function get_subject_by_class**********************************

     * @type            : Function

     * @function name   : get_subject_by_class

     * @description     : this function used to populate subject list by class 

      for user interface

     * @param           : null 

     * @return          : $str string  value with subject list

     * ********************************************************** */

    public function get_subject_by_class() {



        $school_id = $this->input->post('school_id');

        $class_id = $this->input->post('class_id');

        $subject_id = $this->input->post('subject_id');



        if ($this->session->userdata('role_id') == TEACHER) {

            $subjects = $this->ajax->get_list('subjects', array('status' => 1, 'class_id' => $class_id, 'school_id' => $school_id, 'teacher_id' => $this->session->userdata('profile_id')), '', '', '', 'id', 'ASC');

        } else {

            $subjects = $this->ajax->get_list('subjects', array('status' => 1, 'class_id' => $class_id, 'school_id' => $school_id), '', '', '', 'id', 'ASC');

        }



        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';



        $select = 'selected="selected"';

        if (!empty($subjects)) {

            foreach ($subjects as $obj) {

                $selected = $subject_id == $obj->Submainid ? $select : '';

                $str .= '<option value="' . $obj->Submainid . '" ' . $selected . '>' . $obj->name . '</option>';

            }

        }



        echo $str;

    }



    /**     * *************Function get_assignment_by_subject**********************************

     * @type            : Function

     * @function name   : get_assignment_by_subject

     * @description     : this function used to populate assignment list by subject 

      for user interface

     * @param           : null 

     * @return          : $str string  value with assignment list

     * ********************************************************** */

    public function get_assignment_by_subject() {



        $subject_id = $this->input->post('subject_id');

        echo $assignment_id = $this->input->post('assignment_id');



        $assignments = $this->ajax->get_list('assignments', array('status' => 1, 'subject_id' => $subject_id, 'academic_year_id' => $this->academic_year_id), '', '', '', 'id', 'ASC');

        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        $select = 'selected="selected"';

        if (!empty($assignments)) {

            foreach ($assignments as $obj) {

                $selected = $assignment_id == $obj->id ? $select : '';

                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->title . '</option>';

            }

        }



        echo $str;

    }



    /**     * *************Function get_guardian_by_id**********************************

     * @type            : Function

     * @function name   : get_guardian_by_id

     * @description     : this function used to populate guardian information/value by id 

      for user interface

     * @param           : null 

     * @return          : $guardina json  value

     * ********************************************************** */

    public function get_guardian_by_id() {



        header('Content-Type: application/json');

        $guardian_id = $this->input->post('guardian_id');



        $guardian = $this->ajax->get_single('guardians', array('id' => $guardian_id));

        echo json_encode($guardian);

        die();

    }



    /**     * *************Function get_room_by_hostel**********************************

     * @type            : Function

     * @function name   : get_room_by_hostel

     * @description     : this function used to populate room list by hostel  

      for user interface

     * @param           : null 

     * @return          : $str string value with room list 

     * ********************************************************** */

    public function get_room_by_hostel() {



        $hostel_id = $this->input->post('hostel_id');



        $hostels = $this->ajax->get_list('rooms', array('status' => 1, 'hostel_id' => $hostel_id), '', '', '', 'id', 'ASC');

        $str = '<option value="">--.' . $this->lang->line('select_room_no') . '--</option>';

        $select = 'selected="selected"';

        if (!empty($hostels)) {

            foreach ($hostels as $obj) {

                $selected = $subject_id == $obj->id ? $select : '';

                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->room_no . ' [' . $this->lang->line($obj->room_type) . '] [ ' . $obj->cost . ' ]</option>';

            }

        }



        echo $str;

    }



    /*     * ***************Function get_user_list_by_type**********************************

     * @type            : Function

     * @function name   : get_user_list_by_type

     * @description     : Load "Employee or Teacher Listing" by ajax call                

     *                    and populate user listing

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    public function get_user_list_by_type() {



        $school_id = $this->input->post('school_id');

        $payment_to = $this->input->post('payment_to');

        $user_id = $this->input->post('user_id');



        $users = $this->ajax->get_user_list($school_id, $payment_to);



        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        $select = 'selected="selected"';

        if (!empty($users)) {

            foreach ($users as $obj) {

                $selected = $user_id == $obj->user_id ? $select : '';

                $str .= '<option value="' . $obj->user_id . '" ' . $selected . '>' . $obj->name . ' [ ' . $obj->designation . ' ]</option>';

            }

        }



        echo $str;

    }



    /* --------------START ------------------------- */



    /*     * ***************Function get_designation_by_school**********************************

     * @type            : Function

     * @function name   : get_designation_by_school

     * @description     : Load "Designation Listing" by ajax call                

     *                    and populate user listing

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    public function get_designation_by_school() {



        //  $school_id  = $this->input->post('school_id');

        $designation_id = $this->input->post('designation_id');



        $designations = $this->ajax->get_list('designations', array('status' => 1), '', '', '', 'id', 'ASC');



        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        $select = 'selected="selected"';

        if (!empty($designations)) {

            foreach ($designations as $obj) {



                $selected = $designation_id == $obj->id ? $select : '';

                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->name . ' </option>';

            }

        }



        echo $str;

    }



    /*     * ***************Function get_salary_grade_by_school**********************************

     * @type            : Function

     * @function name   : get_salary_grade_by_school

     * @description     : Load "Salary grade Listing" by ajax call                

     *                    and populate user listing

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    public function get_salary_grade_by_school() {



//         $school_id  = $this->input->post('school_id');

        $salary_grade_id = $this->input->post('salary_grade_id');



        $salary_grades = $this->ajax->get_list('salary_grades', array('status' => 1), '', '', '', 'id', 'ASC');



        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        $select = 'selected="selected"';

        if (!empty($salary_grades)) {

            foreach ($salary_grades as $obj) {



                $selected = $salary_grade_id == $obj->id ? $select : '';

                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->grade_name . ' </option>';

            }

        }



        echo $str;

    }



    /*     * ***************Function get_teacher_by_school**********************************

     * @type            : Function

     * @function name   : get_teacher_by_school

     * @description     : Load "Teacher Listing" by ajax call                

     *                    and populate user listing

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    public function get_teacher_by_school() {



        $school_id = $this->input->post('school_id');

        $teacher_id = $this->input->post('teacher_id');

        $is_all = $this->input->post('is_all');



        $teachers = $this->ajax->get_list('teachers', array('status' => 1, 'school_id' => $school_id), '', '', '', 'id', 'ASC');



        if ($is_all) {

            $str = '<option value="0">' . $this->lang->line('all_teacher') . '</option>';

        } else {

            $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        }



        $select = 'selected="selected"';

        if (!empty($teachers)) {

            foreach ($teachers as $obj) {



                $selected = $teacher_id == $obj->id ? $select : '';

                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->name . ' [ ' . $obj->responsibility . ' ]</option>';

            }

        }



        echo $str;

    }



    /*     * ***************Function get_employee_by_school**********************************

     * @type            : Function

     * @function name   : get_employee_by_school

     * @description     : Load "Employee Listing" by ajax call                

     *                    and populate user listing

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    public function get_employee_by_school() {



        $school_id = $this->input->post('school_id');

        $employee_id = $this->input->post('employee_id');

        $is_all = $this->input->post('is_all');



        $employees = $this->ajax->get_list('employees', array('status' => 1, 'school_id' => $school_id), '', '', '', 'id', 'ASC');



        if ($is_all) {

            $str = '<option value="0">' . $this->lang->line('all_employee') . '</option>';

        } else {

            $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        }



        $select = 'selected="selected"';

        if (!empty($employees)) {

            foreach ($employees as $obj) {



                $selected = $employee_id == $obj->id ? $select : '';

                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->name . '</option>';

            }

        }



        echo $str;

    }



    /*     * ***************Function get_guardian_by_school**********************************

     * @type            : Function

     * @function name   : get_guardian_by_school

     * @description     : Load "Guardian Listing" by ajax call                

     *                    and populate user listing

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    public function get_guardian_by_school() {



        $school_id = $this->input->post('school_id');

        $guardian_id = $this->input->post('guardian_id');



        $guardinas = $this->ajax->get_list('guardians', array('status' => 1, 'school_id' => $school_id), '', '', '', 'id', 'ASC');



        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        $select = 'selected="selected"';

        if (!empty($guardinas)) {

            foreach ($guardinas as $obj) {



                $selected = $guardian_id == $obj->id ? $select : '';

                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->name . '</option>';

            }

        }



        echo $str;

    }



    /*     * ***************Function get_discount_by_school**********************************

     * @type            : Function

     * @function name   : get_discount_by_school

     * @description     : Load "Discount Listing" by ajax call                

     *                    and populate user listing

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    public function get_discount_by_school() {



        $school_id = $this->input->post('school_id');

        $discount_id = $this->input->post('discount_id');



        $discounts = $this->ajax->get_list('discounts', array('status' => 1, 'school_id' => $school_id), '', '', '', 'id', 'ASC');



        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        $select = 'selected="selected"';

        if (!empty($discounts)) {

            foreach ($discounts as $obj) {



                $selected = $discount_id == $obj->id ? $select : '';

                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->title . '</option>';

            }

        }



        echo $str;

    }



    /*     * ***************Function get_student_type_by_school**********************************

     * @type            : Function

     * @function name   : get_student_type_by_school

     * @description     : Load "Student type Listing" by ajax call                

     *                    and populate user listing

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    public function get_student_type_by_school() {



        $school_id = $this->input->post('school_id');

        $type_id = $this->input->post('type_id');



        $types = $this->ajax->get_list('student_types', array('status' => 1, 'school_id' => $school_id), '', '', '', 'id', 'ASC');



        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        $select = 'selected="selected"';

        if (!empty($types)) {

            foreach ($types as $obj) {



                $selected = $type_id == $obj->id ? $select : '';

                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->type . '</option>';

            }

        }



        echo $str;

    }



    /*     * ***************Function get_class_by_school**********************************

     * @type            : Function

     * @function name   : get_class_by_school

     * @description     : Load "Class Listing" by ajax call                

     *                    and populate user listing

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    public function get_class_by_school() {



        $school_id = $this->input->post('school_id');

        $class_id = $this->input->post('class_id');



        $classes = $this->ajax->get_list('classes', array('status' => 1, 'school_id' => $school_id), '', '', '', 'id', 'ASC');



        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        $select = 'selected="selected"';

        if (!empty($classes)) {

            foreach ($classes as $obj) {



                $selected = $class_id == $obj->school_classesid ? $select : '';

                $str .= '<option value="' . $obj->school_classesid . '" ' . $selected . '>' . $obj->name . '</option>';

            }

        }



        echo $str;

    }



    public function get_class_by_newschool() {



        $school_id = $this->input->post('school_id');

        $class_id = $this->input->post('class_id');



        $classes = $this->ajax->get_list('classes', array('status' => 1, 'school_id' => $school_id), '', '', '', 'id', 'ASC');



        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        $select = 'selected="selected"';

        if (!empty($classes)) {

            foreach ($classes as $obj) {



                $selected = $class_id == $obj->id ? $select : '';

                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->name . '</option>';

            }

        }



        echo $str;

    }



    /*     * ***************Function get_exam_by_school**********************************

     * @type            : Function

     * @function name   : get_exam_by_school

     * @description     : Load "Exam Listing" by ajax call                

     *                    and populate user listing

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    public function get_exam_by_school() {



        $school_id = $this->input->post('school_id');

        $exam_id = $this->input->post('exam_id');



        $exams = $this->ajax->get_list('exams', array('status' => 1, 'school_id' => $school_id), '', '', '', 'id', 'ASC');



        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        $select = 'selected="selected"';

        if (!empty($exams)) {

            foreach ($exams as $obj) {



                $selected = $exam_id == $obj->id ? $select : '';

                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->title . '</option>';

            }

        }



        echo $str;

    }



    /*     * ***************Function get_certificate_type_by_school**********************************

     * @type            : Function

     * @function name   : get_certificate_type_by_school

     * @description     : Load "Certificate Type Listing" by ajax call                

     *                    and populate user listing

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    public function get_certificate_type_by_school() {



        $school_id = $this->input->post('school_id');

        $certificate_id = $this->input->post('certificate_id');



        $certificates = $this->ajax->get_list('certificates', array('status' => 1, 'school_id' => $school_id), '', '', '', 'id', 'ASC');



        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        $select = 'selected="selected"';

        if (!empty($certificates)) {

            foreach ($certificates as $obj) {



                $selected = $certificate_id == $obj->id ? $select : '';

                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->name . '</option>';

            }

        }



        echo $str;

    }



    /*     * ***************Function get_gallery_by_school**********************************

     * @type            : Function

     * @function name   : get_gallery_by_school

     * @description     : Load "Gallery Listing" by ajax call                

     *                    and populate user listing

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    public function get_gallery_by_school() {



        $school_id = $this->input->post('school_id');

        $gallery_id = $this->input->post('gallery_id');



        $galleries = $this->ajax->get_list('galleries', array('status' => 1, 'school_id' => $school_id), '', '', '', 'id', 'ASC');



        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        $select = 'selected="selected"';

        if (!empty($galleries)) {

            foreach ($galleries as $obj) {



                $selected = $gallery_id == $obj->id ? $select : '';

                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->title . '</option>';

            }

        }



        echo $str;

    }



    /*     * ***************Function get_leave_type_by_school**********************************

     * @type            : Function

     * @function name   : get_leave_type_by_school

     * @description     : Load "Leave type Listing" by ajax call                

     *                    and populate user listing

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    public function get_leave_type_by_school() {



        $school_id = $this->input->post('school_id');

        $role_id = $this->input->post('role_id');

        $type_id = $this->input->post('type_id');

        //, 'school_id'=>$school_id



        $types = $this->ajax->get_list('leave_types', array('status' => 1, 'role_id' => $role_id), '', '', '', 'id', 'ASC');



        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        $select = 'selected="selected"';

        if (!empty($types)) {

            foreach ($types as $obj) {



                $selected = $type_id == $obj->id ? $select : '';

                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->type . '</option>';

            }

        }



        echo $str;

    }



    /*     * ***************Function get_visitor_purpose_by_school**********************************

     * @type            : Function

     * @function name   : get_visitor_purpose_by_school

     * @description     : Load "Visitor purpose Listing" by ajax call                

     *                    and populate user listing

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    public function get_visitor_purpose_by_school() {



        $school_id = $this->input->post('school_id');

        $purpose_id = $this->input->post('purpose_id');



        $purposes = $this->ajax->get_list('visitor_purposes', array('status' => 1, 'school_id' => $school_id), '', '', '', 'id', 'ASC');



        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        $select = 'selected="selected"';

        if (!empty($purposes)) {

            foreach ($purposes as $obj) {



                $selected = $purpose_id == $obj->id ? $select : '';

                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->purpose . '</option>';

            }

        }



        echo $str;

    }



    /*     * ***************Function get_complain_type_by_school**********************************

     * @type            : Function

     * @function name   : get_complain_type_by_school

     * @description     : Load "Complain type Listing" by ajax call                

     *                    and populate user listing

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    public function get_complain_type_by_school() {



        $school_id = $this->input->post('school_id');

        $type_id = $this->input->post('type_id');



        $types = $this->ajax->get_list('complain_types', array('status' => 1, 'school_id' => $school_id), '', '', '', 'id', 'ASC');



        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        $select = 'selected="selected"';

        if (!empty($types)) {

            foreach ($types as $obj) {



                $selected = $type_id == $obj->id ? $select : '';

                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->type . '</option>';

            }

        }



        echo $str;

    }



    /*     * ***************Function get_user_single_payment**********************************

     * @type            : Function

     * @function name   : get_user_single_payment

     * @description     : validate the paymeny to user already paid for selected month               

     *                    

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    public function get_user_single_payment() {



        $payment_to = $this->input->post('payment_to');

        $user_id = $this->input->post('user_id');

        $salary_month = $this->input->post('salary_month');



        $exist = $this->ajax->get_single('salary_payments', array('user_id' => $user_id, 'salary_month' => $salary_month, 'payment_to' => $payment_to));



        if ($exist) {

            echo 1;

        } else {

            echo 2;

        }

    }



    /*     * ***************Function get_school_info_by_id**********************************

     * @type            : Function

     * @function name   : get_school_info_by_id

     * @description     : validate the paymeny to user already paid for selected month               

     *                    

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    public function get_school_info_by_id() {



        $school_id = $this->input->post('school_id');



        $school = $this->ajax->get_single('schools', array('id' => $school_id));

        echo $school->final_result_type;

    }



    /*     * ***************Function get_sms_gateways**********************************

     * @type            : Function

     * @function name   : get_sms_gateways

     * @description     : Load "SMS Settings" by ajax call                

     *                    and populate user listing

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    public function get_sms_gateways() {



        $school_id = $this->input->post('school_id');



        $gateways = get_sms_gateways($school_id);



        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        if (!empty($gateways)) {

            foreach ($gateways as $key => $value) {



                $str .= '<option value="' . $key . '" >' . $value . '</option>';

            }

        }



        echo $str;

    }



    /*     * ***************Function get_academic_year_by_school**********************************

     * @type            : Function

     * @function name   : get_academic_year_by_school

     * @description     : Load "SMS Settings" by ajax call                

     *                    and populate user listing

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    public function get_academic_year_by_school() {



        $school_id = $this->input->post('school_id');

        $academic_year_id = $this->input->post('academic_year_id');



        $academic_years = $this->ajax->get_list('academic_years', array('school_id' => $school_id, 'status' => 1), '', '', '', 'id', 'ASC');



        $str = '<option value="">--' . $this->lang->line('session_year') . '--</option>';

        $select = 'selected="selected"';

        $running = '';

        if (!empty($academic_years)) {

            foreach ($academic_years as $obj) {

                $running = $obj->is_running ? ' [' . $this->lang->line('running_year') . ']' : '';

                $selected = $academic_year_id == $obj->id ? $select : '';

                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->session_year . $running . '</option>';

            }

        }



        echo $str;

    }



    /**     * *************Function get_email_template_by_role**********************************

     * @type            : Function

     * @function name   : get_email_template_by_role

     * @description     : this function used to populate template by role  

      for user interface

     * @param           : null 

     * @return          : $str string value with room list 

     * ********************************************************** */

    public function get_email_template_by_role() {



        $role_id = $this->input->post('role_id');

        $school_id = $this->input->post('school_id');



        $templates = $this->ajax->get_list('email_templates', array('status' => 1, 'role_id' => $role_id, 'school_id' => $school_id), '', '', '', 'id', 'ASC');

        $str = '<option value="">-- ' . $this->lang->line('template') . ' --</option>';

        if (!empty($templates)) {

            foreach ($templates as $obj) {

                $str .= '<option itemid="' . $obj->id . '" value="' . $obj->id . '">' . $obj->title . '</option>';

            }

        }



        echo $str;

    }



    /**     * *************Function get_email_template_by_id**********************************

     * @type            : Function

     * @function name   : get_email_template_by_id

     * @description     : this function used to populate template by role  

      for user interface

     * @param           : null 

     * @return          : $str string value with room list 

     * ********************************************************** */

    public function get_email_template_by_id() {



        $template_id = $this->input->post('template_id');

        $school_id = $this->input->post('school_id');



        $template = $this->ajax->get_single('email_templates', array('status' => 1, 'id' => $template_id, 'school_id' => $school_id), '', '', '', 'id', 'ASC');

        if (!empty($template)) {

            echo $template->template;

        } else {

            echo FALSE;

        }

    }



    /**     * *************Function get_sms_template_by_role**********************************

     * @type            : Function

     * @function name   : get_sms_template_by_role

     * @description     : this function used to populate template by role  

      for user interface

     * @param           : null 

     * @return          : $str string value with room list 

     * ********************************************************** */

    public function get_sms_template_by_role() {



        $role_id = $this->input->post('role_id');

        $school_id = $this->input->post('school_id');



        $templates = $this->ajax->get_list('sms_templates', array('status' => 1, 'role_id' => $role_id, 'school_id' => $school_id), '', '', '', 'id', 'ASC');

        $str = '<option value="">-- ' . $this->lang->line('template') . ' --</option>';

        if (!empty($templates)) {

            foreach ($templates as $obj) {

                $str .= '<option itemid="' . $obj->id . '" value="' . $obj->template . '">' . $obj->title . '</option>';

            }

        }



        echo $str;

    }



    /**     * *************Function get_current_session_by_school**********************************

     * @type            : Function

     * @function name   : get_current_session_by_school

     * @description     : this function used to populate template by role  

      for user interface

     * @param           : null 

     * @return          : $str string value with room list 

     * ********************************************************** */

    public function get_current_session_by_school() {



        $current_session_id = $this->input->post('current_session_id');

        $school_id = $this->input->post('school_id');



        $school = $this->ajax->get_school_by_id($school_id);



        $curr_session = $this->ajax->get_list('academic_years', array('id' => $school->academic_year_id, 'school_id' => $school_id));

        $str = '<option value="">-- ' . $this->lang->line('select') . ' --</option>';

        $select = 'selected="selected"';



        if (!empty($curr_session)) {

            foreach ($curr_session as $obj) {

                $selected = $current_session_id == $obj->id ? $select : '';

                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->session_year . '</option>';

            }

        }



        echo $str;

    }



    /**     * *************Function get_next_session_by_school**********************************

     * @type            : Function

     * @function name   : get_next_session_by_school

     * @description     : this function used to populate template by role  

      for user interface

     * @param           : null 

     * @return          : $str string value with room list 

     * ********************************************************** */

    public function get_next_session_by_school() {



        $academic_year_id = $this->input->post('academic_year_id');

        $school_id = $this->input->post('school_id');

        $school = $this->ajax->get_school_by_id($school_id);



        $next_session = $this->ajax->get_list('academic_years', array('id !=' => $school->academic_year_id, 'school_id' => $school_id));

        $str = '<option value="">-- ' . $this->lang->line('select') . ' --</option>';

        $select = 'selected="selected"';



        if (!empty($next_session)) {

            foreach ($next_session as $obj) {



                $selected = $academic_year_id == $obj->id ? $select : '';

                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->session_year . '</option>';

            }

        }



        echo $str;

    }



    /*     * ***************Function update_status_type**********************************

     * @type            : Function

     * @function name   : update_status_type

     * @description     : update_status_type               

     *                    

     * @param           : null

     * @return          : null 

     * ********************************************************** */



    public function update_student_status_type() {



        $student_id = $this->input->post('student_id');

        $status = $this->input->post('status');



        echo $this->ajax->update('students', array('modified_at' => date('Y-m-d H:i:s'), 'status_type' => $status), array('id' => $student_id));

    }



    public function getfetchprovincial() {

        $class_id = $this->input->post('class_id');

        $data = $this->ajax->fetch_provincial($class_id);

        echo json_encode($data);

    }



    public function get_district_by_province() {



        $provincial_id = $this->input->post('provincial_id');

        $class_id = $this->input->post('district_id');



        $district = $this->ajax->get_list('district', array('provinceid' => $provincial_id), '', '', '', 'id', 'ASC');



        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        $select = 'selected="selected"';

        if (!empty($district)) {

            foreach ($district as $obj) {





                $selected = $class_id == $obj->id ? $select : '';

                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->districtname . '</option>';

            }

        }



        echo $str;

    }



    public function get_zonal_by_district() {



        $district_id = $this->input->post('district_id');

        $zonal_id = $this->input->post('zonal_id');



        $zonal = $this->ajax->get_list('zone', array('districtid' => $district_id), '', '', '', 'zoneid', 'ASC');



        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        $select = 'selected="selected"';

        if (!empty($zonal)) {

            foreach ($zonal as $obj) {



                $selected = $zonal_id == $obj->zoneid ? $select : '';

                $str .= '<option value="' . $obj->zoneid . '" ' . $selected . '>' . $obj->zonename . '</option>';

            }

        }



        echo $str;

    }



    public function get_edu_by_zonal() {





        $zonal_id = $this->input->post('zonal_id');

        $edu_id = $this->input->post('edu_id');



        $zonal = $this->ajax->get_list('zoneblock', array('zoneid' => $zonal_id), '', '', '', 'zoneblockid', 'ASC');



        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        $select = 'selected="selected"';

        if (!empty($zonal)) {

            foreach ($zonal as $obj) {



                $selected = $edu_id == $obj->zoneblockid ? $select : '';

                $str .= '<option value="' . $obj->zoneblockid . '" ' . $selected . '>' . $obj->zoneblock . '</option>';

            }

        }



        echo $str;

    }



    public function get_school_by_edu() {





        $edu_id = $this->input->post('edu_id');

        $school_id = $this->input->post('school_id');



        $school = $this->ajax->get_list('schools', array('educational_id' => $edu_id), '', '', '', 'id', 'ASC');



        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        $select = 'selected="selected"';

        if (!empty($school)) {

            foreach ($school as $obj) {



                $selected = $school_id == $obj->id ? $select : '';

                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->school_name . '&nbsp;-&nbsp;'. $obj->cencus_number .'</option>';

            }

        }



        echo $str;

    }



    public function get_classsec_by_school() {





        $class_id = $this->input->post('class_id');

        $school_id = $this->input->post('school_id');



        $classes = $this->ajax->get_list('classes', array('school_id' => $school_id), '', '', '', 'id', 'ASC');



        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        $select = 'selected="selected"';

        if (!empty($classes)) {

            foreach ($classes as $obj) {



                $selected = $class_id == $obj->school_classesid ? $select : '';

                $str .= '<option value="' . $obj->school_classesid . '" ' . $selected . '>' . $obj->name . '</option>';

            }

        }



        echo $str;

    }



 

             public function get_multiplezonal_by_district() {

        

         $district_id  = $this->input->post('district_id');

         $zonal_id  = $this->input->post('zonal_id');

         $str_area = explode(',', $zonal_id);

         

        $zonal = $this->ajax->get_list('zone', array('districtid'=>$district_id), '','', '', 'zoneid', 'ASC'); 

         

        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        $select = 'selected="selected"';

        

        

         $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        $select = 'selected="selected"';

        if (!empty($zonal)) {

            foreach ($zonal as $obj) {



                $selected = $zonal_id == $obj->zoneid ? $select : '';

                $str .= '<option value="' . $obj->zoneid . '" ' . $selected . '>' . $obj->zonename . '</option>';

            }

        }



        echo $str;

   

    }



    public function get_zonal_by_districtval() {



        $district_id = $this->input->post('district_id');

        $zonal_id = $this->input->post('zonal_id');

        $str_area = explode(',', $zonal_id);



        $zonal = $this->ajax->get_list('zone', array('districtid' => $district_id), '', '', '', 'zoneid', 'ASC');



        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        $select = 'selected="selected"';

        if (!empty($zonal)) {

            foreach ($zonal as $obj) {



                $selected = in_array($str_area) == in_array($obj->zonename) ? $select : '';

                $str .= '<option value="' . $obj->zonename . '" ' . $selected . '>' . $obj->zonename . '</option>';

            }

        }



        echo $str;

    }



    public function get_zonal_by_districtnewval() {



        $district_id = $this->input->post('district_id');

        $zonal_id = $this->input->post('zonal_id');

        $str_area = explode(',', $zonal_id);



        $zonal = $this->ajax->get_list('zone', array('districtid' => $district_id), '', '', '', 'zoneid', 'ASC');



        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        $select = 'selected="selected"';

        if (!empty($zonal)) {

            foreach ($zonal as $obj) {



                $selected = $zonal_id == $obj->zonename ? $select : '';

                $str .= '<option value="' . $obj->zonename . '" ' . $selected . '>' . $obj->zonename . '</option>';

            }

        }



        echo $str;

    }



    public function get_program_type() {





        $program_type = $this->input->post('program_type');

        $program = $this->input->post('program');



        $programdata = $this->ajax->get_list('program_data', array('type_id' => $program_type), '', '', '', 'id', 'ASC');



        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        $select = 'selected="selected"';

        if (!empty($programdata)) {

            foreach ($programdata as $obj) {



                $selected = $program == $obj->id ? $select : '';

                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->program_name . '</option>';

            }

        }



        echo $str;

    }



    public function get_editprogram_type() {





        $program_type = $this->input->post('program_type');

        $program = $this->input->post('program');





        $programdata = $this->ajax->get_list('program_data', array('type_id' => $program_type), '', '', '', 'id', 'ASC');



        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        $select = 'selected="selected"';

        if (!empty($programdata)) {

            foreach ($programdata as $obj) {



                $selected = $program == $obj->id ? $select : '';

                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->program_name . '</option>';

            }

        }



        echo $str;

    }



    //



    public function get_teach_qutype() {





        $teach_qutype = $this->input->post('teach_qutype');

        $teach_head = $this->input->post('teach_head');



        $edu_quali = $this->ajax->get_list('edu_quali', array('quali_type_id' => $teach_qutype), '', '', '', 'id', 'ASC');



        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        $select = 'selected="selected"';

        if (!empty($edu_quali)) {

            foreach ($edu_quali as $obj) {



                $selected = $teach_head == $obj->id ? $select : '';

                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->quali . '</option>';

            }

        }



        echo $str;

    }



    public function get_editteach_qutype() {





        $teach_qutype = $this->input->post('teach_qutype');

        $teach_head = $this->input->post('teach_head');





        $teach_qutypedata = $this->ajax->get_list('edu_quali', array('quali_type_id' => $teach_qutype), '', '', '', 'id', 'ASC');



        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        $select = 'selected="selected"';

        if (!empty($teach_qutypedata)) {

            foreach ($teach_qutypedata as $obj) {



                $selected = $teach_head == $obj->id ? $select : '';

                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->quali . '</option>';

            }

        }



        echo $str;

    }



    public function get_teach_prtype() {





        $teach_qutype = $this->input->post('teach_qutype');

        $teach_head = $this->input->post('teach_head');



        $edu_quali = $this->ajax->get_list('pro_quali', array('quali_type_id' => $teach_qutype), '', '', '', 'id', 'ASC');



        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        $select = 'selected="selected"';

        if (!empty($edu_quali)) {

            foreach ($edu_quali as $obj) {



                $selected = $teach_head == $obj->id ? $select : '';

                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->quali . '</option>';

            }

        }



        echo $str;

    }



    public function get_editteach_prtype() {





        $teach_qutype = $this->input->post('teach_qutype');

        $teach_head = $this->input->post('teach_head');



        $edu_quali = $this->ajax->get_list('pro_quali', array('quali_type_id' => $teach_qutype), '', '', '', 'id', 'ASC');



        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        $select = 'selected="selected"';

        if (!empty($edu_quali)) {

            foreach ($edu_quali as $obj) {



                $selected = $teach_head == $obj->id ? $select : '';

                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->quali . '</option>';

            }

        }



        echo $str;

    }



    public function getfetchzonal() {

        $class_id = $this->input->post('dist_id');

        $data = $this->ajax->fetch_zonal($class_id);

        echo json_encode($data);

    }



    public function getfetchzoneblock() {

        $class_id = $this->input->post('zonal_id');

        $data = $this->ajax->fetch_zoneblock($class_id);

        echo json_encode($data);

    }



    public function getfetchds() {

        $class_id = $this->input->post('dist_id');

        $data = $this->ajax->fetch_ds($class_id);

        echo json_encode($data);

    }



    public function getfetchgn() {

        $class_id = $this->input->post('dist_id');

        $data = $this->ajax->fetch_gn($class_id);

        echo json_encode($data);

    }



    public function getfetchschool() {

        $class_id = $this->input->post('educational_id');

        $data = $this->ajax->fetch_school($class_id);

        echo json_encode($data);

    }



    public function getfetchschoolclass() {

        $class_id = $this->input->post('class_id');

        $data = $this->ajax->fetch_schoolclass($class_id);

        echo json_encode($data);

    }



    public function getfetchsubjectdefine() {

        $pirtype_id = $this->input->post('pirtype_id');

        $data = $this->ajax->fetch_subjectdefine($pirtype_id);

        echo json_encode($data);

    }



    public function getfetchteachertype() {

        $school_id = $this->input->post('school_id');

        $data = $this->ajax->fetch_teachertype($school_id);

        echo json_encode($data);

    }



    public function get_subdep() {



        $department_id = $this->input->post('department_id');

        $subdepartment_id = $this->input->post('subdepartment_id');



        $subdepartment = $this->ajax->get_list('subdepartment', array('department_id' => $department_id), '', '', '', 'id', 'ASC');



        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        $select = 'selected="selected"';

        if (!empty($subdepartment)) {

            foreach ($subdepartment as $obj) {





                $selected = $subdepartment_id == $obj->id ? $select : '';

                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->subdepartment . '</option>';

            }

        }



        echo $str;

    }



    public function getclass_id() {



        $pirtype = $this->input->post('pirtype');

        $class_id = $this->input->post('class_id');



        $schoolclass = $this->ajax->get_list('schoolclass', array('School_Typeid' => $pirtype), '', '', '', 'School_Typeid', 'ASC');



        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        $select = 'selected="selected"';

        if (!empty($schoolclass)) {

            foreach ($schoolclass as $obj) {





                $selected = $class_id == $obj->School_classesid ? $select : '';

                $str .= '<option value="' . $obj->School_classesid . '" ' . $selected . '>' . $obj->School_className . '</option>';

            }

        }



        echo $str;

    }



    public function getsub_id() {



        $class_id = $this->input->post('class_id');

        $sub_id = $this->input->post('sub_id');



        $schoolclass = $this->ajax->get_list('subject_define', array('class_id' => $class_id), '', '', '', 'id', 'ASC');



        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        $select = 'selected="selected"';

        if (!empty($schoolclass)) {

            foreach ($schoolclass as $obj) {





                $selected = $sub_id == $obj->id ? $select : '';

                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->Subject_Name . '</option>';

            }

        }



        echo $str;

    }



    public function get_subject() {

        //$sub_id = $this->input->post('sub_id');

        $data = $this->ajax->fetch_subid();

        echo json_encode($data);

    }



    public function get_class_id() {

        //$sub_id = $this->input->post('sub_id');

        $data = $this->ajax->fetch_classid();

        echo json_encode($data);

    }



    public function get_subjectcode() {

        //$sub_id = $this->input->post('sub_id');

        $data = $this->ajax->fetch_subcode();

        echo json_encode($data);

    }



    public function get_class_by_piriven() {



        $piriven_id = $this->input->post('piriven_id');

        $fclass_id = $this->input->post('fclass_id');



        $schoolclass = $this->ajax->get_list('schoolclass', array('School_Typeid' => $piriven_id), '', '', '', 'School_classesid', 'ASC');



        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        $select = 'selected="selected"';

        if (!empty($schoolclass)) {

            foreach ($schoolclass as $obj) {





                $selected = $fclass_id == $obj->School_classesid ? $select : '';

                $str .= '<option value="' . $obj->School_classesid . '" ' . $selected . '>' . $obj->School_className . '</option>';

            }

        }



        echo $str;

    }



    public function selectsubArea() {

        $result = $this->ajax->selectsubArea();

        echo json_encode($result);

    }



    public function get_schoolclass_by_class() {





        $class_id = $this->input->post('class_id');

        $school_id = $this->input->post('school_id');



        //$classes = $this->ajax->get_list('classes', array('school_id'=>$school_id), '','', '', 'id', 'ASC'); 



        $this->db->select('SC.*');

        $this->db->from('schoolclass AS SC');

        $this->db->join('schools AS S', 'S.pirtype = SC.School_Typeid', 'left');

        //    $this->db->where('SC.School_classesid', $class_id);

        $this->db->where('S.id', $school_id);

        $classes = $this->db->get()->result();



        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        $select = 'selected="selected"';

        if (!empty($classes)) {

            foreach ($classes as $obj) {



                $selected = $class_id == $obj->School_classesid ? $select : '';

                $str .= '<option value="' . $obj->School_classesid . '" ' . $selected . '>' . $obj->School_className . '</option>';

            }

        }



        echo $str;

    }



    public function get_schoolclassdata_by_class() {





        $piriven_id = $this->session->userdata('pirtype');

        //  $piriven_id  = $this->input->post('piriven_id');

        $fclass_id = $this->input->post('class_id');



        $schoolclass = $this->ajax->get_list('schoolclass', array('School_Typeid' => $piriven_id), '', '', '', 'School_classesid', 'ASC');



        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        $select = 'selected="selected"';

        if (!empty($schoolclass)) {

            foreach ($schoolclass as $obj) {





                $selected = $fclass_id == $obj->School_classesid ? $select : '';

                $str .= '<option value="' . $obj->School_classesid . '" ' . $selected . '>' . $obj->School_className . '</option>';

            }

        }



        echo $str;

    }

    

    

    /*-----------------------------------------------------------------------------------------------------------------*/

    

    public function get_program_type1() {





        $program_type = $this->input->post('program_type');

        $program = $this->input->post('program');



        $programdata = $this->ajax->get_list('subject_program_data', array('type_id' => $program_type), '', '', '', 'id', 'ASC');



        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        $select = 'selected="selected"';

        if (!empty($programdata)) {

            foreach ($programdata as $obj) {



                $selected = $program == $obj->id ? $select : '';

                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->program_name . '</option>';

            }

        }



        echo $str;

    }



    public function get_editprogram_type1() {





        $program_type = $this->input->post('program_type');

        $program = $this->input->post('program');





        $programdata = $this->ajax->get_list('subject_program_data', array('type_id' => $program_type), '', '', '', 'id', 'ASC');



        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';

        $select = 'selected="selected"';

        if (!empty($programdata)) {

            foreach ($programdata as $obj) {



                $selected = $program == $obj->id ? $select : '';

                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->program_name . '</option>';

            }

        }



        echo $str;

    }

    /* ADD THIS NEW FUNCTION TO YOUR Ajax.php CONTROLLER */

public function get_forward_recipients() {
    
    $role_id = $this->input->post('role_id');
    $school_id = $this->input->post('school_id');
    
    $users = array();
    if ($role_id && $school_id) {
        // Call the new model function we just created
        $users = $this->ajax->get_school_users_by_role($role_id, $school_id);
    }
    
    $str = '<option value="">-- ' . $this->lang->line('select') . ' --</option>';
    
    if (!empty($users)) {
        foreach ($users as $obj) {
            // Exclude the currently logged-in user from the list
            if ($obj->id == logged_in_user_id()) {
                continue;
            }
            $str .= '<option value="' . $obj->id . '">' . $obj->full_name . '</option>';
        }
    }
    
    echo $str;
}





}

