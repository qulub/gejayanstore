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
		$Data = array 
		(
			'title'=>$produk['judul'],
			'view'=>$produk
			);
		$this->load->view('yussan-templategejayan/produk',$Data);
	}
}
