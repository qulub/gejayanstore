<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('application/controllers/Base.php');
class Home extends Base {
	
	//construct
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{	
		$Data = array 
		(
			'title'=>'',
			'listproduk'=>$this->M_produk->listProduk(9,0),
			);
		$this->basePublicView('home',$Data);
	}
}
