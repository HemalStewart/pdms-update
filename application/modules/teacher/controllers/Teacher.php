<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends MY_Controller {

    public $data = array();

    function __construct() {
        parent::__construct();
        $this->load->model('Teacher_Model', 'teacher', true);
        $this->load->model('Ajax_Model', 'ajax', true);
        $listprovincial = $this->ajax->listprovincial();
        $this->data['listprovincial'] = $listprovincial;
    }

    public function index($school_id = null) {
        check_permission(VIEW);

        // Automatically execute pending transfers on page load
        $this->execute_pending_transfers();


        $province_id = '';
        $district_id = '';
        $zonal_id = '';
        $edu_id = '';
        $schools_id = '';
        if ($_POST) {
            $province_id = $this->input->post('provincial_id');
            $district_id = $this->input->post('district_id');
            $zonal_id = $this->input->post('zonal_id');
            $edu_id = $this->input->post('edu_id');
            $school_id = $this->input->post('schooln_id');
            $schools_id = $this->input->post('schooln_id');
        }

        $this->data['filter_prov_id'] = $province_id;
        $this->data['filter_district_id'] = $district_id;
        $this->data['filter_zonal_id'] = $zonal_id;
        $this->data['filter_edu_id'] = $edu_id;
        $this->data['filtern_school_id'] = $schools_id;
        $this->data['school_list'] = $this->teacher->get_school_list($province_id);
        $this->data['teachers'] = $this->teacher->get_teacher_list($province_id, $district_id, $zonal_id, $edu_id, $school_id, $schools_id);
        $this->data['roles'] = $this->teacher->get_list('roles', array('status' => 1), '', '', '', 'id', 'ASC');

        
        if ($this->session->userdata('role_id') != SUPER_ADMIN) {
            $condition = array();
            $condition['status'] = 1;
            $condition['school_id'] = $this->session->userdata('school_id');
        }

        $this->data['grades'] = $this->teacher->get_list('salary_grades', array('status' => 1), '', '', '', 'id', 'ASC');
        $this->data['teachertype'] = $this->teacher->get_list('teacher_types', array('status' => 1), '', '', '', 'id', 'ASC');
        $listprovincial = $this->teacher->listprovincial();
        $this->data['listprovincial'] = $listprovincial;
        $pirtype = $this->session->userdata('pirtype');
        $listsubjects = $this->teacher->listsubjects($pirtype);
        $this->data['listsubjects'] = $listsubjects;
        $this->data['filter_school_id'] = $school_id;
        $this->data['schools'] = $this->schools;
        $this->data['provincial'] = $this->provincial;
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('manage_teacher') . ' | ' . SMS);
        $this->layout->view('teacher/index', $this->data);
    }

    public function add() {
        check_permission(ADD);

        if ($_POST) {
            $this->_prepare_teacher_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_teacher_data();
                $insert_id = $this->teacher->insert('teachers', $data);
                if ($insert_id) {
                    $this->_save_edu($insert_id);
                    $this->_save_pro($insert_id);
                    $this->_save_work($insert_id);
                    success($this->lang->line('insert_success'));
                    redirect('teacher/index/' . $data['school_id']);
                } else {
                    error($this->lang->line('insert_failed'));
                    redirect('teacher/add');
                }
            } else {
                error($this->lang->line('insert_failed'));
                $this->data['post'] = $_POST;
            }
        }

        $this->data['teachers'] = $this->teacher->get_teacher_list();
        $this->data['roles'] = $this->teacher->get_list('roles', array('status' => 1), '', '', '', 'id', 'ASC');

        if ($this->session->userdata('role_id') != SUPER_ADMIN) {
            $condition = array();
            $condition['status'] = 1;
            $condition['school_id'] = $this->session->userdata('school_id');
        }

        $this->data['grades'] = $this->teacher->get_list('salary_grades', array('status' => 1), '', '', '', 'id', 'ASC');
        $this->data['teachertype'] = $this->teacher->get_list('teacher_types', array('status' => 1), '', '', '', 'id', 'ASC');
        $pirtype = $this->session->userdata('pirtype');
        $listsubjects = $this->teacher->listsubjects($pirtype);
        $this->data['listsubjects'] = $listsubjects;
        $listprovincial = $this->teacher->listprovincial();
        $this->data['listprovincial'] = $listprovincial;
        $this->data['schools'] = $this->schools;
        $this->data['add'] = TRUE;
        $this->layout->title($this->lang->line('add') . ' | ' . SMS);
        $this->layout->view('teacher/index', $this->data);
    }

    // public function edit($id = null) {
    //     check_permission(EDIT);

    //     if ($_POST) {
    //         $this->_prepare_teacher_validation();
    //         if ($this->form_validation->run() === TRUE) {
    //             $data = $this->_get_posted_teacher_data();
    //             $updated = $this->teacher->update('teachers', $data, array('id' => $this->input->post('id')));

    //             if ($updated) {
    //                 $this->_save_edu($this->input->post('id'));
    //                 $this->_save_pro($this->input->post('id'));
    //                 $this->_save_work($this->input->post('id'));
    //                 success($this->lang->line('update_success'));
    //                 redirect('teacher/index/' . $data['school_id']);
    //             } else {
    //                 error($this->lang->line('update_failed'));
    //                 redirect('teacher/edit/' . $this->input->post('id'));
    //             }
    //         } else {
    //             error($this->lang->line('update_failed'));
    //             $this->data['teacher'] = $this->teacher->get_single_teacher($this->input->post('id'));
    //         }
    //     }

    //     if ($id) {
    //         $this->data['teacher'] = $this->teacher->get_single_teacher($id);
    //         if (!$this->data['teacher']) {
    //             redirect('teacher/index');
    //         }
    //     }

    //     $this->data['teachers'] = $this->teacher->get_teacher_list($this->data['teacher']->school_id);
    //     $this->data['roles'] = $this->teacher->get_list('roles', array('status' => 1), '', '', '', 'id', 'ASC');

    //     if ($this->session->userdata('role_id') != SUPER_ADMIN) {
    //         $condition = array();
    //         $condition['status'] = 1;
    //         $condition['school_id'] = $this->session->userdata('school_id');
    //     }

    //     $this->data['grades'] = $this->teacher->get_list('salary_grades', array('status' => 1), '', '', '', 'id', 'ASC');
    //     $this->data['teachertype'] = $this->teacher->get_list('teacher_types', array('status' => 1), '', '', '', 'id', 'ASC');
    //     $listprovincial = $this->teacher->listprovincial();
    //     $this->data['listprovincial'] = $listprovincial;
    //     $this->data['school_id'] = $this->data['teacher']->school_id;
    //     $this->data['filter_school_id'] = $this->data['teacher']->school_id;
    //     $this->data['schools'] = $this->schools;
    //     $pirtype = $this->session->userdata('pirtype');
    //     $listsubjects = $this->teacher->listsubjects($pirtype);
    //     $this->data['listsubjects'] = $listsubjects;
    //     $this->data['teacher_edu'] = $this->teacher->get_edulist($this->data['teacher']->id);
    //     $this->data['teacher_pru'] = $this->teacher->get_list('teacher_pru', array('status' => 1, 'teacher_id' => $id), '', '', '', '', 'id', 'ASC');
    //     $this->data['teacher_work'] = $this->teacher->get_list('teacher_work', array('status' => 1, 'teacher_id' => $id), '', '', '', '', 'id', 'ASC');
    //     $this->data['edit'] = TRUE;
    //     $this->layout->title($this->lang->line('edit') . ' | ' . SMS);
    //     $this->layout->view('teacher/index', $this->data);
    // }

