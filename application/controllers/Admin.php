<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('application/controllers/Base.php');
class Admin extends Base {

	//construct
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
	echo 'GET OUT HACKER!!!';
	}
	//dahboard
	public function dashboard()
	{
		$Data  = array(
			'title'=>'Admin Dashboard',
			);
		$this->baseAdminView('dashboard',$Data);
	}
}