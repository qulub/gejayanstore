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
         <li><a href="<?php echo site_url('admin/transaksi');?>">Transaksi</a></li>
         <li>Detail Transaksi</li>
      </ol>
      <div class="row">
         <div class="col-lg-6">
            <h3 style="margin:0"><?php echo $title;?></h3>
         </div><!-- /.col-lg-6 -->
         <div  class="col-lg-6">
         <a style="float:right" class="btn btn-default" href="#"><span class="glyphicon glyphicon-print"></span></a>
         </div><!-- /.col-lg-6 -->
      </div><!-- /.row -->
      <hr/>
      <div class="row">
         <div class="col-md-6">
         <?php //print_r($user); ?>
           <h4>Data Pemilik dan Toko</h4>
           <table class="table">
              <tr><th>Nama Pemilik</th><td><?php echo $user['namaPemilik'];?></td></tr>
              <tr><th>Email Pemilik</th><td><?php echo $user['email'];?></td></tr>
              <tr><th>No Telp Pemilik</th><td><?php echo $user['telp'];?></td></tr>
              <tr><th>Nama Toko</th><td><?php echo $user['namaToko'];?></td></tr>
              <tr><th>Alamat Toko</th><td><?php echo $user['alamatToko'];?></td></tr>
           </table>
        </div>
        <div ng-controller="ctrlTransaksi" class="col-md-6">
           <h4>Data Transaksi</h4>
           <table class="table">
              <tr><th>ID Transaksi</th><td><?php echo $transaksi['idTransaksi'];?></td></tr>
              <tr><th>Tgl Transaksi</th><td><?php echo $transaksi['tglTransaksi'];?></td></tr>
              <tr><th>Tambah Slot</th><td><?php echo $transaksi['tambahSlot'];?></td></tr>
              <tr><th>Tambah Masa Aktif</th><td><?php echo $transaksi['tambahMasa'];?> bulan</td></tr>
              <tr><th>Status {{loader}}</th><td><select ng-change="chgStatus()" ng-model="status" class="form-control">
              <option value="menunggu">menunggu</option>
              <option value="diproses">diproses</option>
              <option value="lunas">lunas</option>
              <option value="tidak ditemukan">tidak ditemukan</option>
              </select></td></tr>              
           </table>            
        </div>
        <div class="col-md-12">
        <hr/>
           <h4>Data Konfirmasi Pembayaran</h4>
            <?php if($konfirmasi->num_rows() <= 0){echo '<center class="alert alert-warning">Menunggu user melakukan konfirmasi pembayaran</center>';}else{?>
            <table class="table">
            <?php foreach($konfirmasi->result_array() as $k):?>
               <tr>
                  <td><a class="btn btn-danger btn-xs" href="<?php echo site_url('');?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                  <td><?php echo $k['tglKonfirmasi'] ?></td>
                    <td><?php echo $k['tujuanBank'] ?></td>
                    <td><?php echo $k['dariBank'] ?> norek <?php echo $k['noRekening'];?> a/n <?php echo $k['nama'];?></td>
                    <td>Rp<?php echo number_format($k['jumlahTransfer'])?></td>
                    <td><?php echo $k['status'] ?></td>
               </tr>
            <?php endforeach;?>
            </table>
            <?php } ?>
        </div>
     </div>
     
  </div>
  <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<script type="text/javascript">
   app.controller('ctrlTransaksi',['$scope','$http',function($scope,$http,transformRequestAsFormPost){
      $scope.status= '<?php echo $transaksi['status'];?>';
      $scope.chgStatus = function(){
         $scope.loader = 'loading...';
         url = '<?php echo site_url("ajax/ubahstatustransaksi");?>';
         var request = $http({
           method: "post",
           url: url,
           data: {
               idtransaksi:'<?php echo $transaksi["idTransaksi"];?>',
               statusbaru:$scope.status
           },
           headers: {'Content-Type': 'application/x-www-form-urlencoded'}
          });
          // Store the data-dump of the FORM scope.
          request.success(
              function(response) {
                  $scope.loader='';
                 alert('Status transaksi telah diubah ke '+$scope.status);
              }
          );     
      };
   }]);
</script>