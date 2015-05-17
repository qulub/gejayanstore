<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('application/controllers/Base.php');
class Dashboard extends Base {//dashboard controller created for shop owner

	//construct
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('M_penjual'));//auto load model
		if($this->uri->uri_string() != site_url('dashboard'))//is admin toko logged in
		{
			if(empty($this->session->userdata('admintoko')))redirect(site_url('home/login'));//back to login page
		}
	}
	//index menampilkan semua promo and status
	public function index()
	{
	$Data = array
	(
		'title'=>'Dashboard',

	);
	return $this->basePublicView('dashboard/index',$Data);
	}
	//olah data promo
	public function promo()
	{

	}
	//olah data toko
	public function toko()
	{

	}
	//olah data profil
	public function profil()
	{

	}
	//do logout
	public function logout()
	{
		$this->session->sess_destroy();//clear session
		return redirect(site_url('home/login'));//back to the login page
	}
}
