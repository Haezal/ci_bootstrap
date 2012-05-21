<?php
$message_type = $this->session->flashdata('message_type');
$flash=$this->session->flashdata('flashMessage');
if (isset($flash) AND $flash['msg']!=''):?> 
	<div id="flashMessage" class="message message-<?php echo $message_type?>"> 
	    <p><?=$flash?></p>
	</div>
<?php 
endif;
 ?>
