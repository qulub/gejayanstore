<script charset="utf-8">
$(document).ready(function(){
  <?php if(!empty($script))echo $script;?>
});
</script>
<div ng-controller="ctrlTiket" id="wrapper">
  <?php $this->load->view('admin-gs-1/bases/navbar');?>
  <div id="page-wrapper">
    <br/>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('admin/dashboard');?>">Dashboard</a></li>
      <li class="active"><a href="<?php echo site_url('admin/tiket');?>">Tiket</a></li>
    </ol>
    <a class="btn btn-default" href="<?php echo site_url('admin/tiket');?>"><i class="glyphicon glyphicon-arrow-left"></i> kembali</a>
    <br/><br/>
    <div class="row">
      <div class="col-lg-6">
        <h3 style="margin:0"><?php echo $title;?></h3>
      </div><!-- /.col-lg-6 -->
      <div class="col-lg-6">
        <span style="float:right">...</span>
      </div><!-- /.col-lg-6 -->
    </div><!-- /.row -->
    <div class="row">
      <div class="col-md-12">
        <br/>
        <?php
        $pemilik = $this->M_penjual->detSimplePenjual($ticket['idPemilik']);
        ?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <strong>Dari</strong> <?php echo $pemilik['namaPemilik'];?>, <strong>Pada</strong> <?php echo $ticket['tglPostTiket'];?>, <strong>Untuk</strong> <?php echo $ticket['tipeTiket'];?>
          </div>
          <div class="panel-body"><?php echo $ticket['judulTiket'];?></div>
        </div>
        <h3>Jawaban (<?php echo $comments->num_rows();?>)</h3>
        <?php //print_r($comments->result_array());?>
        <hr/>
        <p>Tambah Jawaban</p>
        <form class="" action="<?php echo site_url('admin/actiontiket?act=add')?>" method="post">
          <input type="hidden" name="id" value="<?php echo $ticket['idtiket']?>">
          <textarea name="balasan" class="form-control" rows="3" required></textarea>
          <br/>
          <button class="btn btn-primary" name="button">Tambah Jawaban</button>
        </form>
        <br/>
        <?php foreach($comments->result_array() as $c):?>
          <div data-dismiss="alert" <?php if(!empty($c['idAdmin']))echo 'style="background-color:#F4F4F4"';?> class="panel panel-default">
            <button ng-click="delete(<?php echo $c['idbalasanTiket']?>)" type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <div class="panel-body">
              <?php
              if(!empty($c['idAdmin'])){
                echo '<strong>Oleh Admin</strong> pada '.$c['tglBalasanTiketPost'].'<br/>';
              }else{
                echo '<strong>Oleh Pemilik Toko</strong> pada '.$c['tglBalasanTiketPost'].'<br/>';
              }
              echo $c['isiBalasanTiket'];
              ?>
            </div>
          </div>
        <?php endforeach;?>
      </div>
    </div>
    <br/>
  </div>
  <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<script charset="utf-8">
  app.controller('ctrlTiket',['$scope','$http','$route',function($scope,$http,$route){
    $scope.delete = function(id)
    {
      var agree = confirm('Anda Yakin!');
      if(agree == true)
      {
        $http.get('<?php echo site_url('admin/actiontiket?act=delete&id=');?>'+id)
        .success(function(response){
          alert('Sukses Hapus');
          //refresh page
          window.location ='<?php echo site_url($this->uri->uri_string());?>';
        })
        .error(function(response){
          alert('Gagal Hapus');
        });
      }
    }
  }]);
</script>
