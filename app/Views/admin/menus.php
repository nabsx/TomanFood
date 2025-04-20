<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">
        Manajemen Menu
        <?php if(isset($restaurant)): ?>
        - <?= $restaurant['name'] ?>
        <?php endif; ?>
    </h1>
    
    <?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
    <?php endif; ?>
    
    <?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
    <?php endif; ?>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Menu</h6>
            <div>
                <?php if(isset($restaurant)): ?>
                <a href="<?= site_url('admin/restaurants') ?>" class="btn btn-secondary btn-sm mr-2">
                    <i class="fas fa-arrow-left fa-sm"></i> Kembali
                </a>
                <?php endif; ?>
                
                <a href="<?= site_url('admin/add-menu') ?>" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus fa-sm"></i> Tambah Menu
                </a>
            </div>
        </div>
        <div class="card-body">
            <?php if(!isset($restaurant)): ?>
            <div class="form-group">
                <label for="restaurant_filter">Filter Restoran:</label>
                <select class="form-control" id="restaurant_filter" onchange="filterByRestaurant()">
                    <option value="">Semua Restoran</option>
                    <?php foreach($restaurants as $rest): ?>
                    <option value="<?= $rest['id'] ?>"><?= $rest['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <?php endif; ?>
            
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <?php if(!isset($restaurant)): ?>
                            <th>Restoran</th>
                            <?php endif; ?>
                            <th>Nama Menu</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Tanggal Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($menus as $menu): ?>
                        <tr>
                            <td><?= $menu['id'] ?></td>
                            <?php if(!isset($restaurant)): ?>
                            <td><?= $menu['restaurant_name'] ?? '' ?></td>
                            <?php endif; ?>
                            <td><?= $menu['name'] ?></td>
                            <td><?= substr($menu['description'], 0, 100) ?><?= (strlen($menu['description']) > 100) ? '...' : '' ?></td>
                            <td>Rp. <?= number_format($menu['price'], 0, ',', '.') ?></td>
                            <td><?= $menu['created_at'] ?></td>
                            <td>
                                <a href="<?= site_url('admin/edit-menu/'.$menu['id']) ?>" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit fa-sm"></i> Edit
                                </a>
                                <a href="<?= site_url('admin/delete-menu/'.$menu['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus menu ini?')">
                                    <i class="fas fa-trash fa-sm"></i> Hapus
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
function filterByRestaurant() {
    const restaurantId = document.getElementById('restaurant_filter').value;
    if (restaurantId) {
        window.location.href = '<?= site_url('admin/menus/') ?>' + restaurantId;
    } else {
        window.location.href = '<?= site_url('admin/menus') ?>';
    }
}
</script>
<?= $this->endSection() ?>