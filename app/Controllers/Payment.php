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
}