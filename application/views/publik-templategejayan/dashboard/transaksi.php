<?php 
if(!empty($script))echo '<script>$(document).ready(function(){'.$script.'});</script>';
?>
<style type="text/css">
	td{padding:10px;}
</style>
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
					if(!empty($_GET['success']))echo "<div style='padding:10px' class='success'>".$_GET['success']." <a href='".site_url('dashboard/transaksi')."'>X</a></div>";
					?>
					<?php 
					switch ($this->uri->segment(3)) {
						case 'baru':
							# code...
							break;

						case 'riwayat':?>
						<br/><br/>
							<table style="width:100%">
								<tr style="border-bottom:1px solid lightgray;height:30px">
									<th>Id Transaksi</th>
									<th>Tgl Transaksi</th>
									<th>Tambah Slot</th>
									<th>Tambah Masa</th>
									<th>Total</th>
									<th>Status</th>
								</tr>
								<tr>
									<td>323222-2</td>
									<td>...</td>
									<td>...</td>
									<td>...</td>
									<td>...</td>
									<td>...</td>
								</tr>
							</table>
							<?php break;
					}
					?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="clear"> </div>
</div>