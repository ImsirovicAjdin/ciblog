<?php
	class Users extends CI_Controller{
		public function register(){
			$data['title'] = 'Sign Up';

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists'); // (/\/\/\)
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/register', $data);
				$this->load->view('templates/footer');
			} else {
				$enc_password = md5($this->input->post('password'));

				$this->user_model->register($enc_password);

				// (*)
				// Set message before we redirect using $this->session
				// the function is called set_flashdata
				// it takes an id, we're gonna say 'user_registered', and then the 2nd parameter is gonna be
				// the message that you wanna send, so we're gonna say 'You r registered n can log in'
				$this->session->set_flashdata('user_registered', 'You are now registered and can log in');

				redirect('posts');

			}
		}

		// (/\/\/\)
		// Check if username exists
		public function check_username_exists($username) {
			// this is the actual message...
			$this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a different one');

			// ... now we need the logic for the message:
			if($this->user_model->check_username_exists($username)){
				return true;
			} else {
				return false;
			}
		}

	}
