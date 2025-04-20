<?php namespace App\Controllers;

use App\Models\RestaurantModel;
use App\Models\MenuModel;
use App\Models\OrderModel;

class Admin extends BaseController
{
    protected $restaurantModel;
    protected $menuModel;
    protected $orderModel;
    
    public function __construct()
    {
        $this->restaurantModel = new RestaurantModel();
        $this->menuModel = new MenuModel();
        $this->orderModel = new OrderModel();
        
        // Validasi admin
        helper(['form', 'url']);
    }
    
    public function index()
    {
        // Validasi user is admin
        if (!session()->get('isLoggedIn') || session()->get('username') != 'admin') {
            return redirect()->to('/auth/login');
        }
        
        // Data untuk dashboard
        $data['totalRestaurants'] = $this->restaurantModel->countAllResults();
        $data['totalMenus'] = $this->menuModel->countAllResults();
        $data['totalOrders'] = $this->orderModel->countAllResults();
        
        // Ambil 5 pesanan terbaru
        $data['recentOrders'] = $this->orderModel->orderBy('id', 'DESC')->limit(5)->find();
        
        // Jumlah pendapatan
        $data['totalRevenue'] = $this->orderModel->selectSum('total')->first()['total'] ?? 0;
        
        // Ambil data restoran untuk dashboard
        $data['restaurants'] = $this->restaurantModel->findAll(3);
        
        return view('head/admin', $data);
    }
    
    // ===== RESTAURANT MANAGEMENT =====
    
    public function restaurants()
    {
        // Validasi user is admin
        if (!session()->get('isLoggedIn') || session()->get('username') != 'admin') {
            return redirect()->to('/auth/login');
        }
        
        $data['restaurants'] = $this->restaurantModel->findAll();
        return view('admin/restaurants', $data);
    }
    
    public function addRestaurant()
    {
        // Validasi user is admin
        if (!session()->get('isLoggedIn') || session()->get('username') != 'admin') {
            return redirect()->to('/auth/login');
        }
        
        if ($this->request->getMethod() === 'post') {
            // Validasi input
            $rules = [
                'name' => 'required|min_length[3]|max_length[100]',
                'description' => 'required',
                'rating' => 'required|numeric|less_than_equal_to[5.0]|greater_than_equal_to[0.0]'
            ];
            
            if ($this->validate($rules)) {
                $data = [
                    'name' => $this->request->getPost('name'),
                    'description' => $this->request->getPost('description'),
                    'rating' => $this->request->getPost('rating'),
                    'created_at' => date('Y-m-d H:i:s')
                ];
                
                $this->restaurantModel->insert($data);
                return redirect()->to('/admin/restaurants')->with('success', 'Restoran berhasil ditambahkan');
            } else {
                $data['validation'] = $this->validator;
            }
        }
        
        return view('admin/add_restaurant', $data ?? []);
    }
    
    public function editRestaurant($id = null)
    {
        // Validasi user is admin
        if (!session()->get('isLoggedIn') || session()->get('username') != 'admin') {
            return redirect()->to('/auth/login');
        }
        
        if ($id === null) {
            return redirect()->to('/admin/restaurants');
        }
        
        $data['restaurant'] = $this->restaurantModel->find($id);
        
        if (empty($data['restaurant'])) {
            return redirect()->to('/admin/restaurants')->with('error', 'Restoran tidak ditemukan');
        }
        
        if ($this->request->getMethod() === 'post') {
            // Validasi input
            $rules = [
                'name' => 'required|min_length[3]|max_length[100]',
                'description' => 'required',
                'rating' => 'required|numeric|less_than_equal_to[5.0]|greater_than_equal_to[0.0]'
            ];
            
            if ($this->validate($rules)) {
                $updateData = [
                    'name' => $this->request->getPost('name'),
                    'description' => $this->request->getPost('description'),
                    'rating' => $this->request->getPost('rating')
                ];
                
                $this->restaurantModel->update($id, $updateData);
                return redirect()->to('/admin/restaurants')->with('success', 'Restoran berhasil diperbarui');
            } else {
                $data['validation'] = $this->validator;
            }
        }
        
        return view('admin/edit_restaurant', $data);
    }
    
    public function deleteRestaurant($id = null)
    {
        // Validasi user is admin
        if (!session()->get('isLoggedIn') || session()->get('username') != 'admin') {
            return redirect()->to('/auth/login');
        }
        
        if ($id === null) {
            return redirect()->to('/admin/restaurants');
        }
        
        // Cek apakah restoran memiliki menu
        $menuCount = $this->menuModel->where('restaurant_id', $id)->countAllResults();
        
        if ($menuCount > 0) {
            return redirect()->to('/admin/restaurants')->with('error', 'Tidak dapat menghapus restoran karena masih memiliki menu');
        }
        
        // Hapus restoran
        $this->restaurantModel->delete($id);
        return redirect()->to('/admin/restaurants')->with('success', 'Restoran berhasil dihapus');
    }
    
    // ===== MENU MANAGEMENT =====
    
