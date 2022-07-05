<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Admin extends CI_Controller
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
		$this->load->view('includes/footer');
		if ($this->session->userdata('logged_in') !== TRUE) {
			$this->load->view('login');
		}
	}

	public function create()
	{
//		if ($this->session->userdata('user_type') !== 'admin')
//			{
//			redirect('login');
//		}
		$this->load->database();
		$this->load->view('includes/admin/head');
		$this->load->view('includes/admin/header');
		$this->load->helper('url');

		//$this->load->view('includes/header');
		$this->form_validation->set_rules('fname', 'First name', 'required');
		$this->form_validation->set_rules('lname', 'Last name', 'required');
		$this->form_validation->set_rules('phone', 'Phone Number', 'required');
		$this->form_validation->set_rules('address', 'Contact Address', 'required');
		$this->form_validation->set_rules('email', 'Email', 'valid_email|required|is_unique[users.email]', array('is_unique' => 'This %s already exists.'));
		$this->form_validation->set_rules('password', 'Password', 'required|max_length[30]');
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required|matches[password]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('dashboard/create', $this->data);
		} else {
			//get user inputs
			$fname = $this->input->post('fname');
			$lname = $this->input->post('lname');
			$phone = $this->input->post('phone');
			$address = $this->input->post('address');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$admin = $this->input->post('admin');
			//generate simple random code
			$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$code = substr(str_shuffle($set), 0, 12);

			//insert user to users table and get id
			$user['fname'] = $fname;
			$user['lname'] = $lname;
			$user['phone'] = $phone;
			$user['address'] = $address;
			$user['reg_type'] = 'admin';
			$user['active'] = 'verified';
			$user['user_type'] = $admin;
			$user['code'] = $code;
			$user['email'] = $email;
			$user['password'] = md5($password);
			$this->users_model->insert($user);

			//set up email
			redirect('admin');
		}
		//$this->load->view('includes/footer');

	}

	public function login()
	{
		$this->load->view('includes/head');
		$this->load->view('login');
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_type');
		$this->session->sess_destroy();
		redirect('login');
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


	public function admin(){
		if ($this->session->userdata('user_type') !== 'admin')
		{
			redirect('login');
		}

		$this->load->view('includes/admin/head');
		//$this->load->view('includes/admin/header');
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('pagination');
		$this->load->library('table');
		$this->load->library('calendar');
		//load model
		// load base_url
		$this->load->database();

		//load model
		$this->load->model('Main_model');
		//see all bookings
		$data['b']=$this->Main_model->viewBooking();

		$this->load->view('dashboard/admin', $data);
		$this->load->view('includes/admin/footer');
	}

	//edith and update users details
	public function edit_user()
	{
		if ($this->session->userdata('user_type') !== 'admin') {
			redirect('login');
		}
		$this->load->database();
		$this->load->view('includes/admin/head');
		$this->load->view('includes/admin/header');

		$this->load->model('Main_model');
		// Get
		$edit = $this->input->get('edit');

		if(!isset($edit)){
			// get data
			$data['response'] =  $this->Main_model->getRecordsById();
			$data['view'] = 1;

			// load view
			$this->load->view('dashboard/edit_user',$data);
		}else {

			// Check submit button POST or not
			if ($this->input->post('submit')) {

				// POST data
				$postData = $this->input->post();

				$config['upload_path'] = FCPATH.'/uploads/';
				$config['allowed_types'] = 'jpeg|jpg|png|JPG|JPEG|PNG';
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
					$this->session->set_flashdata('edit', 'Upload Successful');
				}

				redirect('admin');

			} else {
				// get data by id
				$data['response'] = $this->Main_model->getUserById($edit);
				$data['view'] = 2;

				// load view
				$this->load->view('dashboard/edit_user', $data);
			}
		}
	}



	public function reset_user()
	{
		if ($this->session->userdata('user_type') !== 'admin') {
			redirect('login');
		}
		$this->load->database();
		$this->load->view('includes/admin/head');
		$this->load->view('includes/admin/header');

		$this->load->model('Main_model');
		// Get
		$edit = $this->input->get('edit');

		if(!isset($edit)){
			// get data
			$data['response'] = $this->Main_model->getRecordsById();
			$data['view'] = 1;

			// load view
			$this->load->view('dashboard/reset_user',$data);
		}else{
			// Check submit button POST or not
			if($this->input->post('submit') != NULL ){
				// POST data
				$postData = $this->input->post();
				// Update record
				$this->Main_model->reset_user($postData,$edit);
				$this->session->set_flashdata('reset', 'Password Reset Successful');
				// Redirect page
				redirect('admin');
			}
			else{
				// get data by id
				$data['response'] = $this->Main_model->getUserById($edit);
				$data['view'] = 2;

				// load view
				$this->load->view('dashboard/reset_user',$data);
			}
		}
	}


