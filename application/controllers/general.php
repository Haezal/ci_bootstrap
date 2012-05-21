<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class General extends MY_Controller{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$this->content_view = "welcome_message";
		
		$this->_render_page();
	}
}

?>
