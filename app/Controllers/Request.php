<?php

namespace App\Controllers;

class Request extends BaseController {
  public function index() {
    if ($this->session->active) {
      $page_data['title'] = 'Request';
      if ($this->session->is_admin) {
        return view('request/index', $page_data);
      }
      $page_data['requests'] = $this->_get_customer_requests();
      return view('request/index-alt', $page_data);
    }
    return redirect('auth');
  }

  private function _get_customer_requests() {
    $requests = $this->subscriptionRequestModel->where(['user_id' => $this->session->user_id, 'status' => 0])->findAll();
    foreach ($requests as $key => $request) {
      if ($request['type'] == 'new_sub') {
        $plan = $this->planModel->find($request['plan_id']);
        $requests[$key]['plan'] = $plan;
      } else {
        $subscription = $this->subscriptionModel->find($request['subscription_id']);
        $requests[$key]['subscription'] = $subscription;
      }
    }
    return $requests;
  }
}