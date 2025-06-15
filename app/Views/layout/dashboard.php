<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodHub - Platform Pemesanan Makanan Online</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .navbar {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        .navbar.scrolled {
            background: #ffffff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            backdrop-filter: none;
        }
        
        /* Styling untuk logo - default putih, berubah ke orange saat scroll */
        .navbar-logo {
            color: white;
            transition: color 0.3s ease;
        }
        .navbar.scrolled .navbar-logo {
            color: #ff6b35;
        }
        
        /* Styling untuk menu links - default putih, berubah ke abu-abu gelap saat scroll */
        .navbar-link {
            color: white;
            transition: color 0.3s ease;
        }
        .navbar.scrolled .navbar-link {
            color: #374151;
        }
        .navbar.scrolled .navbar-link:hover {
            background-color: rgba(107, 114, 128, 0.1);
        }
        
        /* Styling untuk tombol login - tetap putih background dengan text orange */
        .navbar-login {
            background: white;
            color: #ff6b35;
            transition: all 0.3s ease;
        }
        .navbar.scrolled .navbar-login {
            background: #ff6b35;
            color: white;
        }
        
        .card-image {
            filter: brightness(0.6);
        }
        .category-card:hover .card-image {
            filter: brightness(0.8);
        }
    </style>
</head>
<body class="bg-[#fdf2e9] text-gray-800">
    <!-- Navigation -->
    <nav id="navbar" class="navbar fixed top-0 w-full py-4 px-8 z-50 transition-all duration-300">
        <div class="max-w-6xl mx-auto px-5 flex justify-between items-center">
            <a href="#" class="navbar-logo text-2xl font-bold">TomanFood</a>
            <div class="flex items-center gap-5">
                <a href="#" class="navbar-link font-medium px-4 py-2 rounded-full hover:bg-white/20 transition">Beranda</a>
                <a href="#" class="navbar-link font-medium px-4 py-2 rounded-full hover:bg-white/20 transition">Promo</a>
                <a href="#" class="navbar-link font-medium px-4 py-2 rounded-full hover:bg-white/20 transition">Bantuan</a>
                <a href="auth/login" class="navbar-login font-semibold px-5 py-2 rounded-full hover:-translate-y-0.5 transition">Masuk</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-[#e74c3c] to-[#e67e22] pt-32 pb-20 text-center text-white">
        <div class="max-w-6xl mx-auto px-5">
            <h1 class="text-5xl font-bold mb-5">Pesan Makanan Favorit Anda</h1>
            <p class="text-xl opacity-90 max-w-2xl mx-auto mb-8">Restoran terbaik siap mengantarkan kelezatan langsung ke depan pintu Anda</p>
            <div class="max-w-lg mx-auto relative p-2.5 bg-white rounded-full shadow-lg">
                <input type="text" class="search-input w-full py-4 pl-5 pr-14 border-none rounded-full shadow-inner focus:outline-none text-gray-900" placeholder="Cari restoran atau makanan favorit...">
                <button class="search-btn absolute right-3 top-1/2 -translate-y-1/2 bg-gradient-to-r from-[#ff6b35] to-[#f7931e] text-white px-4 py-2.5 rounded-full shadow-md hover:shadow-lg hover:-translate-y-[55%] transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>
        </div>
    </section>

    <div class="max-w-6xl mx-auto px-5 py-10">
        <!-- Categories Section -->
        <section class="mb-12">
            <h2 class="text-3xl font-semibold text-center mb-8 text-gray-800">Pilih Kategori Makanan</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                <a href="<?= site_url('layout/RestoSate') ?>" class="category-card relative block rounded-xl overflow-hidden h-64 text-white">
                    <div class="card-image absolute inset-0 bg-cover bg-center" style="background-image: url('img/sate.jpg')"></div>
                    <div class="card-overlay absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="card-content absolute bottom-0 p-4">
                        <h3 class="text-xl font-semibold">Restoran Sate</h3>
                        <p class="text-sm opacity-90">Cita rasa nusantara yang autentik dan menggugah selera</p>
                        <div class="font-bold mt-2 text-sm">12+ Restoran</div>
                    </div>
                </a>

                <a href="<?= site_url('layout/RestoJepang') ?>" class="category-card relative block rounded-xl overflow-hidden h-64 text-white">
                    <div class="card-image absolute inset-0 bg-cover bg-center" style="background-image: url('img/katsu.jpg')"></div>
                    <div class="card-overlay absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="card-content absolute bottom-0 p-4">
                        <h3 class="text-xl font-semibold">Japanese Food</h3>
                        <p class="text-sm opacity-90">Kelezatan Sakura dengan cita rasa yang otentik</p>
                        <div class="font-bold mt-2 text-sm">8+ Restoran</div>
                    </div>
                </a>

                <a href="<?= site_url('layout/RestoWestern') ?>" class="category-card relative block rounded-xl overflow-hidden h-64 text-white">
                    <div class="card-image absolute inset-0 bg-cover bg-center" style="background-image: url('img/spageti.jpg')"></div>
                    <div class="card-overlay absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="card-content absolute bottom-0 p-4">
                        <h3 class="text-xl font-semibold">Western Food</h3>
                        <p class="text-sm opacity-90">Hidangan internasional dengan kualitas premium</p>
                        <div class="font-bold mt-2 text-sm">15+ Restoran</div>
                    </div>
                </a>

                <a href="<?= site_url('layout/RestoIga') ?>" class="category-card relative block rounded-xl overflow-hidden h-64 text-white">
                    <div class="card-image absolute inset-0 bg-cover bg-center" style="background-image: url('img/iga.jpg')"></div>
                    <div class="card-overlay absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="card-content absolute bottom-0 p-4">
                        <h3 class="text-xl font-semibold">Iga Pilihan</h3>
                        <p class="text-sm opacity-90">Temukan berbagai pilihan restoran terbaik yang menyajikan hidangan iga lezat</p>
                        <div class="font-bold mt-2 text-sm">20+ Restoran</div>
                    </div>
                </a>
            </div>
        </section>

        <!-- Promo Section -->
        <section class="bg-[#c0392b] rounded-2xl p-10 text-center text-white mb-10">
            <h2 class="text-3xl font-bold mb-4">Promo Spesial Hari Ini!</h2>
            <p class="text-lg opacity-90 mb-6">Diskon hingga 50% untuk pemesanan pertama Anda. Jangan sampai terlewat!</p>
            <a href="#" class="inline-block bg-white text-[#ff6b35] font-semibold px-8 py-3 rounded-full hover:-translate-y-0.5 transition">Lihat Semua Promo</a>
        </section>

        <!-- Featured Restaurants -->
        <section class="mb-12">
            <h2 class="text-3xl font-semibold text-center mb-8 text-gray-800">Restoran Populer</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl hover:-translate-y-1 transition">
                    <div class="h-40 overflow-hidden">
                        <img src="/img/sate.jpg" alt="Sate Khas Nusantara" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                    </div>
                    <div class="p-5">
                        <h3 class="text-lg font-semibold mb-2">Sate Khas Nusantara</h3>
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-yellow-400">⭐ 4.8 (120+ ulasan)</span>
                            <span class="text-gray-500 text-sm">25-35 min</span>
                        </div>
                        <div class="flex flex-wrap gap-1.5">
                            <span class="bg-gray-100 text-gray-700 px-2 py-1 rounded-full text-xs">Lokal</span>
                            <span class="bg-gray-100 text-gray-700 px-2 py-1 rounded-full text-xs">Halal</span>
                            <span class="bg-gray-100 text-gray-700 px-2 py-1 rounded-full text-xs">Tradisional</span>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl hover:-translate-y-1 transition">
                    <div class="h-40 overflow-hidden">
                        <img src="/img/katsu.jpg" alt="Sakura Bento" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                    </div>
                    <div class="p-5">
                        <h3 class="text-lg font-semibold mb-2">Sakura Bento</h3>
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-yellow-400">⭐ 4.7 (95+ ulasan)</span>
                            <span class="text-gray-500 text-sm">20-30 min</span>
                        </div>
                        <div class="flex flex-wrap gap-1.5">
                            <span class="bg-gray-100 text-gray-700 px-2 py-1 rounded-full text-xs">Jepang</span>
                            <span class="bg-gray-100 text-gray-700 px-2 py-1 rounded-full text-xs">Bento</span>
                            <span class="bg-gray-100 text-gray-700 px-2 py-1 rounded-full text-xs">Halal</span>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl hover:-translate-y-1 transition">
                    <div class="h-40 overflow-hidden">
                        <img src="/img/spageti.jpg" alt="La Pasta Bella" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                    </div>
                    <div class="p-5">
                        <h3 class="text-lg font-semibold mb-2">La Pasta Bella</h3>
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-yellow-400">⭐ 4.6 (87+ ulasan)</span>
                            <span class="text-gray-500 text-sm">30-40 min</span>
                        </div>
                        <div class="flex flex-wrap gap-1.5">
                            <span class="bg-gray-100 text-gray-700 px-2 py-1 rounded-full text-xs">Italia</span>
                            <span class="bg-gray-100 text-gray-700 px-2 py-1 rounded-full text-xs">Pasta</span>
                            <span class="bg-gray-100 text-gray-700 px-2 py-1 rounded-full text-xs">Western</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white pt-10 pb-6 border-t border-white/10">
        <div class="max-w-6xl mx-auto px-5">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                <div>
                    <h3 class="text-[#ff6b35] text-lg font-semibold mb-4">Tentang TomanFood</h3>
                    <p class="text-gray-400">Platform pemesanan makanan online terpercaya yang menghubungkan Anda dengan restoran-restoran terbaik di kota. Kami berkomitmen memberikan layanan terbaik dengan pengiriman cepat dan makanan berkualitas.</p>
                </div>
                <div>
                    <h3 class="text-[#ff6b35] text-lg font-semibold mb-4">Layanan Kami</h3>
                    <p><a href="#" class="text-gray-400 hover:text-white transition">Pesan Antar Makanan</a></p>
                    <p><a href="#" class="text-gray-400 hover:text-white transition">Daftar Restoran</a></p>
                    <p><a href="#" class="text-gray-400 hover:text-white transition">Program Loyalitas</a></p>
                    <p><a href="#" class="text-gray-400 hover:text-white transition">Promo & Diskon</a></p>
                </div>
                <div>
                    <h3 class="text-[#ff6b35] text-lg font-semibold mb-4">Hubungi Kami</h3>
                    <p class="text-gray-400">📧 support@tomanfood.id</p>
                    <p class="text-gray-400">📱 +62 812-3456-7890</p>
                    <p class="text-gray-400">🏢 Semarang, Indonesia</p>
                    <p class="text-gray-400">⏰ 24/7 Customer Service</p>
                </div>
            </div>
            <div class="border-t border-gray-800 pt-6">
                <p class="text-gray-400 text-center">© 2025 TomanFood. Semua hak dilindungi. | Platform pemesanan makanan online terdepan di Indonesia</p>
            </div>
        </div>
    </footer>

    <script>
        function showRestaurants(category) {
            const categoryPages = {
                'Restoran-Sate': '/layout/home',
                'makanan-jepang': '/restoran/jepang', 
                'makanan-western': '/restoran/western',
                'fast-food': '/restoran/fastfood',
                'minuman': '/restoran/minuman',
                'dessert': '/restoran/dessert'
            };
            
            alert(`Mengarah ke halaman: ${categoryPages[category]}\n\nDi halaman ini akan menampilkan daftar restoran kategori: ${category.replace('-', ' ').toUpperCase()}`);
        }

        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
        
        document.querySelector('.search-btn').addEventListener('click', function() {
            const searchTerm = document.querySelector('.search-input').value;
            if (searchTerm.trim()) {
                alert(`Mencari: "${searchTerm}"\n\nFitur pencarian akan menampilkan restoran dan menu yang sesuai dengan kata kunci.`);
            }
        });
        
        document.querySelector('.search-input').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                document.querySelector('.search-btn').click();
            }
        });

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>
</html>