<?php
namespace App\Models;

use CodeIgniter\Model;

class PlanModel extends Model {
  protected $table = 'plans';
  protected $primaryKey = 'plan_id';
  protected $allowedFields = [
    'name', 'price', 'status'
  ];
}