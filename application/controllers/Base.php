<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller
{
	private $TemplateDir;
	private $AdminTemplateDir;
	//construct
	public function __construct()
	{
		parent::__construct();
		$this->TemplateDir = 'yussan-templategejayan';
		$this->AdminTemplateDir = 'admin-gs-1';
	}
	//base view untuk public
	function basepublicView($ChildView='',$Data='' )
	{
		$Data['ChildView'] = $ChildView;
		$this->load->view($this->TemplateDir.'/bases/BaseView', $Data);
	}
	//base view untuk Admin
	function baseAdminView($ChildView='',$Data='' )
	{
		$Data['ChildView'] = $ChildView;
		$this->load->view($this->AdminTemplateDir.'/bases/BaseView', $Data);
	}
	//get main picture
	function getMainPicture($iditem)
	{
		$picture=$this->M_produk->getGambarProduk($iditem);
		$item=$this->M_produk->getProduk($idItem);
		$dir = date('m-Y',strtotime($item['tglPost']));
		$location = base_url('resource/images/'.$dir.'/');
		return $location.$picture['gambar'];
	}
	//apakah masa promo toko sudah habis
	function itemPromoRunsOut($iditem)
	{
		$this->load->model('m_produk');
		$item = $this->m_produk->getProduk($iditem);
		$today = date_create(date('Y-m-d'));
		$last = date_create(date('Y-m-d', strtotime($item['habisPromo'])));
		$diff=date_diff($today,$last);
		$diff = $diff->format("%r%a");
		return $diff;
	}
	//apakah masa promo barang sudah habis
	function ShopPromoRunsOut($idtoko)
	{
		$this->load->model('m_toko');
		$toko = $this->m_toko->detailToko($idtoko);
		$today = date_create(date('Y-m-d'));
		$last = date_create(date('Y-m-d', strtotime($toko['habisMasa'])));
		$diff=date_diff($today,$last);
		$diff = $diff->format("%r%a");
		// print_r($diff);
		// $diff = $diff->d
		return $diff;
	}
}
