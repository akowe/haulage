<div role="main" class="main dashboard">
	<div class="container-fluid">
		<div class="row" style="height: 150vh">
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
					   href="javascript:void(0)">&nbsp; Add Booking</a>

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
			<div class="col-xl-12">
				<div class="container">
					<div class="rounded d-lg-block d-md-none d-sm-none" style="background: var(--brighter-blue); margin-top: -40px; ">
						<div class="col-12">
							&nbsp;
						</div>
					</div><!-- blue div row -->

					<!-- Summary -->
					<!-- Recent orders  -->
					<style>
						@media (max-width: 768px) {
							#book {
								margin-top: -60px;
							}

						}
					</style>

					<div class="bg-light  rounded" id="book">

						<div class="col-12 ">

							<h2 class="mb-1 text-center modified font-weight-bold d-lg-block d-md-none d-sm-none">
								Location, Date & Time
							</h2>
							<br>

							<!-- Logo -->	<?php
							if(validation_errors()){
								?>
								<div class="alert alert-info text-center">
									<?php echo validation_errors(); ?>
								</div>
								<?php
							}
							if($this->session->flashdata('booking')){
								?>
								<div class="alert alert-info text-center">
									<?php echo $this->session->flashdata('booking'); ?>
								</div>
								<?php
							}
							?>
							<!-- Booking Form Start -->

								<form method="post" action="" enctype="multipart/form-data">
									<div class="form-row">
										<div class="form-group col-md-6">
											<label
													class="mb-0"
													style="color: var(--heading-text-color)"
													for="inputEmail4"
											>Pick-up Location
											</label>
											<input
													placeholder="44 Victory Road, Lekki Phase1"
													type="text"
													class="form-control"
													id="address_from" name="address_from"
											/>
										</div>

										<div class="form-group col-md-6">
											<label
													class="mb-0"
													style="color: var( --heading-text-color)"
													for="inputState"
											>Drop-off Location</label
											>
											<input
													placeholder="44 Victory Road, Lekki Phase1"
													type="text"
													class="form-control"
													id="address_to" name="address_to"
											/>
										</div>

									</div>


									<div class="form-row">
										<div class="form-group col-md-6">
											<label
													class="mb-0"
													style="color: var(--heading-text-color)"
													for="inputPassword4"
											>Landmark
											</label>
											<input
													placeholder="The Palms Mall"
													type="text"
													class="form-control"
													id="landmark_from" name="landmark_from"
											/>

										</div>

										<div class="form-group col-md-6">
											<label
													class="mb-0"
													style="color: var(--heading-text-color)"
													for="inputPassword4"
											>Landmark
											</label>
											<input
													placeholder="The Palms Mall"
													type="text"
													class="form-control"
													id="landmark_to" name="landmark_to"
											/>

										</div>


									</div>


									<div class="form-row">
										<div class="form-group col-md-6">
											<label
													class="mb-0"
													style="color: var(--heading-text-color)"
													for="inputPassword4"
											>Pickup State
											</label>

											<select class="form-control" name="location_from" id="location_from">

												<?php foreach ($f->result() as $row) {?>
													<option class="text-color-dark form-control"  value="<?php echo $row->state;?>"><?php echo $row->state;?></option>
												<?php }
												?>
											</select>

										</div>

										<div class="form-group col-md-6">
											<label
													class="mb-0"
													style="color: var(--heading-text-color)"
													for="inputPassword4"
											>Drop-off State
											</label>
											<select  class="form-control" name="location_to" id="location_to">
												<?php foreach ($t->result() as $row) {?>
													<option class="form-control text-color-dark" value="<?php echo $row->state;?>"><?php echo $row->state;?></option>
												<?php }
												?>

											</select>
										</div>
									</div>


									<div class="form-row">
										<div class="form-group col-md-6">
											<label
													style="color: var(--heading-text-color)"
													for="inputState"
											>Type of vehicle</label
											></br>
											<label>Van</label>: <input id="vehicle_type"  type="radio" class="" name="vehicle_type" value="Van" >
											&nbsp;
											<label>Truck</label>: <input id="vehicle_type" type="radio" class="" name="vehicle_type" value="Truck" >
										</div>

										<div class="form-group col-md-6">
											<label
													style="color: var(--heading-text-color)"
													for="inputState"
											>Category</label
											></br>
											<label>Fragile</label>: <input id="category"  type="radio" class="" name="category" value="Fragile" >
											&nbsp;
											<label>Perishable</label>: <input id="category" type="radio" class="" name="category" value="Perishable" >
											&nbsp;
											<label>Non-perishable</label>: <input id="category" type="radio" class="" name="category" value="Non-perishable" >

										</div>
									</div>

									<div class="form-row">
										<div class="form-group col-md-6">
											<label style="color: var(--heading-text-color)" >Item</label>
											<input type="text" class="form-control" name="description" placeholder="Describe Item"><br>

										</div>

										<div class="form-group col-md-6">
											<label style="color: var(--heading-text-color)" >Weight</label>
											<input type="text" class="form-control" id="weight" name="weight" value="" placeholder="Weight of item">

											<label style="color: var(--heading-text-color)">Upload an image</label>
											<input type="file"  name="image" value=''   class="form-control" placeholder="jpg/jpeg/png">
											<small style="color: var(--heading-text-color)"> jpeg / jpg / png. Max size: 5mb</small>

											<input type="hidden" name="status" id="status" value="Pending">

											<div class="d-flex w-100 justify-content-center align-items-center mt-4"
											>
												<button
														style="background: var(--modified-orange);"
														type="submit"
														class="btn text-white  px-5"
														name="submit"
												>
													Book Now
												</button>
											</div>
										</div>

									</div>

								</form>

							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-12">
										<p><br><br><br></p>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<p><br><br><br></p>
									</div>
								</div>


							</div>
						</div><!-- col-12-->

					</div>

				</div><!--container-->
			</div><!--col-12-->
		</div><!--row-->
	</div><!--container-->
</div>






