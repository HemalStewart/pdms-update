<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************Install.php**********************************
 * @product name    : PDMS
 * @type            : Class
 * @class name      : Install
 * @description     : This is Install class of the application.  
 * @author          : Rameca Team 	
 * @url             : https://www.ramecats.lk     
 * @support         : info@ramecats.lk	
 * @copyright       : All Rights Reserved. Design & Developed by Rameca Technology Solutions 	
 * ********************************************************** */

class Install extends CI_Controller {
    /*     * **************Function index**********************************
     * @type            : Function
     * @function name   : index
     * @description     : this function redirect to installation process            
     * @param           : null; 
     * @return          : null 
     * ********************************************************** */

    public function index() {
       redirect(base_url() . 'installation/setting');             
    }

}
