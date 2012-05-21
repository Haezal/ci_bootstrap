<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Authentication
{
    private $_ci;  
    private $table_name = "UMM_PLJR_MAKL";
    private $field_username = "SIS_USERNAME";
    private $field_password = "SIS_KATALALUAN";
    function __construct() {

        $this->_ci =& get_instance(); // get the CodeIgniter object
    	
    }
    
    function login(){
        $username = $this->_ci->input->post('username'); // get username from post
        $password = $this->_ci->input->post('password'); // get password from post
		
		$this->_ci->form_validation->set_rules('username', '<b>Username</b>', 'required|xss_clean');
		$this->_ci->form_validation->set_rules('password', '<b>Password</b>', 'required|xss_clean');
        
		if($this->_ci->form_validation->run() == true)
			$this->check_login($username, $password);
        // $this->check_login($username, md5($password)); // enable this for encypted password
        
    }
    
    function check_login ($username, $password){
        
		$this->_ci->db->where(array(
					$this->field_username=>$username, 
                    $this->field_password=>$password)
					);
        $data = $this->_ci->db->get($this->table_name)->row_array(); // check valid user
        
        
        if(isset($data)){
            $this->_ci->session->set_userdata("username", $username);
			
        }
        else{
            return false; // no record
        }
    }
    
    function is_logged_in() { // checking for user authentication
        //echo $_SESSION['sess_nostaf'];
        //exit;
        //print_r($_SESSION);exit;
		
		/* enable this if use CAS login
        if($_SESSION['MM_Username'] == "") {

            return false;

        }else {

            return $this->checkAuthntication($_SESSION['MM_Username']);

        }
		*/		
		
		if(!$this->_ci->session->userdata('username') || $this->_ci->session->userdata('username') == ""){
			return false;
		}
		else{
			return $this->checkAuthntication($this->_ci->session->userdata('username'));
		}
	 } 
     
     function checkAuthntication($mmusername) {
	 
			
        $this->_ci->db->select($this->field_username);
        $this->_ci->db->where($this->field_username,$mmusername);

        $query1 = $this->_ci->db->get($this->table_name);
        $res1=$query1->row_array();

		if($res1) {
			return true;
		}
		else{
			return false;
		}
		
    }
	
    function logout() {		
        $this->_ci->session->sess_destroy();		
        redirect('general');
    }
    
}
