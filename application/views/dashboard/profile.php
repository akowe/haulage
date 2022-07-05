<!-- Begin Page Content -->
<div class="container-fluid">
	<?php
	if(isset($view) && $view == 1)  {

	?>
	<?php
	}
	?>
	<!-- Page Heading -->
	<br>
	<h3 class=" text-gray-800">Profile</h3>

	<!-- Content Row -->
	<div class="row">
		<div class="col-lg-8 tab-content">
		<?php
		// All users list
		if(isset($view) && $view == 1)  {
			?>
			<?php
			if(validation_errors()){
				?>
				<div class="alert alert-info text-center">
					<?php echo validation_errors(); ?>
				</div>
				<?php
			}
			if($this->session->flashdata('update')){
				?>
				<div class="alert alert-info text-center">
					<?php echo $this->session->flashdata('update'); ?>

				</div>
				<?php
			}
			?>
			<?php
			if(validation_errors()){
				?>
				<div class="alert alert-info text-center">
					<?php echo validation_errors(); ?>
				</div>
				<?php
			}
			if($this->session->flashdata('reset')){
				?>
				<div class="alert alert-info text-center">
					<?php echo $this->session->flashdata('reset'); ?>

				</div>
				<?php
			}
			?>

			<?php
			if(validation_errors()){
				?>
				<div class="alert alert-info text-center">
					<?php echo validation_errors(); ?>
				</div>
				<?php
			}
			if($this->session->flashdata('error')){
				?>
				<div class="alert alert-info text-center">
					<?php echo $this->session->flashdata('error'); ?>

				</div>
				<?php
			}
			?>
			<form>

				<?php
				$sno = 1;
				foreach($response as $val){

					echo '
	
                       <div class="form-group">
                        <label>First Name: </label>
                       <label class="form-control" readonly="">'.$val['fname'].'</label>
						</div>
						
						<div class="form-group">
						 <label>Last Name:  </label>
                       <label class="form-control" readonly="">'.$val['lname'].'</label>
						</div>
						<div class="form-group">
						 <label>Email:  </label>
                       <label class="form-control" readonly="">'.$val['email'].'</label>
						</div>
                       
                         <div class="form-group">
                          <label>Phone</label>
                       <input type="text" value="'.$val['phone'].'"  class="form-control">
						</div>
						
						  <div class="form-group">
						   <label>Address</label>
                       <input type="text" value="'.$val['address'].'"  class="form-control">
						</div>
                      
                    
                        </form>
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
				<h5 class="text-primary">Update </h5>

			<form   method="POST" action="" enctype="multipart/form-data">
				<div class="form-group">
					<input type="text" name="fname" value='<?php echo $response['fname']; ?>'  readonly class="form-control">
				</div>

				<div class="form-group">
					<input type="text" name="lname" value='<?php echo $response['lname']; ?>'  readonly class="form-control">
				</div>

				<div class="form-group">
					<input type="text" name="referral" value='<?php echo $response['phone']; ?>'  readonly class="form-control">
				</div>

				<div class="form-group">
					<input type="text" name="email" value='<?php echo $response['email']; ?>'  readonly class="form-control">
				</div>

				<div class="form-group">
					<input type="text" name="address" value='<?php echo $response['address']; ?>'  readonly class="form-control">
				</div>




<!---->
<!--				<div class="form-group">-->
<!--				<input type='submit' name='submit' value='Update' class="btn btn-primary">-->
<!--				</div>-->


			</form>
			<?php
		}
		?>

			</div>


	</div><!-- End Content Row -->
</div>
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
