<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
    
    <!-- Stats Cards -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Pesanan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalOrders ?? 0 ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Pendapatan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?= number_format($totalRevenue ?? 0, 0, ',', '.') ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total Restoran</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalRestaurants ?? 0 ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-store fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Rating Rata-rata</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($avgRating ?? 0, 1) ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-star fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Content Row -->
    <div class="row">
        <!-- Recent Orders -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Pesanan Terbaru</h6>
                    <a href="<?= site_url('admin/orders') ?>" class="btn btn-primary btn-sm">Lihat Semua</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Restoran</th>
                                    <th>Total</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($recentOrders) && count($recentOrders) > 0): ?>
                                    <?php foreach($recentOrders as $order): ?>
                                    <tr>
                                        <td>#<?= $order['id'] ?></td>
                                        <td><?= $order['restaurant_id'] ?? 'N/A' ?></td>
                                        <td>Rp. <?= number_format($order['total'] ?? 0, 0, ',', '.') ?></td>
                                        <td><?= $order['created_at'] ?></td>
                                        <td>
                                            <a href="<?= site_url('admin/order-detail/'.$order['id']) ?>" class="btn btn-info btn-sm">
                                                <i class="fas fa-eye fa-sm"></i> Detail
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center">Belum ada pesanan</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Restaurant List -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Restoran</h6>
                    <a href="<?= site_url('admin/restaurants') ?>" class="btn btn-primary btn-sm">Lihat Semua</a>
                </div>
                <div class="card-body">
                    <?php if(isset($restaurants) && count($restaurants) > 0): ?>
                        <?php foreach($restaurants as $restaurant): ?>
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <h5 class="mb-1"><?= $restaurant['name'] ?></h5>
                                <div class="text-xs text-warning">
                                    <?php for($i = 0; $i < 5; $i++): ?>
                                        <?php if($i < floor($restaurant['rating'])): ?>
                                            <i class="fas fa-star"></i>
                                        <?php elseif($i < $restaurant['rating']): ?>
                                            <i class="fas fa-star-half-alt"></i>
                                        <?php else: ?>
                                            <i class="far fa-star"></i>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                    (<?= number_format($restaurant['rating'], 1) ?>)
                                </div>
                            </div>
                            <a href="<?= site_url('admin/menus/'.$restaurant['id']) ?>" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-utensils fa-sm"></i> Menu
                            </a>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-center">Belum ada restoran</p>
                    <?php endif; ?>
                    
                    <div class="text-center mt-3">
                        <a href="<?= site_url('admin/add-restaurant') ?>" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus fa-sm"></i> Tambah Restoran
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>