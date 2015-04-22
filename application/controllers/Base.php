<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller
{
	private $TemplateDir;
	//construct
	public function __construct()
	{
		parent::__construct();
		$this->TemplateDir = 'yussan-templategejayan';
	}
	//base view untuk user biasa
	function basePublicView($ChildView='',$Data='' )
	{
		$Data['ChildView'] = $ChildView;
		$this->load->view($this->TemplateDir.'/bases/BaseView', $Data);
	}
	//base view untuk super user
	function baseSuperViews()
	{
		$TemplateDir = 'yussan-templatefatho/manage';//view template root directort
		$Data['ChildView'] = $ChildView;
		$this->load->view($this->TemplateDir.'/bases/BaseView', $Data);
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
}
