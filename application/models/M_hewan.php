<?php 

class M_hewan extends CI_Model{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	//get first step set clasification
	public function firstMorfologi($type){
		$this->db->where('type',$type);
		$this->db->where('hubungan_klasifikasi','');
		$this->db->order_by('kd_ciri_morfologi','asc');
		$query = $this->db->get('ciri_morfologi');
		return $query->result_array();
	}
	//get nama morfologi
	public function getNamaMorfologi($kodemorfologi){
		$this->db->where('kd_ciri_morfologi',$kodemorfologi);
		$query = $this->db->get('ciri_morfologi');
		$query = $query->row_array();
		return $query['nm_ciri_morfologi'];
	}
	//related morfologi
	public function relatedMorfologi($kodemorfologi){
		$this->db->where('hubungan_klasifikasi',$kodemorfologi);
		$this->db->order_by('kd_ciri_morfologi','asc');
		$query = $this->db->get('ciri_morfologi');
		return $query->result_array();
	}
}