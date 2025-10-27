<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************News.php**********************************
 * @product name    : PDMS
 * @type            : Class
 * @class name      : News
 * @description     : Manage school academic news.  
 * @author          : Rameca Team 	
 * @url             : https://www.ramecats.lk     
 * @support         : info@ramecats.lk	
 * @copyright       : All Rights Reserved. Design & Developed by Rameca Technology Solutions	
 * *********************** *********************************** */

class News extends MY_Controller {

    public $data = array();
    
    
    function __construct() {
        parent::__construct();
         $this->load->model('News_Model', 'news', true);  
         
         $this->load->model('Ajax_Model', 'ajax', true);
        $listprovincial = $this->ajax->listprovincial();
        $this->data['listprovincial'] = $listprovincial;
    }

    
    
    /*****************Function index**********************************
    * @type            : Function
    * @function name   : index
    * @description     : Load "News List" user interface                 
    *                        
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function index($school_id = null) {
        
        check_permission(VIEW);
        
          $province_id = '';
        $district_id = '';
        $zonal_id = '';
        $edu_id = '';
        
         if ($_POST) {

            $province_id = $this->input->post('provincial_id');
            $district_id = $this->input->post('district_id');
            $zonal_id = $this->input->post('zonal_id');
            $edu_id = $this->input->post('edu_id');
            $school_id = $this->input->post('school_id');
        }
        
         //  $this->data['class_id'] = $class_id;
        $this->data['filter_district_id'] = $district_id;
        $this->data['filter_prov_id'] = $province_id;
        $this->data['filter_zonal_id'] = $zonal_id;
        $this->data['filter_edu_id'] = $edu_id;
        $this->data['filter_school_id'] = $school_id;
        
         $this->data['provincial'] = $this->provincial;

        $this->data['news_list'] = $this->news->get_news_list($school_id); 
//        $this->data['filter_school_id'] = $school_id;
        $this->data['schools'] = $this->schools;
        
        $this->data['list'] = TRUE;
        $this->layout->title( $this->lang->line('manage_news'). ' | ' . SMS);
        $this->layout->view('student/news/index', $this->data);            
       
    }

    
    /*****************Function add**********************************
    * @type            : Function
    * @function name   : add
    * @description     : Load "Add new News" user interface                 
    *                    and store "News" into database 
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function add() {

        check_permission(ADD);
         
        if ($_POST) {
            $this->_prepare_news_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_news_data();

                $insert_id = $this->news->insert('student_cal', $data);
                if ($insert_id) {
                    
                    create_log('Has been created a news : '.$data['title']);
                    success($this->lang->line('insert_success'));
                    redirect('student/news/index/'.$data['school_id']);
                    
                } else {
                    error($this->lang->line('insert_failed'));
                    redirect('student/news/add');
                }
            } else {
                error($this->lang->line('insert_failed'));
                $this->data['post'] = $_POST;
            }
        }
        
        $this->data['news_list'] = $this->news->get_news_list(); 
        $this->data['schools'] = $this->schools;
        // $data['census_number'] = $this->db->get_where('schools', ['id' => $school_id])->row('census_number');
         
        $this->data['add'] = TRUE;
        $this->layout->title($this->lang->line('add'). ' | ' . SMS);
        $this->layout->view('news/index', $this->data);
    }

    
    /*****************Function edit**********************************
    * @type            : Function
    * @function name   : edit
    * @description     : Load Update "News" user interface                 
    *                    with populated "News" value 
    *                    and update "News" database    
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function edit($id = null) {       
       
         check_permission(EDIT);
        
         if(!is_numeric($id)){
            error($this->lang->line('unexpected_error'));
            redirect('student/news/index');    
        }
        
        if ($_POST) {
            $this->_prepare_news_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_news_data();
                $updated = $this->news->update('student_cal', $data, array('id' => $this->input->post('id')));

                if ($updated) {
                    
                     create_log('Has been updated a news : '.$data['title']);
                    
                    success($this->lang->line('update_success'));
                    redirect('student/news/index/'.$data['school_id']);                   
                } else {
                    error($this->lang->line('update_failed'));
                    redirect('student/news/edit/' . $this->input->post('id'));
                }
            } else {
                error($this->lang->line('update_failed'));
                $this->data['news'] = $this->news->get_single('student_cal', array('id' => $this->input->post('id')));
            }
        }
        
        if ($id) {
            $this->data['news'] = $this->news->get_single('student_cal', array('id' => $id));

            if (!$this->data['news']) {
                 redirect('student/news/index');
            }
        }

        $this->data['news_list'] = $this->news->get_news_list($this->data['news']->school_id);  
        $this->data['school_id'] = $this->data['news']->school_id;
        $this->data['filter_school_id'] = $this->data['news']->school_id;
        $this->data['schools'] = $this->schools;
        
        $this->data['edit'] = TRUE;       
        $this->layout->title($this->lang->line('edit') . ' | ' . SMS);
        $this->layout->view('news/index', $this->data);
    }
    
    
    /*****************Function view**********************************
    * @type            : Function
    * @function name   : view
    * @description     : Load user interface with specific news data                 
    *                       
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function view($id = null){
        
         check_permission(VIEW);
         if(!is_numeric($id)){
            error($this->lang->line('unexpected_error'));
            redirect('student/news/index');    
        }
        
        $this->data['news_list'] = $this->news->get_news_list(); 
        
        $this->data['news'] = $this->news->get_single('student_cal', array('id' => $id));
        $this->data['detail'] = TRUE;       
        $this->layout->title($this->lang->line('view'). ' ' . $this->lang->line('news'). ' | ' . SMS);
        $this->layout->view('news/index', $this->data);
    }

                   
     /*****************Function get_single_news**********************************
     * @type            : Function
     * @function name   : get_single_news
     * @description     : "Load single news information" from database                  
     *                    to the user interface   
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    public function get_single_news(){
        
       $news_id = $this->input->post('news_id');
       
       $this->data['news'] = $this->news->get_single_news($news_id);
       echo $this->load->view('news/get-single-stucal', $this->data);
    }
    
    /*****************Function _prepare_news_validation**********************************
    * @type            : Function
    * @function name   : _prepare_news_validation
    * @description     : Process "News" user input data validation                 
    *                       
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    private function _prepare_news_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error-message" style="color: red;">', '</div>');
        
        $this->form_validation->set_rules('school_id', $this->lang->line('school_name'), 'trim|required');   
        // $this->form_validation->set_rules('title', $this->lang->line('title'), 'trim|required|callback_title');   

    }

   
   
    /*****************Function image**********************************
    * @type            : Function
    * @function name   : image
    * @description     : Check image format validation                  
    *                       
    * @param           : null
    * @return          : boolean true/false 
    * ********************************************************** */ 
   public function image()
   {   
        if($_FILES['image']['name']){
            $name = $_FILES['image']['name'];
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif'){
                return TRUE;
            } else {
                $this->form_validation->set_message('image', $this->lang->line('select_valid_file_format'));         
                return FALSE; 
            }
        }       
   }
   
   
    /*****************Function _get_posted_news_data**********************************
    * @type            : Function
    * @function name   : _get_posted_news_data
    * @description     : Prepare "News" user input data to save into database                  
    *                       
    * @param           : null
    * @return          : $data array(); value 
    * ********************************************************** */
    private function _get_posted_news_data() {

        $items = array();
        $items[] = 'school_id';
         //0_grade
        $items[] = 'R10omonk';
        $items[] = 'R10olay';
        $items[] = 'R10ototal';
        $items[] = 'R10osin';
        $items[] = 'R10opali';
        $items[] = 'R10osan';
        $items[] = 'R10othri';
        $items[] = 'R10oeng';
        $items[] = 'R10omath';
        $items[] = 'R10otam';
        $items[] = 'R10ohis';
        $items[] = 'R10ogeo';
        $items[] = 'R10osoc';
        $items[] = 'R10ogen';
        $items[] = 'R10oheal';
      // 1_grade
        $items[] = 'R10imonk';
        $items[] = 'R10ilay';
        $items[] = 'R10itotal';
        $items[] = 'R10isin';
        $items[] = 'R10ipali';
        $items[] = 'R10isan';
        $items[] = 'R10ithri';
        $items[] = 'R10ieng';
        $items[] = 'R10imath';
        $items[] = 'R10itam';
        $items[] = 'R10ihis';
        $items[] = 'R10igeo';
        $items[] = 'R10isoc';
        $items[] = 'R10igen';
        $items[] = 'R10iheal';
        // 2_grade
        $items[] = 'R10iimonk';
        $items[] = 'R10iilay';
        $items[] = 'R10iitotal';
        $items[] = 'R10iisin';
        $items[] = 'R10iipali';
        $items[] = 'R10iisan';
        $items[] = 'R10iithri';
        $items[] = 'R10iieng';
        $items[] = 'R10iimath';
        $items[] = 'R10iitam';
        $items[] = 'R10iihis';
        $items[] = 'R10iigeo';
        $items[] = 'R10iisoc';
        $items[] = 'R10iigen';
        $items[] = 'R10iiheal';
        // 3_grade
        $items[] = 'R10iiimonk';
        $items[] = 'R10iiilay';
        $items[] = 'R10iiitotal';
        $items[] = 'R10iiisin';
        $items[] = 'R10iiipali';
        $items[] = 'R10iiisan';
        $items[] = 'R10iiithri';
        $items[] = 'R10iiieng';
        $items[] = 'R10iiimath';
        $items[] = 'R10iiitam';
        $items[] = 'R10iiihis';
        $items[] = 'R10iiigeo';
        $items[] = 'R10iiisoc';
        $items[] = 'R10iiigen';
        $items[] = 'R10iiiheal';
      // 4_grade
        $items[] = 'R10ivmonk';
        $items[] = 'R10ivlay';
        $items[] = 'R10ivtotal';
        $items[] = 'R10ivsin';
        $items[] = 'R10ivpali';
        $items[] = 'R10ivsan';
        $items[] = 'R10ivthri';
        $items[] = 'R10iveng';
        $items[] = 'R10ivmath';
        $items[] = 'R10ivtam';
        $items[] = 'R10ivhis';
        $items[] = 'R10ivgeo';
        $items[] = 'R10ivsoc';
        $items[] = 'R10ivgen';
        $items[] = 'R10ivheal';
       // 5_grade
        $items[] = 'R10vmonk';
        $items[] = 'R10vlay';
        $items[] = 'R10vtotal';
        $items[] = 'R10vsin';
        $items[] = 'R10vpali';
        $items[] = 'R10vsan';
        $items[] = 'R10vthri';
        $items[] = 'R10veng';
        $items[] = 'R10vmath';
        $items[] = 'R10vtam';
        $items[] = 'R10vhis';
        $items[] = 'R10vgeo';
        $items[] = 'R10vsoc';
        $items[] = 'R10vgen';
        $items[] = 'R10vheal';
         //6_grade
        $items[] = 'R10vimonk';
        $items[] = 'R10vilay';
        $items[] = 'R10vitotal';
        $items[] = 'R10visin';
        $items[] = 'R10vipali';
        $items[] = 'R10visan';
        $items[] = 'R10vithri';
        $items[] = 'R10vieng';
        $items[] = 'R10vimath';
        $items[] = 'R10vitam';
        $items[] = 'R10vihis';
        $items[] = 'R10vigeo';
        $items[] = 'R10visoc';
        $items[] = 'R10vigen';
        $items[] = 'R10viheal';
        //7_grade
        $items[] = 'R10viimonk';
        $items[] = 'R10viilay';
        $items[] = 'R10viitotal';
        $items[] = 'R10viisin';
        $items[] = 'R10viipali';
        $items[] = 'R10viisan';
        $items[] = 'R10viithri';
        $items[] = 'R10viieng';
        $items[] = 'R10viimath';
        $items[] = 'R10viitam';
        $items[] = 'R10viihis';
        $items[] = 'R10viigeo';
        $items[] = 'R10viisoc';
        $items[] = 'R10viigen';
        $items[] = 'R10viiheal';
        //8_grade
        $items[] = 'R10viiimonk';
        $items[] = 'R10viiilay';
        $items[] = 'R10viiitotal';
        $items[] = 'R10viiisin';
        $items[] = 'R10viiipali';
        $items[] = 'R10viiisan';
        $items[] = 'R10viiithri';
        $items[] = 'R10viiieng';
        $items[] = 'R10viiimath';
        $items[] = 'R10viiitam';
        $items[] = 'R10viiihis';
        $items[] = 'R10viiigeo';
        $items[] = 'R10viiisoc';
        $items[] = 'R10viiigen';
        $items[] = 'R10viiiheal';
        //9_grade
        $items[] = 'R10ixmonk';
        $items[] = 'R10ixlay';
        $items[] = 'R10ixtotal';
        $items[] = 'R10ixsin';
        $items[] = 'R10ixpali';
        $items[] = 'R10ixsan';
        $items[] = 'R10ixthri';
        $items[] = 'R10ixeng';
        $items[] = 'R10ixmath';
        $items[] = 'R10ixtam';
        $items[] = 'R10ixhis';
        $items[] = 'R10ixgeo';
        $items[] = 'R10ixsoc';
        $items[] = 'R10ixgen';
        $items[] = 'R10ixheal';
        //R10_grade
        $items[] = 'R10xmonk';
        $items[] = 'R10xlay';
        $items[] = 'R10xtotal';
        $items[] = 'R10xsin';
        $items[] = 'R10xpali';
        $items[] = 'R10xsan';
        $items[] = 'R10xthri';
        $items[] = 'R10xeng';
        $items[] = 'R10xmath';
        $items[] = 'R10xtam';
        $items[] = 'R10xhis';
        $items[] = 'R10xgeo';
        $items[] = 'R10xsoc';
        $items[] = 'R10xgen';
        $items[] = 'R10xheal';
        //11_grade
        $items[] = 'R10ximonk';
        $items[] = 'R10xilay';
        $items[] = 'R10xitotal';
        $items[] = 'R10xisin';
        $items[] = 'R10xipali';
        $items[] = 'R10xisan';
        $items[] = 'R10xithri';
        $items[] = 'R10xieng';
        $items[] = 'R10ximath';
        $items[] = 'R10xitam';
        $items[] = 'R10xihis';
        $items[] = 'R10xigeo';
        $items[] = 'R10xisoc';
        $items[] = 'R10xigen';
        $items[] = 'R10xiheal';
        //12_grade
        $items[] = 'R10xiimonk';
        $items[] = 'R10xiilay';
        $items[] = 'R10xiitotal';
        $items[] = 'R10xiisin';
        $items[] = 'R10xiipali';
        $items[] = 'R10xiisan';
        $items[] = 'R10xiithri';
        $items[] = 'R10xiieng';
        $items[] = 'R10xiimath';
        $items[] = 'R10xiitam';
        $items[] = 'R10xiihis';
        $items[] = 'R10xiigeo';
        $items[] = 'R10xiisoc';
        $items[] = 'R10xiigen';
        $items[] = 'R10xiiheal';
        //13_grade
        $items[] = 'R10xiiimonk';
        $items[] = 'R10xiiilay';
        $items[] = 'R10xiiitotal';
        $items[] = 'R10xiiisin';
        $items[] = 'R10xiiipali';
        $items[] = 'R10xiiisan';
        $items[] = 'R10xiiithri';
        $items[] = 'R10xiiieng';
        $items[] = 'R10xiiimath';
        $items[] = 'R10xiiitam';
        $items[] = 'R10xiiihis';
        $items[] = 'R10xiiigeo';
        $items[] = 'R10xiiisoc';
        $items[] = 'R10xiiigen';
        $items[] = 'R10xiiiheal';
        //Pracheena_start_grade
        $items[] = 'R10pSmonk';
        $items[] = 'R10pSlay';
        $items[] = 'R10pStotal';
        $items[] = 'R10pSsin';
        $items[] = 'R10pSpali';
        $items[] = 'R10pSsan';
        $items[] = 'R10pSthri';
        $items[] = 'R10pSeng';
        $items[] = 'R10pSmath';
        $items[] = 'R10pStam';
        $items[] = 'R10pShis';
        $items[] = 'R10pSgeo';
        $items[] = 'R10pSsoc';
        $items[] = 'R10pSgen';
        $items[] = 'R10pSheal';

        //Pracheena_mid_grade
        $items[] = 'R10pMmonk';
        $items[] = 'R10pMlay';
        $items[] = 'R10pMtotal';
        $items[] = 'R10pMsin';
        $items[] = 'R10pMpali';
        $items[] = 'R10pMsan';
        $items[] = 'R10pMthri';
        $items[] = 'R10pMeng';
        $items[] = 'R10pMmath';
        $items[] = 'R10pMtam';
        $items[] = 'R10pMhis';
        $items[] = 'R10pMgeo';
        $items[] = 'R10pMsoc';
        $items[] = 'R10pMgen';
        $items[] = 'R10pMheal';
        //Pracheena_end_grade
        $items[] = 'R10pEmonk';
        $items[] = 'R10pElay';
        $items[] = 'R10pEtotal';
        $items[] = 'R10pEsin';
        $items[] = 'R10pEpali';
        $items[] = 'R10pEsan';
        $items[] = 'R10pEthri';
        $items[] = 'R10pEeng';
        $items[] = 'R10pEmath';
        $items[] = 'R10pEtam';
        $items[] = 'R10pEhis';
        $items[] = 'R10pEgeo';
        $items[] = 'R10pEsoc';
        $items[] = 'R10pEgen';
        $items[] = 'R10pEheal';
        //v_v_test_grade
        $items[] = 'R10Vtestmonk';
        $items[] = 'R10Vtestlay';
        $items[] = 'R10Vtesttotal';
        $items[] = 'R10Vtestsin';
        $items[] = 'R10Vtestpali';
        $items[] = 'R10Vtestsan';
        $items[] = 'R10Vtestthri';
        $items[] = 'R10Vtesteng';
        $items[] = 'R10Vtestmath';
        $items[] = 'R10Vtesttam';
        $items[] = 'R10Vtesthis';
        $items[] = 'R10Vtestgeo';
        $items[] = 'R10Vtestsoc';
        $items[] = 'R10Vtestgen';
        $items[] = 'R10Vtestheal';
        //degree_grade
        $items[] = 'R10Degmonk';
        $items[] = 'R10Deglay';
        $items[] = 'R10Degtotal';
        $items[] = 'R10Degsin';
        $items[] = 'R10Degpali';
        $items[] = 'R10Degsan';
        $items[] = 'R10Degthri';
        $items[] = 'R10Degeng';
        $items[] = 'R10Degmath';
        $items[] = 'R10Degtam';
        $items[] = 'R10Deghis';
        $items[] = 'R10Deggeo';
        $items[] = 'R10Degsoc';
        $items[] = 'R10Deggen';
        $items[] = 'R10Degheal';
        //other_grade
        $items[] = 'R10Othermonk';
        $items[] = 'R10Otherlay';
        $items[] = 'R10Othertotal';
        $items[] = 'R10Othersin';
        $items[] = 'R10Otherpali';
        $items[] = 'R10Othersan';
        $items[] = 'R10Otherthri';
        $items[] = 'R10Othereng';
        $items[] = 'R10Othermath';
        $items[] = 'R10Othertam';
        $items[] = 'R10Otherhis';
        $items[] = 'R10Othergeo';
        $items[] = 'R10Othersoc';
        $items[] = 'R10Othergen';
        $items[] = 'R10Otherheal';
        //all_total_grade
        $items[] = 'R10Totalmonk';
        $items[] = 'R10Totallay';
        $items[] = 'R10Totaltotal';
        $items[] = 'R10Totalsin';
        $items[] = 'R10Totalpali';
        $items[] = 'R10Totalsan';
        $items[] = 'R10Totalthri';
        $items[] = 'R10Totaleng';
        $items[] = 'R10Totalmath';
        $items[] = 'R10Totaltam';
        $items[] = 'R10Totalhis';
        $items[] = 'R10Totalgeo';
        $items[] = 'R10Totalsoc';
        $items[] = 'R10Totalgen';
        $items[] = 'R10Totalheal';
       
        $data = elements($items, $_POST);  

        $school_id = $this->input->post('school_id');
        if ($school_id) {
            $school = $this->db->get_where('schools', array('id' => $school_id))->row();
            if ($school) {
                $data['cencus_number'] = $school->cencus_number;
            }
        }
      
        // $data['date'] = date('Y-m-d', strtotime($this->input->post('date')));
        
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

    
    
    
    
    
     /*****************Function delete**********************************
     * @type            : Function
     * @function name   : delete
     * @description     : delete "News" from database                  
     *                    and unlink news image from server   
     * @param           : $id integer value
     * @return          : null 
     * ********************************************************** */
    public function delete($id = null) {
        
         check_permission(DELETE);
         
        if(!is_numeric($id)){
            error($this->lang->line('unexpected_error'));
            redirect('student/news/index');    
        }  
        
        $news = $this->news->get_single('student_cal', array('id' => $id));
         
        if ($this->news->delete('student_cal', array('id' => $id))) {  
            
            // delete teacher resume and image
            $destination = 'assets/uploads/';
            if (file_exists( $destination.'/news/'.$news->image)) {
                @unlink($destination.'/news/'.$news->image);
            }
            
            create_log('Has been deleted a news : '.$news->title); 
            
            success($this->lang->line('delete_success'));
        } else {
            error($this->lang->line('delete_failed'));
        }
        redirect('student/news/index/'.$news->school_id); 
    }

}
