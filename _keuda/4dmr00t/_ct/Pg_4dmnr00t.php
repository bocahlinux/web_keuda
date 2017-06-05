<?php

/*
	Kontrol Home Admin
	- Set session
	- Set login admin
*/

defined('BASEPATH') OR exit('No direct script access allowed');
	class Pg_4dmnr00t extends CI_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->helper(array('text','url','html'));
			$this->load->library(array('user_agent','session','form_validation','encryption'));
			$this->load->model('M_login','log_admin');

			
		}

		public function login()
		{
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			

			//cek sesi login, jika masih dalam sesi login diredirect ke halaman admin.
			$cek = $this->session->userdata('logged_in');
			$level = $this->session->userdata('level');
			$status = $this->session->userdata('status');
			if(!empty($cek) && $level=='admin'){
				$d['judul']="Beranda";
				$d['class'] = "home";
				
				redirect('','refresh');
			}

			//cek sesi login, jika masih dalam sesi login di redirect ke halaman khusus mahasiswa
			if(!empty($cek) && $level=='uptd')
			{
				$d['judul']="Beranda";
				$d['class'] = "home";

				redirect('','refresh');
			}

			//cek sesi login, jika masih dalam sesi login di redirect ke halaman khusus dosen
			if(!empty($cek) && $level=='pegawai')
			{
				$d['judul']="Beranda";
				$d['class'] = "home";
				
				redirect('','refresh');
			}
			
			if ($this->form_validation->run() == FALSE)
			{
				$data = array(
					'title'	=>	'.::PANEL LOGIN::.',

			        	);
		        $this->load->view('v_login',$data);	
			}
			else
			{
				$u = $this->input->post('email');
				$p = $this->input->post('password');
				$this->log_admin->getLoginData($u,$p);
			}
		}
		
		public function logout()
		{
			$this->session->sess_destroy();
			redirect('4dr00t','refresh');
		}
	}
