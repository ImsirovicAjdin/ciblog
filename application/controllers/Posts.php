<?php
	class Posts extends CI_Controller {
		public function index() {
			$data['title'] = 'Latest Posts';

			$data['posts'] = $this->post_model->get_posts();
			// print_r($data['posts']); IT WORKS, we know we're passing data along into the $data
			// variable

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

			// (1)
			// in order to populate 'Categories' dropdown, we need to fetch them from a database
			// so let's add another element to the $data array, and we'll call this 'categories':
			// and we'll set this to the post_model, and we'll have a function we'll name get_categories()
			$data['categories'] = $this->post_model->get_categories();
			// now we could create a separate categories model, and even a separate categories controller,
			// but we're just gonna keep it all in Posts.php controller
			// (3) since we're passing this $data['categories'] variable, we should have access to it in
			// the view: posts/views/create.php

			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('body', 'Body', 'required');

			if($this->form_validation->run() === FALSE){ // i.e "if the form validation doesn't run"
				$this->load->view('templates/header');
				$this->load->view('posts/create', $data);
				$this->load->view('templates/footer');
			}else{
				$this->post_model->create_post();
				redirect('posts');
			}


		}

		public function delete($id){
			//echo $id; // we're checking if the parameter is received correctly
			$this->post_model->delete_post($id);
			redirect('posts');
		}

		public function edit($slug) {
			$data['post'] = $this->post_model->get_posts($slug);

			if(empty($data['post'])){
				show_404();
			}

			$data['title'] = 'Edit Post';

			$this->load->view('templates/header');
			$this->load->view('posts/edit', $data);
			$this->load->view('templates/footer');
		}

		public function update(){
			$this->post_model->update_post(); // in the controller we want to call our model function
			// update_post() - and now we need to define it in the model
			redirect('posts');
		}
/*
		public function get_categories() {
			$this->db->order_by('name');
			$this->db->get('categories');
			return $query->result_array(); // (2) this will return the categories as an array
		}
*/
	}
