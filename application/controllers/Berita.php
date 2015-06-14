<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('application/controllers/Base.php');
class Berita extends Base {

	//construct
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_berita');
	}
	public function index()//GET LIST OF BERITA
	{
		redirect(site_url('berita/semua'));
	}
	public function semua()
	{
		//PAGINATION START
	    $this->load->library('pagination');
	    $config['base_url'] = site_url($this->uri->uri_string);
	    $config['total_rows'] = $this->M_berita->listing()->num_rows();
	    $config['per_page'] = 20;
	    $config['uri_segment'] = 4;
	    $config['num_links'] = 5;
	    $URI = $this->uri->segment(4);
	    if(empty($URI))$URI=0;
	    $this->pagination->initialize($config);
	    $Data = array(
	      'title'=>'Semua Berita',
	      'script'=>'',
	      'berita'=>$this->M_berita->listing($config['per_page'],$URI)->result_array(),
	      'count'=>$this->M_berita->listing()->num_rows(),
	      'link'=>$this->pagination->create_links(),
	      );
	    return $this->basePublicView('berita/list',$Data);
	}
	public function baca()
	{
		$id = $this->uri->segment(3);
		$Data = array
		(
			'title'=>'Baca Berita',
			'berita'=>$this->M_berita->single($id)
		);
		return $this->basePublicView('berita/baca',$Data);
	}
}
