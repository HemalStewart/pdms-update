<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************Message.php**********************************
 * @product name    : PDMS
 * @type            : Class
 * @class name      : Message
 * @description     : Manage users private messaging system.
 * @author          : Rameca Team
 * @url             : https://www.ramecats.lk
 * @support         : info@ramecats.lk
 * @copyright       : All Rights Reserved. Design & Developed by Rameca Technology Solutions
 * ********************************************************** */

class Postofficedep extends MY_Controller {

    public $data = array();

    function __construct() {
        parent::__construct();
        $this->load->model('Postofficedep_Model', 'message', true);

        $this->load->model('Ajax_Model', 'ajax', true);
        $listprovincial = $this->ajax->listprovincial();
        $this->data['listprovincial'] = $listprovincial;

        $listdepartment = $this->ajax->listdepartment();
        $this->data['listdepartment'] = $listdepartment;


        $this->data['sents'] = $this->message->get_message_list($type = 'sent');
        $this->data['drafts'] = $this->message->get_message_list($type = 'draft');
        $this->data['trashs'] = $this->message->get_message_list($type = 'trash');
        $this->data['inboxs'] = $this->message->get_message_list($type = 'inbox');
        $this->data['new'] = $this->message->get_message_list($type = 'new');

        error_reporting(0);
    }


