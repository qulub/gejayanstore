<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('application/controllers/Base.php');
class Home extends Base {
	
	//construct
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{	
		$Data = array 
		(
			'title'=>'',
			'listproduk'=>$this->M_produk->listProduk(9,0),
			'listtoko'=>$this->M_toko->listToko(9,0),
			);
		$this->basePublicView('home',$Data);
	}
	//do login for member :: pemilik toko atau member
	public function login()
	{
		//login proses
		if(!empty($_POST))
		{
			$this->load->library('form_validation');
			$config=array
			(
				array(
					'field'=>'login[email]',
					'label'=>'Email',
					'rules'=>'required|valid_email|trim',
					'errors'=>array(//custom error message
						'required'=>'%s harus diisi','valid_email'=>'penulisan %s harus valid'
						),
					),
				array(
					'field'=>'login[password]',
					'label'=>'Password',
					'rules'=>'required|trim',
					'errors'=>array(//custom error message
						'required'=>'%s harus diisi',
						),
					),
				);
			//run validarion
			$this->form_validation->set_rules($config);
			if($this->form_validation->run())
			{
				$this->load->model('M_penjual');
				//if user found
				$email = $_POST['login']['email'];
				$password = $_POST['login']['password'];
				$userData = $this->M_penjual->canLogin($email,$password);
				if($userData->num_rows()>0)//user found
				{
					$sessionData['admintoko'] = $userData->row_array();
					$this->session->set_userdata($sessionData);
					$this->db->where('idPemilik',$userData->row_array()['idPemilik']);
					$this->db->update('pemilikToko',array('lastLogin'=>DATE('y-m-d H:i:s')));
					return redirect(site_url('Dashboard'));//redirect to dashboard
				}else//user not found
				{
					//end of login proses
					$Data = array
					(
						'title'=>'Login',
						'error'=>'<div class="error">Email dan Password tidak cucok</div>',
						);
					$this->basePublicView('login',$Data);
				}
			}else
			{
				//end of login proses
				$Data = array
				(
					'title'=>'Login',
					'error'=>validation_errors('<div class="error">','</div>'),
					);
				$this->basePublicView('login',$Data);
			}

		}else
		{
			//end of login proses
			$Data = array
			(
				'title'=>'Login',
				);
			$this->basePublicView('login',$Data);
		}
	}
	//login action untuk e=member dan pemilik toko
	public function loginaction()
	{
		$uri = $this->uri->segment(3);
		switch ($uri) {
			case 'owner'://gejayan store shop owner
				# code...
			break;
			case 'customer'://gejayan store member
				# code...
			break;
		}
	}

}

