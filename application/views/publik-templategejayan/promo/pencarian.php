<?php $this->load->view('publik-templategejayan/bases/popular')?>
<!-- start main1 -->
<!-- produk terbaru -->
<div class="main_bg1">
    <div class="wrap">
        <div class="main1">
            <h2><?php echo $title;?></h2>
        </div>
    </div>
</div>
<!-- start main -->
<div class="main_bg">
    <div class="wrap">
        <div class="main">
            <!-- start grids_of_3 -->
            <div class="grids_of_3">
                <?php if(empty($listproduk))echo '<center class="error">Promo Tidak Ditemukan</center>';?>
                <?php foreach($listproduk as $lp):?>
                    <div class="list-item grid1_of_3">
                        <a href="<?php echo site_url('produk/v/'.$lp['idItem'].'/'.str_replace(' ','-',strtolower($lp['judul'])))?>">
                            <?php
                            $gambar = $this->M_produk->getGambarProduk($lp['idItem']);
                            $gambar = $gambar['gambar'];
                            ?>
                            <div class="item-image" style="background-image:url('<?php echo base_url('resource/images/produk/'.date('m_Y',strtotime($lp['tglPost'])).'/'.$gambar)?>');"></div>
                            <h3><?php echo $lp['judul']?></h3>
                            <a href="<?php echo site_url('toko/v/'.$lp['idToko'].'/'.str_replace(' ', '-',strtolower($lp['toko'])))?>"><h2><?php echo $lp['toko']?> - update : <?php echo date('d/m/Y',strtotime($lp['tglEdit']));?></h2></a>
                            <div class="price">
                                <h4>
                                    <striped class="discon">Diskon <?php echo $lp['diskon']?>%</striped> <br/>
                                    <?php if($lp['diskon'] > 0):?>
                                        <striped class="strip">Rp<?php echo number_format($lp['harga']);?>,-</striped>
                                    <?php endif;?>
                                    Rp<?php echo number_format($lp['harga']-($lp['harga']*($lp['diskon']/100)));?>,-<br/><br/>
                                    <span style="margin-left:0">SELENGKAPNYA</span>
                                </h4>
                            </div>
                            <span class="b_btm"></span>
                        </a>
                    </div>
                <?php endforeach;?>
                <div class="clear"></div>
            </div>
            <!-- end grids_of_3 -->
        </div>
    </div>
    <!-- <div class="wrap">
        <a href="#"><div class="price"><h4><span>Tampilkan Semua Promo</span></h4></div></a>
    </div> -->
</div>
<!-- end of produk terbaru -->
