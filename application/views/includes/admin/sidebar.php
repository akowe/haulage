<div class="wrapper">
	<!-- Sidebar admin view -->
	<?php if($this->session->userdata('user_type')==='admin'):?>
	<nav id="sidebar">
		<div class="sidebar-header">
			<img
					src="<?php echo base_url().'assets/admin/images/logo-dashboard.svg' ?>"
					width="150"
					alt=""
			/>
		</div>

		<ul class="components">
<!--			<p>Dummy Heading</p>-->
<!--			<li class="active">-->
<!--				<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>-->
<!--				<ul class="collapse list-unstyled" id="homeSubmenu">-->
<!--					<li>-->
<!--						<a href="#">Home 1</a>-->
<!--					</li>-->
<!--					<li>-->
<!--						<a href="#">Home 2</a>-->
<!--					</li>-->
<!--					<li>-->
<!--						<a href="#">Home 3</a>-->
<!--					</li>-->
<!--				</ul>-->
<!--			</li>-->
			<li class="nav-item py-1 px-2 d-flex flex-row justify-content-start rounded pl-4 mb-2"
					>
				<img src="<?php echo base_url().'assets/admin/images/windows.svg' ?>"
						class="d-block"
						alt=""  width="18" height="40" />
				<a class="nav-link active" href="<?php echo site_url().'admin'?>">Dashboard</a>
			</li>

			<li class="nav-item py-1 px-2 d-flex flex-row justify-content-start rounded pl-4 mb-2">
				<img src="<?php echo base_url().'assets/admin/images/make-orders.svg' ?>"
						class="d-block"
						alt=""  width="18" height="40" />
				<a class="nav-link" href="<?php echo site_url().'all_users'?>">All Users</a>
			</li>

			<li class="nav-item py-1 px-2 d-flex flex-row justify-content-start rounded pl-4 mb-2">
				<img src="<?php echo base_url().'assets/admin/images/sales-booking.svg' ?>"
						class="d-block"
						alt=""  width="18" height="40" />
				<a class="nav-link" href="<?php echo site_url().'all_booking'?>">All Bookings</a>
			</li>

			<li class="nav-item py-1 px-2 d-flex flex-row justify-content-start rounded pl-4 mb-2">
				<img src="<?php echo base_url().'assets/admin/images/make-orders.svg' ?>"
						class="d-block"
						alt=""  width="18" height="40" />
				<a class="nav-link" href="<?php echo site_url().'all_transactions'?>">All Transactions</a>
			</li>


			<li class="nav-item py-1 px-2 d-flex flex-row justify-content-start rounded pl-4 mb-2">
				<img src="<?php echo base_url().'assets/admin/images/make-orders.svg' ?>"
						class="d-block"
						alt=""  width="18" height="40" />
				<a class="nav-link" href="<?php echo site_url().'add_location'?>">Add Location</a>
			</li>

			<div class="dropdown-divider"></div>
			<li class="nav-item py-1 px-2 d-flex flex-row justify-content-start rounded pl-3 ">
				<a  class="" href="<?php echo site_url(). 'user/change_password';?>" >
					<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
					<span>Change Password</span>
				</a>
			</li>

			<div class="dropdown-divider"></div>

			<li class="nav-item py-1 px-2 d-flex flex-row justify-content-start rounded pl-3 " >
				<a class="" href="<?php echo site_url(). 'user/logout';?>" data-toggle="modal" data-target="#logoutModal">
					<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
					Logout
				</a>
			</li>
		</ul>
	</nav>
	<?php endif;?>

	<!-- Sidebar user view  -->
	<?php if($this->session->userdata('user_type')==='user'):?>
	<nav id="sidebar">
		<div class="sidebar-header">
			<img
					src="<?php echo base_url().'assets/admin/images/logo-dashboard.svg' ?>"
					width="150"
					alt=""
			/>
		</div>

		<ul class="components ">
			<li class="nav-item py-1 px-2 d-flex flex-row justify-content-start rounded pl-4 mb-2"
				>
			<img src="<?php echo base_url().'assets/admin/images/windows.svg' ?>"
						   class="d-block"
						   alt=""  width="18" height="40" />
				<a class="nav-link active" href="<?php echo site_url().'dashboard'?>">Dashboard</a>
			</li>


			<li class="nav-item py-1 px-2 d-flex flex-row justify-content-start rounded pl-4 mb-2">
				<img src="<?php echo base_url().'assets/admin/images/sales-booking.svg' ?>"
					 class="d-block"
					 alt=""  width="18" height="40" />
				<a class="nav-link" href="<?php echo site_url().'booking'?>">Bookings</a>
			</li>

			<li class="nav-item py-1 px-2 d-flex flex-row justify-content-start rounded pl-4 mb-2">
				<img src="<?php echo base_url().'assets/admin/images/make-orders.svg' ?>"
					 class="d-block"
					 alt=""  width="18" height="40" />
				<a class="nav-link" href="<?php echo site_url().'transactions'?>">Transactions</a>
			</li>



			<div class="dropdown-divider"></div>
			<li class="nav-item py-1 px-2 d-flex flex-row justify-content-start rounded pl-3 ">
				<a  class="" href="<?php echo site_url(). 'user/change_password';?>" >
					<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
					<span>Change Password</span>
				</a>
			</li>

			<div class="dropdown-divider"></div>

			<li class="nav-item py-1 px-2 d-flex flex-row justify-content-start rounded pl-3 " >
				<a class="" href="<?php echo site_url(). 'user/logout';?>" data-toggle="modal" data-target="#logoutModal">
					<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
					Logout
				</a>
			</li>
		</ul>
	</nav>
	<?php endif;?>

	<div id="content">






