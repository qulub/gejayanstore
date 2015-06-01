<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('application/controllers/Base.php');
class Register extends Base {

	//construct
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{

	}
	//register toko
	public function toko()
	{
		$Data = array(
			'title'=>'Tambah Toko'
		);
		return $this->basePublicView('register/toko',$Data);
	}
	//isi form
	public function isiform()
	{
		if(!empty($_POST['setuju']) AND $_POST['setuju']==TRUE)
		{
			$Data = array(
				'title'=>'Isi Formulir Pendaftaran'
				);
			return $this->basePublicView('register/isifile',$Data);
		}else
		{
			$this->toko();
		}
	}//process data
	public function process()//process of entry data
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '<br/>';
		// print_r($_FILES);
		// echo '</pre>';
		//form validation
		$this->load->library('form_validation');
				$config=array
				(
					//validasi untuk pemilik
					array(//nama validation
						'field'=>'pemilik[nama]',
						'label'=>'Nama Lengkap',
						'rules'=>'required',
						'errors'=>array(//custom error message
							'required'=>'%s harus diisi'
							),
						),
					array(//nomor anggota validation
						'field'=>'pemilik[noid]',
						'label'=>'Nomor Anggota',
						'rules'=>'required',
						'errors'=>array(//custom error message
							'required'=>'%s harus diisi'
							),
						),
					array(//no telp validation
						'field'=>'pemilik[notelp]',
						'label'=>'No Telp',
						'rules'=>'required',
						'errors'=>array(//custom error message
							'required'=>'%s harus diisi'
							),
						),
					array(//email validation
						'field'=>'pemilik[email]',
						'label'=>'Email Pemilik',
						'rules'=>'required|valid_email',
						'errors'=>array(//custom error message
							'required'=>'%s harus diisi','%s bukan email valid'
							),
						),
					array(//domisili validation
						'field'=>'pemilik[domisili]',
						'label'=>'Domisili Pemilik',
						'rules'=>'required',
						'errors'=>array(//custom error message
							'required'=>'%s harus diisi'
							),
						),
					//validasi usaha
					array(
						'field'=>'usaha[nama]',
						'label'=>'Nama Usaha',
						'rules'=>'required',
						'errors'=>array(//custom error message
							'required'=>'%s harus diisi'
							),
						),
					array(
						'field'=>'usaha[deskripsi]',
						'label'=>'Deskripsi Usaha',
						'rules'=>'required',
						'errors'=>array(//custom error message
							'required'=>'%s harus diisi'
							),
						),
					array(
						'field'=>'usaha[alamat]',
						'label'=>'Alamat Usaha',
						'rules'=>'required',
						'errors'=>array(//custom error message
							'required'=>'%s harus diisi'
							),
						),
					array(
						'field'=>'usaha[telepon]',
						'label'=>'Nomor Telepon Usaha',
						'rules'=>'required',
						'errors'=>array(//custom error message
							'required'=>'%s harus diisi'
							),
						),
					array(
						'field'=>'usaha[email]',
						'label'=>'Alamat Email Usaha',
						'rules'=>'required|valid_email',
						'errors'=>array(//custom error message
							'required'=>'%s harus diisi',
							'valid_email'=>'%s email tidak valid',
							),
						),
					array(
						'field'=>'usaha[jambuka]',
						'label'=>'Jam Buka Usaha',
						'rules'=>'required',
						'errors'=>array(//custom error message
							'required'=>'%s harus diisi'
							),
						),
					array(
						'field'=>'usaha[jamtutup]',
						'label'=>'Jam Tutup Usaha',
						'rules'=>'required',
						'errors'=>array(//custom error message
							'required'=>'%s harus diisi'
							),
						),
					array(
						'field'=>'usaha[libur]',
						'label'=>'Libur Usaha',
						'rules'=>'required',
						'errors'=>array(//custom error message
							'required'=>'%s harus diisi'
							),
						),
				);
		//is validation start
		$this->form_validation->set_rules($config);
		if($this->form_validation->run())//validasi berhasil, waktunya upload
		{
			// echo 'semua data valid';
			//upload validation
			$config = array(
				//ktp upload
				'idcard'=>array(
					'upload_path'=>'./resource/images/idcard',
					'allowed_types'=>'png|jpg',
					'max_sizes'=>1000000,
					'encrypt_name' => TRUE
					),
				//logo upload
				'logo'=>array(
					'upload_path'=>'./resource/images/toko',
					'allowed_types'=>'png|jpg',
					'max_sizes'=>1000000,
					'encrypt_name' => TRUE
					),
				//syarat 1 upload
				'tdp'=>array(
					'upload_path'=>'./resource/images/tdp',
					'allowed_types'=>'png|jpg',
					'max_sizes'=>1000000,
					'encrypt_name' => TRUE
					),
				//syarat 2 upload
				'siup'=>array(
					'upload_path'=>'./resource/images/siup',
					'allowed_types'=>'png|jpg',
					'max_sizes'=>1000000,
					'encrypt_name' => TRUE
					),
				//syarat 3 upload
				'sig'=>array(
					'upload_path'=>'./resource/images/sig',
					'allowed_types'=>'png|jpg',
					'max_sizes'=>1000000,
					'encrypt_name' => TRUE
					),
				);
			//do upload
			$this->load->library('upload');
			//logo toko
			// $this->upload->initialize($config['logo']);
			$this->upload->initialize($config['logo']);
			$this->upload->do_upload('logotoko');
			$logoname = $this->upload->data('file_name');//get ktp filename
			//idcard
			$this->upload->initialize($config['idcard']);
			$this->upload->do_upload('idcard');
			$idcardname = $this->upload->data('file_name');//get ktp filename
			//tdp
			$this->upload->initialize($config['tdp']);
			$this->upload->do_upload('tdp');
			$tdpname = $this->upload->data('file_name');//get tdp file name
			//siup
			$this->upload->initialize($config['siup']);
			$this->upload->do_upload('siup');
			$siupname = $this->upload->data('file_name');//get siup filename
			//sig
			$this->upload->initialize($config['sig']);
			$this->upload->do_upload('sig');
			$signame = $this->upload->data('file_name');//get sig filename
			$this->upload->display_errors();
			$pemilik = $_POST['pemilik'];
			//insert pemilik toko
			$datapemilik = array(
				'tglRegister'=>date('Y-m-d H:i:s'),
				'lastLogin'=>date('Y-m-d H:i:s'),
				'namaPemilik'=>$pemilik['nama'],
				'telp'=>$pemilik['notelp'],
				'email'=>$pemilik['email'],
				'alamat'=>$pemilik['domisili'],
				'idcard'=>$idcardname,
				'status'=>'menunggu',
				);
			$this->db->insert('pemilikToko',$datapemilik);//insert to table pemilik toko
			//get lattest pemilik toko id
			$this->load->model('M_penjual');
			$idpemilik = $this->M_penjual->latestPemilikToko();
			//insert toko
			$usaha = $_POST['usaha'];
			$datatoko = array(
				'idPemilik'=>$idpemilik,
				'namaToko'=>$usaha['nama'],
				'alamatToko'=>$usaha['alamat'],
				'avatar'=>$logoname,
				'jamBuka'=>$usaha['jambuka'],
				'jamTutup'=>$usaha['jamtutup'],
				'telp'=>$usaha['telepon'],
				'emailToko'=>$usaha['email'],
				'tentangToko'=>$usaha['deskripsi'],
				'updateData'=>date('Y-m-d H:i:s'),
				'libur'=>$usaha['libur'],
				'MaxPromo'=>0,
				'kategoriUsaha'=>$usaha['kategori'],
				'tdp'=>$tdpname,
				'siup'=>$siupname,
				'sig'=>$signame,
				);
			$this->db->insert('toko',$datatoko);//insert to table toko
			return $this->registersuccess($datapemilik['email']);//kirim pensa success ke email
		}else
		{
			$error = validation_errors('<div id="error" style="padding:10px" class="error">','</div>');
			$Data = array(

				'title'=>'Isi Formulir Pendaftaran',
				'error'=>$error,//print error page
				'pemilik'=>$_POST['pemilik'],//get pemilik
				'usaha'=>$_POST['usaha'],//get usaha
				);
			return $this->basePublicView('register/isifile',$Data);
		}
	}
	//send email
	public function registersuccess($destination)
	{
		//html message
		$body ='Username dan password akan dikirimkan melalui email ini, setelah data yang anda masukan diverifikasi oleh admin';
		$topic = 'Pendaftaran Toko Di Gejayan Store';
		$subject = 'Pendaftaran Anda Berhasil';
		$this->sendemail($destination,$subject,$topic,$body);//email success to user
		//pesan emai
		$Data = array
		(
			'title'=>'Pendaftaran Sukses',
			'pesan'=>'Pendaftaran sukses. Username dan Password akan dikirimkan ke email anda setelah diverifikasi oleh admin',
			);
		$this->basePublicView('register/sukses',$Data);
	}
	//admin process
	public function actionprocess()
	{
		$this->load->model('M_penjual');
		switch ($_GET['act']) {
			case 'konfirmasi'://new konfirmasi
				$idpemilik = $_GET['idpemilik'];
				$pemilik = $this->M_penjual->detSimplePenjual($idpemilik);
				$namaArray = explode(' ',$pemilik['namaPemilik']);
				//generate username and password
				if($this->M_penjual->usernameNotFound($namaArray[0]))
				{
					$username = $namaArray[0];
				}else if($this->M_penjual->usernameNotFound($namaArray[0].$namaArray[1]))
				{
					$username = $namaArray[0].$namaArray[1];
				}else
				{
					$username = $namaArray[0].$namaArray[1].date('is');
				}
				$password = strtolower($username.date('is'));//password send to email
				$username = strtolower($username);//username send to email
				//update db status
				$this->db->where('idPemilik',$idpemilik);
				$data = array('userName'=>$username,'password'=>md5($password),'status'=>'active');
				$this->db->update('pemilikToko',$data);
				//send email to pemilik toko
				$destination = $pemilik['email'];
				$subject = 'Akun GejayanStore Anda Siap Digunakan';
				$topic = 'Pendaftaran Telah Kami Konfirmasi';
				$body = '<p>Selamat anda telah menjadi customer dari GejayanStore. Untuk login silahkan klik masuk ke link <a href="http://gejayanstore.com/home/login">http://gejayanstore.com/home/login</a>
				menggunakan akun dibawah ini :</p>
				<p>
				
				<strong> Password : </strong> '.$password.'<br/>
				</p>
				<p>untuk langkah berikutnya adalah aktifasi masa aktif promo, silahkan pilih jenis pembayarannya melalui login ke GejayanStore.</p>
				';
				$this->sendemail($destination,$subject,$topic,$body);
				redirect(site_url('admin/penjual'));//back to last page
				break;
			case 'tolak'://delete konfirmasi
				$idpemilik = $_GET['idpemilik'];
				$alasan = $_GET['pesan'];
				$pemilik = $this->M_penjual->detSimplePenjual($idpemilik);
				$this->db->where('idPemilik',$idpemilik);
				// $this->db->delete('pemilikToko');
				//send email to user
				$destination = $pemilik['email'];
				$subject = '';
				$topic = '';
				$body = '';
				// $this->sendemail($destination,$subject,$topic,$body);
				// redirect($this->agent->referrer());//back to last page
				break;
		}
	}
}
