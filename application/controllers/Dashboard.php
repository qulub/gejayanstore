<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('application/controllers/Base.php');
class Dashboard extends Base {//dashboard controller created for shop owner

	//construct
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('M_penjual'));//auto load model
		if(empty($this->session->userdata('admintoko')))redirect(site_url('home/login'));//back to login page
		
	}
	//index menampilkan semua promo and status
	public function index()
	{
		$Data = array
		(
			'title'=>'Dashboard',
			'script'=>'$("#dashboard").addClass("active")',
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
		$this->load->model('M_penjual');
		if(!empty($_POST))//update profil
		{
			echo $inputpassword = md5($this->input->post['profile']['password']);
			$recentpassword = $this->session->userdata('admintoko')['password'];
		}else
		{
			$idPemilik = $this->session->userdata('admintoko')['idPemilik'];
			$Data = array
			(
				'title'=>'Dashboard',
				'script'=>'$("#profil").addClass("active")',
				'user'=>$this->M_penjual->detSimplePenjual($idPemilik),
				);
			return $this->basePublicView('dashboard/profil',$Data);
			
		}
	}
	//do logout
	public function logout()
	{
		$this->session->sess_destroy();//clear session
		return redirect(site_url('home/login'));//back to the login page
	}
}
