<?php namespace App\Models;

use CodeIgniter\Model;

class OrderItemModel extends Model
{
    protected $table = 'order_items';
    protected $primaryKey = 'id';
    protected $allowedFields = ['order_id', 'menu_id', 'quantity', 'price'];

    public function createOrderItems($orderId, $items)
    {
        $data = array_map(function($item) use ($orderId) {
            return [
                'order_id' => $orderId,
                'menu_id' => $item['menu_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ];
        }, $items);

        return $this->insertBatch($data);
    }
}