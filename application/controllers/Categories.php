<?php

class Categories extends CI_Controller {
	// (2)
	public function index() {
		$data['title'] = 'Categories';

		$data['categories'] = $this->category_model->get_categories();

		$this->load->view('templates/header');
		$this->load->view('categories/index', $data); // we wanna load categories/index (V) and also pass
		// along our $data array
		$this->load->view('templates/footer');
	}


	// (1)
	public function create() {
		$data['title'] = 'Create Category';

		// when we submit our form, we want to validate our category name
		$this->form_validation->set_rules('name', 'Name', 'required');

		// now we need to run it through a validator
		if($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('categories/create', $data); // and we also wanna pass along our $data array
			// to the view (which includes the ['title']
			$this->load->view('templates/footer');
		} else {
			$this->category_model->create_category();
			redirect('categories');
		}
	}
}



?>
