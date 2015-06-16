<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('application/controllers/Base.php');
class Dashboard extends Base {//dashboard controller created for shop owner

	//construct
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('M_penjual','M_produk','M_toko'));//auto load model
		if(empty($this->session->userdata('admintoko')))redirect(site_url('home/login'));//back to login page

	}
	//index menampilkan semua promo and status
	public function index()
	{
		$idpemilik = $this->session->userdata('admintoko')['idPemilik'];
		$Data = array
		(
			'sisa'=>$this->sisaSlot($idpemilik),
			'title'=>'Dashboard',
			'toko'=>$this->M_toko->tokoByIdPemilik($idpemilik)->row_array(),
			'script'=>'$("#dashboard").addClass("active")',
			'totalviews'=>$this->M_produk->totalPromoViews($this->session->userdata('admintoko')['idPemilik']),
			'popular'=>$this->M_produk->promoByIdPemilik($this->session->userdata('admintoko')['idPemilik'],9,0,TRUE,'')->result_array(),
			);
		return $this->basePublicView('dashboard/index',$Data);
	}
	//olah data promo
	public function promo()
	{
		$uri=$this->uri->segment(3);
		switch ($uri) {
			case 'baru'://buat promo baru
			return $this->promobaru();
			break;
			case 'aktif':
			$title='Menampilkan Promo Aktif';
			$script='$("#promo").addClass("active");$("#aktif").addClass("active")';
			$view=$this->M_produk->promoByIdPemilik($this->session->userdata('admintoko')['idPemilik'],9,0,'','aktif')->result_array();
			break;
			case 'banned':
			$title = 'Menampilkan Promo Banned';
			$script='$("#promo").addClass("active");$("#banned").addClass("active")';
			$view=$this->M_produk->promoByIdPemilik($this->session->userdata('admintoko')['idPemilik'],9,0,'','banned')->result_array();
				# code...
			break;
			case 'habis':
			$title = 'Menampilkan Promo Habis';
			$script='$("#promo").addClass("active");$("#habis").addClass("active")';
			$view=$this->M_produk->promoByIdPemilik($this->session->userdata('admintoko')['idPemilik'],9,0,'','habis')->result_array();
				# code...
			break;
			default:
			redirect(site_url('dashboard/promo/aktif'));
			break;
		}
		$Data = array
		(
			'title'=>$title,
			'script'=>$script,
			'view'=>$view,
			);
		return $this->basePublicView('dashboard/promo',$Data);
	}
	//buat promo baru
	public function promobaru()
	{
		$this->load->model(array('M_produk','M_toko'));
		if(!empty($_POST))//input process
		{
			unset($_POST['promo']['IdMainKat']);//remove id main kat
			$promo = $_POST['promo'];
			// print_r($_FILES);
			//check is directory exist
			$dir = './resource/images/produk/'.date('m').'_'.date('Y');
			if(!file_exists($dir))//directory not exist [worked]
			{
				mkdir($dir, 0766);//worked RWX+RW+RW
			}
			//insert data to the database
			$promo['tglPost'] = date('Y-m-d H:i:s');
			$promo['tglEdit'] = date('Y-m-d H:i:s');
			$promo['status'] = 'aktif';
			$promo['idToko'] = $this->M_toko->getIdToko($this->session->userdata('admintoko')['idPemilik']);//[WORKED]
			// print_r($promo);
			if($this->db->insert('item',$promo))//memasukan data ke database
			{
				$latestIdItem = $this->M_produk->lattestIdItem();//[WORKED]
				//image upload process
				//upload config
				$config['upload_path'] = $dir;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '1000';
				$config['encrypt_name'] = TRUE;
				$this->load->library('upload', $config);
				// end of upload config
				//get all choosed picture
				for($n=1;$n<=3;$n++)
				{
					if(!empty($_FILES['gambar'.$n]['name']))
					{
						if(!$this->upload->do_upload('gambar'.$n))//fail to upload image
						{
							echo $this->upload->display_errors();
						}else
						{
							echo 'good ';
						}
						$name = $this->upload->data('file_name');
						//insert to database
						$this->M_produk->insertPromoImage($latestIdItem,$name);
					}
				}
				echo '<script>';
				echo "alert('Promo Berhasil ditambahkan');";
				echo "window.location='" . site_url('dashboard/promo') . "';";
				echo '</script>';
			}else{echo 'gagal memasukan ke database';}
		}else //only view
		{
			//apakah sudah melewati batas
			$totalpromo = $this->M_produk->totalPromo($this->session->userdata('admintoko')['idPemilik']);//total promo yang sudah dipasang
			$makspromo = $this->M_produk->maksPromo($this->session->userdata('admintoko')['idPemilik']);;//total maksimal promo
			if($totalpromo >= $makspromo){//batas penambahan promo sudah habis
				$Data = array
				(
					'title'=>'Tambah Promo',
					'error'=>'! Slot Promo Sudah Full, Silahkan Hapus Atau Edit Promo Yang Sudah Ada'
					);
				return $this->basePublicView('dashboard/error',$Data);
			}else{//masih b
				$Data = array
				(
					'title'=>'Tambah Promo',
					'mainkat'=>$this->db->get('kategoriItem')->result_array(),
					'script'=>'$("#promo").addClass("active");$("#baru").addClass("active")'
					);
				return $this->basePublicView('dashboard/tambahpromo',$Data);
			}
		}
	}

	//action untuk promo
	public function promoaction()
	{
		switch ($_GET['act']) {
			case 'hapus':
				$id = $_GET['id'];//get id promo
				//get all image name
				$images = $this->M_produk->getAllGambarProduk($id);
				$item = $this->M_produk->getProduk($id);
				print_r($images);
				foreach ($images as $i) {
					unlink(base_url('resource/images/produk/'.date('m_Y',strtotime($item['tglPost'])).'/'.$i['gambar']));
				}
				$this->db->where('idItem',$id);
				$this->db->delete('item');
				redirect($this->agent->referrer());
				break;
			case 'edit'://fo edit promo
				$id=$_GET['id'];//get id promo
				$this->updatePromo($id);//do edit promo
				break;
			case 'editprocess'://process edit promo
			echo 'yus';
			print_r($_POST);
			echo '<br/>';
			print_r($_FILES);
				//generate data
			$promo = $_POST['promo'];
				$iditem = $promo['id'];//get item id
				$data = array(
					'Judul'=>$promo['Judul'],
					'tglEdit'=>date('Y-m-d H:i:s'),//get current date and time
					'Deskripsi'=>$promo['Deskripsi'],
					'idSubKategori'=>$promo['IdSubKategori'],
					'harga'=>$promo['Harga'],
					'diskon'=>$promo['Diskon'],
					'habisPromo'=>$promo['HabisPromo'],
					);
				//update item on database
				// print_r($data);
				$this->db->where('idItem',$iditem);
				if($this->db->update('item',$data))//update database)
{
					//process gambar
	for($n=1;$n<=3;$n++)
	{
						if(!empty($_FILES['gambar']['gambar'.$n]))//upload new image
						{

						}
					}
					//success popup
					echo '<script>';
					echo "alert('Berhasil Ubah Barang');";
					echo "window.location='" .$this->agent->referrer(). "';";
					echo '</script>';
				}else{echo 'gagal update promo';}
				break;
			}
		}
	//form view
		public function updatePromo($id)
		{
			$this->db->where('idItem',$id);
		$item = $this->db->get('item')->row_array();//get item detail
		$images = $this->M_produk->getImages($id);//get all images
		$Data = array
		(
			'script'=>'$(document).ready(function(){$("#promo").addClass("active");});',
			'title'=>'Ubah Promo',
			'item'=>$item,
			'mainkat'=>$this->db->get('kategoriItem')->result_array(),//all main kat
			'idmainkat'=>$this->M_produk->getIdMain($item['idSubKategori']),
			'images'=>$images,
			);
		//get all sub kat
		$Data['subkat']=$this->M_produk->getSubKat($Data['idmainkat'],'json');//subkat by main kat -> return is array
		return $this->basePublicView('dashboard/updatepromo',$Data);
	}
	#MANAJEMEN KATALOG
	public function katalog()
	{
		$Data = array
		(
			'script'=>'$("#katalog").addClass("active");$("#aktif").addClass("active")',
			'idToko'=>$this->M_toko->getIdToko($this->session->userdata('admintoko')['idPemilik']),
			);
		return $this->basePublicView('dashboard/katalog',$Data);
	}
	#UPLOAD KATALOG PROCESS
	public function uploadkatalog()
	{
		//DIRECTORY MANAJEMEN
		$dir = './resource/images/katalog/'.$_POST['idtoko'];
		//IS DIRECTORY EXIST
		if(!file_exists($dir))//directory not exist [worked]
		{
			mkdir($dir, 0777);//worked RWX+RW+RW
		}
		$config['upload_path']          = $dir;
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 1000;
		$config['max_width']            = 1024;
		$config['max_height']           = 1024;
		$config['encrypt_name']			= TRUE;
		//get file name
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('katalog'))
		{
			$Data = array
			(
				'script'=>'$("#katalog").addClass("active");$("#aktif").addClass("active")',
				'idToko'=>$this->M_toko->getIdToko($this->session->userdata('admintoko')['idPemilik']),
				'error'=>'Gagal Upload Katalog, Perhatikan Ukuran dan Format Gambar',
				);
			return $this->basePublicView('dashboard/katalog',$Data);
		}
		else
		{
			$this->db->where('idToko',$_POST['idtoko']);
			$name = $this->upload->data('file_name');
			$this->db->insert('katalog',array('tglTambahKatalog'=>date('Y-m-d H:i:s'),'idToko'=>$_POST['idtoko'],'katalog'=>$name));
			$Data = array
			(
				'script'=>'$("#katalog").addClass("active");$("#aktif").addClass("active")',
				'idToko'=>$this->M_toko->getIdToko($this->session->userdata('admintoko')['idPemilik']),
				'success'=>'Sukses Upload Katalog',
				);
			return $this->basePublicView('dashboard/katalog',$Data);
		}

	}
	#DELETE KATALOG PROCESS
	public function deletekatalog()
	{
		$id = $_GET['id'];
		//GET DATA
		$this->db->where('idkatalog',$id);
		$katalog = $this->db->get('katalog')->row_array();
		$pic = './resource/images/katalog/'.$katalog['idkatalog'].'/'.$katalog['katalog'];
		if(file_exists($pic)){
			unlink($pic);
		}
		$this->db->where('idkatalog',$id);
		$this->db->delete('katalog');
		redirect(site_url('dashboard/katalog'));
	}
	//olah data toko
	public function toko()
	{
		if(!empty($_POST))
		{
			$toko = $this->M_toko->tokoByIdPemilik($this->session->userdata('admintoko')['idPemilik'])->row_array();//get old data
			$tokodata = $this->input->post('toko');
			// print_r($_POST);
			// print_r($_FILES);
			// processor
			if(!empty($_FILES['avatar']['name']))//if do upload
			{
				// echo 'sedang upload';
				$config['upload_path']          = './resource/images/toko';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 70000;
				$config['max_width']            = 1200;
				$config['encrypt_name']         = TRUE;
				$this->load->library('upload',$config);
				if ( !$this->upload->do_upload('avatar'))
				{
					$error = array('error' => $this->upload->display_errors());
					echo $this->upload->display_errors();
				}
				else
				{
                  $tokodata['avatar'] = $this->upload->data('file_name');       // Returns: mypic.jpg
              }
          }else{//not upload
          	$tokodata['avatar'] = $_POST['oldavatar'];
          }
          $this->db->where('idToko',$toko['idToko']);
          $this->db->update('toko',$tokodata);
			// print_r($toko);
          return redirect($this->agent->referrer());
      }else
      {
      	$this->load->model('M_toko');
      	$Data = array
      	(
      		'title'=>'Toko',
      		'script'=>'$("#toko").addClass("active")',
      		'toko'=>$this->M_toko->tokoByIdPemilik($this->session->userdata('admintoko')['idPemilik'])->row_array(),
      		);
      	return $this->basePublicView('dashboard/toko',$Data);
      }
  }
	//olah data profil
  public function profil()
  {
  	$this->load->model('M_penjual');
		if(!empty($_POST))//update profil
		{
			$inputpassword = md5($this->input->post('profile')['password']);
			$recentpassword = $this->session->userdata('admintoko')['password'];
			if($inputpassword != $recentpassword)//input password not match
			{
				$Data = array
				(
					'title'=>'Dashboard',
					'script'=>'$("#profil").addClass("active")',
					'user'=>$this->input->post('profile'),
					'error'=>'<div id="error" style="padding:10px" class="error">password yang anda masukan salah</div>',
					);
				return $this->basePublicView('dashboard/profil',$Data);
			}else//do update
			{
				// print_r($this->input->post());
				//validation
				$this->load->library('form_validation');
				$config=array
				(
					array(//nama validation
						'field'=>'profile[namaPemilik]',
						'label'=>'Nama Lengkap',
						'rules'=>'required',
						'errors'=>array(//custom error message
							'required'=>'%s harus diisi'
							),
						),
					array(//telp validation
						'field'=>'profile[telp]',
						'label'=>'Nomor Telepon',
						'rules'=>'required',
						'errors'=>array(//custom error message
							'required'=>'%s harus diisi'
							),
						),
					array(//email validation
						'field'=>'profile[email]',
						'label'=>'Email',
						'rules'=>'required|valid_email|trim',
						'errors'=>array(//custom error message
							'required'=>'%s harus diisi','valid_email'=>'penulisan %s harus valid'
							),
						),
					array(//username validation
						'field'=>'profile[userName]',
						'label'=>'Username',
						'rules'=>'required',
						'errors'=>array(//custom error message
							'required'=>'%s harus diisi'
							),
						),
					array(//new password validation
						'field'=>'password[newpassword]',
						'label'=>'Password Baru',
						'rules'=>'trim',
						),
					array(//new password confirmation vaidation
						'field'=>'password[confirmpassword]',
						'label'=>'Ulangi Password Baru',
						'rules'=>'trim|matches[password[newpassword]]',
						'errors'=>array(//custom error message
							'matches'=>'Password Baru dan konfirmasi Password Baru tidak cocok'
							),
						),
				);//end of confirmation rules
$this->form_validation->set_rules($config);
				if($this->form_validation->run())//data valid
				{
					//update database
					$this->db->where('idPemilik',$this->session->userdata('admintoko')['idPemilik']);//get id admin toko
					//data
					$profile = $this->input->post('profile');
					if(!empty($password['newpassword'])){$profile['password'] = md5($password['newpassword']);}//get new encrypted password
					else{$profile['password']= $this->session->userdata('admintoko')['password'];}//get encrypted password
					// print_r($profile);
					$this->db->update('pemilikToko',$profile);
					return redirect(site_url('dashboard/profil'));//back to update profile form
				}else//data not valid
				{
					$error = validation_errors('<div style="padding:10px" class="error">','</div>');
					$Data = array
					(
						'title'=>'Dashboard',
						'script'=>'$("#profil").addClass("active")',
						'user'=>$this->input->post('profile'),
						'error'=>$error,
						);
					return $this->basePublicView('dashboard/profil',$Data);
				}
			}//end of do update
		}else
		{
			$idPemilik = $this->session->userdata('admintoko')['idPemilik'];
			$Data = array
			(
				'title'=>'Dashboard',
				'script'=>'$("#profil").addClass("active")',
				'user'=>$this->M_penjual->detSimplePenjual($idPemilik),
				);
			return $this->basePublicView('dashboard/profil',$Data);

		}
	}
	//transaksi
	public function transaksi()
	{
		$this->load->model('M_transaksi');//load transaksi model
		$uri = $this->uri->segment(3);
		if(empty($uri))redirect(site_url('dashboard/transaksi/riwayat'));
		$script = "$('#transaksi').addClass('active');$('#riwayat').addClass('active');";
		$Data = array
		(
			'title'=>'Transaksi',
			'script'=>$script,
			'transaksi'=>$this->M_transaksi->riwayat($this->session->userdata('admintoko')['idPemilik']),
			);
		return $this->basePublicView('dashboard/transaksi',$Data);
	}
	//konfirmasi pembayaran
	public function konfirmasi()
	{
		$this->load->model(array('M_transaksi','M_konfirmasi'));//load model transaksi
		if(!empty($_POST))
		{
			switch ($_GET['act']) {
				case 'add':
					//cek apakah transaksi milik user tersebut
				if($this->M_transaksi->isMyTransaction($_POST['konfirmasi']['idTransaksi']))
				{
					$konfirmasi = $_POST['konfirmasi'];
					$data = array(
						'idTransaksi'=>$konfirmasi['idTransaksi'],
						'tglKonfirmasi'=>date('Y-m-d H:i:s'),
						'tujuanBank'=>$konfirmasi[0],
						'dariBank'=>$konfirmasi['asal'],
						'noRekening'=>$konfirmasi['norek'],
						'jumlahTransfer'=>$konfirmasi['jumlah'],
						'nama'=>$konfirmasi['nama'],
						'idTransaksi'=>$konfirmasi['idTransaksi'],
						);
					$this->db->insert('konfirmasiPembayaran',$data);
					redirect(site_url('dashboard/konfirmasi'));
				}else
				{
					echo 'id transaksi bukan atas nama akun anda';
				}
				break;

				default:
					redirect(site_url('dashboard/konfirmasi'));//kehalaman list konfirmasi
					break;
				}
			}else
			{
				$uri = $this->uri->segment(3);
				$idpemilik = $this->session->userdata('admintoko')['idPemilik'];
				if(empty($uri)){redirect(site_url('dashboard/konfirmasi/riwayat'));}
				switch ($uri) {
					case 'baru':
					$title = "Konfirmasi Baru";
					$script = "$('#konfirmasi').addClass('active');$('#baru').addClass('active');";
					$view = '';
					break;
					case 'riwayat':
					$title = "Riwayat Konfirmasi";
					$script = "$('#konfirmasi').addClass('active');$('#riwayat').addClass('active');";
					$view = $this->M_konfirmasi->riwayat($idpemilik);
					break;
				}
				$Data = array
				(
					'title'=>$title,
					'script'=>$script,
					'view'=>$view,
					);
				return $this->basePublicView('dashboard/konfirmasi',$Data);
			}
		}
	#TIKET
		public function tiket()
		{
			$this->load->model('M_ticket');
			$uri=$this->uri->segment(3);
			switch ($uri) {
				#TIKET BARU
				case 'baru':
				$Data = array
				(
					'title'=>'Tiket Baru',
					'script'=>'$scope.baruClass="active";$scope.ticketClass="active";',
					'view'=>'',
					);
				return $this->basePublicView('dashboard/ticket/new',$Data);
				break;
				#END OF TIKET BARU
				#RIWAYAT TIKET
				case 'riwayat':
				$Data = array
				(
					'title'=>'Riwayat Tiket',
					'script'=>'$scope.riwayatClass="active";$scope.ticketClass="active";',
					'tiket'=>$this->M_ticket->ticketByUser($this->session->userdata('admintoko')['idPemilik']),
					);
				return $this->basePublicView('dashboard/ticket/listing',$Data);
				break;
				#END OF RIWAYAT TIKET
				#READ TICKET
				case 'read':
				$idtiket = $this->input->get('id');
				$ticket = $this->M_ticket->readTicket($idtiket);//get ticket data
				$comments = $this->M_ticket->comments($idtiket);//get comment ticket
				$Data = array(
					'title'=>'Baca Tiket',
					'script'=>'$scope.riwayatClass="active";$scope.ticketClass="active";',
					'ticket'=>$ticket,
					'comments'=>$comments
					);
				return $this->basePublicView('dashboard/ticket/single',$Data);
				break;
				#END OF READ TICKET
				default:
				redirect(site_url('dashboard/tiket/baru'));
				break;
			}
		}
	#END OF TIKET
    #TIKET PROCESS IN ACTION
		public function ticketaction()
		{
			$act = $this->input->get('act');
			switch($act){
            //NEW TICKET
				case 'add':
				$data = $this->input->post();
				$datainsert = array
				(
                'idPemilik'=>$this->session->userdata('admintoko')['idPemilik'],//get id pemilik toko data
                'judulTiket'=>$data['tiket']['judul'],//get judul tiket
                'isiTiket'=>$data['tiket']['pesan'],//get isi pesan tiket
                'tipeTiket'=>$data['tiket']['tujuan'],//get tujuan tiket
                'tglPostTiket'=>date('Y-m-d H:i:s'),//get now
                'dibaca'=>'0',
                'statusTiket'=>'open'
                );
				$this->db->insert('tiket',$datainsert);
				redirect(site_url('dashboard/tiket/riwayat'));
				break;
            	//END OF NEW TICKET
				//CLOSE TICKET
				case 'addbalas':
				$idtiket = $_POST['id'];
				$balasan = $_POST['balasan'];
				//INSERT TO DATABASE
				$data = array
				(
					'idTiket'=>$idtiket,
					'isiBalasanTiket'=>$balasan,
					'dibacaBalasan'=>0,
					'tglBalasanTiketPost'=>date('Y-m-d H:i:s'),
					'idPemilik'=>$this->session->userdata('adminToko')['idpemilik']
					);
				$this->db->insert('balasanTiket',$data);
				redirect($this->agent->referrer());
				break;
            //END OF CLOSE TICKET
			}
		}
    #END OF TICKET PROCESS
	//do logout
		public function logout()
		{
		$this->session->sess_destroy();//clear session
		return redirect(site_url('home/login'));//back to the login page
	}
}
