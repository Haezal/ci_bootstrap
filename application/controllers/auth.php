<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of auth
 *
 * @author User
 */
class Auth extends MY_Controller {
	
    //put your code here
    function __construct() {
        parent::__construct();
    }
    function login(){
        
		$data['title'] = "Login";
		
		$this->authentication->login();
		
		// print_r($data);
		$this->_render_page($data);
    }
}

?>
