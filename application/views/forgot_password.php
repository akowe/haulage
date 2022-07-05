<div role="main" class="main" style="">
	<section
			style="height: 100%;"
			class=" section-angled  border-0 m-0  z-index-3"
	>
		<div class="row ">
			<div
					class="col-md-6 d-flex flex-column justify-content-between py-5 px-5"
					style="height: 100vh; background-color: var(--brighter-blue); clip-path: polygon(0 0, 100% 0, 68% 100%, 0% 100%);"
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
						Have an account?
					</h4>
					<p class="text-white mb-5 px-5">

					</p>
					<a href="<?php echo site_url().'login'?>" type="submit" class="btn btn-outline-light w-50 text-center">
						Log in
					</a>
				</div>
			</div>
			<div
					class="col-md-6  d-flex flex-column justify-content-center align-items-center"
					style=" height: 100vh;"
			>
				<h4 class="text-dark">Forgot Password</h4>
				<p class="text-center">
					<span> </span>
					<br />
					<span>

          </span>
				</p>
				<?php
				if(validation_errors()){
					?>
					<div class="alert alert-info text-center">
						<?php echo validation_errors(); ?>
					</div>
					<?php
				}
				if($this->session->flashdata('flash_message')){
					?>
					<div class="alert alert-info text-center">
						<?php echo $this->session->flashdata('flash_message'); ?>

					</div>
					<?php
				}
				?>
<!--				--><?php //$fattr = array('class' => 'form-signin');?>
<!---->
<!--				<form class="w-50" method="POST" action="--><?php // echo site_url(). 'user/forgot_password'.$fattr;?><!--">-->
<!--					-->
					<?php $fattr = array('class' => 'w-50');
					echo form_open(site_url().'user/forgot', $fattr); ?>

					<div class="form-group">

						<label for="inputAddress">Email</label>
						<input
								type="email"
								class="form-control"
								id="email"
								placeholder="joshua@ionec.com"
								name="email"
								value="<?php echo set_value('email'); ?>"
						/>
					</div>


					<button type="submit" class="btn btn-primary btn-block">
						Forgot Password
					</button>
				</form>

				<div
						class="d-flex w-100 justify-content-center align-items-center my-3"
				>
					<div class="px-3"><small>or login using</small></div>
				</div>

				<div class="d-flex w-50">
					<div
							class="flex-fill d-flex align-items-center justify-content-center mr-2 border py-2"
					>

						<img src="<?php echo base_url(). 'assets/admin/images/google-search.png' ?>" alt="" />
					</div>
					<div
							class="flex-fill d-flex align-items-center justify-content-center mr-2 border py-2"
					>
						<img src="<?php echo base_url(). 'assets/admin/images/facebook.png' ?>" alt="" />
					</div>
					<div
							class="flex-fill d-flex align-items-center justify-content-center mr-2 border py-2"
					>
						<img src="<?php echo base_url(). 'assets/admin/images/twitter.png' ?>" alt="" />
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<script>
	function get_email(){
		//this happens after the payment is completed successfully


		var email = document.getElementById("email").value;
		// alert('Payment complete! Reference : ' + reference);

		window.location = "<?php echo site_url();?>reset_password?successfullypass="+email+ ;
	}

	fu

</script>



	<div class="space"></div>
</div>
