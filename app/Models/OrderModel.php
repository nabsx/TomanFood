<?php namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    
    protected $allowedFields = [
        'restaurant_id', 'menu_id', 'menu_name', 'quantity', 'price', 'total', 'created_at'
    ];
    
    protected $useTimestamps = false;
    protected $useSoftDeletes = false;
}