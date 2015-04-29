<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('application/controllers/Base.php');
class Toko extends Base {

	//construct
	public function __construct()
	{
		parent::__construct();
		$this->load->library('M_toko');
	}
	public function index()
	{
		redirect(site_url('toko/semua'));
	}
	//semua toko
	public function semua()
	{
		$this->load->library('pagination');
		//start pagination
		$Config = array(
			'base_url'=>site_url('Toko/semua'),
			'total_rows'=>$this->M_toko->countToko(),//total active produk
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
			'view'=>$this->M_toko->listToko($Config['per_page'],$Uri)
		);
		return $this->basePublicView('toko/semuaToko',$Data);
	}
	//single produk
	public function v()
	{
		$idToko=$this->uri->segment(3);//iditem
		$toko = $this->M_toko->detailToko($idToko);//get detail toko
		$Data = array(
			'title'=>$toko['namaToko'],
			'view'=>$toko,
			'listproduk'=>$this->M_produk->listProdukToko(9,0,$idToko),
			);
		$this->basePublicView('tokoitem',$Data);//toko
	}
}
