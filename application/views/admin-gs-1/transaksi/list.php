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
         <li class="<?php echo site_url('admin/konfirmasi');?>">Konfirmasi</li>
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
      <p>Data Ditemukan : <?php if(empty($count)){$count=0;}echo $count; ?> Konfirmasi</p>
      <table class="table">
         <tr>
            <th>Id Transaksi</th>
            <th>Id Pemilik</th>
            <th>Tgl Transaksi</th>
            <th>Tambah Slot</th>
            <th>Tambah Masa</th>
            <th>Biaya (Rp)</th>
            <th>Status</th>
         </tr>
         <?php if(empty($view)){echo '<tr><td colspan="7">Transaksi tidak ditemukan</center></td></tr>';}else{?>
         <?php foreach($view as $v):?>
          <tr>
            <td><a href="<?php echo site_url('admin/transaksi/detail/'.$v['idPemilik'])?>"><?php echo $v['idTransaksi'];?></a></td>
            <td><a target="blank" href="<?php echo site_url('admin/actionpenjual/manage/'.$v['idPemilik'])?>"><?php echo $v['idPemilik'];?></a></td>
            <td><?php echo $v['tglTransaksi'];?></td>
            <td><?php echo $v['tambahSlot'];?></td>
            <td><?php echo $v['tambahMasa'];?></td>
            <td><?php echo number_format($v['biaya']);?></td>
            <td><?php echo $v['status'];?></td>
          </tr>
         <?php endforeach;}?>
      </table>
   </div>
   <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
