<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('application/controllers/Base.php');
class Dashboard extends Base {//dashboard controller created for shop owner

	//construct
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('M_penjual'));//auto load model
		if(empty($this->session->userdata('admintoko')))redirect(site_url('home/login'));//back to login page
		
	}
	//index menampilkan semua promo and status
	public function index()
	{
		$Data = array
		(
			'title'=>'Dashboard',
			'script'=>'$("#dashboard").addClass("active")',
			);
		return $this->basePublicView('dashboard/index',$Data);
	}
	//olah data promo
	public function promo()
	{

	}
	//olah data toko
	public function toko()
	{

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
	//do logout
	public function logout()
	{
		$this->session->sess_destroy();//clear session
		return redirect(site_url('home/login'));//back to the login page
	}
}
