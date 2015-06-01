<style type="text/css">
	td{padding:10px;}
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
						<h1>Konfirmasi <?php if(!empty($view))echo '('.$view->num_rows().')';?></h1>
						<br/>
						<ul class="vertical-menu">
							<!-- <li id="baru"><a href="<?php echo site_url('dashboard/konfirmasi/baru');?>">+ Konfirmasi Baru</a></li> -->
							<a id="riwayat" href="<?php echo site_url('dashboard/konfirmasi/riwayat');?>">Riwayat Konfirmasi</a>
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

						case 'riwayat':?>
						<br/><br/>
						<table style="width:100%">
						<tr style="border-bottom:1px solid lightgray;height:30px">
							<th>Id Transaksi</th>
							<th>Tgl Konfirmasi</th>
							<th>Pengirim</th>
							<th>Tujuan Bank</th>
							<th>Jumlah (Rp)</th>
							<th style="width:300px">Balasan</th>
						</tr>
						<?php foreach($view->result_array() as $v):?>
							<tr>
							<td><?php echo $v['idTransaksi']?></td>
							<td><?php echo $v['tglKonfirmasi']?></td>
							<td>Bank <?php echo $v['dariBank']?> NoRek <?php echo $v['noRekening']?> a/n <?php echo $v['nama']?></td>
							<td><?php echo $v['tujuanBank']?></td>
							<td><?php echo number_format($v['jumlahTransfer'])?></td>
							<td style="width:300px">
								<?php 
								if(empty($v['balasan'])){echo 'Belum ada balasan dari admin';}
								else{echo $v['balasan'];}
								?>
							</td>
						</tr>
						<?php endforeach;?>
						</table>
							<?php break;
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