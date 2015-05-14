<?php
class M_produk extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	//show all active produk
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
		WHERE item.habisPromo >= CURDATE()
		ORDER BY item.tglPost DESC
		LIMIT $offset,$limit";
		$query=$this->db->query($sql);
		if($query->row_array()>0){return $query->result_array();}
		else{return array();}
	}
	//list prduk by main kategori
	public function listProdukByMainKat($mainkat,$limit,$offset)
	{
		$sql = "SELECT item.idToko AS 'idToko',item.idItem as 'idItem',item.judul,item.deskripsi,item.harga,item.diskon,item.tglPost,item.tglEdit,
		SubKategoriItem.namaSubKategori AS 'subkategori',
		kategoriItem.namaKategori AS 'kategori',
		toko.namaToko as 'toko'
		FROM item INNER JOIN SubKategoriItem on SubKategoriItem.idSubKategori=item.idSubKategori
		INNER JOIN kategoriItem ON kategoriItem.idKategoriItem = SubKategoriItem.idKategoriItem
		INNER JOIN toko ON toko.idToko = item.idToko
		WHERE item.habisPromo >= CURDATE()AND kategoriItem.namaKategori = '$mainkat'
		ORDER BY item.tglPost DESC
		LIMIT $offset,$limit";
		$query=$this->db->query($sql);
		if($query->row_array()>0){return $query->result_array();}
		else{return array();}
	}
	//count produk
	public function countProduk()
	{
		$sql = "SELECT item.idToko AS 'idToko',item.idItem as 'idItem',item.judul,item.deskripsi,item.harga,item.diskon,item.tglPost,item.tglEdit,
		SubKategoriItem.namaSubKategori AS 'subkategori',
		kategoriItem.namaKategori AS 'kategori',
		toko.namaToko as 'toko'
		FROM item INNER JOIN SubKategoriItem on SubKategoriItem.idSubKategori=item.idSubKategori
		INNER JOIN kategoriItem ON kategoriItem.idKategoriItem = SubKategoriItem.idKategoriItem
		INNER JOIN toko ON toko.idToko = item.idToko
		WHERE item.habisPromo >= CURDATE()
		ORDER BY item.tglPost DESC";
		$query=$this->db->query($sql);
		return $query->num_rows();
	}
	//cari produk
	public function cariPromo($keyword,$limit,$offset)
	{
		//pecah keyword
		$keywordArray = explode(' ',$keyword);
		$totalArray = count($keywordArray);
		$searchSql = "";
		for($i=0;$i<$totalArray;$i++){
			$searchSql = $searchSql."item.judul LIKE '%".$keywordArray[$i]."%' OR ";
		}
		//search algorhtym
		$sql = "SELECT item.idToko AS 'idToko',item.idItem as 'idItem',item.judul,item.deskripsi,item.harga,item.diskon,item.tglPost,item.tglEdit,
		SubKategoriItem.namaSubKategori AS 'subkategori',
		kategoriItem.namaKategori AS 'kategori',
		toko.namaToko as 'toko'
		FROM item INNER JOIN SubKategoriItem on SubKategoriItem.idSubKategori=item.idSubKategori
		INNER JOIN kategoriItem ON kategoriItem.idKategoriItem = SubKategoriItem.idKategoriItem
		INNER JOIN toko ON toko.idToko = item.idToko
		WHERE ".$searchSql." item.deskripsi LIKE '%".$keyword."%' AND item.habisPromo >= CURDATE()
		ORDER BY item.tglPost DESC
		LIMIT $offset,$limit";
		$query=$this->db->query($sql);
		if($query->row_array()>0){return $query->result_array();}
		else{return array();}
	}
	//list prduk toko
	public function listProdukToko($limit,$offset,$idtoko)
	{
		$sql = "SELECT item.idToko AS 'idToko',item.idItem as 'idItem',item.judul,item.deskripsi,item.harga,item.diskon,item.tglPost,item.tglEdit,item.habisPromo,
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
	//popular produk
	public function popularProduk($limit,$offset)
	{
		$sql = "SELECT item.idToko AS 'idToko',item.idItem as 'idItem',item.judul,item.deskripsi,item.harga,item.diskon,item.tglPost,item.tglEdit,
		SubKategoriItem.namaSubKategori AS 'subkategori',
		kategoriItem.namaKategori AS 'kategori',
		toko.namaToko as 'toko'
		FROM item INNER JOIN SubKategoriItem on SubKategoriItem.idSubKategori=item.idSubKategori
		INNER JOIN kategoriItem ON kategoriItem.idKategoriItem = SubKategoriItem.idKategoriItem
		INNER JOIN toko ON toko.idToko = item.idToko
		WHERE item.habisPromo >= CURDATE()
		ORDER BY item.views DESC
		LIMIT $offset,$limit";
		$query=$this->db->query($sql);
		if($query->row_array()>0){return $query->result_array();}
		else{return array();}
	}
	//show produk by id produk
	public function getProduk($idproduk)
	{
		$sql = "SELECT item.idItem as 'idItem',item.judul,item.deskripsi,item.harga,item.diskon,item.tglPost,item.tglEdit,habisPromo,views,
		SubKategoriItem.namaSubKategori AS 'subkategori',
		kategoriItem.namaKategori AS 'kategori',
		toko.idToko AS 'idToko',toko.namaToko as 'toko'
		FROM item INNER JOIN SubKategoriItem on SubKategoriItem.idSubKategori=item.idSubKategori
		INNER JOIN kategoriItem ON kategoriItem.idKategoriItem = SubKategoriItem.idKategoriItem
		INNER JOIN toko ON toko.idToko = item.idToko
		WHERE item.idItem = $idproduk";
		$query=$this->db->query($sql);
		if($query->row_array()>0){return $query->row_array();}
		else{return array();}
	}
	//promo lain
	public function othersPromo($idtoko="",$ini="")//others produk in same shop / others shop
	{
		if($ini === FALSE){$this->db->where('item.idToko <>',$idtoko);}
		else{$this->db->where('item.idToko',$idtoko);}
		$this->db->where('datediff(item.habisPromo,current_date())>=',0);
		$this->db->select('*');
		//join
		$this->db->join('toko','item.idToko = toko.idToko');
		$this->db->limit(7,0);
		$query = $this->db->get('item');
		return $query->result_array();
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

	/*
	* ALL ABOUT KATEGORI
	*/
	public function allMainKategori()
	{
		$query = $this->db->get('kategoriItem');
		return $query->result_array();
	}
	public function allSubKategori($idmainkat="")
	{
		if(empty($idmainkat)){$this->db->where('idKategoriItem',1);}
		else{$this->db->where('idKategoriItem',$idmainkat);}
		$query = $this->db->get('SubKategoriItem');
		return $query->result_array();
	}

	/*************
	ADMIN
	**************/
	//listing promo
	public function promoListing($limit="",$offset="",$status)
	{
		//filter
		switch ($status) {
			case 'aktif':
				$this->db->where('item.habisPromo >','CURTIME()');
				break;
				case 'habis':
				$this->db->where('item.habisPromo <','CURTIME()');
				break;
				case 'banned':
				$this->db->where('item.status','banned');
				break;
				default:
				# code...
				break;
			}
			$this->db->select('*');
			$this->db->join('SubKategoriItem','SubKategoriItem.idSubKategori = item.idSubKategori');
			$this->db->join('kategoriItem','kategoriItem.idKategoriItem = SubKategoriItem.idKategoriItem');
			$this->db->join('toko','item.idToko = toko.idToko');
			$this->db->limit($limit,$offset);
			return $this->db->get('item');
		}
		//search promo
		public function promoSearch($limit="",$offset="",$keyword)
		{
			$this->db->select('*');
			$this->db->join('SubKategoriItem','SubKategoriItem.idSubKategori = item.idSubKategori');
			$this->db->join('kategoriItem','kategoriItem.idKategoriItem = SubKategoriItem.idKategoriItem');
			$this->db->join('toko','item.idToko = toko.idToko');
			$this->db->like('Judul',$keyword);
			$this->db->or_like('Deskripsi',$keyword);
			$this->db->limit($limit,$offset);
			return $this->db->get('item');
		}
	}
