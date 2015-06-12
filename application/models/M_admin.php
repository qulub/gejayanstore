<?php 
class M_admin extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	//login process
	public function canLogin($username,$password)
	{
		$this->db->select('*');
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$query = $this->db->get('admin');
		if($query->num_rows()>0){return true;}
		else{return false;}
	}
	//get admin data
	public function adminData($username)
	{
		$this->db->where('username',$username);
		$query = $this->db->get('admin');
		if($query->num_rows()>0){
			return $query->row_array();
		}else{return array();}
	}

	##COUNTER
	#TIKET SUBMISSION
	public function unreadTicket()
	{
		//TOTAL UNREAD TICKET
		$unreadtickets = $this->db->count_all();
		//TOTAL UNREAD COMMENT	
		$unreadcomments = $this->db->count_all();
		//TOTAL UNREAD
		return $unreadtickets + $unreadcomments;
	}
}