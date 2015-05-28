<?php 
if(!empty($script))echo '<script>$(document).ready(function(){'.$script.'});</script>';
?>
<div class="gallery1">
	<div class="container">
		<div class="wrap">	
			<div class="main">
				<div ng-app="gejayanApp" ng-controller="formCtrl" class="contact">	
					<div class="contact-form">
						<h2><?php echo $title;?></h2>
						<br/>
						<form name="myForm" method="post" action="<?php echo site_url('dashboard/promoaction?act=editprocess')?>" enctype="multipart/form-data">
							<h3><strong>Data Pemilik</strong></h3>
							<div>
								<span><label>Nama Lengkap <br/>sesuai KTP/Tanda Pengenal</label></span>
								<span><input name="promo[Judul]" type="text" class="textbox" value="" ng-model="title" value=""></span>
							</div>
							<div>
								<span><label>Nomor Kartu Tanda Pengenal (KTP / tanda pengenal lainnya)</label></span>
								<span><input name="promo[Judul]" type="text" class="textbox" value="" ng-model="title" value=""></span>
							</div>
							<div>
								<span><label>No Telp / HP</label></span>
								<span><input name="promo[Judul]" type="text" class="textbox" value="" ng-model="title" value=""></span>
							</div>
							<div>
								<span><label>Email <br/>data username dan password untuk login akan dikirimkan disini setelah proses verifikasi data selesai</label></span>
								<span><input name="promo[Judul]" type="text" class="textbox" value="" ng-model="title" value=""></span>
							</div>
							<div>
								<span><label>Domisili Sekarang</label></span>
								<span><textarea name="promo[Judul]" type="text" class="textbox" value="" ng-model="title" value=""></textarea></span>
							</div>
							<div>
								<span><label>Upload Scan KTP / tanda pengenal lain<br/>maks 1 MB, support jpg, png</label></span>
								<span><input type="file"></span>
							</div>
							<br/>
							<h3><strong>Data Usaha</strong></h3>
							<div>
								<span><label>Nama Toko / Tempat Usaha</label></span>
								<span><input name="promo[Judul]" type="text" class="textbox" value="" ng-model="title" value=""></span>
							</div>
							<div>
								<span><label>Deskrisi Singkat Toko / Tempat Usaha</label></span>
								<span><textarea name="promo[Deskripsi]" type="text" class="textbox"></textarea></span>
							</div>
							<div>
								<span><label>Alamat Toko</label></span>
								<span><textarea name="promo[Deskripsi]" type="text" class="textbox">Jl. Gejayan No ? , Kabuaten Sleman, Daerah Istimewa Yogyakarta</textarea></span>
								
							</div>
							<div>
								<span><label>Nomor Telepon</label></span>
								<span><input name="promo[Judul]" type="text" class="textbox" value="" ng-model="title" value=""></span>
								
							<div>
								<span><label>Email (jika ada)</label></span>
								<span><input name="promo[Judul]" type="text" class="textbox" value="" ng-model="title" value=""></span>
								
							</div>
							<div>
								<span><label>Jam Buka <br/>Contoh : 08:00 , penulisan 24 jam</label></span>
								<span><input name="promo[Judul]" type="text" class="textbox" value="" ng-model="title" value=""></span>
								
							</div>
							<div>
								<span><label>Jam Tutup <br/>Contoh : 21:00 , penulisan 24 jam</label></span>
								<span><input name="promo[Judul]" type="text" class="textbox" value="" ng-model="title" value=""></span>
								
							</div>
							<div>
								<span><label>Hari Libur <br/>Contoh : minggu, senin , selasa. pisahkan dengan spasi</label></span>
								<span><input name="promo[Judul]" type="text" class="textbox" value="" ng-model="title" value=""></span>								
							</div>
							<div>
								<span><label>Logo Toko<br/>maks 1 MB, support jpg, png</label></span>
								<span><input type="file"></span>
							</div>
							<div>
								<span><label>Scan Bukti Kepemilikan Toko, sialhkan upload salah satu(Surat Domisili Ssaha, Surat Ijin Usaha)<br/>maks 1 MB, support jpg, png</label></span>
								<span><input type="file"></span>
							</div>
							<span><input type="submit" class="" value="Daftar"></span>
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
		
	}]);
</script>