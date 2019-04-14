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
				'name' => $this->input->post('name'),
				// when we insert a new category (using our category_model, we just want to add a user ID)
				// and that's gonna be the session variable which holds our user ID so we'll get it with
				// $this->session->userdata(), and we want the user_id:
				'user_id' => $this->session->userdata('user_id')
				// so now when we add a category it should add the user
			);

			return $this->db->insert('categories', $data);
		}

		public function get_category($id) {
			$query = $this->db->get_where('categories', array('id' => $id)); // get categories WHERE 'id'
			// is equal to $id that gets passed in
			return $query->row(); // then we just want to return that query's row
		}

		public function delete_category($id) {
			$this->db->where('id', $id);
			$this->db->delete('categories');
			return true;
		}
	}

