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
      <a class="btn btn-default" href="<?php echo site_url('admin/penjual/menunggu');?>"><i class="glyphicon glyphicon-arrow-left"></i> kembali</a>
      <br/><br/>
      <?php if($penjual['status']=='menunggu'){//jika status pemilik toko adalah menunggu untuk konfirmasi?>
         <!-- <div class="extra-box" class="col-md-12">
            <h4><span class="glyphicon glyphicon-shopping-cart"></span> Konfirmasi Pembayaran</h4>
            <?php if(empty($konfirmasi)){echo '<p><i>pelanggan belum melakukan konfirmasi</i></p>';}else?>
         </div> -->
         <?php } ?>
         <br/>
         <div class="row">
            <div class="col-md-6">
               <h4><span class="glyphicon glyphicon-briefcase"></span> Biodata pemilik</h4><br/>
               <table class="table">
                  <tr><th>KTP/Tanda Pengenal Lain</th><td><a target="_blank" href="<?php echo base_url('resource/images/idcard/'.$penjual['idcard']);?>">Cek Data</a></td></tr>
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
               <table class="table">
                  <tr><th>Nama Toko</th><td><?php echo $toko['namaToko'];?></td></tr>
                  <tr><th>Alamat Toko</th><td><?php echo $toko['alamatToko'];?></td></tr>
                  <tr><th>Kategori Usaha</th><td><?php echo $toko['namaKategoriUsaha'];?></td></tr>   
                  <tr><th>Buka</th><td><?php echo $toko['jamBuka'];?>-<?php echo $toko['jamTutup'];?>, <?php echo $toko['libur'];?> libur</td></tr>
                  <tr><th>No Telepon</th><td><?php echo $toko['telp'];?></td></tr>
                  <tr><th>Email</th><td><?php echo $toko['emailToko'];?></td></tr>   
               </table>
               <h4><span class="glyphicon glyphicon-briefcase"></span> Surat Penting</h4><br/>
               <table class="table">
                  <tr><th>TDP</th><td><?php if(!empty($toko['tdp'])){echo '<a target="_blank" href="'.base_url('resource/images/tdp/'.$toko['tdp']).'">Cek Surat</a>';}else{echo 'Surat Tidak Terupload';};?></td></tr>
                  <tr><th>SIUP</th><td><?php if(!empty($toko['siup'])){echo '<a target="_blank" href="'.base_url('resource/images/siup/'.$toko['siup']).'">Cek Surat</a>';}else{echo 'Surat Tidak Terupload';};?></td></tr>
                  <tr><th>SIG</th><td><?php if(!empty($toko['sig'])){echo '<a target="_blank" href="'.base_url('resource/images/sig/'.$toko['sig']).'">Cek Surat</a>';}else{echo 'Surat Tidak Terupload';};?></td></tr>
               </table>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12" ng-controller="pendaftaranAction">
               <button class="btn btn-primary btn-lg" ng-click="doKonfirmasi()"><span class="glyphicon glyphicon-ok"></span> Konfirmasi</button>
               <button class="btn btn-danger btn-lg" ng-click="doTolak()"><span class="glyphicon glyphicon-remove"></span> Tolak</button>
               <!-- modal -->
               <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                  <div class="modal-content">
                   <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">{{title}}</h4>
                 </div>
                 <div class="modal-body">
                  <form action="{{action}}" method="POST">
                    <p>{{note}}</p>
                    <textarea name="alasan" style="margin-top:10px" ng-hide="txtReason" ng-model="pesan" class="form-control" rows="3" placeholder="alasan ditolak"></textarea>
                    <br/><br/>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <a href="<?php echo site_url('register/actionprocess');?>?act={{action}}&idpemilik={{idpemilik}}&pesan={{pesan}}" class="btn btn-primary">Lanjutkan</a>
                 </form>
              </div>
           </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
     </div><!-- /.modal -->           
  </div>
</div>
<br/>
<br/>
</div>
<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->


<script type="text/javascript">
   app.controller('pendaftaranAction',['$scope',function($scope)
   {
      $scope.idpemilik = '<?php echo $penjual["idPemilik"];?>';
      //konfirmasi pendaftaran
      $scope.doKonfirmasi = function()
      {
         $scope.action = 'konfirmasi';
         $scope.txtReason = true;
         $scope.title = "Konfirmasi Pendaftaran";
         $scope.note = "Dengan klik lanjutkan maka secara otomatis sistem mengirimkan data username dan password kepada pemilik toko, status pemilik toko menjadi 'active'";
         $('#modal').modal('show');
      };
      //tolak pendaftaran
      $scope.doTolak = function()
      {
         $scope.action = 'tolak';
         $scope.txtReason = false;
         $scope.title = "Tolak Pendaftaran";
         $scope.note = "Dengan klik lanjutkan maka secara otomatis sistem mengirimkan pesan penolakan ke email pemilik toko, secara otomatis data pemilik toko 'dihapus'";
         $('#modal').modal('show');
      };
   }]);
</script>