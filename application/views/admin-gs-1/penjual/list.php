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
      <h1><?php echo $title;?></h1>
      <p>Data Ditemukan : <?php echo $count?> Penjual</p>
      <!-- <pre><?php print_r($view); ?></pre> -->
      <ul class="nav nav-tabs">
         <li id="semua"><a href="<?php echo site_url('admin/penjual/all');?>">Semua</a></li>
         <li id="active"><a href="<?php echo site_url('admin/penjual/active');?>">Menunggu Konfirmasi</a></li>
         <li id="active"><a href="<?php echo site_url('admin/penjual/active');?>">Active</a></li>
         <li id="banned"><a href="<?php echo site_url('admin/penjual/banned');?>">Banned</a></li>
      </ul>
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
               <td><?php echo $v['email'];?></td>
               <td><?php echo $v['alamat'];?></td>
               <td><?php if(!empty($v['namaToko'])){echo $v['namaToko'];}else{echo 'Belum Pasang';}?></td>
               <td><a data-toggle="tooltip" title="klik untuk ubah status" href="<?php echo site_url('admin/actionpenjual/ubahstatus/'.$v['idPemilik']);?>"><?php echo $v['status'];?></td>
               <td><a href="<?php echo site_url('admin/actionpenjual/manage/'.$v['idPemilik'])?>" class="btn btn-default btn-xs">manage</a></td>
            </tr>
         <?php endforeach ?>
      </table>
   </div>
   <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
