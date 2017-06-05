<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_global extends CI_Model 
{
	function tgl_indo($tgl)
	{
		$jam = substr($tgl,11,10);
		$tgl = substr($tgl,0,10);
		$tanggal = substr($tgl,8,2);
		$bulan = $this->getBulan(substr($tgl,5,2));
		$tahun = substr($tgl,0,4);
		return $tanggal.' '.$bulan.' '.$tahun.' '.$jam;
	}
	function bln_indo($tgl)
	{
		$bulan = $this->getBulan(substr($tgl,5,2));
		$tahun = substr($tgl,0,4);
		return $bulan.' '.$tahun;
	}

	protected function ambilBln($tgl)
	{
		$exp = explode('-',$tgl);
		$tgl = $exp[1];
		$bln = $this->getBulan($tgl);
		$hasil = substr($bln,0,3);
		return $hasil;
	}
	
	protected function getBulan($bln)
	{
		switch ($bln){
			case 1: 
				return "Januari";
				break;
			case 2:
				return "Februari";
				break;
			case 3:
				return "Maret";
				break;
			case 4:
				return "April";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Juni";
				break;
			case 7:
				return "Juli";
				break;
			case 8:
				return "Agustus";
				break;
			case 9:
				return "September";
				break;
			case 10:
				return "Oktober";
				break;
			case 11:
				return "November";
				break;
			case 12:
				return "Desember";
				break;
		}
	}
}