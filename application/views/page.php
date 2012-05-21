<? $this->load->view('header')?>

<!-- HEADER -->
<div class="module-header">
	<div id="wrapper">
		<!--div id="logo left"><img src="<?=base_url()?>public/images/logo/umlogo-new.gif" /></div-->
		<!--div id="userpanel">Welcome <?=$this->user_details['STA_ID_PENGGUNA']?></div-->
		<div class="header-box1"><img src="<?=base_url()?>public/images/logo/umlogo-new.gif" /></div>
		<div class="header-box2">
			<img src="<?=base_url()?>public/images/logo/right-logo.png" /><br><br>
		</div>	
	</div>
</div>
<div class="kill"></div>
<!-- EEND OF HEADER -->
<?php echo $this->load->view('top_menu');?>



<!--div class="subhead-main"> 
	<h1><?=$this->title?></h1>
	
</div-->		
<!-- Container -->
<div id="container" class="box-shadows">
<!--div class="breadcrumbs">
    <ul id="breadcrumb">
      <li><a href="<?=base_url()?>" title="Home"><img src="<?=base_url()?>public/images/home.png" alt="Home" class="home" /></a></li>
		<?php foreach ($this->breadcrumb_data as $value) : ?>
		<?php if ($value != '') : ?>
			<li><?php echo $value?></li>
		<?php endif; ?>
		<?php endforeach; ?>
		
    </ul>
</div-->
	<?php echo $this->load->view('flashNotification');?>
	
	<?=$this->load->view($this->content_view);?>
</div>
<!-- end container -->
</div>
<div class="kill"></div>
	<div id="footer">
        <div align="center">
            DISCLAIMER: 
            This system shall not be liable for any loss or damage caused by the usage of any information obtained from this template. 
         <br />   
         <!--div class="right">Develop By <a href="http://haezal.blogspot.com" target="_blank">Haezal</a></div-->
            
          </div>
	</div>

<?php //$this->load->view('debug');?>
</body>
</html>
