<div role="main" class="main dashboard">
	<div class="container-fluid">
		<div class="row" style="height: 100vh">
			<!-- Side nav -->
			<?php  $this->load->view('includes/admin/sidebar');?>
			<!-- End Side nav -->

			<!-- Top nav -->
			<nav class="navbar navbar-expand-lg navbar-light ">
				<div class="container-fluid">

					<button type="button" id="sidebarCollapse" class="btn btn-primary" title="Hide Sidebar">
						<i class="fas fa-align-justify"></i>
					</button>
					<a class="navbar-brand font-weight-bold flex-grow-1" style="font-size: 30px; color: var(--heading-text-color);"
					   href="javascript:void(0)">&nbsp; Change Password</a>

					<span class="btn  my-2 my-sm-0" type="submit">
                 				 <img  src="<?php echo base_url().'assets/admin/images/notifications-bell.svg' ?>"
									   alt="Notification bell"  />
              			  </span>
					<!-- collaps button on mobile-->
					<a class=" d-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				 <span  class="font-weight-bold" style="color: var(--heading-text-color); text-transform: capitalize;" >
								   <?php echo $this->session->userdata('fname')?> &nbsp;
							   </span>
					</a>
					<!-- collaps button on mobile-->

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="nav navbar-nav ml-auto">
							<li class="nav-item d-lg-block d-md-block d-sm-none">
							   <span  class="font-weight-bold" style="color: var(--heading-text-color); text-transform: capitalize;" >
								   <?php echo $this->session->userdata('fname')?> &nbsp;
							   </span>	<img src="<?php echo base_url().'assets/admin/images/user-profile.svg' ?>" alt="" />
							</li>

						</ul>
					</div>
				</div>
			</nav>
			<!-- Top nav -->

			<!-- Main area -->
			<div class="col-xs-12">
				<div class="container">
					<div class="rounded" style="background: var(--brighter-blue); margin-top: -40px; ">
						<div class="col-12">
							&nbsp;
						</div>
					</div><!-- blue div row -->

					<!-- Summary -->
					<!-- Recent orders  -->
					<div class="bg-light  rounded">

						<?php
						if(validation_errors()){
							?>
							<div class="alert alert-info text-center">
								<?php echo validation_errors(); ?>
							</div>
							<?php
						}
						if($this->session->flashdata('reset')){
							?>
							<div class="alert alert-info text-center">
								<?php echo $this->session->flashdata('reset'); ?>

							</div>
							<?php
						}
						?>

								<div class="col-12 ">
								<br>

									<?php
									// All users list
									if(isset($view) && $view == 1)  {
										?>

										<form>
											<?php
											$sno = 1;
											foreach($response as $val){
												echo '
                     <h6 class="mb-2 text-gray-800"><span class="text-primary"> </span> Are You Sure You Want To Reset Password?</h6>
						<!--<table class="table table-bordered">
						<thead>
						
						</thead>
						<tbody>
						<tr>
						
						</tr>
						</tbody>
						
						</table>-->
						<br>
						<a class="btn btn-primary" href="'.site_url().'user/change_password?edit='.$val['id'].'" class="text-white">Click Here To Change Password</a> 
					
                    
                      
                    ';
												$sno++;
											}
											?>
										</form>
										<?php
									}

									// Edit user
									if(isset($view) && $view == 2)  {

										?>
										<form method='post' action=''>

											<input type="hidden"  name="email" value='<?php echo $response['email']; ?>'   class="form-control" readonly>
											<input type="hidden"  name="referral" value='<?php echo $response['phone']; ?>'   class="form-control" readonly>

											<div class="form-group">
												<label>New Password</label><i class="text-danger">*</i>
												<input type="text"  name="password" value=''  placeholder="Password"  class="form-control">
											</div>
											<div class="form-group">
												<label>Confirm Your Password</label><i class="text-danger">*</i>
												<input type="text"  name="password1" value=''  placeholder="Repeat Password"  class="form-control">
											</div>



											<div class="form-group">
												<input type='submit' name='submit' value='Change Password' class="btn btn-primary">
											</div>


										</form>
										<?php
									}
									?>
<br>
								</div>

					</div><!-- col-12-->

				</div><!--container-->
			</div><!--col-10-->
		</div><!--row-->
	</div><!--container-->

	<div class="container-fluid">
	</div>

</div>

<script>
	// Call the dataTables jQuery plugin
	$(document).ready(function() {
		$('#dataTable').DataTable({
			"order": [ 1, "desc" ]
		});

	});


</script>


