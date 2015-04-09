<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('application/controllers/Base.php');
class Start extends Base {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	public function index()
	{	
		$sess = $this->session->userdata('morfologi');
		if(empty($sess)){redirect(site_url());}
		// print_r($this->session->userdata('morfologi'));
		$Data = array 
		(
			'Title'=>'Step Pertama',
			);
		$this->basePublicView('start',$Data);
	}
	// //step 1
	public function firststep(){
		$SessionData['morfologi'] = array();
		$morfdata = array('kode'=>0,'name'=>$this->input->get('type'));
		array_push($SessionData['morfologi'], $morfdata);
		//membersihkan sistem
		$this->session->set_userdata($SessionData);
		//eksekusi tag pertama
		$type = $this->input->get('type');
		switch ($type) {
			case 'vertebrata':
				//get first element of ciri morfologi
				$Data = array 
				(
					'viewmorfologi'=>$this->M_hewan->firstMorfologi($type),
				);
				break;
			case 'avertebrata':
				//get first element of ciri morfologi
				$Data = array 
				(
					'viewmorfologi'=>$this->M_hewan->firstMorfologi($type),
				);
				break;
			default:
				//redirect ke halaman utama
				redirect(site_url());
				break;
		}
		redirect(site_url('start'));//ke halaman start		
	}
	//proses tambah session
	public function nextstep(){
		//get kode ciri morfologi
		reset($_POST);
		$first_key = key($_POST);//angka pertama
		//memasukan data ke session
		$SessionData['morfologi'] = $this->session->userdata('morfologi');
		$name = $this->M_hewan->getNamaMorfologi($first_key);
		$morfdata = array('kode'=>$first_key,'name'=>$name);
		array_push($SessionData['morfologi'], $morfdata);
		//membersihkan sistem
		$this->session->set_userdata($SessionData);
		//kembali kehalaman start
		redirect(site_url('start'));//ke halaman start
	}
	//get the result
	public function result(){
		echo 'This is the results';
		$Data = array 
		(
			'title'=>'Hasil Akhir',
			);
		$this->basePublicView('result',$Data);
	}
}
