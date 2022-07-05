<div role="main" class="main dashboard">
	<div class="container-fluid">
		<div class="row" style="height: 100vh">
			<!-- Side nav -->
			<?php  $this->load->view('includes/sidebar');?>
			<!-- End Side nav -->

			<!-- Main area -->
			<div class="col-10">
				<div class="container">

					<!-- top nav -->
					<nav
						class="navbar navbar-expand-lg navbar-light d-flex  my-2 py-4 mb-2"
					>
						<a
							class="navbar-brand font-weight-bold flex-grow-1"
							style="font-size: 30px; color: var(--heading-text-color);"
							href="javascript:void(0)"
						>Change Password</a
						>
						<button
							hidden
							class="navbar-toggler"
							type="button"
							data-toggle="collapse"
							data-target="#navbarSupportedContent"
							aria-controls="navbarSupportedContent"
							aria-expanded="false"
							aria-label="Toggle navigation"
						>
							<span class="navbar-toggler-icon"></span>
						</button>

						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<form class="form-inline my-2 my-lg-0 w-100">
								<input
									class="form-control w-75 mr-sm-3"
									type="search"
									placeholder="Search"
									aria-label="Search"
								/>
								<span class="btn  my-2 my-sm-0" type="submit">
                  <img
					  src="<?php echo base_url().'assets/admin/images/notifications-bell.svg' ?>"
					  alt="Notification bell"
				  />
                </span>
							</form>
						</div>

						<div class="collapse navbar-collapse justify-content-end">
							<div class="d-flex flex-column px-3">
                <span
					class="font-weight-bold"
					style="color: var(--heading-text-color)"
				><?php echo $this->session->userdata('fname')?> <?php echo $this->session->userdata('lname')?></span
				>
								<small class="text-right" style="line-height: 14px"
								><?php echo $this->session->userdata('reg_type')?></small
								>
							</div>
							<div>
								<img src="<?php echo base_url().'assets/admin/images/user-profile.svg' ?>" alt="" />
							</div>
						</div>



					</nav>

					<!-- end top nav -->
					<!--  Show case -->

					<div
						class="row mx-auto rounded pt-4"

					>
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

						<div class="col-12 d-flex mx-auto">


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

						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

