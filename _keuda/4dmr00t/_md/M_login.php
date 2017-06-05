<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model {

	/**
	 * Programmer : Yudha Abdi Nugroho
	 * http://bocahlinux.id || http://bocahlinux.com
	public function __construct()
	{
		parent::__construct();
		$this->encryption->initialize(
			array(
				//'driver' => 'openssl',
				'cipher' => 'ARCFour',
				'mode' => 'Stream',
				'key' => 'b0c4hl1nux.c0m'
				)
			);
	}
	 **/
	protected function enkripsi()
	{
		$this->encryption->initialize(
			array(
				//'driver' => 'openssl',
				'cipher' => 'ARCFour',
				'mode' => 'Stream',
				'key' => 'b0c4hl1nux.c0m'
				)
			);
	}
	
	function getLoginData($eml,$psw)
	{
		//$p = md5(mysql_real_escape_string($psw));
		$this->enkripsi();
		$dblocal = $this->load->database('lokal',TRUE);
		$u = $eml;
		$p = $this->encryption->encrypt($psw);
		$dblocal->select('a.*, 
						b.id,
						b.level_log,
						b.label, 
						b.owner_location,
						c.*');
		$dblocal->join('roles b','a.role_id=b.id','left');
		$dblocal->join('users c','a.user_id=c.id','left');
		$q_cek_admin = $dblocal->get_where('role_user a', array('c.email' => $u, 'c.password' => $p,'c.remember_token'==''));

		$query = $q_cek_admin->result_array();
		return $query;
	}
}