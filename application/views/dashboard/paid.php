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
					   href="javascript:void(0)">&nbsp; Confirm Payment</a>

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
						<?php }
						if($this->session->flashdata('paid')){
							?>
							<div class="alert alert-info text-center">
								<?php echo $this->session->flashdata('paid'); ?>
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
                 				 <h4 class="mb-2 text-gray-800">Confirm &nbsp; '.$val['fname'].'  '.$val['lname'].' &nbsp; Payment? </h4>
                 
					<a style="background-color: var(--modified-orange)" class="btn text-white" href="'.site_url().'admin/paid?edit='.$val['id'].'" class="text-white">Confirm</a> 
				
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
								<h5 >Confirm payment for  </h5><?php echo $response['fname']; ?> <?php echo $response['lname']; ?>

							</div>
							<div class="col-12" style="">
								<form method='post' action=''>
									<div class="row">

										<div class="col-12">
											<table class="table ">
												<thead class="thead-light">
												Invoice ID H00<?php echo $response['invoice_id']; ?>


												<tr>
													<td>
														<div class="form-group">
															<input type="hidden"  name="email" value='<?php echo $response['email']; ?>'   class="form-control">
															<input type="hidden"  name="invoice_id" value='<?php echo $response['invoice_id']; ?>'   class="form-control">
															<input type="text"  name="invoice_status" value='Paid'   class="form-control" readonly>
															<input type="hidden"  name="status" value='Confirmed'   class="form-control" >
														</div>
														<div class="form-group">
															<input type='submit' name='submit' value='Paid Invoice' class="btn btn-primary" >
														</div>


													</td>
												</tr>
												</thead>
											</table>
										</div>
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



