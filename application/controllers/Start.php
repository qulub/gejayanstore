<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('application/controllers/Base.php');
class Start extends Base 
{

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
		$Sess = $this->session->userdata('morfologi');
		if(empty($Sess)){redirect(site_url());}		
		print_r($this->session->userdata('morfologi'));
		$Data = array 
		(
			'Title'=>'Step Pertama',
			);
		$this->basePublicView('start',$Data);
	}
	// //step 1
	public function firststep()
	{
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
	public function nextstep()
	{
		$this->load->model('M_determinasidikotomi');
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
		$Sess = $this->session->userdata('morfologi');
		//pencocokan key dengan db
		$result = $this->M_determinasidikotomi->getHewan1($first_key);//get last choice
		if($result != 0)//ditemukan yang cocok 
		{
			//setup $result session
			$SessionData['result'] = $this->session->userdata('result');
			$SessionData['morfologi'] = $this->session->userdata('morfologi');
			//push last morfologi
			//push result
			$resultarray = array('kode'=>$result);
			array_push($SessionData['result'], $resultarray);
			$this->session->set_userdata($SessionData);
			print_r($this->session->userdata('result'));
			redirect(site_url('start/result/'.$first_key));//ke halaman start
		}else 
		{
		//end of pencocok key dengan db

		//perhitungan determinasi dikotomi
		//start perhitungan determinasi  dikotomi
			$TotalSess = count($this->session->userdata('morfologi'));
			print_r($Sess);
		// echo $TotalSess;
			switch ($TotalSess) {
			case '2'://1 kondisi
			$a = $Sess[1]['kode'];
			$result = $this->M_determinasidikotomi->getHewan1($a);
			$kdakhir = $a;
			break;
			case '3'://2 kondisi
			$a = $Sess[1]['kode'];
			$b = $Sess[2]['kode'];
			$result = $this->M_determinasidikotomi->getHewan2($a,$b);
			$kdakhir = $b;		
			break;
			case '4'://3 kondisi
			$a = $Sess[1]['kode'];
			$b = $Sess[2]['kode'];
			$c = $Sess[3]['kode'];
			$result = $this->M_determinasidikotomi->getHewan3($a,$b,$c);
			$kdakhir = $c;
			break;		
			case '5'://4 kondisi
			$a = $Sess[1]['kode'];
			$b = $Sess[2]['kode'];
			$c = $Sess[3]['kode'];
			$d = $Sess[4]['kode'];
			$result = $this->M_determinasidikotomi->getHewan4($a,$b,$c,$d);
			$kdakhir = $d;
			break;
			case '6'://5 kondisi
			$a = $Sess[1]['kode'];
			$b = $Sess[2]['kode'];
			$c = $Sess[3]['kode'];
			$d = $Sess[4]['kode'];
			$e = $Sess[5]['kode'];
			$result = $this->M_determinasidikotomi->getHewan5($a,$b,$c,$d,$e);
			$kdakhir = $e;
			break;
			case '7'://6 kondisi
			$a = $Sess[1]['kode'];
			$b = $Sess[2]['kode'];
			$c = $Sess[3]['kode'];
			$d = $Sess[4]['kode'];
			$e = $Sess[5]['kode'];
			$f = $Sess[6]['kode'];
			$result = $this->M_determinasidikotomi->getHewan6($a,$b,$c,$d,$e,$f);
			$kdakhir = $f;
			break;
		}
		//end of perhitungan determinasi dikotomi
		// print_r($this->session->userdata['morfologi']);
		//kembali kehalaman start
		if($result != 0)
		{
			//setup $result session
			$SessionData['result'] = $this->session->userdata('result');
			$SessionData['morfologi'] = $this->session->userdata('morfologi');
			//push last morfologi
			//push result
			$resultarray = array('kode'=>$result);
			array_push($SessionData['result'], $resultarray);
			$this->session->set_userdata($SessionData);
			print_r($this->session->userdata('result'));
			redirect(site_url('start/result'));//ke halaman start
		}else 
		{			
		redirect(site_url('start'));//ke halaman start
	}
}

}
	//get the result
public function result()
{
	$this->load->model('M_hewan');
	//print_r($this->session->userdata('morfologi'));
	$Data = array 
	(
		'title'=>'Hasil Akhir'
		);
	$this->basePublicView('result',$Data);
}
//second step
public function secondStep(){

}
}
