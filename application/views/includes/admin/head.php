<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Hauleasy</title>
	<base href="/" />

	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link
			href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7COpen+Sans:400,700,800"
			rel="stylesheet"
			type="text/css"
	/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" type="image/png" href="<?php echo base_url().'assets/admin/images/icon.png' ?>" />
	<!--  CSS -->

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="<?php echo base_url() .'assets/admin/vendor/bootstrap/css/bootstrap.css'?>">
	<link rel="stylesheet" href="<?php echo base_url() .'assets/admin/vendor/fontawesome-free/css/all.min.css'?>">

	<link rel="stylesheet" href="<?php echo base_url() .'assets/admin/css/skins/default.css'?>">
	<link rel="stylesheet" href="<?php echo base_url() .'assets/admin/css/skins/skin-app-landing.css'?>">
	<link rel="stylesheet" href="<?php echo base_url() .'assets/admin/css/skins/skin-landing.css'?>">
	<link rel="stylesheet" href="<?php echo base_url() .'assets/admin/css/theme.css'?>">
	<link rel="stylesheet" href="<?php echo base_url() .'assets/admin/css/theme-elements.css'?>">
	<link rel="stylesheet" href="<?php echo base_url() .'assets/admin/css/theme-blog.css'?>">
	<link rel="stylesheet" href="<?php echo base_url() .'assets/admin/css/theme-shop.css'?>">
	<link rel="stylesheet" href="<?php echo base_url() .'assets/admin/vendor/animate/animate.min.css'?>">

	<!--	<link rel="stylesheet" href="--><?php //echo base_url() .'assets/admin/vendor/owl.carousel/owl.carousel.css'?><!--">-->
<!--	<link rel="stylesheet" href="--><?php //echo base_url() .'assets/admin/vendor/owl.carousel/owl.theme.default.css'?><!--">-->

	<!-- Custom styles for this template -->
	<!-- Jquery date picker styles for this template-->
		<link href="<?php echo base_url(). 'assets/admin/DataTables/datatables.css'; ?> " rel="stylesheet">
		<link href="<?php echo base_url(). 'assets/admin/DataTables/DataTables-1.10.23/css/dataTables.jqueryui.css'; ?>  " rel="stylesheet">
		<link href="<?php echo base_url(). 'assets/admin/vendor/datatables/dataTables.bootstrap4.css'; ?> " rel="stylesheet">


	<!--fonts-->
	<link  href="<?php echo base_url() .'assets/css/fonts/Cubano.woff'?>">
	<link  href="<?php echo base_url() .'assets/css/fonts/SF-Pro-Display-Bold.woff'?>">
	<link href="<?php echo base_url() .'assets/css/fonts/SF-Pro-Display-Light.woff'?>">
	<link  href="<?php echo base_url() .'assets/css/fonts/SF-Pro-Display-Medium.woff'?>">
	<link  href="<?php echo base_url() .'assets/css/fonts/SF-Pro-Display-Regular.woff'?>">


	<link rel="stylesheet" href="<?php echo base_url() .'assets/admin/css/styles.css'?>">
	<link rel="stylesheet" href="<?php echo base_url() .'assets/admin/css/custom.css'?>">

	<!-- dataTables Pagination level custom scripts -->
