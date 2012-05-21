<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?= $this->config->item('site_name'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="<?php echo base_url() ?>assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo base_url() ?>favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url() ?>assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url() ?>assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url() ?>assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>

    <!-- TOP MENU -->
	<? $this->load->view('top_menu'); ?>

    <div class="container">
        
        <!-- Main hero unit for a primary marketing message or call to action -->
		<div class="row-fluid">
			<div class="span12">
				<div class="pull-left">
					<ul class="thumbnails">
						<li class="span12"><i class="thumbnail"><img src="<?php echo base_url()?>public/images/logo_um.png"></i></li>
					</ul>
				</div>
			</div>
		</div>
		
		<!-- Header Title -->
		<div class="page-header">
			<h2><?= $title ?></h2>
		</div>

        <?php $this->load->view($this->content_view)?>
        
		<hr>
		<!-- FOOTER -->
		<footer>
			<p class="pull-right"><a href="#"><i class="icon-chevron-up"></i> Back to top</a></p>
			<p>&copy; Copyright 2012 University of Malaya</p>
			<p>Page rendered in <strong>{elapsed_time}</strong> seconds</p>
		</footer>

    </div> <!-- /container -->

    
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url() ?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap-transition.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap-alert.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap-modal.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap-dropdown.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap-scrollspy.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap-tab.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap-tooltip.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap-popover.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap-button.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap-collapse.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap-carousel.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap-typeahead.js"></script>

  </body>
</html>
