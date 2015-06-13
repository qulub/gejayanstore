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
      <div class="col-md-8">
        <br/>
        <?php
        if(!empty($berita))
        {
          $judul = $berita['judulBerita'];
          $isi= $berita['berita'];
          $action = site_url('admin/berita/edit?act=edit&id='.$berita['idBerita']);
          $text = 'Update';
        }else
        {
          $judul = '';
          $isi = '';
          $action = site_url('admin/berita/edit?act=add');
          $text = 'Post';
        }
        ?>
        <form name="formBerita" action="<?php echo $action;?>" method="POST" ng-submit="submitBerita()">
          <div class="form-group">
            <label for="exampleInputEmail1">Judul</label>
            <input name="judul" type="text" value="<?php echo $judul;?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Berita</label>
            <textarea name="berita" class="form-control"><?php echo $isi;?></textarea>
          </div>
          <button type="submit" class="btn btn-primary"><?php echo $text;?></button>
        </form>
      </div>
    </div>
    <br/>
  </div>
  <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<script type="text/javascript" src="<?php echo base_url('outsource/ckeditor/ckeditor.js')?>"></script>
<script type="text/javascript">
 var editor = CKEDITOR.replace( 'berita' );
</script>
<script charset="utf-8">
  app.controller('ctrlBerita',['$scope','$http',function($scope,$http){
    
  }]);
</script>