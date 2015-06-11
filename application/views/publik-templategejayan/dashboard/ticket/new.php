<?php
if(!empty($script))echo '<script>$(document).ready(function(){'.$script.'});</script>';
?>
<style type="text/css">
td{padding:10px;}
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
            <!-- START TICKET -->
            <form name="myForm" method="post" action="<?php echo site_url('dashboard/ticketaction?act=add')?>" enctype="multipart/form-data">
              <div>
                <span><label>Judul</label></span>
                <span><input name="tiket[judul]" type="text" class="textbox" value="" required></span>
              </div>
              <div>
                <span><label>Pesan</label></span>
                  <span><textarea name="tiket[pesan]" type="text" class="textbox" value="" required></textarea></span>
              </div>
              <div>
                <span><label>Ditujukan Kepada</label></span>
                <span>
                  <radiogroup>
                      <label style="float:left"><input type="radio" name="tiket[tujuan]" value="cs"> Customer Service</label>
                      <label style="float:left"><input type="radio" name="tiket[tujuan]" value="biling"> Biling</label>
                      <label style="float:left"><input type="radio" name="tiket[tujuan]" value="biling"> Teknis</label>
                  </radiogroup>
                </span>
              </div>
                <br/>
                <div>
                <span><input type="submit" class="" value="Kirim Tiket"></span>
                </div>
            </form>
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
