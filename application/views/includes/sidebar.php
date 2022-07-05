<?php if($this->session->userdata('user_type')==='user'):?>
<div class="col-2 py-3 bg-light">
	<div class="logo my-4 ml-4 pb-3">
		<img
			src="<?php echo base_url().'assets/admin/images/logo-dashboard.svg' ?>"
			width="150"
			alt=""
		/>
	</div>
	<ul class="nav flex-column">
		<li
			class="nav-item py-1 px-2 d-flex flex-row justify-content-start rounded pl-4 mb-2"
			style="background: var(--dashboard-bg);"
		>
			<img
				src="<?php echo base_url().'assets/admin/images/windows.svg' ?>"
				class="d-block"
				alt="" width="18" height="40"
			/>
			<a class="nav-link active" href="<?php echo site_url().'dashboard'?>">Dashboard</a>
		</li>
		<li
			class="nav-item py-1 px-2 d-flex flex-row justify-content-start rounded pl-4 mb-2"
		>
			<img
				src="<?php echo base_url().'assets/admin/images/sales-booking.svg' ?>"
				class="d-block"
				alt=""  width="18" height="40"
			/>
			<a class="nav-link" href="<?php echo site_url().'booking'?>">Bookings</a>
		</li>
		<li
			class="nav-item py-1 px-2 d-flex flex-row justify-content-start rounded pl-4 mb-2"
		>
			<img
				src="<?php echo base_url().'assets/admin/images/make-orders.svg' ?>"
				class="d-block"
				alt=""  width="18" height="40"
			/>
			<a class="nav-link" href="<?php echo site_url().'transactions'?>">Transactions</a>
		</li>


<!--		<li-->
<!--			class="nav-item py-1 px-2 d-flex flex-row justify-content-start rounded pl-4 mb-2"-->
<!--		>-->
<!--			<img-->
<!--				src="--><?php //echo base_url().'assets/admin/images/ionic-ios-card.svg' ?><!--"-->
<!--				class="d-block"-->
<!--				alt=""-->
<!--			/>-->
<!--			<a class="nav-link" href="#">Cards</a>-->
<!--		</li>-->


		<div class="dropdown-divider"></div>
		<li class="nav-item py-1 px-2 d-flex flex-row justify-content-start rounded pl-4 ">
			<a  class="" href="<?php echo site_url(). 'user/change_password';?>" >
				<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
				<span>Change Password</span>
			</a>
		</li>

		<div class="dropdown-divider"></div>

		<li class="nav-item py-1 px-2 d-flex flex-row justify-content-start rounded pl-4 " >
			<a class="" href="<?php echo site_url(). 'user/logout';?>" data-toggle="modal" data-target="#logoutModal">
				<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
				Logout
			</a>
		</li>
	</ul>
</div>
<?php endif;?>

<!-- Admin view for sidebar-->
<?php if($this->session->userdata('user_type')==='admin'):?>
<div class="col-2 py-3 bg-light">
	<div class="logo my-4 ml-4 pb-3">
		<img
				src="<?php echo base_url().'assets/admin/images/logo-dashboard.svg' ?>"
				width="150"
				alt=""
		/>
	</div>
	<ul class="nav flex-column">
		<li
				class="nav-item py-1 px-2 d-flex flex-row justify-content-start rounded pl-4 mb-2"
				style="background: var(--dashboard-bg);"
		>
			<img
					src="<?php echo base_url().'assets/admin/images/windows.svg' ?>"
					class="d-block"
					alt=""  width="18" height="40"
			/>
			<a class="nav-link active" href="<?php echo site_url().'admin'?>">Dashboard</a>
		</li>

		<li
				class="nav-item py-1 px-2 d-flex flex-row justify-content-start rounded pl-4 mb-2"
		>
			<img
					src="<?php echo base_url().'assets/admin/images/make-orders.svg' ?>"
					class="d-block"
					alt=""  width="18" height="40"
			/>
			<a class="nav-link" href="<?php echo site_url().'all_users'?>">All Users</a>
		</li>
		<li
				class="nav-item py-1 px-2 d-flex flex-row justify-content-start rounded pl-4 mb-2"
		>
			<img
					src="<?php echo base_url().'assets/admin/images/sales-booking.svg' ?>"
					class="d-block"
					alt=""  width="18" height="40"
			/>
			<a class="nav-link" href="<?php echo site_url().'all_booking'?>">All Bookings</a>
		</li>
		<li
				class="nav-item py-1 px-2 d-flex flex-row justify-content-start rounded pl-4 mb-2"
		>
			<img
					src="<?php echo base_url().'assets/admin/images/make-orders.svg' ?>"
					class="d-block"
					alt=""  width="18" height="40"
			/>
			<a class="nav-link" href="<?php echo site_url().'all_transactions'?>">All Transactions</a>
		</li>



		<li
				class="nav-item py-1 px-2 d-flex flex-row justify-content-start rounded pl-4 mb-2"
		>
			<img
					src="<?php echo base_url().'assets/admin/images/make-orders.svg' ?>"
					class="d-block"
					alt=""  width="18" height="40"
			/>
			<a class="nav-link" href="<?php echo site_url().'add_location'?>">Add Location</a>
		</li>

		<div class="dropdown-divider"></div>
		<li class="nav-item py-1 px-2 d-flex flex-row justify-content-start rounded pl-4 ">
			<a  class="" href="<?php echo site_url(). 'user/change_password';?>" >
				<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
				<span>Change Password</span>
			</a>
		</li>

		<div class="dropdown-divider"></div>

		<li class="nav-item py-1 px-2 d-flex flex-row justify-content-start rounded pl-4 " >
			<a class="" href="<?php echo site_url(). 'user/logout';?>" data-toggle="modal" data-target="#logoutModal">
				<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
				Logout
			</a>
		</li>
	</ul>
</div>

<?php endif;?>
