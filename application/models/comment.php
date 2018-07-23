<?php
class Comment extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function show_comment($id)
        {
        	$this->db->select('nama, comment.created_at, comment');
			$this->db->from('comment');
			$this->db->join('posts', 'posts.id = comment.post_id');
			$this->db->where('comment.post_id', $id);
			$query = $this->db->get();
			
			$data_com['komen'] = $query->result_array();
			$data_com['total'] = $query->num_rows();

			return array('komen' => $data_com['komen'], 'total' => $data_com['total']);
        }

        public function insert_comment()
	    {
	      	$date = date("Y-m-d H:i:s");
			$data = array(
				'email' => $this->input->post('email'),
				'nama' => $this->input->post('nama'),
				'comment' => $this->input->post('comment'),
				'post_id' => $this->input->post('id'),
				'created_at' => $date,
				'updated_at' => $date
			);
			
			return $this->db->insert('comment', $data);
	    }
}