<?php
	class Post_model extends CI_Model{
		public function __construct()
		{
			$this->load->database();
		}

		public function get_posts($slug = FALSE){
			if($slug === FALSE){

				$this->db->order_by('id', 'DESC');
				// (1)
				// display categories in posts' list:
				// $this->db->join('categories', 'categories.id = posts.category_id');
/* Explanation:
If we wanna add a category on posts' list (ciblog/posts URL),
we actually have to do a JOIN, so we can JOIN in the category, so we can get the name;
So in the model where we have get_posts(), we wanna join in the categories table, like this:
$this->db->join('categories', <...and the 2nd argument we say: WHERE categories.id = posts.category_id'>);
This is what's gonna match them: <...>;
PROBLEM: Since we have $this->>db->order_by('id','DESC') - the <...> is gonna be ambiguous because there's
an id in both tables, so we have to define in which table, so it's going to be:
$this->db->order_by('posts.id', 'DESC');
$this->>db->join('categories', 'categories.id = posts.category_id');
... and we'll do that in the next commit
*/

				$query = $this->db->get('posts');
				return $query->result_array();
			}

			$query = $this->db->get_where('posts', array('slug' => $slug));
			return $query->row_array();
		}

		public function create_post(){
			$slug = url_title($this->input->post('title'));

			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'body' => $this->input->post('body'),
				'category_id' => $this->input->post('category_id')
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

	}
