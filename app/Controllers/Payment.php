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
        $page_data['invoices'] = $this->invoiceModel->where('is_paid', 0)->findAll();
        return view('payment/new-payment', $page_data);
      }
      return $this->_unauthorized();
    }
    return redirect('auth');
  }

  public function create_payment() {
    if ($this->session->active) {
      $this->validation->setRules([
        'invoice' => 'required',
        'date' => 'required',
        'amount' => 'required',
      ]);
      $response_data = array();
      if ($this->validation->withRequest($this->request)->run()) {
        $post_data = $this->request->getPost();
        $invoice = $this->invoiceModel->find($post_data['invoice']);
        if ($invoice) {
          $payment_data = array(
            'id' => substr(md5(time()), 0, 7),
            'invoice_id' => $post_data['invoice'],
            'date' => $post_data['date'],
            'amount' => $post_data['amount'],
          );
          $new_payment = $this->paymentModel->insert($payment_data);
          if ($new_payment) {
            $invoice_data = [
              'invoice_id' => $invoice['invoice_id'],
              'is_paid' => 1
            ];
            $this->invoiceModel->save($invoice_data);
            $response_data['success'] = true;
            $response_data['msg'] = 'Successfully created new payment';
          } else {
            $response_data['success'] = false;
            $response_data['msg'] = 'There was a problem creating new payment';
          }
        } else {
          $response_data['success'] = false;
          $response_data['msg'] = 'The invoice for this payment does not exist';
        }
      } else {
        $response_data['success'] = false;
        $response_data['msg'] = 'There was a problem creating new payment';
        $response_data['meta'] = $this->validation->getErrors();
      }
      return $this->response->setJSON($response_data);
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