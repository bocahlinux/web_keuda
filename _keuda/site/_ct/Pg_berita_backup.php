<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Pg_berita extends CI_Controller {
	public function __contruct()
	{
		parent::__construct();
		//$this->load->model('M_site');
	}

	public function index()
	{
		$d['judul_page'] 			= "Berita - ".$this->config->item('nama_aplikasi');
		$d['content']				= "site/view_berita/view";

		$d['class']					="berita";
		$this->load->view('v_home',$d);
	}

	function news($offset = 0){

		$this->load->helper('text');
		$berita_baru				= $this->db->query('select * from artikel where category= "news" order by id desc limit 6')->result_array();
		
		$data['judul_page']			= "Berita - ".$this->config->item('nama_aplikasi');
		$data['class']				="berita";
		$data['base'] 				= $this->config->item('base_url');
		$data['title'] 				= 'Semua Berita';
		$this->load->model('M_site');
		$total 						= $this->M_site->artikel_count();
		$per_pg 					= 6;
		$offset 					= $this->uri->segment(3);
		$this->load->library('pagination');

		$config['base_url']			= $data['base'].'pages/news';
		$config['total_rows']		= $total;
		$config['per_page']			= $per_pg;
		$config['full_tag_open'] 	= '<div class="btn-group">';
		$config['full_tag_close'] 	= '</div>';
		 
		$config['first_link'] 		= '&laquo; First';
		$config['first_tag_open'] 	= '<div class="btn prev page">';
		$config['first_tag_close'] 	= '</div>';
		 
		$config['last_link'] 		= 'Last &raquo;';
		$config['last_tag_open'] 	= '<div class="btn btn-danger next page">';
		$config['last_tag_close'] 	= '</div>';
		 
		$config['next_link'] 		= '<div class="btn btn-danger"> <i class="fa fa-arrow-right"> </i> </div>';
		$config['next_tag_open'] 	= '<div class="btn">';
		$config['next_tag_close'] 	= '</div>';
		 
		$config['prev_link'] 		= '<div class="btn btn-danger"> <i class="fa fa-arrow-left"> </i> </div>';
		$config['prev_tag_open'] 	= '<div class="btn">';
		$config['prev_tag_close']	= '</div>';
		 
		$config['cur_tag_open'] 	= '<div class="btn btn-danger active"><a href="#">';
		$config['cur_tag_close']	= '</a></div>';
		 
		$config['num_tag_open']	 	= '<div class="btn btn-danger page">';
		$config['num_tag_close']	= '</div>';

		$this->pagination->initialize($config);
		$data['pagination']			= $this->pagination->create_links();
		$data['kueri']				= $this->M_site->get_all_artikel($per_pg,$offset);
		$data['description']		= 'Semua Berita';
		$data['uri1']				= $this->uri->segment(2);
		$data['uri2']				= $this->uri->segment(3);
		$data['keyword']			= 'Semua Berita';
		$data['berita_baru']		= $berita_baru;
		$data['content']			= 'site/view_berita/view';

		$this->load->view('site/v_home',$data);

		//$data['menu']			= $this->M_site->GetParentMenu();
		//$data['footer']		= $footer[0]['content'];
		//$data['logo']			= strip_tags($logoheader[0]['content']);
		//$data['footer']		= strip_tags($footer[0]['content']);
		//$data['galeri']		= $galeri;
		//$data['link_ex']		= $link_ex;
		//$data['menu_foot']	= $menu_foot;

		//$this->load->view('home/news');
		//$this->load->view('home/footer');
	}
}