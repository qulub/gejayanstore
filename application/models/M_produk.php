<?php 
class M_produk extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	//show all categori
	public function showProduk($limit,$offset)
	{
		$this->db->limit($limit,$offset);
		$query = $this->db->get('kategoriItem');
		return $query->result_array();
	}
	//list produk
 	public function listProduk($limit,$offset)
 	{
 		$sql = "SELECT item.idToko AS 'idToko',item.idItem as 'idItem',item.judul,item.deskripsi,item.harga,item.diskon,item.tglPost,item.tglEdit,
 		SubKategoriItem.namaSubKategori AS 'subkategori',
 		kategoriItem.namaKategori AS 'kategori',
 		toko.namaToko as 'toko'
 		FROM item INNER JOIN SubKategoriItem on SubKategoriItem.idSubKategori=item.idSubKategori
 		INNER JOIN kategoriItem ON kategoriItem.idKategoriItem = SubKategoriItem.idKategoriItem
 		INNER JOIN toko ON toko.idToko = item.idToko
 		ORDER BY item.tglPost DESC
 		LIMIT $offset,$limit";
 		$query=$this->db->query($sql);
 		if($query->row_array()>0){return $query->result_array();}
 		else{return array();}
 	}
 	//list prduk toko
 	public function listProdukToko($limit,$offset,$idtoko)
 	{
 		$sql = "SELECT item.idToko AS 'idToko',item.idItem as 'idItem',item.judul,item.deskripsi,item.harga,item.diskon,item.tglPost,item.tglEdit,
 		SubKategoriItem.namaSubKategori AS 'subkategori',
 		kategoriItem.namaKategori AS 'kategori',
 		toko.namaToko as 'toko'
 		FROM item INNER JOIN SubKategoriItem on SubKategoriItem.idSubKategori=item.idSubKategori
 		INNER JOIN kategoriItem ON kategoriItem.idKategoriItem = SubKategoriItem.idKategoriItem
 		INNER JOIN toko ON toko.idToko = item.idToko
 		WHERE item.idToko = $idtoko
 		ORDER BY item.tglPost DESC
 		LIMIT $offset,$limit";
 		$query=$this->db->query($sql);
 		if($query->row_array()>0){return $query->result_array();}
 		else{return array();}
 	}
	//show produk by id produk
 	public function getProduk($idproduk)
 	{
 		$sql = "SELECT item.idItem as 'idItem',item.judul,item.deskripsi,item.harga,item.diskon,item.tglPost,item.tglEdit,
 		SubKategoriItem.namaSubKategori AS 'subkategori',
 		kategoriItem.namaKategori AS 'kategori',
 		toko.namaToko as 'toko'
 		FROM item INNER JOIN SubKategoriItem on SubKategoriItem.idSubKategori=item.idSubKategori
 		INNER JOIN kategoriItem ON kategoriItem.idKategoriItem = SubKategoriItem.idKategoriItem
 		INNER JOIN toko ON toko.idToko = item.idToko
 		WHERE item.idItem = $idproduk";
 		$query=$this->db->query($sql);
 		if($query->row_array()>0){return $query->row_array();}
 		else{return array();}
 	}

 	/*
 	* ALL ABOUT PICTURE
 	*/
 	//get picture by id produk
 	public function getGambarProduk($idproduk)
 	{
 		$this->db->where('idItem',$idproduk);
 		$query = $this->db->get('gambar');
 		if($query->num_rows()>0){return $query->row_array();}
 		else{return array();}
 	}
}