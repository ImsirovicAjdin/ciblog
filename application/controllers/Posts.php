<?php
	class Posts extends CI_Controller {
		public function index($offset = 0) { // (2) pagination config pt2 we need to pass optional $offset
			// param, by default it's gonna be 0
			// Pagination config
			$config['base_url'] = base_url() . 'posts/index/';
			// $config['total_rows'] = 200; we don't know how many total rows in the db is going to get
			// returned so there's an actual function to replace '200' in the db library:
			$config['total_rows'] = $this->db->count_all('posts'); // the count_all takes 1 param which is
			// the table, in our case, it's the `posts`
			$config['per_page'] = 3;
			$config['uri_segment'] = 3; // the uri segment
			$config['attributes'] = array('class' => 'pagination-link');

			// Init pagination
			$this->pagination->initialize($config);
			// end pagination setup

			$data['title'] = 'Latest Posts';

			$data['posts'] = $this->post_model->get_posts(FALSE, $config['per_page'], $offset); // (3)
			// pgnation, and now we need to add sth
			// here (we need to set the limit of the current page, and we need to pass in the offset). If
			// we open up the Post_model, the get_post function takes a $slug as the first parameter, which
			// by default is false, and we can't ignore this, so we need to actually put that in tas the
			// first value, which will be FALSE. The next one will be the config per page, and finally, the
			// last one will be the $offset; and now we need to go to the model and deal with those, so the
			// slug, and then we have ... (--*--) in Post_model.php

			$this->load->view('templates/header');
			$this->load->view('posts/index', $data);
			$this->load->view('templates/footer');
		}

		public function view($slug = NULL) {
			$data['post'] = $this->post_model->get_posts($slug);
			$post_id = $data['post']['id'];
			$data['comments'] = $this->comment_model->get_comments($post_id);

			if(empty($data['post'])){
				show_404();
			}

			$data['title'] = $data['post']['title'];

			$this->load->view('templates/header');
			$this->load->view('posts/view', $data);
			$this->load->view('templates/footer');
		}

		public function create() {
			// Check login
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

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

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()){
					$errors = array('error' => $this->upload->display_errors());
					$post_image = 'noimage.jpg';
				} else {
					$data = array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'] ;
				}

				$this->post_model->create_post($post_image);

				// Set message
				$this->session->set_flashdata('post_created', 'Your post has been created');
				redirect('posts');
			}


		}

		public function delete($id){
			// Check login
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			$this->post_model->delete_post($id);

			// Set message
			$this->session->set_flashdata('post_deleted', 'Your post has been deleted');
			redirect('posts');
		}

		public function edit($slug) {
			// Check login
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			$data['post'] = $this->post_model->get_posts($slug);

			// Even though the non-owner of a post can't see the edit and delete buttons,
			// they can still access the CKeditor via direct URL, so we need to guard against that too
			// Check user
			if($this->session->userdata('user_id') != $this->post_model->get_posts($slug)['user_id']){
				redirect('posts');
			}

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
			// Check login
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			$this->post_model->update_post();

			// Set message
			$this->session->set_flashdata('post_updated', 'Your post has been updated');
			redirect('posts');
		}
	}