<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">We love to see you again.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-primary"  href="<?php echo site_url(). 'user/logout';?>">Logout</a>
			</div>
		</div>
	</div>
</div>
<!--<div class="col-2 py-3 bg-light">-->
<!--	<div class="logo my-4 ml-4 pb-3">-->
<!--		<img-->
<!--			src="--><?php //echo base_url().'assets/admin/images/logo-dashboard.svg' ?><!--"-->
<!--			width="150"-->
<!--			alt=""-->
<!--		/>-->
<!--	</div>-->
<!--	<ul class="nav flex-column">-->
<!--		<li-->
<!--			class="nav-item py-1 px-2 d-flex flex-row justify-content-start rounded pl-4 mb-2"-->
<!--			style="background: var(--dashboard-bg);"-->
<!--		>-->
<!--			<img-->
<!--				src="--><?php //echo base_url().'assets/admin/images/windows.svg' ?><!--"-->
<!--				class="d-block"-->
<!--				alt=""  width="18" height="40"-->
<!--			/>-->
<!--			<a class="nav-link active" href="--><?php //echo site_url().'admin'?><!--">Dashboard</a>-->
<!--		</li>-->
<!---->
<!--		<li-->
<!--				class="nav-item py-1 px-2 d-flex flex-row justify-content-start rounded pl-4 mb-2"-->
<!--		>-->
<!--			<img-->
<!--					src="--><?php //echo base_url().'assets/admin/images/make-orders.svg' ?><!--"-->
<!--					class="d-block"-->
<!--					alt=""  width="18" height="40"-->
<!--			/>-->
<!--			<a class="nav-link" href="--><?php //echo site_url().'all_users'?><!--">All Users</a>-->
<!--		</li>-->
<!--		<li-->
<!--			class="nav-item py-1 px-2 d-flex flex-row justify-content-start rounded pl-4 mb-2"-->
<!--		>-->
<!--			<img-->
<!--				src="--><?php //echo base_url().'assets/admin/images/sales-booking.svg' ?><!--"-->
<!--				class="d-block"-->
<!--				alt=""  width="18" height="40"-->
<!--			/>-->
<!--			<a class="nav-link" href="--><?php //echo site_url().'all_booking'?><!--">All Bookings</a>-->
<!--		</li>-->
<!--		<li-->
<!--			class="nav-item py-1 px-2 d-flex flex-row justify-content-start rounded pl-4 mb-2"-->
<!--		>-->
<!--			<img-->
<!--				src="--><?php //echo base_url().'assets/admin/images/make-orders.svg' ?><!--"-->
<!--				class="d-block"-->
<!--				alt=""  width="18" height="40"-->
<!--			/>-->
<!--			<a class="nav-link" href="--><?php //echo site_url().'all_transactions'?><!--">All Transactions</a>-->
<!--		</li>-->
<!---->
<!---->
<!---->
<!--		<li-->
<!--				class="nav-item py-1 px-2 d-flex flex-row justify-content-start rounded pl-4 mb-2"-->
<!--		>-->
<!--			<img-->
<!--					src="--><?php //echo base_url().'assets/admin/images/make-orders.svg' ?><!--"-->
<!--					class="d-block"-->
<!--					alt=""  width="18" height="40"-->
<!--			/>-->
<!--			<a class="nav-link" href="--><?php //echo site_url().'add_location'?><!--">Add Location</a>-->
<!--		</li>-->
<!---->
<!--		<div class="dropdown-divider"></div>-->
<!--		<li class="nav-item py-1 px-2 d-flex flex-row justify-content-start rounded pl-4 ">-->
<!--			<a  class="" href="--><?php //echo site_url(). 'user/change_password';?><!--" >-->
<!--				<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>-->
<!--				<span>Change Password</span>-->
<!--			</a>-->
<!--		</li>-->
<!---->
<!--		<div class="dropdown-divider"></div>-->
<!---->
<!--		<li class="nav-item py-1 px-2 d-flex flex-row justify-content-start rounded pl-4 " >-->
<!--			<a class="" href="--><?php //echo site_url(). 'user/logout';?><!--" data-toggle="modal" data-target="#logoutModal">-->
<!--				<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>-->
<!--				Logout-->
<!--			</a>-->
<!--		</li>-->
<!--	</ul>-->
<!--</div>-->
