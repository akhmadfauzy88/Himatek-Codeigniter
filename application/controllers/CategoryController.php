<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryController extends CI_Controller {

	public function __construct()
    {
    	 parent::__construct();
        $this->load->model('category');
        if (isset($_SESSION['spicy_chicken']) && $_SESSION['spicy_chicken']['logged_in'] == TRUE) {
            
        }else{
            show_404();
        }
    }

    public function index()
    {
    	$data['Judul'] = "All Categories";
    	$data['cat'] = $this->category->get_cat();

    	$this->load->view('StaticPage/Template/header', $data);
		$this->load->view('Category/v_index');
		$this->load->view('StaticPage/Template/footer');
    }

    public function store()
    {
    	$this->form_validation->set_rules(
            'category', 
            'category', 
            'required|is_unique[categories.nama]'
        );

        if ($this->form_validation->run() === FALSE)
        {
        	$this->session->set_flashdata('error', 'Woops, sumting wongs, tri egen !!');
            redirect('categories');
        }
        else
        {
            $this->category->insert_category();
            $this->session->set_flashdata('message', 'Category berhasil diupload !!');
            redirect('categories');
        }
    }

    public function update()
    {
    	$this->form_validation->set_rules(
            'cate', 
            'cate', 
            'required|is_unique[categories.nama]'
        );

        if ($this->form_validation->run() === FALSE)
        {
        	$this->session->set_flashdata('message0', 'Woops, sumting wongs, tri egen !!');
            redirect('categories');
        }
        else
        {
            $this->category->update();
            $this->session->set_flashdata('message', 'Category berhasil diupdate !!');
            redirect('categories');
        }
    }

    public function delete($id)
    {
    	$this->category->destroy($id);

    	$this->session->set_flashdata('message', 'Category berhasil dihapus !!');
    	redirect('categories');
    }

}