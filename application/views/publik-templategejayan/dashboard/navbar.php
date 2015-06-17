<?php 
$idpemilik = $this->session->userdata('admintoko')['idPemilik'];
$masaAktif = $this->M_toko->masaAktif($idpemilik);
if($masaAktif >= 0): ?>
<ul id="filters" class="clearfix">
	<li><span id="dashboard" class="filter" data-filter="app card icon logo web"><a href="<?php echo site_url('dashboard')?>">Dashboard</a></span></li>
	<li><span id="promo" class="filter" data-filter="app card web"><a href="<?php echo site_url('dashboard/promo')?>">Promo</a></span></li>
	<li><span id="katalog" class="filter" data-filter="app card web"><a href="<?php echo site_url('dashboard/katalog')?>">Katalog</a></span></li>
	<li><span id="toko" class="filter" data-filter="icon web card"><a href="<?php echo site_url('dashboard/toko')?>">Data Toko</a></span></li>
	<li><span id="profil" class="filter" data-filter="web app icon card"><a href="<?php echo site_url('dashboard/profil')?>">Data Profil</a></span></li>
	<li><span id="transaksi" class="filter" data-filter="icon app web logo"><a href="<?php echo site_url('dashboard/transaksi')?>">Transaksi</a></span></li>
	<li><span id="konfirmasi" class="filter" data-filter="icon app web logo"><a href="<?php echo site_url('dashboard/konfirmasi')?>">Konfirmasi</a></span></li>
    <li><span id="tiket" class="filter {{ticketClass}}" data-filter="icon app web logo"><a href="<?php echo site_url('dashboard/tiket')?>">Tiket <small>1</small>  </a></span></li>
</ul>
<hr/>
<?php else:?>
<ul id="filters" class="clearfix">
	<li><span id="dashboard" class="filter" data-filter="app card icon logo web"><a href="<?php echo site_url('dashboard')?>">Dashboard</a></span></li>
	<li><span id="promo" class="filter" data-filter="app card web"><a onclick="goHell()" href="#">Promo</a></span></li>
	<li><span id="katalog" class="filter" data-filter="app card web"><a onclick="goHell()" href="#">Katalog</a></span></li>
	<li><span id="toko" class="filter" data-filter="icon web card"><a href="<?php echo site_url('dashboard/toko')?>">Data Toko</a></span></li>
	<li><span id="profil" class="filter" data-filter="web app icon card"><a href="<?php echo site_url('dashboard/profil')?>">Data Profil</a></span></li>
	<li><span id="transaksi" class="filter" data-filter="icon app web logo"><a href="<?php echo site_url('dashboard/transaksi')?>">Transaksi</a></span></li>
	<li><span id="konfirmasi" class="filter" data-filter="icon app web logo"><a href="<?php echo site_url('dashboard/konfirmasi')?>">Konfirmasi</a></span></li>
    <li><span id="tiket" class="filter {{ticketClass}}" data-filter="icon app web logo"><a href="<?php echo site_url('dashboard/tiket')?>">Tiket <small>1</small>  </a></span></li>
</ul>
<hr/>
<script type="text/javascript">
	function goHell()
	{
		alert('Silahkan Perpanjang Masa Aktif Anda Untuk Kembali Menggunakan Fitur Ini');
	}
</script>
<?php endif;?>