// see all registered users
	public function all_users(){
		if ($this->session->userdata('user_type') !== 'admin')
		{
			redirect('login');
		}

		$this->load->view('includes/admin/head');
		//$this->load->view('includes/admin/header');
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('pagination');
		$this->load->library('table');
		$this->load->library('calendar');
		// load base_url
		$this->load->database();
		//load model
		$this->load->model('Main_model');
		//see all bookings
		$data['u']=$this->Main_model->selectUser();

		$this->load->view('dashboard/all_users', $data);
		$this->load->view('includes/admin/footer');
	}

	//Add new State for pickup
	public function locationfrom()
	{
		if ($this->session->userdata('user_type') !== 'admin') {
			redirect('login');
		}
		$this->load->model('Main_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->database();
		$this->load->view('includes/admin/head');
		$this->load->view('includes/admin/header');

		//$this->load->view('includes/header');
		$this->form_validation->set_rules('state', 'Pickup State', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('dashboard/add_location');
		} else {

			$location_from = $this->input->post('state');
			//get user inputs
			$location['state'] = $location_from;
			//insert and get id
			$this->Main_model->addLocationfrom($location);
			$this->session->set_flashdata('location', 'New Location Added');

			redirect('add_location');

		//	$this->load->view('includes/admin/footer');
		}
	}


	//Add new State for delivery
	public function locationto()
	{
		if ($this->session->userdata('user_type') !== 'admin') {
			redirect('login');
		}

		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('pagination');
		$this->load->library('table');
		$this->load->library('calendar');
		//load model
		// load base_url
		$this->load->database();

		//load model
		$this->load->model('Main_model');
		$this->load->view('includes/admin/head');
		$this->form_validation->set_rules('state', 'Pickup State', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('dashboard/add_location');
		} else {

			$location_to = $this->input->post('state');
			//get user inputs
			$location['state'] = $location_to;
			//insert and get id
			$this->Main_model->addLocationto($location);
			$this->session->set_flashdata('location', 'New Location Added');

			redirect('add_location');

			//$this->load->view('includes/admin/footer');
		}
	}



	public function location()
	{
		if ($this->session->userdata('user_type') !== 'admin') {
			redirect('login');
		}
		$this->load->model('Main_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->database();
		$this->load->view('includes/admin/head');
		//$this->load->view('includes/admin/header');

		$data['f']=$this->Main_model->selectLocationfrom();

		$data['t']=$this->Main_model->selectLocationto();

		$this->load->view('dashboard/add_location', $data);
		$this->load->view('includes/admin/footer');

	}

	public function all_booking(){
		if ($this->session->userdata('user_type') !== 'admin') {
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
		$this->load->model('Main_model');
		$data['b']=$this->Main_model->viewBooking();

		$this->load->view('dashboard/all_booking', $data);
		$this->load->view('includes/admin/footer');
	}



	public function create_invoice()
	{
		if ($this->session->userdata('user_type') !== 'admin') {
			redirect('login');
		}
		$this->load->database();
//		$this->load->library('email');
//		$email_config['mailtype'] = 'html';
//		$this->email->initialize($email_config);
		$this->load->view('includes/admin/head');
		//$this->load->view('includes/admin/header');

		$this->load->model('Main_model');
		// Get
		$edit = $this->input->get('edit');

		if(!isset($edit)){
			// get data from booking table
			$data['response'] = $this->Main_model->getRecordsById();
			$data['view'] = 1;

			// load view
			$this->load->view('dashboard/create_invoice',$data);
		}else{
			// Check submit button POST or not
			if($this->input->post('submit') != NULL ){
				// POST data
				$postData = $this->input->post();
				//load model
				// Update record
				$this->Main_model->update_invoice($postData,$edit);
				//$this->session->set_flashdata('invoice', 'Successful');

				//Send email to user when invoice is raised
				//	$email= trim($postData['email']);
				$email = $this->input->post('email');


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
							<title>An Invoice has been raised for your booking</title>
						</head>
						<body>
							<h2>An Invoice has been raised for your booking</h2>
							<p>Kindly <a href='" . site_url() . "login '>login</a> to view your invoice</p>
							
					
					
						</body>
						</html>
						";

				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				//$this->email->from($config['smtp_user']);
				$this->email->from('no-reply@hauleasy.biz', 'Hauleasy');
				$this->email->to($email);
				$this->email->subject('Invoice');
				$this->email->message($msg);

				if ($this->email->send()) {
					$this->session->set_flashdata('invoice', 'Invoice successfully created.');

				}
				// Redirect page
				redirect('all_transactions');
			}
			else{
				// get data by id
				$data['response'] = $this->Main_model->getBookingById($edit);
				$data['view'] = 2;

				// load view
				$this->load->view('dashboard/create_invoice',$data);
			}
		}
		//$this->load->view('includes/admin/footer');
	}


	public function all_transactions()
	{
		if ($this->session->userdata('user_type') !== 'admin') {
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
		$this->load->model('Main_model');
		$data['b'] = $this->Main_model->viewTransactions();
		// pass data to view
		$this->load->view('dashboard/all_transactions', $data);

//		// Get
//		$edit = $this->input->get('edit');
//
//		if(!isset($edit)){
//			// get data from booking table
//			$data['response'] = $this->Main_model->getInvoiceById($edit);
//			$data['view'] = 1;
//
//		}else{
//		if ($this->input->post('submit') != NULL) {
//			//$id= $this->input->get('id');
//
//			// POST data
//
//			$postData = $this->input->post();
//
//			// Update record
//			$this->Main_model->paid_invoice($postData, $edit);
//			$this->session->set_flashdata('paid', 'Invoice has been paid');
//
//		}
//		else{
//			// get data by id
//			$data['response'] = $this->Main_model->getInvoiceById($edit);
//			$data['view'] = 2;
//
//		}
//	}
		$this->load->view('includes/admin/footer');

	}


	public function invoice_pdf(){
		if ($this->session->userdata('logged_in') !== true) {
			redirect('login');
		}
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('pagination');
		$this->load->library('table');
		$this->load->library('calendar');
		$this->load->database();
		$this->load->model('Main_model');
		$data['b'] = $this->Main_model->invoice();

		ini_set('memory_limit', '512M');
		$html = $this->load->view('dashboard/invoice', $data, true);
		$this->load->library('pdf');
		$pdf = new \Mpdf\Mpdf([
			'debug' => true,
			'allow_output_buffering' => true
		]);

		$pdf->WriteHTML($html);
		$output = 'booking_' . 'invoice' . '.pdf';
		$pdf->Output("$output", 'I');
		exit();

	}

	public function invoice(){
		if ($this->session->userdata('logged_in') !== true) {
			redirect('login');
		}
		$this->load->view('includes/admin/head');
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('pagination');
		$this->load->library('table');
		$this->load->library('calendar');
		$this->load->database();
		$this->load->model('Main_model');
		$data['b'] = $this->Main_model->invoice();
		$this->load->view('dashboard/invoice', $data);
		$this->load->view('includes/admin/footer');

	}



	public function paid()
	{
		if ($this->session->userdata('user_type') !== 'admin') {
			redirect('login');
		}

		$this->load->view('includes/admin/head');
		//$this->load->view('includes/admin/header');

		$this->load->model('Main_model');
		// Get
		$edit = $this->input->get('edit');

		if(!isset($edit)){
			// get data from booking table
			$data['response'] = $this->Main_model->getRecordsById();
			$data['view'] = 1;

			// load view
			$this->load->view('dashboard/paid',$data);
		}else{
			// Check submit button POST or not
			if($this->input->post('submit') != NULL ) {
				// POST data
				$postData = $this->input->post();
				//load model
				// Update record
				$this->Main_model->paid_invoice($postData, $edit);
				//$this->Main_model->update_invoice($postData,$edit);

				$email = $this->input->post('email');
				$invoice_id= $this->input->post('invoice_id');

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
							<title>Payment Confirmed</title>
						</head>
						<body>
							<h2>Your Payment for booking No. H00$invoice_id has been Confirmed</h2>
							<p>Kindly <a href='" . site_url() . "login '>login</a> to view your booking</p>
							
					
					
						</body>
						</html>
						";


				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				$this->email->from('no-reply@hauleasy.biz', 'Hauleasy');
				$this->email->to($email);
				$this->email->subject('Your Payment Is Confirmed ');
				$this->email->message($msg);

				if ($this->email->send()) {
					$this->session->set_flashdata('paid', 'Payment Confirmed');
				}
				// Redirect page
				redirect('all_transactions');
			}

			else{
				// get data by id
				$data['response'] = $this->Main_model->getBookingById($edit);
				$data['view'] = 2;
				$this->load->view('dashboard/paid',$data);

			}
		}
		//$this->load->view('includes/admin/footer');
	}







}// end class
