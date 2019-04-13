<?php
	class Posts extends CI_Controller {
		public function index() {
			$data['title'] = 'Latest Posts';

			$data['posts'] = $this->post_model->get_posts();

			$this->load->view('templates/header');
			$this->load->view('posts/index', $data);
			$this->load->view('templates/footer');
		}

		public function view($slug = NULL) {
			$data['post'] = $this->post_model->get_posts($slug);

			if(empty($data['post'])){
				show_404();
			}

			$data['title'] = $data['post']['title'];

			$this->load->view('templates/header');
			$this->load->view('posts/view', $data);
			$this->load->view('templates/footer');
		}

		public function create() {
			$data['title'] = 'Create Post';

			$data['categories'] = $this->post_model->get_categories();

			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('body', 'Body', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('posts/create', $data);
				$this->load->view('templates/footer');
			}else{
				// Upload Image
				$config['upload_path'] = './assets/images/posts';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['max_width'] = '5000';
				$config['max_height'] = '5000';

				$this->load->library('upload', $config); // here we'll load library(), pass in 'upload',
				// and pass in that 'config' array

				// now we have to check to see if it was uploaded
				if(!$this->upload->do_upload()){ // "if it's not uploaded"
					$errors = array('error' => $this->upload->display_errors()); // set error to
					// $this->upload->display_errors()
					$post_image = 'noimage.jpg'; // default image if the user doesn't upload one
				} else { // else, if it IS uploaded
					$data = array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'] ; // $post_image is equal to the $_FILES
					// superglobal, and then we wanna get the 'userfile' cuz that's the <upload [name]>
					// that we used, and then we wanna get the 'name'. And that's gonna go inside the
					// $post_image variable
					// No we wanna insert $post_image as a database field, so we're gonna have to add that
					// field (see notes for DB updates to make this work)
				}

				// so we wanna pass in the user uploaded image if successful, and if not, we wanna pass in
				// 'noimage.jpg', so we're gonna pass it in like this:
				// BEFORE: $this->post_model->create_post();
				// NOW:
				$this->post_model->create_post($post_image); // save this, then go to M/create_post(), and
				// update it by passing it $post_image etc...
				redirect('posts');
			}


		}

		public function delete($id){
			$this->post_model->delete_post($id);
			redirect('posts');
		}

		public function edit($slug) {
			$data['post'] = $this->post_model->get_posts($slug);

			$data['categories'] = $this->post_model->get_categories();

			if(empty($data['post'])){
				show_404();
			}

			$data['title'] = 'Edit Post';

			$this->load->view('templates/header');
			$this->load->view('posts/edit', $data);
			$this->load->view('templates/footer');
		}

		public function update(){
			$this->post_model->update_post();
			redirect('posts');
		}
	}
