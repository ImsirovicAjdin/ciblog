<?php
	class Comment_model extends CI_Model {
		public function __construct()
		{
			$this->load->database();
		}

		public function create_comment($post_id) { // this function will be passed the post id
			// now I wanna create an array to submit data, so:
			$data = array(
				'post_id' => $post_id,
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'body' => $this->input->post('body')
			);
			// then we need to insert it, so we're gonna say:
			return $this->db->insert('comments', $data); // here we pass in the table we wanna submit to,
			// which is 'comments'
			// and we also wanna add the $data, and that'll do our INSERT
		}
	}
