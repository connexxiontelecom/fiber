<?php
namespace App\Models;

use CodeIgniter\Model;

class CustomerInfoModel extends Model {
  protected $table = 'customer_info';
  protected $primaryKey = 'customer_info_id';
  protected $allowedFields = [
    'user_id', 'payment_method_id', 'phone', 'address'
  ];
}