<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('application/controllers/Base.php');
class Kategori extends Base {

	//construct
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$Data = array(
			'title'=>'Semua Kategori',
			'mainkat'=>$this->M_produk->allMainKategori(),
			'subkat'=>$this->M_produk->allSubKategori(),
		);
		//is show kategori item
		$Data['script'] = "$('#main1').addClass='active';";
		$this->basePublicView('promo/kategori',$Data);
	}
	//show subitem
	public function sub(){
		$mainkat = str_replace('-',' ',$this->uri->segment(3));
		$sql = 'SELECT idKategoriItem,namaKategori FROM kategoriItem WHERE namaKategori = ?';
		$query = $this->db->query($sql,$mainkat);
		$query = $query->row_array();
		$Data = array(
			'title'=>$query['namaKategori'],
			'mainkat'=>$this->M_produk->allMainKategori(),
			'subkat'=>$this->M_produk->allSubKategori($query['idKategoriItem']),
		);
		//is show kategori item
		$Data['script'] = "$('#main".$query['idKategoriItem']."').addClass='active';";
		$this->basePublicView('promo/kategori',$Data);
	}
}
