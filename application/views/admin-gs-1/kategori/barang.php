<div id="wrapper">
   <?php $this->load->view('admin-gs-1/bases/navbar');?>
   <div id="page-wrapper">
      <br/>
      <ol class="breadcrumb">
         <li><a href="<?php echo site_url('admin/dashboard');?>">Dashboard</a></li>
         <li><a href="<?php echo site_url('admin/kategori');?>">Kategori</a></li>
         <li class="active>">Barang</li>
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
          <li><a style="cursor:pointer" ng-click="actAddSubCategory()">+ Tambah Subkategori</a></li>
       </ul>
       <!-- start add kategori -->
       <div ng-hide="boxAddCategory" class="blockgray">
         <form method="post" action="?act=addmainkat" class="form-inline" role="form">
          <div class="col-md-4" class="form-group">
           <label class="sr-only" for="exampleInputEmail2">add category</label>
           <input name="nama" style="width:100%" type="text" class="form-control" id="exampleInputEmail2" placeholder="nama kategori" required>
        </div>
         <div class="col-md-4" class="form-group">
           <label class="sr-only" for="exampleInputEmail2">add category</label>
           <input name="deskripsi" style="width:100%" type="text" class="form-control" id="exampleInputEmail2" placeholder="deskripsi kategori" required>
        </div>
        <button type="submit" class="btn btn-default">+ Tambah Kategori</button>
     </form>
  </div>
  <!-- end add kategori -->
  <!-- start add subkategori -->
  <div ng-hide="boxAddSubCategory" class="blockgray">
   <form action="?act=addsubkat" method="post" class="form-inline" role="form">
    <div class="col-md-4" class="form-group">
     <label class="sr-only" for="exampleInputEmail2">Email address</label>
     <select name="mainkat" style="width:100%" class="form-control" required>
        <option value="">Main Kategori</option>
        <?php foreach($mainkat->result_array() as $mk): ?>
        <option value="<?php echo $mk['idKategoriItem']?>"><?php echo $mk['namaKategori']?></option>
         <?php endforeach;?>
     </select>
  </div>
  <div class="col-md-4" class="form-group">
     <label class="sr-only" for="exampleInputEmail2">Email address</label>
     <input name="subkat" style="width:100%" type="text" class="form-control" id="exampleInputEmail2" placeholder="nama sub kategori" required>
  </div>
  <button type="submit" class="btn btn-default">+ Tambah Sub Kategori</button>
</form>
</div>
<!-- end add subkategori -->
<!-- kategori list -->
<div class="col-md-12">
   <div class="col-md-6">
      <h4>Kategori Utama (<?php echo $mainkat->num_rows();?>)</h4>
      <table class="table">
      <?php foreach($mainkat->result_array() as $mk):?>
          <tr>
             <td><a href="<?php echo site_url('admin/kategori/barang/'.$mk['idKategoriItem'])?>"><strong><?php echo $mk['namaKategori'];?></strong></a><br/><?php echo $mk['deskripsiKategori'];?></td>
             <td style="width:90px"><button ng-click="editMainKat('<?php echo $mk['idKategoriItem'];?>','<?php echo $mk['namaKategori'];?>','<?php echo $mk['deskripsiKategori'];?>')" class="btn btn-default btn-xs" type="button"><span class="glyphicon glyphicon-pencil"></span></button> <a href="?act=delmainkat&id=<?php echo $mk['idKategoriItem']?>" onclick="return confirm('Anda Yakin !')" class="btn btn-danger btn-xs" ><span class="glyphicon glyphicon-trash"></span></a></td>
          </tr>
       <?php endforeach;?>
    </table>
 </div>
 <div class="col-md-6">
   <h4>Sub Kategori (<?php echo count($subkat);?>)</h4>
   <table class="table">
     <?php foreach($subkat as $sk):?>
       <tr>
          <td><?php echo $sk['namaSubKategori'] ?>
          <td style="width:90px">
          <button ng-click="editSubKat('<?php echo $sk['idSubKategori'];?>','<?php echo $sk['namaSubKategori'];?>')" class="btn btn-default btn-xs" type="button"><span class="glyphicon glyphicon-pencil"></span></button> <a href="?act=delsubkat&id=<?php echo $sk['idSubKategori']?>" onclick="return confirm('Anda Yakin !')" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a></td>
       </tr>
    <?php endforeach;?>
 </table>
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
      $scope.actAddSubCategory = function()//toggle add sub category
      {
         $scope.boxAddSubCategory = $scope.boxAddSubCategory === false ? true: false;
         $scope.boxAddCategory = true;
      };
      //EDIT MAIN KAT
      $scope.editMainKat = function(id,nama,desc)
      {
        var newname = prompt('Nama Baru',nama);
        var newdesc = prompt('Deskripsi Baru',desc);
        if(newname != null && newname != '' )document.location = '<?php echo site_url("admin/kategori?act=editmainkatbarang&id='+id+'&nama='+newname+'&desc=")?>'+newdesc;
      };
      //EDIT SUB KAT
      $scope.editSubKat = function(id,nama)
      {
        var newname = prompt('Nama Baru',nama);
        if(newname != null && newname != '')document.location = '<?php echo site_url("admin/kategori?act=editsubkatbarang&id='+id+'&nama='+newname+'")?>'
      };
   }]);   
</script>
