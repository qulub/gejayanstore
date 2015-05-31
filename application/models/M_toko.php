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
		$this->db->join('pemilikToko','pemilikToko.idPemilik = toko.idPemilik');
		$this->db->where('pemilikToko.status','active');
		$this->db->where('toko.habisMasa <>','0000-00-00 00:00:00');//toko belum aktif
		$this->db->order_by('updatedata','DESC');
		$this->db->limit($limit,$offset);//limit offset
		$query = $this->db->get('toko');
		return $query->result_array();
	}
	//count toko
	public function countToko($status="")
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
	//toko by id pemilik
	public function tokoByIdPemilik($idpemilik)
	{
		$this->db->where('idPemilik',$idpemilik);
		$this->db->join('kategoriUsaha','kategoriUsaha.idKategoriUsaha = toko.kategoriUsaha');
		return $this->db->get('toko');//get toko
	}
	//get id toko
	public function getIdToko($idpemilik)
	{
		$this->db->where('idPemilik',$idpemilik);
		$toko = $this->db->get('toko')->row_array();//get toko
		return $toko['idToko'];
	}
}
