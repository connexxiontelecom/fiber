<?php
namespace App\Controllers;

class PaymentMethod extends BaseController {
  public function index() {
    if ($this->session->active) {
      if ($this->session->is_admin) {
        $payment_methods = $this->paymentMethodModel->findAll();
        $page_data['title'] = 'Payment Methods';
        $page_data['payment_methods'] = $payment_methods;
        return view('payment-method/index', $page_data);
      }
      return $this->_unauthorized();
    }
    return redirect('auth');
  }

  public function new_payment_method() {
    if ($this->session->active) {
      if ($this->session->is_admin) {
        $page_data['title'] = 'New Payment Method';
        return view('payment-method/new-payment-method', $page_data);
      }
      return $this->_unauthorized();
    }
    return redirect('auth');
  }

  public function create_payment_method() {
    if ($this->session->active) {
      $this->validation->setRules([
        'name' => 'required|is_unique[payment_methods.name]',
      ]);
      $response_data = array();
      if ($this->validation->withRequest($this->request)->run()) {
        $post_data = $this->request->getPost();
        $payment_detail_data = array(
          'name' => $post_data['name'],
          'status' => 1,
        );
        $new_payment_method = $this->paymentMethodModel->save($payment_detail_data);
        if ($new_payment_method) {
          $response_data['success'] = true;
          $response_data['msg'] = 'Successfully created new payment method';
        } else {
          $response_data['success'] = false;
          $response_data['msg'] = 'There was a problem creating new payment method';
        }
      } else {
        $response_data['success'] = false;
        $response_data['msg'] = 'There was a problem creating new payment method';
        $response_data['meta'] = $this->validation->getErrors();
      }
      return $this->response->setJSON($response_data);
    }
    return redirect('auth');
  }

}