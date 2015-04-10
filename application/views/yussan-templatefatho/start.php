    <div class="pre-loader">
        <div class="load-con">
            <img src="<?php echo base_url('resource')?>/assets/img/freeze/logo.png" class="animated fadeInDown" alt="">
            <div class="spinner">
              <div class="bounce1"></div>
              <div class="bounce2"></div>
              <div class="bounce3"></div>
          </div>
      </div>
  </div>

  <div class="wrapper">    
      <section id="about"> 
          <ol class="breadcrumb">
             <li><strong>Klasifikasi</strong></li>
             <?php 
             $session = $this->session->userdata('morfologi');
           $CountSession = count($session);//jumlah session yang menjadi step sekarang
           foreach($session as $s):
            if($s['kode']==0){
                $morfologi = $s['name'];
                $type = $morfologi;
            }else{
                $morfologi = $s['name'];
            }
            ?>            
            <li><a href="#"><?php echo $morfologi;?></a></li>
        <?php endforeach; ?>
    </ol> 
    <div class="container">                
        <div class="section-heading scrollpoint sp-effect3">
            <h1>Klasifikasi Animalia</h1>
            <div class="divider"></div>
            <p>Silahkan pilih salah satu</p>
            <p><a href="<?php echo site_url();?>">Kembali Kehalaman Utama</a></p>          
        </div>
        <div class="row">
            <form method="POST" action="<?php echo site_url('start/nextstep');?>">
                <div class="col-lg-6 col-lg-offset-3">
                    <?php if($CountSession == 1){//step pertama : vertebrata atau avertebrata
                        $viewmorfologi=$this->M_hewan->firstMorfologi($type);
                        ?>
                        <?php foreach($viewmorfologi as $vm)://halaman pertama?>
                            <div style="margin-bottom:10px;" class="col-lg-12"><button name="<?php echo $vm['kd_ciri_morfologi']?>" type="submit" data-toggle="<?php echo $vm['desk_morf']?>" title="deskripsi mata satu" style="width:100%" class="btn btn-lg btn-primary"><?php echo $vm['nm_ciri_morfologi']?></button></div>
                        <?php endforeach; ?>
                        <?php
                    } else {
                        //get biggest index session morfologi
                        $max = array_keys($this->session->userdata('morfologi'), max($this->session->userdata('morfologi')));
                        $max = $max[0];
                        $kode = $this->session->userdata['morfologi'][$max]['kode'];
                        $viewmorfologi=$this->M_hewan->relatedMorfologi($kode);
                        if(!empty($viewmorfologi)){
                            ?>
                            <?php foreach($viewmorfologi as $vm)://halaman pertama?>
                                <div style="margin-bottom:10px;" class="col-lg-12"><button name="<?php echo $vm['kd_ciri_morfologi']?>" type="submit" data-toggle="<?php echo $vm['desk_morf']?>" title="deskripsi mata satu" style="width:100%" class="btn btn-lg btn-primary"><?php echo $vm['nm_ciri_morfologi']?></button></div>
                            <?php endforeach; ?>
                    <?php }else{//limit view morfologi
                        
                    } ?>    
                    <?php } ?>
                </div>
            </form>
        </div>            
    </div>
</section>


<footer>
    <div class="container">
        <a href="#" class="scrollpoint sp-effect3">
            <img src="<?php echo base_url('resource')?>/assets/img/freeze/logo.png" alt="" class="logo">
        </a>
        <div class="social">
            <a href="#" class="scrollpoint sp-effect3"><i class="fa fa-twitter fa-lg"></i></a>
            <a href="#" class="scrollpoint sp-effect3"><i class="fa fa-google-plus fa-lg"></i></a>
            <a href="#" class="scrollpoint sp-effect3"><i class="fa fa-facebook fa-lg"></i></a>
        </div>
        <div class="rights">
            <p>Copyright &copy; 2014</p>
            <p>Template by <a href="http://www.scoopthemes.com" target="_blank">ScoopThemes</a></p>
        </div>
    </div>
</footer>



</div>
<script src="<?php echo base_url('resource')?>/assets/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url('resource')?>/assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('resource')?>/assets/js/slick.min.js"></script>
<script src="<?php echo base_url('resource')?>/assets/js/placeholdem.min.js"></script>
<script src="<?php echo base_url('resource')?>/assets/js/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
<script src="<?php echo base_url('resource')?>/assets/js/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="<?php echo base_url('resource')?>/assets/js/waypoints.min.js"></script>
<script src="<?php echo base_url('resource')?>/assets/js/scripts.js"></script>
<script>
    $(document).ready(function() {
        appMaster.preLoader();
    });
</script>
</body>

</html>
