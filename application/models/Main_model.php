<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model {

	// function to send email
	function send_email($email, $subject, $msg) {

		//$api_key= "key-f9c101361bccf892331187a1f07120dc";/* Api Key got from https://mailgun.com/cp/my_account */
		//$domain = "mg.lounge45.com";/* Domain Name you given to Mailgun */

		$api_key= " key-4ac02aee428e9c754f6a69840b34252b";/* Api Key got from https://mailgun.com/cp/my_account */
		$domain = "api.hauleasy.biz";/* Domain Name you given to Mailgun */

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_USERPWD, 'api:'.$api_key);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v3/'.$domain.'/messages');
		curl_setopt($ch, CURLOPT_POSTFIELDS, array(
			'from' => 'Hauleasy <no-reply@hauleasy.biz>',
			'to' => $email,
			'subject' => $subject,
			'html' => $msg
		));

		//Todo: Open up so emails can go through
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}

    // Get all user list
    function getUsersList(){
		$email=$this->session->userdata('email');
        $this->db->select('*');
		$this->db->where('email', $email);
        $q = $this->db->get('users');
        $result = $q->result_array();
        return $result;
    }

    // Get user by id
    function getUserById($id){
        $this->db->select('*');
        $this->db->where('id', $id);
        $q = $this->db->get('users');
		return $q->row_array();
    }

    // Update users profile bank details by id
    function updateUser($postData, $id)
	{
		$response = "";
		//$bank = trim($postData['bank']);
		//$account_name = trim($postData['account_name']);
		//$account_number = trim($postData['account_number']);
//		$user_image = trim($postData['user_image']);
//		$user_card = trim($postData['user_card']);

		//if ($bank != '' && $account_name != ''  && $account_number !='' ) {

			// Update
			//$value = array('bank' => $bank, 'account_name' => $account_name, 'account_number' => $account_number);
			$this->db->where('id', $id);
			$this->db->update('users', $postData);

    	//}
	}

	// Get all user list
	function getAllUser()
	{
		$this->db->select('*');
		$this->db->order_by('date', 'asc');
		$this->db->limit(10,0);
		$q = $this->db->get('users');
		$result = $q->result_array();
		return $result;
	}

	// count all users pagination
	public function record_count() {
		return $this->db->count_all("users");
	}

	// pagination
	public function fetch_data($limit, $id) {
		//$this->db->select('*');
    	$this->db->limit($limit);
		$this->db->where('id', $id);
		$query = $this->db->get("users");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}

	//select all users table for admin
	public function selectUser()
	{
		$this->db->order_by('date', 'DESC');
		//$this->db->limit(1);
		$query = $this->db->get_where('users', array('user_type' => 'user'));
		return $query;
	}

	//select all bookings
	public function viewBooking()
	{
		$this->db->order_by('date', 'DESC');
		//$this->db->limit(1);
		$query = $this->db->get('booking');
		return $query;
	}


	//select all bookings
	public function viewTransactions()
	{
		$this->db->order_by('date', 'DESC');
		$this->db->where('invoice_id >', '0');
		$query = $this->db->get('booking');
		return $query;
	}

	public function invoice()
	{
		$this->db->order_by('date', 'DESC');
		$id=$this->input->get('id');
		$this->db->select('*');
		$this->db->where('id', $id);
		$q = $this->db->get('booking');
		$result = $q;
		//return $query;
		return $result->result_array();

	}




	//select all location from
	public function selectLocationfrom()
	{
		$query = $this->db->get('location_from');
		return $query;
	}


	//select all location to
	public function selectLocationto()
	{
		$query = $this->db->get('location_to');
		return $query;
	}

	// add new location
	public function addLocationfrom($location){
		$this->db->insert('location_from', $location);
		return $this->db->insert_id();

	}

	// add new location
	public function addLocationto($location){
		$this->db->insert('location_to', $location);
		return $this->db->insert_id();

	}



	//get all successful transaction
	public function Trans()
	{
		$this->db->order_by('date',  'DESC');
		$this->db->like('paystack_status', 'success');
//		$this->db->like('month(date)', date('m'));
		$query = $this->db->get('booking');
		return $query;
	}

	//get all pending order
	public function pendingBooking()
	{
		$this->db->order_by('date',  'DESC');
		//$this->db->like('month(date)', date('m'));
		$this->db->like('status', 'pending');
		$query = $this->db->get('booking');
		return $query;
	}

	public function getRecordsById()
	{
		$id=$this->input->get('id');
		$this->db->select('*');
		$this->db->where('id', $id);
		$q = $this->db->get('booking');
		$result = $q->result_array();
		return $result;
	}

	/*Approve user by id*/
	public function update_records($postData,$id)
	{
		$response = "";
		$status = trim($postData['status']);
		if ($status != '') {
			// Update
			$value = array('status' => $status);
			$this->db->where('id', $id);
			$this->db->update('users', $value);
		}
	}


	// Get booking by id
	function getBookingById($id){
		$this->db->select('*');
		$this->db->where('id', $id);
		$q = $this->db->get('booking');
		return $q->row_array();
	}



	/* insert user invoice by id*/
	public function update_invoice1($postData, $id)
	{
		$response = "";
		$email = trim($postData['email']);
		$fname = trim($postData['fname']);
		$lname = trim($postData['lname']);
		$phone = trim($postData['phone']);
		$address_from = trim($postData['address_from']);
		$address_to = trim($postData['address_to']);
		$location_from = trim($postData['location_from']);
		$location_to = trim($postData['location_to']);
		$landmark_from = trim($postData['landmark_from']);
		$landmark_to = trim($postData['landmark_to']);
		$vehicle = trim($postData['vehicle_type']);
		$description = trim($postData['description']);
		$weight = trim($postData['weight']);
		$category = trim($postData['category']);

		$invoice_id = trim($postData['invoice_id']);
		$amount = trim($postData['amount']);
		$vat = trim($postData['vat']);
		$total = trim($postData['total']);
		$invoice_status = 'Unpaid';



		if ($invoice_id != '') {
			// Update
			$value = array('email' => $email, 'fname' => $fname, 'lname' => $lname, 'address_from' => $address_from,
				'address_to' => $address_to, 'location_from' => $location_from, 'location_to' => $location_to,
				'landmark_from' => $landmark_from, 'landmark_to' => $landmark_to, 'vehicle_type' => $vehicle,
				'description' => $description, 'weight' => $weight, 'category' => $category, 'phone' => $phone,
				'invoice_id' => $invoice_id, 'amount'=>$amount, 'vat'=>$vat, 'total'=>$total, 'invoice_status'=>$invoice_status);
			$this->db->where('id', $id);
			$this->db->insert('booking', $value);
		}
	}



	/* insert user invoice by id*/
	public function update_invoice($postData, $id)
	{
		$response = "";

		$invoice_id = trim($postData['invoice_id']);
		$amount = trim($postData['amount']);
		$vat = trim($postData['vat']);
		$total = trim($postData['total']);
		$invoice_status = 'Unpaid';

		if ($invoice_id != '') {
			// Update
			$value = array('invoice_id' => $invoice_id, 'amount'=>$amount, 'vat'=>$vat, 'total'=>$total, 'invoice_status'=>$invoice_status);
			$this->db->where('id', $id);
			$this->db->update('booking', $value);
		}
	}

	/*edit User by id*/
	public function edit_records($postData,$id)
	{
		$response = "";
		$user_image = trim($postData['user_image']);
		$user_card = trim($postData['user_card']);

		if ($user_image != '' &&  $user_card != '') {
			// Update
			$value = array('user_image' => $user_image, 'user_card' => $user_card);
			$this->db->where('id', $id);
			$this->db->update('users', $value);
		}
	}

	/*Reset User password by id*/
	public function reset_user($postData,$id)
	{
		$response = "";
		$status = trim($postData['password']);
		if ($status != '') {
			// Update
			$value['password'] = md5($status);
			//$value = array('password' => $status);
			$this->db->where('id', $id);
			$this->db->update('users', $value);
		}
	}


	// Get invoice by id
	function getInvoiceById(){
		$id=$this->input->get('id');
		$this->db->select('*');
		$this->db->where('id', $id);
		$q = $this->db->get('booking');
		return $q->row_array();
	}

	// Get invoice by id
	function InvoiceById($id){
		$this->db->select('*');
		$this->db->where('id', $id);
		$q = $this->db->get('booking');
		return $q->row_array();
	}




	/*change invoice to paid by id*/
		public function paid_invoice($postData,$id)
	{
		$response = "";
		$status = trim($postData['invoice_status']);
		$pending=trim($postData['status']);
		if ($status != '' && $pending!='') {
			// Update
			$value = array('invoice_status' => $status, 'status'=>$pending);
			$this->db->where('id', $id);
			$this->db->update('booking', $value);
		}
	}










	}// end class


