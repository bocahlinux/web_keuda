<?php
class M_slider extends CI_Model
{
	function __construct() 
	{
		parent::__construct();
		//$this->load->database();
	}
	function getActive_carousel()
	{
		$dblocal = $this->load->database('lokal',TRUE);
		$dblocal->where('aktif_slide','1');
		$dblocal->where('status_slide','1');
		$query=$dblocal->get('carousel');
		return $query->result();
	}
	function getSlider_carousel()
	{
		$dblocal = $this->load->database('lokal',TRUE);
		$dblocal->where('aktif_slide','0');
		$dblocal->where('status_slide','1');
		$query=$dblocal->get('carousel');
		return $query;
	}
}