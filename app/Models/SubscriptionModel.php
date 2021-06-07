<?php
namespace App\Models;

use CodeIgniter\Model;

class SubscriptionModel extends Model {
  protected $table = 'subscriptions';
  protected $primaryKey = 'subscription_id';
  protected $allowedFields = [
    'user_id', 'plan_id', 'description', 'duration', 'start_date', 'end_date', 'ipv4_address', 'mac_address', 'status', 'is_cancelled'
  ];
}