<?php 
class M_produk extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	//show all categori
	public function showProduk($limit,$offset)
	{
		$this->db->limit($limit,$offset);
		$query = $this->db->get('kategoriItem');
		return $query->result_array();
	}
}