<!--	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
<!--	<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"> </script>-->
	<script src="<?php echo base_url(). 'assets/admin/js/demo/datatables-demo.js'; ?> "></script>
	<script src="<?php echo base_url() .'assets/admin/js/jquery-2.1.3.min.js'?>"></script>
	<script src="<?php echo base_url() .'assets/admin/js/dataTables.min.js'?>"></script>
	<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>

	<style>
	.navbar {
		padding: 15px 10px;
		/*background: #fff;*/
		border: none;
		border-radius: 0;
		margin-bottom: 40px;
		/*box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);*/
	}

	.navbar-btn {
		box-shadow: none;
		outline: none !important;
		border: none;
	}

	.line {
		width: 100%;
		height: 1px;
		border-bottom: 1px dashed #ddd;
		margin: 40px 0;
	}

	/* ---------------------------------------------------
		SIDEBAR STYLE
	----------------------------------------------------- */

	.wrapper {
		display: flex;
		width: 100%;
		align-items: stretch;
	}

	#sidebar {
		min-width: 180px;
		max-width: 180px;
		background: #ffffff;
		transition: all 0.3s;
	}

	#sidebar.active {
		margin-left: -180px;
	}

	#sidebar .sidebar-header {
		padding: 20px;
		background: #ffffff;
	}

	#sidebar ul.components {
		padding: 20px 0;
		border-bottom: 1px;
	}

	#sidebar ul p {

		padding: 10px;
	}

	#sidebar ul li a {
		padding: 10px;
		font-size: 14px;
		display: block;
	}

	#sidebar ul li a:hover {
		background: #fff;
	}

	#sidebar ul li.active>a,
	a[aria-expanded="true"] {
		color: #fff;

	}

	a[data-toggle="collapse"] {
		position: relative;
	}

	.dropdown-toggle::after {
		display: block;
		position: absolute;
		top: 50%;
		right: 20px;
		transform: translateY(-50%);
	}

	ul ul a {
		font-size: 0.9em !important;
		padding-left: 30px !important;

	}

	ul.CTAs {
		padding: 20px;
	}

	ul.CTAs a {
		text-align: center;
		font-size: 0.9em !important;
		display: block;
		border-radius: 5px;
		margin-bottom: 5px;
	}

	a.download {
		background: #fff;

	}

	a.article,
	a.article:hover {

		color: #fff !important;
	}

	/* ---------------------------------------------------
		CONTENT STYLE
	----------------------------------------------------- */

	#content {
		width: 100%;
		padding-top: 0;
		padding-bottom: 20px;
		padding-right: 0;
		padding-left: 0;
		min-height: 100%;
		/*transition: all 0.3s;*/
	}

	/* ---------------------------------------------------
		MEDIAQUERIES
	----------------------------------------------------- */

	@media (max-width: 768px) {
		#sidebar {
			margin-left: -180px;
		}
		#sidebar.active {
			margin-left: 0;
		}
		#sidebarCollapse span {
			display: none;
		}
	}
	button.dt-button, div.dt-button, a.dt-button {
		position: relative;
		display: inline-block;
		box-sizing: border-box;
		margin-right: 0.333em;
		padding: 0.2em 1em;
		border: 1px solid #999;
		border-radius: 2px;
		cursor: pointer;
		font-size: 0.88em;
		color: black;
		white-space: nowrap;
		overflow: hidden;
		background-color: #e9e9e9;
		background-image: -webkit-linear-gradient(top, #fff 0%, #e9e9e9 100%);
		background-image: -moz-linear-gradient(top, #fff 0%, #e9e9e9 100%);
		background-image: -ms-linear-gradient(top, #fff 0%, #e9e9e9 100%);
		background-image: -o-linear-gradient(top, #fff 0%, #e9e9e9 100%);
		background-image: linear-gradient(to bottom, #fff 0%, #e9e9e9 100%);
	}

</style>
	<script>
		$(document).ready(function () {
			$('#sidebarCollapse').on('click', function () {
				$('#sidebar').toggleClass('active');
			});
		});
	</script>


</head>
<body
		class="loading-overlay-showing"
		data-plugin-page-transition
		data-loading-overlay
		data-plugin-options="{'hideDelay': 500}"

>
<!--<div class="loading-overlay">-->
<!--	<div class="bounce-loader">-->
<!--		<div class="bounce1"></div>-->
<!--		<div class="bounce2"></div>-->
<!--		<div class="bounce3"></div>-->
<!--	</div>-->
<!--</div>-->

<div
		class="body"
		style=" background-color: #FAFAFA !important;"
		data-spy="scroll"
		data-target=".nav-pills"
>
<!--	<app-root></app-root>-->
</div>
</body>
</html>






