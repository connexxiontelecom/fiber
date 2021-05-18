<?php
namespace App\Controllers;

class Subscription extends BaseController {
  public function index() {
    if ($this->session->active) {
      $page_data['title'] = 'Subscriptions';
      $page_data['subscriptions'] = $this->_get_subscriptions();
      return view('subscription/index', $page_data);
    }
    return redirect('auth');
  }

  public function new_subscription() {
    if ($this->session->active) {
      if ($this->session->is_admin) {
        $page_data['title'] = 'New Subscription';
        $page_data['customers'] = $this->userModel->where(['is_admin' => 0, 'status' => 1])->findAll();
        $page_data['plans'] = $this->planModel->where('status', 1)->findAll();
        return view('subscription/new-subscription', $page_data);
      }
      return $this->_unauthorized();
    }
    return redirect('auth');
  }

  public function create_subscription() {
    if ($this->session->active) {
      $this->validation->setRules([
        'user' => 'required',
        'plan' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
      ]);
      $response_data = array();
      if ($this->validation->withRequest($this->request)->run()) {
        $post_data = $this->request->getPost();
        $plan_data = array(
          'user_id' => $post_data['user'],
          'plan_id' => $post_data['plan'],
          'start_date' => $post_data['start_date'],
          'end_date' => $post_data['end_date'],
          'ipv4_address' => $post_data['ip_addr'],
          'mac_address' => $post_data['mac_addr'],
          'description' => $post_data['description'],
          'status' => 1,
        );
        $new_subscription = $this->subscriptionModel->save($plan_data);
        if ($new_subscription) {
          $response_data['success'] = true;
          $response_data['msg'] = 'Successfully created new subscription';
        } else {
          $response_data['success'] = false;
          $response_data['msg'] = 'There was a problem creating new subscription';
        }
      } else {
        $response_data['success'] = false;
        $response_data['msg'] = 'There was a problem creating new subscription';
        $response_data['meta'] = $this->validation->getErrors();
      }
      return $this->response->setJSON($response_data);
    }
    return redirect('auth');
  }

  private function _get_subscriptions() {
    $subscriptions = $this->subscriptionModel->findAll();
    foreach ($subscriptions as $key => $subscription) {
      $customer = $this->userModel->where('user_id', $subscription['user_id'])->first();
      $plan = $this->planModel->where('plan_id', $subscription['plan_id'])->first();
      $subscriptions[$key]['customer'] = $customer;
      $subscriptions[$key]['plan'] = $plan;
    }
    return $subscriptions;
  }
}