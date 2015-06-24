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
    public function unreadTicket($type)
    {
        switch ($type) {
            case 'tickets'://UNREAD TICKET
            $this->db->where('dibaca','0');
            $count = $this->db->count_all_results('tiket');
            break;
            case 'comments'://UNREAD TICKET
            $this->db->where('idAdmin',null);
            $this->db->where('dibacaBalasan','0');
            $count = $this->db->count_all_results('balasanTiket');
            break;
            default:
            $count = $this->M_admin->unreadTicket('tickets');
            break;
        }
        return $count;
    }
    #GET TIKET
    public function getTiket($by="",$type="",$status="")//TRUE OR FALSE
    {
      // if(!empty($by))$this->db->where('balasanTiket.'.$by,null);
      if(!empty($type))$this->db->where('tiket.tipeTiket',$type);
      if(!empty($type))$this->db->where('tiket.statusTiket',$status);
      $this->db->select('*');
      // $this->db->join('balasanTiket','balasanTiket.idTiket = tiket.idtiket');//JOINED
      $this->db->join('pemilikToko','tiket.idPemilik = pemilikToko.idPemilik');//JOINED
      $this->db->join('toko','toko.idpemilik = pemilikToko.idPemilik');//JOINED
      $this->db->order_by('tiket.tglUpdateTiket','ASC');//LATEST UPDATE IS FIRST
      return $this->db->get('tiket');
    }
}
