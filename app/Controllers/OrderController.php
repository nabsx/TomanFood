<?php namespace App\Controllers;

class OrderController extends BaseController
{
    protected $orderModel;
    protected $orderItemModel;

    public function __construct()
    {
        helper(['form']);
        $this->orderModel = new \App\Models\OrderModel();
        $this->orderItemModel = new \App\Models\OrderItemModel();
    }

    public function checkout()
    {
        // Log request untuk debugging
        log_message('info', 'Checkout request received');
        
        // Terima request yang dibuat dengan AJAX maupun tidak
        $isAjax = $this->request->isAJAX();
        
        // Get JSON input from raw request body if not found in normal request
        $inputJSON = $this->request->getJSON(true);
        if (empty($inputJSON)) {
            $rawInput = $this->request->getBody();
            if (!empty($rawInput)) {
                $inputJSON = json_decode($rawInput, true);
            }
        }
        
        // Log data untuk debugging
        log_message('info', 'Input data: ' . json_encode($inputJSON));
        
        // Validasi data
        if (empty($inputJSON) || empty($inputJSON['items']) || !is_array($inputJSON['items'])) {
            log_message('error', 'Invalid order data received: ' . json_encode($inputJSON));
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Data pesanan tidak valid'
            ])->setStatusCode(400);
        }
        
        $db = \Config\Database::connect();
        $db->transStart();
        
        try {
            // Data order
            $orderData = [
                'restaurant_id' => 1, // Default restaurant ID
                'menu_id' => null, // Akan diisi dengan item pertama untuk backward compatibility
                'menu_name' => null, // Akan diisi dengan item pertama untuk backward compatibility
                'quantity' => 0, // Total item
                'price' => 0, // Akan dihitung
                'total' => 0, // Akan dihitung
                'created_at' => date('Y-m-d H:i:s')
            ];
            
            // Hitung total quantity dan price
            $totalItems = 0;
            $totalPrice = 0;
            
            foreach ($inputJSON['items'] as $item) {
                $totalItems += $item['quantity'];
                $totalPrice += ($item['price'] * $item['quantity']);
                
                // Ambil data item pertama untuk order (backward compatibility)
                if ($orderData['menu_id'] === null) {
                    $orderData['menu_id'] = $item['menu_id'];
                    $orderData['menu_name'] = $item['name'] ?? 'Menu Item';
                }
            }
            
            $orderData['quantity'] = $totalItems;
            $orderData['price'] = $totalPrice / $totalItems; // Harga rata-rata
            $orderData['total'] = $totalPrice;
            
            // Insert order
            $orderId = $this->orderModel->insert($orderData);
            
            if (!$orderId) {
                throw new \Exception('Gagal membuat order baru');
            }
            
            // Insert order items
            $orderItems = [];
            foreach ($inputJSON['items'] as $item) {
                $orderItems[] = [
                    'order_id' => $orderId,
                    'menu_id' => $item['menu_id'],
                    'menu_name' => $item['name'] ?? 'Menu Item',
                    'quantity' => $item['quantity'],
                    'price' => $item['price']
                ];
            }
            
            // Insert batch
            if (!empty($orderItems)) {
                $this->orderItemModel->insertBatch($orderItems);
            }
            
            $db->transComplete();
            
            if ($db->transStatus() === false) {
                throw new \Exception('Transaction failed');
            }
            
            // Log success
            log_message('info', 'Order successfully created with ID: ' . $orderId);
            
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Pesanan berhasil dibuat',
                'order_id' => $orderId
            ]);
            
        } catch (\Exception $e) {
            $db->transRollback();
            log_message('error', 'Order creation failed: ' . $e->getMessage());
            
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ])->setStatusCode(500);
        }
    }
}