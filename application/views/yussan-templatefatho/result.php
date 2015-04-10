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
          <?php 
          $view = $this->session->userdata('result');
          ?>
          <div class="container">                
            <div class="section-heading scrollpoint sp-effect3">
                <h1>Hasil Akhir</h1>
                <div class="divider"></div>
                <p>Berikut adalah hasil berhitungan dari sistem pakar</p>
                <p><a href="<?php echo site_url('');?>">Kembali Kehalaman Utama</a></p>          
            </div>
            <div class="col-lg-10 col-lg-offset-1">
                <?php
                $isCompleted =$this->M_hewan->isCompleted($this->uri->segment(3));
                if($isCompleted){
                    ?>                    
                    <form method="POST" action="<?php echo site_url('start');?>">
                        <div class="col-lg-12">
                            <br/>
                            <div style="margin-bottom:10px;" class="col-lg-12"><button type="submit" data-toggle="tolltip" title="deskripsi mata satu" style="width:100%" class="btn btn-lg btn-primary">Lanjut</button></div> 
                        </div>
                    </form>
                <?php } ?>
                    <?php foreach($view as $v):
                    $view = $this->M_hewan->detailHewan($v['kode']);
                    ?>
                    <div class="row">
                        <div class="col-md-4">
                            <h1><?php echo $view['nm_hewan'];?></h1>
                            <img src="<?php echo base_url('resource/images/'.$view['gambar_hewan']);?>" style="width:100%">
                        </div>
                        <div class="col-md-8">
                            <h1>Keterangan</h1>
                            <p><?php echo $view['definisi'];?></p>
                        </div>
                    </div>
                    <hr/>
                <?php endforeach; ?>
                 <?php
                $isCompleted =$this->M_hewan->isCompleted($this->uri->segment(3));
                if($isCompleted){
                    ?>                    
                    <form method="POST" action="<?php echo site_url('start');?>">
                        <div class="col-lg-12">
                            <br/>
                            <div style="margin-bottom:10px;" class="col-lg-12"><button type="submit" data-toggle="tolltip" title="deskripsi mata satu" style="width:100%" class="btn btn-lg btn-primary">Lanjut</button></div> 
                        </div>
                    </form>
                <?php } ?>
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
