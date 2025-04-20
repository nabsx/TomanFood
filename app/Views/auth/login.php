<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Restoran Anda</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #6366F1 0%, #8B5CF6 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        
        .login-container {
            background-color: white;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 420px;
            padding: 40px 30px;
            text-align: center;
        }
        
        .logo {
            font-size: 28px;
            font-weight: bold;
            color: #6366F1;
            margin-bottom: 10px;
        }
        
        .subtitle {
            color: #64748B;
            font-size: 16px;
            margin-bottom: 30px;
        }
        
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: #475569;
            font-weight: 500;
        }
        
        input {
            width: 100%;
            padding: 14px 16px;
            border: 1px solid #CBD5E1;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        
        input:focus {
            outline: none;
            border-color: #6366F1;
        }
        
        .forgot-password {
            text-align: right;
            margin-bottom: 24px;
        }
        
        .forgot-password a {
            color: #6366F1;
            font-size: 14px;
            text-decoration: none;
        }
        
        .btn {
            background: linear-gradient(135deg, #6366F1 0%, #8B5CF6 100%);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 14px;
            width: 100%;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: opacity 0.3s;
        }
        
        .btn:hover {
            opacity: 0.9;
        }
        
        .register-link {
            margin-top: 24px;
            font-size: 14px;
            color: #64748B;
        }
        
        .register-link a {
            color: #6366F1;
            text-decoration: none;
            font-weight: 500;
        }
        
        .divider {
            display: flex;
            align-items: center;
            margin: 24px 0;
            color: #94A3B8;
            font-size: 14px;
        }
        
        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background-color: #E2E8F0;
        }
        
        .divider span {
            padding: 0 10px;
        }
        
        .social-buttons {
            display: flex;
            justify-content: center;
            gap: 16px;
        }
        
        .social-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            border: 1px solid #E2E8F0;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .social-btn:hover {
            background-color: #F1F5F9;
        }
        
        .social-icon {
            width: 24px;
            height: 24px;
        }
        
        .error-message {
            color: #EF4444;
            background-color: #FEE2E2;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }
        
        .password-wrapper {
            position: relative;
        }
        
        .password-toggle {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #64748B;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo">TomanFood</div>
        <p class="subtitle">Silakan masuk ke akun Anda</p>
        
        <?php if (session()->getFlashdata('error')): ?>
            <div class="error-message">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>
        
        <form method="post" action="<?= site_url('auth/login'); ?>">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan Username" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <div class="password-wrapper">
                    <input type="password" id="password" name="password" placeholder="Masukkan Password" required>
                    <span class="password-toggle" onclick="togglePassword()">👁️</span>
                </div>
            </div>
            
            <div class="forgot-password">
                <a href="<?= site_url('auth/forgot-password'); ?>">Lupa kata sandi?</a>
            </div>
            
            <button type="submit" class="btn">Masuk</button>
        </form>
        
        <p class="register-link">
            Belum punya akun? <a href="<?= site_url('auth/register'); ?>">Daftar sekarang</a>
        </p>
    </div>

    <script>
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const toggleIcon = document.querySelector('.password-toggle');
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.textContent = '🙈';
            } else {
                passwordField.type = 'password';
                toggleIcon.textContent = '👁️';
            }
        }
    </script>
</body>
</html>