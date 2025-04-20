<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - TomanFood</title>
    
    <!-- Custom fonts for this template-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom styles -->
    <style>
        :root {
            --primary: #6366F1;
            --secondary: #8B5CF6;
            --success: #10B981;
            --danger: #EF4444;
            --warning: #F59E0B;
            --info: #3B82F6;
        }
        
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fc;
        }
        
        #wrapper {
            display: flex;
        }
        
        #content-wrapper {
            background-color: #f8f9fc;
            width: 100%;
            overflow-x: hidden;
        }
        
        #content {
            flex: 1 0 auto;
        }
        
        /* Sidebar */
        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: linear-gradient(180deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            position: fixed;
            z-index: 1;
            transition: all 0.3s;
        }
        
        .sidebar-brand {
            height: 4.5rem;
            text-decoration: none;
            font-size: 1.2rem;
            font-weight: 800;
            padding: 1.5rem 1rem;
            text-align: center;
            letter-spacing: 0.05rem;
            z-index: 1;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .sidebar hr {
            margin: 0 1rem;
            border-top: 1px solid rgba(255, 255, 255, 0.15);
        }
        
        .sidebar-heading {
            text-align: left;
            padding: 0 1rem;
            font-weight: 800;
            font-size: 0.65rem;
            color: rgba(255, 255, 255, 0.6);
            text-transform: uppercase;
            margin: 1rem 0 0.5rem;
        }
        
        .nav-item {
            position: relative;
        }
        
        .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 0.75rem 1rem;
            display: block;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .nav-link:hover,
        .nav-link:focus,
        .nav-link.active {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .nav-link i {
            margin-right: 0.5rem;
            opacity: 0.75;
        }
        
        /* Topbar */
        .topbar {
            height: 4.5rem;
            background-color: white;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }
        
        .topbar .navbar {
            height: 4.5rem;
            padding: 0 1rem;
        }
        
        .topbar .dropdown-menu {
            min-width: 10rem;
            font-size: 0.85rem;
            border: none;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }
        
        .topbar .dropdown-menu .dropdown-item {
            font-weight: 800;
            padding: 0.5rem 1rem;
        }
        
        .topbar .dropdown-menu .dropdown-divider {
            margin: 0.5rem 0;
        }
        
        /* Cards */
        .card {
            border: none;
            border-radius: 0.35rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }
        
        .card-header {
            background-color: #f8f9fc;
            border-bottom: 1px solid #e3e6f0;
        }
        
        .card-header h6 {
            font-weight: 700;
            color: var(--primary);
        }
        
        /* Tables */
        .table thead th {
            background-color: #f8f9fc;
            border-bottom: 2px solid #e3e6f0;
            font-weight: 700;
            color: #5a5c69;
        }
        
        /* Content */
        #content-wrapper {
            margin-left: 250px;
        }
        
        /* Toggle Menu Button */
        #sidebarToggle {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            border: none;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 1rem;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            #content-wrapper {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <!-- Sidebar -->
        <div class="sidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url('admin') ?>">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-utensils"></i>
                </div>
                <div class="sidebar-brand-text mx-3">TomanFood</div>
            </a>
            
            <hr class="sidebar-divider my-0">
            
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link <?= uri_string() == 'admin' ? 'active' : '' ?>" href="<?= site_url('admin') ?>">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <hr class="sidebar-divider">
                
                <div class="sidebar-heading">
                    Manajemen
                </div>
                
                <li class="nav-item">
                    <a class="nav-link <?= strpos(uri_string(), 'admin/restaurants') !== false ? 'active' : '' ?>" href="<?= site_url('admin/restaurants') ?>">
                        <i class="fas fa-fw fa-store"></i>
                        <span>Restoran</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link <?= strpos(uri_string(), 'admin/menus') !== false ? 'active' : '' ?>" href="<?= site_url('admin/menus') ?>">
                        <i class="fas fa-fw fa-utensils"></i>
                        <span>Menu</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link <?= strpos(uri_string(), 'admin/orders') !== false ? 'active' : '' ?>" href="<?= site_url('admin/orders') ?>">
                        <i class="fas fa-fw fa-shopping-cart"></i>
                        <span>Pesanan</span>
                    </a>
                </li>
                
                <hr class="sidebar-divider">
                
                <div class="sidebar-heading">
                    Akun
                </div>
                
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('auth/logout') ?>">
                        <i class="fas fa-fw fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle -->
                    <button id="sidebarToggle" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    
                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Cari..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle" src="https://via.placeholder.com/60">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                 aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profil
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Pengaturan
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= site_url('auth/logout') ?>">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->
                
                <!-- Page Content -->
                <?= $this->renderSection('content') ?>
                <!-- End of Page Content -->
            </div>
            <!-- End of Main Content -->
            
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; TomanFood <?= date('Y') ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    
    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom scripts -->
    <script>
        // Toggle sidebar
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('show');
        });
        
        // Responsive sidebar
        function checkWidth() {
            if (window.innerWidth < 768) {
                document.querySelector('.sidebar').classList.remove('show');
            } else {
                document.querySelector('.sidebar').classList.remove('show');
            }
        }
        
        window.addEventListener('resize', checkWidth);
        checkWidth();
    </script>
</body>
</html>