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
						<h2><?php echo $title;?></h2>
						<br/>
						<ul class="vertical-menu">
							<li id="baru"><a href="<?php echo site_url('dashboard/promo/baru');?>">+ Tambah Promo</a></li>
							<li id="aktif"><a href="<?php echo site_url('dashboard/promo/aktif');?>">Promo Aktif</a></li>
							<li id="banned"><a href="<?php echo site_url('dashboard/promo/banned');?>">Promo Banned</a></li>
							<li id="habis"><a href="<?php echo site_url('dashboard/promo/habis');?>">Promo Habis</a></li>
						</ul>
						<br/>
						<!-- item -->
						<div class="grids_of_3">
							<?php if(empty($view))echo '<center>promo tidak ditemukan</center>';?>
							<?php foreach($view as $p):?>
								<div class="list-item grid1_of_3">
									<a href="...">
										<h3><?php echo $p['Judul'];?></h3>
										<table>
											<tr>
													<td>Views <?php echo $p['views'];?></td>
													<td><?php echo $p['status'];?></td>
													<td><a href="#">ubah </a></td>
													<td><a onclick="return confirm('yakinkan dulu !')" href="#">hapus </a></td>
											</tr>
											<tr>
													<td style="padding-left:5px" colspan="3">Habis <?php echo date('d-m-Y H:i:s',strtotime($p['habisPromo']));?></td>
													<td></td>
											</tr>
										</table>
										<span class="b_btm"></span>
									</a>
								</div>
							<?php endforeach; ?>
							<div class="clear"></div>
						</div>
						<!-- end of item -->
					</div>
				</div>
			</div>
		</div>
	</div><!-- container -->
	<script type="text/javascript" src="js/fliplightbox.min.js"></script>
	<script type="text/javascript">$('body').flipLightBox()</script>
	<div class="clear"> </div>
</div>