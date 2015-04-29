<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('application/controllers/Base.php');
class Ajax extends Base {

	//construct
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
	echo 'GET OUT HACKER!!!';
	}
	//add views to item
	public function addViews()
	{
		$iditem = $_POST['iditem'];
		$this->db->where('idItem',$iditem);
		$sql = 'UPDATE item SET views = views+1 WHERE idItem='.$iditem;
		return $this->db->query($sql);		
	}
}
