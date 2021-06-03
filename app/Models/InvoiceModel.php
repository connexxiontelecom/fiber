<?php
namespace App\Models;

use CodeIgniter\Model;

class InvoiceModel extends Model {
  protected $table = 'invoices';
  protected $primaryKey = 'invoice_id';
  protected $allowedFields = [
    'subscription_id', 'id', 'is_paid', 'issue_date', 'due_date', 'is_current', 'subscription', 'plan', 'period', 'price'
  ];
}