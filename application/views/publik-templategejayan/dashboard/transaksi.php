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
						<h1><?php echo $title;?></h1>
						<br/>
						<ul class="vertical-menu">
							<li id="baru"><a href="<?php echo site_url('dashboard/konfirmasi/baru');?>">+ Transaksi Baru</a></li>
							<li id="riwayat"><a href="<?php echo site_url('dashboard/konfirmasi/riwayat');?>">Riwayat Transaksi</a></li>
						</ul>
					</div>
					<div class="contact-form">
					<?php 
					switch ($this->uri->segment(3)) {
						case 'baru':
							# code...
							break;

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