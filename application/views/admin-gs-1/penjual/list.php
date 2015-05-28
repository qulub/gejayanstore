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
         <li class="<?php echo site_url('admin/Penjual');?>">Penjual</li>
      </ol>
      <div class="row">
         <div class="col-lg-6">
            <h3 style="margin:0"><?php echo $title;?></h3>
         </div><!-- /.col-lg-6 -->
         <div class="col-lg-6">
            <form action="<?php echo site_url('admin/caripenjual')?>">
               <div class="input-group">
                  <input name="q" type="text" class="form-control" value="">
                  <span class="input-group-btn">
                     <button class="btn btn-default" type="button">Cari Penjual</button>
                  </span>
               </div><!-- /input-group -->
            </form>
         </div><!-- /.col-lg-6 -->
      </div><!-- /.row -->
      <p>Data Ditemukan : <?php echo $count?> Penjual</p>
      <!-- <pre><?php print_r($view); ?></pre> -->
      <table class="table">
         <tr>
            <th></th>
            <th>Username</th>
            <th>Nama</th>
            <th>Telp</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Toko</th>
            <th>Status</th>
            <th></th>
         </tr>
         <?php foreach ($view as $v): ?>
            <tr>
               <td></td>
               <td><?php echo $v['userName'];?></td>
               <td><?php echo $v['namaPemilik'];?></td>
               <td><?php echo $v['telp'];?></td>
               <td><?php echo $v['emailToko'];?></td>
               <td><?php echo $v['alamat'];?></td>
               <td><?php if(!empty($v['namaToko'])){echo $v['namaToko'];}else{echo 'Belum Pasang';}?></td>
               <td><a data-toggle="tooltip" title="klik untuk ubah status" href="<?php echo site_url('admin/actionpenjual/ubahstatus/'.$v['idPemilik']);?>"><?php echo $v['status'];?></td>
               <?php if($v['status']=='menunggu'){?>
               <td><a href="<?php echo site_url('admin/actionpenjual/managemenunggu/'.$v['idPemilik'])?>" class="btn btn-default btn-xs">manage + konfirm pembayaran</a></td>
               <?php } else {?>
               <td><a href="<?php echo site_url('admin/actionpenjual/manage/'.$v['idPemilik'])?>" class="btn btn-default btn-xs">manage</a></td>
               <?php } ?>
            </tr>
         <?php endforeach ?>
      </table>
   </div>
   <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
