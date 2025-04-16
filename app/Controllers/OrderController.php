<?php namespace App\Controllers;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use App\Models\OrderModel;
use App\Models\OrderItemModel;

class OrderController extends BaseController
{
    protected $orderModel;
    protected $orderItemModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
        $this->orderItemModel = new OrderItemModel();
    }

    public function checkout()
{
    if (!$this->request->isAJAX()) {
        return $this->response->setStatusCode(405)->setJSON([
            'success' => false,
            'message' => 'Method not allowed'
        ]);
    }

    // Validasi input
    $rules = [
        'customer_name' => 'required|min_length[3]',
        'payment_method' => 'required',
        'items' => 'required'
    ];

    if (!$this->validate($rules)) {
        return $this->response->setStatusCode(400)->setJSON([
            'success' => false,
            'message' => 'Data tidak valid',
            'errors' => $this->validator->getErrors()
        ]);
    }

    $data = $this->request->getJSON(true);
    
    $db = \Config\Database::connect();
    $db->transStart();
    
    try {
        // Simpan data order utama
        $orderData = [
            'customer_name' => $data['customer_name'],
            'payment_method' => $data['payment_method'],
            'created_at' => date('Y-m-d H:i:s')
        ];
        
        $orderId = $this->orderModel->createOrder($orderData);
        
        if (!$orderId) {
            throw new \Exception('Gagal membuat order utama');
        }
        
        // Validasi items
        if (!is_array($data['items']) || empty($data['items'])) {
            throw new \Exception('Item pesanan tidak valid');
        }
        
        // Simpan item-item order
        $result = $this->orderItemModel->createOrderItems($orderId, $data['items']);
        
        if (!$result) {
            throw new \Exception('Gagal menyimpan item order');
        }
        
        $db->transComplete();
        
        if ($db->transStatus() === false) {
            throw new \Exception('Gagal menyimpan data order');
        }
        
        return $this->response->setJSON([
            'success' => true,
            'message' => 'Pesanan berhasil diproses',
            'order_id' => $orderId
        ]);
        
    } catch (\Exception $e) {
        $db->transRollback();
        log_message('error', 'Order Error: ' . $e->getMessage());
        return $this->response->setStatusCode(500)->setJSON([
            'success' => false,
            'message' => $e->getMessage()
        ]);
    }
}
}