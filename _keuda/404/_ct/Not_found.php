<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class not_found extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('text','url','html'));
		$this->load->model('site/M_site','site');
	}

	public function index()
	{
		$d['judul_page'] = "404 (Not Found) - ".$this->config->item('nama_aplikasi');
		$d['content']= '404/404';

		$d['class'] = "404";
		$d['footer']				= $this->site->get_footer("title='footer'");
		$this->load->view('site/v_home',$d);

		$this->output->set_status_header('404');
	}
}
