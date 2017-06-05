<?php
class M_samsat extends CI_Model
{
	function __construct() 
	{
		parent::__construct();
		//$this->load->database();
	}

	function dt_jenis()
	{
		$dbsamsat = $this->load->database('samsat',TRUE);
		$dbsamsat->group_by('kend');
		$q = $dbsamsat->get('ajenis');
		return $q->result_array();
	}
	
	function dt_merk($mr)
	{
		$dbsamsat = $this->load->database('samsat',TRUE);
		$dbsamsat->select('a.jenis,b.KET,
				b.KEND,
				c.KET ,
				a.KD_MERK,
				a.ket ,
				a.TH_BUAT,
				a.NILAI_JUAL');
		$dbsamsat->join('ajenis b','b.jenis=a.jenis','left');
		$dbsamsat->join('msmerk c','c.kd_merk=a.kd_merk','left');
		$dbsamsat->where($mr);
		$dbsamsat->where('c.ket <> ""');
		$dbsamsat->group_by('c.ket');
		$dbsamsat->order_by('c.ket', 'asc');
		$q = $dbsamsat->get('apkb a');
		return $q->result_array();
	}

	function dt_type($mr)
	{
		$dbsamsat = $this->load->database('samsat',TRUE);
		$dbsamsat->select('a.jenis,b.KET AS JENIS,
				b.KEND,
				c.ket as MERK,
				a.KD_MERK,
				a.ket as type,
				a.TH_BUAT,
				a.NILAI_JUAL');
		$dbsamsat->join('ajenis b','b.jenis=a.jenis','left');
		$dbsamsat->join('msmerk c','c.kd_merk=a.kd_merk','left');
		$dbsamsat->where($mr);
		$dbsamsat->where('c.ket <> ""');
		$dbsamsat->group_by('a.ket');
		$dbsamsat->order_by('a.ket', 'asc');
		$q = $dbsamsat->get('apkb a');
		return $q->result_array();
	}

	function dt_thbuat($mr)
	{
		$dbsamsat = $this->load->database('samsat',TRUE);
		$dbsamsat->select('a.jenis,b.KET AS JENIS,
				b.KEND,
				c.ket as MERK,
				a.KD_MERK,
				a.ket as type,
				a.TH_BUAT,
				a.NILAI_JUAL');
		$dbsamsat->join('ajenis b','b.jenis=a.jenis','left');
		$dbsamsat->join('msmerk c','c.kd_merk=a.kd_merk','left');
		$dbsamsat->where($mr);
		$dbsamsat->where('c.ket <> ""');
		$dbsamsat->group_by('a.th_buat');
		$dbsamsat->order_by('a.th_buat', 'asc');
		$q = $dbsamsat->get('apkb a');
		return $q->result_array();
	}
	
}