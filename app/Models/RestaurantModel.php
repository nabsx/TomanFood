<?php namespace App\Models;

use CodeIgniter\Model;

class RestaurantModel extends Model
{
    protected $table = 'restaurants';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    
    protected $allowedFields = [
        'name', 'description', 'rating', 'created_at'
    ];
    
    protected $useTimestamps = false;
    protected $useSoftDeletes = false;
}