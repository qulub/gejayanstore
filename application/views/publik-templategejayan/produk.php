<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<?php
//get main picture
$picture=$this->M_produk->getGambarProduk($view['idItem']);;
$dir = date('m_Y',strtotime($view['tglPost']));
$location = base_url('resource/images/produk/'.$dir.'/');
$mainpic = $picture['gambar'];
?>
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
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <link rel="icon" href="<?php echo base_url('resource/images/logo-fav.png')?>" media="screen" title="no title" charset="utf-8">
   <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700' rel='stylesheet' type='text/css'>
   <link href="<?php echo base_url('resource');?>/css/style.css" rel="stylesheet" type="text/css" media="all" />
   <!-- start details -->
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('resource');?>/css/productviewgallery.css" media="all" />
   <script type="text/javascript" src="<?php echo base_url('outsource/js/angular.min.js');?>"></script>
   <script type="text/javascript" src="<?php echo base_url('outsource/js/angular-route.min.js');?>"></script>
   <script type="text/javascript" src="<?php echo base_url('outsource/js/gejayanstore.js');?>"></script>
   <script type="text/javascript" src="<?php echo base_url('resource')?>/js/jquery.min.js"></script>

   <script type="text/javascript">
      jQuery(document).ready(function($) {
         $(".scroll").click(function(event){
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
         });
         <?php
         $referrer = $this->agent->referrer();
         $recent = $this->uri->uri_string();
         if($referrer!='' OR $referrer!=$recent):
            echo 'addViews();';
         endif;
         ?>
      });
      function addViews()
      {
         var id = '<?php echo $this->uri->segment(3);?>';
         var url = '<?php echo site_url('ajax/addViews');?>';
         $.ajax({
            url:url,
            data:{iditem:id},
            type:'POST',
            success:function(){

            },
            error:function(){
               alert('error');
            }
         });
      }
   </script>
</head>
<body>
   <!-- start header -->
   <div class="header_bg">
      <div class="wrap">
         <div class="header">
            <div class="logo">
               <a href="<?php echo site_url();?>"><img src="<?php echo base_url('resource');?>/images/logo.png" alt=""/> </a>
            </div>
            <div style="width:auto" class="h_icon">
               <ul class="icon1">
                  <li class="sub-icon1" style="margin-right:5px"><a class="tambahtoko" href="<?php echo site_url('register/toko')?>">Tambah Toko</a>
                     <ul class="sub-icon1 list">
                        <li><h3>Punya Toko Di Jalan Gejayan</h3><a href=""></a></li>
                        <li><p>cukup dengan mengikuti....</p></li>
                     </ul>
                  </li>
                  <li class="sub-icon1"><a class="tambahtoko" href="#">Login</a>
                     <ul class="sub-icon1 list">
                        <li><h3>Login</li>
                        <li><p>klik untuk login sebagai pemilik toko atau pelanggan</p></li>
                     </ul>
                  </li>
               </ul>
            </div>
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
                  <li><a href="sale.html"><?php echo $c['namaKategori']?></a></li> |
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
            <script src="<?php echo base_url('resource');?>/js/responsive.menu.js"></script>
         </div>
         <div class="clear"></div>
      </div>
   </div>
