<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CommentController extends CI_Controller {

	public function __construct()
    {
    	 parent::__construct();
        $this->load->model('comment');
    }

    public function store()
    {
    	$slug = $this->input->post('slug');
    	$segment = array('blog', $slug);
    	$this->form_validation->set_rules(
            'email', 
            'Email', 
            'required'
        );

        if ($this->form_validation->run() === FALSE)
        {
        	$this->session->set_flashdata('message', 'URL tidak boleh menggunakan spasi atau sama dengan post lain');
            redirect(site_url($segment));
        }
        else
        {
            $this->comment->insert_comment();
            $this->session->set_flashdata('message', 'Comment berhasil dipost !!');
            redirect(site_url($segment));
        }
    }
}