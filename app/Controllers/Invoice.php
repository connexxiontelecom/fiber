<?php

namespace App\Controllers;

class Invoice extends BaseController
{
  public function index() {
    if ($this->session->active) {
      $page_data['title'] = 'Invoices';
      if ($this->session->is_admin) {
        $invoices = $this->_get_invoices();
        $page_data['invoices'] = $invoices;
        return view('invoice/index', $page_data);
      }
      $invoices = $this->_get_customer_invoices();
      $page_data['invoices'] = $invoices;
      return view('invoice/index-alt', $page_data);
    }
    return redirect('auth');
  }

  public function new_invoice() {
    if ($this->session->active) { 
      if ($this->session->is_admin) {
        $page_data['title'] = 'New Invoice';
        $page_data['subscriptions'] = $this->_get_subscriptions();
        return view('invoice/new-invoice', $page_data);
      }
      return $this->_unauthorized();
    }
    return redirect('auth');
  }

  public function manage_num_payments() {
    if ($this->session->active) {
      $plans = $this->planModel->findAll();
      $services = $this->serviceModel->findAll();
      $descriptions = array(
        'plans' => $plans,
        'services' => $services,
      );
      $post_data = $this->request->getPost();
      $page_data['num_payments'] = $post_data['num_payments'];
      $page_data['descriptions'] = $descriptions;
      return view('invoice/_payments', $page_data);
    }
    return redirect('auth');
  }

  public function view_invoice($invoice_id) {
    if ($this->session->active) {
      $invoice = $this->_get_invoice($invoice_id);
      if ($invoice) {
        $page_data['title'] = 'View Invoice';
        $page_data['invoice'] = $invoice;
        return view('invoice/view-invoice', $page_data);
      }
      return $this->_not_found();
    }
    return redirect('auth');
  }

  public function print_invoice($invoice_id) {
    if ($this->session->active) {
      $invoice = $this->_get_invoice($invoice_id);
      if ($invoice) {
        $page_data['title'] = 'Invoice #'.$invoice['id'];
        $page_data['invoice'] = $invoice;
        return view('invoice/print-invoice', $page_data);
      }
      return $this->_not_found();
    }
    return redirect('auth');
  }

  public function create_invoice() {
    if ($this->session->active) {
      $this->validation->setRules([
        'subscription' => 'required',
        'issue_date' => 'required',
        'due_date' => 'required',
        'is_paid' => 'required',
      ]);
      $response_data = array();
      if ($this->validation->withRequest($this->request)->run()) {
        $post_data = $this->request->getPost();
        $subscription = $this->subscriptionModel->find($post_data['subscription']);
        $plan = $this->planModel->find($subscription['plan_id']);
        $invoice_data = array(
          'subscription_id' => $post_data['subscription'],
          'id' => 'IN'.substr(md5(time()), 0, 7),
          'issue_date' => $post_data['issue_date'],
          'due_date' => $post_data['due_date'],
          'is_paid' => $post_data['is_paid'],
          'subscription' => $subscription['description'],
          'period' => $subscription['duration'],
          'plan' => $plan['name'],
          'price' => $plan['price']
        );
        $new_invoice = $this->invoiceModel->insert($invoice_data);
        if ($new_invoice) {
          $response_data['success'] = true;
          $response_data['msg'] = 'Successfully created new invoice';
        } else {
          $response_data['success'] = false;
          $response_data['msg'] = 'There was a problem creating new invoice';
        }
      } else {
        $response_data['success'] = false;
        $response_data['msg'] = 'There was a problem creating new invoice';
        $response_data['meta'] = $this->validation->getErrors();
      }
      return $this->response->setJSON($response_data);
    }
    return redirect('auth');
  }

  public function get_invoice_by_ref($invoice_ref) {
    if ($this->session->active) {
      $invoice = $this->invoiceModel->where('id', $invoice_ref)->first();
      if ($invoice) {
        $subscription = $this->subscriptionModel->find($invoice['subscription_id']);
        if ($subscription) {
          $user = $this->userModel->find($subscription['user_id']);
          $invoice['subscription'] = $subscription;
          $invoice['user'] = $user;
          $response_data['success'] = true;
          $response_data['invoice'] = $invoice;
        } else {
          $response_data['success'] = false;
          return $this->response->setJSON($response_data);
        }
      } else {
        $response_data['success'] = false;
        return $this->response->setJSON($response_data);
      }
      return $this->response->setJSON($response_data);
    }
    return redirect('auth/login');
  }

  public function complete_payment() {
    if ($this->session->active) {
      $this->validation->setRules([
        'invoice_id' => 'required',
        'payment_ref' => 'required',
        'amount' => 'required',
      ]);
      $response_data = array();
      if ($this->validation->withRequest($this->request)->run()) {
        $post_data = $this->request->getPost();
        $invoice = $this->invoiceModel->find($post_data['invoice_id']);
        if ($invoice) {
          $payment_data = array(
            'invoice_id' => $post_data['invoice_id'],
            'id' => $post_data['payment_ref'],
            'date' => date('Y-m-d'),
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

  private function _save_payments($invoice_id, $num_payments, $descriptions, $quantities) {
    for ($i = 0; $i < $num_payments; $i++) {
      $payments_data = array(
        'invoice_id' => $invoice_id,
        'description' => $descriptions[$i],
        'quantity' => $quantities[$i],
      );
      $this->invoicePaymentModel->save($payments_data);
    }
  }

  private function _get_invoices() {
    $invoices = $this->invoiceModel->findAll();
    foreach ($invoices as $key => $invoice) {
      $subscription = $this->subscriptionModel->find($invoice['subscription_id']);
      if ($subscription) {
        $customer = $this->userModel->find($subscription['user_id']);
        $plan = $this->planModel->find($subscription['plan_id']);
        $invoices[$key]['subscription'] = $subscription;
        $invoices[$key]['customer'] = $customer;
        $invoices[$key]['plan'] = $plan;
      }
    }
    return $invoices;
  }

  private function _get_customer_invoices(): array {
    $invoices = array();
    $user_id = $this->session->user_id;
    $subscriptions = $this->subscriptionModel->where('user_id', $user_id)->findAll();
    foreach ($subscriptions as $subscription) {
      $user_invoices = $this->invoiceModel->where(['subscription_id' => $subscription['subscription_id']])->findAll();
      foreach ($user_invoices as $user_invoice) {
        array_push($invoices, $user_invoice);
      }
    }
    return $invoices;
  }

  private function _get_invoice($invoice_id) {
    $invoice = $this->invoiceModel->find($invoice_id);
    if ($invoice) {
      $subscription = $this->subscriptionModel->find($invoice['subscription_id']);
      if ($subscription) {
        $customer = $this->userModel->find($subscription['user_id']);
        $customer_info = $this->customerInfoModel->where('user_id', $subscription['user_id'])->first();
        $invoice['customer'] = $customer;
        $invoice['customer_info'] = $customer_info;
      }
    }
    return $invoice;
  }

  private function _get_customer_invoice() {

  }

  private function _get_subscriptions() {
    $subscriptions = $this->subscriptionModel->findAll();
    foreach ($subscriptions as $key => $subscription) {
      $date = date_create($subscription['start_date']);
      $customer = $this->userModel->where('user_id', $subscription['user_id'])->first();
      $subscriptions[$key]['tag'] = $subscription['description'].' for '. $customer['name'].' starting '. date_format($date, 'd M Y').' ('.$subscription['duration'].' months)';
    }
    return $subscriptions;
  }
}