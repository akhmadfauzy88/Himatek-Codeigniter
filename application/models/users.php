<?php
class Users extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_user($username)
    {
    	$query = $this->db->get_where('users', ['email' => $username]);
    	return $query->row_array();
    }

    public function insert_users()
    {
      	$date = date("Y-m-d H:i:s");
		$data = array(
			'email' => $this->input->post('email'),
			'nama' => $this->input->post('nama'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT, ['cost' => '10']),
			'created_at' => $date,
			'updated_at' => $date
		);
		
		return $this->db->insert('users', $data);
    }

}