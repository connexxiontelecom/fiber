<?php
namespace App\Models;

use CodeIgniter\Model;

class TicketResponseModel extends Model {
  protected $table = 'ticket_responses';
  protected $primaryKey = 'ticket_response_id';
  protected $allowedFields = [
    'sender_id', 'receiver_id', 'ticket_id', 'body'
  ];
}