<div class="wrap">
   <br/>
   <center><h1>Promo Terpopuler</h1></center>
   <!----start-img-cursual---->
      <?php
      $popular = $this->M_produk->popularProduk(10,0);
      if(empty($popular))echo '<br/><center><span class="error" >saat ini tidak ada promo di Gejayan Store</span></center><br/>'; ?>
   <div id="owl-demo" class="owl-carousel">
      <?php
      foreach($popular as $p):
         //get picture directory
         $dir = date('m_Y',strtotime($p['tglPost']));
         //get picture name
         $picture = $this->M_produk->getGambarProduk($p['idItem']);
         $picture = $picture['gambar'];
         //location
         $pp = base_url('resource/images/produk/'.$dir.'/'.$picture);
         ?>
         <div class="item">
            <div class="cau_left">
               <img class="lazyOwl" data-src="<?php echo $pp;?>" alt="<?php echo $p['judul']?>">
            </div>
            <div class="cau_left">
               <h4><a href="<?php echo site_url('produk/v/'.$p['idItem'].'/'.str_replace(' ','-',$p['judul']))?>"><?php echo $p['judul']?></a></h4>
               <a href="<?php echo site_url('produk/v/'.$p['idItem'].'/'.str_replace(' ','-',$p['judul']))?>" class="btn">selengkapnya</a>
            </div>
         </div>
      <?php endforeach;?>
   </div>
   <!----//End-img-cursual---->
</div>
