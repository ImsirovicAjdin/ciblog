<?php
	class Post_model extends CI_Model{
		public function __construct()
		{
			$this->load->database();
		}

		// the second param is the limit and we'll set that by default to false, and then the $offset will
		// also be FALSE; and then what we wanna do is check to see if there's a limit passed
		public function get_posts($slug = FALSE, $limit = FALSE, $offset = FALSE){ // (--*--)
			// and we also want to see if there's a limit passed in, and there is one in Posts controller,
			// on this line:
				// controllers/Posts:
				// $data['posts'] = $this->post_model->get_posts(FALSE, $config['per_page'], $offset);
				// ok, so it's the per_page limit that's passed in there, so here we check for it:
			if($limit){ // and we just want to add the limit & the offset to our query, and we can do
				// that by saying $this->db->limit(); which takes in the $limit, and the $offset:
				$this->db->limit($limit, $offset);
			}

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
				// when we create a post we want the user_id to also be submitted
				'user_id' => $this->session->userdata('user_id'), // we wanna set 'user_id' to this
				// session's userdata('user_id')
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

		public function get_posts_by_category($category_id) {
			$this->db->order_by('posts.id', 'DESC');
			$this->db->join('categories', 'categories.id = posts.category_id');
			$query = $this->db->get_where('posts', array('category_id' => $category_id));
			return $query->result_array();
		}

	}
