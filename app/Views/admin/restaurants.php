<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Manajemen Restoran</h1>
    
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
            <h6 class="m-0 font-weight-bold text-primary">Daftar Restoran</h6>
            <a href="<?= site_url('admin/add-restaurant') ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-plus fa-sm"></i> Tambah Restoran
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Rating</th>
                            <th>Tanggal Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($restaurants as $restaurant): ?>
                        <tr>
                            <td><?= $restaurant['id'] ?></td>
                            <td><?= $restaurant['name'] ?></td>
                            <td><?= substr($restaurant['description'], 0, 100) ?><?= (strlen($restaurant['description']) > 100) ? '...' : '' ?></td>
                            <td><?= $restaurant['rating'] ?></td>
                            <td><?= $restaurant['created_at'] ?></td>
                            <td>
                                <a href="<?= site_url('admin/menus/'.$restaurant['id']) ?>" class="btn btn-info btn-sm">
                                    <i class="fas fa-utensils fa-sm"></i> Menu
                                </a>
                                <a href="<?= site_url('admin/edit-restaurant/'.$restaurant['id']) ?>" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit fa-sm"></i> Edit
                                </a>
                                <a href="<?= site_url('admin/delete-restaurant/'.$restaurant['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus restoran ini?')">
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
<?= $this->endSection() ?>