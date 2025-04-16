

<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="register-container">
    <div class="logo">TomanFood</div>
    <p class="subtitle">Buat akun baru Anda</p>
    
    <?php if (session()->getFlashdata('errors')): ?>
        <div class="error-message">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <p><?= $error ?></p>
            <?php endforeach ?>
        </div>
    <?php endif; ?>
    
    <?php if (session()->getFlashdata('success')): ?>
        <div class="success-message">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>
    
    <form method="post" action="<?= base_url('auth/register') ?>">
        <?= csrf_field() ?>
        
        <div class="name-fields">
            <div class="form-group">
                <label for="first_name">Nama Depan</label>
                <input type="text" id="first_name" name="first_name" 
                       value="<?= old('first_name') ?>" 
                       placeholder="Nama depan" required>
            </div>
            <div class="form-group">
                <label for="last_name">Nama Belakang</label>
                <input type="text" id="last_name" name="last_name" 
                       value="<?= old('last_name') ?>" 
                       placeholder="Nama belakang">
            </div>
        </div>
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" 
                   value="<?= old('email') ?>" 
                   placeholder="contoh@email.com" required>
        </div>
        
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" 
                   value="<?= old('username') ?>" 
                   placeholder="Username unik" required>
        </div>
        
        <div class="form-group">
            <label for="password">Password</label>
            <div class="password-wrapper">
                <input type="password" id="password" name="password" 
                       placeholder="Minimal 8 karakter" required>
                <span class="password-toggle" onclick="togglePassword('password')">👁️</span>
            </div>
        </div>
        
        <div class="form-group">
            <label for="confirm_password">Konfirmasi Password</label>
            <div class="password-wrapper">
                <input type="password" id="confirm_password" name="confirm_password" 
                       placeholder="Ulangi password" required>
                <span class="password-toggle" onclick="togglePassword('confirm_password')">👁️</span>
            </div>
        </div>
        
        <button type="submit" class="btn">Daftar Sekarang</button>
    </form>
    
    <p class="login-link">
        Sudah punya akun? <a href="<?= base_url('auth/login') ?>">Masuk disini</a>
    </p>
</div>

<script>
    function togglePassword(fieldId) {
        const passwordField = document.getElementById(fieldId);
        const toggleIcon = passwordField.nextElementSibling;
        
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            toggleIcon.textContent = '🙈';
        } else {
            passwordField.type = 'password';
            toggleIcon.textContent = '👁️';
        }
    }
</script>
<?= $this->endSection(); ?>