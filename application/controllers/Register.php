<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('application/controllers/Base.php');
class Register extends Base {

	//construct
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{

	}
	//register toko
	public function toko()
	{
		$Data = array(
			'title'=>'Tambah Toko'
		);
		return $this->basePublicView('register/toko',$Data);
	}
	//register pelanggan
	public function pelanggan()
	{

	}
}
