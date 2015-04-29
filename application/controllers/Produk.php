<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('application/controllers/Base.php');
class Produk extends Base {

	//construct
	public function __construct()
	{
		parent::__construct();
	}
	public function index()//menampilkan semua promo
	{
		redirect(site_url('semua'));
	}
	//semua promo
	public function semua()
	{
		$this->load->library('pagination');
		//start pagination
		$Config = array(
			'base_url'=>site_url('produk/semua'),
			'total_rows'=>$this->M_produk->countProduk(),//total active produk
			'per_page'=>12,
			'uri_segment'=>3,
			'num_link'=>9,
		);
		$Uri = $this->uri->segment(3);
		if(!$Uri)$Uri=0;
		$link = $this->pagination->create_links();
		if(!$link)$link=1;
		$this->pagination->initialize($Config);
		//end of pagination
		$Data = array(
			'title'=>'Semua Promo',
			'link'=>$link,
			'view'=>$this->M_produk->listProduk($Config['per_page'],$Uri)
		);
		return $this->basePublicView('promo/semuaPromo',$Data);
	}
	//semua promo berdasarkan main kategori
	public function kategori()
	{
		$this->load->library('pagination');
		//start pagination
		$Config = array(
			'base_url'=>site_url('produk/semua'),
			'total_rows'=>$this->M_produk->countProduk(),//total active produk
			'per_page'=>12,
			'uri_segment'=>3,
			'num_link'=>9,
		);
		$Uri = $this->uri->segment(3);
		if(!$Uri)$Uri=0;
		$link = $this->pagination->create_links();
		if(!$link)$link=1;
		$this->pagination->initialize($Config);
		//end of pagination
		$Data = array(
			'title'=>'Semua Promo',
			'link'=>$link,
			'view'=>$this->M_produk->listProduk($Config['per_page'],$Uri)
		);
		return $this->basePublicView('promo/semuaPromo',$Data);
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
			'sisa'=>$itemro,
			'promolain'=>$this->m_produk->othersPromo($produk['idToko'],true),
			'promotokolain'=>$this->m_produk->othersPromo($produk['idToko'],false)
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
//cari produk
public function cari()
{
	if(!empty($_GET['q']))
	{
		$keyword = str_replace(' ','-',$_GET['q']);
		redirect(site_url('produk/cari/'.$keyword));
	}else //after redirect
	{
		$keyword = str_replace('-',' ',$this->uri->segment(3));
		$Data = array
		(
		'carion'=>TRUE,
		'title'=>'Hasil Pencarian '.$keyword,
		'listproduk'=>$this->M_produk->cariPromo($keyword,10,0),
	);
	//view
	$this->basePublicView('promo/pencarian',$Data);
}
}
}
