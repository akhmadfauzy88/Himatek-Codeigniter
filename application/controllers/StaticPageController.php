<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StaticPageController extends CI_Controller {

	public function __construct()
    {
    	parent::__construct();
        $this->load->model('posts');
        $this->load->model('comment');
    }

	public function index()
	{
		$data['posts'] = $this->posts->get_posts();
		$data['Judul'] = 'Home';

		$this->load->view('StaticPage/Template/header', $data);
		$this->load->view('StaticPage/v_index', $data);
		$this->load->view('StaticPage/Template/footer');
	}

	public function about()
	{

		$data['Judul'] = 'About US';

		$this->load->view('StaticPage/Template/header', $data);
		$this->load->view('StaticPage/v_about', $data);
		$this->load->view('StaticPage/Template/footer');
	}

	public function blog($slug)
	{
		$data['posts'] = $this->posts->get_posts($slug);
		$data['recent'] = $this->posts->get_recent();
		$data['Judul'] = $data['posts']['judul'];
		
		$id = $data['posts']['id'];

		$data['cate'] = $this->posts->get_cat(NULL, $slug);
		$data['commen'] = $this->comment->show_comment($id);
		$data['author'] = $this->posts->get_author($slug);

		if($data['posts']['slug'] == NULL){
			show_404();
		}

		$this->load->view('StaticPage/Template/header', $data);
		$this->load->view('StaticPage/v_blog');
		$this->load->view('StaticPage/Template/footer');
	}
}
