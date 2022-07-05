<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

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

// function to send email and copy another
	function send_booking($email, $copy, $subject, $msg) {

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
			'cc'=>$copy,
			'subject' => $subject,
			'html' => $msg
		));

		//Todo: Open up so emails can go through
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}

	// function to send email and copy another
	function send_password($user_email, $subject, $msg) {

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
			'to' => $user_email,
			'subject' => $subject,
			'html' => $msg
		));

		//Todo: Open up so emails can go through
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}



	public function getAllUsers(){
		$query = $this->db->get('users');
		return $query->result(); 
	}

	public function insert($user){
		$this->db->insert('users', $user);
		return $this->db->insert_id(); 
	}
	//forgot password
	public function reset($user, $email){
		$code = trim($user['code']);

		if ($code != '') {
			// Update
			$value = array('code' => $code);
			//->db->where('id', $id);
			$this->db->where('email', $email);
			$this->db->update('users', $value);
		}
	}

	public function insertToken2($userInfo, $email){
		$code = trim($userInfo['code']);

		if ($code != '') {
			// Update
			$value = array('code' => $code);
			//->db->where('id', $id);
			$this->db->where('email', $email);
			$this->db->update('users', $value);
		}
	}


	public function getUserInfoByEmail2($email)
	{
		$q = $this->db->get_where('users', array('email' => $email), 1);
        if($this->db->affected_rows() > 0){
		$row = $q->row();
            return $row;
        }else{
		error_log('no user found getUserInfo('.$email.')');
		return false;
	}
    }


	public function getUserInfo2($id)
	{
		$q = $this->db->get_where('users', array('id' => $id), 1);
        if($this->db->affected_rows() > 0){
		$row = $q->row();
            return $row;
        }else{
		error_log('no user found getUserInfo('.$id.')');
		return false;
	}
    }

	//enter new password
	public function reset_password($data, $email){
		$response = "";
		$status = trim($data['password']);
		if ($status != '') {
			// Update
			$value['password'] = md5($status);
			$this->db->where('email', $email->email);
			$this->db->update('users', $value);
		}
	}

	public function getUseremail($email){
		$query = $this->db->get_where('users',array('email'=>$email));
		return $query->row_array();
	}

	public function getUser($id){
		$query = $this->db->get_where('users',array('id'=>$id));
		return $query->row_array();
	}

	public function activate($data, $id){
		$this->db->where('users.id', $id);
		return $this->db->update('users', $data);
	}


//Login Users
	public function validate($email,$password){
		$this->db->where('email',$email);
		$this->db->where('password',$password);
		$result = $this->db->get('users',1);
		return $result;
	}

	function profile()
	{
		$id = $this->session->userdata('id');
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get('users');
		$result = $query->result();
		return $result;
	}


	/*Reset Agent password by id*/
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
// add new booking
	public function addBooking($booking){
		$this->db->insert('booking', $booking);
			return $this->db->insert_id();

		}

	//select all bookings
	public function viewBooking()
	{
		$this->db->order_by('date', 'DESC');
		$email= $this->session->userdata('email');
		$this->db->where('email', $email);
		$query = $this->db->get('booking');
		return $query;
	}

	//select all bookings
	public function viewTransactions()
	{

		$this->db->order_by('date', 'DESC');
		$email= $this->session->userdata('email');
		$this->db->where('email', $email);
		$this->db->where('invoice_id >', '0');
		$query = $this->db->get('booking');
		return $query;

	}


	//select all location from
	public function selectLocationfrom()
	{
		$this->db->order_by('date', 'DESC');
		//$this->db->limit(1);
		$query = $this->db->get('location_from');
		return $query;
	}


	//select all location to
	public function selectLocationto()
	{
		$this->db->order_by('date', 'DESC');
		//$this->db->limit(1);
		$query = $this->db->get('location_to');
		return $query;
	}


	public function getUserInfoByEmail($email)
	{
		$q = $this->db->get_where('users', array('email' => $email), 1);
		if($this->db->affected_rows() > 0){
			$row = $q->row();
			return $row;
		}else{
			error_log('no user found getUserInfo('.$email.')');
			return false;
		}
	}

	public function updatePassword($post)
	{
		$this->db->where('id', $post['user_id']);
		$this->db->update('users', array('password' => $post['password']));
		$success = $this->db->affected_rows();

		if(!$success){
			error_log('Unable to updatePassword('.$post['user_id'].')');
			return false;
		}
		return true;
	}

	public function insertToken($user_id)
	{
		$token = substr(sha1(rand()), 0, 30);
		$date = date('Y-m-d');

		$string = array(
			'token'=> $token,
			'user_id'=>$user_id,
			'created'=>$date
		);
		$query = $this->db->insert_string('tokens',$string);
		$this->db->query($query);
		return $token . $user_id;

	}

	public function isTokenValid($token)
	{
		$tkn = substr($token,0,30);
		$uid = substr($token,30);

		$q = $this->db->get('tokens', array(
			'tokens.token' => $tkn,
			'tokens.user_id' => $uid), 1);

		if($this->db->affected_rows() > 0){
			$row = $q->row();

			$created = $row->created;
			$createdTS = strtotime($created);
			$today = date('Y-m-d');
			$todayTS = strtotime($today);

			if($createdTS != $todayTS){
				return false;
			}

			$user_info = $this->getUserInfo($row->user_id);
			return $user_info;

		}else{
			return false;
		}

	}


	public function getUserInfo($id)
	{
		$q = $this->db->get_where('users', array('id' => $id), 1);
		if($this->db->affected_rows() > 0){
			$row = $q->row();
			return $row;
		}else{
			error_log('no user found getUserInfo('.$id.')');
			return false;
		}
	}

	public function updateUserInfo($post)
	{
		$data = array(
			'password' => $post['password'],
//			'last_login' => date('Y-m-d h:i:s A'),
			'active' => 'verified'
		);
		$this->db->where('id', $post['user_id']);
		$this->db->update('users', $data);
		$success = $this->db->affected_rows();

		if(!$success){
			error_log('Unable to updateUserInfo('.$post['user_id'].')');
			return false;
		}

		$user_info = $this->getUserInfo($post['user_id']);
		return $user_info;
	}



}
