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
		$this->db->where('transaksi.idPemilik',$idPemilik);
		$this->db->join('transaksi','transaksi.idTransaksi = konfirmasiPembayaran.idTransaksi');
		$this->db->join('pemilikToko','pemilikToko.idPemilik = transaksi.idPemilik');
		$this->db->order_by('idKonfirmasiPembayaran','DESC');//order berdasarkan data yang terbaru
		return $this->db->get('konfirmasiPembayaran');
	}
	/*
	* FOR ADMIN
	*/
	public function konfirmasi($status='',$limit='',$offset='')
	{
		if(!empty($status))$this->db->where('transaksi.status',$status);
		if(!empty($limit AND $offset))$this->db->limit($limit,$offset);
		$this->db->join('transaksi','transaksi.idTransaksi = konfirmasiPembayaran.idTransaksi');
		$this->db->order_by('idKonfirmasiPembayaran','DESC');//order berdasarkan data yang terbaru
		return $this->db->get('konfirmasiPembayaran');
	}
}
