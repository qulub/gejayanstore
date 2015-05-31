<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('application/controllers/Base.php');
class Transaksi extends Base {

	//construct
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
	echo 'GET OUT HACKER!!!';
	}
	//add views to item
	public function order()
	{
		$idpemilik = $this->session->userdata('admintoko')['idPemilik'];
		$this->load->model('M_toko');
		$Data = array
		(
			'title'=>'Order',
			'toko'=>$this->M_toko->tokoByIdPemilik($idpemilik)->row_array(),
			);
		return $this->basePublicView('transaksi/order',$Data);
	}
	//process  transaksi
	public function process()
	{
		$tambahmasa = $this->input->post('tambahmasa');//bulan
		$tambahslot = $this->input->post('tambahslot');//bulan
		$totalbayar = ($tambahmasa*100000) + ($tambahslot*20000);
		$status = 'menunggu';
		$idpemilik = $this->session->userdata('admintoko')['idPemilik'];
		$idtransaksi  = date('ymdHis').'-'.$idpemilik;
		//insert to database
		$Data = array(
			'idtransaksi'=>$idtransaksi,'idPemilik'=>$idpemilik,'tglTransaksi'=>date('Y-m-d H:i:s'),'biaya'=>$totalbayar,
			'tambahSlot'=>$tambahslot,'tambahMasa'=>$tambahmasa,'status'=>'menunggu'
			);
		$this->db->insert('transaksi',$Data);
		redirect(site_url('dashboard/transaksi?success=Transaksi telah berhasil silahkan transfer biaya untuk aktifasi fitur'));
	}
	
}
