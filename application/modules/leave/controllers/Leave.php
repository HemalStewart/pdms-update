<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************Leave.php**********************************
 * @product name    : PDMS
 * @type            : Class
 * @class name      : Leave
 * @description     : Manage Leave.  
 * @author          : Rameca Team 	
 * @url             : https://www.ramecats.lk     
 * @support         : info@ramecats.lk	
 * @copyright       : All Rights Reserved. Design & Developed by Rameca Technology Solutions	
 * ********************************************************** */

class Leave extends MY_Controller {

    public $data = array();

    function __construct() {
        parent::__construct();
        $this->load->model('Application_Model', 'Leave', true);   
        
        $this->load->model('Ajax_Model', 'ajax', true);  
         $listprovincial = $this->ajax->listprovincial();
         $this->data['listprovincial'] = $listprovincial;
    }

    /*****************Function index**********************************
    * @type            : Function
    * @function name   : index
    * @description     : Load "Decline Leave List" user interface                 
    *                    listing    
    * @param           : integer value
    * @return          : null 
    * ***********************************************************/
    public function index($school_id = null) {

        check_permission(VIEW);                        
       
        $this->layout->view('index.html', $this->data);
        
    }

}
