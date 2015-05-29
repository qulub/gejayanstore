<div class="container">
<div class="login-form col-md-4 col-md-offset-4">
<center>
<h1>Admin Login</h1>
<span>pastikan mengganti password secara berkala</span>
<form class="form" method="POST" action="<?php echo site_url('admin');?>" role="form">
	<div class="form-group">
		<input class="form-control" type="text" name="inputusername" placeholder="masukan username">		
		<br/>
		<input class="form-control" type="password" name="inputpassword" placeholder="masukan password">		
		<?php if(!empty($error)):?>
		<br/><div class="alert alert-danger"><?php echo $error;?></div>
		<?php endif;?>
		<small><a href="#">lupa password</a></small>
		<br/>
		<button type="submit" class="btn btn-default">login</button>
	</div>
</form>
</center>
</div>
</div>