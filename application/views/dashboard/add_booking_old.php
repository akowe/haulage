<div class="contact-section">
	<div class="container">
		<div class="row">

			<div class="col-lg-12">
				<!-- Form content box start -->
				<div class="form-content-box">
					<h5 class="text-dark">ADD NEW BOOKING</h5>
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
						if($this->session->flashdata('booking')){
							?>
							<div class="alert alert-info text-center">
								<?php echo $this->session->flashdata('booking'); ?>
							</div>
							<?php
						}
						?>
						<p class="">All fields mark <i class="text-danger">*</i> are compulsory.<br></p>
						<form method="POST" action="<?php echo site_url().'user/add_booking' ?>" enctype="multipart/form-data">
							<div class="row">
								<div class="col-lg-6">

									<div class="form-group">
										<label for="email">From:</label><i class="text-danger">*</i>
										<input type="text" class="form-control" id="address_from" name="address_from" value="" placeholder="Pick up address">
									</div>

									<div class="form-group">
										<label for="landmark">Landmark:</label><i class="text-danger">*</i>
										<input type="text" class="form-control" id="landmark_from" name="landmark_from" value="" placeholder="Nearest landmark">
									</div>

									<div class="form-group">
										<label for="password_confirm">State</label><i class="text-danger">*</i>
										<select class="form-control" type="text" name="location_from" id="location_from">
											<option class="form-control">Select Here</option>
										</select>
									</div>

									<div class="form-group">
										<label class="" for="">Type of vehicle:</label></br>
										<label>Van</label>: <input id="vehicle_type"  type="radio" class="" name="vehicle_type" value="Van" >
										<label>Truck</label>: <input id="vehicle_type" type="radio" class="" name="vehicle_type" value="Truck" >
									</div>

									<div class="form-group">
										<label for="email">Description:</label><i class="text-danger">*</i>
										<textarea class="form-control" name="description"></textarea>
									</div>



								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label for="to">To:</label><i class="text-danger">*</i>
										<input type="text" class="form-control" id="address_to" name="address_to" value="" placeholder="Delivery address">
									</div>
									<div class="form-group">
										<label for="landmark">Landmark:</label><i class="text-danger">*</i>
										<input type="text" class="form-control" id="landmark_to" name="landmark_to" value="" placeholder="Nearest landmark">
									</div>
									<div class="form-group">
										<label for="password_confirm">State</label><i class="text-danger">*</i>
										<select class="form-control" type="text" name="location_to" id="location_to">
											<option class="form-control">Select Here</option>
										</select>
									</div>

									<div class="form-group">
										<label class="" for="">Category:</label></br>

										<label>Fragile</label>: <input id="category"  type="radio" class="" name="category" value="Fragile" >
										<label>Perishable</label>: <input id="category" type="radio" class="" name="category" value="Perishable" >
										<label>Non-perishable</label>: <input id="category" type="radio" class="" name="category" value="Non-perishable" >
									</div>

									<div class="form-group">
										<label for="weight">Weight:</label><i class="text-danger">*</i>
										<input type="text" class="form-control" id="weight" name="weight" value="" placeholder="Weight of item">
									</div>

									<div class="form-group">
										<label>Upload an image</label><br>
										<small class="text-dark"> jpeg / jpg / png. Max size: 5mb</small>
										<input type="file"  name="image" value=''   class="form-control" placeholder="jpg/jpeg/png">
									</div>
									<br>
									<input type="hidden" name="status" id="status" value="Pending">

									<div class="form-group">
										<button type="submit" class="btn btn-primary" name="submit">Add Booking</button>
									</div>

								</div><!-- col-4-->
							</div><!--row-->

						</form>
					</div>

				</div>
			</div>

		</div>
	</div>
</div>
<br>
