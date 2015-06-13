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
