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
	//isi form
	public function isiform()
	{
		if(!empty($_POST['setuju']) AND $_POST['setuju']==TRUE)
		{
			$Data = array(
				'title'=>'Isi Formulir Pendaftaran'
				);
			return $this->basePublicView('register/isifile',$Data);
		}else
		{
			$this->toko();
		}
	}
}
