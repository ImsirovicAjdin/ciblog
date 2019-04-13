<?php
	class User_model extends CI_Model {
		public function register($enc_password) {
			$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => $enc_password,
				'zipcode' => $this->input->post('zipcode')
			);

			return $this->db->insert('users', $data);
		}

		public function check_username_exists($username){
			$query = $this->db->get_where('users', array('username' => $username));

			if(empty($query->row_array())) {
				return true;
			} else {
				return false;
			}
		}
	}
