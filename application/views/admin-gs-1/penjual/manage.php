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
      <a class="btn btn-default" href="<?php echo site_url('admin/penjual');?>"><i class="glyphicon glyphicon-arrow-left"></i> kembali</a>
      <br/>
      <!-- <?php print_r($toko); ?> -->
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
            <tr><th>Login Terakhir</th><td><?php echo $penjual['updateData'];?></td></tr>
         </table>
      </div>
      <div class="col-md-6">
         <h4><span class="glyphicon glyphicon-home"></span> Data Toko</h4><br/>
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
         </div>
         <div class="row">
            <div class="col-md-12">
               <h4><span class="glyphicon glyphicon-bullhorn"></span> Daftar Promosi</h4>
               <?php foreach($promosi as $p):
                  // print_r($p);
                  ?>
                  <div class="col-md-4">
                     <strong><h3><?php echo $p['judul'];?></h3></strong>
                     <small>Kategori : <a href="<?php echo site_url('kategori/'.str_replace(' ','-',$p['kategori']))?>"><?php echo $p['kategori']?></a> <span class="glyphicon glyphicon-chevron-right"></span> <a href="<?php echo site_url('kategori/'.str_replace(' ','-',$p['kategori']))?>"><?php echo $p['subkategori']?></a></small><br/>
                     <small>Post : <?php echo $p['tglPost'];?></small><br/>
                     <small>Update : <?php echo $p['tglEdit'];?></small><br/>
                     <small>Habis : <?php echo $p['habisPromo'];?></small><br/>
                     <br/>
                     <span style="text-decoration:line-through" class="col-sm-6">Rp <?php echo number_format($p['harga']);?>,-</span>
                     <span class="col-sm-6"><strong>Rp <?php echo number_format($p['harga'] - ($p['harga']*$p['diskon']/100));?>,-</strong></span>
                     <br/><br/>
                     <a class="btn btn-danger btn-xs" href="#">set banned</a> <a class="btn btn-default btn-xs" href="<?php echo site_url('produk/v/'.$p['idItem'].'/'.str_replace(' ','/',$p['judul']));?>">preview</a>
                  </div>
               <?php endforeach;?>
            </div>
         </div>
         <hr/>
         <br/>
      </div>
      <!-- /#page-wrapper -->
   </div>
   <!-- /#wrapper -->
