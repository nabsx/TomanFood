<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Restoran</h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Restoran</h6>
        </div>
        <div class="card-body">
            <form action="<?= site_url('admin/add-restaurant') ?>" method="post">
                <?= csrf_field() ?>
                
                <?php if(isset($validation)): ?>
                <div class="alert alert-danger">
                    <?= $validation->listErrors() ?>
                </div>
                <?php endif; ?>
                
                <div class="form-group">
                    <label for="name">Nama Restoran</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= old('name') ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required><?= old('description') ?></textarea>
                </div>
                
                <div class="form-group">
                    <label for="rating">Rating (0-5)</label>
                    <input type="number" class="form-control" id="rating" name="rating" min="0" max="5" step="0.1" value="<?= old('rating') ? old('rating') : '0.0' ?>" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= site_url('admin/restaurants') ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>