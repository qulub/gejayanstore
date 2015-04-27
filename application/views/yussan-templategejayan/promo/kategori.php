<script charset="utf-8">
   $(document).ready(function(){
      <?php if(!empty($script))echo $script;?>
   });
</script>
<div class="main_bg">
   <div class="wrap">
      <div class="main">
         <div class="toko-item list-mainkat">
            <div style="height:100%;overflow-y:scroll" class="grid1_of_6">
               <h2>Kategori Utama</h2>
               <br/>
               <ul>
                  <?php foreach($mainkat as $mk):?>
                  <li class="" id="<?php echo 'main'.$mk['idKategoriItem']?>"><a href="<?php echo site_url('kategori/sub/'.str_replace(' ','-',$mk['namaKategori']))?>"><?php echo $mk['namaKategori'];?></a></li>
               <?php endforeach;?>
               </ul>
            </div>
            <div style="height:100%;overflow-y:scroll" class="toko-item grid1_of_6">
               <h2>Sub Kategori</h2>
               <br/>
               <ul>
                  <?php foreach($subkat as $sk):?>
                  <li><a href="<?php echo site_url('kategori/'.str_replace(' ','-',$sk['namaSubKategori']))?>"><?php echo $sk['namaSubKategori'];?></a></li>
               <?php endforeach;?>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>
