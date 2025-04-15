<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Restoran Favorit Anda</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background-color: #f8f9fa;
            color: #333;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        header {
            background: linear-gradient(135deg, #6366F1 0%, #8B5CF6 100%);
            padding: 60px 0;
            text-align: center;
            border-radius: 0 0 30px 30px;
            margin-bottom: 40px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        
        h1 {
            color: white;
            font-size: 2.5rem;
            margin-bottom: 15px;
            font-weight: 700;
        }
        
        .subtitle {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto;
        }
        
        .restaurant-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }
        
        .restaurant-card {
            background-color: white;
            border-radius: 20px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .restaurant-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .card-image {
            height: 200px;
            overflow: hidden;
        }
        
        .card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .restaurant-card:hover .card-image img {
            transform: scale(1.05);
        }
        
        .card-content {
            padding: 20px;
        }
        
        .restaurant-name {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 8px;
            color: #1e293b;
        }
        
        .restaurant-description {
            color: #64748b;
            font-size: 0.9rem;
            margin-bottom: 15px;
            line-height: 1.5;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .rating {
            margin-bottom: 15px;
            color: #fbbf24;
        }
        
        .menu-link {
            display: inline-block;
            color: #6366F1;
            font-weight: 500;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }
        
        .menu-link:hover {
            color: #4f46e5;
            text-decoration: underline;
        }
        
        .tag {
            display: inline-block;
            background-color: #f3f4f6;
            color: #4b5563;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            margin-right: 5px;
            margin-bottom: 5px;
        }
        
        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #6366F1 0%, #8B5CF6 100%);
            color: white;
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 30px;
            text-decoration: none;
            margin-top: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 10px rgba(99, 102, 241, 0.2);
        }
        
        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(99, 102, 241, 0.3);
        }
        
        footer {
            text-align: center;
            padding: 20px;
            color: #6b7280;
            font-size: 0.9rem;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Silakan Pilih Restoran Anda</h1>
            <p class="subtitle">Pilih restoran favorit Anda dan nikmati hidangan terbaik!</p>
        </div>
    </header>
    
    <div class="container">
        <div class="restaurant-grid">
            <!-- Restoran 1 -->
            <div class="restaurant-card">
                <div class="card-image">
                    <img src="/img/sate.jpg" alt="Sate Khas Nusantara">
                </div>
                <div class="card-content">
                    <h2 class="restaurant-name">Sate Khas Nusantara</h2>
                    <div class="rating">★★★★★</div>
                    <p class="restaurant-description">Warisan rasa yang melekat di hati! Di "Sate Mas Joko", kami menyajikan sate dengan daging pilihan yang dibakar sempurna, berpadu dengan bumbu kacang khas yang kaya rasa.</p>
                    <div>
                        <span class="tag">Lokal</span>
                        <span class="tag">Sate</span>
                        <span class="tag">Tradisional</span>
                    </div>
                    <a href="pages/sate" class="cta-button">Lihat Menu Lengkap</a>
                </div>
            </div>
            
            <!-- Restoran 2 -->
            <div class="restaurant-card">
                <div class="card-image">
                    <img src="/img/katsu.jpg" alt="Kelezatan Jepang">
                </div>
                <div class="card-content">
                    <h2 class="restaurant-name">Sakura Bento</h2>
                    <div class="rating">★★★★★</div>
                    <p class="restaurant-description">Kelezatan Jepang dalam setiap gigitan! Menghadirkan hidangan khas Jepang seperti Chicken Katsu, Beef Yakiniku, dan Tempura yang otentik.</p>
                    <div>
                        <span class="tag">Jepang</span>
                        <span class="tag">Katsu</span>
                    </div>
                    <a href="pages/sakuraBento" class="cta-button">Lihat Menu Lengkap</a>
                </div>
            </div>
            
            <!-- Restoran 3 -->
            <div class="restaurant-card">
                <div class="card-image">
                    <img src="/img/iga.jpg" alt="Restoran C">
                </div>
                <div class="card-content">
                    <h2 class="restaurant-name">Iga Bakar Pak E Iyan</h2>
                    <div class="rating">★★★★☆</div>
                    <p class="restaurant-description">Hidangan khas terbaik! Nikmati cita rasa autentik yang dibuat dengan bahan segar pilihan dan teknik memasak tradisional.</p>
                    <div>
                        <span class="tag">Fusion</span>
                        <span class="tag">Modern</span>
                    </div>
                    <a href="pages/igaBakar" class="cta-button">Lihat Menu Lengkap</a>
                </div>
            </div>
            
            <!-- Restoran 4 -->
            <div class="restaurant-card">
                <div class="card-image">
                    <img src="/img/ayam.jpg" alt="Ayam Gepuk Mbah Nabhaan">
                </div>
                <div class="card-content">
                    <h2 class="restaurant-name">Ayam Gepuk Mbah Nabhaan</h2>
                    <div class="rating">★★★★☆</div>
                    <p class="restaurant-description">Menu spesial menanti Anda! Cicipi hidangan istimewa dengan sentuhan khas dari chef berpengalaman kami.</p>
                    <div>
                        <span class="tag">Lokal</span>
                        <span class="tag">Spesial</span>
                    </div>
                    <a href="pages/ayamGepuk" class="cta-button">Lihat Menu Lengkap</a>
                </div>
            </div>
            
            <!-- Restoran 5 -->
            <div class="restaurant-card">
                <div class="card-image">
                    <img src="/img/spageti.jpg" alt="La Pasta Bella">
                </div>
                <div class="card-content">
                    <h2 class="restaurant-name">La Pasta Bella</h2>
                    <div class="rating">★★★★☆</div>
                    <p class="restaurant-description">Sensasi rasa luar biasa! Hidangan internasional dengan sentuhan lokal yang akan memanjakan lidah Anda.</p>
                    <div>
                        <span class="tag">Internasional</span>
                        <span class="tag">Pasta</span>
                    </div>
                    <a href="pages/pasta" class="cta-button">Lihat Menu Lengkap</a>
                </div>
            </div>
        </div>
    </div>
    
    <footer>
        <div class="container">
            <p>© 2025 Layanan Pemesanan Restoran. Semua hak dilindungi.</p>
        </div>
    </footer>
</body>
</html>