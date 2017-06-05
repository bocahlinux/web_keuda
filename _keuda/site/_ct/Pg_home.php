<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pg_home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('text','url','html'));
		$this->load->library(array('user_agent','session'));
		$this->load->model('M_site','site');
		$this->load->model('M_slider','slider');
		$this->load->model('M_samsat','samsat');
	}

	public function index($offset = 0)
	{

		$this->countervisitor();			

		$d['judul_page']	= $this->site->get_footer("title='singkat_judul'");
		$d['jdl_pg']		= $this->site->get_footer("title='judul-page'");
		$d['alamat_badan']	= $this->site->get_footer("title='alamat'");
        $d['footer']		= $this->site->get_footer("title='footer'");
		$d['content']		= 'site/v_isi';
		$per_pg 			= $this->site->get_footer("title='limit-ikon-berita'");

		$d['class'] 		= "home";
		$d['kueri1']		= $this->site->get_ikon_berita($per_pg,$offset,"b.id_kat= 'keuda'");
		$d['kueri2']		= $this->site->get_ikon_berita($per_pg,$offset, "b.id_kat= 'news'");
		$d['per_page']		= $per_pg;

		$d['get_aktif_slider']		= $this->slider->getActive_carousel();
		$d['get_slider']		= $this->slider->getSlider_carousel();
		$njkb_jenis = array();
		$njkb_jenis = $this->samsat->dt_jenis();
		$d_jenis = '';
		foreach($njkb_jenis as $dt)
		{
			$d_jenis .= '<option value="';
			$d_jenis .= $dt['KEND'];
			$d_jenis .= '">';
			$d_jenis .= $dt['KET'];
			$d_jenis .= '</option>';
			//$d_njkb .= '<option value="'.$dt['KET'].'">'.$dt['KET'].'</option>';
			//$d_njkb .= '<option value="'.$dt['KET'].'">'.$dt['KET'].'</option>';
		}
		$d['njkb_jenis']			= $d_jenis;
		
		$offset 			= $this->uri->segment(3);

		$this->load->view('v_home',$d);
	}

	function cari_merk()
	{
		$id['kd_jenis']	= $this->input->post('kd_jenis');

		$dbsamsat = $this->load->database('samsat',TRUE);
		$dbsamsat->SELECT('*');
		$dbsamsat->from('apkb a');
		$dbsamsat->join('ajenis b','b.jenis=a.jenis','left');
		$dbsamsat->join('msmerk c','c.kd_merk=a.kd_merk','left');
		$dbsamsat->where('b.kend',$this->input->post('kd_jenis'));
		$dbsamsat->group_by('c.ket');

		$q = $dbsamsat->get();
		$row = $q->num_rows();

		//$q = $this->db->get_where("jadwal",$id);
		if($row>0){
			$jns='';
			if ($id['kd_jenis']=='A')
			{
				$jns='SEDAN';
			}
			elseif ($id['kd_jenis']=='B')
			{
				$jns='JEEP';
			}
			elseif ($id['kd_jenis']=='C')
			{
				$jns='MINIBUS';
			}
			elseif ($id['kd_jenis']=='D')
			{
				$jns='MICROBUS';
			}
			elseif ($id['kd_jenis']=='E')
			{
				$jns='BUS';
			}elseif ($id['kd_jenis']=='F')
			{
				$jns='PICK UP';
			}elseif ($id['kd_jenis']=='G')
			{
				$jns='LIGHT TRUCK';
			}elseif ($id['kd_jenis']=='H')
			{
				$jns='TRUCK';
			}elseif ($id['kd_jenis']=='I')
			{
				$jns='ALAT KHUSUS';
			}elseif ($id['kd_jenis']=='R')
			{
				$jns='MOTOR';
			}
        	echo '<option value="">-- MERK '.$jns.' --</option>';
        
			$njkb_merk = array();
			$data='b.kend="'.$this->input->post('kd_jenis').'"';
			$njkb_merk = $this->samsat->dt_merk($data);
			foreach($njkb_merk as $dt)
			{
				echo '<option value="'.$dt['KET'].'">'.$dt['KET'].'</option>';
			}
		}
		else
		{
			echo '<option value="">-Tidak Ada Data-</option>';
		}
	}

	function cari_type()
	{

		$id['kd_jenis']	= $this->input->post('kd_jenis');
		$id['kd_merk']	= $this->input->post('kd_merk');

		$dbsamsat = $this->load->database('samsat',TRUE);
		$dbsamsat->SELECT('*');
		$dbsamsat->from('apkb a');
		$dbsamsat->join('ajenis b','b.jenis=a.jenis','left');
		$dbsamsat->join('msmerk c','c.kd_merk=a.kd_merk','left');
		$dbsamsat->where('b.kend',$this->input->post('kd_jenis'));
		$dbsamsat->where('c.ket',$this->input->post('kd_merk'));
		$dbsamsat->where('c.ket <> ""');
		$dbsamsat->group_by('a.ket');

		$q = $dbsamsat->get();
		$row = $q->num_rows();
		//$q = $this->db->get_where("jadwal",$id);
		if($row>0)
		{
			echo '<option value="">-- PILIH TYPE --</option>';
			$njkb_type = array();
			$mr='b.kend="'.$this->input->post('kd_jenis').'" and c.KET="'.$this->input->post('kd_merk').'"';
			$njkb_type = $this->samsat->dt_type($mr);
			foreach($njkb_type as $dt)
			{
				echo '<option value="'.$dt['type'].'">'.$dt['type'].'</option>';
			}
		}
		else
		{
		echo '<option value="">-Tidak Ada Data-</option>';
		}
	}

	function cari_thbuat()
	{

		$id['kd_jenis']	= $this->input->post('kd_jenis');
		$id['kd_merk']	= $this->input->post('kd_merk');
		$id['kd_type']	= $this->input->post('kd_type');

		$dbsamsat = $this->load->database('samsat',TRUE);
		$dbsamsat->SELECT('*');
		$dbsamsat->from('apkb a');
		$dbsamsat->join('ajenis b','b.jenis=a.jenis','left');
		$dbsamsat->join('msmerk c','c.kd_merk=a.kd_merk','left');
		$dbsamsat->where('b.kend',$this->input->post('kd_jenis'));
		//$dbsamsat->where('c.ket',$this->input->post('kd_merk'));
		//$dbsamsat->where('a.ket',$this->input->post('kd_type'));
		$dbsamsat->where('c.ket <> ""');
		$dbsamsat->group_by('a.ket');
		

		$q = $dbsamsat->get();
		$row = $q->num_rows();
		//$q = $this->db->get_where("jadwal",$id);
		if($row>0)
		{
			echo '<option value="">-- TAHUN BUAT --</option>';
			$njkb_thbuat = array();
			$mr='b.kend="'.$this->input->post('kd_jenis').'" and c.KET="'.$this->input->post('kd_merk').'" AND a.ket="'.$this->input->post('kd_type').'"';
			//$mr='b.kend="C" and c.KET="TOYOTA" AND a.ket="ALPHARD 2.4 2WD A/T"';
			$njkb_thbuat = $this->samsat->dt_thbuat($mr);
			foreach($njkb_thbuat as $dt)
			{
				echo '<option value="'.$dt['TH_BUAT'].'">'.$dt['TH_BUAT'].'</option>';
			}
		}
		else
		{
		echo '<option value="">-Tidak Ada Data-</option>';
		}
	}

	function cari_dt_njkb()
	{
		$kdjenis	= $this->input->post('kd_jenis');
		$kdmerk	= $this->input->post('kd_merk');
		$kdtype	= $this->input->post('kd_type');
		$thbuat	= $this->input->post('th_buat');
		$dbsamsat = $this->load->database('samsat',TRUE);
		$q = $dbsamsat->query("
			SELECT 
				b.ket AS JENIS,
				c.KET AS MERK,
				a.TIPE,
				a.TH_BUAT,
				a.KET AS TIPE,
				a.NILAI_JUAL

				FROM apkb AS a
				LEFT JOIN ajenis AS b
					ON a.JENIS=b.JENIS
				LEFT JOIN msmerk AS c
					ON a.KD_MERK=c.KD_MERK
				WHERE b.KEND='$kdjenis' AND c.ket='$kdmerk' AND a.ket='$kdtype' AND th_buat='$thbuat'

			");
		$dt['data'] = $q;
		
		$this->load->view('view_isi/v_info/v_njkb',$dt);
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
}
