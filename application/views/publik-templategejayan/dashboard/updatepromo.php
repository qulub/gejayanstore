<?php
if(!empty($script))echo '<script>$(document).ready(function(){'.$script.'});</script>';
?>
<!-- <h1>dsdsdsdsd</h1> -->
<div class="gallery1">
	<div class="container">
		<div class="wrap">
			<div class="main">
				<div ng-controller="formCtrl" class="contact">
					<?php $this->load->view('publik-templategejayan/dashboard/navbar');?>
					<div class="contact-form">
						<h2><?php echo $title;?></h2>
						<br/>
						<ul class="vertical-menu">
							<!-- get lattest menu status, and counting -->
							<li id="baru"><a href="<?php echo site_url('dashboard/promo/baru');?>">+ Tambah Promo</a></li>
							<li id="aktif"><a href="<?php echo site_url('dashboard/promo/aktif');?>">Promo Aktif</a></li>
							<li id="banned"><a href="<?php echo site_url('dashboard/promo/banned');?>">Promo Banned</a></li>
							<li id="habis"><a href="<?php echo site_url('dashboard/promo/habis');?>">Promo Habis</a></li>
						</ul>
						<br/>
						<br/>
						<form name="myForm" method="post" action="<?php echo site_url('dashboard/promoaction?act=editprocess')?>" enctype="multipart/form-data">
							<input type="hidden" name="promo[id]" value="<?php echo $item['idItem'];?>">
							<div>
								<span><label>Judul Promo</label></span>
								<span><input name="promo[Judul]" type="text" class="textbox" value="" ng-model="item" value=""></span>
							</div>
							<div>
								<span><label>Deskripsi</label></span>
								<span><textarea name="promo[Deskripsi]" type="text" class="textbox"><?php echo $item['Deskripsi']?></textarea></span>
							</div>
							<div>
								<span><label>Kategori</label></span>
								<span>
								<select name="promo[IdMainKat]" ng-change="getSubKat()" ng-model="mainkat" class="textbox" required>
									<option value="">Pilih Kategori Utama</option>
									<?php
									foreach ($mainkat as $mk) {
										echo '<option value="'.$mk['idKategoriItem'].'">'.$mk['namaKategori'].'</option>';
									}
									?>
								</select>
								</span>
							</div>
							<span class="loader">{{loader}}</span>
							<div>
								<span><label>Sub Kategori</label></span>
								<span>
								<select name="promo[IdSubKategori]" class="textbox" ng-model="subkat" required>
									<option value="">Pilih Sub Kategori</option>
									<option ng-repeat="data in DataSubKat" value="{{data.idSubKategori}}">{{data.namaSubKategori}}</option>
								</select>
								</span>
							</div>
							<div>
								<span><label>Harga Awal (Rp) masukan tanpa tanda 'Rp'</label></span>
								<span><input name="promo[Harga]" type="text" class="textbox" value="" ng-model="harga"></span>
							</div>
							<div>
								<span><label>Diskon (%) masukan tanpa tanda '%'</label></span>
								<span><input name="promo[Diskon]" type="text" min="0" max="100" class="textbox" value="" ng-model="diskon"></span>
							</div>
							<div>
								<span><label>Batas Promo</label></span>
								<span><input name="promo[HabisPromo]" type="date" class="textbox" value="" ng-model="habis"></span>
							</div>
							<?php if(!empty($error))echo $error;?>
							<div>
							<div>
								<span><label>Ubah Gambar (klik untuk ukuran besar)</label></span>
								<table>
									<tr>
										<?php $dir = base_url('resource/images/produk/'.date('m_Y',strtotime($item['tglPost'])));$n=1;
										foreach($images as $im):?>
										<td>
										<a target="_blank" href="<?php echo $dir;?>/<?php echo $im['gambar'];?>"><div class="imagereview" style="background-image:url('<?php echo $dir;?>/<?php echo $im['gambar'];?>')"></div></a>
										<br/>
										<input type="hidden" name="gambar[lama<?php echo $n;?>]" ng-model="gambarlama<?php echo $n;?>">
										<input name="gambar<?php echo $n?>" type="file" class="textbox" value=""></td>
										</td>
										<?php $n++;endforeach;?>
										<?php
										if($n<=3)
										{
											for($n;$n<=3;$n++)
											{
											echo '<td><div style="background-image:url('.base_url("resource/images/produk/no_image.jpg").')" class="imagereview"></div><br/><input name="gambar'.$n.'" type="file" class="textbox" value=""></td>';
											}
										}
										?>
									</tr>
								</table>
							</div>
							<span><input type="submit" class="" value="Simpan Data"></span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div><!-- container -->
	<div class="clear"> </div>
</div>
<!-- javascript -->
<script type="text/javascript">
	app.controller('formCtrl',['$scope','$http',function($scope,$http){
		//set input value
		$scope.item = '<?php echo $item["Judul"];?>';
		$scope.mainkat = '<?php echo $idmainkat;?>';
		$scope.subkat = '<?php echo $item["idSubKategori"];?>';
		$scope.harga = '<?php echo $item["harga"];?>';
		$scope.diskon = '<?php echo $item["diskon"];?>';
		$scope.habis = '<?php echo date("Y-m-d",strtotime($item["habisPromo"]));?>';
		$scope.DataSubKat = <?php echo $subkat;?>;//get subkat list by id main kat
		$scope.subkat = '<?php echo $item["idSubKategori"];?>';
		<?php $n=1;foreach($images as $im):?>
		$scope.gambarlama<?php echo $n;?> = '<?php echo $im["gambar"];?>';
		<?php $n++;endforeach;?>
		//end of set input value
		$http.get('<?php echo site_url("ajax/jsonGetMainKat");?>')//auto load
		.success(function(data){
			$scope.DataMainKat = data;
		})
		.error(function(data){
			alert('gagal load main kategori');
		});
		//subkat function
		$scope.getSubKat = function()
		{
			var idmainkat = $scope.mainkat;
			$scope.loader = 'Loading Sub Kategori';//loader text
			$http.get('<?php echo site_url("ajax/jsonGetSubKat?mainkat=")?>'+idmainkat)//get response
			.success(function(data){
				$scope.loader = '';
				$scope.DataSubKat = data;
			})
			.error(function(data){
				$scope.loader = '';
				alert('gagal load sub kategori');
			});
			// alert(idmainkat);
		};
	}]);
</script>
