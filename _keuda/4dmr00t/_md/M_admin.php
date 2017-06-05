<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_admin extends CI_Model {

	/**
	 * Programmer : Yudha Abdi Nugroho
	 * http://bocahlinux.id || http://bocahlinux.com
	 **/
	function getVisitor($where = "")
	{
		$dblocal = $this->load->database('lokal',TRUE);
		$dblocal->select('*');
		$dblocal->where($where);
		$q = $dblocal->get('visitor');
		return $q;
	}

	function chartVisitor($grup='',$order='',$limit='')
	{
		$dblocal = $this->load->database('lokal',TRUE);
		$dblocal->select('*,SUBSTRING(tanggal,1,10) AS tanggl,COUNT(*) AS total');
		//$dblocal->where($where);
		$dblocal->group_by($grup);
		$dblocal->order_by($order);
		$dblocal->limit($limit);
		$q = $dblocal->get('visitor');
		return $q;
	}

	function getArticle($where = "")
	{
		$dblocal = $this->load->database('lokal',TRUE);
		$dblocal->select('*');
		$dblocal->where($where);
		$q = $dblocal->get('artikel');
		//$query = $q->result_array();
		return $q;
	}

	function getUser($where = "")
	{
		$dblocal = $this->load->database('lokal',TRUE);
		$dblocal->select('*');
		$dblocal->where($where);
		$q = $dblocal->get('users');
		//$query = $q->result_array();
		return $q;
	}
	
	public function visit()
	{
		$dblocal = $this->load->database('lokal',TRUE);
		return $dblocal->get('artikel');
	}
	
	function getCounterArticle()
	{
		$dblocal = $this->load->database('lokal',TRUE);
		$q = $dblocal->query("SELECT *, round((counter/(SELECT SUM(counter) FROM artikel)*100),2) AS prog FROM artikel GROUP BY id ORDER BY counter desc
			limit 5");
		return $q;
	}
}