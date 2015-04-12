<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('application/controller/Base.php');
class Update extends Base {
	
	//construct
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->load->view('welcome_message');
	}
}
