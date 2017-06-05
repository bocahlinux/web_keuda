<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Pg_berita extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('text','url','html'));		
		$this->load->library(array('encrypt','pagination','user_agent','session'));


		$this->load->model('M_site','site');
		$this->load->model('Model_global','global');
	}

	public function index()
	{
		$d['class']					= "berita";
		$d['footer']				= $this->site->get_footer("title='footer'");
		$d['judul_page']			= "Berita - ".$this->config->item('nama_aplikasi');
		$d['content']				= "site/view_berita/view";
		$this->load->view('v_home',$d);
	}

	function news($offset = 0){	
		//$this->load->model('M_site','site');
		
		$data['judul_page'] 		= "Berita - ".$this->config->item('nama_aplikasi');
		$data['footer']				= $this->site->get_footer("title='footer'");
		$data['class']				= "berita";
		$data['title'] 				= 'Semua Berita';
		$data['base'] 				= $this->config->item('base_url');
		$total 						= $this->site->artikel_count();
		$per_pg 					= $this->site->get_footer("title='limit-page'");
		$limit_news					= $this->site->get_footer("title='limit-news-berita'");
		$offset						= $this->uri->segment(3);
		
		$berita_baru				= $this->site->getBerita_Popular($limit_news);

		$config['base_url']			= $data['base'].'page/berita';
		$config['total_rows']		= $total;
		$config['per_page']			= $per_pg;
		$config['full_tag_open']	= '<ul class="pagination pagination-lg">';
		$config['full_tag_close']	= '</ul>';
		 
		$config['first_link'] 		= '&laquo; First';
		$config['first_tag_open'] 	= '<li class="prev page">';
		$config['first_tag_close'] 	= '</li>';
		 
		$config['last_link'] 		= 'Last &raquo;';
		$config['last_tag_open'] 	= '<li class="next page">';
		$config['last_tag_close'] 	= '</li>';
		 
		$config['next_link'] 		= '<i class="icon-angle-right"></i>';
		$config['next_tag_open'] 	= '<li class="next page">';
		$config['next_tag_close'] 	= '</li>';
		 
		$config['prev_link'] 		= '<i class="icon-angle-left"></i>';
		$config['prev_tag_open'] 	= '<li class="prev page">';
		$config['prev_tag_close']	= '</li>';
		 
		$config['cur_tag_open'] 	= '<li class="active"><a href="">';
		$config['cur_tag_close']	= '</a></li>';
		 
		$config['num_tag_open'] 	= '<li class="page">';
		$config['num_tag_close']	= '</li>';

		$this->pagination->initialize($config);

		$data['pagination']			= $this->pagination->create_links();
		$data['kueri']				= $this->site->get_all_artikel($per_pg,$offset);
		$data['get_kategori']		= $this->site->get_kategori_artikel();
		
		$data_konten				= $this->site->get_all_artikel($per_pg,$offset);
		foreach ($data_konten as $g) 
		{
			$tgl 					= $g->date;
			$namahari       		= date('D',strtotime($tgl));
            if ($namahari == "Sunday") $namahari = "Minggu";
                else if ($namahari == "Mon") $namahari = "Senin";
                else if ($namahari == "Tue") $namahari = "Selasa";
                else if ($namahari == "Wed") $namahari = "Rabu";
                else if ($namahari == "Thu") $namahari = "Kamis";
                else if ($namahari == "Fri") $namahari = "Jumat";
                else if ($namahari == "Sat") $namahari = "Sabtu";
		}

		$data['tgl_berita']			= $this->global->tgl_indo($tgl);
		$data['hari']				= $namahari;

		$data['description']		= 'Semua Berita';
		$data['keyword']			= 'Semua Berita';
		$data['berita_baru']		= $berita_baru;
		$data['uri1']				= $this->uri->segment(2);
		$data['uri2']				= $this->uri->segment(3);
		$data['content']			= 'site/view_berita/view';

		$this->load->view('site/v_home',$data);
	}

	function view_berita($kat,$slug = ''){
		$this->countervisitor();
		$data_konten	= $this->site->getArtikel("a.slug= '$slug'");

		$kode 			= $this->uri->segment(4);

		$limit_news					= $this->site->get_footer("title='limit-news-berita'");

		$tanggal        = $this->global->tgl_indo($data_konten[0]['date']);
        $namahari       = date('D',strtotime($tanggal));
        if ($namahari == "Sunday") $namahari = "Minggu";
            else if ($namahari == "Mon") $namahari = "Senin";
            else if ($namahari == "Tue") $namahari = "Selasa";
            else if ($namahari == "Wed") $namahari = "Rabu";
            else if ($namahari == "Thu") $namahari = "Kamis";
            else if ($namahari == "Fri") $namahari = "Jumat";
            else if ($namahari == "Sat") $namahari = "Sabtu";

		$data = array(
		'footer'		=> $this->site->get_footer("title='footer'"),
		'title'			=> strip_tags($data_konten[0]['title']),
		'description'	=> strip_tags(character_limiter($data_konten[0]['content'], 500)),
		'keyword'		=> strip_tags($data_konten[0]['title']),
		'uri1'			=> $this->uri->segment(2),
		'uri2'			=> $this->uri->segment(3),
		
		'kode'			=> $data_konten[0]['id'],
		'judul_page'	=> "Berita - ".$data_konten[0]['title'],
		
		'judul'			=> $data_konten[0]['title'],
		'kategori'		=> $data_konten[0]['kategori'],
		'counter'		=> $data_konten[0]['counter'],

		'slug'			=> $data_konten[0]['slug'],
		'tgl_berita'	=> $this->global->tgl_indo($data_konten[0]['date']),
		'hari'			=> $namahari,
		'time'			=> $data_konten[0]['time'],
		'author'		=> $data_konten[0]['author'],
		'images'		=> $data_konten[0]['img_header'],
		'isi_berita'	=> $data_konten[0]['content'],
		'berita_baru'	=> $this->site->getBerita_Popular($limit_news),

		'get_kategori'	=> $this->site->get_kategori_artikel(),
		'class'			=> "berita",
		'content'		=> 'site/view_berita/v_detail_berita',
		);

		$this->cookiesetter($kode);
		$this->load->view('site/v_home', $data);
	}
	
	function view_kategori_berita($offset=0){		
		$cat 						= $this->uri->segment(3);
		$limit_news					= $this->site->get_footer("title='limit-news-berita'");
		$berita_baru				= $this->site->getBerita_Popular($limit_news);

		foreach ($berita_baru as $g) 
		{
			$tanggal        = $g->date;
	        $namahari       = date('D',strtotime($tanggal));
	        if ($namahari == "Sunday") $namahari = "Minggu";
	            else if ($namahari == "Mon") $namahari = "Senin";
	            else if ($namahari == "Tue") $namahari = "Selasa";
	            else if ($namahari == "Wed") $namahari = "Rabu";
	            else if ($namahari == "Thu") $namahari = "Kamis";
	            else if ($namahari == "Fri") $namahari = "Jumat";
	            else if ($namahari == "Sat") $namahari = "Sabtu";
		}

		$data['footer']				= $this->site->get_footer("title='footer'");
		$data['judul_page'] 		= "Berita - ".$this->config->item('nama_aplikasi');
		$data['class']				= "berita";
		$data['title'] 				= 'Semua Berita';
		$data['base'] 				= $this->config->item('base_url');
		$total 						= $this->site->artikel_count_perkat($cat);
		$per_pg 					= $this->site->get_footer("title='limit-page'");
		$offset 					= $this->uri->segment(4);

		$config['base_url']			= $data['base'].'page/kategori/'.$cat;
		$config['total_rows']		= $total;
		$config['per_page']			= $per_pg;
		$config['full_tag_open'] 	= '<ul class="pagination pagination-lg">';
		$config['full_tag_close']	= '</ul>';
		 
		$config['first_link'] 		= '&laquo; First';
		$config['first_tag_open'] 	= '<li class="prev page">';
		$config['first_tag_close'] 	= '</li>';
		 
		$config['last_link'] 		= 'Last &raquo;';
		$config['last_tag_open'] 	= '<li class="next page">';
		$config['last_tag_close'] 	= '</li>';
		 
		$config['next_link'] 		= '<i class="icon-angle-right"></i>';
		$config['next_tag_open'] 	= '<li class="next page">';
		$config['next_tag_close'] 	= '</li>';
		 
		$config['prev_link'] 		= '<i class="icon-angle-left"></i>';
		$config['prev_tag_open'] 	= '<li class="prev page">';
		$config['prev_tag_close']	= '</li>';
		 
		$config['cur_tag_open'] 	= '<li class="active"><a href="">';
		$config['cur_tag_close']	= '</a></li>';
		 
		$config['num_tag_open'] 	= '<li class="page">';
		$config['num_tag_close']	= '</li>';

		$this->pagination->initialize($config);

		$data['pagination']			= $this->pagination->create_links();
		$data['kueri']				= $this->site->get_artikel_perkat($cat,$per_pg,$offset);
		$data['get_kategori']		= $this->site->get_kategori_artikel();
		$data['tgl_berita']			= $this->global->tgl_indo($tanggal);
		$data['hari']				= $namahari;

		$data['description']		= 'Semua Berita';
		$data['keyword']			= 'Semua Berita';
		$data['berita_baru']		= $berita_baru;
		$data['uri1']				= $this->uri->segment(2);
		$data['uri2']				= $this->uri->segment(3);
		$data['content']			= 'site/view_berita/view';

		$this->load->view('site/v_home',$data);
	}

	private function countervisitor()
	{
		if($this->agent->is_browser()){
			$agent = $this->agent->browser().' '.$this->agent->version();
		}elseif ($this->agent->is_robot()){
			$agent = $this->agent->robot();
		}elseif ($this->agent->is_mobile()){
			$agent = $this->agent->mobile();
		}else{
			$agent = 'Unidentified User Agent';
		}

		$data_visitor = $this->site->GetVisitor("where ip = '".$_SERVER['REMOTE_ADDR']."'")->result_array();
		if($data_visitor == NULL){
			$data = array(
				'ip' => $_SERVER['REMOTE_ADDR'],
				'os' => $this->agent->platform(),
				'browser' => $agent,
				'tanggal' => date("Y-m-d H:i:s")
			);
			$this->site->InsertData('visitor',$data);
			$this->session->set_userdata('keuda',"Badan Keuangan Daerah");
			setcookie("keuda",'Badan Keuangan Daerah', time()+3600*24);
		}else{
			if(!isset($_COOKIE['keuda'])){
				$data_visitor = $this->site->GetVisitor("where ip = '".$_SERVER['REMOTE_ADDR']."' and tanggal = '".date("Y-m-d H:i:s")."'");
				if($data_visitor != NULL){
					if(!$this->session->userdata('midun.com')){
						$data = array(
							'ip' => $_SERVER['REMOTE_ADDR'],
							'os' => $this->agent->platform(),
							'browser' => $agent,
							'tanggal' => date("Y-m-d H:i:s")
						);
						$this->site->InsertData('visitor', $data);
						$this->session->set_userdata('keuda',"Badan Keuangan Daerah");
						setcookie("keuda",'Badan Keuangan Daerah', time()+3600*24);
					}else{
						setcookie("keuda",'Badan Keuangan Daerah', time()+3600*24);
					}
				}else{
					$data = array(
							'ip' => $_SERVER['REMOTE_ADDR'],
							'os' => $this->agent->platform(),
							'browser' => $agent,
							'tanggal' => date("Y-m-d H:i:s")
					);
					$this->site->InsertData('visitor', $data);
					$this->session->set_userdata('keuda',"Badan Keuangan Daerah");
					setcookie("keuda",'Badan Keuangan Daerah', time()+3600*24);
				}
			}
		}
	}

	private function cookiesetter($kode = 0){
		if(!isset($_COOKIE[$kode])){
			$content = $this->site->GetContent("where slug = '$kode'")->result_array();
			$result = $this->site->UpdateData('artikel',array('counter' => ($content[0]['counter']+1)),array('slug'=>$kode));
			if($result == 1){
				setcookie($kode,"Badan Keuangan Daerah", time()+3600);
			}
		}
	}
}