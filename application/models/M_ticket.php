<?php
class M_ticket extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
    #TICKET BY PEMILIK TOKO : 9 Jun 15
    public function ticketByUser($iduser)
    {
        $this->db->where('tiket.idPemilik',$iduser);
		// $this->db->join('balasanTiket','balasanTiket.idTiket = tiket.idTiket','right');
		$this->db->order_by('tiket.tglUpdateTiket','DESC');
        return $this->db->get('tiket');
    }
		#TICKET BY ID TICKET
		public function readTicket($idticket)
		{
			$this->db->where('idtiket',$idticket);
			return $this->db->get('tiket')->row_array();
		}
		#GET ALL COMMENTS ORDER BY DATE ASC
		public function comments($idticket)
		{
			$this->db->select('*');
			$this->db->where('idtiket',$idticket);
			$this->db->order_by('balasanTiket.tglBalasanTiketPost','DESC');
			$this->db->join('admin','balasanTiket.idAdmin = admin.idAdmin','left');
			$this->db->join('pemilikToko','balasanTiket.idPemilik = pemilikToko.idPemilik','left');
			return $this->db->get('balasanTiket');
		}
		#NOTIFICATION FOR UNREAD COMMENT //LOGIN AS PEMILIK TOKO
		public function unreadComments($idtiket)
		{
			$this->db->where('idtiket',$idtiket);
			$this->db->where('dibacaBalasan','0');
			$this->db->where('idPemilik',null);
			return $this->db->get('balasanTiket')->num_rows();
		}
}
