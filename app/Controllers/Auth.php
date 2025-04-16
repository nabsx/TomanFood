<?php

namespace App\Controllers;

class Auth extends BaseController
{
    protected $session;
    protected $validation;
    
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
        helper(['form', 'url']);
    }
    
    public function index()
    {
        $data = [
            'title' => 'Login'
        ];
        return view('auth/login', $data);
    }
    
    public function login()
    {
        {
            // Validasi input
    $rules = [
        'username' => 'required',
        'password' => 'required'
    ];

    if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    // Ambil username dan password dari input
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');
    
    // Cek apakah username ada di database
    $userModel = new \App\Models\UserModel();
    $user = $userModel->where('username', $username)->first();
    
    if ($user && password_verify($password, $user['password'])) {
        // Login berhasil
        $this->session->set('isLoggedIn', true);
        $this->session->set('userId', $user['id']);
        
        // Cek apakah user adalah admin
        if ($username === 'admin') {  // atau Anda bisa menggunakan field role misalnya $user['role'] === 'admin'
            return redirect()->to('head/admin');  // Redirect ke halaman admin
        } else {
            return redirect()->to('layout/home');  // Redirect ke halaman biasa
        }
    } else {
        // Login gagal
        return redirect()->back()->with('error', 'Username atau password salah');}
        }
    }
    
    public function register()
    {
        $data = [
            'title' => 'Register'
        ];
        return view('auth/register', $data);
    }
    
    public function saveRegister()
    {
        // Validasi input
        $rules = [
            'first_name' => 'required',
            'email' => 'required|valid_email|is_unique[users.email]',
            'username' => 'required|is_unique[users.username]',
            'password' => 'required|min_length[8]',
            'confirm_password' => 'required|matches[password]'
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        // Simpan data user
        $userModel = new \App\Models\UserModel();
        $data = [
            'first_name' => $this->request->getPost('first_name'),
            'last_name' => $this->request->getPost('last_name'),
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ];
        
        $userModel->insert($data);
        
        return redirect()->to('auth/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
    
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/');
    }
}