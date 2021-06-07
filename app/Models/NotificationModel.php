<?php
namespace App\Models;

use CodeIgniter\Model;

class NotificationModel extends Model {
  protected $table = 'notifications';
  protected $primaryKey = 'notification_id';
  protected $allowedFields = [
    'sender_id', 'receiver_id', 'subject_id', 'type', 'topic', 'seen'
  ];
}