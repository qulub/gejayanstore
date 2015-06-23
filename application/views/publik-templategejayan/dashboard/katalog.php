<style type="text/css">
	td{padding-right:5px;text-align:left;}
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
						<?php
						if(!empty($error))echo '<div style="padding:10px" class="error">'.$error.'<a style="float:right;color:#FFF" href="'.site_url('dashboard/katalog').'">tutup (X)</a></div>';
						if(!empty($success))echo '<div style="padding:10px" class="success">'.$success.'<a style="float:right;color:#FFF" href="'.site_url('dashboard/katalog').'">tutup (X)</a></div>';
						?>
						<form enctype="multipart/form-data" class="" action="<?php echo site_url('dashboard/uploadkatalog')?>" method="post">
							<input type="hidden" name="idtoko" value="<?php echo $idToko;?>">
							<input type="file" name="katalog" value="" ng-file-select="onFileSelect($file)" required>
							<span><input type="submit" class="" value="+ Upload Katalog"></span>
						</form>
						<hr/>
						<h3 style="font-size:20px">Daftar Katalog</h3>
						<br/>
						<span ng-controller="katalogCtrl">
							<!-- katalog list -->
							<a title="klik untuk perbesar" ng-repeat="list in lists">
								<div class="katalog-list" style="background:url('{{list.url}}');background-size: contain;background-position: center;background-repeat: no-repeat;">
									<span ng-click="hapusKatalog(list.id)" class="katalog-hapus" title="hapus">X</span>
									<span ng-click="viewKatalog(list.url)" class="katalog-hapus" style="background-color:rgb(60, 195, 149)" title="full image" href="#">lihat</span>
								</div>
							</a>
							<!-- end of katalog list -->
						</span>
					</div>
				</div>
			</div>
		</div>
	</div><!-- container -->
	<div class="clear"> </div>
</div>
<br/>
<script charset="utf-8">
	app.controller('katalogCtrl',['$scope','$http','$window',function($scope,$http,$window){
		//load katalog
		//get json list of catalog barang
		url = '<?php echo site_url("ajax/getKatalog");?>';
		var request = $http({
			method: "post",
			url: url,
			data: {
				idToko:'<?php echo $idToko;?>',
			},
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		});
		// // Store the data-dump of the FORM scope.
		request.success(
			function(response) {
						if(response.length == 0)//belum upload katalog
						{
							$scope.lists = null;//get json data of catalog list
							alert('belum upload katalog');
						}else//sudah upload katalog
						{
							$scope.lists = response;//get json data of catalog list
						}
					}
					);
		request.error(
			function(response){
				alert('gagal ambil data katalog');
			}
			);
		//end of load katalog
		// HAPUS KATALOG
		$scope.hapusKatalog = function(id)
		{
			var konfirm = confirm('yakin !');
			if(konfirm == true)
			{
				$window.location= '<?php echo site_url("dashboard/deletekatalog?id=")?>'+id;
			}
		};
		//VIEW KATALOG
		$scope.viewKatalog = function(url)
		{
			$window.open(url, '_blank');
		};
	}]);
</script>
