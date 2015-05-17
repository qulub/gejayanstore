<?php $this->load->view('publik-templategejayan/bases/popular')?>
<!-- start main1 -->
<!-- produk terbaru -->
<div class="main_bg1">
    <div class="wrap">
        <div class="main1">
            <h2>Semua Toko</h2>
        </div>
    </div>
</div>
<div class="main_bg">
    <div class="wrap">
        <div class="main">
            <!-- start grids_of_3 -->
            <div class="grids_of_3">
               <?php foreach($view as $lt):?>
               <div class="toko-item grid1_of_4">
                   <a href="<?php echo site_url('toko/v/'.$lt['idToko'].'/'.str_replace(' ','-',strtolower($lt['namaToko'])));?>">
                       <img src="<?php echo base_url('resource/images/toko/'.$lt['avatar']);?>" alt="" />
                       <center><h3><?php echo $lt['namaToko']?></h3></center>
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
