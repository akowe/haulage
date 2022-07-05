<div id="layoutSidenav_content">
	<main>
		<!-- Begin Page Content -->
		<div class="container-fluid">
			<!-- Page Heading -->
			<div class="row">
				<div class="col-lg-12">
					<h4 class=" mb-2 text-gray-800">All Bookings</h4>
					<p class="mb-4"></p>
				</div>
			</div>
		</div>

		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h5 class="mb-2 text-gray-800">Recent Bookings</h5>
							<h4 class="text-primary float-right"><a href="add_booking" title="Add New Booking" alt="Add New Booking"><i class="fa fa-plus-square"></i></a></h4>
						</div>

					<!-- Area Table -->

						<div class="card-body">
							<div class="table-responsive" >
								<table  class="table table-striped" id="dataTable" width="100%" >
									<thead><tr>
										<th class="small font-weight-bold">Date</th>
										<th class="small font-weight-bold">Email</th>
										<th class="small font-weight-bold">Name</th>
										<th class="small font-weight-bold">Phone</th>
										<th class="small font-weight-bold">Pickup Address</th>
										<th class="small font-weight-bold">Delivery Address</th>
										<th class="small font-weight-bold">Vehicle</th>
										<th class="small font-weight-bold">Description</th>
										<th class="small font-weight-bold">Weight</th>
										<th class="small font-weight-bold">Category</th>
										<th class="small font-weight-bold">Item</th>
										<th class="small font-weight-bold">Status</th>
									</tr></thead>

									<?php
									//foreach ($h->result() as $row)
									{

									?>
									<tbody>
									<?php
									foreach ($b->result() as $row) {

										?>

										<tr>
											<td class="small"><?php echo $row->date;?></td>
											<td class="small"><?php echo $row->email;?></td>
											<td class="small"><?php echo $row->fname;?> <?php echo $row->lname;?></td>
											<td class="small"><?php echo $row->phone;?></td>
											<td class="small"><?php echo $row->address_from;?>
											<br>Landmark: <?php echo $row->landmark_from;?>
											<br>State: <?php echo $row->location_from;?>
											</td>
											<td class="small"><?php echo $row->address_to;?>
												<br>Landmark: <?php echo $row->landmark_to;?>
												<br>State: <?php echo $row->location_to;?>
											</td>

											<td class="small"><?php echo $row->vehicle_type;?></td>
											<td class="small"><?php echo $row->description;?></td>
											<td class="small"><?php echo $row->weight;?></td>
											<td class="small"><?php echo $row->category;
												?> </td>
											<td>
												<?php
												echo '<img src=' . base_url() . "uploads/" . $row->image . '  width="150px" height="100px" ';
												?>
											</td>

											<td class="small"><?php echo $row->status;?></td>

										</tr>
									<?php }
									?>

									</tbody>
								</table>

							</div><!-- col-12-->
							<?php }?>


						</div><!-- End Content Row -->
					</div>
				</div>
			</div>
	</main>
</div>

<script>
	$(document).ready(function() {
		$('#dataTable').DataTable( {

			buttons: [
				'copy', 'csv', 'excel', 'pdf', 'print'
			]
		} );
	} );
</script>
