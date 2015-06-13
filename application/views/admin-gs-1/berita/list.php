<script charset="utf-8">
$(document).ready(function(){
  <?php if(!empty($script))echo $script;?>
});
</script>
<div ng-controller="ctrlBerita" id="wrapper">
  <?php $this->load->view('admin-gs-1/bases/navbar');?>
  <div id="page-wrapper">
    <br/>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('admin/dashboard');?>">Dashboard</a></li>
      <li class="active"><a href="<?php echo site_url('admin/berita');?>">Berita</a></li>
    </ol>
    <div class="row">
      <div class="col-lg-6">
        <h3 style="margin:0"><?php echo $title;?></h3>
        <p>Total : <?php echo $count;?></p>
      </div><!-- /.col-lg-6 -->
      <div class="col-lg-6">
        <span style="float:right">...</span>
      </div><!-- /.col-lg-6 -->
    </div><!-- /.row -->
    <div class="row">
      <div class="col-md-12">
        <br/>
        <!-- BERITA LIST -->
        <table class="table table-striped">
        <tr>
          <th>Id Berita</th>
          <th>Judul</th>
          <th>Tgl Post</th>
          <th>Tgl Update</th>
          <th>Author</th>
          <th></th>
        </tr>  
        <?php foreach($beritas as $berita):?>
          <tr>
            <td><?php echo $berita['idBerita'];?></td>
            <td><?php echo $berita['judulBerita'];?></td>
            <td><?php echo $berita['tglPostBerita'];?></td>
            <td><?php echo $berita['tglUpdateBerita'];?></td>
            <td><?php echo $berita['userName'];?></td>
            <td>
            <a class="btn btn-default btn-xs" href="">edit</a>
            <a class="btn btn-error btn-xs" href="">edit</a>
            </td>
          </tr>
        <?php endforeach;?>
        </table>
        <!-- END BERITA LIST -->
        <?php echo $link;//PAGINATION LINK ?>
      </div>
    </div>
    <br/>
  </div>
  <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<script charset="utf-8">
  app.controller('ctrlBerita',['$scope','$http','$route',function($scope,$http,$route){
    $scope.delete = function(id)
    {
      
    }
  }]);
</script>
