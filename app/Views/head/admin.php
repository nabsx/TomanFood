<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Sistem Manajemen Restoran</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        :root {
            --primary: #6366F1;
            --primary-dark: #4F46E5;
            --secondary: #8B5CF6;
            --light: #F9FAFB;
            --dark: #1E293B;
            --gray: #64748B;
            --gray-light: #E2E8F0;
            --success: #10B981;
            --warning: #F59E0B;
            --danger: #EF4444;
            --sidebar-width: 250px;
        }
        
        body {
            background-color: #F1F5F9;
            color: var(--dark);
            min-height: 100vh;
            display: flex;
        }
        
        .sidebar {
            width: var(--sidebar-width);
            background-color: white;
            height: 100vh;
            position: fixed;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
            z-index: 100;
            transition: all 0.3s ease;
        }
        
        .sidebar-header {
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid var(--gray-light);
        }
        
        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .menu-items {
            padding: 15px 0;
        }
        
        .menu-item {
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            color: var(--gray);
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }
        
        .menu-item.active, .menu-item:hover {
            background-color: #F8FAFC;
            color: var(--primary);
            border-left: 4px solid var(--primary);
        }
        
        .menu-item i {
            font-size: 1.2rem;
        }
        
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            transition: all 0.3s ease;
        }
        
        .topbar {
            background-color: white;
            padding: 15px 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 99;
        }
        
        .toggle-menu {
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--gray);
            cursor: pointer;
        }
        
        .search-bar {
            display: flex;
            align-items: center;
            background-color: #F1F5F9;
            border-radius: 50px;
            padding: 8px 15px;
            flex: 0 0 300px;
        }
        
        .search-bar input {
            background: none;
            border: none;
            outline: none;
            padding: 5px 10px;
            width: 100%;
            color: var(--dark);
        }
        
        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .profile-pic {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }
        
        .notifications {
            position: relative;
            cursor: pointer;
        }
        
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: var(--danger);
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
        }
        
        .dashboard-container {
            padding: 30px;
        }
        
        .page-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: var(--dark);
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .stat-content h3 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .stat-content p {
            color: var(--gray);
            font-size: 0.9rem;
        }
        
        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }
        
        .bg-primary { background-color: var(--primary); }
        .bg-success { background-color: var(--success); }
        .bg-warning { background-color: var(--warning); }
        .bg-danger { background-color: var(--danger); }
        
        .content-cards {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }
        
        .card-header {
            padding: 15px 20px;
            border-bottom: 1px solid var(--gray-light);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .card-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--dark);
        }
        
        .card-action {
            color: var(--primary);
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
        }
        
        .card-body {
            padding: 20px;
        }
        
        .data-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .data-table th, .data-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid var(--gray-light);
        }
        
        .data-table th {
            font-weight: 600;
            color: var(--gray);
            font-size: 0.9rem;
        }
        
        .data-table tr:last-child td {
            border-bottom: none;
        }
        
        .status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }
        
        .status-completed { background-color: #DCFCE7; color: #166534; }
        .status-pending { background-color: #FEF3C7; color: #92400E; }
        .status-cancelled { background-color: #FEE2E2; color: #B91C1C; }
        
        .action-buttons {
            display: flex;
            gap: 5px;
        }
        
        .action-button {
            border: none;
            background: none;
            cursor: pointer;
            width: 30px;
            height: 30px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.9rem;
        }
        
        .edit-btn { background-color: var(--primary); }
        .delete-btn { background-color: var(--danger); }
        
        .activity-list {
            list-style-type: none;
        }
        
        .activity-item {
            display: flex;
            gap: 15px;
            padding: 15px 0;
            border-bottom: 1px solid var(--gray-light);
        }
        
        .activity-item:last-child {
            border-bottom: none;
        }
        
        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1rem;
        }
        
        .activity-content h4 {
            font-size: 0.95rem;
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .activity-content p {
            font-size: 0.85rem;
            color: var(--gray);
        }
        
        .activity-time {
            font-size: 0.8rem;
            color: var(--gray);
            margin-top: 5px;
        }
        
        .btn {
            border: none;
            background-color: var(--primary);
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn:hover {
            background-color: var(--primary-dark);
        }
        
        .btn-outline {
            background-color: transparent;
            color: var(--primary);
            border: 1px solid var(--primary);
        }
        
        .btn-outline:hover {
            background-color: var(--primary);
            color: white;
        }
        
        .restaurant-cards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        
        .restaurant-card {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }
        
        .restaurant-img {
            height: 150px;
            width: 100%;
            object-fit: cover;
        }
        
        .restaurant-details {
            padding: 15px;
        }
        
        .restaurant-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 8px;
        }
        
        .restaurant-meta {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 10px;
        }
        
        .meta-item {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 0.85rem;
            color: var(--gray);
        }
        
        .restaurant-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }
        
        @media (max-width: 1024px) {
            .content-cards {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .search-bar {
                display: none;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <div class="logo">
                <i>🍽️</i>
                <span>RestoAdmin</span>
            </div>
        </div>
        
        <div class="menu-items">
            <a href="#" class="menu-item active">
                <i>📊</i>
                <span>Dashboard</span>
            </a>
            <a href="#" class="menu-item">
                <i>🍔</i>
                <span>Restoran</span>
            </a>
            <a href="#" class="menu-item">
                <i>🛒</i>
                <span>Pesanan</span>
            </a>
            <a href="#" class="menu-item">
                <i>🧾</i>
                <span>Menu</span>
            </a>
            <a href="#" class="menu-item">
                <i>👥</i>
                <span>Pelanggan</span>
            </a>
            <a href="#" class="menu-item">
                <i>📝</i>
                <span>Ulasan</span>
            </a>
            <a href="#" class="menu-item">
                <i>📊</i>
                <span>Laporan</span>
            </a>
            <a href="#" class="menu-item">
                <i>⚙️</i>
                <span>Pengaturan</span>
            </a>
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Bar -->
        <div class="topbar">
            <button class="toggle-menu">
                <i>≡</i>
            </button>
            
            <div class="search-bar">
                <i>🔍</i>
                <input type="text" placeholder="Cari...">
            </div>
            
            <div class="user-profile">
                <div class="notifications">
                    <i>🔔</i>
                    <span class="notification-badge">5</span>
                </div>
                
                <div class="profile-pic">
                    A
                </div>
                <span>Admin</span>
            </div>
        </div>
        
        <!-- Dashboard Content -->
        <div class="dashboard-container">
            <h1 class="page-title">Dashboard</h1>
            
            <!-- Stats Cards -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-content">
                        <h3>345</h3>
                        <p>Total Pesanan</p>
                    </div>
                    <div class="stat-icon bg-primary">
                        <i>📋</i>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-content">
                        <h3>Rp15.6M</h3>
                        <p>Pendapatan</p>
                    </div>
                    <div class="stat-icon bg-success">
                        <i>💰</i>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-content">
                        <h3>256</h3>
                        <p>Pelanggan Baru</p>
                    </div>
                    <div class="stat-icon bg-warning">
                        <i>👥</i>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-content">
                        <h3>4.8</h3>
                        <p>Rating Rata-Rata</p>
                    </div>
                    <div class="stat-icon bg-danger">
                        <i>⭐</i>
                    </div>
                </div>
            </div>
            
            <!-- Content Cards -->
            <div class="content-cards">
                <!-- Orders Table -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Pesanan Terbaru</h3>
                        <a href="#" class="card-action">Lihat Semua</a>
                    </div>
                    
                    <div class="card-body">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Pelanggan</th>
                                    <th>Restoran</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#ORD-001</td>
                                    <td>Budi Santoso</td>
                                    <td>Sate Khas Nusantara</td>
                                    <td>Rp125,000</td>
                                    <td><span class="status status-completed">Selesai</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="action-button edit-btn">✏️</button>
                                            <button class="action-button delete-btn">🗑️</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#ORD-002</td>
                                    <td>Siti Aminah</td>
                                    <td>Sakura Bento</td>
                                    <td>Rp98,000</td>
                                    <td><span class="status status-pending">Diproses</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="action-button edit-btn">✏️</button>
                                            <button class="action-button delete-btn">🗑️</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#ORD-003</td>
                                    <td>Rudi Hartono</td>
                                    <td>Restoran C</td>
                                    <td>Rp145,000</td>
                                    <td><span class="status status-cancelled">Dibatalkan</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="action-button edit-btn">✏️</button>
                                            <button class="action-button delete-btn">🗑️</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#ORD-004</td>
                                    <td>Diana Putri</td>
                                    <td>Restoran D</td>
                                    <td>Rp87,500</td>
                                    <td><span class="status status-pending">Diproses</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="action-button edit-btn">✏️</button>
                                            <button class="action-button delete-btn">🗑️</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#ORD-005</td>
                                    <td>Andi Wijaya</td>
                                    <td>Restoran E</td>
                                    <td>Rp112,000</td>
                                    <td><span class="status status-completed">Selesai</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="action-button edit-btn">✏️</button>
                                            <button class="action-button delete-btn">🗑️</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- Activity Feed -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Aktivitas Terbaru</h3>
                        <a href="#" class="card-action">Segarkan</a>
                    </div>
                    
                    <div class="card-body">
                        <ul class="activity-list">
                            <li class="activity-item">
                                <div class="activity-icon bg-success">
                                    <i>✓</i>
                                </div>
                                <div class="activity-content">
                                    <h4>Pesanan Baru Diterima</h4>
                                    <p>Pesanan #ORD-006 dari Nina Sari</p>
                                    <span class="activity-time">10 menit yang lalu</span>
                                </div>
                            </li>
                            <li class="activity-item">
                                <div class="activity-icon bg-primary">
                                    <i>★</i>
                                </div>
                                <div class="activity-content">
                                    <h4>Ulasan Baru</h4>
                                    <p>Sate Khas Nusantara mendapat ulasan 5 bintang</p>
                                    <span class="activity-time">45 menit yang lalu</span>
                                </div>
                            </li>
                            <li class="activity-item">
                                <div class="activity-icon bg-warning">
                                    <i>🔔</i>
                                </div>
                                <div class="activity-content">
                                    <h4>Stok Menu Menipis</h4>
                                    <p>Sushi Roll di Sakura Bento hampir habis</p>
                                    <span class="activity-time">1 jam yang lalu</span>
                                </div>
                            </li>
                            <li class="activity-item">
                                <div class="activity-icon bg-danger">
                                    <i>✕</i>
                                </div>
                                <div class="activity-content">
                                    <h4>Pesanan Dibatalkan</h4>
                                    <p>Pesanan #ORD-003 telah dibatalkan</p>
                                    <span class="activity-time">2 jam yang lalu</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Restaurant Management -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Manajemen Restoran</h3>
                    <button class="btn">
                        <i>+</i> Tambah Restoran
                    </button>
                </div>
                
                <div class="card-body">
                    <div class="restaurant-cards">
                        <div class="restaurant-card">
                            <img src="/api/placeholder/400/320" alt="Sate Khas Nusantara" class="restaurant-img">
                            <div class="restaurant-details">
                                <h3 class="restaurant-title">Sate Khas Nusantara</h3>
                                <div class="restaurant-meta">
                                    <div class="meta-item">
                                        <i>⭐</i> 5.0
                                    </div>
                                    <div class="meta-item">
                                        <i>🍽️</i> 24 Menu
                                    </div>
                                </div>
                                <div class="restaurant-actions">
                                    <button class="btn btn-outline">Edit</button>
                                    <button class="btn">Kelola Menu</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="restaurant-card">
                            <img src="/api/placeholder/400/320" alt="Sakura Bento" class="restaurant-img">
                            <div class="restaurant-details">
                                <h3 class="restaurant-title">Sakura Bento</h3>
                                <div class="restaurant-meta">
                                    <div class="meta-item">
                                        <i>⭐</i> 4.8
                                    </div>
                                    <div class="meta-item">
                                        <i>🍽️</i> 18 Menu
                                    </div>
                                </div>
                                <div class="restaurant-actions">
                                    <button class="btn btn-outline">Edit</button>
                                    <button class="btn">Kelola Menu</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="restaurant-card">
                            <img src="/api/placeholder/400/320" alt="Restoran C" class="restaurant-img">
                            <div class="restaurant-details">
                                <h3 class="restaurant-title">Restoran C</h3>
                                <div class="restaurant-meta">
                                    <div class="meta-item">
                                        <i>⭐</i> 4.5
                                    </div>
                                    <div class="meta-item">
                                        <i>🍽️</i> 15 Menu
                                    </div>
                                </div>
                                <div class="restaurant-actions">
                                    <button class="btn btn-outline">Edit</button>
                                    <button class="btn">Kelola Menu</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>