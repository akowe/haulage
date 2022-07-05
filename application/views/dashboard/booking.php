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
					   href="javascript:void(0)">&nbsp; Bookings</a>

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
					<div class="bg-light  rounded table-responsive dataTable">

						<div class="col-12 ">
							<div class="mb-3 py-2 w-100 d-flex">
								<h4
										class=""
										style="color: var(--modified-text-color)"
								>Recent Bookings</h4
								>

							</div>
							<table class="table table-striped " id="dataTable" >
								<thead class="thead-light">
								<tr class="px-2">
									<th class="small font-weight-bold">Date</th>
									<th class="small font-weight-bold">Pickup</th>
									<th class="small font-weight-bold">Delivery</th>
									<th class="small font-weight-bold">Vehicle</th>
									<th class="small font-weight-bold">Description</th>
									<th class="small font-weight-bold">Weight</th>
									<th class="small font-weight-bold">Category</th>
									<th class="small font-weight-bold">Item</th>
									<th class="small font-weight-bold">Status</th>
								</tr>
								</thead>
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
											<a href="<?php echo base_url().'uploads/'. $row->image ;?>" download style="cursor: pointer;">
												<?php
												echo '<img src=' . base_url() . "uploads/" . $row->image . '  width="40px" height="40px" >';
												?></a>
										</td>

										<td class="small"><small
													style="background-color: var(--modified-success)"
													class="rounded p-1 text-white "
											><?php echo $row->status;?></small
											></td>

									</tr>
								<?php }
								?>

								</tbody>
							</table>
						</div>

					</div><!-- col-12-->
					<?php }?>
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
		$('#dataTable').DataTable( {
			responsive: true,

			dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
					"<'row'<'col-sm-12'tr>>" +
					"<'row'<'col-sm-5'i><'col-sm-7'p>>",
			// dom: 'Bfrtip',
			buttons: [
				'copyHtml5',
				'excelHtml5',
				'csvHtml5',
				'pdfHtml5',
				{

					extend: 'print', customize: function ( win ) {
						$(win.document.body)
						// exportOptions: {
						//   columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
						// }
					}
				}
			],

			aLengthMenu: [
				[10, 25, 50, 100, -1],
				[10, 25, 50, 100, "All"]
			],
			iDisplayLength: 10,
			"order": [[0, "desc"]],

			"language": {
				"lengthMenu": "_MENU_ records per page",
			}


		});
	});


	// customize print dataTable
	// $(document).ready(function() { $('#dataTable').DataTable( { dom: 'Bfrtip', buttons: [ { extend: 'print', customize: function ( win ) { $(win.document.body) .css( 'font-size', '10pt' ) .prepend( '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />' ); $(win.document.body).find( 'table' ) .addClass( 'compact' ) .css( 'font-size', 'inherit' ); } } ] } ); } );

</script>


