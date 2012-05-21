<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
function flashMsg($msg)
{
	$obj =& get_instance();
	$obj->session->set_flashdata('flashMessage', $msg);
    return true;
}
*/
function flashMsg($msg,  $type=null)
{
	$obj =& get_instance();
	if($type!=null)
		$obj->session->set_flashdata('message_type', $type);
	$obj->session->set_flashdata('flashMessage', $msg);
	return true;
}


//end of file
