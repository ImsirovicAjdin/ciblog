<?php
	class User_model extends CI_Model {
		public function register($enc_password) {
			// User data array
			$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => $enc_password,
				'zipcode' => $this->input->post('zipcode')
			);

			// Once we have received the data from the form and assigned it to $data array keys, we can
			// do the insert, and the database insert is going to go into the table called 'users', and
			// we're just gonna pass in the $data

			// Insert user
			return $this->db->insert('users', $data);
		}
	}
