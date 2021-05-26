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
      return view('invoice/index-alt', $page_data);
    }
    return redirect('auth');
  }

  public function new_invoice() {
    if ($this->session->active) {
      if ($this->session->is_admin) {
        $page_data['title'] = 'New Invoice';
        $page_data['customers'] = $this->userModel->where(['is_admin' => 0, 'status' => 1])->findAll();
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
      if ($this->session->is_admin) {
        $invoice = $this->_get_invoice($invoice_id);
        if ($invoice) {
          $page_data['title'] = 'View Invoice';
          $page_data['invoice'] = $invoice;
          return view('invoice/view-invoice', $page_data);
        }
        return $this->_not_found();
      }
    }
    return redirect('auth');
  }

  public function create_invoice() {
    if ($this->session->active) {
      $this->validation->setRules([
        'user' => 'required',
        'date' => 'required',
        'is_paid' => 'required',
      ]);
      $response_data = array();
      if ($this->validation->withRequest($this->request)->run()) {
        $post_data = $this->request->getPost();
        $invoice_data = array(
          'user_id' => $post_data['user'],
          'date' => $post_data['date'],
          'is_paid' => $post_data['is_paid'],
        );
        $new_invoice = $this->invoiceModel->insert($invoice_data);
        if ($new_invoice) {
          $this->_save_payments($new_invoice, $post_data['num_payments'], $post_data['descriptions'], $post_data['quantities']);
          $response_data['success'] = true;
          $response_data['msg'] = 'Successfully created new user';
        } else {
          $response_data['success'] = false;
          $response_data['msg'] = 'There was a problem creating new user';
        }
      } else {
        $response_data['success'] = false;
        $response_data['msg'] = 'There was a problem creating new user';
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
      $customer = $this->userModel->where('user_id', $invoice['user_id'])->first();
      $payments = $this->invoicePaymentModel->where('invoice_id', $invoice['invoice_id'])->findAll();
      foreach ($payments as $key_1 => $payment) {
        $plan = $this->planModel->where('name', $payment['description'])->first();
        if (!$plan) {
          $service = $this->serviceModel->where('name', $payment['description'])->first();
          if ($service) {
            $payments[$key_1]['category'] = 'service';
            $payments[$key_1]['amount'] = $service['price'];
          }
        } else {
          $payments[$key_1]['category'] = 'plan';
          $payments[$key_1]['amount'] = $plan['price'];
        }
      }
      $invoices[$key]['payments'] = $payments;
      $invoices[$key]['customer'] = $customer;
    }
    return $invoices;
  }

  private function _get_invoice($invoice_id) {
    $invoice = $this->invoiceModel->find($invoice_id);
    if ($invoice) {
      $customer = $this->userModel->where('user_id', $invoice['user_id'])->first();
      $customer_info = $this->customerInfoModel->where('user_id', $invoice['user_id'])->first();
      $payments = $this->invoicePaymentModel->where('invoice_id', $invoice['invoice_id'])->findAll();
      foreach ($payments as $key_1 => $payment) {
        $plan = $this->planModel->where('name', $payment['description'])->first();
        if (!$plan) {
          $service = $this->serviceModel->where('name', $payment['description'])->first();
          if ($service) {
            $payments[$key_1]['category'] = 'service';
            $payments[$key_1]['amount'] = $service['price'];
          }
        } else {
          $payments[$key_1]['category'] = 'plan';
          $payments[$key_1]['amount'] = $plan['price'];
        }
      }
      $invoice['payments'] = $payments;
      $invoice['customer'] = $customer;
      $invoice['customer_info'] = $customer_info;
    }
    return $invoice;
  }
}