<div role="main" class="main" style="">
	<section
		class=" section-angled  border-0 m-0  z-index-3"style="height: 100%;"
	>
		<div class="row ">
			<div
				class="col-md-6 d-flex flex-column justify-content-between py-5 px-5"
				style="height: 110vh; background-color: var(--brighter-blue); clip-path: polygon(0 0, 100% 0, 68% 100%, 0% 100%);"
			>
				<div class="mb-5">
					<a href="<?php echo site_url()?>">	<img
								alt="Porto"
								width="190"
								height="auto"
								data-sticky-width="82"
								data-sticky-height="36"
								data-sticky-top="0"
								src="<?php echo base_url().'assets/admin/images/logo.svg' ?>"
						/></a>
				</div>

				<div class="text-center px-5 py-2" style="height: 400px; width: 100%;">
					<h4
						class="text-white text-center text-capitalize mb-3 "
						style=" letter-spacing: 1px;"
					>
						Already Signed up?
					</h4>
					<p class="text-white mb-5 px-5">

					</p>
					<a href="<?php echo site_url().'login'?>" type="submit" class="btn btn-outline-light w-50 text-center">
						Log in
					</a>
				</div>
			</div>
			<div
				style="height: 100%; " class="col-md-6  d-flex flex-column justify-content-center align-items-center"

			><br>
				<h4 class="text-dark">Sign Up for an Account</h4>
				<p class="text-center">
					<span>Let’s get you all set up so you can start moving </span> <br />
					<span> loads with Hauleasy </span>
				</p>
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
					<div class="alert alert-info text-center">
						<?php echo $this->session->flashdata('message'); ?>
					</div>
					<?php
				}
				?>

				<form method="POST" action="<?php echo site_url().'user/register'; ?>">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputEmail4">First Name</label>
							<input
								type="text"
								class="form-control"
								placeholder="Joshua"
								id="fname"
								name="fname"
								value="<?php echo set_value('fname'); ?>"
							/>
						</div>
						<div class="form-group col-md-6">
							<label for="inputPassword4">Last Name</label>
							<input
								type="text"
								class="form-control"
								placeholder="Osazuwa"
								id="lname"
								name="lname"
								value="<?php echo set_value('lname'); ?>"
							/>
						</div>
					</div>
					<div class="form-group">
						<label for="inputAddress">Phone</label>
						<input
							type="text"
							class="form-control"
							placeholder="080xxxxxx"
							id="phone" name="phone" value="<?php echo set_value('phone'); ?>"
						/>
					</div>
					<div class="form-row">
						<div class="form-group col-md-4">
							<div class="form-check">
								<input
									class="form-check-input"
									checked
									type="radio"
									id="reg_type"
									name="reg_type"
									value="Shipper"
								/>
								<label class="form-check-label" for="gridRadios1">
									Shipper
								</label>
							</div>
						</div>

						<div class="form-group col-md-4">
							<div class="form-check">
								<input
									class="form-check-input"
									checked
									type="radio"
									id="reg_type"
									name="reg_type"
									value="Vendor"
								/>
								<label class="form-check-label" for="gridRadios2">
									Vendor
								</label>
							</div>
						</div>

						<div class="form-group col-md-4">
							<div class="form-check">
								<input
									class="form-check-input"
									checked
									type="radio"
									id="reg_type"
									name="reg_type"
									value="Corporate"
								/>
								<label class="form-check-label" for="gridRadios3">
									Corporate
								</label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="inputAddress">Email</label>
						<input
							type="email"
							class="form-control"
							placeholder="joshua@ionec.com"
							id="email"
							name="email"
							value="<?php echo set_value('email'); ?>"
						/>
					</div>

					<div class="form-group position-relative">
						<label for="inputAddress">Password</label>
						<input
							type="password"
							class="form-control"
							placeholder="joshua@ionec.com"
							id="password"
							name="password"
							value="<?php echo set_value('password'); ?>"
						/>
<!--						<span class="text-dark text-center position-absolute hideOrShow">-->
<!--              <i class="fas fa-eye-slash"></i>-->
<!--            </span>-->
					</div>

					<div class="form-group position-relative">
						<label for="inputAddress">Confirm Password</label>
						<input
							type="password"
							class="form-control"
							placeholder="joshua@ionec.com"
							id="password_confirm"
							name="password_confirm"
							value="<?php echo set_value('password_confirm'); ?>"
						/>
						<!--						<span class="text-dark text-center position-absolute hideOrShow">-->
						<!--              <i class="fas fa-eye-slash"></i>-->
						<!--            </span>-->
					</div>

					<div class="form-group">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" id="gridCheck" required />
							<label class="form-check-label" for="gridCheck">
								I accept Hauleasy’s
								<span class="text-warning"> Terms & Conditions</span>
							</label>
						</div>
					</div>

					<button type="submit" class="btn btn-primary btn-block">
						Sign up
					</button>
				</form>

				<div
					class="d-flex w-100 justify-content-center align-items-center my-3"
				>
					<div class="px-3"><small>or signup using</small></div>
				</div>

				<div class="d-flex w-50">
					<div
						class="flex-fill d-flex align-items-center justify-content-center mr-2 border py-2"
					>
						<img src="<?php echo base_url().'assets/admin/images/google-search.png' ?>" alt="" />
					</div>
					<div
						class="flex-fill d-flex align-items-center justify-content-center mr-2 border py-2"
					>
						<img src="<?php echo base_url().'assets/admin/images/facebook.png' ?>" alt="" />
					</div>
					<div
						class="flex-fill d-flex align-items-center justify-content-center mr-2 border py-2"
					>
						<img src="<?php echo base_url().'assets/admin/images/twitter.png' ?>" alt="" />
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
