<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pilih Restoran Favorit Anda</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 text-gray-800">

  <!-- Header -->
  <header class="bg-gradient-to-r from-[#e74c3c] to-[#e67e22] text-white py-20 rounded-b-3xl shadow-lg">
    <div class="max-w-6xl mx-auto text-center px-4">
      <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Silakan Pilih Restoran Anda</h1>
      <p class="text-lg opacity-90 max-w-2xl mx-auto">Pilih restoran favorit Anda dan nikmati hidangan terbaik!</p>
    </div>
  </header>

  <!-- Restoran Grid -->
  <main class="max-w-6xl mx-auto px-4 py-16">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

      <!-- Restoran Card -->
      <div class="bg-white rounded-2xl overflow-hidden shadow transition hover:-translate-y-1 hover:shadow-xl">
        <img src="/img/sate.jpg" alt="Sate Khas Nusantara" class="h-48 w-full object-cover transition hover:scale-105">
        <div class="p-5">
          <h2 class="text-xl font-semibold text-gray-900 mb-2">Sate Khas Nusantara</h2>
          <div class="text-yellow-400 mb-2">★★★★★</div>
          <p class="text-gray-600 text-sm mb-4 line-clamp-3">Warisan rasa yang melekat di hati! Di "Sate Mas Joko", kami menyajikan sate dengan daging pilihan yang dibakar sempurna, berpadu dengan bumbu kacang khas yang kaya rasa.</p>
          <div class="flex flex-wrap gap-2 mb-4">
            <span class="bg-gray-100 text-gray-600 text-xs px-3 py-1 rounded-full">Lokal</span>
            <span class="bg-gray-100 text-gray-600 text-xs px-3 py-1 rounded-full">Sate</span>
            <span class="bg-gray-100 text-gray-600 text-xs px-3 py-1 rounded-full">Tradisional</span>
          </div>
          <a href="<?= site_url('pages/sate') ?>" class="inline-block bg-gradient-to-r from-[#ff6b35] to-[#f7931e] text-white text-sm font-medium px-4 py-2 rounded-full shadow hover:-translate-y-0.5 hover:shadow-lg transition">Lihat Menu Lengkap</a>
        </div>
      </div>

      <!-- Restoran Card -->
      <div class="bg-white rounded-2xl overflow-hidden shadow transition hover:-translate-y-1 hover:shadow-xl">
        <img src="/img/katsu.jpg" alt="Kelezatan Jepang" class="h-48 w-full object-cover transition hover:scale-105">
        <div class="p-5">
          <h2 class="text-xl font-semibold text-gray-900 mb-2">Sakura Bento</h2>
          <div class="text-yellow-400 mb-2">★★★★★</div>
          <p class="text-gray-600 text-sm mb-4 line-clamp-3">Kelezatan Jepang dalam setiap gigitan! Menghadirkan hidangan khas Jepang seperti Chicken Katsu, Beef Yakiniku, dan Tempura yang otentik.</p>
          <div class="flex flex-wrap gap-2 mb-4">
            <span class="bg-gray-100 text-gray-600 text-xs px-3 py-1 rounded-full">Jepang</span>
            <span class="bg-gray-100 text-gray-600 text-xs px-3 py-1 rounded-full">Katsu</span>
          </div>
          <a href="<?= site_url('pages/sakuraBento') ?>" class="inline-block bg-gradient-to-r from-[#ff6b35] to-[#f7931e] text-white text-sm font-medium px-4 py-2 rounded-full shadow hover:-translate-y-0.5 hover:shadow-lg transition">Lihat Menu Lengkap</a>
        </div>
      </div>

      <!-- Restoran Card -->
      <div class="bg-white rounded-2xl overflow-hidden shadow transition hover:-translate-y-1 hover:shadow-xl">
        <img src="/img/iga.jpg" alt="Iga Bakar Pak E Iyan" class="h-48 w-full object-cover transition hover:scale-105">
        <div class="p-5">
          <h2 class="text-xl font-semibold text-gray-900 mb-2">Iga Bakar Pak E Iyan</h2>
          <div class="text-yellow-400 mb-2">★★★★☆</div>
          <p class="text-gray-600 text-sm mb-4 line-clamp-3">Hidangan khas terbaik! Nikmati cita rasa autentik yang dibuat dengan bahan segar pilihan dan teknik memasak tradisional.</p>
          <div class="flex flex-wrap gap-2 mb-4">
            <span class="bg-gray-100 text-gray-600 text-xs px-3 py-1 rounded-full">Fusion</span>
            <span class="bg-gray-100 text-gray-600 text-xs px-3 py-1 rounded-full">Modern</span>
          </div>
          <a href="<?= site_url('pages/igaBakar') ?>" class="inline-block bg-gradient-to-r from-[#ff6b35] to-[#f7931e] text-white text-sm font-medium px-4 py-2 rounded-full shadow hover:-translate-y-0.5 hover:shadow-lg transition">Lihat Menu Lengkap</a>
        </div>
      </div>

      <!-- Restoran Card -->
      <div class="bg-white rounded-2xl overflow-hidden shadow transition hover:-translate-y-1 hover:shadow-xl">
        <img src="/img/ayam.jpg" alt="Ayam Gepuk Mbah Nabhaan" class="h-48 w-full object-cover transition hover:scale-105">
        <div class="p-5">
          <h2 class="text-xl font-semibold text-gray-900 mb-2">Ayam Gepuk Mbah Nabhaan</h2>
          <div class="text-yellow-400 mb-2">★★★★☆</div>
          <p class="text-gray-600 text-sm mb-4 line-clamp-3">Menu spesial menanti Anda! Cicipi hidangan istimewa dengan sentuhan khas dari chef berpengalaman kami.</p>
          <div class="flex flex-wrap gap-2 mb-4">
            <span class="bg-gray-100 text-gray-600 text-xs px-3 py-1 rounded-full">Lokal</span>
            <span class="bg-gray-100 text-gray-600 text-xs px-3 py-1 rounded-full">Spesial</span>
          </div>
          <a href="<?= site_url('pages/ayamGepuk') ?>" class="inline-block bg-gradient-to-r from-[#ff6b35] to-[#f7931e] text-white text-sm font-medium px-4 py-2 rounded-full shadow hover:-translate-y-0.5 hover:shadow-lg transition">Lihat Menu Lengkap</a>
        </div>
      </div>

      <!-- Restoran Card -->
      <div class="bg-white rounded-2xl overflow-hidden shadow transition hover:-translate-y-1 hover:shadow-xl">
        <img src="/img/spageti.jpg" alt="La Pasta Bella" class="h-48 w-full object-cover transition hover:scale-105">
        <div class="p-5">
          <h2 class="text-xl font-semibold text-gray-900 mb-2">La Pasta Bella</h2>
          <div class="text-yellow-400 mb-2">★★★★☆</div>
          <p class="text-gray-600 text-sm mb-4 line-clamp-3">Sensasi rasa luar biasa! Hidangan internasional dengan sentuhan lokal yang akan memanjakan lidah Anda.</p>
          <div class="flex flex-wrap gap-2 mb-4">
            <span class="bg-gray-100 text-gray-600 text-xs px-3 py-1 rounded-full">Internasional</span>
            <span class="bg-gray-100 text-gray-600 text-xs px-3 py-1 rounded-full">Pasta</span>
          </div>
          <a href="<?= site_url('pages/pasta') ?>" class="inline-block bg-gradient-to-r from-[#ff6b35] to-[#f7931e] text-white text-sm font-medium px-4 py-2 rounded-full shadow hover:-translate-y-0.5 hover:shadow-lg transition">Lihat Menu Lengkap</a>
        </div>
      </div>

    </div>
  </main>

  <!-- Footer -->
  <footer class="text-center text-gray-400 text-sm py-6">
    © 2025 Layanan Pemesanan Restoran. Semua hak dilindungi.
  </footer>

</body>

</html>