    public function menus($restaurantId = null)
    {
        // Validasi user is admin
        if (!session()->get('isLoggedIn') || session()->get('username') != 'admin') {
            return redirect()->to('/auth/login');
        }
        
        // Filter by restaurant jika id disediakan
        if ($restaurantId !== null) {
            $data['menus'] = $this->menuModel->where('restaurant_id', $restaurantId)->findAll();
            $data['restaurant'] = $this->restaurantModel->find($restaurantId);
        } else {
            // Join dengan tabel restaurants untuk mendapatkan nama restoran
            $data['menus'] = $this->menuModel
                ->select('menus.*, restaurants.name as restaurant_name')
                ->join('restaurants', 'restaurants.id = menus.restaurant_id')
                ->findAll();
        }
        
        $data['restaurants'] = $this->restaurantModel->findAll();
        return view('admin/menus', $data);
    }
    
    public function addMenu()
    {
        // Validasi user is admin
        if (!session()->get('isLoggedIn') || session()->get('username') != 'admin') {
            return redirect()->to('/auth/login');
        }
        
        // Load semua restoran untuk dropdown
        $data['restaurants'] = $this->restaurantModel->findAll();
        
        if ($this->request->getMethod() === 'post') {
            // Validasi input
            $rules = [
                'restaurant_id' => 'required|numeric',
                'name' => 'required|min_length[3]|max_length[100]',
                'description' => 'required',
                'price' => 'required|numeric|greater_than[0]'
            ];
            
            if ($this->validate($rules)) {
                $data = [
                    'restaurant_id' => $this->request->getPost('restaurant_id'),
                    'name' => $this->request->getPost('name'),
                    'description' => $this->request->getPost('description'),
                    'price' => $this->request->getPost('price'),
                    'created_at' => date('Y-m-d H:i:s')
                ];
                
                $this->menuModel->insert($data);
                return redirect()->to('/admin/menus')->with('success', 'Menu berhasil ditambahkan');
            } else {
                $data['validation'] = $this->validator;
            }
        }
        
        return view('admin/add_menu', $data);
    }
    
    public function editMenu($id = null)
    {
        // Validasi user is admin
        if (!session()->get('isLoggedIn') || session()->get('username') != 'admin') {
            return redirect()->to('/auth/login');
        }
        
        if ($id === null) {
            return redirect()->to('/admin/menus');
        }
        
        $data['menu'] = $this->menuModel->find($id);
        
        if (empty($data['menu'])) {
            return redirect()->to('/admin/menus')->with('error', 'Menu tidak ditemukan');
        }
        
        // Load semua restoran untuk dropdown
        $data['restaurants'] = $this->restaurantModel->findAll();
        
        if ($this->request->getMethod() === 'post') {
            // Validasi input
            $rules = [
                'restaurant_id' => 'required|numeric',
                'name' => 'required|min_length[3]|max_length[100]',
                'description' => 'required',
                'price' => 'required|numeric|greater_than[0]'
            ];
            
            if ($this->validate($rules)) {
                $updateData = [
                    'restaurant_id' => $this->request->getPost('restaurant_id'),
                    'name' => $this->request->getPost('name'),
                    'description' => $this->request->getPost('description'),
                    'price' => $this->request->getPost('price')
                ];
                
                $this->menuModel->update($id, $updateData);
                return redirect()->to('/admin/menus')->with('success', 'Menu berhasil diperbarui');
            } else {
                $data['validation'] = $this->validator;
            }
        }
        
        return view('admin/edit_menu', $data);
    }
    
    public function deleteMenu($id = null)
    {
        // Validasi user is admin
        if (!session()->get('isLoggedIn') || session()->get('username') != 'admin') {
            return redirect()->to('/auth/login');
        }
        
        if ($id === null) {
            return redirect()->to('/admin/menus');
        }
        
        // Cek apakah menu ada dalam order
        $orderItemModel = new \App\Models\OrderItemModel();
        $orderItems = $orderItemModel->where('menu_id', $id)->countAllResults();
        
        if ($orderItems > 0) {
            return redirect()->to('/admin/menus')->with('error', 'Tidak dapat menghapus menu karena sudah ada pesanan');
        }
        
        // Hapus menu
        $this->menuModel->delete($id);
        return redirect()->to('/admin/menus')->with('success', 'Menu berhasil dihapus');
    }
    
    // ===== ORDER MANAGEMENT =====
    
    public function orders()
    {
        // Validasi user is admin
        if (!session()->get('isLoggedIn') || session()->get('username') != 'admin') {
            return redirect()->to('/auth/login');
        }
        
        // Get orders with pagination
        $data['orders'] = $this->orderModel->orderBy('id', 'DESC')->paginate(10);
        $data['pager'] = $this->orderModel->pager;
        
        return view('admin/orders', $data);
    }
    
    public function orderDetail($id = null)
    {
        // Validasi user is admin
        if (!session()->get('isLoggedIn') || session()->get('username') != 'admin') {
            return redirect()->to('/auth/login');
        }
        
        if ($id === null) {
            return redirect()->to('/admin/orders');
        }
        
        $data['order'] = $this->orderModel->find($id);
        
        if (empty($data['order'])) {
            return redirect()->to('/admin/orders')->with('error', 'Pesanan tidak ditemukan');
        }
        
        // Get order items
        $orderItemModel = new \App\Models\OrderItemModel();
        $data['orderItems'] = $orderItemModel->where('order_id', $id)->findAll();
        
        return view('admin/order_detail', $data);
    }
}