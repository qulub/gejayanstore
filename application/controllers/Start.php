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
		$Sess = $this->session->userdata('morfologi');
		if(empty($Sess)){redirect(site_url());}		
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
		$this->load->model('M_DeterminasiDikotomi');
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
		//perhitungan determinasi dikotomi
		//start perhitungan determinasi  dikotomi
		$TotalSess = count($this->session->userdata('morfologi'));
		switch ($TotalSess) {
			case '3'://2 kondisi
				$a = $Sess[1]['kode'];
				$b = $Sess[2]['kode'];
				break;
			case '4'://3 kondisi
				$a = $Sess[1]['kode'];
				$b = $Sess[2]['kode'];
				$c = $Sess[3]['kode'];
				break;		
			case '5'://4 kondisi
				$a = $Sess[1]['kode'];
				$b = $Sess[2]['kode'];
				$c = $Sess[3]['kode'];
				$d = $Sess[4]['kode'];
				break;
			case '6'://5 kondisi
				$a = $Sess[1]['kode'];
				$b = $Sess[2]['kode'];
				$c = $Sess[3]['kode'];
				$d = $Sess[4]['kode'];
				$e = $Sess[5]['kode'];
				break;
			case '7'://6 kondisi
				$a = $Sess[1]['kode'];
				$b = $Sess[2]['kode'];
				$c = $Sess[3]['kode'];
				$d = $Sess[4]['kode'];
				$e = $Sess[5]['kode'];
				$f = $Sess[5]['kode'];
				break;
		}
		//end of perhitungan determinasi dikotomi
		// print_r($this->session->userdata['morfologi']);
		//kembali kehalaman start
		redirect(site_url('start'));//ke halaman start
	}
	//get the result
	public function result(){
		print_r($this->session->userdata('morfologi'));
		$Data = array 
		(
			'title'=>'Hasil Akhir',
			);
		$this->basePublicView('result',$Data);
	}
}
