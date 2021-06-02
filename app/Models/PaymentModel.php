<?php
namespace App\Models;

use CodeIgniter\Model;

class PaymentModel extends Model {
  protected $table = 'payments';
  protected $primaryKey = 'payment_id';
  protected $allowedFields = [
    'id', 'invoice_id', 'date', 'amount'
  ];
}