<div class="space"></div>
<div class="container">
<div class="row">
	<div class="col-lg-12 text-center">
		<?php
		if(validation_errors()){
			?>
			<div class="alert alert-info text-center">
				<?php echo validation_errors(); ?>
			</div>
			<?php
		}

		if($this->session->flashdata('message')){
			?>
			<div class="text-success">
				<?php echo $this->session->flashdata('message'); ?>
			</div>
			<?php
		}
		?>
		<h4>Congratulation your have successfully verified your email</h4>
		Kindly <a href="<?php echo site_url().'/login' ?>">login</a>
	</div>
</div>
</div>