public function edit($id = null) {
    check_permission(EDIT);

    if ($_POST) {
        $this->_prepare_teacher_validation();
        if ($this->form_validation->run() === TRUE) {
            $data = $this->_get_posted_teacher_data();
            $old_teacher = $this->teacher->get_single_teacher($this->input->post('id'));

            // Check if a termination reason was provided
            if (!empty($data['termination_reason'])) {
                // Log the status change to the history table
                $history_data = array(
                    'teacher_id' => $old_teacher->id,
                    'from_school_id' => $old_teacher->school_id,
                    'reason' => $data['termination_reason'],
                    'reason_note' => $data['reason_note'],
                    'created_at' => date('Y-m-d H:i:s'),
                    'transfer_by' => logged_in_user_id()
                );

                // Handle specific scenarios
                if ($data['termination_reason'] === 'Receiving transfer') {
                    $new_school_id = $this->input->post('transfer_school_id');
                    $transfer_effective_date = empty($this->input->post('transfer_effective_date')) ? null : date('Y-m-d', strtotime($this->input->post('transfer_effective_date')));
                    
                    // Step 1: Log the transfer as a pending event in the history table.
                    $history_data['to_school_id'] = $new_school_id;
                    $history_data['start_date'] = $transfer_effective_date;
                    $this->teacher->log_teacher_history($history_data);
                    
                    // Step 2: Update the existing teacher record with the pending transfer details.
                    $updated = $this->teacher->update('teachers', [
                        'school_id' => $old_teacher->school_id, // Keep the original school for now
                        'joining_date' => $old_teacher->joining_date, // Keep original joining date for now
                        'status' => 1, // Teacher remains active at their current school
                        'transfer_effective_date' => $transfer_effective_date,
                        'termination_reason' => 'Receiving transfer',
                        'reason_note' => $data['reason_note'],
                        'modified_at' => date('Y-m-d H:i:s'),
                        'modified_by' => logged_in_user_id(),
                    ], ['id' => $this->input->post('id')]);
                    
                    if ($updated) {
                         success($this->lang->line('update_success'));
                         redirect('teacher/index/' . $old_teacher->school_id);
                    } else {
                         error($this->lang->line('update_failed'));
                         redirect('teacher/edit/' . $this->input->post('id'));
                    }
                    return; // Exit the function to prevent the final update from running

                } elseif ($data['termination_reason'] === 'Foreign leave') {
                    $history_data['start_date'] = empty($data['foreign_leave_start_date']) ? null : date('Y-m-d', strtotime($data['foreign_leave_start_date']));
                    $history_data['end_date'] = empty($data['foreign_leave_end_date']) ? null : date('Y-m-d', strtotime($data['foreign_leave_end_date']));
                    $data['status'] = 1;
                    $this->teacher->log_teacher_history($history_data);

                } else {
                    $data['status'] = 0;
                    $this->teacher->log_teacher_history($history_data);
                }
            }

            $updated = $this->teacher->update('teachers', $data, ['id' => $this->input->post('id')]);

            if ($updated) {
                $this->_save_edu($this->input->post('id'));
                $this->_save_pro($this->input->post('id'));
                $this->_save_work($this->input->post('id'));
                success($this->lang->line('update_success'));
                redirect('teacher/index/' . $data['school_id']);
            } else {
                error($this->lang->line('update_failed'));
                redirect('teacher/edit/' . $this->input->post('id'));
            }
        } else {
            error($this->lang->line('update_failed'));
            $this->data['teacher'] = $this->teacher->get_single_teacher($this->input->post('id'));
        }
    }

    if ($id) {
        $this->data['teacher'] = $this->teacher->get_single_teacher($id);
        if (!$this->data['teacher']) {
            redirect('teacher/index');
        }
    }

    $this->data['teachers'] = $this->teacher->get_teacher_list($this->data['teacher']->school_id);
    $this->data['roles'] = $this->teacher->get_list('roles', array('status' => 1), '', '', '', 'id', 'ASC');

    if ($this->session->userdata('role_id') != SUPER_ADMIN) {
        $condition = array();
        $condition['status'] = 1;
        $condition['school_id'] = $this->session->userdata('school_id');
    }

    $this->data['grades'] = $this->teacher->get_list('salary_grades', array('status' => 1), '', '', '', 'id', 'ASC');
    $this->data['teachertype'] = $this->teacher->get_list('teacher_types', array('status' => 1), '', '', '', 'id', 'ASC');
    $listprovincial = $this->teacher->listprovincial();
    $this->data['listprovincial'] = $listprovincial;
    $this->data['school_id'] = $this->data['teacher']->school_id;
    $this->data['filter_school_id'] = $this->data['teacher']->school_id;
    $this->data['schools'] = $this->schools;
    $pirtype = $this->session->userdata('pirtype');
    $listsubjects = $this->teacher->listsubjects($pirtype);
    $this->data['listsubjects'] = $listsubjects;
    $this->data['teacher_edu'] = $this->teacher->get_edulist($this->data['teacher']->id);
    $this->data['teacher_pru'] = $this->teacher->get_list('teacher_pru', array('status' => 1, 'teacher_id' => $id), '', '', '', '', 'id', 'ASC');
    $this->data['teacher_work'] = $this->teacher->get_list('teacher_work', array('status' => 1, 'teacher_id' => $id), '', '', '', '', 'id', 'ASC');
    $this->data['edit'] = TRUE;
    $this->layout->title($this->lang->line('edit') . ' | ' . SMS);
    $this->layout->view('teacher/index', $this->data);
}

    public function get_single_teacher() {
        $teacher_id = $this->input->post('teacher_id');
        $this->data['teacher'] = $this->teacher->get_single_teacher($teacher_id);
        $this->data['teacher_edu'] = $this->teacher->get_edulist($teacher_id);
        $this->data['teacher_pru'] = $this->teacher->get_prulist($teacher_id);
        $this->data['teacher_work'] = $this->teacher->get_worklist($teacher_id);
        echo $this->load->view('teacher/get-single-teacher', $this->data);
    }

    private function _prepare_teacher_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error-message" style="color: red;">', '</div>');

        if (!$this->input->post('id')) {
            $this->form_validation->set_rules('username', $this->lang->line('username'), 'trim|required|callback_username');
            $this->form_validation->set_rules('password', $this->lang->line('password'), 'trim|required|min_length[5]|max_length[30]');
        }

        $this->form_validation->set_rules('email', $this->lang->line('email'), 'trim|valid_email');
        $this->form_validation->set_rules('role_id', $this->lang->line('role'), 'trim|required');
        $this->form_validation->set_rules('school_id', $this->lang->line('school'), 'trim|required');
        $this->form_validation->set_rules('responsibility', $this->lang->line('responsibility'), 'trim|required');
        $this->form_validation->set_rules('name', $this->lang->line('name'), 'trim|required');
        $this->form_validation->set_rules('phone', $this->lang->line('phone'), 'trim|required');
        $this->form_validation->set_rules('present_address', $this->lang->line('present_address'), 'trim');
        $this->form_validation->set_rules('permanent_address', $this->lang->line('permanent_address'), 'trim');
        $this->form_validation->set_rules('gender', $this->lang->line('gender'), 'trim|required');
        $this->form_validation->set_rules('blood_group', $this->lang->line('blood_group'), 'trim');
        $this->form_validation->set_rules('religion', $this->lang->line('religion'), 'trim');
        $this->form_validation->set_rules('nationality', $this->lang->line('nationality'), 'trim');
        $this->form_validation->set_rules('citizenship', $this->lang->line('citizenship'), 'trim');
        $this->form_validation->set_rules('language', $this->lang->line('language'), 'trim');
        $this->form_validation->set_rules('ordination_date', $this->lang->line('ordination_date'), 'trim');
        $this->form_validation->set_rules('higher_ordination_date', $this->lang->line('higher_ordination_date'), 'trim');
        $this->form_validation->set_rules('ordination_chapter', $this->lang->line('ordination_chapter'), 'trim');
        $this->form_validation->set_rules('passport_number', $this->lang->line('passport_number'), 'trim');
        $this->form_validation->set_rules('teacher_number', $this->lang->line('teacher_number'), 'trim');
        $this->form_validation->set_rules('pension_number', $this->lang->line('pension_number'), 'trim');
        $this->form_validation->set_rules('edcs_number', $this->lang->line('edcs_number'), 'trim');
        $this->form_validation->set_rules('pension_age', $this->lang->line('pension_age'), 'trim');
        $this->form_validation->set_rules('pension_date', $this->lang->line('pention_date'), 'trim');
        $this->form_validation->set_rules('dob', $this->lang->line('birth_date'), 'trim|required');
        $this->form_validation->set_rules('joining_date', $this->lang->line('join_date'), 'trim|required');
        $this->form_validation->set_rules('salary_grade_id', $this->lang->line('salary_grade'), 'trim|required');
        $this->form_validation->set_rules('salary_type', $this->lang->line('salary_type'), 'trim|required');
        $this->form_validation->set_rules('facebook_url', $this->lang->line('facebook_url'), 'trim');
        $this->form_validation->set_rules('linkedin_url', $this->lang->line('linkedin_url'), 'trim');
        $this->form_validation->set_rules('google_plus_url', $this->lang->line('google_plus_url'), 'trim');
        $this->form_validation->set_rules('instagram_url', $this->lang->line('instagram_url'), 'trim');
        $this->form_validation->set_rules('pinterest_url', $this->lang->line('pinterest_url'), 'trim');
        $this->form_validation->set_rules('twitter_url', $this->lang->line('twitter_url'), 'trim');
        $this->form_validation->set_rules('youtube_url', $this->lang->line('youtube_url'), 'trim');
        $this->form_validation->set_rules('other_info', $this->lang->line('other_info'), 'trim');
        $this->form_validation->set_rules('resume', $this->lang->line('resume'), 'trim|callback_resume');
        $this->form_validation->set_rules('photo', $this->lang->line('photo'), 'trim|callback_photo');
    }

    private function _save_edu($teacher_id) {
        $school_id = $this->input->post('school_id');

        foreach ($this->input->post('teach_qutype') as $key => $value) {
            if ($value) {
                $data = array();
                $exist = '';
                $tea_id = @$_POST['teaedu_id'][$key];

                if ($tea_id) {
                    $exist = $this->teacher->get_single('teacher_edu', array('teacher_id' => $teacher_id, 'id' => $tea_id));
                }

                $data['school_id'] = $school_id;
                $data['teach_qutype'] = $value;
                $data['teach_head'] = @$_POST['teach_head'][$key];
                $data['teach_univinstitute'] = @$_POST['teach_univinstitute'][$key];
                $data['teach_year'] = @$_POST['teach_year'][$key];
                $data['teach_class'] = @$_POST['teach_class'][$key];

                if ($this->input->post('teaedu_id') && $exist) {
                    $data['modified_at'] = date('Y-m-d H:i:s');
                    $data['modified_by'] = logged_in_user_id();
                    $this->teacher->update('teacher_edu', $data, array('id' => $exist->id));
                } else {
                    $data['teacher_id'] = $teacher_id;
                    $data['status'] = 1;
                    $data['created_at'] = date('Y-m-d H:i:s');
                    $data['created_by'] = logged_in_user_id();
                    $this->teacher->insert('teacher_edu', $data);
                }
            }
        }
    }

    private function _save_pro($teacher_id) {
        $school_id = $this->input->post('school_id');

        foreach ($this->input->post('teach_prtype') as $key => $value) {
            if ($value) {
                $data = array();
                $exist = '';
                $tea_id = @$_POST['teapru_id'][$key];

                if ($tea_id) {
                    $exist = $this->teacher->get_single('teacher_pru', array('teacher_id' => $teacher_id, 'id' => $tea_id));
                }

                $data['school_id'] = $school_id;
                $data['teach_qutype'] = $value;
                $data['teach_head'] = @$_POST['teach_prhead'][$key];
                $data['teach_univinstitute'] = @$_POST['teach_prunivinstitute'][$key];
                $data['teach_year'] = @$_POST['teach_pryear'][$key];
                $data['teach_class'] = @$_POST['teach_prclass'][$key];

                if ($this->input->post('teapru_id') && $exist) {
                    $data['modified_at'] = date('Y-m-d H:i:s');
                    $data['modified_by'] = logged_in_user_id();
                    $this->teacher->update('teacher_pru', $data, array('id' => $exist->id));
                } else {
                    $data['teacher_id'] = $teacher_id;
                    $data['status'] = 1;
                    $data['created_at'] = date('Y-m-d H:i:s');
                    $data['created_by'] = logged_in_user_id();
                    $this->teacher->insert('teacher_pru', $data);
                }
            }
        }
    }

    private function _save_work($teacher_id) {
        $school_id = $this->input->post('school_id');

        foreach ($this->input->post('working_pirivena') as $key => $value) {
            if ($value) {
                $data = array();
                $exist = '';
                $tea_id = @$_POST['teawork_id'][$key];

                if ($tea_id) {
                    $exist = $this->teacher->get_single('teacher_work', array('teacher_id' => $teacher_id, 'id' => $tea_id));
                }

                $data['school_id'] = $school_id;
                $data['working_pirivena'] = $value;
                $data['working_address'] = @$_POST['working_address'][$key];
                $data['working_from'] = @$_POST['working_from'][$key];
                $data['working_to'] = @$_POST['working_to'][$key];
                $data['working_tranfer'] = @$_POST['working_tranfer'][$key];

                if ($this->input->post('teawork_id') && $exist) {
                    $data['modified_at'] = date('Y-m-d H:i:s');
                    $data['modified_by'] = logged_in_user_id();
                    $this->teacher->update('teacher_work', $data, array('id' => $exist->id));
                } else {
                    $data['teacher_id'] = $teacher_id;
                    $data['status'] = 1;
                    $data['created_at'] = date('Y-m-d H:i:s');
                    $data['created_by'] = logged_in_user_id();
                    $this->teacher->insert('teacher_work', $data);
                }
            }
        }
    }

    public function username() {
        if ($this->input->post('id') == '') {
            $username = $this->teacher->duplicate_check($this->input->post('username'));
            if ($username) {
                $this->form_validation->set_message('username', $this->lang->line('already_exist'));
                return FALSE;
            } else {
                return TRUE;
            }
        } else if ($this->input->post('id') != '') {
            $username = $this->teacher->duplicate_check($this->input->post('username'), $this->input->post('id'));
            if ($username) {
                $this->form_validation->set_message('username', $this->lang->line('already_exist'));
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return TRUE;
        }
    }

    public function resume() {
        if ($_FILES['resume']['name']) {
            $name = $_FILES['resume']['name'];
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            if ($ext == 'pdf' || $ext == 'doc' || $ext == 'docx' || $ext == 'ppt' || $ext == 'pptx' || $ext == 'txt') {
                return TRUE;
            } else {
                $this->form_validation->set_message('resume', $this->lang->line('select_valid_file_format'));
                return FALSE;
            }
        }
    }

    public function photo() {
        if ($_FILES['photo']['name']) {
            $name = $_FILES['photo']['name'];
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif') {
                return TRUE;
            } else {
                $this->form_validation->set_message('photo', $this->lang->line('select_valid_file_format'));
                return FALSE;
            }
        }
    }

        private function _get_posted_teacher_data() {
    $items = array();
    $items[] = 'school_id';
    $items[] = 'name';
    $items[] = 'email';
    $items[] = 'national_id';
    $items[] = 'responsibility';
    $items[] = 'phone';
    $items[] = 'present_address';
    $items[] = 'permanent_address';
    $items[] = 'gender';
    $items[] = 'blood_group';
    $items[] = 'religion';
    $items[] = 'nationality';
    $items[] = 'citizenship';
    $items[] = 'language';
    $items[] = 'ordination_chapter';
    $items[] = 'passport_number';
    $items[] = 'teacher_number';
    $items[] = 'pension_number';
    $items[] = 'edcs_number';
    $items[] = 'pension_age';
    $items[] = 'other_info';
    $items[] = 'salary_grade_id';
    $items[] = 'salary_type';
    $items[] = 'facebook_url';
    $items[] = 'linkedin_url';
    $items[] = 'google_plus_url';
    $items[] = 'instagram_url';
    $items[] = 'pinterest_url';
    $items[] = 'twitter_url';
    $items[] = 'youtube_url';
    
    // Add new fields
    $items[] = 'termination_reason';
    $items[] = 'reason_note';
    $items[] = 'foreign_leave_start_date';
    $items[] = 'foreign_leave_end_date';

    $data = elements($items, $_POST);
    $data['type_id'] = $this->input->post('teacher_type');
    
    // Correctly handle empty date fields to avoid database errors
    $data['ordination_date'] = empty($this->input->post('ordination_date')) ? null : date('Y-m-d', strtotime($this->input->post('ordination_date')));
    $data['dob'] = empty($this->input->post('dob')) ? null : date('Y-m-d', strtotime($this->input->post('dob')));
    $data['joining_date'] = empty($this->input->post('joining_date')) ? null : date('Y-m-d', strtotime($this->input->post('joining_date')));
    $data['pension_date'] = empty($this->input->post('pension_date')) ? null : date('Y-m-d', strtotime($this->input->post('pension_date')));
    $data['higher_ordination_date'] = empty($this->input->post('higher_ordination_date')) ? null : date('Y-m-d', strtotime($this->input->post('higher_ordination_date')));
    
    // Handle the new date fields from the form
    $data['foreign_leave_start_date'] = empty($this->input->post('foreign_leave_start_date')) ? null : date('Y-m-d', strtotime($this->input->post('foreign_leave_start_date')));
    $data['foreign_leave_end_date'] = empty($this->input->post('foreign_leave_end_date')) ? null : date('Y-m-d', strtotime($this->input->post('foreign_leave_end_date')));

    // New field for scheduled transfer date
    $data['transfer_effective_date'] = empty($this->input->post('transfer_effective_date')) ? null : date('Y-m-d', strtotime($this->input->post('transfer_effective_date')));

    if ($this->input->post('id')) {
        $data['modified_at'] = date('Y-m-d H:i:s');
        $data['modified_by'] = logged_in_user_id();
    } else {
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = logged_in_user_id();
        $data['status'] = 1; // Default status is active
        $data['user_id'] = $this->teacher->create_user();
    }

    if ($_FILES['photo']['name']) {
        $data['photo'] = $this->_upload_photo();
    }

    if ($_FILES['resume']['name']) {
        $data['resume'] = $this->_upload_resume();
    }

    return $data;
}

    // private function _get_posted_teacher_data() {
    //     $items = array();
    //     $items[] = 'school_id';
    //     $items[] = 'name';
    //     $items[] = 'email';
    //     $items[] = 'national_id';
    //     $items[] = 'responsibility';
    //     $items[] = 'phone';
    //     $items[] = 'present_address';
    //     $items[] = 'permanent_address';
    //     $items[] = 'gender';
    //     $items[] = 'blood_group';
    //     $items[] = 'religion';
    //     $items[] = 'nationality';
    //     $items[] = 'citizenship';
    //     $items[] = 'language';
    //     $items[] = 'ordination_chapter';
    //     $items[] = 'passport_number';
    //     $items[] = 'teacher_number';
    //     $items[] = 'pension_number';
    //     $items[] = 'edcs_number';
    //     $items[] = 'pension_age';
    //     $items[] = 'other_info';
    //     $items[] = 'salary_grade_id';
    //     $items[] = 'salary_type';
    //     $items[] = 'facebook_url';
    //     $items[] = 'linkedin_url';
    //     $items[] = 'google_plus_url';
    //     $items[] = 'instagram_url';
    //     $items[] = 'pinterest_url';
    //     $items[] = 'twitter_url';
    //     $items[] = 'youtube_url';

    //     $data = elements($items, $_POST);
    //     $data['type_id'] = $this->input->post('teacher_type');
    //     $ordination_date = date('Y-m-d', strtotime($this->input->post('ordination_date')));

    //     if ($ordination_date) {
    //         $ordination_dateval = '';
    //     } else {
    //         $ordination_dateval = date('Y-m-d', strtotime($this->input->post('ordination_date')));
    //     }

    //     $data['ordination_date'] = date('Y-m-d', strtotime($this->input->post('ordination_date')));
    //     $data['dob'] = date('Y-m-d', strtotime($this->input->post('dob')));
    //     $data['joining_date'] = date('Y-m-d', strtotime($this->input->post('joining_date')));
    //     $data['pension_date'] = date('Y-m-d', strtotime($this->input->post('pension_date')));
    //     $higher_ordination_date = date('Y-m-d', strtotime($this->input->post('higher_ordination_date')));

    //     if ($higher_ordination_date) {
    //         $higher_ordination_dateval = '';
    //     } else {
    //         $higher_ordination_dateval = date('Y-m-d', strtotime($this->input->post('higher_ordination_date')));
    //     }

    //     $data['higher_ordination_date'] = date('Y-m-d', strtotime($this->input->post('higher_ordination_date')));

    //     if ($this->input->post('id')) {
    //         $data['modified_at'] = date('Y-m-d H:i:s');
    //         $data['modified_by'] = logged_in_user_id();
    //     } else {
    //         $data['created_at'] = date('Y-m-d H:i:s');
    //         $data['created_by'] = logged_in_user_id();
    //         $data['status'] = 1;
    //         $data['user_id'] = $this->teacher->create_user();
    //     }

    //     if ($_FILES['photo']['name']) {
    //         $data['photo'] = $this->_upload_photo();
    //     }

    //     if ($_FILES['resume']['name']) {
    //         $data['resume'] = $this->_upload_resume();
    //     }

    //     return $data;
    // }

    private function _upload_photo() {
        $prev_photo = $this->input->post('prev_photo');
        $photo = $_FILES['photo']['name'];
        $photo_type = $_FILES['photo']['type'];
        $return_photo = '';

        if ($photo != "") {
            if ($photo_type == 'image/jpeg' || $photo_type == 'image/pjpeg' ||
                $photo_type == 'image/jpg' || $photo_type == 'image/png' ||
                $photo_type == 'image/x-png' || $photo_type == 'image/gif') {
                $destination = 'assets/uploads/teacher-photo/';
                $file_type = explode(".", $photo);
                $extension = strtolower($file_type[count($file_type) - 1]);
                $photo_path = 'photo-' . time() . '-sms.' . $extension;
                move_uploaded_file($_FILES['photo']['tmp_name'], $destination . $photo_path);

                if ($prev_photo != "") {
                    if (file_exists($destination . $prev_photo)) {
                        @unlink($destination . $prev_photo);
                    }
                }

                $return_photo = $photo_path;
            }
        } else {
            $return_photo = $prev_photo;
        }

        return $return_photo;
    }

    private function _upload_resume() {
        $prev_resume = $this->input->post('prev_resume');
        $resume = $_FILES['resume']['name'];
        $resume_type = $_FILES['resume']['type'];
        $return_resume = '';

        if ($resume != "") {
            if ($resume_type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ||
                $resume_type == 'application/msword' || $resume_type == 'text/plain' ||
                $resume_type == 'application/vnd.ms-office' || $resume_type == 'application/pdf') {
                $destination = 'assets/uploads/teacher-resume/';
                $file_type = explode(".", $resume);
                $extension = strtolower($file_type[count($file_type) - 1]);
                $resume_path = 'resume-' . time() . '-sms.' . $extension;
                move_uploaded_file($_FILES['resume']['tmp_name'], $destination . $resume_path);

                if ($prev_resume != "") {
                    if (file_exists($destination . $prev_resume)) {
                        @unlink($destination . $prev_resume);
                    }
                }

                $return_resume = $resume_path;
            }
        } else {
            $return_resume = $prev_resume;
        }

        return $return_resume;
    }

    public function delete($id = null) {
        check_permission(DELETE);

        if (!is_numeric($id)) {
            error($this->lang->line('unexpected_error'));
            redirect('teacher');
        }

        $teacher = $this->teacher->get_single('teachers', array('id' => $id));

        if (!empty($teacher)) {
            $this->teacher->delete('teachers', array('id' => $id));
            $this->teacher->delete('users', array('id' => $teacher->user_id));
            $this->teacher->delete('teacher_attendances', array('teacher_id' => $id));
            $this->teacher->delete('teacher_edu', array('teacher_id' => $id));
            $this->teacher->delete('teacher_pru', array('teacher_id' => $id));
            $this->teacher->delete('teacher_work', array('teacher_id' => $id));

            $destination = 'assets/uploads/';
            if (file_exists($destination . '/teacher-resume/' . $teacher->resume)) {
                @unlink($destination . '/teacher-resume/' . $teacher->resume);
            }
            if (file_exists($destination . '/teacher-photo/' . $teacher->photo)) {
                @unlink($destination . '/teacher-photo/' . $teacher->photo);
            }

            success($this->lang->line('delete_success'));
            redirect('teacher/index/' . $teacher->school_id);
        } else {
            error($this->lang->line('delete_failed'));
        }

        redirect('teacher/index');
    }

    public function update_display_order() {
        $school_id = $this->input->post('school_id');
        $ids = rtrim($this->input->post('ids'), ',');
        $orders = rtrim($this->input->post('orders'), ',');

        if (!$ids || !$school_id) {
            echo FALSE;
            die();
        }

        $id_arr = explode(',', $ids);
        $order_arr = explode(',', $orders);

        if (is_array($id_arr)) {
            foreach ($id_arr as $key => $val) {
                $this->teacher->update('teachers', array('display_order' => $order_arr[$key], 'modified_at' => date('Y-m-d H:i:s')), array('id' => $val));
            }
            echo TRUE;
        }
        echo FALSE;
    }

    public function view($id = null) {
        check_permission(VIEW);

        $this->data['teacher'] = $this->teacher->get_single_teacher($id);
        $this->data['teachers'] = $this->teacher->get_teacher_list($this->data['teacher']->school_id);
        $this->data['roles'] = $this->teacher->get_list('roles', array('status' => 1), '', '', '', 'id', 'ASC');

        if ($this->session->userdata('role_id') != SUPER_ADMIN) {
            $condition = array();
            $condition['status'] = 1;
            $condition['school_id'] = $this->session->userdata('school_id');
            $this->data['grades'] = $this->teacher->get_list('salary_grades', $condition, '', '', '', 'id', 'ASC');
        }

        $this->data['filter_school_id'] = $this->data['teacher']->school_id;
        $this->data['schools'] = $this->schools;
        $this->data['detail'] = TRUE;
        $this->layout->title($this->lang->line('manage_teacher') . ' | ' . SMS);
        $this->layout->view('teacher/index', $this->data);
    }

    public function indexprovince($school_id = null) {
        $provincial_id = $this->session->userdata('provincial_id');
        $district_id = '';
        $zonal_id = '';
        $edu_id = '';

        if ($_POST) {
            $district_id = $this->input->post('district_id');
            $zonal_id = $this->input->post('zonal_id');
            $edu_id = $this->input->post('edu_id');
            $school_id = $this->input->post('school_id');
        }

        $this->data['filter_district_id'] = $district_id;
        $this->data['filter_zonal_id'] = $zonal_id;
        $this->data['filter_edu_id'] = $edu_id;
        $this->data['filter_school_id'] = $school_id;
        $this->data['provincial'] = $this->provincial;
        $this->data['district'] = $this->teacher->getdistrictData($provincial_id);
        $this->data['teachers'] = $this->teacher->get_teacher_provincelist($school_id, $provincial_id);
        $this->data['roles'] = $this->teacher->get_list('roles', array('status' => 1), '', '', '', 'id', 'ASC');

        if ($this->session->userdata('role_id') != SUPER_ADMIN) {
            $condition = array();
            $condition['status'] = 1;
            $condition['school_id'] = $this->session->userdata('school_id');
            $this->data['grades'] = $this->teacher->get_list('salary_grades', $condition, '', '', '', 'id', 'ASC');
        }

        $listprovincial = $this->teacher->listprovincial();
        $this->data['listprovincial'] = $listprovincial;
        $this->data['filter_school_id'] = $school_id;
        $this->data['schools'] = $this->schools;
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('manage_teacher') . ' | ' . SMS);
        $this->layout->view('teacher/province', $this->data);
    }

    public function indexzonal($school_id = null) {
        $provincial_id = $this->session->userdata('provincial_id');
        $zonal_id = $this->session->userdata('zonal_id');
        $this->data['teachers'] = $this->teacher->get_teacher_zonallist($zonal_id);
        $this->data['roles'] = $this->teacher->get_list('roles', array('status' => 1), '', '', '', 'id', 'ASC');

        if ($this->session->userdata('role_id') != SUPER_ADMIN) {
            $condition = array();
            $condition['status'] = 1;
            $condition['school_id'] = $this->session->userdata('school_id');
            $this->data['grades'] = $this->teacher->get_list('salary_grades', $condition, '', '', '', 'id', 'ASC');
        }

        $listprovincial = $this->teacher->listprovincial();
        $this->data['listprovincial'] = $listprovincial;
        $this->data['filter_school_id'] = $school_id;
        $this->data['schools'] = $this->schools;
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('manage_teacher') . ' | ' . SMS);
        $this->layout->view('teacher/zonal', $this->data);
    }

    public function indextype($school_id = null) {
        check_permission(VIEW);
        $this->data['types'] = $this->teacher->get_type($school_id);
        $this->data['filter_school_id'] = $school_id;
        $this->data['schools'] = $this->schools;
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('manage_teacher_type') . ' | ' . SMS);
        $this->layout->view('type/index', $this->data);
    }

    public function addtype() {
        check_permission(ADD);

        if ($_POST) {
            $this->_prepare_type_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_type_data();
                $insert_id = $this->teacher->insert('teacher_types', $data);

                if ($insert_id) {
                    create_log('Has been created a teacher Type : ' . $data['type']);
                    success($this->lang->line('insert_success'));
                    redirect('teacher/indextype/' . $data['school_id']);
                } else {
                    error($this->lang->line('insert_failed'));
                    redirect('teacher/addtype');
                }
            } else {
                error($this->lang->line('insert_failed'));
                $this->data['post'] = $_POST;
            }
        }

        $this->data['schools'] = $this->schools;
        $this->data['add'] = TRUE;
        $this->layout->title($this->lang->line('add') . ' | ' . SMS);
        $this->layout->view('type/index', $this->data);
    }

    public function edittype($id = null) {
        check_permission(EDIT);

        if ($_POST) {
            $this->_prepare_type_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_type_data();
                $updated = $this->teacher->update('teacher_types', $data, array('id' => $this->input->post('id')));

                if ($updated) {
                    create_log('Has been updated a student Type : ' . $data['type']);
                    success($this->lang->line('update_success'));
                    redirect('teacher/indextype/' . $data['school_id']);
                } else {
                    error($this->lang->line('update_failed'));
                    redirect('teacher/edittype/' . $this->input->post('id'));
                }
            } else {
                error($this->lang->line('update_failed'));
                $this->data['type'] = $this->teacher->get_single('teacher_types', array('id' => $this->input->post('id')));
            }
        }

        if ($id) {
            $this->data['type'] = $this->teacher->get_single('teacher_types', array('id' => $id));
            if (!$this->data['type']) {
                redirect('type/index');
            }
        }

        $this->data['school_id'] = $this->data['type']->school_id;
        $this->data['filter_school_id'] = $this->data['type']->school_id;
        $this->data['types'] = $this->teacher->get_type($this->data['school_id']);
        $this->data['schools'] = $this->schools;
        $this->data['edit'] = TRUE;
        $this->layout->title($this->lang->line('edit') . ' | ' . SMS);
        $this->layout->view('type/index', $this->data);
    }

    private function _prepare_type_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error-message" style="color: red;">', '</div>');
        $this->form_validation->set_rules('type', $this->lang->line('teacher_type'), 'trim|required|callback_type');
        $this->form_validation->set_rules('note', $this->lang->line('note'), 'trim');
    }

    private function _get_posted_type_data() {
        $items = array();
        $items[] = 'type';
        $items[] = 'note';
        $data = elements($items, $_POST);

        if ($this->input->post('id')) {
            $data['modified_at'] = date('Y-m-d H:i:s');
            $data['modified_by'] = logged_in_user_id();
        } else {
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['created_by'] = logged_in_user_id();
            $data['status'] = 1;
        }

        return $data;
    }

    public function type() {
        if ($this->input->post('id') == '') {
            $type = $this->teacher->duplicate_typecheck($this->input->post('type'));
            if ($type) {
                $this->form_validation->set_message('type', $this->lang->line('already_exist'));
                return FALSE;
            } else {
                return TRUE;
            }
        } else if ($this->input->post('id') != '') {
            $type = $this->teacher->duplicate_typecheck($this->input->post('type'), $this->input->post('id'));
            if ($type) {
                $this->form_validation->set_message('type', $this->lang->line('already_exist'));
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return TRUE;
        }
    }

    public function deletetype($id = null) {
        check_permission(DELETE);

        if (!is_numeric($id)) {
            error($this->lang->line('unexpected_error'));
            redirect('teacher/indextype');
        }

        $type = $this->teacher->get_single('teacher_types', array('id' => $id));

        if ($this->teacher->delete('teacher_types', array('id' => $id))) {
            create_log('Has been deleted a student Type : ' . $type->type);
            success($this->lang->line('delete_success'));
            redirect('teacher/indextype/' . $type->school_id);
        } else {
            error($this->lang->line('delete_failed'));
        }

        redirect('teacher/indextype');
    }

    public function indexsub($school_id = null) {
        $subject_id = $this->session->userdata('subject_id');
        $this->data['teachers'] = $this->teacher->get_teacher_sublist($subject_id);
        $this->data['roles'] = $this->teacher->get_list('roles', array('status' => 1), '', '', '', 'id', 'ASC');

        if ($this->session->userdata('role_id') != SUPER_ADMIN) {
            $condition = array();
            $condition['status'] = 1;
            $condition['school_id'] = $this->session->userdata('school_id');
            $this->data['grades'] = $this->teacher->get_list('salary_grades', $condition, '', '', '', 'id', 'ASC');
        }

        $listprovincial = $this->teacher->listprovincial();
        $this->data['listprovincial'] = $listprovincial;
        $this->data['filter_school_id'] = $school_id;
        $this->data['schools'] = $this->schools;
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('manage_teacher') . ' | ' . SMS);
        $this->layout->view('teacher/zonal', $this->data);
    }

    public function indextransfer($school_id = null) {
        $subject_id = $this->session->userdata('subject_id');
        $this->data['teachers'] = $this->teacher->get_teacher_sublist($subject_id);
        $this->data['roles'] = $this->teacher->get_list('roles', array('status' => 1), '', '', '', 'id', 'ASC');

        if ($this->session->userdata('role_id') != SUPER_ADMIN) {
            $condition = array();
            $condition['status'] = 1;
            $condition['school_id'] = $this->session->userdata('school_id');
            $this->data['grades'] = $this->teacher->get_list('salary_grades', $condition, '', '', '', 'id', 'ASC');
        }

        $listprovincial = $this->teacher->listprovincial();
        $this->data['listprovincial'] = $listprovincial;
        $this->data['filter_school_id'] = $school_id;
        $this->data['schools'] = $this->schools;
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('manage_teacher') . ' | ' . SMS);
        $this->layout->view('teacher/transfer', $this->data);
    }

    public function addtransfer() {
        check_permission(ADD);

        if ($_POST) {
            $this->_prepare_teacher_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_teacher_data();
                $insert_id = $this->teacher->insert('teachers', $data);

                if ($insert_id) {
                    $this->_save_edu($insert_id);
                    $this->_save_pro($insert_id);
                    $this->_save_work($insert_id);
                    success($this->lang->line('insert_success'));
                    redirect('teacher/index/' . $data['school_id']);
                } else {
                    error($this->lang->line('insert_failed'));
                    redirect('teacher/add');
                }
            } else {
                error($this->lang->line('insert_failed'));
                $this->data['post'] = $_POST;
            }
        }

        $this->data['teachers'] = $this->teacher->get_teacher_list();
        $this->data['roles'] = $this->teacher->get_list('roles', array('status' => 1), '', '', '', 'id', 'ASC');

        if ($this->session->userdata('role_id') != SUPER_ADMIN) {
            $condition = array();
            $condition['status'] = 1;
            $condition['school_id'] = $this->session->userdata('school_id');
            $this->data['grades'] = $this->teacher->get_list('salary_grades', $condition, '', '', '', 'id', 'ASC');
        }

        $listprovincial = $this->teacher->listprovincial();
        $this->data['listprovincial'] = $listprovincial;
        $this->data['schools'] = $this->schools;
        $this->data['add'] = TRUE;
        $this->layout->title($this->lang->line('add') . ' | ' . SMS);
        $this->layout->view('teacher/index', $this->data);
    }

    // New method to fetch school data for transfer search
