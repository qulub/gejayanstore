<!-- start footer -->
<div class="footer_bg">
    <div class="wrap">
        <div class="footer">
            <!-- start grids_of_4 -->
            <div style="height:20px" class="grids_of_12">
               <div class="grid1_of_4">
                  <h4>Kategori Produk</h4>
               </div>
            </div>
            <div class="grids_of_4">
                <div class="grid1_of_4">
                    <ul class="f_nav">
                        <?php $kat1 = $this->M_produk->showProduk(7,0);?>
                        <?php foreach($kat1 as $k1):?>
                        <li><a href="<?php echo site_url('produk/kategori/'.str_replace(' ','-',$k1['namaKategori']))?>"><?php echo $k1['namaKategori']?></a></li>
                     <?php endforeach;?>
                    </ul>
                </div>
                <div class="grid1_of_4">
                   <ul class="f_nav">
                       <?php $kat2 = $this->M_produk->showProduk(7,8);?>
                       <?php foreach($kat2 as $k2):?>
                       <li><a href="<?php echo site_url('produk/kategori/'.str_replace(' ','-',$k2['namaKategori']))?>"><?php echo $k2['namaKategori']?></a></li>
                    <?php endforeach;?>
                   </ul>
                </div>
                <div class="grid1_of_4">
                   <ul class="f_nav">
                       <?php $kat3 = $this->M_produk->showProduk(7,15);?>
                       <?php foreach($kat3 as $k3):?>
                       <li><a href="<?php echo site_url('produk/kategori/'.str_replace(' ','-',$k3['namaKategori']))?>"><?php echo $k3['namaKategori']?></a></li>
                    <?php endforeach;?>
                   </ul>
                </div>
                <div class="grid1_of_4">
                    <ul class="f_nav">
                        <li><a href="<?php echo site_url('register/toko')?>">Daftarkan Toko</a></li>
                        <li><a href="<?php echo site_url('produk/semua')?>">Promo</a></li>
                        <li><a href="<?php echo site_url('toko/semua')?>">Toko</a></li>
                        <li><a href="<?php echo site_url('kategori')?>">Kategori Promo</a></li>
                        <li><a href="<?php echo site_url('berita')?>">Berita</a></li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
<!-- start footer -->
<div class="footer_bg1">
    <div class="wrap">
        <div class="footer">
            <!-- scroll_top_btn -->
            <script type="text/javascript">
                $(document).ready(function() {

                    var defaults = {
                    containerID: 'toTop', // fading element id
                    containerHoverID: 'toTopHover', // fading element hover id
                    scrollSpeed: 1200,
                    easingType: 'linear'
                };


                $().UItoTop({ easingType: 'easeOutQuart' });

            });
            </script>
            <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
            <!--end scroll_top_btn -->
            <div class="copy">
                <p class="link">&copy;  All rights reserved | Template by&nbsp;&nbsp;<a href="http://w3layouts.com/"> W3Layouts</a></p>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
</body>
</html>
