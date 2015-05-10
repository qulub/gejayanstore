<style media="screen">
   th{width:300px}
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
      <a class="btn btn-default" href="<?php echo site_url('admin/penjual');?>"><i class="glyphicon glyphicon-arrow-left"></i> kembali</a>
      <!-- <?php print_r($toko); ?> -->
      <br/>
      <h4>Biodata pemilik</h4>
      <table class="table">
         <tr><th>Id Penjual</th><td><?php echo $penjual['idPemilik'];?></td></tr>
         <tr><th>Nama Pemilik</th><td><?php echo $penjual['namaPemilik'];?></td></tr>
         <tr><th>Email</th><td><?php echo $penjual['email'];?></td></tr>
         <tr><th>nomor Telp</th><td><?php echo $penjual['telp'];?></td></tr>
         <tr><th>Alamat</th><td><?php echo $penjual['alamat'];?></td></tr>
         <tr><th>Tanggal Register</th><td><?php echo $penjual['tglRegister'];?></td></tr>
         <tr><th>Login Terakhir</th><td><?php echo $penjual['updateData'];?></td></tr>
      </table>
      <hr/>
      <h4>Data Toko</h4>
      <?php if (empty($toko)){echo '<strong>belum punya toko</strong>';}else?>
      <?php {?>
      <table class="table">
         <tr><th>Id Toko</th><td><?php echo $toko['idToko'];?></td></tr>
         <tr><th>Nama Toko</th><td><a href="<?php echo site_url('toko/v/'.$toko["idToko"].'/'.$toko["namaToko"]);?>" target="_blank"><?php echo $toko['namaToko'];?></a></td></tr>
         <tr><th>Alamat</th><td><?php echo $toko['alamatToko'];?></td></tr>
         <tr><th>Jam Buka</th><td><?php echo $toko['jamBuka'];?></td></tr>
         <tr><th>Jam Tutup</th><td><?php echo $toko['jamTutup'];?></td></tr>
         <tr><th>No Telp</th><td><?php echo $toko['telp'];?></td></tr>
      </table>
      <?php }?>
      <hr/>
      <h4>Daftar Promosi</h4>
      <hr/>
   </div>
   <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
