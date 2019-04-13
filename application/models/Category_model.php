<?php
	class Category_model extends CI_Model {
		public function __construct(){
			$this->load->database();
		}

		public function get_categories() {
			$this->db->order_by('name');
			$query = $this->db->get('categories');
			return $query->result_array();
		}

		public function create_category() {
			$data = array(
				'name' => $this->input->post('name')
			);

			return $this->db->insert('categories', $data);
		}

		public function get_category($id) {
			$query = $this->db->get_where('categories', array('id' => $id)); // get categories WHERE 'id'
			// is equal to $id that gets passed in
			return $query->row(); // then we just want to return that query's row
		}
	}

