<div class="full-width">
	<div class="login-form">
		<form action="" method="POST">
			<h1>login sebagai penjual/pelanggan</h1>
			<label><input name="login[email]" type="text" placeholder="masukan email anda"></label>
			<label><input name="login[password]" type="password" placeholder="masukan password anda"></label>
			<?php
			if(!empty($error))echo $error;
			?>
			<label><input type="submit" class="tambahtoko" style="float:left" value="login"></label>
			<p>Belum terdaftar <a href="<?php echo site_url('register/toko');?>">Daftar</a> </p> 
		</form>
	</div>
</div>