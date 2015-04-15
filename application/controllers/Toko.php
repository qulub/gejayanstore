<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('application/controllers/Base.php');
class Toko extends Base {
	
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
