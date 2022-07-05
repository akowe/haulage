<div class="contact-section">
	<div class="container">
		<div class="row">

			<div class="col-lg-8">
				<!-- Form content box start -->
				<div class="form-content-box">
					<h5 class="text-dark">ADD ADMIN USER </h5>
					<!-- details -->
					<div class="details">
						<!-- Logo -->	<?php
						if(validation_errors()){
							?>
							<div class="alert alert-info text-center">
								<?php echo validation_errors(); ?>
							</div>
							<?php
						}
						if($this->session->flashdata('message')){
							?>
							<div class="alert alert-info text-center">
								<?php echo $this->session->flashdata('message'); ?>
							</div>
							<?php
						}
						?>
						<p class="">All fields mark <i class="text-danger">*</i> are compulsory.<br></p>
						<form method="POST" action="<?php echo site_url().'admin/create'; ?>">
							<div class="form-group">
								<label for="email">First Name:</label><i class="text-danger">*</i>
								<input type="text" class="form-control" id="fname" name="fname" value="<?php echo set_value('fname'); ?>" placeholder="First Name">
							</div>

							<div class="form-group">
								<label for="email">Last Name:</label><i class="text-danger">*</i>
								<input type="text" class="form-control" id="lname" name="lname" value="<?php echo set_value('lname'); ?>" placeholder="Last Name">
							</div>

							<div class="form-group">
								<label for="email">Phone:</label><i class="text-danger">*</i>
								<input type="number" class="form-control" id="phone" name="phone" value="<?php echo set_value('referral'); ?>" placeholder="Phone Number">
							</div>

							<div class="form-group">
								<label for="email">Address:</label><i class="text-danger">*</i>
								<input type="text" class="form-control" id="address" name="address" value="<?php echo set_value('address'); ?>" placeholder="Contact Address">
							</div>

							<div class="form-group">
								<label for="email">Email:</label><i class="text-danger">*</i>
								<input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>" placeholder="Valid Email">

							</div>
							<div class="form-group">
								<label for="password">Password:</label><i class="text-danger">*</i>
								<input type="password" class="form-control" id="password" name="password" value="<?php echo set_value('password'); ?>" placeholder="Password">
							</div>
							<div class="form-group">
								<label for="password_confirm">Password:</label><i class="text-danger">*</i>
								<input type="password" class="form-control" id="password_confirm" name="password_confirm" value="<?php echo set_value('password_confirm'); ?>" placeholder="Confirm Password">
							</div>

							<div class="form-group">
								<label for="password_confirm">Select A Role:</label><i class="text-danger">*</i>
								<select class="form-control" type="text" name="admin" id="admin">
									<option class="form-control" value="user">User</option>
									<option class="form-control" value="admin">Admin</option>


								</select>
							</div>

							<div class="form-group">
								<input type="hidden" class="form-control" id="status" name="status" value="Admin">
							</div>
							<br>
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Create Admin</button>
							</div>
						</form>
					</div>

					<div class="footer">
						<span>Already a member? <a href="login" class="">Login here</a></span>
					</div>
				</div>
			</div>
			<div class="col-lg-4"></div>
		</div>
	</div>
</div>
<br>



<script  src="<?php echo base_url(). 'assets/admin/js/sb-admin-2.js'; ?>"></script>

<script src="<?php echo base_url(). 'assets/admin/vendor/jquery/jquery.min.js'; ?>"></script>
<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url(). 'assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js' ;?>"></script>
<!-- Core plugin JavaScript-->
<script src="<?php echo base_url(). 'assets/admin/vendor/jquery-easing/jquery.easing.min.js' ;?>"></script>
<!-- Custom scripts for all pages-->
<script src="<?php echo base_url(). 'assets/admin/js/sb-admin-2.min.js'; ?>"></script>
<!-- Page level plugins -->
<script src="<?php echo base_url(). 'assets/admin/vendor/chart.js/Chart.min.js' ;?>"></script>
<!-- Page level custom scripts -->
<script src="<?php echo base_url(). 'assets/admin/js/demo/chart-area-demo.js'; ?>"></script>
<script src="<?php echo base_url(). 'assets/admin/js/demo/chart-pie-demo.js' ;?>"></script>
