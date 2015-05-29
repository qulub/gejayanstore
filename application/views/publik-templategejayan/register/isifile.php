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
						<form name="myForm" method="post" action="<?php echo site_url('register/process#error')?>" enctype="multipart/form-data">
							<h3><strong>Data Pemilik</strong></h3>
							<div>
								<span><label>Nama Lengkap <br/>sesuai KTP/Tanda Pengenal</label></span>
								<span><input name="pemilik[nama]" type="text" class="textbox" value="<?php if(!empty($pemilik['nama']))echo $pemilik['nama'];?>"></span>
							</div>
							<div>
								<span><label>Nomor Kartu Tanda Pengenal (KTP / tanda pengenal lainnya)</label></span>
								<span><input name="pemilik[noid]" type="text" class="textbox" value="<?php if(!empty($pemilik['noid']))echo $pemilik['noid'];?>"></span>
							</div>
							<div>
								<span><label>No Telp / HP</label></span>
								<span><input name="pemilik[notelp]" type="text" class="textbox" value="<?php if(!empty($pemilik['notelp']))echo $pemilik['notelp'];?>"></span>
							</div>
							<div>
								<span><label>Email <br/>data username dan password untuk login akan dikirimkan disini setelah proses verifikasi data selesai</label></span>
								<span><input name="pemilik[email]" type="text" class="textbox" value="<?php if(!empty($pemilik['email']))echo $pemilik['email'];?>" ></span>
							</div>
							<div>
								<span><label>Domisili Sekarang</label></span>
								<span><textarea name="pemilik[domisili]" type="text" class="textbox" required><?php if(!empty($pemilik['domisili']))echo $pemilik['domisili'];?></textarea></span>
							</div>
							<div>
								<span><label>Upload Scan KTP / tanda pengenal lain<br/>maks 1 MB, support jpg, png</label></span>
								<span><input name="idcard" type="file" required></span>
							</div>
							<br/>
							<h3><strong>Data Usaha</strong></h3>
							<div>
								<span><label>Nama Toko / Tempat Usaha</label></span>
								<span><input name="usaha[nama]" type="text" class="textbox" value="<?php if(!empty($usaha['nama']))echo $usaha['nama'];?>" required></span>
							</div>
							<div>
								<span><label>Kategori Usaha</label></span>
								<span>
								<select name="usaha[kategori]" required>
								<option value="">Pilih kategori usaha</option>	
								<?php foreach($this->db->get('kategoriUsaha')->result_array() as $ku):?>
								<option value="<?php echo $ku['idkategoriUsaha'];?>"><?php echo $ku['namaKategoriUsaha'];?></option>	
								<?php endforeach;?>
								</select>
							</div>
							<div>
								<span><label>Deskripsi Singkat Toko / Tempat Usaha</label></span>
								<span><textarea name="usaha[deskripsi]" type="text" class="textbox" required><?php if(!empty($usaha['deskripsi']))echo $usaha['deskripsi'];?></textarea></span>
							</div>
							<div>
								<span><label>Alamat Toko</label></span>
								<span><textarea name="usaha[alamat]" type="text" class="textbox" required>Jl. Gejayan No ? , Kabuaten Sleman, Daerah Istimewa Yogyakarta</textarea></span>
								
							</div>
							<div>
								<span><label>Nomor Telepon</label></span>
								<span><input name="usaha[telepon]" type="text" class="textbox" value="<?php if(!empty($usaha['telepon']))echo $usaha['telepon'];?>" ></span>
								
							<div>
								<span><label>Email (jika ada)</label></span>
								<span><input name="usaha[email]" type="text" class="textbox" value="<?php if(!empty($usaha['email']))echo $usaha['email'];?>"></span>
								
							</div>
							<div>
								<span><label>Jam Buka <br/>Contoh : 08:00 , penulisan 24 jam</label></span>
								<span><input name="usaha[jambuka]" type="text" class="textbox" value="<?php if(!empty($usaha['jambuka']))echo $usaha['jambuka'];?>"></span>
								
							</div>
							<div>
								<span><label>Jam Tutup <br/>Contoh : 21:00 , penulisan 24 jam</label></span>
								<span><input name="usaha[jamtutup]" type="text" class="textbox" value="<?php if(!empty($usaha['jamtutup']))echo $usaha['jamtutup'];?>"></span>
								
							</div>
							<div>
								<span><label>Hari Libur <br/>Contoh : minggu, senin , selasa. pisahkan dengan spasi</label></span>
								<span><input name="usaha[libur]" type="text" class="textbox" value="<?php if(!empty($usaha['libur']))echo $usaha['libur'];?>"></span>								
							</div>
							<div>
								<span><label>Logo Toko<br/>maks 1 MB, support jpg, png</label></span>
								<span><input name="logotoko" type="file" required></span>
							</div>
							<div>
								<span><label>Scan TDP<br/>maks 1 MB, support jpg, png</label></span>
								<span><input name="tdp" type="file" required></span>
							</div>
							<div>
								<span><label>Scan SIUP<br/>maks 1 MB, support jpg, png</label></span>
								<span><input name="siup" type="file" required></span>
							</div>
							<div>
								<span><label>Scan Surat Ijin Gangguan<br/>maks 1 MB, support jpg, png</label></span>
								<span><input name="sig" type="file" required></span>
							</div>
							<?php if(!empty($error))echo $error;//if error found?>
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