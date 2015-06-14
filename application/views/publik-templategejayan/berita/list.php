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
<div class="main_bg">
    <div class="wrap">
        <div class="main">
            <!-- start grids_of_3 -->
            <div class="grids_of_3">
                <?php if(empty($berita))echo '<center class="error">Berita Kosong</center>';?>
                <?php foreach($berita as $b):?>
                    <div class="list-item grid1_of_3">
                        <a href="<?php echo site_url('berita/baca/'.$b['idBerita'].'/'.str_replace(' ','-',strtolower($b['judulBerita'])))?>">
                            <h3><?php echo $b['judulBerita']?></h3>
                            <h2>update : <?php echo date('d/m/Y',strtotime($b['tglUpdateBerita']));?></h2></a>
                            <div class="price">
                                <h4>
                                    <a href="<?php echo site_url('berita/baca/'.$b['idBerita'].'/'.str_replace(' ','-',strtolower($b['judulBerita'])))?>"><span style="margin-left:0">SELENGKAPNYA</span></a>
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
        <center><?php echo $link;?></center>
        <br/>
    </div>
</div>
