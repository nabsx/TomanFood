<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        // Logic login di sini
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        
        // Validasi dan proses login
        $data = [
            'title' => 'login'
        ];
        return view ('login/login',$data);
        // Redirect sesuai hasil
    }
   
        
    
}