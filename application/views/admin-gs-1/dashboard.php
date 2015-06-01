    <div id="wrapper">
        <?php $this->load->view('admin-gs-1/bases/navbar');?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
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
                                    <div class="huge"><?php echo $transaksimenunggu->num_rows();?></div>
                                    <div>Transaksi Menunggu</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('admin/transaksi');?>">
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
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->