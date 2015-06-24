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
      <li class="active"><a href="<?php echo site_url('admin/tiket');?>">Tiket</a></li>
    </ol>
    <a class="btn btn-default" href="<?php echo site_url('admin/tiket');?>"><i class="glyphicon glyphicon-arrow-left"></i> kembali</a>
    <br/><br/>
    <div class="row">
      <div class="col-lg-6">
        <h3 style="margin:0"><?php echo $title;?></h3>
      </div><!-- /.col-lg-6 -->
      <div class="col-lg-6">
        <form action="<?php echo site_url('admin/caripromo')?>">
          <div class="input-group">
            <input name="q" type="text" class="form-control" value="">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Cari Promo</button>
            </span>
          </div><!-- /input-group -->
        </form>
      </div><!-- /.col-lg-6 -->
    </div><!-- /.row -->
    <hr/>
    <div class="row">
      <div class="col-md-12">
        <!--TAB  -->
        <ul class="nav nav-tabs" role="tablist">
          <li id="cs"><a href="<?php echo site_url('admin/tiket/'.$this->uri->segment(3).'?type=cs');?>">Customer Service</a></li>
          <li id="biling"><a href="<?php echo site_url('admin/tiket/'.$this->uri->segment(3).'?type=biling');?>">Biling</a></li>
          <li id="teknis"><a href="<?php echo site_url('admin/tiket/'.$this->uri->segment(3).'?type=teknis');?>">Teknis</a></li>
        </ul>
        <!--  END OF TAB-->
      </div>
    </div>
    <?php if(empty($view)){echo '<center class="alert alert-warning">Tiket Tidak Ditemukan</center>';?>
    <?php }else{?>
      <table class="table table-striped">
        <tr>
          <th>Judul Tiket</th>
          <th>Toko</th>
          <th>Tgl Post</th>
          <th>Tgl Update</th>
          <th>Status</th>
          <th></th>
        </tr>
        <?php foreach($view as $v):?>
          <tr>
            <td><a href="<?php echo site_url('admin/readtiket/'.$v['idtiket']);?>"><?php echo $v['judulTiket'];?></a></td>
            <td><?php echo $v['namaToko'];?></td>
            <td><?php echo $v['tglPostTiket'];?></td>
            <td><?php echo $v['tglUpdateTiket'];?></td>
            <td><?php echo $v['statusTiket'];?></td>
            <td><a class="btn btn-xs btn-danger" href="#">hapus</a></td>
          </tr>
        <?php endforeach;?>
      </table>
      <?php } ?>
      <hr/>
      <br/>
    </div>
    <!-- /#page-wrapper -->
  </div>
  <!-- /#wrapper -->
