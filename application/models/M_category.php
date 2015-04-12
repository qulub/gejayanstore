<?php 
class M_category extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	//show all categori
	public function showCategories($limit)
	{
		$this->db->limit($limit,0);
		$query = $this->db->get('kategoriItem');
		return $query->result_array();
	}
}