<?php 
	class User_model extends CI_Model{
		public function register($enc_password){
			$data = array(
				'firstname' => $this->input->post('firstname'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => $enc_password,
				'lastname' => $this->input->post('lastname')
				
			);
			//insert user
			return $this->db->insert('users', $data);
		}

		//login user model
		public function login($username, $password){
			//validate
			$this->db->where('username', $username);
			$this->db->where('password', $password);

			$result =$this->db->get('users');

			if($result->num_rows() == 1){
				return $result->row(0)->id;
			}
			else{
				return false;
			}
		}

		//checking username
		public function check_username_exists($username){
			$query = $this->db->get_where('users', array('username'=>$username));
			if(empty($query->row_array())){
				return true;
			}
			else{
				return false;
			}
		} 
		//check email
		public function check_email_exists($email){
			$query = $this->db->get_where('users', array('email'=>$email));
			if(empty($query->row_array())){
				return true;
			}
			else{
				return false;
			}
		}
	}

 ?>