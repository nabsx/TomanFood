<?php namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table = 'menus';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    
    protected $allowedFields = [
        'restaurant_id', 'name', 'description', 'price', 'created_at'
    ];
    
    protected $useTimestamps = false;
    protected $useSoftDeletes = false;
}