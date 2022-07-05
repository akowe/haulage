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
					   href="javascript:void(0)">&nbsp; Raise Invoice</a>

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
					<div class="bg-light rounded">

							<?php
							if(validation_errors()){
								?>
								<div class="alert alert-info text-center">
									<?php echo validation_errors(); ?>
								</div>
							<?php }
							if($this->session->flashdata('invoice')){
								?>
								<div class="alert alert-info text-center">
									<?php echo $this->session->flashdata('invoice'); ?>
								</div>
								<?php
							}
							?>


						<?php
						// All users list
						if(isset($view) && $view == 1)  {
							?>

							<form>
								<?php
								$sno = 1;
								foreach($response as $val){
									echo '
                 			
                 <br>
						&nbsp; &nbsp; <a style="background-color: var(--modified-orange)" class="btn text-white" href="'.site_url().'admin/create_invoice?edit='.$val['id'].'" class="text-white">Create Invoice  For '.$val['fname'].' '.$val['lname'].'</a> 
					
                      <br><br>
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
						<div class="container-fluid">
							<div class="row">
								<div class="col-12">
									<h5 >Invoice Preview: <span class="text-primary"></span> </h5>

								</div>
								<div class="col-12" style="">
									<form method='post' action=''>
										<div class="row">
											<div class="col-6">
												<p>Billing to: <br>
													<?php echo $response['fname']; ?> <?php echo $response['lname']; ?>
													<br>
												</p>
											</div>

											<div class="col-6">
												<p><strong>Pickup</strong>:
													<?php echo $response['address_from']; ?>, <?php echo $response['location_from']; ?>
													<br>
													<strong>Drop off:</strong>
													<?php echo $response['address_to']; ?>, <?php echo $response['location_to']; ?>
												</p>
												<h6>Invoice No. H00<?php echo $response['id']; ?></h6>
											</div>

											<div class="col-12 table-responsive ">
												<table class="table">
													<thead class="thead-light">
													<tr class="px-2">
														<th class="small font-weight-bold">Date</th>
														<th class="small font-weight-bold">Item</th>
														<th class="small font-weight-bold">Weight</th>
														<th class="small font-weight-bold">Category</th>
														<th class="small font-weight-bold">Vehicle</th>
														<th class="small font-weight-bold">Amount</th>
													</tr>

													<tr>
														<td><?php echo $response['date']; ?></td>
														<td><?php echo $response['description']; ?></td>
														<td><?php echo $response['weight']; ?></td>
														<td><?php echo $response['category']; ?></td>
														<td><?php echo $response['vehicle_type']; ?>
														</td>
														<td>


															<input type="hidden"  name="email" value='<?php echo $response['email']; ?>'   class="form-control" readonly>
															<input type="hidden"  name="fname" value='<?php echo $response['fname']; ?>'   class="form-control" readonly>
															<input type="hidden"  name="lname" value='<?php echo $response['lname']; ?>'   class="form-control" readonly>
															<input type="hidden"  name="phone" value='<?php echo $response['phone']; ?>'   class="form-control" readonly>
															<input type="hidden"  name="address_from" value='<?php echo $response['address_from']; ?>'   class="form-control" readonly>
															<input type="hidden"  name="address_to" value='<?php echo $response['address_to']; ?>'   class="form-control" readonly>
															<input type="hidden"  name="location_from" value='<?php echo $response['location_from']; ?>'   class="form-control" readonly>
															<input type="hidden"  name="location_to" value='<?php echo $response['location_to']; ?>'   class="form-control" readonly>
															<input type="hidden"  name="landmark_from" value='<?php echo $response['landmark_from']; ?>'   class="form-control" readonly>
															<input type="hidden"  name="landmark_to" value='<?php echo $response['landmark_to']; ?>'   class="form-control" readonly>
															<input type="hidden"  name="vehicle_type" value='<?php echo $response['vehicle_type']; ?>'   class="form-control" readonly>
															<input type="hidden"  name="description" value='<?php echo $response['description']; ?>'   class="form-control" readonly>
															<input type="hidden"  name="weight" value='<?php echo $response['weight']; ?>'   class="form-control" readonly>
															<input type="hidden"  name="category" value='<?php echo $response['category']; ?>'   class="form-control" readonly>


															<input type="hidden"  name="invoice_id" value='<?php echo$response['id']; ?>'  id="invoice_id"  class="form-control">

															<input type="text"  name="amount" value=''  id="amount"  class="form-control" placeholder="Enter Amount" oninput="total_amount()">
															<br>
<!--															<label class="font-weight-bold">Vat: 7.5%</label>-->
<!--															<input type="text"  name="vat" value=''  id="vat"  class="form-control" placeholder="7.5% of the amount entered" oninput="total_amount()">-->

															<label class="font-weight-bold">Total</label> <input type="text"  name="total" value=''  id="total"  class="form-control" readonly oninput="total_amount()">
															<br>
															<div class="form-group">
																<input type='submit' name='submit' value='Create Invoice' class="btn btn-primary" >
															</div>


														</td>
													</tr>
													</thead>
												</table>

											</div>
										</div>

										<input type="hidden"  name="invoice_id" value='<?php echo $response['id']; ?>'   class="form-control" readonly>
										<input type="hidden"  name="email" value='<?php echo $response['email']; ?>'   class="form-control" readonly>
										<input type="hidden"  name="fname" value='<?php echo $response['fname']; ?>'   class="form-control" readonly>
										<input type="hidden"  name="lname" value='<?php echo $response['lname']; ?>'   class="form-control" readonly>
										<input type="hidden"  name="phone" value='<?php echo $response['phone']; ?>'   class="form-control" readonly>
										<input type="hidden"  name="address_from" value='<?php echo $response['address_from']; ?>'   class="form-control" readonly>
										<input type="hidden"  name="address_to" value='<?php echo $response['address_to']; ?>'   class="form-control" readonly>
										<input type="hidden"  name="location_from" value='<?php echo $response['location_from']; ?>'   class="form-control" readonly>

										<input type="hidden"  name="location_to" value='<?php echo $response['location_to']; ?>'   class="form-control" readonly><div class="form-group">
											<input type="hidden"  name="vehicle_type" value='<?php echo $response['vehicle_type']; ?>'   class="form-control" readonly>
											<input type="hidden"  name="description" value='<?php echo $response['description']; ?>'   class="form-control" readonly>
											<input type="hidden"  name="weight" value='<?php echo $response['weight']; ?>'   class="form-control" readonly>
											<input type="hidden"  name="category" value='<?php echo $response['category']; ?>'   class="form-control" readonly>
										</div>

									</form>
									<?php
									}
									?>



								</div><!-- col-12-->
							</div>
					</div><!--container-->


				</div>
				</div>
			</div><!--col-10-->
		</div><!--row-->
	</div><!--container-->
</div>



<script>
	// Call the dataTables jQuery plugin
	$(document).ready(function() {
		$('#dataTable').DataTable({
			"order": [ 1, "desc" ]
		});

	});


</script>


<script>
	function total_amount(){
		var amount = document.getElementById('amount').value;
		// var vat = document.getElementById('vat'). value;



		// var per = parseInt(amount) * 7.5 / 100;
		// var add_vat = parseInt(per);
		// document.getElementById('vat'). value = add_vat
		// var added = parseInt(amount) + parseInt(add_vat);
		var added = parseInt(amount)


		document.getElementById('total').value = added;

	}
</script>
