<?php
namespace App\Controllers;

class Subscription extends BaseController {
  public function index() {
    if ($this->session->active) {
      if ($this->session->is_admin) {
        $page_data['title'] = 'Subscriptions';
        $page_data['subscriptions'] = $this->_get_subscriptions();
        return view('subscription/index', $page_data);
      } else {
        $user_id = $this->session->user_id;
        $page_data['title'] = 'My Subscriptions';
        $page_data['subscriptions'] = $this->_get_customer_subscriptions($user_id);
        return view('subscription/index-alt', $page_data);
      }
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

  public function manage_subscription($subscription_id) {
    if ($this->session->active) {
      $subscription = $this->_get_subscription($subscription_id);
      if (!$subscription) {
        return $this->_not_found();
      }
      $page_data['title'] = 'Manage Subscription';
      $page_data['subscription'] = $subscription;
      $page_data['invoices'] = $this->_get_subscription_invoices($subscription_id);
      if ($this->session->is_admin) {
        return view('subscription/manage-subscription', $page_data);
      }
      return view('subscription/manage-subscription-alt', $page_data);
    }
    return redirect('auth');
  }

  public function create_subscription() {
    if ($this->session->active) {
      $this->validation->setRules([
        'description' => 'required',
        'user' => 'required',
        'plan' => 'required',
        'duration' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
      ]);
      $response_data = array();
      if ($this->validation->withRequest($this->request)->run()) {
        $post_data = $this->request->getPost();
        $subscription_data = array(
          'user_id' => $post_data['user'],
          'plan_id' => $post_data['plan'],
          'duration' => $post_data['duration'],
          'start_date' => $post_data['start_date'],
          'end_date' => $post_data['end_date'],
          'ipv4_address' => $post_data['ip_addr'],
          'mac_address' => $post_data['mac_addr'],
          'description' => $post_data['description'],
          'status' => 1,
        );
        $new_subscription = $this->subscriptionModel->insert($subscription_data);
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

  public function check_subscription_is_valid() {
    $subscriptions = $this->subscriptionModel->findAll();
    foreach ($subscriptions as $subscription) {
      if (strtotime($subscription['end_date']) <= strtotime('today')) {
        $subscription_data = [
          'subscription_id' => $subscription['subscription_id'],
          'status' => 0
        ];
        if ($subscription['status'] == 1) {
          $this->subscriptionModel->save($subscription_data);
        }
      }
    }
  }

  private function _get_subscription($subscription_id) {
    $subscription = $this->subscriptionModel->find($subscription_id);
    if ($subscription) {
      $subscription['customer'] = $this->userModel->where('user_id', $subscription['user_id'])->first();
      $subscription['customer_info'] = $this->customerInfoModel->where('user_id', $subscription['user_id'])->first();
      $subscription['payment_method'] = $subscription['customer_info'] ? $this->paymentMethodModel->where('payment_method_id', $subscription['customer_info']['payment_method_id'])->first() : '';
      $subscription['plan'] = $this->planModel->where('plan_id', $subscription['plan_id'])->first();
    }
    return $subscription;
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

  private function _get_customer_subscriptions($user_id) {
    $subscriptions = $this->subscriptionModel->where('user_id', $user_id)->findAll();
    foreach ($subscriptions as $key => $subscription) {
      $plan = $this->planModel->where('plan_id', $subscription['plan_id'])->first();
      $subscriptions[$key]['plan'] = $plan;
    }
    return $subscriptions;
  }

  private function _get_subscription_invoices($subscription_id) {
    $invoices = $this->invoiceModel->where('subscription_id', $subscription_id)->findAll();
    foreach($invoices as $key => $invoice) {
      $payments = $this->paymentModel->where('invoice_id', $invoice['invoice_id'])->findAll();
      if ($payments) {
        $subscription = $this->subscriptionModel->find($invoice['subscription_id']);
        $customer = $this->userModel->find($subscription['user_id']);
        $invoices[$key]['subscription'] = $subscription;
        $invoices[$key]['customer'] = $customer;
        $invoices[$key]['payments'] = $payments;
      } else {
        return [];
      }
    }
    return $invoices;
  }
}