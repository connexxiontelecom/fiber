<?php

namespace App\Controllers;

class Payment extends BaseController
{
  public function index() {
    if ($this->session->active) {
      $page_data['title'] = 'Payment History';
      if ($this->session->is_admin) {
        $page_data['payments'] = $this->_get_payments();
        return view('payment/index', $page_data);
      }
      $page_data['payments'] = $this->_get_customer_payments();
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

  public function view_payment_receipt($payment_id) {
    if ($this->session->active) {
      $receipt = $this->_get_receipt($payment_id);
      if ($receipt) {
        $page_data['title'] = 'View Receipt';
        $page_data['receipt'] = $receipt;
        $page_data['payment'] = $this->paymentModel->find($payment_id);
        return view('payment/view-receipt', $page_data);
      }
      return $this->_not_found();
    }
    return redirect('auth');
  }

  public function print_payment_receipt($payment_id) {
    if ($this->session->active) {
      $receipt = $this->_get_receipt($payment_id);
      $payment = $this->paymentModel->find($payment_id);
      if ($receipt) {
        $page_data['title'] = 'Receipt #'.$payment['id'];
        $page_data['receipt'] = $receipt;
        $page_data['payment'] = $payment;
        return view('payment/print-receipt', $page_data);
      }
      return $this->_not_found();
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

  private function _get_payments() {
    $payments = $this->paymentModel->findAll();
    foreach ($payments as $key => $payment) {
      $invoice = $this->invoiceModel->find($payment['invoice_id']);
      if ($invoice) {
        $subscription = $this->subscriptionModel->find($invoice['subscription_id']);
        if ($subscription) {
          $customer = $this->userModel->find($subscription['user_id']);
          $payments[$key]['invoice'] = $invoice;
          $payments[$key]['subscription'] = $subscription;
          $payments[$key]['customer'] = $customer;
        }
      }
    }
    return $payments;
  }

  private function _get_customer_payments() {
    $invoices = array();
    $payments = array();
    $subscriptions = $this->subscriptionModel->where('user_id', $this->session->user_id)->findAll();
    foreach ($subscriptions as $subscription) {
      $user_invoices = $this->invoiceModel->where(['subscription_id' => $subscription['subscription_id']])->findAll();
      foreach ($user_invoices as $user_invoice) {
        array_push($invoices, $user_invoice);
      }
    }
    foreach ($invoices as $invoice) {
      $user_payments = $this->paymentModel->where('invoice_id', $invoice['invoice_id'])->findAll();
      foreach ($user_payments as $user_payment) {
        $user_payment['invoice'] = $invoice;
        array_push($payments, $user_payment);
      }
    }
    return $payments;
  }

  private function _get_receipt($payment_id) {
    $payment = $this->paymentModel->find($payment_id);
    $receipt = $this->invoiceModel->find($payment['invoice_id']);
    if ($receipt) {
      $subscription = $this->subscriptionModel->find($receipt['subscription_id']);
      if ($subscription) {
        $customer = $this->userModel->find($subscription['user_id']);
        $customer_info = $this->customerInfoModel->where('user_id', $subscription['user_id'])->first();
        $receipt['customer'] = $customer;
        $receipt['customer_info'] = $customer_info;
      }
    }
    return $receipt;
  }
}