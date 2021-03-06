<?php
class Posts extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function get_posts($slug = FALSE, $id = FALSE)
        {
        	if ($slug === FALSE)
	        {
	        	$this->db->order_by('id', 'DESC');
	            $query = $this->db->get('posts');
	            return $query->result_array();
	        }else{
	        	if($slug === NULL){
	        		$query = $this->db->get_where('posts', array('id' => $id));
	        		return $query->row_array();
	        	}else{
	        		$query = $this->db->get_where('posts', array('slug' => $slug));
	        		return $query->row_array();
	        	}
	        }

        }

        public function get_author($slug)
        {
        	$this->db->select('nama');
			$this->db->from('users');
			$this->db->join('posts', 'posts.author = users.id');
			$this->db->where('posts.slug', $slug);
			$query = $this->db->get();

			return $query->row_array();
        }

        //Reserved for Category Function
        public function get_cat($id = FALSE, $slug = FALSE)
        {
        	if ($id === FALSE) {
        		$this->db->select('nama, categories.id');
				$this->db->from('categories');
				$this->db->join('posts', 'posts.category = categories.id');
				$query = $this->db->get();

				return $query->row_array();
        	}else{
        		if ($id === NULL) {
        			$this->db->select('nama, categories.id');
					$this->db->from('categories');
					$this->db->join('posts', 'posts.category = categories.id');
					$this->db->where('posts.slug', $slug);
					$query = $this->db->get();

					return $query->row_array();
        		}else{
        			$this->db->select('nama, categories.id');
					$this->db->from('categories');
					$this->db->join('posts', 'posts.category = categories.id');
					$this->db->where('posts.id', $id);
					$query = $this->db->get();

					return $query->row_array();
        		}
        		
        	}
        	
        }

        //End Reserved

        public function get_recent()
        {
        	$this->db->order_by('id', 'DESC');
        	$query = $this->db->get('posts', 3);

	        return $query->result_array();
        }

        public function insert_posts()
        {
        	$date = date("Y-m-d H:i:s");
			$data = array(
				'judul' => $this->input->post('judul'),
				'slug' => $this->input->post('slug'),
				'body' => $this->input->post('body'),
				'author' => $_SESSION['spicy_chicken']['id'],
				'category' => $this->input->post('category'),
				'created_at' => $date,
				'updated_at' => $date
			);
		
			return $this->db->insert('posts', $data);
        }

        public function edit_posts()
        {
        	$date = date("Y-m-d H:i:s");
			$data = array(
				'judul' => $this->input->post('judul'),
				'slug' => $this->input->post('slug'),
				'category' => $this->input->post('category'),
				'body' => $this->input->post('body'),
				'updated_at' => $date
			);
			
			$id = $this->input->post('id');

			$this->db->where('id', $id);
			return $this->db->update('posts', $data);
        }

        public function destroy($id)
        {
        	$this->db->delete('posts', array('id' => $id));
        }
}