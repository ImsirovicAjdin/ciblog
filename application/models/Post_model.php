<?php
	class Post_model extends CI_Model{
		public function __construct()
		{
			$this->load->database();
		}

		public function get_posts($slug = FALSE){
			if($slug === FALSE){

				$this->db->order_by('posts.id', 'DESC');
				$this->db->join('categories', 'categories.id = posts.category_id');
				$query = $this->db->get('posts');
				return $query->result_array();
			}

			$query = $this->db->get_where('posts', array('slug' => $slug));
			return $query->row_array();
		}

		// passing in the $post_image
		public function create_post($post_image){
			$slug = url_title($this->input->post('title'));

			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'body' => $this->input->post('body'),
				'category_id' => $this->input->post('category_id'),
				'post_image' => $post_image
			);
			return $this->db->insert('posts', $data);
		}

		public function delete_post($id) {
			$this->db->where('id', $id);
			$this->db->delete('posts');
			return true;
		}

		public function update_post() {
			$slug = url_title($this->input->post('title'));

			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'body' => $this->input->post('body'),
				'category_id' => $this->input->post('category_id')
			);

			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('posts', $data);
		}

		public function get_categories() {
			$this->db->order_by('name');
			$query = $this->db->get('categories');
			return $query->result_array();
		}

		// (1) I wanna get `posts`.`id` and order them by DESC
		// (2) I wanna join in the categories, which we did in get_posts, so I'll copy the functionality
			// (2b) instead of get_posts, we're gonna do get_where, because we only wanna get the posts from
			// (2b) this specific category, WHERE the 'category_id' is equal to the $category_id that we
			// passed in
			// (2c) and then we'll return the array
		public function get_posts_by_category($category_id) {
			$this->db->order_by('posts.id', 'DESC'); // (1)
			$this->db->join('categories', 'categories.id = posts.category_id'); // (2a)
			$query = $this->db->get_where('posts', array('category_id' => $category_id)); // (2b)
			return $query->result_array(); // (2c)
		}

	}