    /*****************Function inbox**********************************
    * @type            : Function
    * @function name   : inbox
    * @description     : Load "Private Inbox Message List" user interface
    *
    * @param           : null
    * @return          : null
    * ********************************************************** */
    public function inbox() {

        check_permission(VIEW);
        // $listdepartment = $this->ajax->listdepartment();
        // $this->data['listdepartment'] = $listdepartment;
        //
        // $forward = $this->message->get_message_list('inbox',$department_id);

        $this->data['inbox'] = TRUE;
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('inbox') . ' | ' . SMS);
        $this->layout->view('postoffice/postofficedep/inbox', $this->data);
    }


    /*****************Function sent**********************************
    * @type            : Function
    * @function name   : sent
    * @description     : Load "Private Sent Message List" user interface
    *
    * @param           : null
    * @return          : null
    * ********************************************************** */
    public function sent() {

        check_permission(VIEW);

        $this->data['sent'] = TRUE;
        $this->layout->title($this->lang->line('send'). ' | ' . SMS);
        $this->layout->view('postoffice/postofficedep/sent', $this->data);
    }


    /*****************Function draft**********************************
    * @type            : Function
    * @function name   : draft
    * @description     : Load "Private Draft Message List" user interface
    *
    * @param           : null
    * @return          : null
    * ********************************************************** */
    public function draft() {

        check_permission(VIEW);

        $this->data['draft'] = TRUE;
        $this->layout->title($this->lang->line('draft') . ' | ' . SMS);
        $this->layout->view('postoffice/postofficedep/draft', $this->data);
    }


    /*****************Function trash**********************************
    * @type            : Function
    * @function name   : trash
    * @description     : Load "Private Trash Message List" user interface
    *
    * @param           : null
    * @return          : null
    * ********************************************************** */
    public function trash() {

        check_permission(VIEW);

        $this->data['trash'] = TRUE;
        $this->layout->title($this->lang->line('trash') . ' | ' . SMS);
        $this->layout->view('postoffice/postofficedep/trash', $this->data);
    }

    /*****************Function attachment**********************************
    * @type            : Function
    * @function name   : letter_attachment
    * @description     : validate attachment
    *
    * @param           : null
    * @return          : boolean true/false
    * ********************************************************** */

        public function attachment() {
        if ($_FILES['attachment']['name']) {
            $name = $_FILES['attachment']['name'];
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            if ($ext == 'pdf' || $ext == 'doc' || $ext == 'docx' || $ext == 'ppt' || $ext == 'pptx' || $ext == 'txt'|| $ext == 'xls' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif') {
                return TRUE;
            } else {
                $this->form_validation->set_message('attachment', $this->lang->line('select_valid_file_format').' Ex: jpg, jpeg, png, gif, doc, docx, pdf, ppt, pptx, xls, txt');
                return FALSE;
            }
        }
    }


    /*****************Function compose**********************************
    * @type            : Function
    * @function name   : compose
    * @description     : Load "Compose a New Message" user interface
    *                    and process to store "Message" into database
    * @param           : $id integer value
    * @return          : null
    * ********************************************************** */
    public function compose($id = null) {

        check_permission(ADD);

        if ($_POST) {

            $data = array();


            $data['school_id'] = $this->input->post('school_id');
            $data['subject'] = $this->input->post('subject');
            $data['body'] = nl2br($this->input->post('body'));

            $school = $this->message->get_school_by_id($data['school_id']);

            if(!$school->academic_year_id){
                error($this->lang->line('set_academic_year_for_school'));
                redirect('postoffice/postofficedep/inbox');
            }

            $data['academic_year_id'] = $school->academic_year_id;

            /*$data['attachment'] = '';*/

              if (isset($_FILES['attachment']['name'])) {
            $data['attachment'] = $this->_upload_attachment();
        }

            if ($this->input->post('message_id')) {
                $data['modified_at'] = date('Y-m-d H:i:s');
                $data['modified_by'] = logged_in_user_id();
                $this->message->update('postoffice', $data, array('id' => $this->input->post('message_id')));
            } else {
                $data['status'] = 1;
                $data['created_at'] = date('Y-m-d H:i:s');
                $data['created_by'] = logged_in_user_id();
                $insert_id = $this->message->insert('postoffice', $data);
            }

            // default value for relation table
            $relation_data = array();

            $relation_data['school_id'] = $data['school_id'] ;
            $relation_data['sender_id'] = logged_in_user_id();
            $relation_data['receiver_id'] = $this->input->post('receiver_id');
            $relation_data['is_trash'] = 0;
            $relation_data['is_draft'] = 0;
            $relation_data['is_favorite'] = 0;
            $relation_data['is_read'] = 0;
            $relation_data['status'] = 1;

            if ($this->input->post('message_id')) {
                $relation_data['message_id'] = $this->input->post('message_id');
                $relation_data['modified_at'] = date('Y-m-d H:i:s');
                $relation_data['modified_by'] = logged_in_user_id();
            } else {
                $relation_data['message_id'] = $insert_id;
                $relation_data['created_at'] = date('Y-m-d H:i:s');
                $relation_data['created_by'] = logged_in_user_id();
            }


            if (isset($_POST['draft'])) { // if draft
                $relation_data['role_id'] = $this->input->post('role_id'); // opposite
                if ($this->input->post('message_id')) {
                    $condition = array('message_id' => $this->input->post('message_id'), 'owner_id' => logged_in_user_id());
                    $this->message->update('postoffice_relationships', $relation_data, $condition);
                } else {
                    $relation_data['owner_id'] = logged_in_user_id();
                    $relation_data['is_draft'] = 1;
                    $this->message->insert('postoffice_relationships', $relation_data);
                }

                success($this->lang->line('insert_success'));
                redirect('postoffice/postofficedep/draft');
            } else { // if sent
                $relation_data['is_draft'] = 0;

                if ($this->input->post('message_id')) {

                    // save message relationships  for sender
                    $condition = array('message_id' => $this->input->post('message_id'), 'owner_id' => logged_in_user_id());
                    $relation_data['role_id'] = $this->input->post('role_id'); // opposite
                    $this->message->update('postoffice_relationships', $relation_data, $condition);
                } else {
                    // save message relationships  for sender
                    $relation_data['owner_id'] = logged_in_user_id();
                    $relation_data['role_id'] = $this->session->userdata('role_id'); // opposite
                    $this->message->insert('postoffice_relationships', $relation_data);
                }

                // save message relationships  for receiver
                $relation_data['owner_id'] = $this->input->post('receiver_id');
                $relation_data['role_id'] = $this->input->post('role_id'); // opposite
                $this->message->insert('postoffice_relationships', $relation_data);
                success($this->lang->line('insert_success'));
                redirect('postoffice/postofficedep/sent');
            }
        }

        if ($id) {
            $this->data['message'] = $this->message->get_single_message($id);
        }

        $condition = array();
        $condition['status'] = 1;
        if($this->session->userdata('role_id') != SUPER_ADMIN){
            $condition['school_id'] = $this->session->userdata('school_id');
            $this->data['classes'] = $this->message->get_list('classes', $condition, '', '', '', 'id', 'ASC');
        }

        $this->data['roles'] = $this->message->get_list('roles', array('status' => 1), '', '', '', 'id', 'ASC');

        $this->layout->title($this->lang->line('compose') . ' | ' . SMS);
        $this->layout->view('postoffice/postofficedep/compose', $this->data);
    }


    /*****************Function _upload_attachment**********************************
    * @type            : Function
    * @function name   : letter_upload_attachment
    * @description     : Process to to upload attachment in the server
    *                    and return image name
    *
    * @param           : null
    * @return          : $return_image string value
    * ********************************************************** */

     private function _upload_attachment() {

        $prev_attachment = $this->input->post('prev_attachment');
        $attachment = $_FILES['attachment']['name'];
        $return_attachment = '';
        if ($attachment != "") {

                $destination = 'assets/uploads/post-office/';

                $file_type = explode(".", $attachment);
                $extension = strtolower($file_type[count($file_type) - 1]);
                $attachment_path = 'post_office-' . time(). '-letter.' . $extension;

                move_uploaded_file($_FILES['attachment']['tmp_name'], $destination . $attachment_path);
                // need to unlink previous image
                if ($prev_attachment != "") {
                    if (file_exists($destination . $prev_attachment)) {
                        @unlink($destination . $prev_attachment);
                    }
                }

                $return_attachment = $attachment_path;

        } else {
            $return_attachment = $prev_attachment;
        }

        return $return_attachment;
    }


    /*****************Function view**********************************
    * @type            : Function
    * @function name   : view
    * @description     : Load user interface with specific Private Message & Reply data
    *
    * @param           : $id integer value
    * @return          : null
    * ********************************************************** */
    public function view($id = null) {

        check_permission(VIEW);


        if ($id) {
            $this->data['message'] = $this->message->get_single_message($id);
            $this->message->update('postoffice_relationships', array('is_read' => 1), array('message_id' => $id, 'owner_id'=> logged_in_user_id()));

            $this->data['replies'] = $this->message->get_list('postoffice_replies', array('message_id' => $id), '', '', '', 'id', 'ASC');
            $this->data['forwards'] = $this->message->get_list('postoffice_forward', array('message_id' => $id), '', '', '', 'id', 'ASC');
            $this->data['roles'] = $this->message->get_list('roles', array('status' => 1, 'showtype' => 1), '', '', '', 'id', 'ASC');


            if (!$this->data['message']) {
                redirect('postoffice/postofficedep/inbox');
            }
        }

        $this->data['view'] = TRUE;
        $this->layout->title($this->lang->line('read_message') . ' | ' . SMS);
        $this->layout->view('postoffice/postofficedep/view', $this->data);
    }



    /*****************Function reply**********************************
    * @type            : Function
    * @function name   : reply
    * @description     : process to reply a Private message and store into database
    *
    * @param           : $id integer value
    * @return          : null
    * ********************************************************** */
    // public function reply($id = null) {
    //     check_permission(ADD);
    //
    //     if ($_POST) {
    //         $data = array(
    //             'message_id' => $this->input->post('message_id'),
    //             'sender_id' => logged_in_user_id(),
    //             'receiver_id' => $this->input->post('receiver_id'),
    //             'body' => nl2br($this->input->post('body')),
    //             'attachment' => '',
    //             'status' => 1,
    //             'created_at' => date('Y-m-d H:i:s'),
    //             'created_by' => logged_in_user_id()
    //         );
    //
    //         if ($this->message->insert('postoffice_replies', $data)) {
    //             success($this->lang->line('insert_success'));
    //         } else {
    //             error($this->lang->line('insert_failed'));
    //         }
    //
    //         redirect('postoffice/view/' . $id);
    //     }
    //
    //     redirect('postoffice/view/' . $this->input->post('message_id'));
    // }



    /*****************Function delete**********************************
    * @type            : Function
    * @function name   : delete
    * @description     : delete "Private Message" with reply from database
    *
    * @param           : $id integer value
    * @return          : null
    * ********************************************************** */
    public function delete($id = null) {

        check_permission(DELETE);

        $exist = $this->message->get_list('postoffice_relationships', array('status' => 1, 'message_id' => $id, 'owner_id !=' => logged_in_user_id()));

        if (!empty($exist)) {
            $data = array('status' => 0);
            $condition = array('message_id' => $id, 'owner_id' => logged_in_user_id());
            $this->message->update('postoffice_relationships', $data, $condition);
            success($this->lang->line('delete_success'));
        } else {
            $this->message->delete('postoffice_relationships', array('message_id' => $id));
            $this->message->delete('postoffice', array('id' => $id));
            $this->message->delete('postoffice_replies', array('message_id' => $id));
            $this->message->delete('postoffice_forward', array('message_id' => $id));
            success($this->lang->line('delete_success'));
        }

        redirect('postoffice/postofficedep/inbox');
    }


    /*****************Function set_fvourite_status**********************************
    * @type            : Function
    * @function name   : set_fvourite_status
    * @description     : set favorite status of a System Private Message
    *
    * @param           : null
    * @return          : null
    * ********************************************************** */
    public function set_fvourite_status() {
        $star = $this->input->post('star');
        $message_id = $this->input->post('message_id');
        if ($star == FALSE) {
            $data = array('is_favorite' => 0);
        } else {
            $data = array('is_favorite' => 1);
        }
        $condition = array('message_id' => $message_id, 'owner_id' => logged_in_user_id());
        $this->message->update('postoffice_relationships', $data, $condition);
        echo TRUE;
    }



    /*****************Function set_trash_status**********************************
    * @type            : Function
    * @function name   : set_trash_status
    * @description     : set trash status of a System Private Message
    *
    * @param           : null
    * @return          : null
    * ********************************************************** */
    public function set_trash_status() {

        $message_ids = $this->input->post('message_ids');
        $data = array('is_trash' => 1);

        if (!empty($message_ids)) {
            foreach ($message_ids as $value) {
                $condition = array('message_id' => $value, 'owner_id' => logged_in_user_id());
                $this->message->update('postoffice_relationships', $data, $condition);
            }
        }

        echo TRUE;
    }



    /*****************Function set_delete_status**********************************
    * @type            : Function
    * @function name   : set_delete_status
    * @description     : set delete status of a System Private Message
    *
    * @param           : null
    * @return          : null
    * ********************************************************** */
    public function set_delete_status() {

        $message_ids = $this->input->post('message_ids');
        $data = array('status' => 0);

        if (!empty($message_ids)) {
            foreach ($message_ids as $value) {
                // check
                // $exist = $this->message->get_list('message_relationships', array('status' => 1, 'message_id'=>$value, 'owner_id !='=> logged_in_user_id()));
                $condition = array('message_id' => $value, 'owner_id' => logged_in_user_id());
                $this->message->update('postoffice_relationships', $data, $condition);
            }
        }

        echo TRUE;
    }


      /*****************Function reply**********************************
    * @type            : Function
    * @function name   : reply
    * @description     : process to reply a Private message and store into database
    *
    * @param           : $id integer value
    * @return          : null
    * ********************************************************** */
    public function send($id = null) {

        check_permission(ADD);

        if ($_POST) {

            $data = array();

            $data['message_id'] = $this->input->post('message_id');
            $data['sender_id'] = logged_in_user_id();
            $data['receiver_id'] = $this->input->post('receiver_id');
            $data['school'] = $this->input->post('school_name');
            $data['subject'] = $this->input->post('subject');

            $data['body'] = nl2br($this->input->post('body'));
            $data['attachment'] = '';
            $data['status'] = 1;
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['created_by'] = logged_in_user_id();
            if ($this->message->insert('postoffice_replies', $data)) {
                success($this->lang->line('insert_success'));
            }elseif ($this->message->insert('postoffice_forward', $data)) {
                success($$this->lang->line('insert_success'));
            }else {
                success($this->lang->line('insert_failed'));
            }

            redirect('postoffice/postofficedep/view/' . $id);
        }

        redirect('postoffice/postofficedep/view/' . $this->input->post('message_id'));
    }

    public function submission() {

        if ($_FILES['submission']['name']) {
            $name = $_FILES['submission']['name'];
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            if ($ext == 'pdf' || $ext == 'doc' || $ext == 'docx' || $ext == 'ppt' || $ext == 'pptx' || $ext == 'txt'|| $ext == 'xls' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif') {
                return TRUE;
            } else {
                $this->form_validation->set_message('submission', $this->lang->line('select_valid_file_format').' Ex: jpg, jpeg, png, gif, doc, docx, pdf, ppt, pptx, xls, txt');
                return FALSE;
            }
        }
    }
    // REPLY & FORWARD

    public function reply($id = null) {

        check_permission(ADD);

        if (isset($_POST['reply'])) {

            $data = array();

            $data['message_id'] = $this->input->post('message_id');
            $data['sender_id'] = logged_in_user_id();
            $data['receiver_id'] = $this->input->post('receiver_id');
            $data['body'] = nl2br($this->input->post('body'));
            $data['attachment'] = '';
            $data['status'] = 1;
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['created_by'] = logged_in_user_id();
            if ($this->message->insert('postoffice_replies', $data)) {
                success($this->lang->line('insert_success'));
            } else {
                success($this->lang->line('insert_failed'));
            }

            redirect('postoffice/postofficedep/view/' . $id);
        }

        if(isset($_POST['forwards'])){
          $forward_data = array();

          $forward_data['message_id'] = $this->input->post('message_id');
          $forward_data['sender_id'] = logged_in_user_id();
          $forward_data['receiver_id'] = $this->input->post('receiver_id');
          $forward_data['note'] = nl2br($this->input->post('note'));
          $forward_data['department_id'] = $this->input->post('department_id');
          $forward_data['role_id2'] = $this->input->post('role_id2');
          $forward_data['user_id2'] = $this->input->post('user_id2');
          $forward_data['school'] = $this->input->post('school');
          $forward_data['subject'] = $this->input->post('subject');
          $forward_data['s_r_name'] = $this->input->post('s_r_name');
          $forward_data['prev_attachment'] = $this->input->post('prev_attachment');
          $forward_data['date_time'] = $this->input->post('date_time');
          $forward_data['body1'] = nl2br($this->input->post('body1'));


          if ($_FILES['submission']['name']) {
            $forward_data['submission'] = $this->_upload_submission();
          }
          $forward_data['created_at'] = date('Y-m-d H:i:s');
          $forward_data['created_by'] = logged_in_user_id();
          if ($this->message->insert('postoffice_forward', $forward_data)) {
              success($this->lang->line('insert_success'));
          } else {
              success($this->lang->line('insert_failed'));
          }
        }

        redirect('postoffice/postofficedep/view/' . $this->input->post('message_id'));
    }

    private function _upload_submission() {

        $prev_submission = $this->input->post('prev_submission');
        $submission = $_FILES['submission']['name'];
        $submission_type = $_FILES['submission']['type'];
        $return_submission = '';

        if ($submission != "") {
            if ($submission_type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ||
                    $submission_type == 'application/msword' || $submission_type == 'text/plain' ||
                    $submission_type == 'application/vnd.ms-office' || $submission_type == 'application/pdf' ||
                    $submission_type == 'image/jpeg' || $submission_type == 'image/pjpeg' ||
                    $submission_type == 'image/jpg' || $submission_type == 'image/png' ||
                    $submission_type == 'image/x-png' || $submission_type == 'image/gif' ||
                    $submission_type == 'application/powerpoint' ||
                    $submission_type == 'application/vnd.ms-powerpoint' ||
                    $submission_type == 'application/vnd.openxmlformats-officedocument.presentationml.presentation'
                    ) {

                $destination = 'assets/uploads/post-office/';

                $submission_type = explode(".", $submission);
                $extension = strtolower($submission_type[count($submission_type) - 1]);
                $submission_path = 'forward-' . time() . '-letter.' . $extension;

                move_uploaded_file($_FILES['submission']['tmp_name'], $destination . $submission_path);

                // need to unlink previous submission
                if ($prev_submission != "") {
                    if (file_exists($destination . $prev_submission)) {
                        @unlink($destination . $prev_submission);
                    }
                }

                $return_submission = $submission_path;
            }

        } else {

            $return_submission = $prev_submission;
        }

        return $return_submission;

    }




  }
