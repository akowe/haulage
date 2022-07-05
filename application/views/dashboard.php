<div class="container">
	<div class="row">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">

					<a class="navbar-brand" href="#">LOGO</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<!--ACCESS MENUS FOR ADMIN-->
						<?php if($this->session->userdata('user_type')==='admin'):?>
							<li class="active"><a href="#">Dashboard</a></li>
							<li><a href="#">Posts</a></li>
							<li><a href="#">Pages</a></li>
							<li><a href="#">Media</a></li>
							<!--ACCESS MENUS FOR AGENT-->
						<?php elseif($this->session->userdata('user_type')==='user'):?>
							<li class="active"><a href="#">Dashboard</a></li>
							<li><a href="#">Pages</a></li>
							<li><a href="#">Media</a></li>

							<!--ACCESS MENUS FOR AUTHOR-->

							<!--<li class="active"><a href="#">Dashboard</a></li>
							<li><a href="#">Posts</a></li>-->
						<?php endif;?>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="<?php echo site_url('logout');?>">Sign Out</a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div><!--/.container-fluid -->
		</nav>

		<div class="jumbotron">
			<h1>Welcome Back <?php echo $this->session->userdata('email');?></h1>
		</div>

	</div>
</div>