</div>
<!-- start main -->
<div class="main_bg">
   <div class="wrap">
      <div class="main">
         <!-- start content -->
         <div class="single">
            <!-- start span1_of_1 -->
            <div class="left_content">
               <div class="span1_of_1">
                  <!-- start product_slider -->
                  <div ng-app="productApp" ng-route="" class="product-view">
                     <div ng-controller="productImage" class="product-essential">
                        <div class="product-img-box">
                           <div id="image" class="product-image">
                              <img ng-src="<?php echo $location;?>/{{mainpic}}" alt="Women Shorts" title="Women Shorts" />
                           </div>
                           <div class="more-views" style="float:left;">
                              <div class="more-views-container">
                                 <ul>
                                    <?php foreach($galeri as $g):?>
                                       <li>
                                          <a ng-click="changeMainPic('<?php echo $g['gambar'];?>')" class="imagebg" style="width:100px;height:100px;background-image:url('<?php echo $location;?>/<?php echo $g['gambar'];?>')" class="cs-fancybox-thumbs" data-fancybox-group="thumb" style="width:64px;height:85px;" href="#image"  title="<?php echo $view['judul']?>" alt="<?php echo $view['judul']?>"></a>
                                       </li>
                                    <?php endforeach;?>
                                 </ul>
                              </div>
                           </div>                                         
                        </div>
                     </div>
                  </div>
                  <!-- end product_slider -->
               </div>
               <br/><br/>
               <!-- start span1_of_1 -->
               <div class="span1_of_1_des">
                  <div class="desc1">
                     <h3><?php echo $view['judul'];?> </h3>
                     <small style="font-size:9px">Posted : <?php echo $view['tglPost'];?> | Update : <?php echo $view['tglEdit'];?> | <?php echo $view['views'];?> views</small>
                     <hr/ style="border:1px solid 1px">
                     <p><?php echo nl2br($view['deskripsi']);?></p>
                     <h5>
                        <striped class="discon">Diskon <?php echo $view['diskon']?>%
                           <br/>
                           <small style="font-size:15px">diskon berlaku sampai <?php echo date('d-m-Y', strtotime($view['habisPromo']))?> / <?php echo $sisa;?> hari lagi</small>
                        </striped> <br/>
                        <?php if($view['diskon'] > 0):?>
                           <striped class="strip">Rp<?php echo number_format($view['harga']);?>,-</striped>
                        <?php endif;?>
                        Rp<?php echo number_format($view['harga']-($view['harga']*($view['diskon']/100)));?>,-
                     </h5>
                     <div class="share-desc">
                        <div class="share">
                           <h4>Share Product :</h4>
                           <ul class="share_nav">
                              <li><a href="#"><img src="<?php echo base_url('resource');?>/images/facebook.png" title="facebook"></a></li>
                              <li><a href="#"><img src="<?php echo base_url('resource');?>/images/twitter.png" title="Twiiter"></a></li>
                              <li><a href="#"><img src="<?php echo base_url('resource');?>/images/rss.png" title="Rss"></a></li>
                              <li><a href="#"><img src="<?php echo base_url('resource');?>/images/gpluse.png" title="Google+"></a></li>
                           </ul>
                        </div>
                        <div class="clear"></div>
                     </div>
                  </div>
               </div>
               <div class="clear"></div>
               <!-- start tabs -->
               <section class="tabs">
                  <input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked">
                  <label for="tab-1" class="tab-label-1">Tentang Toko</label>

                  <input id="tab-2" type="radio" name="radio-set" class="tab-selector-2">
                  <label for="tab-2" class="tab-label-2">Peta Toko</label>

                  <div class="clear-shadow"></div>

                  <div style="min-height:300px;poverflow-x:hidden" class="content">
                     <div class="content-1">
                        <p><?php echo nl2br($toko['tentangToko']);?></p>

                     </div>
                     <div class="content-2">
                        <p class="para">..lokasi poto... </p>

                     </div>
                  </div>
               </section>
               <!-- end tabs -->
            </div>
            <!-- start sidebar -->
            <div class="left_sidebar">
               <div class="sellers">
                  <h4>Promo Lain</h4>
                  <div class="single-nav">
                     <ul>
                        <?php foreach($promolain as $pl):
                                          //hitung sisa promo
                        $today = date_create(date('Y-m-d'));
                        $last = date_create(date('Y-m-d', strtotime($pl['habisPromo'])));
                        $diff=date_diff($today,$last);
                        $diff = $diff->format("%r%a");
                        ?>
                        <li>
                           <a href="<?php echo site_url('produk/v/'.$pl['idItem'].'/'.strtolower(str_replace(' ','-',$pl['Judul'])));?>"><?php echo $pl['Judul'];?></a>
                           <p class="small-discon">Diskon <?php echo $pl['diskon']?>% s/d <?php echo $diff;?> hari</p>
                        </li>
                     <?php endforeach;?>
                  </ul>
               </div>
               <h4>Promo Toko Lain</h4>
               <div class="single-nav">
                  <ul>
                     <?php foreach($promotokolain as $pl):
                                          //hitung sisa promo
                     $today = date_create(date('Y-m-d'));
                     $last = date_create(date('Y-m-d', strtotime($pl['habisPromo'])));
                     $diff=date_diff($today,$last);
                     $diff = $diff->format("%r%a");
                     ?>
                     <li>
                        <a href="<?php echo site_url('produk/v/'.$pl['idItem'].'/'.strtolower(str_replace(' ','-',$pl['Judul'])));?>"><?php echo $pl['Judul'];?></a>
                        <p class="small-discon">Diskon <?php echo $pl['diskon']?>% s/d <?php echo $diff;?> hari</p>
                     </li>
                  <?php endforeach;?>
               </ul>
            </div>

         </div>
         <!-- end sidebar -->
         <div class="clear"></div>
      </div>
      <!-- end content -->
   </div>
</div>
</div>
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
      <li><a href="">alexis Hudson</a></li>
      <li><a href="">american apparel</a></li>
      <li><a href="">ben sherman</a></li>
      <li><a href="">big buddha</a></li>
      <li><a href="">channel</a></li>
      <li><a href="">christian audigier</a></li>
      <li><a href="">coach</a></li>
      <li><a href="">cole haan</a></li>
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
<script type="text/javascript">
   var productApp = angular.module('productApp',['ngRoute']);
productApp.controller('productImage',['$scope',function($scope){//controller on product single page
   $scope.mainpic = '<?php echo $mainpic;?>';
   //change main picture
   $scope.changeMainPic = function(path)
   {
      $scope.mainpic = path;//change main pic source
   };
}]);
</script>
</body>
</html>