public function fetch_pirivena_data() {
    $value = $this->input->post('value');
    
    $this->db->select('id, school_name, cencus_number');
    $this->db->from('schools');
    $this->db->group_start();
    $this->db->like('school_name', $value);
    $this->db->or_like('cencus_number', $value);
    $this->db->group_end();
    $this->db->where('status', 1);
    $result = $this->db->get()->row();

    if ($result) {
        echo json_encode($result);
    } else {
        echo json_encode(null);
    }
}


public function report() {
    check_permission(VIEW);

    // Initialize all filter variables to prevent "Undefined variable" errors
    $this->data['terminations_report'] = array();
    $this->data['inactive_teachers_report'] = array();
    $this->data['filter_reason'] = null;
    $this->data['start_date'] = null;
    $this->data['end_date'] = null;
    $this->data['filter_prov_id'] = null;
    $this->data['filter_district_id'] = null;
    $this->data['filter_zonal_id'] = null;
    $this->data['filter_edu_id'] = null;
    $this->data['filtern_school_id'] = null;
    
    // Define the list of termination reasons for the dropdown
    $this->data['termination_reasons'] = [
        'Inactive teachers' => 'Inactive teachers',
        'Receiving transfer' => 'Receiving transfer',
        'Resign voluntarily' => 'Resign voluntarily',
        'Retirement' => 'Retirement',
        'Interdiction' => 'Interdiction',
        'Death' => 'Death',
        'Disrobe' => 'Disrobe',
        'Foreign leave' => 'Foreign leave',
    ];

    if ($_POST) {
        $reason = $this->input->post('termination_reason');
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $school_id = $this->input->post('schooln_id');

        if ($reason === 'Inactive teachers') {
            $this->data['inactive_teachers_report'] = $this->teacher->get_inactive_teachers_report($school_id);
        } elseif (!empty($reason) && !empty($start_date) && !empty($end_date)) {
            $start_date_db = date('Y-m-d', strtotime($start_date));
            $end_date_db = date('Y-m-d', strtotime($end_date));
            
            $this->data['terminations_report'] = $this->teacher->get_terminations_report_by_reason_and_school($reason, $start_date_db, $end_date_db, $school_id);
        }
        
        // Populate the filter variables so the dropdowns show the selected values after submission
        $this->data['filter_reason'] = $reason;
        $this->data['start_date'] = $start_date;
        $this->data['end_date'] = $end_date;
        $this->data['filter_prov_id'] = $this->input->post('provincial_id');
        $this->data['filter_district_id'] = $this->input->post('district_id');
        $this->data['filter_zonal_id'] = $this->input->post('zonal_id');
        $this->data['filter_edu_id'] = $this->input->post('edu_id');
        $this->data['filtern_school_id'] = $this->input->post('schooln_id');
    }
    
    // Pass the school list for the dropdowns
    $this->data['schools'] = $this->schools;
    $this->data['listprovincial'] = $this->teacher->listprovincial();
    $this->data['report'] = TRUE;
    $this->layout->title('Teacher Termination Reports | ' . SMS);
    $this->layout->view('teacher/report', $this->data);
}
public function execute_pending_transfers() {
    // This method is for automated tasks only and should be protected
    // to prevent unauthorized manual access.
    
    $pending_transfers = $this->teacher->get_pending_transfers();

    if (!empty($pending_transfers)) {
        foreach ($pending_transfers as $teacher) {
            // Update the teacher's record with the new school ID and joining date
            $updated_teacher_data = array(
                'school_id' => $teacher->to_school_id,
                'joining_date' => $teacher->start_date,
                'modified_at' => date('Y-m-d H:i:s'),
                'modified_by' => $teacher->transfer_by,
                'termination_reason' => null,
                'reason_note' => null,
                'transfer_effective_date' => null
            );
            $this->teacher->update('teachers', $updated_teacher_data, array('id' => $teacher->teacher_id));

            // Update the user's account to reflect the new school
            $this->teacher->update('users', array('school_id' => $teacher->to_school_id), array('id' => $teacher->user_id));
        }
        
        log_message('info', count($pending_transfers) . ' teacher transfers have been executed.');
        // echo "Pending transfers executed successfully.";
    } else {
        // echo "No pending transfers to execute.";
    }
}

}