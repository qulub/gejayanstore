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
		$this->TemplateDir = 'publik-templategejayan';
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
	//is admin logged in
	function adminLoggedIn(){
		$session = $this->session->userdata('adminLoggedIn');
		if (empty($session)) {
			return false;//admin not logged in
		}else{return true;}//admin is loged in
	}
	/*
	* ALl ABOUT DASHBOARD
	*/
	//sisa slot untuk memasang promo
	public function sisaSlot($idpemilik)
	{
		$this->load->model('M_produk');
		$makspromo = $this->M_produk->maksPromo($idpemilik);
		$totalpromo = $this->M_produk->totalPromo($idpemilik);
		$sisa = $makspromo - $totalpromo;
		$note = 'habis';
		if($sisa < 0){return $note;}
		else if($sisa == 0){return '1';}
		else{return $sisa;}
	}
	/*
	* LAIN LAIN
	*/
	//send message
	public function sendemail($destination,$subject,$body)
	{
		$url = 'https://api.sendgrid.com/';
		$user = 'qulub';
		$pass = 'GN-003gundam';
		$params = array(
		    'api_user'  => $user,
		    'api_key'   => $pass,
		    'to'        => $destination,
		    'subject'   => $subject,
		    'from'      => 'noreply@gejayanstore.com',
		  );
		  $params['html'] = '
		  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta name="viewport" content="width=device-width"><title>My email message created with BeeFree</title><meta http-equiv="Content-Type" content="text/html; charset=utf-8">  <meta name="viewport" content="width=device-width, initial-scale=1.0">  <meta http-equiv="X-UA-Compatible" content="IE=edge">  <meta name="format-detection" content="telephone=no">  <style type="text/css">  /* RESET */  #outlook a {padding:0;} body {width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0; mso-line-height-rule:exactly;}  table td { border-collapse: collapse; }  .ExternalClass {width:100%;}  .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;}  table td {border-collapse: collapse;}  /* IMG */  img {outline:none; text-decoration:none; -ms-interpolation-mode: bicubic;}  a img {border:none;}  /* Becoming responsive */  @media only screen and (max-device-width: 480px) {  table[id="container_div"] {max-width: 480px !important;}  table[id="container_table"], table[class="image_container"], table[class="image-group-contenitor"] {width: 100% !important; min-width: 320px !important;}  table[class="image-group-contenitor"] td, table[class="mixed"] td, td[class="mix_image"], td[class="mix_text"], td[class="table-separator"], td[class="section_block"] {display: block !important;width:100% !important;}  table[class="image_container"] img, td[class="mix_image"] img, table[class="image-group-contenitor"] img {width: 100% !important;}  table[class="image_container"] img[class="natural-width"], td[class="mix_image"] img[class="natural-width"], table[class="image-group-contenitor"] img[class="natural-width"] {width: auto !important;}  a[class="button-link justify"] {display: block !important;width:auto !important;}  td[class="table-separator"] br {display: none;}  td[class="cloned_td"]  table[class="image_container"] {width: 100% !important; min-width: 0 !important;} } table[class="social_wrapp"] {width: auto;} </style></head>
		  <body bgcolor="#eaeaea">'.$body.'</body>
		  </html>
		  ';
		  $params['text'] = $params['html'];
		$request =  $url.'api/mail.send.json';
		// Generate curl request
		$session = curl_init($request);
		// Tell curl to use HTTP POST
		curl_setopt ($session, CURLOPT_POST, true);
		// Tell curl that this is the body of the POST
		curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
		// Tell curl not to return headers, but do return the response
		curl_setopt($session, CURLOPT_HEADER, false);
		// Tell PHP not to use SSLv3 (instead opting for TLS)
		curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
		curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
		// obtain response
		$response = curl_exec($session);
		curl_close($session);
		// print everything out
		$reponse = json_decode($response);
		echo $response->message;
	}
}
