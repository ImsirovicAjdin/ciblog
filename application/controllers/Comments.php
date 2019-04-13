<?php
	class Comments extends CI_Controller {
		public function create($post_id) {
			$slug = $this->input->post('slug');
			$data['post'] = $this->post_model->get_posts($slug); // (*)

			$this->form_validation->set_rules('name', 'Name', 'required'); // we wanna get the 'name', and the readable
			// version which is the capital N, 'Name', and then we want the rule, which is gonna be 'required'
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('body', 'Body', 'required');

			if($this->form_validation->run() === FALSE) { // if form validation hasn't run or it has failed
				$this->load->view('templates/header'); // then we just wanna reload the view
				$this->load->view('posts/view', $data); // data is (*) - so we can access the post from
				// inside the view
				$this->load->view('templates/footer');
			} else { // if everything goes ok, and it validates, then we want to call a model function, so:
				$this->comment_model->create_comment($post_id); // we'll have a fn called create_comment,
				// and it's gonna get a parameter called $post_id
				// and then we're simply gonna redirect, and we wanna redirect to the same post that we're
				// on, so we're gonna say
				redirect('posts/'.$slug); // and this will keep us on the same page

				// our form validation needs an output, and we don't have one yet on the view page, so
				// let's go to views/posts/view.php, and we're gonna add it right under the <h3>Add
				// Comment</h3> line
			}
		}
	}
