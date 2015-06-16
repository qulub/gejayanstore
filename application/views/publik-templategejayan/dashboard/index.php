<style type="text/css">
	td{padding-right:5px;}
</style>
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
						<?php 
						// print_r($toko);
						if($toko['maxPromo'] <= 0){
							echo '<div style="padding:10px" class="error">Untuk aktifasi toko dan bisa menggunakan fitur Gejayan Store, silahkan melakukan pembayaran terlebih dahulu <strong><a href="'.site_url('transaksi/order').'">masuk ke pembayaran</a></strong></div>';
						}else{
						?>
						<table class="dashboard-grid">
							<tr>
								<td><h3>Total Views : <?php echo $totalviews; ?></h3></td>
								<td><h3>Sisa Slot : <?php echo $sisa; ?></h3></td>
								<td><h3>Berlaku Sampai : <?php echo date('d-m-Y', strtotime($toko['habisMasa'])); ?></h3></td>
							</tr>
						</table>
						<br/>
						<!-- start berita -->
						<h3 style="font-size:20px">Berita Terbaru <a href="<?php echo site_url('berita')?>">tampilkan semua berita</a></h3><br/>
						<div style="margin:10px 0" class="grids_of_3">
							<?php foreach($berita as $b):?>
								<div class="dashboard-list-item grid1_of_3">
									<a href="<?php echo site_url('berita/baca/'.$b['idBerita'].'/'.str_replace(' ', '-', $b['judulBerita']))?>">
										<h3><?php echo $b['judulBerita'];?></h3>
										<span class="b_btm"></span>
									</a>
								</div>
							<?php endforeach; ?>
							<div class="clear"></div>
						</div>
						<!-- end of berita -->
						<br/><br/><br/>
						<h3 style="font-size:20px">Promo Terpopuler <a href="<?php echo site_url('dashboard/promo')?>">tampilkan semua promo</a></h3><br/>
						<!-- item -->
						<div style="margin-top:10px 0" class="grids_of_3">
							<?php foreach($popular as $p):?>
								<div class="dashboard-list-item grid1_of_3">
									<a href="...">
										<h3><?php echo $p['Judul'];?></h3>
										<table>
											<tr>
												<center>
													<td>Views <?php echo $p['views'];?></td>
													<td><?php echo $p['status'];?></td>
													<td><a href="<?php echo site_url('dashboard/promoaction?act=edit&id='.$p['idItem'])?>">ubah </a></td>
													<td><a onclick="return confirm('yakinkan dulu !')" href="<?php echo site_url('dashboard/promoaction?act=hapus&id='.$p['idItem'])?>">hapus </a></td>
												</center>
											</tr>
										</table>
										<span class="b_btm"></span>
									</a>
								</div>
							<?php endforeach; ?>
							<div class="clear"></div>
						</div>
						<!-- end of item -->
						<?php } ?>
					</div>
					<br/>					
				</div>
			</div>
		</div>
	</div><!-- container -->
	<script type="text/javascript" src="js/fliplightbox.min.js"></script>
	<script type="text/javascript">$('body').flipLightBox()</script>
	<div class="clear"> </div>
</div>