<?php
	class Category_model extends CI_Model {
		public function __construct(){
			$this->load->database();
		}

		// (3) we could have used the get_categories() from the Posts model, but because we are not doing
		// anything related to posts when we list out an index of available categories, to keep things a
		// bit cleaner we'll just do it here - we will not use the get_categories() from the Posts model!
		//$data['categories'] = $this->post_model->get_categories();
		public function get_categories() {
			$this->db->order_by('name'); // we're just ordering by name
			$query = $this->db->get('categories'); // fetching from the categories table
			return $query->result_array(); // and returning the array
		}

		public function create_category() {
			$data = array(
				'name' => $this->input->post('name')
			);

			return $this->db->insert('categories', $data);
		}
	}

