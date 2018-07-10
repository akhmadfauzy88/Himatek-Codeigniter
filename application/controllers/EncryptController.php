<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EncryptController extends CI_Controller {

	public function __construct()
    {
    	 parent::__construct();
        $this->load->model('users');
    }

	public function index(){
		$data['Judul'] = 'User Login';

		$this->load->view('StaticPage/Template/header', $data);
		$this->load->view('Login/v_index');
		$this->load->view('StaticPage/Template/footer');
	}

	public function check()
	{

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->form_validation->set_rules(
            'email', 
            'Email', 
            'required'
        );

		$this->form_validation->set_rules(
            'password', 
            'Password', 
            'required'
        );

		if ($this->form_validation->run() === FALSE)
        {
        	$this->session->set_flashdata('message', 'Loginnya lewat form ini ya mas / mba, bukan lewat form lain !!');
            redirect('login');
        }else{
        	$data['user'] = $this->users->get_user($username);

			if($password == $this->encryption->decrypt($data['user']['password'])){
				echo "Berhasil";
				echo "<br>";
				echo $password;
			}else{
				echo "gagal";
			}
        }

		
	}

	public function regist()
	{
		$data['Judul'] = 'Add User';

		$this->load->view('StaticPage/Template/header', $data);
		$this->load->view('Login/v_regist');
		$this->load->view('StaticPage/Template/footer');
	}

	public function user_regist()
	{
		$this->form_validation->set_rules(
            'password', 
            'Password', 
            'required|min_length[6]'
        );

		$this->form_validation->set_rules(
            'passwordf', 
            'Pass', 
            'matches[password]'
        );

        if ($this->form_validation->run() === FALSE)
        {
        	$this->session->set_flashdata('message', 'Konfirmasi password tidak sama !!');
            redirect('regist');
        }else{
        	$this->users->insert_users();
        	$this->session->set_flashdata('message', 'Pendaftaran berhasil, silahkan login');
        	redirect('regist');
        }
	}
}