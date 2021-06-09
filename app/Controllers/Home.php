<?php

namespace App\Controllers;

class Home extends BaseController {

	public function index() {
	  if ($this->session->active) {
      $page_data['title'] = 'Dashboard';
      if ($this->session->is_admin) {
        $page_data['pending_requests'] = $this->_get_pending_requests();
        $page_data['active_subscriptions'] = $this->_get_active_subscriptions();
        $page_data['open_tickets'] = $this->_get_open_tickets();
        $page_data['unpaid_invoices'] = $this->_get_unpaid_invoices();
        $page_data['all_payments'] = $this->_get_all_payments();
        return view('index', $page_data);
      }
      $page_data['active_subscriptions'] = $this->_get_customer_active_subscriptions();
      $page_data['unpaid_invoices'] = $this->_get_customer_unpaid_invoices();
      return view('index-alt', $page_data);
    }
	  return redirect('auth');
	}

	private function _get_pending_requests() {
    return $this->subscriptionRequestModel->where('status', 0)->findAll();
  }

  private function _get_active_subscriptions() {
    return $this->subscriptionModel->where('status', 1)->findAll();
  }

  private function _get_open_tickets() {
	  return $this->ticketModel->where('status', 1)->findAll();
  }

  private function _get_unpaid_invoices() {
    return $this->invoiceModel->where('is_paid', 0)->findAll();
  }

  private function _get_all_payments() {
	  return $this->paymentModel->findAll();
  }

	private function _get_customer_unpaid_invoices(): array {
	  $subscriptions = $this->subscriptionModel->where('user_id', $this->session->user_id)->findAll();
	  $invoices = array();
	  foreach ($subscriptions as $subscription) {
	    $user_invoices = $this->invoiceModel->where([
	      'subscription_id' => $subscription['subscription_id'],
        'is_paid' => 0
      ])->findAll();
	    foreach ($user_invoices as $user_invoice) {
        array_push($invoices, $user_invoice);
      }
    }
	  return $invoices;
  }

  private function _get_customer_active_subscriptions() {
	  return $this->subscriptionModel->where([
      'user_id' => $this->session->user_id,
      'status' => 1,
    ])->findAll();
  }
}