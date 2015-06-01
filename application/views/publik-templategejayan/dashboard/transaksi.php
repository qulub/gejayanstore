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
						<h1><?php echo $title;?> (<?php echo $transaksi->num_rows();?>)</h1>
						<br/>
						<ul class="vertical-menu">
							<a id="baru" href="<?php echo site_url('transaksi/order');?>">+ Transaksi Baru</a> | 
							<a id="riwayat" href="<?php echo site_url('dashboard/transaksi/riwayat');?>">Riwayat Transaksi</a>
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
						<?php if($transaksi->num_rows() <= 0){echo 'Transaksi Tidak Ditemukan';}
						else {?>
						<br/><br/>
							<table style="width:100%">
								<tr style="border-bottom:1px solid lightgray;height:30px">
									<th>Id Transaksi</th>
									<th>Tgl Transaksi</th>
									<th>Tambah Slot</th>
									<th>Tambah Masa (bulan)</th>
									<th>Total (Rp)</th>
									<th style="width:300px">Status</th>
								</tr>
								<?php foreach($transaksi->result_array() as $t):?>
								<tr>
									<td><?php echo $t['idTransaksi'];?></td>
									<td><?php echo $t['tglTransaksi'];?></td>
									<td><?php echo $t['tambahSlot'];?></td>
									<td><?php echo $t['tambahMasa'];?></td>
									<td><?php echo number_format($t['biaya']);?></td>
									<td><?php 
									$status = $t['status'];
									if($status == 'menunggu'){
										echo '<p>menunggu, untuk aktivasi penambahan silahkan melakukan konfirmasi <a href="'.site_url('dashboard/konfirmasi/baru?id='.$t['idTransaksi']).'">disini</a>. Jika dalam waktu 24 jam tidak ditemukan konfirmasi atas transaksi ini, maka secra otomatis transaksi dihapus.</p>';
									} else {echo $status;}
									?></td>
								</tr>
							<?php endforeach;?>
							</table>
							<?php } ?>
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