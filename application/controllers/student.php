<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of student
 *
 * @author User
 */
class Student extends MY_Controller {
    //put your code here
    function __construct(){
        parent::__construct();
    }
    
    function details() {
        
        
        $data['title'] = "Student Details";
        
        
        
        $this->_render_page($data);
    }
}

?>
