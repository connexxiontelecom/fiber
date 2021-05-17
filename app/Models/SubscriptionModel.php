<?php
namespace App\Models;

use CodeIgniter\Model;

class SubscriptionModel extends Model {
  protected $table = 'subscriptions';
  protected $primaryKey = 'subscription_id';
  protected $allowedFields = [
    'user_id', 'description', 'plan', 'price', 'start_date', 'end_date', 'duration', 'ipv4_address', 'status'
  ];
}