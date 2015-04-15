<!-- start main1 -->
<!-- produk terbaru -->
<div class="main_bg1">
    <div class="wrap">  
        <div class="main1">
            <h2>update produk</h2>
        </div>
    </div>
</div>
<!-- start main -->
<div class="main_bg">
    <div class="wrap">  
        <div class="main">
            <!-- start grids_of_3 -->
            <div class="grids_of_3">
                <?php foreach($listproduk as $lp):?>
                    <div class="list-item grid1_of_3">
                        <a href="<?php echo site_url('produk/v/'.$lp['idItem'].'/'.str_replace(' ','-',strtolower($lp['judul'])))?>">
                            <?php
                            $gambar = $this->M_produk->getGambarProduk($lp['idItem']);
                            $gambar = $gambar['gambar'];
                            ?>
                            <div style="width:100%;height:270px;background-image:url('<?php echo base_url('resource/images/produk/'.date('m-Y',strtotime($lp['tglPost'])).'/'.$gambar)?>');background-size:cover"></div>
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
    <div class="wrap">
        <a href="#"><div class="price"><h4><span>Tampilkan Semua Produk</span></h4></div></a>
    </div>
</div>  
<!-- end of produk terbaru -->
<!-- update toko -->
<div class="main_bg1">
    <div class="wrap">  
        <div class="main1">
            <h2>update toko</h2>
        </div>
    </div>
</div>
<!-- start main -->
<div class="main_bg">
    <div class="wrap">  
        <div class="main">
            <!-- start grids_of_3 -->
            <div class="grids_of_3">
                <?php foreach($listtoko as $lt):?>
                <div class="toko-item grid1_of_3">
                    <a href="<?php echo site_url('toko/v/'.$lt['idToko'].'/'.str_replace(' ','-',strtolower($lt['namaToko'])));?>">
                        <h3><?php echo $lt['namaToko']?></h3>
                        <h2><?php echo $lt['alamatToko']?> - update : <?php echo date('d/m/Y',strtotime($lt['alamatToko']))?>
                        <br/>Buka <?php echo $lt['jamBuka'];?> - <?php echo $lt['jamTutup'];?> | Libur </h2>
                        <br/>
                        <div class="price">
                            <h4>
                                <span style="margin-left:0">lihat toko</span>
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
    <div class="wrap">
        <a href="#"><div class="price"><h4><span>Tampilkan Semua Toko</span></h4></div></a>
    </div>
</div>
<!-- end of update toko -->