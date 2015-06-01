<!-- produk terbaru -->
<div class="main_bg1">
    <div class="wrap">
        <div class="main1">
            <h2>Order</h2>
        </div>
    </div>
</div>
<!-- start main -->
<div ng-app="transaksi" ng-controller="order" class="main_bg">
    <div class="wrap">
        <div class="main">
            <!-- start grids_of_3 -->
            <form method="POST" action="<?php echo site_url('transaksi/process');?>">
            <div class="grids_of_3">
                <div style="height:120px" class="list-item grid1_of_3">
                <span style="padding:10px">
                <p>Tambah Masa Aktif dan Slot Promo</p><br/>
                <p style="padding-left:10px;padding-bottom:5px;text-align:left">Tambah Massa Toko <input name="tambahmasa" ng-model="TambahMasa" style="width:50px" type="number" min="1" required> bulan, Rp 100.000,-/bulan</p>   
                <p style="padding-left:10px;text-align:left">Tambah Slot Promo <input name="tambahslot" ng-model="TambahSlot" style="width:50px" min="0" max="100" type="number" required> Rp 20.000,-/slot </p>  
                </span>
                </div>
                <div style="height:120px" class="list-item grid1_of_3">
                <span style="padding:10px">
                <p>Data Sebelumnya : </p><br/>
                <p style="padding-left:10px;text-align:left">Habis Masa Toko : {{HabisSekarang | date:'yyyy-MM-dd'}} </p>    
                <p style="padding-left:10px;text-align:left">Slot Promo : {{SlotSekarang}} </p>        
                </span>
                </div>
                  <div style="height:120px" class="list-item grid1_of_3">
                <span style="padding:10px">
                <p>Data Baru : </p><br/>
                <p style="padding-left:10px;text-align:left">Habis Masa Toko : {{TambahMasa}} bulan </p>    
                <p style="padding-left:10px;text-align:left">Slot Promo : {{SlotSekarang + TambahSlot | number}} </p>    
                </span>
                </div>
            </div>
            <!-- end grids_of_3 -->
        </div>
    </div>
    <div class="wrap">
        <button class="clearButton" type="submit"><div class="price"><h4><span>Total Bayar <strong style="color:#fff" ng-model="TotalBayar">{{0 + (TambahSlot*20000) + (TambahMasa*100000)| currency:"Rp"}}</strong> : klik untuk melakukan transaksi</span></h4></div></button>
    </div>
    </form>
</div>
<!-- end of produk terbaru -->
<script type="text/javascript">
    var app = angular.module('transaksi',['ngRoute']);
    app.controller('order',['$scope',function($scope){
        $scope.TambahMasa = 1;
        $scope.TambahSlot = 3;
        $scope.SlotSekarang = '<?php echo $toko["maxPromo"]?>';
        $scope.HabisSekarang = '<?php if($toko["habisMasa"] == "0000-00-00 00:00:00"){echo date("d-m-Y");}else {echo date("d-m-Y", strtotime($toko["habisMasa"]));}?>';
    }]);
</script>