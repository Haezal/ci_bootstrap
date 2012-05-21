<div class="row">

	<div class="span12">
	
		<?= form_open('', array('class'=>'form-horizontal')); ?>
		
			<div class="control-group">
				<label class="control-label">Username</label>
				<div class="controls">
					<?= form_input('username', '', 'class="input-large"'); ?>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Password</label>
				<div class="controls">
					<?= form_password('password', '', 'class="input-large"'); ?>
				</div>
			</div>
			<div class="form-actions">
				<button class="btn btn-primary">Login</button>
			</div>
		
		<?= form_close(); ?>
	
	</div>

</div>