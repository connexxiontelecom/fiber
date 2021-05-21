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


}