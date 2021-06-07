<?php
namespace App\Models;

use CodeIgniter\Model;

class SubscriptionRequestModel extends Model {
  protected $table = 'subscription_requests';
  protected $primaryKey = 'subscription_request_id';
  protected $allowedFields = [
    'user_id', 'subscription_id', 'plan_id', 'duration', 'type', 'status'
  ];
}