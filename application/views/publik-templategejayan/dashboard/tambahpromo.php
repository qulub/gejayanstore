<?php 
if(!empty($script))echo '<script>$(document).ready(function(){'.$script.'});</script>';
?>
<div class="gallery1">
	<div class="container">
		<div class="wrap">	
			<div class="main">
				<div ng-app="gejayanApp" ng-controller="formCtrl" class="contact">	
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
						<form method="post" action="<?php echo site_url('dashboard/promobaru') ?>">
							<div>
								<span><label>Judul Promo</label></span>
								<span><input name="profile[namaPemilik]" type="text" class="textbox" value=""></span>
							</div>
							<div>
								<span><label>Deskripsi</label></span>
								<span><textarea name="profile[telp]" type="text" class="textbox" value=""></textarea></span>
							</div>
							<div>
								<span><label>Kategori</label></span>
								<span>
								<select ng-change="getSubKat()" ng-model="mainkat" class="textbox" required>
									<option value="">Pilih Kategori Utama</option>
									<?php 
									foreach ($mainkat as $mk) {
										echo '<option value="'.$mk['idKategoriItem'].'">'.$mk['namaKategori'].'</option>';
									}
									?>
								</select>
								</span>
							</div>
							<div>
								<span><label>Sub Kategori</label></span>
								<span>
								<select class="textbox" required>
									<option value="">Pilih Sub Kategori</option>
									<option ng-repeat="data in DataSubKat" value="{{data.IdSubKategori}}">{{data.namaSubKategori}}</option>
								</select>
								</span>
							</div>
							<div>
								<span><label>Harga Awal (Rp) masukan tanpa tanda 'Rp'</label></span>
								<span><input name="profile[email]" type="text" class="textbox" value=""></span>
							</div>
							<div>
								<span><label>Diskon (%) masukan tanpa tanda '%'</label></span>
								<span><input name="profile[email]" type="number" min="0" max="100" class="textbox" value=""></span>
							</div>
							<?php if(!empty($error))echo $error;?>
							<div>
							<p>tambah gambar baru bisa anda lakukan setelah melakukan penyimpanan promo</p>
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
	angular.module('gejayanApp',['ngRoute'])
	.controller('formCtrl',['$scope','$http',function($scope,$http){
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
			$http.get('<?php echo site_url("ajax/jsonGetSubKat?mainkat=")?>'+idmainkat)//get response
			.success(function(data){
				$scope.DataSubKat = data;
			})
			.error(function(data){
				alert('gagal load sub kategori');
			});
			// alert(idmainkat);
		};
	}]);
</script>