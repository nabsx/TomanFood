<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Menu</h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Menu</h6>
        </div>
        <div class="card-body">
            <form action="<?= site_url('admin/edit-menu/'.$menu['id']) ?>" method="post">
                <?= csrf_field() ?>
                
                <?php if(isset($validation)): ?>
                <div class="alert alert-danger">
                    <?= $validation->listErrors() ?>
                </div>
                <?php endif; ?>
                
                <div class="form-group">
                    <label for="restaurant_id">Restoran</label>
                    <select class="form-control" id="restaurant_id" name="restaurant_id" required>
                        <option value="">Pilih Restoran</option>
                        <?php foreach($restaurants as $restaurant): ?>
                        <option value="<?= $restaurant['id'] ?>" <?= (old('restaurant_id') ? old('restaurant_id') : $menu['restaurant_id']) == $restaurant['id'] ? 'selected' : '' ?>>
                            <?= $restaurant['name'] ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="name">Nama Menu</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= old('name') ? old('name') : $menu['name'] ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required><?= old('description') ? old('description') : $menu['description'] ?></textarea>
                </div>
                
                <div class="form-group">
                    <label for="price">Harga (Rp)</label>
                    <input type="number" class="form-control" id="price" name="price" min="0" value="<?= old('price') ? old('price') : $menu['price'] ?>" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="<?= site_url('admin/menus') ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>