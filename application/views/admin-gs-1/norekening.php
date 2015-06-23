<div id="wrapper">
  <?php $this->load->view('admin-gs-1/bases/navbar');?>
  <div ng-controller="ctrlNorek"  id="page-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"><?php echo $title;?></h1>
      </div>
      <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
      <p>Menambah Data Rekening</p>
      <form class="form-inline" role="form" method="POST" action="<?php echo site_url('admin/norek?act=add')?>">
        <div class="form-group">
          <label class="sr-only" for="exampleInputEmail2">Nama Bank</label>
          <input name="bank[bank]" type="text" class="form-control" id="exampleInputEmail2" placeholder="Nama Bank">
        </div>
        <div class="form-group">
          <label class="sr-only" for="exampleInputPassword2">Nomor Rekening</label>
          <input name="bank[norek]" type="text" class="form-control" id="exampleInputPassword2" placeholder="Nomor Rekening">
        </div>
        <div class="form-group">
          <label class="sr-only" for="exampleInputPassword2">Password</label>
          <input name="bank[nama]" type="text" class="form-control" id="exampleInputPassword2" placeholder="Nama Pemilik Rekening">
        </div>
        <button type="submit" class="btn btn-primary">+ Tambah Nomor Rekening</button>
      </form>
      <hr/>
    </div>
    <!-- /.row -->
    <p>{{loader}}</p>
    <table class="table">
      <tr>
          <th>Bank</th><th>Nomor Rekening</th><th>Nama Pemilik</th><th></th>
      </tr>
      <tr ng-repeat="rekening in rekenings">
          <td>{{rekening.bank}}</td><td>{{rekening.norek}}</td><td>{{rekening.an}}</td><td><button ng-click="hapusRek(rekening.norek)" name="button" class="btn-xs btn btn-danger">hapus</button></td>
      </tr>
    </table>
  </div>
  <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<script>
app.controller('ctrlNorek',['$scope','$http',function($scope,$http){
  $scope.loader = 'loading...';
  //get json file
  var $getjson = $http.get('<?php echo site_url('ajax/rekeningbank?act=read');?>');
  $getjson.success(function(response){//success get data
    $scope.rekenings = response;
    $scope.loader = '';
  });
  $getjson.error(function(response){
    alert('terjadi masalah untuk ambil data bank');
  });
 $scope.hapusRek = function(norek){
    var agree = confirm('Anda Yakin!');
    if(agree == true)
    {
      // redirect
      var url = "<?php echo site_url('admin/norek?act=delete&norek=')?>"+norek;
      window.location = url;
    }
  };
}]);
</script>
