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

	#ADMIN ONLY
	#STATISTIC ON ADMIN
	public function totalTransaksi()
	{
		$this->load->model('M_transaksi');
		$tahun = $_GET['tahun'];
		$stats = array();
		for($x=1;$x<=12;$x++)://get data from all of the month
			$data = $this->M_transaksi->totalJumlahTransaksi($x,$tahun);
			switch ($x) {
				case 1:$bln='Januari';break;
				case 2:$bln='Februari';break;
				case 3:$bln='Maret';break;
				case 4:$bln='April';break;
				case 5:$bln='Mei';break;
				case 6:$bln='Juni';break;
				case 7:$bln='Juli';break;
				case 8:$bln='Agustus';break;
				case 9:$bln='September';break;
				case 10:$bln='Oktober';break;
				case 11:$bln='November';break;
				case 12:$bln='Desember';break;
			}
			array_push($stats,array('bln'=>$bln,'biaya'=>$data['biaya'],'transaksi'=>$data['transaksi']));
		endfor;
		$jsonstats = json_encode($stats);
		echo $jsonstats;
	}
	#menampilkan semua kategori dan jumlah promo yang aktif
	public function statsKategoriPromo()
	{
		$data = array();
		$this->load->model('M_produk','M_category');
		$kategori = $this->M_category->showCategories();
		foreach($kategori as $k):
			$kategori =  $k['namaKategori'];
			$this->db->where('SubKategoriItem.idKategoriItem',$k['idKategoriItem']);
			$this->db->join('SubKategoriItem','SubKategoriItem.idSubKategori=item.idSubKategori');
			$total = $this->db->count_all_results('item');
			array_push($data, array('label'=>$kategori,'value'=>$total));
		endforeach;
		$json = json_encode($data);
		echo $json;
	}
	public function statsFavoritPromo()
	{
		$data = array();
		$this->load->model('M_produk');
		$promo = $this->M_produk->popularProduk(10,0);
		foreach($promo as $p):
			array_push($data, array('label'=>$p['judul'],'value'=>$p['views']));
		endforeach;
		$json = json_encode($data);
		echo $json;
	}
	public function statsToko()
	{
		$data = array();
		$this->db->limit(10,0);
		$this->db->join('tiket','tiket.idPemilik=toko.IdPemilik');
		$this->db->order_by('COUNT(tiket.idtiket)', 'DESC');
		$query = $this->db->get('toko')->result_array();
		foreach ($query as $q):
			$this->db->where('idPemilik',$q['idPemilik']);
			$total = $this->db->count_all_results('tiket');
			array_push($data, array('label'=>$q['namaToko'],'value'=>$total));		
		endforeach;
		$json = json_encode($data);
		echo $json;
	}
}
