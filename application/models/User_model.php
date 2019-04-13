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

		// Check username exists
		public function check_username_exists($username){
			// what we wanna do is run a query, so we'll create a query variable and say:
			$query = $this->db->get_where('users', array('username' => $username)); // we're using active
			// record here on the table 'users' - that's where we wanna look in, and then we want an array
			// of data that we want to match, so:
			// array('username' => ) we're looking at username, and we want to match that to whatever is
			// passed in as the argument to the check_username_exists function, i.e ($username), so:
			// array('username' => $username)

			// and then we're gonna check to see if the result is empty or not
			if(empty($query->row_array())) { // $query->row_array() because it's gonna give us an array of
				// results
				return true; // if it is empty return true
			} else {
				return false;
			}
		}
	}
