<?php 
/*
 * updated by haezal
 * */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
	
	var $controller;
	var $method;
	public function __construct(){
		parent::__construct();
		
		//$this->load->library('FAL_front', 'fal_front');
		$this->load->model('Mymodel', '', TRUE);
		$this->load->library('session');
		$this->load->library('Breadcrumb');
		$this->load->library('Authentication');
		$this->load->library('form_validation');
		$this->load->helper('inflector');
		$this->load->helper('url');
		$this->load->helper('flashmsg');
		$this->lang->load('my');
		
        $this->breadcrumb_data = $this->breadcrumb->generate();
        
        $this->controller = $this->uri->rsegment(1);
        $this->method      = $this->uri->rsegment(2);
        $papar = dirname(APPPATH)."/application/views/".$this->controller."/v_".$this->method.".php";
        //echo $papar;
        //View Management
		if (file_exists(dirname(APPPATH)."/application/views/".$this->controller."/v_".$this->method.".php")) {
			$this->content_view = $this->controller."/v_".$this->method;
		}
		else 
			$this->content_view = "generic"; 
		
		//Generate Page Title
		$uri = $this->uri->segment_array();
		$this->title = "";
		foreach ($uri as $v){
			$this->title .= " - ".humanize($v);
		}
	}
	
	function _render_page($data=null){

		if($data==null)
			$this->load->view('template');
		else
			$this->load->view('template', $data);
	}
	
	function _insert_log($ins_controller, $ins_method) {
		
		$this->Mymodel->insert_log('data_log',
			array('dl_userid' => $this->session->userdata('session_id'), 
			'dl_type' => $ins_controller.'/'.$ins_method, 
			'dl_data' => serialize($this->data)));
	}
}

?>
