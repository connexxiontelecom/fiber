<?php
namespace App\Models;

use CodeIgniter\Model;

class PaymentModel extends Model {
  protected $table = 'payments';
  protected $primaryKey = 'payment_id';
  protected $allowedFields = [
    'payment_method_id', 'invoice_id', 'receipt_id', 'detail_id', 'is_plan', 'date'
  ];
}