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
						<h2>Update Profile</h2>
						<br/>
						<p>Terdaftar Sejak : <?php echo date('d-m-Y H:i:s',strtotime($user['tglRegister']));?></p>
						<p>Terahir Login : <?php echo date('d-m-Y H:i:s',strtotime($user['lastLogin']));?></p>
						<p>Status : <?php echo $user['status'];?></p>
						<br/>
						<form method="post" action="">
							<div>
								<span><label>Nama Lengkap</label></span>
								<span><input name="profile[name]" type="text" class="textbox" value="<?php echo $user['namaPemilik'];?>"></span>
							</div>
							<div>
								<span><label>No Telp</label></span>
								<span><input name="profile[phone]" type="text" class="textbox" value="<?php echo $user['telp'];?>"></span>
							</div>
							<div>
								<span><label>Email</label></span>
								<span><input name="profile[email]" type="text" class="textbox" value="<?php echo $user['email'];?>"></span>
							</div>
							<div>
								<span><label>Username</label></span>
								<span><input name="profile[userame]" type="text" class="textbox" value="<?php echo $user['userName'];?>"></span>
							</div>
							<hr/>
							<p>kosongkan jika tidak ingin merubah password</p>
							<div>
								<span><label>password baru</label></span>
								<span><input name="password[newpassword]" type="password" class="textbox"></span>
							</div>
							<div>
								<span><label>ulangi password baru</label></span>
								<span><input name="password[confirmpassword]" type="password" class="textbox"></span>
							</div>
							<hr/>
							<div>
								<span><label>Masukan password untuk simpan perubahan</label></span>
								<span><input name="profile[password]" type="password" class="textbox"></span>
							</div>
							<div>
							<span><input type="submit" class="" value="Simpan Data"></span>
							</div>
						</form>		
					</div>
				</div>
			</div>
		</div>
	</div><!-- container -->
	<script type="text/javascript" src="js/fliplightbox.min.js"></script>
	<script type="text/javascript">$('body').flipLightBox()</script>
	<div class="clear"> </div>
</div>