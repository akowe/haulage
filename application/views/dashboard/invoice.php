<style>

	#invoice{
		padding: 30px;
		font-family: "sans-serif";
	}

	.invoice {
		position: relative;
		background-color: #FFF;
		height: 100%;
		font-family: "sans-serif";
	}

	.invoice header {
		padding: 10px 0;
		margin-bottom: 20px;
		border-bottom: 1px solid #3989c6;
		font-family: "sans-serif";
	}

	.invoice .company-details {
		text-align: right;
		font-family: "sans-serif";
	}

	.invoice .company-details .name {
		margin-top: 0;
		margin-bottom: 0;
		font-family: "sans-serif";
	}

	.invoice .contacts {
		margin-bottom: 20px
	}

	.invoice .invoice-to {
		text-align: left;
		font-family: "sans-serif";
	}

	.invoice .invoice-to .to {
		margin-top: 0;
		margin-bottom: 0
	}

	.invoice .invoice-details {
		text-align: right;
		font-family: "sans-serif";
	}

	.invoice .invoice-details .invoice-id {
		margin-top: 0;
		color: #3989c6;
		font-family: "sans-serif";
	}

	.invoice main {
		padding-bottom: 50px;
		font-family: "sans-serif";
	}

	.invoice main .thanks {
		margin-top: -100px;
		font-size: 2em;
		margin-bottom: 50px;
		font-family: "sans-serif";
	}

	.invoice main .notices {
		padding-left: 6px;
		border-left: 6px solid #3989c6;
		font-family: "sans-serif";
	}

	.invoice main .notices .notice {
		font-size: 1.2em;
		font-family: "sans-serif";
	}

	.invoice table {
		width: 100%;
		border-collapse: collapse;
		border-spacing: 0;
		margin-bottom: 20px;
		font-family: "sans-serif";
	}

	.invoice table th {
		padding: 15px;
		background: #eee;
		font-weight: 600;
		font-size: 14px;
		border-bottom: 1px solid #fff;
		font-family: "sans-serif";
	}

	.invoice table th {
		font-weight: 600;
		font-size: 14px;
		font-family: "sans-serif";
	}

	.invoice table td h3 {
		margin: 0;
		font-weight: 400;
		color: #3989c6;
		font-size: 14px;
		font-family: "sans-serif";
	}

	.invoice table .qty,.invoice table .total,.invoice table .unit {
		text-align: right;
		font-size: 12px;
		font-family: "sans-serif";
	}

	.invoice table .no {
		color: #fff;
		font-size: 12px;
		background: #3989c6;
		font-family: "sans-serif";
	}

	.invoice table .unit {
		background: #ddd;
		font-family: "sans-serif";
	}

	.invoice table .total {
		font-size: 14px;
		font-family: "sans-serif";
	}

	.invoice table tbody tr:last-child td {
		border: none;

	}

	.invoice table tfoot td {
		background: 0 0;
		border-bottom: none;
		text-align: right;
		padding: 10px 20px;
		font-size: 12px;
		border-top: 1px solid #aaa
	}

	.invoice table tfoot tr:first-child td {
		border-top: none
	}

	.invoice table tfoot tr:last-child td {
		color: #3989c6;
		font-size: 12px;
		border-top: 1px solid #3989c6;
	}

	.invoice table tfoot tr td:first-child {
		border: none
	}

	.invoice footer {
		width: 100%;
		text-align: center;
		color: #777;
		border-top: 1px solid #aaa;
		padding: 8px 0;
	}

	@media print {
		.invoice {
			font-size: 14px!important;
			overflow: hidden!important
		}

		.invoice footer {
			position: absolute;
			bottom: 10px;
			page-break-after: always;
		}

		.invoice>div:last-child {
			page-break-before: always;
		}
	}


	@media print {
		body * {
			visibility: hidden;
		}
		#invoice, #invoice * {
			visibility: visible;
		}
		#invoice {
			position: absolute;
			left: 0;
			top: 0;
		}
	}


