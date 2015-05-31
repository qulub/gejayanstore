<?php
class M_transaksi extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	//mendapatkan riwayat transaksi
	public function riwayat($idPemilik)
	{
		$this->db->where('idPemilik',$idPemilik);
		$this->db->order_by('idTransaksi','DESC');//order berdasarkan data yang terbaru
		return $this->db->get('transaksi');
	}
	
}
