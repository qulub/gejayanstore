
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
            <p>
              <!-- START TICKET -->
              <?php $tiket = $ticket;?>
              <table>
                <tr>
                  <td><strong>Dikirim pada </strong></td>
                  <td><?php echo $tiket['tglPostTiket']?></td>
                </tr>
                <tr>
                  <td><strong>Judul </strong></td>
                  <td><?php echo $tiket['judulTiket']?></td>
                </tr>
                <tr>
                  <td><strong>Pesan </strong></td>
                  <td><?php echo $tiket['isiTiket']?></td>
                </tr>
                <tr>
                  <td><strong>Ke Bagian </strong></td>
                  <td><?php echo $tiket['tipeTiket']?></td>
                </tr>
                <tr>
                  <td><strong>Status </strong></td>
                  <td>
                    <?php if($ticket['statusTiket']=='open'){$color="green";}else{$color="red";};?><span style="color:<?php echo $color;?>"><?php echo $ticket['statusTiket'];?>
                    </td>
                  </tr>
                </table>
              </p>              
              <hr style="border: 1px solid rgb(229, 229, 229);"/>
              <h2>Balasan Tiket (<?php echo $comments->num_rows();?>)</h2><br/> 
              <!-- END OF TICKET -->
              <form method="POST" action="<?php echo site_url('dashboard/ticketaction?act=addbalas')?>">
                <label>Balasan Baru</label>
                <input name="id" type="hidden" value="<?php echo $tiket['idtiket'];?>">
                <textarea name="balasan" style="width:100%" placeholder="balasan tiket"></textarea>
                <span><input type="submit" value="Kirim Balasan"></span>
              </form>
              <br/>
              <?php if(empty($comments->result_array())){echo '<div class="error">Belum ada balasan</div>';}else{?>
              <?php foreach($comments->result_array() as $comment):
              if($comment['idPemilik']==null){$class='comment-admin';$dari='balasan Admin';}else{$class='comment-pemilik';$dari='balasan Saya';}
              ?>
              <div style="padding:10px" class="<?php echo $class;?>">
                <small><strong><?php echo $dari;?></strong> <?php echo $comment['tglBalasanTiketPost'];?></small><br/>
                <?php echo $comment['isiBalasanTiket'];?>
              </div>
            <?php endforeach;?>
            <?php } ?>
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
