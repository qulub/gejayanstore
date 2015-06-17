    <div id="wrapper">
        <?php $this->load->view('admin-gs-1/bases/navbar');?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Dashboard</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo site_url('admin/dashboard');?>">Dashboard</a>
                        </li>
                        <li class="active">index
                        </li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">

                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $konfirmasimenunggu->num_rows();?></div>
                                    <div>Konfirmasi Menunggu</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('admin/konfirmasi/menunggu');?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $tiketbelumterbaca; ?></div>
                                    <div>Tiket Belum Terbaca</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('admin/tiket');?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">

                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $totaltoko;?></div>
                                    <div>Toko Aktif</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('admin/penjual');?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">

                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $this->M_penjual->getAllPenjual('menunggu')->num_rows();?></div>
                                    <div>Pendaftar Menunggu</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('admin/penjual/menunggu');?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <!-- stats transaksi -->
                <div class="row">
                    <div ng-controller="ctrlStatsTransaksi" class="col-lg-12">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Transaksi Tahun 
                                <select ng-change="statsTransaksi()"  ng-model="selectTahunTransaksi" style="  background-color:transparent;">
                                    <option value="2014" style="background-color:gray">2014</option>
                                    <option value="2015" style="background-color:gray">2015</option>
                                    <option value="2016" style="background-color:gray">2016</option>
                                    <option value="2017" style="background-color:gray">2017</option>
                                </select>
                                {{loader}}</h3>
                            </div>
                            <div class="panel-body">
                                <div id="bar-transaksi"></div>
                            </div>
                        </div>
                    </div>
                     <div ng-controller="ctrlStatsKategori" class="col-lg-4">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Kategori Promo Terbanyak 
                                <select style="  background-color:transparent;">
                                    <option value="2015" style="background-color:gray">2015</option>
                                    <option value="2016" style="background-color:gray">2016</option>
                                    <option value="2017" style="background-color:gray">2017</option>
                                </select>
                                {{loaderkategori}}</h3>
                            </div>
                            <div class="panel-body">
                                <div id="donut-kategoripromo"></div>
                            </div>
                        </div>
                    </div>
                     <div ng-controller="ctrlStatsPromosi" class="col-lg-4">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Promo Terpopuler 
                                <select style="  background-color:transparent;">
                                    <option value="2015" style="background-color:gray">2015</option>
                                    <option value="2016" style="background-color:gray">2016</option>
                                    <option value="2017" style="background-color:gray">2017</option>
                                </select>
                                {{loaderpromo}}</h3>
                            </div>
                            <div class="panel-body">
                                <div id="donut-favoritpromo"></div>
                            </div>
                        </div>
                    </div>
                    <div ng-controller="ctrlStatsToko" class="col-lg-4">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Toko Banyak Tanya 
                                <select style="  background-color:transparent;">
                                    <option value="2015" style="background-color:gray">2015</option>
                                    <option value="2016" style="background-color:gray">2016</option>
                                    <option value="2017" style="background-color:gray">2017</option>
                                </select>
                                {{loadertoko}}</h3>
                            </div>
                            <div class="panel-body">
                                <div id="donut-favorittoko"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url('adminresource');?>/bower_components/raphael/raphael-min.js"></script>
    <script src="<?php echo base_url('adminresource');?>/bower_components/morrisjs/morris.min.js"></script>
    <script src="<?php echo base_url('adminresource');?>/js/morris-data.js"></script>
    <!-- ANGULAR -->
    <!-- TRANSAKSI STATS -->
    <script>
      app.controller('ctrlStatsTransaksi', ['$scope','$http',
        function($scope,$http){
            //stats transaksi
            $scope.loader= 'loading data...';
            //MENDAPATKAN DATA TRANSAKSI PERTAHUN
            var year = '<?php echo date("Y");?>';
            $scope.selectTahunTransaksi = year;//get default select
            //GET JSON DATA
            var statsTransaksi = $http.get('<?php echo site_url("ajax/totalTransaksi?tahun=");?>'+year);
            statsTransaksi.success(function(response)
            {
                $scope.loader= '';
                 // CHARTS
                 Morris.Bar({
                  element: 'bar-transaksi',
                  data: response,
                  xkey: 'bln',
                  ykeys: ['biaya','transaksi'],
                  labels: ['Transaksi (Rp)','Total']
              });
                // END OF CHARTS
            });
            statsTransaksi.error(function(response)
            {
                $scope.loader= '';
                alert('data transaksi bermasalah');
            });
            //end of stats transaksi
            //statsTransaksi()
            $scope.statsTransaksi = function()
            {
                $scope.loader= 'loading data...';
                $('#bar-transaksi').html('');
                //GET JSON DATA
                var statsTransaksi = $http.get('<?php echo site_url("ajax/totalTransaksi?tahun=");?>'+$scope.selectTahunTransaksi);
                statsTransaksi.success(function(response)
                {
                    $scope.loader= '';
                     // CHARTS
                     Morris.Bar({
                      element: 'bar-transaksi',
                      data: response,
                      xkey: 'bln',
                      ykeys: ['biaya','transaksi'],
                      labels: ['Transaksi (Rp)','Total']
                  });
                    // END OF CHARTS
                });
                statsTransaksi.error(function(response)
                {
                    $scope.loader= '';
                    alert('data transaksi bermasalah');
                });
            }
        }]);
  </script>
  <!-- KATEGORI STATS -->
  <script>
      app.controller('ctrlStatsKategori', ['$scope','$http',
        function($scope,$http){
               // start kategori promo
                $scope.loaderkategori= 'loading data...';
                //MENDAPATKAN DATA TRANSAKSI PERTAHUN
                //GET JSON DATA
                var statsKatPromo = $http.get('<?php echo site_url("ajax/statsKategoriPromo");?>');
                statsKatPromo.success(function(response)
                {
                    $scope.loaderkategori= '';
                    Morris.Donut({
                      element: 'donut-kategoripromo',
                      data: response,
                    });
                });
                statsKatPromo.error(function(response)
                {
                    $scope.loaderkategori= '';
                    alert('data kategori promo bermasalah');
                });
                // end of kategori promo     
        }]);
    </script>
    <!-- PROMO STATS -->
  <script>
      app.controller('ctrlStatsPromosi', ['$scope','$http',
        function($scope,$http){
             // start promo
            $scope.loaderpromo= 'loading data...';
            //MENDAPATKAN DATA TRANSAKSI PERTAHUN
            //GET JSON DATA
            var statsKatPromo = $http.get('<?php echo site_url("ajax/statsFavoritPromo");?>');
            statsKatPromo.success(function(response)
            {
                $scope.loaderpromo= '';
                Morris.Donut({
                  element: 'donut-favoritpromo',
                  data: response,
                });
            });
            statsKatPromo.error(function(response)
            {
                $scope.loaderpromo= '';
                alert('data kategori promo bermasalah');
            });
            // end of promo      
        }]);
    </script>
     <!-- TOKO STATS -->
  <script>
      app.controller('ctrlStatsToko', ['$scope','$http',
        function($scope,$http){
             // start promo
            $scope.loadertoko= 'loading data...';
            //MENDAPATKAN DATA TRANSAKSI PERTAHUN
            //GET JSON DATA
            var statsKatPromo = $http.get('<?php echo site_url("ajax/statsToko");?>');
            statsKatPromo.success(function(response)
            {
                $scope.loadertoko= '';
                Morris.Donut({
                  element: 'donut-favorittoko',
                  data: response,
                });
            });
            statsKatPromo.error(function(response)
            {
                $scope.loadertoko= '';
                alert('data kategori promo bermasalah');
            });
            // end of promo      
        }]);
    </script>