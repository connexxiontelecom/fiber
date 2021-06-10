<?php

namespace App\Controllers;

class Request extends BaseController {
  public function index() {
    if ($this->session->active) {
      $page_data['title'] = 'Requests';
      if ($this->session->is_admin) {
        $page_data['requests'] = $this->_get_requests();
        return view('request/index', $page_data);
      }
      $page_data['requests'] = $this->_get_customer_requests();
      return view('request/index-alt', $page_data);
    }
    return redirect('auth');
  }

  public function cancel_request($subscription_request_id) {
    if ($this->session->active) {
      $response_data = array();
      $request_data = array(
        'subscription_request_id' => $subscription_request_id,
        'status' => 1,
      );
      $cancel_request = $this->subscriptionRequestModel->save($request_data);
      if ($cancel_request) {
        $response_data['success'] = true;
        $response_data['msg'] = 'Successfully cancelled the request';
      } else {
        $response_data['success'] = false;
        $response_data['msg'] = 'There was a problem cancelling the request';
      }
      return $this->response->setJSON($response_data);
    }
    return redirect('auth');
  }

  public function approve_request($subscription_request_id) {
    if ($this->session->active) {
      $response_data = array();
      $request_data = array(
        'subscription_request_id' => $subscription_request_id,
        'status' => 2,
      );
      $approve_request = $this->subscriptionRequestModel->save($request_data);
      if ($approve_request) {
        $subscription_request = $this->subscriptionRequestModel->find($subscription_request_id);
        $customer = $this->userModel->find($subscription_request['user_id']);
        $email_data['data']['name'] = $customer['name'];
        $email_data['data']['request_made'] = date_format(date_create($subscription_request['created_at']), 'd M Y, H:i a');
        if ($subscription_request['type'] == 'new_sub') $email_data['data']['request_type'] = 'New Subscription';
        else if ($subscription_request['type'] == 'extend_sub') $email_data['data']['request_type'] = 'Extend Subscription';
        else if ($subscription_request['type'] == 'cancel_sub') $email_data['data']['request_type'] = 'Cancel Subscription';
        $email_data['subject'] = 'Your Fiber Portal Request Was Approved';
        $email_data['email_body'] = 'approve-request';
        $email_data['email'] = $customer['email'];
        $email_data['from_name'] = 'Connexxion Telecom Support';
        $email_data['from_email'] = 'support@connexxiontelecom.com';
        $this->send_mail($email_data);
        $response_data['success'] = true;
        $response_data['msg'] = 'Successfully approved the request';
        return $this->response->setJSON($response_data);
      } else {
        $response_data['success'] = false;
        $response_data['msg'] = 'There was a problem approving the request';
      }
      return $this->response->setJSON($response_data);
    }
    return redirect('auth');
  }

  private function _get_requests() {
    $requests = $this->subscriptionRequestModel->where('status', 0)->findAll();
    foreach ($requests as $key => $request) {
      $customer = $this->userModel->find($request['user_id']);
      $requests[$key]['customer'] = $customer;
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