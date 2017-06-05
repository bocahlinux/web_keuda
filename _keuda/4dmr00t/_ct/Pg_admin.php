<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pg_admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('text','url','html'));
		$this->load->library(array('user_agent','session','form_validation','encryption'));
		$this->load->model('M_admin','admin');
		$this->load->model('M_global','global');
	}

	function index ()
	{
		//$this->chart();
		$this->admin();
	}
	function chart()
	{
		$q = $this->admin->chartVisitor()->result_array();
		foreach($q as $p)
		{
			echo "{ y: ".$this->global->tgl_indo($p['tanggl']).", a: ".$p['total']." }, ";

		}
	}
	protected function admin()
	{
		$nama		= $this->session->userdata('nama_lengkap');
		$lokasi		= $this->session->userdata('lokasi');
		$level		= $this->session->userdata('level');
		$label		= $this->session->userdata('label');
		$session	= $this->session->userdata('Log_sys');

		if($session == TRUE)
		{
			$data = array(
				'title'		=>	'.::HOME ADMIN::.',
				'class'		=>	'home',
				'nama'		=>	$nama,
				'lokasi'	=>	$lokasi,
				'level'		=>	$level,
				'label'		=>	$label,
				'tgl'		=>	$this->global->tgl_indo(date("Y-m-d")),
				'bln'		=>	$this->global->bln_indo(date("Y-m")),
				'c_article'	=>	$this->admin->getarticle("status=1 or status=0")->num_rows(),
				'c_user'	=>	$this->admin->getuser("remember_token = ")->num_rows(),

				'post' 		=> $this->admin->getCounterArticle()->result_array(),

				'v_year'	=>	$this->admin->getVisitor("
								SUBSTRING(tanggal,1,4)='".date("Y")."'")->num_rows(),
				'v_mount'	=>	$this->admin->getVisitor("
								SUBSTRING(tanggal,1,7)='".date("Y-m")."'")->num_rows(),
				'v_day'		=>	$this->admin->getVisitor("
								SUBSTRING(tanggal,1,10)='".date("Y-m-d")."'")->num_rows(),
				//'chart_bar'	=>	$this->admin->chartVisitor()->num_rows(),
				'content'	=>	'admin/view',
				'json'		=>	'home/json/chart',
				);

			$q = $this->admin->chartVisitor('tanggl','tanggl desc',30)->result_array();
			$chart_bar='';
			$chart_line='';
			foreach($q as $p)
			{
				$chart_bar 	.= "{ y: '".$this->global->tgl_indo($p['tanggl'])."', a: '".$p['total']."'},";
				$chart_line .= "{ y: '".$p['tanggl']."', a: '".$p['total']."'},";
			}
				$data['chart_bar']= $chart_bar;
				$data['chart_line']= $chart_line;

			$breadcrumb = array(
				//"Home"		=> '<li><a href="'.base_url().'keuda/admin">Home</a></li>',
				"Dashboard"	=> '<li class="active">Home Dasboard</li>'
			);
			$dt_bc = '';
			foreach($breadcrumb as $x => $x_value) 
			{
				$dt_bc .= $x_value;
			}			
			$data['breadcrumb']=$dt_bc;
			$this->load->view('admin/home/pg_top',$data);
			$this->load->view('admin/home/pg_content',$data);
			$this->load->view('admin/home/pg_bottom',$data);	
		}
		else
		{
			header('location:'.base_url());
		}
	}

	function artikel()
	{
		$nama		= $this->session->userdata('nama_lengkap');
		$lokasi		= $this->session->userdata('lokasi');
		$level		= $this->session->userdata('level');
		$label		= $this->session->userdata('label');
		$session	= $this->session->userdata('Log_sys');

		if($session == TRUE)
		{
			$data = array(
				'title'		=>	'.::HOME ADMIN::.',
				'class'		=>	'artikel',
				'nama'		=>	$nama,
				'lokasi'	=>	$lokasi,
				'level'		=>	$level,
				'label'		=>	$label,
				'tgl'		=>	$this->global->tgl_indo(date("Y-m-d")),
				'bln'		=>	$this->global->bln_indo(date("Y-m")),
				'c_article'	=>	$this->admin->getarticle("status=1 or status=0")->num_rows(),
				'c_user'	=>	$this->admin->getuser("remember_token = ")->num_rows(),

				'post' => $this->admin->getCounterArticle()->result_array(),

				'v_year'	=>	$this->admin->getVisitor("
								SUBSTRING(tanggal,1,4)='".date("Y")."'")->num_rows(),
				'v_mount'	=>	$this->admin->getVisitor("
								SUBSTRING(tanggal,1,7)='".date("Y-m")."'")->num_rows(),
				'v_day'		=>	$this->admin->getVisitor("
								SUBSTRING(tanggal,1,10)='".date("Y-m-d")."'")->num_rows(),
				//'chart_bar'	=>	$this->admin->chartVisitor()->num_rows(),
				'content'	=>	'admin/artikel/view',
				'json'		=>	'json/_blank',
				);

			$q = $this->admin->chartVisitor('tanggl','tanggl desc',30)->result_array();
			$chart_bar='';
			$chart_line='';
			foreach($q as $p)
			{
				$chart_bar .= "{ y: '".$this->global->tgl_indo($p['tanggl'])."', a: '".$p['total']."'},";
				$chart_line .= "{ y: '".$p['tanggl']."', a: '".$p['total']."'},";

			}
				$data['chart_bar']= $chart_bar;
				$data['chart_line']= $chart_line;
			
			$breadcrumb = array(
				"Home"		=> '<li><a href="'.base_url().'keuda/admin">Home</a></li>',
				"Page"		=> '<li>Page</li>',
				"Artikel"	=> '<li class="active">Artikel</li>'
			);
			$dt_bc = '';
			foreach($breadcrumb as $x => $x_value) 
			{
				$dt_bc .= $x_value;
			}
			
			$data['breadcrumb']=$dt_bc;

			$this->load->view('admin/home/pg_top',$data);
			$this->load->view('admin/home/pg_content',$data);
			$this->load->view('admin/home/pg_bottom',$data);
		}
		else
		{
			header('location:'.base_url());
		}
	}
}
