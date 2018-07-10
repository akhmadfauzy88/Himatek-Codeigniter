<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PostsController extends CI_Controller {

	public function __construct()
    {
    	 parent::__construct();
        $this->load->model('posts');
    }

    public function index()
    {
    	$data['posts'] = $this->posts->get_posts();
		$data['Judul'] = 'All Posts';

		$this->load->view('StaticPage/Template/header', $data);
		$this->load->view('PostsPage/v_index', $data);
		$this->load->view('StaticPage/Template/footer');
    }

    public function view($id)
    {
    	$data['posts'] = $this->posts->get_posts(NULL, $id);
		$data['Judul'] = $data['posts']['judul'];

		$this->load->view('StaticPage/Template/header', $data);
		$this->load->view('PostsPage/v_preview', $data);
		$this->load->view('StaticPage/Template/footer');
    }

    public function create()
    {
    	$data['Judul'] = 'Create New Post';

    	$this->load->view('StaticPage/Template/header', $data);
		$this->load->view('PostsPage/v_create');
		$this->load->view('StaticPage/Template/footer');
    }

    public function upload()
    {
    	$this->form_validation->set_rules(
            'slug', 
            'Slug', 
            'alpha_dash|required|min_length[5]|max_length[255]|is_unique[posts.slug]'
        );

    	if ($this->form_validation->run() === FALSE)
        {
        	$this->session->set_flashdata('message', 'URL tidak boleh menggunakan spasi atau sama dengan post lain');
            redirect('posts/create');
        }
        else
        {
            $this->posts->insert_posts();
            $this->session->set_flashdata('message', 'Post berhasil diupload !!');
            redirect('posts');
        }
    }

    public function edit($id)
    {
    	$data['posts'] = $this->posts->get_posts(NULL, $id);
    	$data['Judul'] = 'Edit Post';

    	$this->load->view('StaticPage/Template/header', $data);
		$this->load->view('PostsPage/v_edit');
		$this->load->view('StaticPage/Template/footer');
    }

    public function update()
    {
    	$where = $this->input->post('id');
    	$slug = $this->input->post('slug');

    	$sql = 'select slug from posts where id = ?';
    	$query = $this->db->query($sql, $where);
    	$slugreq = $query->row_array();

    	if($slugreq['slug'] != $slug)
    	{
    		$this->form_validation->set_rules(
                'slug', 
                'Slug', 
                'required|alpha_dash|min_length[5]|max_length[255]|is_unique[posts.slug]'
            );
    	}else{
    		$this->form_validation->set_rules(
                'slug', 
                'Slug', 
                'required|alpha_dash|min_length[5]|max_length[255]'
            );
    	}

    	if ($this->form_validation->run() === FALSE)
        {
    		$this->session->set_flashdata('message', 'URL tidak boleh menggunakan spasi atau sama dengan post lain');

            redirect('posts');

        }else{
            $this->posts->edit_posts();
            $this->session->set_flashdata('message', 'Post berhasil diedit !!');
            redirect('posts');
        }
    }

    public function destroy($id)
    {
    	$this->posts->destroy($id);
        redirect('posts');
    }
}