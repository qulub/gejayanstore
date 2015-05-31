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
						<h1>Konfirmasi</h1>
						<br/>
						<ul class="vertical-menu">
							<!-- <li id="baru"><a href="<?php echo site_url('dashboard/konfirmasi/baru');?>">+ Konfirmasi Baru</a></li> -->
							<li id="riwayat"><a href="<?php echo site_url('dashboard/konfirmasi/riwayat');?>">Riwayat Konfirmasi</a></li>
						</ul>
					</div>
					<div class="contact-form">
					<?php 
					switch ($this->uri->segment(3)) {
						case 'baru':?>
							<br/><br/>
							<form name="myForm" method="post" action="<?php echo site_url('dashboard/konfirmasi?act=add')?>" enctype="multipart/form-data">
							<div>
								<span><label>Id Transaksi</label></span>
								<span><input name="konfirmasi[idTransaksi]" type="text" class="textbox" value="<?php if(!empty($_GET['id']))echo $_GET['id'];?>" required></span>
							</div>
							<div>
								<span><label>Nama Pengirim</label></span>
								<span><input name="konfirmasi[nama]" type="text" class="textbox" value="" required></span>
							</div>
							<div>
								<span><label>Bank Asal</label></span>
								<span><input name="konfirmasi[asal]" type="text" class="textbox" value="" required></span>
							</div>
							<div>
								<span><label>Bank Tujuan</label></span>
								<span>
									<select name="konfirmasi['tujuan']" required>
										<option value="">pilih bank tujuan</option>
										<option value="BRI">BRI No Rek 1234 A.N Mudawil Kulur</option>
										<option value="Mandiri">Mandiri No Rek 1234 A.N Mudawil Kulur</option>
										<option value="BCA">BCA No Rek 1234 A.N Mudawil Kulur</option>
									</select>
								</span>
							</div>
							<div>
								<span><label>No Rekening</label></span>
								<span><input name="konfirmasi[norek]" type="text" class="textbox" value="" required></span>
							</div>
							<div>
								<span><label>Jumlah Transfer</label></span>
								<span><input name="konfirmasi[jumlah]" min="0" type="number" class="textbox" value="" required></span>
							</div>
							<span><input type="submit" class="" value="Simpan Data"></span>
							<?php break;

						case 'riwayat':
							# code...
							break;
					}
					?>
					</div>
				</div>
			</div>
		</div>
	</div><!-- container -->
	<script type="text/javascript" src="js/fliplightbox.min.js"></script>
	<script type="text/javascript">$('body').flipLightBox()</script>
	<div class="clear"> </div>
</div>