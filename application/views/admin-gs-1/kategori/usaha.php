<div id="wrapper">
 <?php $this->load->view('admin-gs-1/bases/navbar');?>
 <div id="page-wrapper">
  <br/>
  <ol class="breadcrumb">
   <li><a href="<?php echo site_url('admin/dashboard');?>">Dashboard</a></li>
   <li><a href="<?php echo site_url('admin/kategori');?>">Kategori</a></li>
   <li class="active>">Usaha</li>
 </ol>
 <div class="row">
   <div class="col-lg-6">
    <h3 style="margin:0"><?php echo $title;?></h3><br/>
  </div><!-- /.col-lg-6 -->
  <div class="col-lg-6">

  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->
<!-- <pre><?php print_r($view); ?></pre> -->
<br/>
<div ng-controller="addCategory">
 <ul class="nav nav-pills">
  <li><a style="cursor:pointer" ng-click="actAddCategory()">+ Tambah Kategori</a></li>
</ul>
<!-- start add kategori -->
<div ng-hide="boxAddCategory" class="blockgray">
 <form method="post" action="?act=addkatusaha" class="form-inline" role="form">
  <div class="col-md-4" class="form-group">
   <label class="sr-only" for="exampleInputEmail2">add category</label>
   <input name="nama" style="width:100%" type="text" class="form-control" id="exampleInputEmail2" placeholder="nama kategori" required>
 </div>
 <button type="submit" class="btn btn-default">+ Tambah Kategori</button>
</form>
</div>
<!-- end add kategori -->
<!-- kategori list -->
<div class="col-md-12">
 <div class="col-md-6">
  <h4>Kategori Usaha (<?php echo $mainkat->num_rows();?>)</h4>
  <table class="table">
    <?php foreach($mainkat->result_array() as $mk):?>
      <tr>
       <td><?php echo $mk['namaKategoriUsaha'];?></td>
       <td style="width:90px">
       <button ng-click="editbtn('<?php echo $mk['idkategoriUsaha']?>','<?php echo $mk['namaKategoriUsaha']?>')" class="btn btn-default btn-xs" type="submit"><span class="glyphicon glyphicon-pencil"></span></button> 
       <a href="?act=delkatusaha&id=<?php echo $mk['idkategoriUsaha']?>" onclick="return confirm('Anda Yakin !')" class="btn btn-danger btn-xs" ><span class="glyphicon glyphicon-trash"></span></a></td>
     </tr>
   <?php endforeach;?>
 </table>
</div>
<div class="col-md-6">

</div>
</div>
<!-- end of kategori list -->
</div>
</div>
<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<script type="text/javascript">
   // angular declaration
   app.controller('navbar',['$scope','$http',function($scope,$http){//navbar controller
      <?php if(!empty($script))echo $script;?>//auto load script
    }]);
   app.controller('addCategory',['$scope',function($scope){
    $scope.boxAddCategory = true;
    $scope.boxAddSubCategory = true;
    $scope.actAddCategory = function()//toggle add category
    {
     $scope.boxAddCategory = $scope.boxAddCategory === false ? true: false;
     $scope.boxAddSubCategory = true;
   };
    //EDIT CATEGORY
   $scope.editbtn = function(id,nama)
   {
    var newname = prompt('Nama Kategori Baru',nama);
    if(newname != null && newname != '' )document.location = '<?php echo site_url("admin/kategori?act=editkatusaha&id='+id+'&nama='+newname+'")?>'
   };
   }]);   
 </script>
