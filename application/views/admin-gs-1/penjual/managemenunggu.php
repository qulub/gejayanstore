<style media="screen">
th{width:150px}
</style>
<script charset="utf-8">
$(document).ready(function(){
   <?php if(!empty($script))echo $script;?>
});
</script>
<div id="wrapper">
   <?php $this->load->view('admin-gs-1/bases/navbar');?>
   <div id="page-wrapper">
      <br/>
      <ol class="breadcrumb">
         <li><a href="<?php echo site_url('admin/dashboard');?>">Dashboard</a></li>
         <li><a href="<?php echo site_url('admin/Penjual');?>">Penjual</a></li>
         <li class="active">Manage</li>
      </ol>
      <a class="btn btn-default" href="<?php echo site_url('admin/penjualmenunggu');?>"><i class="glyphicon glyphicon-arrow-left"></i> kembali</a>
      <br/><br/>
      <?php if($penjual['status']=='menunggu'){//jika status pemilik toko adalah menunggu untuk konfirmasi?>
         <div class="extra-box" class="col-md-12">
            <h4><span class="glyphicon glyphicon-shopping-cart"></span> Konfirmasi Pembayaran</h4>
            <?php if(empty($konfirmasi)){echo '<p><i>pelanggan belum melakukan konfirmasi</i></p>';}else?>
         </div>
         <?php } ?>
         <br/>
         <div class="col-md-6">
            <h4><span class="glyphicon glyphicon-briefcase"></span> Biodata pemilik</h4><br/>
            <table class="table">
               <tr><th>Id Penjual</th><td><?php echo $penjual['idPemilik'];?></td></tr>
               <tr><th>Nama Pemilik</th><td><?php echo $penjual['namaPemilik'];?></td></tr>
               <tr><th>Email</th><td><?php echo $penjual['email'];?></td></tr>
               <tr><th>nomor Telp</th><td><?php echo $penjual['telp'];?></td></tr>
               <tr><th>Alamat</th><td><?php echo $penjual['alamat'];?></td></tr>
               <tr><th>Tanggal Register</th><td><?php echo $penjual['tglRegister'];?></td></tr>
            </table>
         </div>
         <div class="col-md-6">
            <h4><span class="glyphicon glyphicon-home"></span> Data Toko</h4><br/>
            <p><i>belum mempunyai toko</i></p>
         </div>
         <hr/>
         <br/>
      </div>
      <!-- /#page-wrapper -->
   </div>
   <!-- /#wrapper -->
