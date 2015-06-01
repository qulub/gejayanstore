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
	//is my transaction
	public function isMyTransaction($idTransaksi)
	{
		$this->db->where('idPemilik',$this->session->userdata('admintoko')['idPemilik']);
		$this->db->where('idTransaksi',$idTransaksi);
		$query = $this->db->get('transaksi');
		if($query->num_rows() > 0){return true;}
		else{return false;}
	}
	/*
	* FOR ADMIN
	*/
	public function transaksi($status="",$limit="",$offset="")
	{
		if(!empty($status))$this->db->where('transaksi.status',$status);
		if(!empty($limit AND $offset))$this->db->limit($limit,$offset);
		return $this->db->get('transaksi');
	}
	//get detail transaksi
	public function detailTransaksi($idtransaksi)
	{
		$this->db->where('idTransaksi',$idtransaksi);
		return $this->db->get('transaksi')->row_array();//get detail by row array
	}
	//ubah status
	public function ubahStatus($idtransaksi,$status)
	{
		$this->db->where('idTransaksi',$idtransaksi);
		return $this->db->update('transaksi',array('status'=>$status));//update status
	}
	
}
