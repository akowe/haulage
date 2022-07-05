<div class="body" style=" background-color: #028CCD !important;">

<header id="header" class="header-gray " data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': false, 'stickyEnableOnMobile': true, 'stickyStartAt': 70, 'stickyChangeLogo': false, 'stickyHeaderContainerHeight': 70}">
    <div class="header-body border-top-0 bg-blue box-shadow-none" style="padding: 10px 0 !important;">
        <div class="header-container container">

            <div class="header-row">
                <a class="navbar-brand" href="index"><img src="<?php echo base_url().'assets/images/logo.svg' ?>" width="190" height="75" alt=""></a>


                <div class="header-column justify-content-end">
                    <div class="header-row">
                        <div class="header-nav header-nav-links header-nav-light-text header-nav-dropdowns-dark">
                            <div class="header-nav-main header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-text-capitalize header-nav-main-text-size-2 header-nav-main-mobile-dark header-nav-main-effect-1 header-nav-main-sub-effect-1 appear-animation" data-appear-animation="fadeIn" data-plugin-options="{'accY': 100}">
                                <nav class="collapse">
                                    <ul class="nav nav-pills" id="mainNav">

                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle" data-hash data-hash-offset="130" href="<?php echo site_url()?>">
                                                Home
                                            </a>
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle" data-hash data-hash-offset="130" href="#track">
                                                Track
                                            </a>
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle" data-hash data-hash-offset="130" href="faq">
                                                FAQs
                                            </a>
                                        </li>

                                        <li class="dropdown">
                                    <a class="dropdown-item dropdown-toggle" data-hash data-hash-offset="130" href="login">
                                                <i class="icon login "></i>Login
                                            </a>
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle" data-hash data-hash-offset="130" href="register" >
                                                <span class="btn btn-light font-weight-bold">Sign Up</span></a>

                                        </li>


                                    </ul>
                                </nav>
                            </div>
                           <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav"><i class="fa fa-bars"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


	<!--  Show case -->
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
