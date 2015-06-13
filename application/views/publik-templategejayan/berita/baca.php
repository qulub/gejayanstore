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
                <h1><?php echo $berita['judulBerita'];?></h1>
                <br/>
                <?php echo $berita['berita'];?>
                <div class="clear"></div>
                <br/>
                <a href="<?php echo site_url('berita')?>">kembali ke daftar</a>
            </div>
            <!-- end grids_of_3 -->
        </div>
    </div>
    <div class="wrap">
    </div>
</div>
