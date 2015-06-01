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
            <th>Tgl Konfirmasi</th>
            <th>Tujuan Bank</th>
            <th>Asal Bank</th>
            <th>Nominal (Rp)</th>
            <th>Status</th>
            <th></th>
         </tr>
         <?php if(empty($view)){echo '<tr><td colspan="7">Konfirmasi tidak ditemukan</center></td></tr>';}else{?>
         <?php foreach($view as $v):?>
            <tr>
           <td><a href="#"><?php echo $v['idTransaksi'] ?></a></td>
           <td><?php echo $v['tglKonfirmasi'] ?></td>
           <td><?php echo $v['tujuanBank'] ?></td>
           <td><?php echo $v['asalbank'] ?> norek <?php echo $v['noRekening'];?> a/n <?php echo $v['nama'];?></td>
           <td><?php echo $v['jumlahTransfer'] ?></td>
           <td><?php echo $v['status'] ?></td>
           <td><a class="btn btn-primary btn-xs" data-toggle="tooltip" title="klik tombol ini secara otomatis mengaktifkan tambahan promo dan masa yang diorder pemilik toko" href="#">konfirmasi pembayaran</a></td>
         </tr>
         <?php endforeach;}?>
      </table>
   </div>
   <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
