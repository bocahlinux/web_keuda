<?php

/*
	Kontrol Home Admin
	- Set session
	- Set login admin
*/

defined('BASEPATH') OR exit('No direct script access allowed');
	class Pg_login extends CI_Controller 
	{
		function __construct()
		{
			parent::__construct();
			$this->load->helper(array('text','url','html'));
			$this->load->library(array('user_agent','session','form_validation','encryption'));
			$this->load->model('M_login','log_admin');
		}

		function index()
		{
			$level		= $this->session->userdata('level');
			$session	= $this->session->userdata('Log_sys');

			if($session == FALSE)
			{
				$data = array(
					'title'	=>	'.::PANEL LOGIN::.',
						);
				$this->load->view('v_login',$data);	
			}
			else
			{
				header('location:'.base_url().$this->session->userdata('lokasi'));
			}
		}

		function do_login()
	    {
	    	$this->aksi_login();
		}

		protected function aksi_login()
		{
			$u = $this->input->post('email');
			$p = $this->input->post('password');
			$check		=	$this->log_admin->getLoginData($u,$p);
			
			if(count($check)== 1)
			{
				foreach ($check as $cek) 
				{
					$nama_lengkap = $cek['name'];
					$lokasi = $cek['owner_location'];
					$level = $cek['level_log'];
					$email = $cek['email'];
					$label = $cek['label'];
	    		}
	    		$this->session->set_userdata(array
				(
					'Log_sys'		=> TRUE,
					'nama_lengkap' => $nama_lengkap,
					'lokasi' => $lokasi,
					'level' => $level,
					'email' => $email,
					'label' => $label,
				));
				echo 1;
				header('location:'.base_url().$lokasi);
			}
			else
			{
				echo 0;
				$this->session->set_flashdata('result_login', '<br>Email atau Password yang anda masukkan salah. Atau Akun Anda diblokir. Silahkan Hubungi Administrator. Hp. 0811 520 892');
				header('location:'.base_url().'l0g1n');
			}
		}
		
		function logout()
		{
			$this->session->sess_destroy();
			redirect('l0g1n','refresh');
		}
	}
