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
			echo 'semua data valid';
			$this->load->library('upload');
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
			//initialize upload config
			$this->upload->initialize($config['idcard']);
			$this->upload->initialize($config['tdp']);
			$this->upload->initialize($config['siup']);
			$this->upload->initialize($config['sig']);
			//do upload
			$this->upload->do_upload('idcard');
			echo $idcardname = $this->upload->data('file_name');//get ktp filename
			$this->upload->do_upload('tdp');
			echo $tdpname = $this->upload->data('file_name');//get tdp file name
			$this->upload->do_upload('siup');
			echo $siupname = $this->upload->data('file_name');//get siup filename
			$this->upload->do_upload('sig');
			echo $signame = $this->upload->data('file_name');//get sig filename
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
	public function success()
	{
		$destination = 'yusuftwenty@gmail.com';
		$subject = 'Rindu Sangat';
		$body = '<h1>Pendaftaran Gejayan Store</h1><p>Data anda telah kami terima, terus cek email ini untuk mengetahui status pendaftara anda</p>';
		return $this->sendemail($destination,$subject,$body);
	}
}
