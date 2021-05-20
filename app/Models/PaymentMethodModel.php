<?php
namespace App\Models;

use CodeIgniter\Model;

class PaymentMethodModel extends Model {
  protected $table = 'payment_methods';
  protected $primaryKey = 'payment_method_id';
  protected $allowedFields = [
    'name', 'status'
  ];
}