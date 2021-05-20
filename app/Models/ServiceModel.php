<?php
namespace App\Models;

use CodeIgniter\Model;

class ServiceModel extends Model {
  protected $table = 'services';
  protected $primaryKey = 'service_id';
  protected $allowedFields = [
    'name', 'price', 'status'
  ];
}