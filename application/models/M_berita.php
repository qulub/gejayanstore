<?php 
class M_berita extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	#READ#
	#SHOW ALL BERITA
	public function listing($limit="",$offset="")
	{
		if(!empty($limit) AND !empty($offset))$this->db->limit($limit,$offset);//if set a pagination
		$this->db->order_by('tglUpdateBerita','asc');//order by update time
		return $this->db->get('berita');
	}
	#READ BERITA
	public function single()
	{

	}
	#------------------------------#
	#EDIT#
}