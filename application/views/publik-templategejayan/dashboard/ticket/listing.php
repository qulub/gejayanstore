
<?php
if(!empty($script))echo '<script>$(document).ready(function(){'.$script.'});</script>';
?>
<style type="text/css">
/*    table{width:100%}*/
    td,th{padding:10px;}
    th{font-weight:bold;border-bottom:solid 1px lightgray}
    td{text-align:left}
</style>
<div ng-controller="ctrlTickets" class="gallery1">
  <div class="container">
    <div class="wrap">
      <div class="main">
        <div class="contact">
          <?php $this->load->view('publik-templategejayan/dashboard/navbar');?>
          <div class="contact-form">
            <h1><?php echo $title;?></h1>
            <br/>
            <ul class="vertical-menu">
              <a class="{{baruClass}}" id="baru" href="<?php echo site_url('dashboard/tiket/baru');?>">+ Tiket Baru</a> |
              <a class="{{riwayatClass}}" id="riwayat" href="<?php echo site_url('dashboard/tiket/riwayat');?>">Riwayat Tiket</a>
            </ul>
          </div>
          <div class="contact-form">
            <br/>
              <p><strong>Total Tiket  : <?php echo $tiket->num_rows();?></strong><br/>Tiket otomatis terhapus setelah lebih dari 10 slot</p>
              <br/>
              <?php
                $tickets = $tiket->result_array();
                if(!empty($tickets))
                {
//                    print_r($tickets);
              ?>
            <!-- START TICKET -->
            <table>
                <tr>
                    <th>Judul Tiket</th>
                    <th>Isi Tiket</th>
                    <th>Kebagian</th>
                    <th style="width:150px">Tgl Post</th>
                    <th style="width:150px"></th>
                </tr>
                <?php foreach($tickets as $ticket):?>
                <tr>
                    <td><a href="<?php echo site_url('dashboard/tiket/read?id='.$ticket['idtiket']);?>"><?php echo $ticket['judulTiket'];?></a></td>
                    <td><?php echo $ticket['isiTiket'];?></td>
                    <td><?php echo $ticket['tipeTiket'];?></td>
                    <td><?php echo $ticket['tglPostTiket'];?></td>
                    <td>status : <?php if($ticket['statusTiket']=='open'){$color="green";}else{$color="red";};?>
                      <?php $balasan = $this->M_ticket->unreadComments($ticket['idtiket']);?>
                      <span style="color:<?php echo $color;?>"><?php echo $ticket['statusTiket'];?></span>
                      <br/>
                      <?php if($balasan <= 0){ echo '<i>belum ada pemberitahuan</i></td>';}else{echo '<i>'.$balasan.' komentar belum terbaca</i>';}?>
                </tr>
                <?php endforeach;?>
              </table>
              <?php } else {?>
              <div class="error">Anda belum pernah submit tiket</div>
              <?php } ?>
            <!-- END OF TICKET -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="clear"> </div>
</div>
<script charset="utf-8">
  app.controller('ctrlTickets',['$scope','$http',function($scope,$http){
    <?php if(!empty($script))echo $script;?>
  }]);
</script>
