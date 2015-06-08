<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('application/controllers/Base.php');
class Ajax extends Base {

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
	public function addViews()
	{
		$iditem = $_POST['iditem'];
		$this->db->where('idItem',$iditem);
		$sql = 'UPDATE item SET views = views+1 WHERE idItem='.$iditem;
		return $this->db->query($sql);
	}
	/*
	* ALL ABOUT JSON
	*/
	//get mainkat json
	public function jsonGetMainKat()
	{
		$mainkat = $this->db->get('kategoriItem')->result_array();
		echo json_encode($mainkat);
	}
	//get subkategori json by id main kat
	public function jsonGetSubKat()
	{
		$idmainkat = $_GET['mainkat'];
		$this->db->where('idKategoriItem',$idmainkat);
		$subkat = $this->db->get('SubKategoriItem')->result_array();
		echo json_encode($subkat);
	}
	//ubah status transaksi
	public function ubahstatustransaksi()
	{
		$this->load->model(array('M_transaksi','M_toko'));
		$postdata = file_get_contents("php://input");
	    $request = json_decode($postdata);
	    $idtransaksi =  $request->idtransaksi;
	    $statusbaru = $request->statusbaru;
		$transaksi = $this->M_transaksi->detailTransaksi($idtransaksi);
		$idpemilik = $transaksi['idPemilik'];
		$tambahslot = $transaksi['tambahSlot'];
		$tambahmasa = $transaksi['tambahMasa'];
		//get id toko
		$idtoko = $this->M_toko->getIdToko($idpemilik);//[worked]
		//modif data transaksi
		$this->M_transaksi->ubahStatus($idtransaksi,$statusbaru);
		//modif data toko
		if($transaksi['status']=='lunas')//sebelumnya dah lunas
		{
			return $this->M_toko->ubahPromoToko($idtoko,$tambahslot,$tambahmasa,'kurang');//kurangi stok dan masa toko
		}else if($statusbaru == 'lunas')//belum lunas
		{
			return $this->M_toko->ubahPromoToko($idtoko,$tambahslot,$tambahmasa,'tambah');//tambah stok dan masa toko
		}
	}
	//get katalog by id toko
	public function getKatalog()
	{
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata);
		$idToko = $request->idToko;
		if(empty($postdata)){exit();}
		$this->load->model('M_toko');//get toko model
		$katalog = $this->M_toko->getKatalog($idToko);
		echo $katalog;
	}

	/*
	* ALL ABOUT ADMIN
	*/
	//get data rekening bank
	public function rekeningbank()
	{
		$action = $_GET['act'];
		switch ($action) {
			case 'read':
				$json = file_get_contents(base_url('resource/bank.json'));
				echo $json;
				break;
			case 'update':
				# code...
				break;
			case 'delete':
				# code...
				break;
		}
	}
}
