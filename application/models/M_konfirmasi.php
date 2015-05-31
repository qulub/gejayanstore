<?php
class M_konfirmasi extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	//mendapatkan riwayat transaksi
	public function riwayat($idPemilik)
	{
		$this->db->join('pemilikToko','pemilikToko.idPemilik = transaksi.idPemilik');
		$this->db->where('transaksi.idPemilik',$idPemilik);
		$this->db->order_by('idKonfirmasi','DESC');//order berdasarkan data yang terbaru
		return $this->db->get('konfirmasi');
	}
	
}
