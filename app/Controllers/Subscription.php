<?php
namespace App\Controllers;

class Subscription extends BaseController {
  public function index() {
    if ($this->session->active) {
      $page_data['title'] = 'Subscriptions';
      return view('subscription/index', $page_data);
    }
    return redirect('auth');
  }

  public function new_subscription() {
    if ($this->session->active) {
      if ($this->session->is_admin) {
        $page_data['title'] = 'New Subscription';
        $page_data['customers'] = $this->userModel->where('is_admin', 0)->findAll();
        return view('subscription/new-subscription', $page_data);
      }
      return $this->_unauthorized();
    }
    return redirect('auth');
  }
}