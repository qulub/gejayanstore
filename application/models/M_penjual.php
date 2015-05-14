<?php
class M_penjual extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	//get data penjual
	public function getPenjual($limit="",$offset="",$status="",$q="")
	{
		if(!empty($limit)&&!empty($offset))$this->db->limit($limit,$offset);//set limit offset
		if(!empty($status))$this->db->where('status',$status);//only status tertentu
		if(!empty($q))$this->db->like('namaPemilik',$q);//search by nama pemilik
		$this->db->join('toko','toko.idPemilik=pemilikToko.IdPemilik');
		return $this->db->get('pemilikToko');
	}
	//get detail penjual
	public function detPenjual($idpenjual)
	{
		$this->db->where('pemilikToko.idPemilik',$idpenjual);
		$this->db->join('toko','toko.idPemilik=pemilikToko.IdPemilik');
		return $this->db->get('pemilikToko')->row_array();
	}
}
