<?php
class M_penjual extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	//penjual can login
	public function canLogin($email,$password)
	{
		$this->db->where('email',$email);
		$this->db->where('password',md5($password));
		return $this->db->get('pemilikToko');//get pemilik toko data from database
	}
	//get penjual simple
	public function getSimplePenjual($limit="",$offset="",$status="",$q="")
	{
		if(!empty($q)){$this->db->like('namaPemilik',$q);}//pencarian
		if(!empty($status)){$this->db->where('status',$status);}//status penjual
		if(!empty($limit)&&!empty($offset)){$this->db->limit($limit,$offset);}//do limit and offset
		return $this->db->get('pemilikToko');//get data form tabel pemilik toko
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
	//det penjual simple
	public function detSimplePenjual($idpenjual)
	{
		$this->db->where('pemilikToko.idPemilik',$idpenjual);
		return $this->db->get('pemilikToko')->row_array();
	}

	//get detail penjual
	public function detPenjual($idpenjual)
	{
		$this->db->where('pemilikToko.idPemilik',$idpenjual);
		$this->db->join('toko','toko.idPemilik=pemilikToko.IdPemilik');
		return $this->db->get('pemilikToko')->row_array();
	}
	//get latest id pemilik toko
	public function latestPemilikToko()
	{
		$this->db->select('idPemilik');
		$this->db->order_by('idPemilik','DESC');
		$query = $this->db->get('pemilikToko');
		return $query['idPemilik'];//get latest id pemilik toko
	}
}