</style>
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
					   href="javascript:void(0)">&nbsp; Invoice</a>

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


						<div class=" text-center w-25">
						</div>

					</div><!-- blue div row -->

					<!-- Summary -->


					<!-- Recent orders  -->
					<div class="bg-light  rounded">
						<!--						<a class="btn btn-info btn-lg" onclick="window.print('invoice');"><i class="fa fa-print"></i>Print </a>-->
						<!--						<a href="javascript:void(0);" id="printButton">Print</a>-->
						<div class="col-12"  >
							<a class="btn text-white float-right"  style=" background-color: var(--modified-orange);" onclick="printDiv('invoice')"><i class="fa fa-print"></i>Print </a>

							<a class="btn float-right text-primary" onclick="getPDF();"><i class="fa fa-down"></i>Download Invoice</a>


						</div>



						<div class="container-fluid canvas_div_pdf " id="invoice" >
							<div class="row">
								<div class="col-lg-12 text-center"  >
									<br>
									<a href="<?php echo site_url()?>" target="_blank">	<img
												src="<?php echo base_url().'assets/admin/images/logo-footer.svg' ?>"
												data-holder-rendered="true"
										/></a>
									<p>1224 Bishop Oluwole Street, Victoria Island, Lagos<br>
										Email: sales@hauleasy.biz
									</p>
								</div>

							</div>


							<div class="row" >
								<div class="col-lg-1">
								</div>

								<div class="col-lg-10 invoice table-responsive" >

									<?php foreach ($b as $row) : ?>

										<div class="row">
											<div class="col invoice-to">
												<div class="text-gray-light text-dark">BILL TO:</div>
												<h4 class="to" style="text-transform: capitalize;"><?= $row['fname']; ?> &nbsp;<?= $row['lname']; ?></h4>
												<div class="address text-dark"><?= $row['phone']; ?></div>
												<div class="email text-dark"><a href="mailto:<?= $row['email']; ?>" style="color:#000000;"><?= $row['email']; ?></a></div>
											</div>


											<div class="col invoice-details">
												<h1 class="invoice-id font-weight-bold" style="font-family:SF Pro Display;"><?= $row['invoice_status']; ?></h1>
												<div class="text-dark">Invoice No.: <?php echo'H00';?><?= $row['invoice_id']; ?></div>
												<div class="date text-dark">Date: <?= $row['date']; ?></div>
											</div>
										</div>
										<br>
									<?php endforeach ?>
									<table class=" table table-bordered">
										<thead >
										<tr style="text-align: left!important;">
											<th style="text-align: left!important; font-family:SF Pro Display;">Description</th>
											<th style="text-align: left!important; font-family:SF Pro Display;">Weight</th>
											<th style="text-align: left!important; font-family:SF Pro Display;">Category</th>
											<th style="text-align: left!important; font-family:SF Pro Display;">Vehicle</th>
											<th style="text-align: left!important; font-family:SF Pro Display;">Amount</th>
										</tr>
										</thead>
										<tbody>
										<tr style="font-size: 12px;">
											<td class="text-dark"><strong>Item:</strong> &nbsp;<?= $row['description']; ?>
												<br>
												<strong>Pickup </strong>:
												<?= $row['address_from']; ?>,<br>
												<strong>State:</strong> <?= $row['location_from']; ?>.<br>
												<strong>Landmark:</strong> <?= $row['landmark_from']; ?>

												<p class="text-dark">
													<br>
													<strong>Drop-off: </strong>
													<?= $row['address_to']; ?>,<br>
													<strong>State:</strong> <?= $row['location_to']; ?>.<br>
													<strong>Landmark:</strong>  <?= $row['landmark_from']; ?><br>
												</p>
											</td>
											<td class="text-dark" >
												<?= $row['weight']; ?>
											</td>
											<td class="text-dark"><?= $row['category']; ?></td>
											<td class="text-dark"><?= $row['vehicle_type']; ?></td>
											<td class="text-dark">₦<?= $row['amount']; ?></td>
										</tr>

										<tr style="padding:0 !important;" class="table-dark">
											<td></td>
											<td></td>
											<td ></td>
											<td style="padding:0 !important; " class="text-dark">
<!--												VAT 7.5%: <br>-->
												<strong>TOTAL: </strong></td>
											<td style="padding:0 !important;" class="text-dark">
<!--												₦--><?//= $row['vat']; ?><!--<br>-->
												<strong> ₦<?= $row['total']; ?></strong>

											</td>
										</tr>

										</tbody>
									</table>
								</div><!--col-10-->
								<div class="col-lg-1">
								</div>
							</div>

						</div><!-- col-12-->

					</div><!-- row-->

				</div>
			</div>
		</div>
	</div>

</div>

<!--<div class="container-fluid">-->
<!--	<div class="row">-->
<!--		<div class="col-lg-12">-->
<!--			<p><br><br><br></p>-->
<!--		</div>-->
<!--	</div>-->
<!---->
<!--</div>-->


<script  src="<?php echo base_url().'assets/js/custom-jquery.js';?>"></script>
<script  src="<?php echo base_url().'assets/js/printjs.js';?>"></script>
<script>
	$(document).ready(function(){
		$("#printButton").click(function(){
			var mode = 'iframe'; //popup
			var close = mode == "popup";
			var options = { mode : mode, popClose : close};
			$("div.printableArea").printArea( options );
		});
	});
</script>
<script type="text/javascript">
	function printDiv(invoice) {
		var printContents = document.getElementById(invoice).innerHTML;
		var originalContents = document.body.innerHTML;
		document.body.innerHTML = printContents;
		document.body.innerHTML = originalContents;
		window.print();
	}
</script>

<script >
	function getPDF(){

		var HTML_Width = $(".canvas_div_pdf").width();
		var HTML_Height = $(".canvas_div_pdf").height();
		var top_left_margin = 15;
		var PDF_Width = HTML_Width+(top_left_margin*2);
		var PDF_Height = (PDF_Width*1.5)+(top_left_margin*2);
		var canvas_image_width = HTML_Width;
		var canvas_image_height = HTML_Height;

		var totalPDFPages = Math.ceil(HTML_Height/PDF_Height)-1;


		html2canvas($(".canvas_div_pdf")[0],{allowTaint:true}).then(function(canvas) {
			canvas.getContext('2d');

			console.log(canvas.height+"  "+canvas.width);


			var imgData = canvas.toDataURL("image/jpeg", 1.0);
			var pdf = new jsPDF('p', 'pt',  [PDF_Width, PDF_Height]);
			pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin,canvas_image_width,canvas_image_height);


			for (var i = 1; i <= totalPDFPages; i++) {
				pdf.addPage(PDF_Width, PDF_Height);
				pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
			}

			pdf.save("booking_invoice.pdf");
		});
	};
</script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

