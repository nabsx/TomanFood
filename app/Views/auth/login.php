<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - Restoran Anda</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-r from-[#e74c3c] to-[#e67e22] p-5">

  <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-8 text-center">
    <div class="text-2xl font-bold text-black-200">TomanFood</div>
    <p class="text-slate-500 text-base mb-6">Silakan masuk ke akun Anda</p>

    <?php if (session()->getFlashdata('error')): ?>
      <div class="text-sm text-red-600 bg-red-100 p-3 rounded mb-5">
        <?= session()->getFlashdata('error'); ?>
      </div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('auth/login'); ?>" class="space-y-5 text-left">
      <div>
        <label for="username" class="block text-sm font-medium text-slate-600 mb-2">Username</label>
        <input type="text" id="username" name="username" placeholder="Masukkan Username"
          class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400" required />
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-slate-600 mb-2">Password</label>
        <div class="relative">
          <input type="password" id="password" name="password" placeholder="Masukkan Password"
            class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400 pr-10" required />
          <span class="absolute right-3 top-1/2 -translate-y-1/2 cursor-pointer text-slate-500" onclick="togglePassword()">👁️</span>
        </div>
      </div>

      <div class="text-right">
        <a href="<?= site_url('auth/forgot-password'); ?>" class="text-sm text-indigo-500 hover:underline">Lupa kata sandi?</a>
      </div>

      <button type="submit"
        class="w-full bg-[#c0392b] text-white py-3 rounded-lg font-semibold hover:opacity-90 transition">
        Masuk
      </button>
    </form>

    <p class="mt-6 text-sm text-slate-500">
      Belum punya akun?
      <a href="<?= site_url('auth/register'); ?>" class="text-indigo-500 font-medium hover:underline">Daftar sekarang</a>
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
