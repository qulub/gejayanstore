<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
   <title>
      <?php
      if(!empty($title)){
         echo $title.' | Gejayan Store';
      }else{
         echo 'Gejayan Store';
      }
      ?>
   </title>
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700' rel='stylesheet' type='text/css'>
   <link href="<?php echo base_url('resource')?>/css/style.css" rel="stylesheet" type="text/css" media="all" />
   <link rel="icon" href="<?php echo base_url('resource/images/logo-fav.png')?>" media="screen" title="no title" charset="utf-8">
   <script type="text/javascript" src="<?php echo base_url('outsource/js/angular.min.js');?>"></script>
   <script type="text/javascript" src="<?php echo base_url('outsource/js/angular-route.min.js');?>"></script>
   <script type="text/javascript" src="<?php echo base_url('outsource/js/gejayanstore.js');?>"></script>
   <script type="text/javascript" src="<?php echo base_url('resource')?>/js/jquery.min.js"></script>
   <!-- start slider -->
   <link href="<?php echo base_url('resource')?>/css/slider.css" rel="stylesheet" type="text/css" media="all" />
   <script type="text/javascript" src="<?php echo base_url('resource')?>/js/modernizr.custom.28468.js"></script>
   <script type="text/javascript" src="<?php echo base_url('resource')?>/js/jquery.cslider.js"></script>
   <script type="text/javascript">
   $(function() {
      $('#da-slider').cslider();
   });
   </script>
   <!-- Owl Carousel Assets -->
   <link href="<?php echo base_url('resource')?>/css/owl.carousel.css" rel="stylesheet">
   <!-- Owl Carousel Assets -->
   <!-- Prettify -->
   <script src="<?php echo base_url('resource')?>/js/owl.carousel.js"></script>
   <script>
   $(document).ready(function() {

      $("#owl-demo").owlCarousel({
         items : 4,
         lazyLoad : true,
         autoPlay : true,
         navigation : true,
         navigationText : ["",""],
         rewindNav : false,
         scrollPerPage : false,
         pagination : false,
         paginationNumbers: false,
      });
   });
   </script>
   <!-- //Owl Carousel Assets -->
   <!-- start top_js_button -->
   <script type="text/javascript" src="<?php echo base_url('resource')?>/js/move-top.js"></script>
   <script type="text/javascript" src="<?php echo base_url('resource')?>/js/easing.js"></script>
   <script type="text/javascript">
   jQuery(document).ready(function($) {
      $(".scroll").click(function(event){
         event.preventDefault();
         $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
      });
   });
   </script>
</head>
<body>
   <!-- start header -->
   <div class="header_bg">
      <div class="wrap">
         <div class="header">
            <div class="logo">
               <a href="<?php echo site_url();?>"><img src="<?php echo base_url('resource')?>/images/logo.png" alt=""/> </a>
            </div>
            <?php if(empty($this->session->userdata('admintoko'))){?>
            <div style="width:auto" class="h_icon">
               <ul class="icon1">
                  <li class="sub-icon1"><a class="tambahtoko" href="<?php echo site_url('register/toko')?>">Tambah Toko</a>
                     <ul class="sub-icon1 list">
                        <li><h3>Punya Toko Di Jalan Gejayan</h3><a href=""></a></li>
                        <li><p>cukup dengan mengikuti....</p></li>
                     </ul>
                  </li>
                  <li class="sub-icon1"><a style="background-color:rgb(65, 176, 164)" class="tambahtoko" href="<?php echo site_url('home/login');?>">Login</a>
                     <ul class="sub-icon1 list">
                        <li><h3>Login</li>
                        <li><p>klik untuk login sebagai pemilik toko atau pelanggan</p></li>
                     </ul>
                  </li>
               </ul>
            </div>
            <?php }else{?>
            <div style="width:auto" class="h_icon">
               <ul class="icon1">
                  <li class="sub-icon1"><a class="tambahtoko" href="<?php echo site_url('dashboard')?>">ke Dashboard</a> </li>
                  <li class="sub-icon1"><a style="background-color:rgb(239, 86, 86)" class="tambahtoko" href="<?php echo site_url('dashboard/logout')?>">logout</a></li>
               </ul>
            </div>
            <?php } ?>
            <div class="h_search">
               <form action="<?php echo site_url('produk/cari')?>">
                  <input name="q" type="text" value="<?php if(!empty($carion)){echo str_replace('-',' ',$this->uri->segment(3));}?>">
                  <input type="submit" value="">
               </form>
            </div>
            <div class="clear"></div>
         </div>
      </div>
   </div>
   <div class="header_btm">
      <div class="wrap">
         <div class="header_sub">
            <div class="h_menu">
               <ul>
                  <li class="active"><a href="<?php echo site_url();?>">Home</a></li> |
                  <?php
                  $categories = $this->M_category->showCategories(7);
                  foreach($categories as $c):?>
                  <li><a href="<?php echo site_url('produk/kategori/'.str_replace(' ','-', $c['namaKategori']))?>"><?php echo $c['namaKategori']?></a></li> |
               <?php endforeach;?>
               <li class="active"><a href="<?php echo site_url('kategori');?>">Semua</a></li>
            </ul>
         </div>
         <div class="top-nav">
            <nav class="nav">
               <a href="#" id="w3-menu-trigger"> </a>
               <ul class="nav-list" style="">
                  <li class="nav-item"><a class="active" href="index.html">Home</a></li>
                  <li class="nav-item"><a href="sale.html">Sale</a></li>
                  <li class="nav-item"><a href="handbags.html">Handbags</a></li>
                  <li class="nav-item"><a href="accessories.html">Accessories</a></li>
                  <li class="nav-item"><a href="shoes.html">Shoes</a></li>
                  <li class="nav-item"><a href="service.html">Services</a></li>
                  <li class="nav-item"><a href="contact.html">Contact</a></li>
               </ul>
            </nav>
            <div class="search_box">
               <form>
                  <input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}"><input type="submit" value="">
               </form>
            </div>
            <div class="clear"> </div>
            <script src="<?php echo base_url('resource')?>/js/responsive.menu.js"></script>
         </div>
         <div class="clear"></div>
      </div>
   </div>
</div>
<!-- start slider -->
<?php
$recent = site_url($this->uri->uri_string());
$site = site_url();
?>
<?php if($recent==$site)://only show on homepage?>
   <?php $this->load->view('publik-templategejayan/bases/slider-produkpopuler')?>
<?php endif;?>
<!----start-cursual---->
<div class="wrap">
   <!-- <br/>
   <center><h4 style="color:#3D3D3D;font-size:40px">Promo Terpopuler</h4></center> -->
</div>
