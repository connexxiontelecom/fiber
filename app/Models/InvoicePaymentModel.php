<?php
namespace App\Models;

use CodeIgniter\Model;

class InvoicePaymentModel extends Model {
  protected $table = 'invoice_payments';
  protected $primaryKey = 'invoice_payments_id';
  protected $allowedFields = [
    'invoice_id', 'description', 'quantity',
  ];
}