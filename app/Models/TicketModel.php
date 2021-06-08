<?php
namespace App\Models;

use CodeIgniter\Model;

class TicketModel extends Model {
  protected $table = 'tickets';
  protected $primaryKey = 'ticket_id';
  protected $allowedFields = [
    'sender_id', 'receiver_id', 'id', 'subject', 'body', 'category', 'priority', 'status'
  ];
}