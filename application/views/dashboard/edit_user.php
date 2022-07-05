<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->

	<p class="mb-4"></p>

	<!-- Content Row -->
	<div class="row">
		<?php
		if(validation_errors()){
			?>
			<div class="alert alert-info text-center">
				<?php echo validation_errors(); ?>
			</div>
			<?php
		}
		if($this->session->flashdata('edit')){
			?>
			<div class="alert alert-info text-center">
				<?php echo $this->session->flashdata('edit'); ?>

			</div>
			<?php
		}
		?>

		<div class="col-lg-12 tab-content">
			<?php
			// All users list
			if(isset($view) && $view == 1)  {
				?>

				<form>
					<?php
					$sno = 1;
					foreach($response as $val){
						echo '
                     <h4 class="mb-2 text-gray-800"><span class="text-primary">Edit</span> >>> '.$val['fname'].' '.$val['lname'].' </h4>
						<!--<table class="table table-bordered">
						<thead>
						
						</thead>
						<tbody>
						<tr>
						<td> '.$val['user_image'].'</td>
						</tr>
						<tr>
						<td> '.$val['user_card'].'</td>
						</tr>
						</tbody>
						
						</table>-->
						<br>
						<a class="btn btn-primary" href="'.site_url().'admin/edit_user?edit='.$val['id'].'" class="text-white">Click Here To Edit Agent</a> 
					
                    
                      
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
				<h5 class="text-primary">Edit Face ID and Valid ID for <?php echo $response['fname']; ?> <?php echo $response['lname']; ?></h5>

				<form   method="POST" action="" enctype="multipart/form-data">
					<!--<div class="form-group">
						<label>Mobile Number</label><i class="text-danger">*</i><br>
						<input type="text"  name="referral" value='<?php echo $response['referral']; ?>'   class="form-control" placeholder="jpg/jpeg/png">

					</div> -->

					<div class="form-group">
						<label>Upload Agent Face ID</label><i class="text-danger">*</i><br>
						<small class="text-dark">jpeg / jpg / png. Max size: 5mb</small>
						<input type="file"  name="user_image" value='<?php echo $response['user_image']; ?>'   class="form-control" placeholder="jpg/jpeg/png">
						<small class="text-danger">See Sample</small>
					</div>

					<div class="form-group">
						<label>Upload Agent Valid ID Card Here</label><i class="text-danger">*</i><br>
						<small class="text-dark">jpeg / jpg / png. Max size: 5mb</small>
						<input type="file"  name="user_card" value='<?php echo $response['user_card']; ?>'   class="form-control" placeholder="jpg/jpeg/png">
						<small class="text-danger">National ID, Int'l Passport, Driving License or Voter's Card</small>
					</div>


					<div class="form-group">
						<input type='submit' name='submit' value='Update' class="btn btn-primary">
					</div>


				</form>
				<?php
			}
			?>





		</div>


	</div><!-- End Content Row -->
</div>
