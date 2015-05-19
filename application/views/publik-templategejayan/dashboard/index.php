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
						<h2>Contact Us</h2>
						<form method="post" action="contact-post.html">
							<div>
								<span><label>Name</label></span>
								<span><input name="userName" type="text" class="textbox"></span>
							</div>
							<div>
								<span><label>E-mail</label></span>
								<span><input name="userEmail" type="text" class="textbox"></span>
							</div>
							<div>
								<span><label>Mobile</label></span>
								<span><input name="userPhone" type="text" class="textbox"></span>
							</div>
							<div>
								<span><label>Subject</label></span>
								<span><textarea name="userMsg"> </textarea></span>
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