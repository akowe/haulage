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
					   href="javascript:void(0)">&nbsp; All Locations</a>

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
					<!-- top nav -->
					<!-- end top nav -->
					<!--  Show case -->
					<div class="rounded " style="background: var(--brighter-blue); margin-top: -40px;">
						<div class="col-12">
							&nbsp;
						</div><!-- col 12 -->

						<div class=" text-center w-25">
						</div>

					</div><!-- blue div row -->

					<!-- Summary -->


					<!-- Recent orders  -->
					<div class="bg-light rounded  table-responsive dataTable">

						<div class="col-12 ">
							<div class="mb-3 py-2 w-100 d-flex">
              <span
					  class="flex-grow-1 px-3 py-1 start"
					  style="color: var(--modified-text-color)"
			  >Add New Location</span
			  >
								</span></div>

						</div><!-- container-->

						<div class="container">
							<div class="row">
								<div class="col-6">
									<form method="POST" action="<?php echo site_url().'admin/locationfrom' ?>">
										<div class="form-group">
											<label for="email">From:</label><i class="text-danger">*</i>
											<input type="text" class="form-control" id="state" name="state" value="" placeholder="Pick States">
										</div>

										<div class="form-group">
											<button type="submit" class="btn btn-primary" name="submit">Add</button>
										</div>
									</form>


								</div>


								<div class="col-6">
									<form method="POST" action="<?php echo site_url().'admin/locationto' ?>"">
									<div class="form-group">
										<label for="to">To:</label><i class="text-danger">*</i>
										<input type="text" class="form-control" id="state" name="state" value="" placeholder="Delivery States">
									</div>

									<div class="form-group">
										<button type="submit" class="btn btn-primary" name="submit">Add</button>
									</div>
									</form>

								</div><!-- col-6-->

							</div><!--row-->
						</div>

						<div class="container">

							<div class="row">

								<div class="col-6">

									<table  class="table table-striped" id="dataTable">
										<thead><tr>
											<th>S/N</th>
											<th class="small font-weight-bold">From</th>
										</tr></thead>
										<?php
										//foreach ($h->result() as $row)
										{?>
										<tbody>
										<?php
										foreach ($f->result() as $row) {
											?>
											<tr>
												<td><?php echo $row->id;?></td>
												<td class="small"><?php echo $row->state;?></td>
											</tr>
										<?php }
										?>
										</tbody>
									</table>
								</div>
								<?php }?>



								<div class="col-6">

									<table  class="table table-striped" id="dataTable2">
										<thead><tr>
											<th>S/N</th>
											<th class="small font-weight-bold">From</th>
										</tr></thead>
										<?php
										//foreach ($h->result() as $row)
										{?>
										<tbody>
										<?php
										foreach ($t->result() as $row) {
											?>
											<tr>
												<td><?php echo $row->id;?></td>
												<td class="small"><?php echo $row->state;?></td>
											</tr>
										<?php }
										?>
										</tbody>
									</table>
								</div>
								<?php }?>


							</div><!-- row-->

				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<!--		<div class="row">-->
		<!--			<div class="col-lg-12">-->
		<!--				<p><br><br><br></p>-->
		<!--			</div>-->
		<!--		</div>-->
		<!---->

	</div>
</div>
</div>
</div>
<script>
	// Call the dataTables jQuery plugin
	$(document).ready(function() {
		$('#dataTable').DataTable({
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

	$(document).ready(function() {
		$('#dataTable2').DataTable({
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



</script>
