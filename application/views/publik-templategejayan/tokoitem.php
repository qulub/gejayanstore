<?php $this->load->view('publik-templategejayan/bases/popular')?>
<!-- produk terbaru -->
<div class="main_bg1">
	<div class="wrap toko-title">
		<div class="grids_of_2">
			<h2><?php echo $view['namaToko']?></h2>
		</div>
	</div>
</div>
<!-- start main -->
<div ng-app="tokoApp"  ng-controller="toko-navbar"  class="main_bg">
	<div class="wrap">
		<div class="main">
			<!-- tab -->
			<section class="tabs">
				<input ng-click="contentStyle={height:'200px'}" id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked">
				<label for="tab-1" class="tab-label-1">Tentang Toko</label>

				<input ng-click="loadCatalog()" id="tab-2" type="radio" name="radio-set" class="tab-selector-2">
				<label for="tab-2" class="tab-label-2">Katalog</label>

				<input ng-click="contentStyle={height:'200px'}" id="tab-3" type="radio" name="radio-set" class="tab-selector-3">
				<label for="tab-3" class="tab-label-3">Peta Toko</label>


				<div class="clear-shadow"></div>

				<div ng-style="contentStyle" class="content">
					<div class="content-1">
						<span style="width: 200px;float: left;margin-right: 10px;
						"><img style="height:180px" src="<?php echo base_url('resource/images/toko/'.$view['avatar']);?>"></span>
						<p><span class="bold">Nama : </span><?php echo $view['namaToko']?></p>
						<p><span class="bold">Buka : </span><?php echo $view['jamBuka']?> - <?php echo $view['jamTutup']?></p>
						<p><span class="bold">Alamat : </span><?php echo $view['alamatToko']?></p>
						<p><span class="bold">Telp : </span><?php echo $view['telp']?></p>
						<p><span class="bold">Email : </span><?php echo $view['emailToko']?></p>
						<p><span class="bold">Tentang Toko : </span><?php echo $view['tentangToko']?></p>
						<div class="clear"></div>
					</div>
					<div class="content-2">
							{{kataloglist}}
							<!-- list katalog-->
							<a ng-repeat="list in lists" class="katalog-list" target="_blank" style="background:url('{{list.url}}');background-size: contain;background-position: center;background-repeat: no-repeat;" href="{{list.url}}"></a>
							<!-- end of list barang -->
					</div>
					<div class="content-3">
						<p class="para"><span>WELCOME </span> Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections </p>
						<ul class="qua_nav">
							<li>Multimedia Systems</li>
							<li>Digital media adapters</li>
							<li>Set top boxes for HDTV and IPTV Player applications on various Operating Systems and Hardware Platforms</li>
						</ul>
					</div>
				</div>
			</section>
			<div class="block-title">
					<h2>Promo kami</h2>
				</div>
			<!-- start grids_of_3 -->
			<div class="grids_of_3">
                <?php if(empty($listproduk))echo '<center class="error">Tidak ada promo aktif / masa berlaku toko sudah habis</center>';?>
				<?php foreach($listproduk as $lp):?>
					<div class="list-item grid1_of_3">
						<a href="<?php echo site_url('produk/v/'.$lp['idItem'].'/'.str_replace(' ','-',strtolower($lp['judul'])))?>">
							<?php
							$gambar = $this->M_produk->getGambarProduk($lp['idItem']);
							$gambar = $gambar['gambar'];
							?>
							<div class="item-image" style="width:100%;height:270px;background-image:url('<?php echo base_url('resource/images/produk/'.date('m_Y',strtotime($lp['tglPost'])).'/'.$gambar)?>')"></div>
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
</div>
<!-- end of produk terbaru -->

<script charset="utf-8">
	// var app = angular.module('tokoApp',['ngRoute']);
	app.controller('toko-navbar',['$scope','$http',function($scope,$http){
		$scope.kataloglist = 'loading...';
		$scope.loadCatalog = function()
		{
			// //get json list of catalog barang
			url = '<?php echo site_url("ajax/getKatalog");?>';
			var request = $http({
				method: "post",
				url: url,
				data: {
						idToko:'<?php echo $view["idToko"];?>',
				},
				headers: {'Content-Type': 'application/x-www-form-urlencoded'}
			});
			// // Store the data-dump of the FORM scope.
			request.success(
					function(response) {
							if(response.length == 0)//belum upload katalog
							{
								$scope.contentStyle={height:'200px'};
								$scope.kataloglist = 'belum upload katalog';
							}else//sudah upload katalog
							{
								$scope.lists = response;
								$scope.contentStyle={height:'500px'};
								$scope.kataloglist = null;
							}
					}
			);
			// //request error
			request.error(
				function(response){
					alert('gagal ambil data katalog');
				}
			);
		};
	}]);
</script>
