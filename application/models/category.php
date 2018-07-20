<?php
class Category extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_cat()
    {
    	$query = $this->db->get('categories');
	    return $query->result_array();
    }

    public function update()
    {
    	$date = date("Y-m-d H:i:s");
			$data = array(
				'nama' => $this->input->post('cate'),
				'updated_at' => $date
			);

		$id = $this->input->post('id');

    	$this->db->where('id', $id);
		return $this->db->update('categories', $data);
    }

    public function insert_category()
    {
    	$date = date("Y-m-d H:i:s");
			$data = array(
				'nama' => $this->input->post('category'),
				'created_at' => $date,
				'updated_at' => $date
			);
		
		return $this->db->insert('categories', $data);
    }

    public function destroy($id)
    {
        $this->db->delete('categories', array('id' => $id));
    }

}