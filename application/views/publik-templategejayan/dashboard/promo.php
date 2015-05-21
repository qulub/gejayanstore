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
						<h2>Promo</h2>
						<br/>
						<ul class="vertical-menu">
							<li id=""><a href="<?php echo site_url('dashboard/promo/baru');?>">+ Tambah Promo</a></li>
							<li id="aktif"><a href="<?php echo site_url('dashboard/promo/aktif');?>">Promo Aktif</a></li>
							<li id="banned"><a href="<?php echo site_url('dashboard/promo/banned');?>">Promo Banned</a></li>
							<li id="habis"><a href="<?php echo site_url('dashboard/promo/habis');?>">Promo Habis</a></li>
						</ul>
						<br/>
						<?php if(empty($toko)){?>
						
						<?php }else{?>
						<a href="#">lihat toko</a>
						..
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