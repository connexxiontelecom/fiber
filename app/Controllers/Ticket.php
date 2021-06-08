<?php
namespace App\Controllers;

class Ticket extends BaseController {
  public function index() {
    if ($this->session->active) {
      $page_data['title'] = 'Tickets';
      if ($this->session->is_admin) {
        return view('ticket/index', $page_data);
      }
      $page_data['tickets'] = $this->ticketModel->where('sender_id', $this->session->user_id)->findAll();
      return view('ticket/index-alt', $page_data);
    }
    return redirect('auth');
  }

  public function new_ticket() {
    if ($this->session->active) {
      $page_data['title'] = 'New Ticket';
      return view('ticket/new-ticket', $page_data);
    }
    return redirect('auth');
  }

  public function view_ticket($ticket_id) {
    if ($this->session->active) {
      $page_data['title'] = 'View Ticket';
      $ticket = $this->_get_ticket($ticket_id);
      if ($ticket) {
        $page_data['ticket'] = $ticket;
        if ($this->session->is_admin) {
          return view('ticket/view-ticket', $page_data);
        }
        return view('ticket/view-ticket-alt', $page_data);
      }
      return $this->_not_found();
    }
    return redirect('auth');
  }

  public function create_ticket() {
    if ($this->session->active) {
      $this->validation->setRules([
        'subject' => 'required',
        'body' => 'required',
        'category' => 'required',
        'priority' => 'required',
      ]);
      $response_data = array();
      if ($this->validation->withRequest($this->request)->run()) {
        $post_data = $this->request->getPost();
        $ticket_data = array(
          'sender_id' => $this->session->user_id,
          'receiver_id' => 1,
          'id' => 'T'.substr(md5(time()), 0, 7),
          'subject' => $post_data['subject'],
          'body' => $post_data['body'],
          'category' => $post_data['category'],
          'priority' => $post_data['priority'],
          'status' => 1,
        );
        $new_ticket = $this->ticketModel->insert($ticket_data);
        if ($new_ticket) {
          $this->_create_new_notification(
            $this->session->user_id,
            1,
            $new_ticket,
            'submit_ticket',
            'A new support ticket has been submitted'
          );
          $response_data['success'] = true;
          $response_data['msg'] = 'Successfully submitted a new ticket';
        } else {
          $response_data['success'] = false;
          $response_data['msg'] = 'There was a problem submitting a new ticket';
        }
      } else {
        $response_data['success'] = false;
        $response_data['msg'] = 'There was a problem submitting a new ticket';
        $response_data['meta'] = $this->validation->getErrors();
      }
      return $this->response->setJSON($response_data);
    }
    return redirect('auth');
  }

  public function create_customer_ticket_response() {
    if ($this->session->active) {
      $this->validation->setRules([
        'ticket_id' => 'required',
        'body' => 'required',
      ]);
      $response_data = array();
      if ($this->validation->withRequest($this->request)->run()) {
        $post_data = $this->request->getPost();
        $ticket_data = array(
          'sender_id' => $this->session->user_id,
          'receiver_id' => 1,
          'ticket_id' => $post_data['ticket_id'],
          'body' => $post_data['body'],
        );
        $ticket_response = $this->ticketResponseModel->insert($ticket_data);
        if ($ticket_response) {
          $this->_create_new_notification(
            $this->session->user_id,
            1,
            $ticket_response,
            'submit_ticket_response',
            'A new ticket response has been submitted'
          );
          $response_data['success'] = true;
          $response_data['msg'] = 'Successfully submitted a new ticket response';
        } else {
          $response_data['success'] = false;
          $response_data['msg'] = 'There was a problem submitting a new ticket response';
        }
      } else {
        $response_data['success'] = false;
        $response_data['msg'] = 'There was a problem submitting a new ticket response';
        $response_data['meta'] = $this->validation->getErrors();
      }
      return $this->response->setJSON($response_data);
    }
    return redirect('auth');
  }

  private function _get_ticket($ticket_id) {
    $ticket = $this->ticketModel->find($ticket_id);
    if ($ticket) {
      $customer = $this->userModel->find($ticket['sender_id']);
      $responses = $this->ticketResponseModel->where('ticket_id', $ticket['ticket_id'])->findAll();
      foreach ($responses as $key => $res) {
        $sender = $this->userModel->find($res['sender_id']);
        $receiver = $this->userModel->find($res['receiver_id']);
        $responses[$key]['sender'] = $sender;
        $responses[$key]['receiver'] = $receiver;
      }
      $ticket['customer'] = $customer;
      $ticket['responses'] = $responses;
    }
    return $ticket;
  }
}