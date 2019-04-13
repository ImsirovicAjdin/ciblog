<?php
	class Users extends CI_Controller{
		public function register(){
			$data['title'] = 'Sign Up';

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/register', $data);
				$this->load->view('templates/footer');
			} else {
				// Encrypt password
				// md5() function will encrypt whatever we pass to it
					// we want the value of the form so we say $this input from post, and we want this to
					// be the password field
				$enc_password = md5($this->input->post('password'));

				// so that should encrypt it and then we want to call our user model to actually do the
				// submission because the model is where you do all the database interaction, so let's call
				// the user model, and we're gonna have a function in there called register(); and we just
				// wanna pass in the encrypted password; we could have done the password encryption in the
				// model and not have passed it in but I like to follow some of the MVC rules, and that is,
				// anything that has not to do with the database such as insert select and all that, that
				// stuff should go in the model; anything that's not that should go in the controller
				// including encryption so that's why I'm doing it here - you could just as well do it in
				// the model
				$this->user_model->register($enc_password);

				// after that, we want to redirect to let's say the post page:
				redirect('post');

			}
		}
	}
