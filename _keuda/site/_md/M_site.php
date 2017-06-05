<?php
class M_site extends CI_Model
{
	function __construct() 
	{
		parent::__construct();
		//$this->load->database();
	}

	/*get menu */
	function get_menu()
	{
		$dblocal = $this->load->database('lokal',TRUE);

		$dblocal->where('parent_id=0 and status=1');
		$dblocal->order_by('menu_id','asc');
		$query=$dblocal->get("menu");
		return $query->result();
	}	/*get menu */
	
	function get_footer($ket)
	{
		//$this->db->where('title="'.$ket.'"');
		$dblocal = $this->load->database('lokal',TRUE);
		
		$q= $dblocal->get_where('setting',$ket);
		foreach($q->result() as $dt){
			$hasil = $dt->content;
		}
		return $hasil;
	}

	/* Hitung Artikel Seluruhnya */
	function artikel_count()
	{
		$dblocal = $this->load->database('lokal',TRUE);
		$dblocal->join('kat_artikel b','b.id_kat=a.id_kat','left');
		$dblocal->where('a.status = 1');
		$dblocal->order_by('a.id_kat','desc');
		return $dblocal->count_all_results('artikel a');
	}

	/* Hitung Artikel per kategori */
	function artikel_count_perkat($cat)
	{
		$dblocal = $this->load->database('lokal',TRUE);
		$dblocal->join('kat_artikel','kat_artikel.id_kat=artikel.id_kat','left');
		$dblocal->where('kat_artikel.kategori="'.$cat.'" and artikel.status = 1');
		$dblocal->order_by('artikel.id','desc');
		return $dblocal->count_all_results('artikel');
	}

	/* Ambil Artikel per kategori */
	function getArtikel_kategori($cat)
	{
		$dblocal = $this->load->database('lokal',TRUE);
		$dblocal->join('kat_artikel b','b.id_kat=a.id_kat','left');
		$dblocal->where('b.kategori="'.$cat.'" and a.status = 1');
		$dblocal->order_by('a.id_kat','desc');
		$query = $dblocal->get('artikel a');
		return $query->result();
	}

	/* Ambil Artikel Untuk Ikon Saja */
	function get_ikon_berita($per_pg,$offset,$where)
	{
		$dblocal = $this->load->database('lokal',TRUE);
		$dblocal->where($where);
		$dblocal->join('kat_artikel b','b.id_kat=a.id_kat','left');
		$dblocal->order_by('b.id_kat','desc');
		$query = $dblocal->get('artikel a',$per_pg,$offset);
		return $query->result();
	}

	/* Ambil Detail Artikel */
	function getArtikel($where= '')
	{
		$dblocal = $this->load->database('lokal',TRUE);
		$dblocal->where($where);
		$dblocal->join('kat_artikel b','b.id_kat=a.id_kat','left');
		$query = $dblocal->get('artikel a');
		return $query->result_array();
	}
	
	function getBerita_Popular($limit)
	{
		//$this->db->where('id_kat','1');
		$dblocal = $this->load->database('lokal',TRUE);
		$dblocal->order_by('a. counter','desc');
		$dblocal->join('kat_artikel b','b.id_kat=a.id_kat','left');
		$dblocal->limit($limit);
		$query=$dblocal->get('artikel a');
		return $query->result();
	}

	/* Get Kategori (sidebar) */
	function get_kategori_artikel()
	{
		$dblocal = $this->load->database('lokal',TRUE);
		$dblocal->join('kat_artikel b','b.id_kat=a.id_kat','left');
		$dblocal->where('a.status = 1');
		$dblocal->group_by('a.id_kat');
		$dblocal->order_by('a.id_kat','asc');
		$query = $dblocal->get('artikel a');
		return $query->result();
	}
	
	/* Pagging Seluruh Artikel */
	function get_all_artikel($per_pg,$offset)
	{
		$dblocal = $this->load->database('lokal',TRUE);
		$dblocal->join('kat_artikel b','b.id_kat=a.id_kat','left');
		$dblocal->where('a.status = 1');
		$dblocal->order_by('a.date' and 'a.time','desc');
		$query = $dblocal->get('artikel a',$per_pg,$offset);
		return $query->result();
	}

	/* Pagging Per Kategori */
	function get_artikel_perkat($cat,$per_pg,$offset)
	{
		$dblocal = $this->load->database('lokal',TRUE);
		$dblocal->join('kat_artikel b','b.id_kat=a.id_kat','left');
		$dblocal->where('b.kategori="'.$cat.'" and a.status = 1');
		$dblocal->order_by('a.id_kat','desc');
		$query = $dblocal->get('artikel a',$per_pg,$offset);
		return $query->result();
	}

	function GetVisitor($where = "")
	{
		$dblocal = $this->load->database('lokal',TRUE);
		return $dblocal->query("select * from visitor $where");		
	}

	function InsertData($table,$data){
		$dblocal = $this->load->database('lokal',TRUE);
		return $dblocal->insert($table,$data);
	}

	function GetContent($where = ''){
		$dblocal = $this->load->database('lokal',TRUE);
		return $dblocal->query("select * from artikel $where;");
	}

	function UpdateData($table,$data,$where){
		$dblocal = $this->load->database('lokal',TRUE);
		return $dblocal->update($table,$data,$where);
	}

}