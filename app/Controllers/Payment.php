<?php

namespace App\Controllers;

class Payment extends BaseController
{
  public function index() {
    if ($this->session->active) {
      $page_data['title'] = 'Payment History';
      if ($this->session->is_admin) {
        return view('payment/index', $page_data);
      }
      return view('payment/index-alt', $page_data);
    }
    return redirect('auth');
  }

  public function new_payment() {
    if ($this->session->active) {
      if ($this->session->is_admin) {
        $page_data['title'] = 'New Payment';
        $page_data['subscriptions'] = $this->_get_subscriptions();
        return view('payment/new-payment', $page_data);
      }
      return $this->_unauthorized();
    }
    return redirect('auth');
  }

  private function _get_subscriptions() {
    $subscriptions = $this->subscriptionModel->findAll();
    foreach ($subscriptions as $key => $subscription) {
      $date = date_create($subscription['start_date']);
      $customer = $this->userModel->where('user_id', $subscription['user_id'])->first();
      $subscriptions[$key]['tag'] = $subscription['description'].' for '. $customer['name'].' starting '. date_format($date, 'd M Y');
    }
    return $subscriptions;
  }
}