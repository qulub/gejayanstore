<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller 
{
	//base view untuk user biasa
	function basePublicView($ChildView='',$Data='' )
	{
		$TemplateDir = 'yussan-templatefatho';//view template root directort
		$Data['ChildView'] = $ChildView;
		$this->load->view($TemplateDir.'/bases/BaseView', $Data);
	}
	//base view untuk super user
	function baseSuperViews()
	{
		$TemplateDir = 'yussan-templatefatho/manage';//view template root directort
		$Data['ChildView'] = $ChildView;
		$this->load->view($TemplateDir.'/bases/BaseView', $Data);
	}
	//hanya admin yang boleh masuk
	function onlyAdmin()
	{
		$sess = $this->session->userdata('AdminLogin');
		if(empty($sess)){
			redirect(site_url('manage'));//jika admin tidak login, kembali ke halaman login
		}
	}
}
