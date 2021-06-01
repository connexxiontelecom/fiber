<?php
namespace App\Models;

use CodeIgniter\Model;

class PaymentModel extends Model {
  protected $table = 'payments';
  protected $primaryKey = 'payment_id';
  protected $allowedFields = [
    'subscription_id', 'invoice_id', 'receipt_id', 'user_id', 'issue_date', 'due_date', 'amount', 'amount_paid', 'status'
  ];
}