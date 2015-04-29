<?php
class M_toko extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	//show all toko //sort by update date
	public function listToko($limit,$offset)
	{
		$this->db->order_by('updatedata','DESC');
		$this->db->limit($limit,$offset);//limit offset
		$query = $this->db->get('toko');
		return $query->result_array();
	}
	//count toko
	public function countToko()
	{
		$this->db->order_by('updatedata','DESC');
		$query = $this->db->get('toko');
		return $query->num_rows();
	}
	//detail toko
	public function detailToko($idtoko)
	{
		$this->db->order_by('updatedata','DESC');
		$this->db->where('idToko',$idtoko);
		$query = $this->db->get('toko');
		return $query->row_array();
	}
}
