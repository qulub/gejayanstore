<?php 
if(!empty($script))echo '<script>$(document).ready(function(){'.$script.'});</script>';
?>
<div class="gallery1">
	<div class="container">
		<div class="wrap">	
			<div class="main">
				<div class="contact">	
					<?php $this->load->view('publik-templategejayan/dashboard/navbar');?>
					<div class="contact-form">
						<h2>Toko</h2>
						<br/>
						<?php if(empty($toko)){?>
						<div style="padding:10px" class="error">
							anda tidak memiliki toko
						</div>
						<?php }else{?>
						<a target="_blank" href="<?php echo site_url('toko/v/1/'.str_replace(' ','-',$toko['namaToko']))?>">lihat toko</a><br/>
						<div class="contact-form">
						<p>Terakhir Update : <?php echo date('d-m-Y H:i:s',strtotime($toko['updateData']));?></p>
						<p>Masa Aktif Sampai : <?php echo date('d-m-Y',strtotime($toko['habisMasa']));?> <a target="_blank" href="#">+ Tambah Masa Aktif</a></p>
						<br/>
						<?php 
						// print_r($toko);
						?>
						<form enctype="multipart/form-data" method="post" action="#error">
							<input name="toko[avatar]" type="hidden" class="textbox" value="">
							<?php
							if(!empty($toko['avatar']))echo '<img width="200px" src="'.base_url('resource/images/toko/'.$toko['avatar']).'">';
							?>
							<div>
								<span><label>Ubah Logo Toko (maks panjang 500px, maks ukuran 1MB)</label></span>
								<span><input name="avatar" type="file" class="textbox" value=""></span>
							</div>
							<div>
								<span><label>Nama Toko</label></span>
								<span><input name="toko[namaToko]" type="text" class="textbox" value="<?php echo $toko['namaToko'];?>"></span>
							</div>
							<div>
								<span><label>Tentang Toko</label></span>
								<span><textarea name="toko[tentangToko]" type="text" class="textbox"><?php echo $toko['tentangToko'];?></textarea></span>
							</div>
							<div>
								<span><label>Alamat Toko</label></span>
								<span><textarea name="toko[alamatToko]" type="text" class="textbox"><?php echo $toko['alamatToko'];?></textarea></span>
							</div>
							<div>
								<span><label>Jam Buka</label></span>
								<span><input name="toko[jamBuka]" type="text" class="textbox" value="<?php echo $toko['jamBuka'];?>"></span>
							</div>
							<div>
								<span><label>Jam Tutup</label></span>
								<span><input name="toko[jamTutup]" type="text" class="textbox" value="<?php echo $toko['jamTutup'];?>"></span>
							</div>
							<div>
								<span><label>Hari Libur</label></span>
								<br/>pisahkan dengan koma (,)
								<span><input name="toko[libur]" type="text" class="textbox" value="<?php echo $toko['libur'];?>"></span>
							</div>
							<div>
								<span><label>Email</label></span>
								<span><input name="profile[email]" type="text" class="textbox" value="<?php echo $toko['email'];?>"></span>
							</div>
							<div>
								<span><label>Nomor Telepon</label></span>
								<span><input name="profile[telp]" type="text" class="textbox" value="<?php echo $toko['telp'];?>"></span>
							</div>
							<?php if(!empty($error))echo $error;?>
							<div>
							<span><input type="submit" class="" value="Simpan Data"></span>
							</div>
						</form>		
					</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div><!-- container -->
	<script type="text/javascript" src="js/fliplightbox.min.js"></script>
	<script type="text/javascript">$('body').flipLightBox()</script>
	<div class="clear"> </div>
</div>