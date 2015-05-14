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
         <li class="active"><a href="<?php echo site_url('admin/promo');?>">Promo</a></li>
      </ol>
      <a class="btn btn-default" href="<?php echo site_url('admin/promo');?>"><i class="glyphicon glyphicon-arrow-left"></i> kembali</a>
      <br/><br/>
      <div class="row">
         <div class="col-lg-6">
            <h3 style="margin:0"><?php echo $title;?></h3>
         </div><!-- /.col-lg-6 -->
         <div class="col-lg-6">
            <form action="<?php echo site_url('admin/caripromo')?>">
               <div class="input-group">
                  <input name="q" type="text" class="form-control" value="">
                  <span class="input-group-btn">
                     <button class="btn btn-default" type="button">Cari Promo</button>
                  </span>
               </div><!-- /input-group -->
            </form>
         </div><!-- /.col-lg-6 -->
      </div><!-- /.row -->
      <hr/>
      <?php if(empty($view))echo '<center>promo tidak ditemukan</center>';?>
      <div class="row">
         <div class="col-md-12">
            <?php foreach($view as $p):
               // print_r($p);
               ?>
               <div class="col-md-4">
                  <strong><h3><?php echo $p['Judul'];?></h3></strong>
                  <small>Kategori : <a href="<?php echo site_url('kategori/'.str_replace(' ','-',$p['namaKategori']))?>"><?php echo $p['namaKategori']?></a> <span class="glyphicon glyphicon-chevron-right"></span> <a href="<?php echo site_url('kategori/'.str_replace(' ','-',$p['namaKategori']))?>"><?php echo $p['namaSubKategori']?></a></small><br/>
                  <small>Toko : <a href="<?php echo site_url('v/'.$p['idToko'].'/'.str_replace(' ','-',$p['namaToko']))?>"><?php echo $p['namaToko'];?></a></small><br/>
                  <small>Post : <?php echo $p['tglPost'];?></small><br/>
                  <small>Update : <?php echo $p['tglEdit'];?></small><br/>
                  <small>Habis : <?php echo $p['habisPromo'];?></small><br/>
                  <br/>
                  <span style="text-decoration:line-through" class="col-sm-6">Rp <?php echo number_format($p['harga']);?>,-</span>
                  <span class="col-sm-6"><strong>Rp <?php echo number_format($p['harga'] - ($p['harga']*$p['diskon']/100));?>,-</strong></span>
                  <br/><br/>
                  <a class="btn btn-danger btn-xs" href="#">set banned</a> <a class="btn btn-default btn-xs" href="<?php echo site_url('produk/v/'.$p['idItem'].'/'.str_replace(' ','/',$p['Judul']));?>">preview</a>
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
