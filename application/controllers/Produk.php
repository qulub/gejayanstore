<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('application/controllers/Base.php');
class Produk extends Base {

	//construct
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		redirect(site_url());
	}
	//single produk
	public function v()
	{
		$idItem=$this->uri->segment(3);//iditem
		$produk = $this->M_produk->getProduk($idItem);//get detail produk
		//item runs out
		$itemro = $this->itemPromoRunsOut($produk['idItem']);
		//show runs out
		$shopro = $this->ShopPromoRunsOut($produk['idToko']);
		//apakah masa promo item sudah habis
		if($shopro<0)
		{return $this->promoHabis('Masa Promo Toko Sudah Habis');}//masa promo toko sudah habis
		else if($itemro<0)
		{return $this->promoHabis('Masa Promo Produk Sudah Habis');}//masa promo produk sudah habis
		else{
			//start single
			$promoItem = $produk['habisPromo'];
			$toko = $this->M_toko->detailToko($produk['idToko']);
			$Data = array
			(
			'title'=>$produk['judul'],
			'view'=>$produk,
			'toko'=>$toko,
			'sisa'=>$itemro
		);
		$this->load->view('yussan-templategejayan/produk',$Data);
		//end of single
	}//produk masih dalam masa promo
}
//promo sudah habis
public function promoHabis($note="")
{
	$data = array
	(
	'title'=>'Masa Promo Habis',
	'note'=>$note
);
	$this->basePublicView('customnote',$data);
}
}
