<?php
if(!empty($script))echo '<script>$(document).ready(function(){'.$script.'});</script>';
?>
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
							<li id="baru"><a href="<?php echo site_url('dashboard/promo/baru');?>">+ Tambah Promo</a></li>
							<li id="aktif"><a href="<?php echo site_url('dashboard/promo/aktif');?>">Promo Aktif</a></li>
							<li id="banned"><a href="<?php echo site_url('dashboard/promo/banned');?>">Promo Banned</a></li>
							<li id="habis"><a href="<?php echo site_url('dashboard/promo/habis');?>">Promo Habis</a></li>
						</ul>
						<br/>
						<br/>
						<form name="myForm" method="post" action="<?php echo site_url('dashboard/promobaru')?>" enctype="multipart/form-data">
							<div>
								<span><label>Judul Promo</label></span>
								<span><input name="promo[Judul]" type="text" class="textbox" value="" ng-model="promo.title"></span>
							</div>
							<div>
								<span><label>Deskripsi</label></span>
								<span><textarea name="promo[Deskripsi]" type="text" class="textbox" value="" ng-model="promo.deskripsi"></textarea></span>
							</div>
							<div>
								<span><label>Kategori</label></span>
								<span>
								<select name="promo[IdMainKat]" ng-change="getSubKat()" ng-model="mainkat" class="textbox" ng-model="promo.mainkat" required>
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
								<select name="promo[IdSubKategori]" class="textbox" ng-model="promo.subkat" required>
									<option value="">Pilih Sub Kategori</option>
									<option ng-repeat="data in DataSubKat" value="{{data.idSubKategori}}">{{data.namaSubKategori}}</option>
								</select>
								</span>
							</div>
							<div>
								<span><label>Harga Awal (Rp) masukan tanpa tanda 'Rp'</label></span>
								<span><input name="promo[Harga]" type="text" class="textbox" value="" ng-model="promo.harga"></span>
							</div>
							<div>
								<span><label>Diskon (%) masukan tanpa tanda '%'</label></span>
								<span><input name="promo[Diskon]" type="number" min="0" max="100" class="textbox" value="" ng-model="promo.diskon"></span>
							</div>
							<div>
								<span><label>Batas Promo</label></span>
								<span><input name="promo[HabisPromo]" type="date" class="textbox" value="" ng-model="promo.habis"></span>
							</div>
							<?php if(!empty($error))echo $error;?>
							<div>
							<div>
								<span><label>Tambah Gambar</label></span>
								<table>
									<tr>
										<td><input name="gambar1" type="file" class="textbox" value=""></td>
										<td><input name="gambar2" type="file" class="textbox" value=""></td>
										<td><input name="gambar3" type="file" class="textbox" value=""></td>
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
		$http.get('<?php echo site_url("ajax/jsonGetMainKat")?>')//auto load
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
