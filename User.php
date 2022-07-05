<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		//get all users
		$this->data['users'] = $this->users_model->getAllUsers();
	}

	public function index()
	{
		$this->load->view('includes/head');
		$this->load->view('includes/header');
		//if ($this->session->userdata('logged_in') !== TRUE) {
		$this->load->view('index');
		$this->load->view('includes/footer');
		//}
	}
	public function partner()
	{
		$this->load->view('includes/head');
		$this->load->view('includes/header');
		//if ($this->session->userdata('logged_in') !== TRUE) {
		$this->load->view('partner');
		$this->load->view('includes/footer');
		//}
	}
	public function driver()
	{
		$this->load->view('includes/head');
		$this->load->view('includes/header');
		//if ($this->session->userdata('logged_in') !== TRUE) {
		$this->load->view('driver');
		$this->load->view('includes/footer');
		//}
	}

	public function faq()
	{
		$this->load->view('includes/head');
		$this->load->view('includes/header');
		//if ($this->session->userdata('logged_in') !== TRUE) {
		$this->load->view('faq');
		$this->load->view('includes/footer');
		//}
	}


	public function terms_of_use()
	{
		$this->load->view('includes/head');
		$this->load->view('includes/header');
		//if ($this->session->userdata('logged_in') !== TRUE) {
		$this->load->view('terms_of_use');
		$this->load->view('includes/footer');
		//}
	}

	public function privacy_policy()
	{
		$this->load->view('includes/head');
		$this->load->view('includes/header');
		//if ($this->session->userdata('logged_in') !== TRUE) {
		$this->load->view('privacy_policy');
		$this->load->view('includes/footer');
		//}
	}
	public function corporate()
	{
		$this->load->view('includes/head');
		$this->load->view('includes/header');
		//if ($this->session->userdata('logged_in') !== TRUE) {
		$this->load->view('corporate');
		$this->load->view('includes/footer');
		//}
	}
	public function shipper()
	{
		$this->load->view('includes/head');
		$this->load->view('includes/header');
		//if ($this->session->userdata('logged_in') !== TRUE) {
		$this->load->view('shipper');
		$this->load->view('includes/footer');
		//}
	}


	public function register()
	{
//		$this->load->library('email');
//		$email_config['mailtype'] = 'html';
//		$this->email->initialize($email_config);
		$this->load->view('includes/admin/head');
		//$this->load->view('includes/admin/header');
		$this->form_validation->set_rules('fname', 'First name', 'required');
		$this->form_validation->set_rules('lname', 'Last name', 'required');
		$this->form_validation->set_rules('phone', 'Phone Number', 'required');
//		$this->form_validation->set_rules('address', 'Contact Address', 'required');
		$this->form_validation->set_rules('email', 'Email', 'valid_email|required|is_unique[users.email]', array('is_unique' => 'This %s already exists.'));
		$this->form_validation->set_rules('password', 'Password', 'required|max_length[30]');
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required|matches[password]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('register', $this->data);
		} else {
			//get user inputs
			$fname = $this->input->post('fname');
			$lname = $this->input->post('lname');
			$phone = $this->input->post('phone');
//			$address = $this->input->post('address');
			$reg_type=$this->input->post('reg_type');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			//$status = $this->input->post('status');


			//generate simple random code
			$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$code = substr(str_shuffle($set), 0, 12);

			//insert user to users table and get id
			$user['fname'] = $fname;
			$user['lname'] = $lname;
			$user['phone'] = $phone;
//			$user['address'] = $address;
			$user['reg_type'] = $reg_type;
			$user['email'] = $email;
			$user['password'] = md5($password);
			$user['code'] = $code;
			$user['active'] = 'inactive';
			//$user['status'] = $status;
			$user['user_type'] = 'user';
			$id = $this->users_model->insert($user);

			//set up email
			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_port' => 465,
				'smtp_user' => 'hauleasybiz@gmail.com', // change it to yours
				'smtp_pass' => 'Passme@123', // change it to yours
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
			);
			$msg = "
						<html>
						<head>
							<title>Verification Link</title>
						</head>
						<body>
							<h2>Thank you for Registering with Hauleasy.</h2>
							<p>Your Account:</p>
							<p>Email: " . $email . "</p>
							
							<p>Please click the link below to verify your account.</p>
							<h4 class='btn btn-primary btn-md btn-block'> <a href='" . site_url() . "user/activate/" . $id . "/" . $code . "' >Verify My Account</a></h4>
						</body>
						</html>
						";


			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			//	$this->email->from('Hauleasy',$config['smtp_user']);
			$this->email->from('noreply@hauleasy.biz', 'Hauleasy');
			$this->email->to($email);
			$this->email->subject('Verification Email');
			$this->email->message($msg);

			//sending email
			if ($this->email->send()) {
				$this->session->set_flashdata('message', 'Verification link has been sent to your email. Check your inbox.');
			} else {
				$this->session->set_flashdata('message', $this->email->print_debugger());

			}
			redirect('register');

		}
		//$this->load->view('includes/footer');

	}

	public function activate()
	{
		$id = $this->uri->segment(3);
		$code = $this->uri->segment(4);

		//fetch user details
		$user = $this->users_model->getUser($id);

		//if code matches
		if ($user['code'] == $code) {
			//update user active status
			$data['active'] = 'verified';
			$query = $this->users_model->activate($data, $id);


			if ($query) {
				$this->session->set_flashdata('message', 'User Verified successfully');
			} else {
				$this->session->set_flashdata('message', 'Something went wrong in verifying your  account');
			}
		} else {
			$this->session->set_flashdata('message', 'Cannot verify account. Code didnt match');
			redirect('register');
		}

		redirect('verify');
	}

	public function verify()
	{
		$this->load->view('includes/head');
		$this->load->model('users_model');
		$this->load->helper(array('form', 'url'));
		$this->load->database();
		$this->load->view('verify');
	}

	public function login()
	{
		$this->load->view('includes/admin/head');
		//$this->load->view('includes/header');
		$this->load->view('login');
	}


	public function forgot_password()
	{

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('includes/admin/head');
			$this->load->model('users_model');
			$this->load->view('forgot_password');
		}

		else{
			$email = $this->input->post('email');
			$clean = $this->security->xss_clean($email);
			$userInfo = $this->users_model->getUserInfoByEmail($clean);

			if(!$userInfo){
				$this->session->set_flashdata('flash_message', 'We cant find your email address');
				redirect(site_url().'login');
			}

			if($userInfo->active != 'verified'){ //if status is not approved
				$this->session->set_flashdata('flash_message', 'Your account was not verified');
				redirect(site_url().'login');
			}

			//build token

			$token = $this->users_model->insertToken($userInfo->id);
			$qstring = $this->base64url_encode($token);

			//$url = site_url() . 'reset_password/token/' . $qstring;
			$url = site_url() . 'user/reset_password?token=' . $qstring;
			$link = '<a href="' . $url . '">' . $url . '</a>';

			//set up email
			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_port' => 465,
				'smtp_user' => 'hauleasybiz@gmail.com', // change it to yours
				'smtp_pass' => 'Passme@123', // change it to yours
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
			);
			$msg = "
						<html>
						<head>
							<title>Reset Password</title>
						</head>
						<body>
							<h2>A password reset has been requested for this email account</h2>
							<p>Your Account:</p>
							<p>Email: ".$email."</p>

							<p>Please click the link below to reset your password.</p>
							<h4 class='btn btn-primary'>
							<a href='" . site_url() . "user/reset_password?token=" . $qstring . " ' class='btn btn-primary btn-md btn-block' >
							Reset Password
							</a>
							</h4>
							OR copy and pastes the below link in your browser<br>
							$link

							<p><strong>if this is not you kindly ignore, login to your account and change your password</strong></p>
						</body>
						</html>
						";


			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			//	$this->email->from('Hauleasy',$config['smtp_user']);
			$this->email->from('no-reply@hauleasy.biz', 'Hauleasy');
			$this->email->to($email);
			$this->email->subject('Request To Reset Your Password');
			$this->email->message($msg);

			//sending email
			if ($this->email->send()) {
				$this->session->set_flashdata('flash_message', 'A mail has been sent to you. Check your inbox.');
			} else {
				$this->session->set_flashdata('flash_message', $this->email->print_debugger());

			}
			redirect('forgot_password');

		}

	}



	public function auth()
	{
		$this->load->model('users_model');
		$email = $this->input->post('email', TRUE);
		$password = md5($this->input->post('password', TRUE));
		$validate = $this->users_model->validate($email, $password);
		if ($validate->num_rows() > 0) {
			$data = $validate->row_array();

			$fname = $data['fname'];
			$lname = $data['lname'];
			$phone = $data['phone'];
			$verified = $data['active'];
			$email = $data['email'];
			$level = $data['user_type'];
			$sesdata = array(

				'fname' => $fname,
				'lname' => $lname,
				'phone' => $phone,
				'active' => $verified,
				'email' => $email,
				'user_type' => $level,
				'logged_in' => TRUE
			);
			$this->session->set_userdata($sesdata);
			// access login for admin
			if ($level === 'admin') {
				redirect('admin');
			} // access login for support
//			elseif ($level === 'support') {
//				redirect('support');
//			} // access login for Users
			elseif ($level === 'user' && $verified === 'verified') {
				redirect('dashboard');
			} else {
				echo $this->session->set_flashdata('verify', 'Email Not Yet Verified. <br> Kindly Check Your Inbox');
				redirect('login');
			}

		} else {
			echo $this->session->set_flashdata('msg', 'Email or Password is Wrong');
			redirect('login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_type');
		$this->session->sess_destroy();
		redirect('login');
	}

	public function admin()
	{
		//Allowing  admin only
		if ($this->session->userdata('user_type') === 'admin') {
			$this->load->view('admin');
		} else {
			echo "Access Denied";
		}
	}

	public function user()
	{
		//Allowing agent only
		if ($this->session->userdata('user_type') === 'user') {
			$this->load->view('dashboard');
		} else {
			echo "Access Denied";
		}
	}


	function author()
	{
		//Allowing  support only
		if ($this->session->userdata('level') === 'support') {
			$this->load->view('dashboard');
		} else {
			echo "Access Denied";
		}
	}


	//Dashboard Area
	public function dashboard()
	{
		if ($this->session->userdata('user_type') !== 'user'){
			redirect('login');
		}
		$this->load->model('users_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->database();
		$this->load->view('includes/admin/head');
		$this->load->model('users_model');
		// see recent transactions
		$data['b']=$this->users_model->viewTransactions();
		$this->load->view('dashboard/dashboard', $data);
		$this->load->view('includes/admin/footer');

	}

	public function profile()
	{
		if ($this->session->userdata('logged_in') !== TRUE) {
			redirect('login');
		}

		$this->load->database();
		$this->load->view('includes/admin/head');
//		$this->load->view('includes/admin/header');
		$this->load->helper(array('form', 'url'));
		//load model
		$this->load->model('Main_model');

		// Get
		$edit = $this->input->get('edit');

		if (!isset($edit)) {
			// get data
			$data['response'] = $this->Main_model->getUsersList();
			$data['view'] = 1;

			// load view
			$this->load->view('dashboard/profile', $data);
		} else {

			// Check submit button POST or not
			if ($this->input->post('submit')) {

				// POST data
				$postData = $this->input->post();

				$config['upload_path'] = FCPATH . '/uploads/';
				$config['allowed_types'] = 'jpeg|jpg|png';
				$config['max_size'] = 5000;
				$config['encrypt_name'] = true;

				$this->load->library('upload');
				$this->upload->initialize($config);

				$tid = "";
				$error = "";

				if (isset($_FILES['user_image']) && $_FILES['user_image']['name'] != "") {
					if (!$this->upload->do_upload('user_image')) {
						$error = $this->upload->display_errors('', '');

					} else {
						$postData['user_image'] = $this->upload->data()['file_name'];
					}
				}

				if (isset($_FILES['user_card']) && $_FILES['user_card']['name'] != "") {
					if (!$this->upload->do_upload('user_card')) {
						$error = $this->upload->display_errors('', '');

					} else {
						$postData['user_card'] = $this->upload->data()['file_name'];
					}
				}

				if ($error == "") {

					//Update record
					unset($postData['submit']);
					$this->Main_model->updateUser($postData, $edit);
					$this->session->set_flashdata('update', 'Update Successful');
				}
				redirect('profile');

			} else {
				// get data by id
				$data['response'] = $this->Main_model->getUserById($edit);
				$data['view'] = 2;
				// load view
				$this->load->view('dashboard/profile', $data);
			}
		}

		$this->load->view('includes/admin/footer');
	}

	public function change_password()
	{
		if ($this->session->userdata('logged_in') !== TRUE) {
			redirect('login');
		}
		$this->load->database();
		$this->load->view('includes/admin/head');
	 	// $this->load->view('includes/header');
		$this->load->helper(array('form', 'url'));
		//load model
		$this->load->model('Main_model');

			// Get
			$edit = $this->input->get('edit');

			if (!isset($edit)) {
				// get data
				$data['response'] = $this->Main_model->getUsersList();
				$data['view'] = 1;

				// load view
				$this->load->view('dashboard/change_password', $data);
			} else {

				// Check submit button POST or not
				if ($this->input->post('submit') != NULL) {

					// POST data
					$postData = $this->input->post();

					$tid = "";
					$error = "";

					if ($error == "") {
						//Update record
						$this->Main_model->reset_user($postData, $edit);
						$this->session->set_flashdata('reset', 'Password Reset Successful');

					}

					redirect('profile');

				} else {
					// get data by id
					$data['response'] = $this->Main_model->getUserById($edit);
					$data['view'] = 2;
					// load view
					$this->load->view('dashboard/change_password', $data);
				}
			}

		$this->load->view('includes/admin/footer');
	}

	//booking Area
	public function add_booking()
	{
		if ($this->session->userdata('logged_in') !== TRUE) {
			redirect('login');
		}

		$this->load->model('users_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');

		$this->load->database();
		$this->load->view('includes/admin/head');

		$this->load->model('users_model');
		$this->load->model('Main_model');
		$data['f']=$this->Main_model->selectLocationfrom();
		$data['t']=$this->Main_model->selectLocationto();

		$this->form_validation->set_rules('address_from', 'Pickup Address', 'required');
		$this->form_validation->set_rules('address_to', 'Delivery Address', 'required');
		$this->form_validation->set_rules('landmark_from', 'Nearest Landmark', 'required');
		$this->form_validation->set_rules('landmark_to', 'Nearest Landmark', 'required');
		$this->form_validation->set_rules('location_from', 'Pickup State', 'required');
		$this->form_validation->set_rules('location_to', 'Delivery State', 'required');
		$this->form_validation->set_rules('vehicle_type', 'Vehicle Type', 'required');
		$this->form_validation->set_rules('category', 'Category', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');


		if ($this->form_validation->run() == FALSE) {
			$this->load->view('dashboard/add_booking', $data);
		} else {
			//get user inputs
			$user_email = $this->session->userdata('email');
			$fname = $this->session->userdata('fname');
			$lname = $this->session->userdata('lname');
			$phone = $this->session->userdata('phone');
			$address_from = $this->input->post('address_from');
			$address_to = $this->input->post('address_to');
			$landmark_from = $this->input->post('landmark_from');
			$landmark_to = $this->input->post('landmark_to');
			$location_from = $this->input->post('location_from');
			$location_to = $this->input->post('location_to');
			$vehicle = $this->input->post('vehicle_type');
			$category = $this->input->post('category');
			$description = $this->input->post('description');
			$weight = $this->input->post('weight');
			$status = $this->input->post('status');

			//insert user to users table and get id
			$booking['email'] = $user_email;
			$booking['fname'] = $fname;
			$booking['lname'] = $lname;
			$booking['phone'] = $phone;
			$booking['address_from'] = $address_from;
			$booking['address_to'] = $address_to;
			$booking['landmark_from'] = $landmark_from;
			$booking['landmark_to'] = $landmark_to;
			$booking['location_from'] = $location_from;
			$booking['location_to'] = $location_to;
			$booking['vehicle_type'] = $vehicle;
			$booking['category'] = $category;
			$booking['description'] = $description;
			$booking['weight'] = $weight;
			$booking['status'] = $status;

			//file upload code
			//set file upload settings

			$config['upload_path'] = FCPATH . '/uploads/';
			$config['allowed_types'] = 'pdf|jpeg|jpg|png';
			$config['max_size'] = 5000;
			$config['encrypt_name'] = true;

			$this->load->library('upload');
			$this->upload->initialize($config);


				if (!$this->upload->do_upload('image')) {
					$error = $this->upload->display_errors('', '');

				} else {
					$booking['image'] = $this->upload->data()['file_name'];
				}

			$this->users_model->addBooking($booking);
			//set up email

			$email = 'sales@hauleasy.biz';
			$copy='info@hauleasy.biz';

			//set up email
			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_port' => 465,
				'smtp_user' => 'hauleasybiz@gmail.com', // change it to yours
				'smtp_pass' => 'Passme@123', // change it to yours
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
			);
						$msg = "
						<html>
						<head>
							<title>New Booking</title>
						</head>
						<body>
							<h2>$fname $lname has added a booking</h2>
			
							<p>Please click the link below to send $fname an Invoice.</p>
							<h4 class='btn btn-primary btn-md btn-block'><a href='" . site_url() . "login' >Send an Invoice</a></h4>
						</body>
						</html>
						";


			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			//	$this->email->from('Hauleasy',$config['smtp_user']);
			$this->email->from('noreply@hauleasy.biz', 'Hauleasy');
			$this->email->to($email);
			$this->email->cc($copy);
			$this->email->subject('New Booking Pending');
			$this->email->message($msg);

			//sending email
			if ($this->email->send()) {
				$this->session->set_flashdata('booking', 'Booking Successful');

			} else {
				$this->session->set_flashdata('booking', $this->email->print_debugger());
			}
			redirect('booking');

			//$this->load->view('includes/admin/footer');
		}
	}

	public function booking(){
		if ($this->session->userdata('user_type') !== 'user') {
			redirect('login');
		}

		$this->load->view('includes/admin/head');
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('pagination');
		$this->load->library('table');
		$this->load->library('calendar');
		//load model
		// load base_url
		$this->load->database();

		//load model
		$this->load->model('users_model');
		$data['b']=$this->users_model->viewBooking();


		$this->load->view('dashboard/booking', $data);
		$this->load->view('includes/admin/footer');
	}


	public function transactions(){
		if ($this->session->userdata('user_type') !== 'user') {
			redirect('login');
		}

		$this->load->view('includes/admin/head');
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('pagination');
		$this->load->library('table');
		$this->load->library('calendar');
		// library
		$this->load->database();

		//load model
		$this->load->model('Users_model');
		$data['b']=$this->users_model->viewTransactions();
		// pass data to view
		$this->load->view('dashboard/transactions', $data);

		$this->load->view('includes/admin/footer');
	}


	public function forgot()
	{

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('includes/admin/head');
			$this->load->model('users_model');
			$this->load->view('forgot_password');
		}

		else{
			$email = $this->input->post('email');
			$clean = $this->security->xss_clean($email);
			$userInfo = $this->users_model->getUserInfoByEmail($clean);

			if(!$userInfo){
				$this->session->set_flashdata('flash_message', 'We cant find your email address');
				redirect(site_url().'login');
			}

			if($userInfo->active != 'verified'){ //if status is not approved
				$this->session->set_flashdata('flash_message', 'Your account was not verified');
				redirect(site_url().'login');
			}

			//build token

			$token = $this->users_model->insertToken($userInfo->id);
			$qstring = $this->base64url_encode($token);

			//$url = site_url() . 'reset_password/token/' . $qstring;
			$url = site_url() . 'user/reset_password?token=' . $qstring;
			$link = '<a href="' . $url . '">' . $url . '</a>';

			//set up email
			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_port' => 465,
				'smtp_user' => 'hauleasybiz@gmail.com', // change it to yours
				'smtp_pass' => 'Passme@123', // change it to yours
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
			);
			$msg = "
						<html>
						<head>
							<title>Reset Password</title>
						</head>
						<body>
							<h2>A password reset has been requested for this email account</h2>
							<p>Your Account:</p>
							<p>Email: ".$email."</p>

							<p>Please click the link below to reset your password.</p>
							<h4 class='btn btn-primary btn-md btn-block'>
							<a href='" . site_url() . "user/reset_password?token=" . $qstring . " ' class='btn btn-primary btn-md btn-block' >
							Reset Password
							</a>
							</h4>
							OR copy and pastes the below link in your browser<br>
							$link

							<p><strong>if this is not you kindly ignore, login to your account and change your password</strong></p>
						</body>
						</html>
						";


			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
		//	$this->email->from('Hauleasy',$config['smtp_user']);
			$this->email->from('no-reply@hauleasy.biz', 'Hauleasy');
			$this->email->to($email);
			$this->email->subject('Request To Reset Your Password');
			$this->email->message($msg);

			//sending email
			if ($this->email->send()) {
				$this->session->set_flashdata('flash_message', 'A mail has been sent to you. Check your inbox.');
			} else {
				$this->session->set_flashdata('flash_message', $this->email->print_debugger());

			}
			redirect('forgot_password');

		}

	}


	public function reset_password()
	{
		$token = $this->base64url_decode($this->uri->segment(4));
//		$token = $this->uri->segment(4);
		$cleanToken = $this->security->xss_clean($token);

		$user_info = $this->users_model->isTokenValid($cleanToken); //either false or array();

		if(!$user_info){
			$this->session->set_flashdata('flash_message', 'Token is invalid or expired');
			redirect(site_url().'login');
		}
		$data = array(
			'fname'=> $user_info->fname,
			'email'=>$user_info->email,
               'user_id'=>$user_info->id,
			'token'=>$this->base64url_encode($token)
		);

		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('includes/admin/head');
			$this->load->view('reset_password', $data);
		}
		else{

			//$this->load->library('password');
			$post = $this->input->post(NULL, TRUE);
			$cleanPost = $this->security->xss_clean($post);
			//$hashed = $this->password->create_hash($cleanPost['password']);
			$hashed =$this->input->post('password');
			$cleanPost['password'] =md5($hashed) ;
			$cleanPost['user_id'] = $user_info->id;
			unset($cleanPost['passconf']);
			if(!$this->users_model->updatePassword($cleanPost)){
				$this->session->set_flashdata('flash_message', 'There was a problem updating your password');
			}else{
				$this->session->set_flashdata('flash_message', 'Your password has been updated. You may now login');
			}
			redirect(site_url().'login');
		}
	}

	public function base64url_encode($data) {
		return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
	}

	public function base64url_decode($data) {
		return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
	}



} // end class
