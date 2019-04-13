<?php

class Categories extends CI_Controller {
	public function index() {
		$data['title'] = 'Categories';

		$data['categories'] = $this->category_model->get_categories();

		$this->load->view('templates/header');
		$this->load->view('categories/index', $data);
		$this->load->view('templates/footer');
	}


	public function create() {
		$data['title'] = 'Create Category';

		$this->form_validation->set_rules('name', 'Name', 'required');

		// now we need to run it through a validator
		if($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('categories/create', $data);
			// to the view (which includes the ['title']
			$this->load->view('templates/footer');
		} else {
			$this->category_model->create_category();

			// Set message
			$this->session->set_flashdata('category_created', 'Your category has been created');
			redirect('categories');
		}
	}

	public function posts($id){
		$data['title'] = $this->category_model->get_category($id)->name;

		$data['posts'] = $this->post_model->get_posts_by_category($id);
		$this->load->view('templates/header');
		$this->load->view('posts/index', $data);
		$this->load->view('templates/footer');
	}
}
