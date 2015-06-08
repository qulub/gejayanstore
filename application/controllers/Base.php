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
		return $this->load->view($this->TemplateDir.'/bases/BaseView', $Data);
	}
	//base view untuk Admin
	function baseAdminView($ChildView='',$Data='' )
	{
		$Data['ChildView'] = $ChildView;
		return $this->load->view($this->AdminTemplateDir.'/bases/BaseView', $Data);
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
		if($sisa <= 0){return $note;}
		else{return $sisa;}
	}
	/*
	* LAIN LAIN
	*/
	//send message
	public function sendemail($destination,$subject,$topic,$body)
	{
		$url = 'https://api.sendgrid.com/';
		$user = 'yussanamikom';
		$pass = 'Rahasia20';
		$params = array(
		    'api_user'  => $user,
		    'api_key'   => $pass,
		    'to'        => $destination,
		    'subject'   => $subject,
		    'from'      => 'noreply@gejayanstore.com',
		  );
		  $params['html'] =
		  '
		  <!DOCTYPE html "-//w3c//dtd xhtml 1.0 transitional //en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-transitional.dtd"><html lang="en" xmlns="http://www.w3.org/1999/xhtml"><head>
			<!--[if gte mso 9]><xml>
			<o:OfficeDocumentSettings>
			<o:AllowPNG/>
			<o:PixelsPerInch>96</o:PixelsPerInch>
			</o:OfficeDocumentSettings>
			</xml><![endif]-->
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=device-width">
			<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">

			<title>Template Base</title>

			</head>
			<body style="color:#fff;width: 100% !important;min-width: 100%;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100% !important;margin: 0;padding: 0;background-color: #FFFFFF">
			<style id="media-query">
			/*  Media Queries */
			@media only screen and (max-width: 500px) {
			.prova {
			width: 500px; }
			table[class="body"] img {
			width: 100% !important;
			height: auto !important; }
			table[class="body"] center {
			min-width: 0 !important; }
			table[class="body"] .container {
			width: 95% !important; }
			table[class="body"] .row {
			width: 100% !important;
			display: block !important; }
			table[class="body"] .wrapper {
			display: block !important;
			padding-right: 0 !important; }
			table[class="body"] .columns, table[class="body"] .column {
			table-layout: fixed !important;
			float: none !important;
			width: 100% !important;
			padding-right: 0px !important;
			padding-left: 0px !important;
			display: block !important; }
			table[class="body"] .wrapper.first .columns, table[class="body"] .wrapper.first .column {
			display: table !important; }
			table[class="body"] table.columns td, table[class="body"] table.column td {
			width: 100% !important; }
			table[class="body"] table.columns td.expander {
			width: 1px !important; }
			table[class="body"] .right-text-pad, table[class="body"] .text-pad-right {
			padding-left: 10px !important; }
			table[class="body"] .left-text-pad, table[class="body"] .text-pad-left {
			padding-right: 10px !important; }
			table[class="body"] .hide-for-small, table[class="body"] .show-for-desktop {
			display: none !important; }
			table[class="body"] .show-for-small, table[class="body"] .hide-for-desktop {
			display: inherit !important; }
			table[class="icon-table"] {
			width: 100% !important; }
			table[class="icon-table"] table {
			display: block !important;
			width: 100% !important; }
			table[class="icon-table"] table td {
			padding-bottom: 10px !important; }
			.mixed-two-up .col {
			width: 100% !important; } }


			@media screen and (max-width: 500px) {
			div[class="col"] {
			width: 100% !important;
			}
			}

			@media screen and (min-width: 501px) {
			table[class="block-grid"] {
			width: 500px !important;
			}
			}
			</style>
			<table class="body" style="border-spacing: 0;border-collapse: collapse;vertical-align: top;height: 100%;width: 100%;table-layout: fixed" cellpadding="0" cellspacing="0" width="100%" border="0">
			<tbody><tr style="vertical-align: top">
			<td class="center" style="word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;border-collapse: collapse !important;vertical-align: top;text-align: center;background-color: #FFFFFF" align="center" valign="top">

			<!--[if (gte mso 9)|(IE)]>
			<table width="500" class="ieCell" align="center" cellpadding="0" cellspacing="0" border="0">
			<tr>
			<td>
			<![endif]-->
			<table style="border-spacing: 0;border-collapse: collapse;vertical-align: top;background-color:#E8E8E8" cellpadding="0" cellspacing="0" align="center" width="100%" border="0">
			<tbody><tr style="vertical-align: top">
			<td style="word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;border-collapse: collapse !important;vertical-align: top" width="100%">
			<table class="container" style="border-spacing: 0;border-collapse: collapse;vertical-align: top;max-width: 500px;margin: 0 auto;text-align: inherit" cellpadding="0" cellspacing="0" align="center" width="100%" border="0">
			<tbody><tr style="vertical-align: top">
			<td style="word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;border-collapse: collapse !important;vertical-align: top" width="100%">
			<table class="block-grid" style="border-spacing: 0;border-collapse: collapse;vertical-align: top;width: 100%;max-width: 500px;color: #000000;background-color: transparent" cellpadding="0" cellspacing="0" width="100%" bgcolor="transparent">
			<tbody><tr style="vertical-align: top">
			<td style="word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;border-collapse: collapse !important;vertical-align: top;text-align: center;font-size: 0">
			<!--[if (gte mso 9)|(IE)]>
			<table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
			<tr>
			<td valign="top">
			<![endif]-->
			<div class="col num12" style="display: inline-block;vertical-align: top;width: 100%">
			<table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" cellpadding="0" cellspacing="0" align="center" width="100%" border="0">
			<tbody><tr style="vertical-align: top">
			<td style="word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;border-collapse: collapse !important;vertical-align: top;background-color: transparent;padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px;border-top: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-left: 0px solid transparent">
			<table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" align="center" width="100%" border="0" cellspacing="0">
			<tbody><tr style="vertical-align: top">
			<td style="word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;border-collapse: collapse !important;vertical-align: top;padding-top: 10px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px" align="center">
			<div>
			<table style="border-spacing: 0;border-collapse: collapse;vertical-align: top;border-top: 10px solid transparent;width: 100%" align="center" border="0" cellspacing="0">
			<tbody><tr style="vertical-align: top">
			<td style="word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;border-collapse: collapse !important;vertical-align: top" align="center">
			&nbsp;
			</td>
			</tr>
			</tbody></table>
			</div>
			</td>
			</tr>
			</tbody></table><table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" cellpadding="0" cellspacing="0" width="100%">
			<tbody><tr style="vertical-align: top">
			<td style="word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;border-collapse: collapse !important;vertical-align: top;padding-top: 30px;padding-right: 0px;padding-bottom: 30px;padding-left: 0px">
			<div style="color:#ffffff;line-height:120%;font-family:Arial, "Helvetica Neue", Helvetica, sans-serif;">
			<div style="font-size: 14px; line-height: 16px; text-align: center;color: #ffffff;font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;line-height: 17px" data-mce-style="font-size: 14px; line-height: 16px; text-align: center;"><strong><span style="font-size: 28px; line-height: 33px;" data-mce-style="font-size: 28px; line-height: 33px;">Gejayan Store<br></span></strong></div>
			</div>
			</td>
			</tr>
			</tbody></table>
			<table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" align="center" width="100%" border="0" cellspacing="0">
			<tbody><tr style="vertical-align: top">
			<td style="word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;border-collapse: collapse !important;vertical-align: top;padding-top: 10px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px" align="center">
			<div>
			<table style="border-spacing: 0;border-collapse: collapse;vertical-align: top;border-top: 10px solid transparent;width: 100%" align="center" border="0" cellspacing="0">
			<tbody><tr style="vertical-align: top">
			<td style="word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;border-collapse: collapse !important;vertical-align: top" align="center">
			&nbsp;
			</td>
			</tr>
			</tbody></table>
			</div>
			</td>
			</tr>
			</tbody></table> </td>
			</tr>
			</tbody></table>
			</div>
			<!--[if (gte mso 9)|(IE)]>
			</td><td>
			<![endif]-->
			<!--[if (gte mso 9)|(IE)]>
			</td>
			</tr>
			</table>
			<![endif]-->
			</td>
			</tr>
			</tbody></table>
			</td>
			</tr>
			</tbody></table>
			</td>
			</tr>
			</tbody></table>
			<!--[if (gte mso 9)|(IE)]>
			</td>
			</tr>
			</table>
			<![endif]-->
			<!--[if (gte mso 9)|(IE)]>
			<table width="500" class="ieCell" align="center" cellpadding="0" cellspacing="0" border="0">
			<tr>
			<td>
			<![endif]-->
			<table style="border-spacing: 0;border-collapse: collapse;vertical-align: top;background-color: #FFF" cellpadding="0" cellspacing="0" align="center" width="100%" border="0">
			<tbody><tr style="vertical-align: top">
			<td style="word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;border-collapse: collapse !important;vertical-align: top" width="100%">
			<table class="container" style="border-spacing: 0;border-collapse: collapse;vertical-align: top;max-width: 500px;margin: 0 auto;text-align: inherit" cellpadding="0" cellspacing="0" align="center" width="100%" border="0">
			<tbody><tr style="vertical-align: top">
			<td style="word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;border-collapse: collapse !important;vertical-align: top" width="100%">
			<table class="block-grid" style="border-spacing: 0;border-collapse: collapse;vertical-align: top;width: 100%;max-width: 500px;color: #333;background-color: transparent" cellpadding="0" cellspacing="0" width="100%" bgcolor="transparent">
			<tbody><tr style="vertical-align: top">
			<td style="word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;border-collapse: collapse !important;vertical-align: top;text-align: center;font-size: 0">
			<!--[if (gte mso 9)|(IE)]>
			<table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
			<tr>
			<td valign="top">
			<![endif]-->
			<div class="col num12" style="display: inline-block;vertical-align: top;width: 100%">
			<table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" cellpadding="0" cellspacing="0" align="center" width="100%" border="0">
			<tbody><tr style="vertical-align: top">
			<td style="word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;border-collapse: collapse !important;vertical-align: top;background-color: transparent;padding-top: 30px;padding-right: 0px;padding-bottom: 30px;padding-left: 0px;border-top: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-left: 0px solid transparent">
			<table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" cellpadding="0" cellspacing="0" width="100%">
			<tbody><tr style="vertical-align: top">
			<td style="word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;border-collapse: collapse !important;vertical-align: top;padding-top: 25px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px">
			<div style="color:#ffffff;line-height:120%;font-family:Arial, "Helvetica Neue", Helvetica, sans-serif;">
			<div style="font-size: 18px; line-height: 21px; text-align: center;color: #ffffff;font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;line-height: 22px" data-mce-style="font-size: 18px; line-height: 21px; text-align: center;"><span style="font-size:24px; line-height:29px;" mce-data-marked="1"><strong>'.$topic.'</strong></span></div>
			</div>
			</td>
			</tr>
			</tbody></table>
			<table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" cellpadding="0" cellspacing="0" width="100%">
			<tbody><tr style="vertical-align: top">
			<td style="word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;border-collapse: collapse !important;vertical-align: top;padding-top: 0px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px">
			<div style="color:#B8B8C0;line-height:150%;font-family:Arial, "Helvetica Neue", Helvetica, sans-serif;">
			<div style="font-size: 14px; line-height: 21px; text-align: center;color: #B8B8C0;font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;line-height: 21px" data-mce-style="font-size: 14px; line-height: 16px; text-align: center;"><span style="font-size:14px; line-height:21px;">'.$body.'</span></div>
			</div>
			</td>
			</tr>
			</tbody></table>
			<table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" width="100%" border="0" cellspacing="0" cellpadding="0">
			<tbody><tr style="vertical-align: top">
			<td class="center" style="word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;border-collapse: collapse !important;vertical-align: top;text-align: center;padding-top: 15px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px" align="center">

			<table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" width="100%" border="0" cellspacing="0" cellpadding="0">
			<tbody><tr style="vertical-align: top">
			<td class="button-container" style="word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;border-collapse: collapse !important;vertical-align: top" align="center">
			<table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" border="0" cellspacing="0" cellpadding="0" align="center">

			<tbody><tr style="vertical-align: top">
			<td class="button" style="word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;border-collapse: collapse !important;vertical-align: middle;text-align: center;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;height: 48px" bgcolor="#4CCFC1" width="178" valign="middle">

			<a style="display: inline-block;text-decoration: none;-webkit-text-size-adjust: none;text-align: center;line-height: 100%;padding-top: 5px;                         padding-right: 20px;                        padding-bottom: 5px;                        padding-left: 20px;                        text-align:;                        font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;border-top: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-left: 0px solid transparent;color: #ffffff" href="" target="_blank">

			<!--[if mso]>&nbsp;<![endif]-->
			<div style="text-align: center !important;line-height: 100% !important;font-family: inherit;font-size: 12px;color: #ffffff" data-mce-style="font-family: inherit; font-size: 16px; line-height: 32px;"><a href="http://gejayanstore.com" style="color:#fff;text-decoration:none;line-height: 100% !important;font-size: 14px">ke GejayanStore</a></div>
			<!--[if mso]>&nbsp;<![endif]-->
			</a>

			</td>
			</tr>
			</tbody></table>
			</td>
			</tr>
			</tbody></table>

			</td>
			</tr>
			</tbody></table><table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" align="center" width="100%" border="0" cellspacing="0">
			<tbody><tr style="vertical-align: top">
			<td style="word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;border-collapse: collapse !important;vertical-align: top;padding-top: 10px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px" align="center">
			<div>
			<table style="border-spacing: 0;border-collapse: collapse;vertical-align: top;border-top: 0px solid transparent;width: 100%" align="center" border="0" cellspacing="0">
			<tbody><tr style="vertical-align: top">
			<td style="word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;border-collapse: collapse !important;vertical-align: top" align="center">
			&nbsp;
			</td>
			</tr>
			</tbody></table>
			</div>
			</td>
			</tr>
			</tbody></table> </td>
			</tr>
			</tbody></table>
			</div>
			<!--[if (gte mso 9)|(IE)]>
			</td><td>
			<![endif]-->
			<!--[if (gte mso 9)|(IE)]>
			</td>
			</tr>
			</table>
			<![endif]-->
			</td>
			</tr>
			</tbody></table>
			</td>
			</tr>
			</tbody></table>
			</td>
			</tr>
			</tbody></table>
			<!--[if (gte mso 9)|(IE)]>
			</td>
			</tr>
			</table>
			<![endif]-->
			<!--[if (gte mso 9)|(IE)]>
			<table width="500" class="ieCell" align="center" cellpadding="0" cellspacing="0" border="0">
			<tr>
			<td>
			<![endif]-->
			<table style="border-spacing: 0;border-collapse: collapse;vertical-align: top;background-color: #ffffff" cellpadding="0" cellspacing="0" align="center" width="100%" border="0">
			<tbody><tr style="vertical-align: top">
			<td style="word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;border-collapse: collapse !important;vertical-align: top" width="100%">
			<table class="container" style="border-spacing: 0;border-collapse: collapse;vertical-align: top;max-width: 500px;margin: 0 auto;text-align: inherit" cellpadding="0" cellspacing="0" align="center" width="100%" border="0">
			<tbody><tr style="vertical-align: top">
			<td style="word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;border-collapse: collapse !important;vertical-align: top" width="100%">
			<table class="block-grid" style="border-spacing: 0;border-collapse: collapse;vertical-align: top;width: 100%;max-width: 500px;color: #333;background-color: transparent" cellpadding="0" cellspacing="0" width="100%" bgcolor="transparent">
			<tbody><tr style="vertical-align: top">
			<td style="word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;border-collapse: collapse !important;vertical-align: top;text-align: center;font-size: 0">
			<!--[if (gte mso 9)|(IE)]>
			<table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
			<tr>
			<td valign="top">
			<![endif]-->
			<div class="col num12" style="display: inline-block;vertical-align: top;width: 100%">
			<table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" cellpadding="0" cellspacing="0" align="center" width="100%" border="0">
			<tbody><tr style="vertical-align: top">
			<td style="word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;border-collapse: collapse !important;vertical-align: top;background-color: transparent;padding-top: 30px;padding-right: 0px;padding-bottom: 30px;padding-left: 0px;border-top: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-left: 0px solid transparent">
			<table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" border="0" cellspacing="0" cellpadding="0" width="100%">
			<tbody><tr style="vertical-align: top">
			<td style="word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;border-collapse: collapse !important;vertical-align: top;text-align: center;padding-top: 10px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px" align="center">
			<table class="icon-table" style="border-spacing: 0;border-collapse: collapse;vertical-align: top" border="0" cellspacing="0" cellpadding="0" width="114" align="center">
			<tbody><tr style="vertical-align: top">
			<td style="word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;border-collapse: collapse !important;vertical-align: top">


			<table style="border-spacing: 0;border-collapse: collapse;vertical-align: top;padding: 0 5px 0 0" align="left" border="0" cellspacing="0" cellpadding="0" width="38">
			<tbody><tr style="vertical-align: top">
			<td style="word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;border-collapse: collapse !important;vertical-align: top">
			<a href="https://www.facebook.com/" title="Facebook" target="_blank">
			<img style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;width: 100%;clear: both;display: block;border: none;height: auto;line-height: 100%;max-width: 32px !important" src="http://i.imgur.com/DHxcb2m.png" alt="Facebook" title="Facebook" width="100%">
			</a>
			</td>
			<td style="word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;border-collapse: collapse !important;vertical-align: top"></td>
			</tr>
			</tbody></table>
			<table style="border-spacing: 0;border-collapse: collapse;vertical-align: top;padding: 0 5px 0 0" align="left" border="0" cellspacing="0" cellpadding="0" width="38">
			<tbody><tr style="vertical-align: top">
			<td style="word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;border-collapse: collapse !important;vertical-align: top">
			<a href="http://twitter.com/" title="Twitter" target="_blank">
			<img style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;width: 100%;clear: both;display: block;border: none;height: auto;line-height: 100%;max-width: 32px !important" src="http://i.imgur.com/uYn565H.png" alt="Twitter" title="Twitter" width="100%">
			</a>
			</td>
			<td style="word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;border-collapse: collapse !important;vertical-align: top"></td>
			</tr>
			</tbody></table>
			<table style="border-spacing: 0;border-collapse: collapse;vertical-align: top;padding: 0 5px 0 0" align="left" border="0" cellspacing="0" cellpadding="0" width="38">
			<tbody><tr style="vertical-align: top">
			<td style="word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;border-collapse: collapse !important;vertical-align: top">
			<a href="http://plus.google.com/" title="Google+" target="_blank">
			<img style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;width: 100%;clear: both;display: block;border: none;height: auto;line-height: 100%;max-width: 32px !important" src="http://i.imgur.com/yb90ePk.png" alt="Google+" title="Google+" width="100%">
			</a>
			</td>
			<td style="word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;border-collapse: collapse !important;vertical-align: top"></td>
			</tr>
			</tbody></table>
			</td>
			</tr>
			</tbody></table>
			</td>
			</tr>
			</tbody></table><table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" cellpadding="0" cellspacing="0" width="100%">
			<tbody><tr style="vertical-align: top">
			<td style="word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;border-collapse: collapse !important;vertical-align: top;padding-top: 15px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px">
			<div style="color:#959595;line-height:150%;font-family:Arial, "Helvetica Neue", Helvetica, sans-serif;">
			<div style="font-size: 14px; line-height: 21px; text-align: center;color: #959595;font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;line-height: 21px" data-mce-style="font-size: 14px; line-height: 16px; text-align: center;">www.gejayanstore.com</div>
			</div>
			</td>
			</tr>
			</tbody></table>
			</td>
			</tr>
			</tbody></table>
			</div>
			<!--[if (gte mso 9)|(IE)]>
			</td><td>
			<![endif]-->
			<!--[if (gte mso 9)|(IE)]>
			</td>
			</tr>
			</table>
			<![endif]-->
			</td>
			</tr>
			</tbody></table>
			</td>
			</tr>
			</tbody></table>
			</td>
			</tr>
			</tbody></table>
			<!--[if (gte mso 9)|(IE)]>
			</td>
			</tr>
			</table>
			<![endif]-->
			</td>
			</tr>
			</tbody></table>
			</body></html>
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
		// $reponse = json_decode($response);
		// echo $response;
	}
}
