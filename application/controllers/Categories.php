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
			redirect('categories');
		}
	}

	public function posts($id){
		// (1) this will just get the title
		$data['title'] = $this->category_model->get_category($id)->name; // basically, we only want to get
		// the name from this; so we'll get the category, but we only wanna set the title to the 'name'

		// (2) this will fetch the posts
		// since we want to get posts, we'll be using the posts_model:
		$data['posts'] = $this->post_model->get_posts_by_category($id); // we're gonna get the posts, and
		// pass in the category id
		// now we just wanna load our templates and our view:
		$this->load->view('templates/header');
		$this->load->view('posts/index', $data); // we don't have to create a new view for this, we can just
		// use
		// the post index, so we'll just say posts/index
		$this->load->view('templates/footer');

		// NOW WE NEED TO ADD THE get_posts_by_category($id) function, inside post_model
	}
}
