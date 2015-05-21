<style type="text/css">
	td{padding-right:10px;}
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
						<h2>Total Views : <?php echo $totalviews; ?></h2>
						<br/>
						<h2>Promo Terpopuler</h2>
						<!-- item -->
						<div class="grids_of_3">
							<?php foreach($popular as $p):?>
								<div class="list-item grid1_of_3">
									<a href="...">
										<h3><?php echo $p['Judul'];?></h3>
										<table>
											<tr>
												<center>
													<td>Views <?php echo $p['views'];?></td>
													<td><?php echo $p['status'];?></td>
													<td><a href="#">ubah </a></td>
													<td><a onclick="return confirm('yakinkan dulu !')" href="#">hapus </a></td>
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
						<a href="<?php echo site_url('dashboard/promo')?>">tampilkan semua promo</a>
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