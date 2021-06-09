<?php
namespace App\Controllers;

class User extends BaseController {
  public function index() {
    if ($this->session->active) {
      if ($this->session->is_admin) {
        $users = $this->userModel->findAll();
        $page_data['title'] = 'User Management';
        $page_data['users'] = $users;
        return view('user-management/index', $page_data);
      }
      return $this->_unauthorized();
    }
    return redirect('auth');
  }

  public function new_user() {
    if ($this->session->active) {
      if ($this->session->is_admin) {
        $page_data['title'] = 'New User';
        return view('user-management/new-user', $page_data);
      }
      return $this->_unauthorized();
    }
    return redirect('auth');
  }

  public function manage_customer($user_id) {
    if ($this->session->active) {
      $customer = $this->_get_customer($user_id);
      $payment_methods = $this->paymentMethodModel->findAll();
      if (!$customer) {
        return $this->_not_found();
      }
      if ($this->session->is_admin) {
        $page_data['title'] = 'Manage Customer';
        $page_data['customer'] = $customer;
        $page_data['payment_methods'] = $payment_methods;
        return view('user-management/manage-customer', $page_data);
      }
      return $this->_unauthorized();
    }
    return redirect('auth');
  }

  public function profile() {
    if ($this->session->active) {
      $customer = $this->_get_customer($this->session->user_id);
      $payment_methods = $this->paymentMethodModel->findAll();
      if (!$customer) {
        return $this->_not_found();
      }
      $page_data['title'] = 'Profile';
      $page_data['customer'] = $customer;
      $page_data['payment_methods'] = $payment_methods;
      return view('user-management/profile', $page_data);
    }
    return redirect('auth');
  }

  public function create_user() {
    if ($this->session->active) {
      $this->validation->setRules([
        'login' => 'required|is_unique[users.login]',
        'name' => 'required',
        'email' => 'required|valid_email|is_unique[users.email]',
        'password' => 'required'
      ]);
      $response_data = array();
      if ($this->validation->withRequest($this->request)->run()) {
        $post_data = $this->request->getPost();
        $user_data = array(
          'login' => $post_data['login'],
          'name' => $post_data['name'],
          'email' => $post_data['email'],
          'password' => password_hash($post_data['password'], PASSWORD_BCRYPT),
          'is_admin' => $post_data['is_admin'],
          'status' => true,
        );
        $new_user = $this->userModel->save($user_data);
        if ($new_user) {
          if ($post_data['is_admin'] == 0) {
            $email_data['data']['name'] = $post_data['name'];
            $email_data['data']['login'] = $post_data['login'];
            $email_data['data']['passcode'] = $post_data['password'];
            $email_data['subject'] = 'Welcome to Your Fiber Portal';
            $email_data['email_body'] = 'welcome';
            $email_data['email'] = $post_data['email'];
            $email_data['from_name'] = 'Connexxion Telecom Support';
            $email_data['from_email'] = 'support@connexxiontelecom.com';
            $this->send_mail($email_data);
          }
          $response_data['success'] = true;
          $response_data['msg'] = 'Successfully created new user';
          return $this->response->setJSON($response_data);
        } else {
          $response_data['success'] = false;
          $response_data['msg'] = 'There was a problem creating new user';
          return $this->response->setJSON($response_data);
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

  public function edit_user() {
    if($this->session->active) {
      $this->validation->setRules([
        'user_id' => 'required',
        'name' => 'required',
        'email' => 'required|valid_email|is_unique[users.email, user_id, {user_id}]',
      ]);
      $response_data = array();
      if ($this->validation->withRequest($this->request)->run()) {
        $post_data = $this->request->getPost();
        $user_data = array(
          'user_id' => $post_data['user_id'],
          'name' => $post_data['name'],
          'email' => $post_data['email'],
        );
        $user_update = $this->userModel->save($user_data);
        if ($user_update) {
          if ($this->session->user_id == $post_data['user_id']) {
            $this->session->set($user_data);
          }
          $response_data['success'] = true;
          $response_data['msg'] = 'Successfully updated user';
        } else {
          $response_data['success'] = false;
          $response_data['msg'] = 'There was a problem updating the user';
        }
      } else {
        $response_data['success'] = false;
        $response_data['msg'] = 'There was a problem updating the user';
        $response_data['meta'] = $this->validation->getErrors();
      }
      return $this->response->setJSON($response_data);
    }
    return redirect('auth');
  }

  public function manage_customer_info() {
    if($this->session->active) {
      $this->validation->setRules([
        'user_id' => 'required',
        'payment_method' => 'required',
        'phone' => 'required',
        'address' => 'required'
      ]);
      $response_data = array();
      if ($this->validation->withRequest($this->request)->run()) {
        $post_data = $this->request->getPost();
        $customer_info_data = array(
          'user_id' => $post_data['user_id'],
          'payment_method_id' => $post_data['payment_method'],
          'phone' => $post_data['phone'],
          'address' => $post_data['address']
        );
        $customer_info = $this->customerInfoModel->where('user_id', $post_data['user_id'])->first();
        if ($customer_info) {
          $customer_info_data['customer_info_id'] = $customer_info['customer_info_id'];
          $customer_info_updated = $this->customerInfoModel->save($customer_info_data);
          $customer_info = $this->customerInfoModel->find($customer_info['customer_info_id']);
        } else {
          $customer_info_updated = $this->customerInfoModel->insert($customer_info_data);
          $customer_info = $this->customerInfoModel->find($customer_info_updated);
        }
        $customer = $this->userModel->find($customer_info['user_id']);
        $payment_method = $this->paymentMethodModel->find($customer_info['payment_method_id']);
        if ($customer_info_updated) {
          $email_data['data']['name'] = $customer['name'];
          $email_data['data']['payment_method'] = $payment_method['name'];
          $email_data['data']['phone'] = $customer_info['phone'];
          $email_data['data']['address'] = $customer_info['address'];
          $email_data['subject'] = 'Fiber Portal Customer Information Updated';
          $email_data['email_body'] = 'update-customer-info';
          $email_data['email'] = $customer['email'];
          $email_data['from_name'] = 'Connexxion Telecom Support';
          $email_data['from_email'] = 'support@connexxiontelecom.com';
          $this->send_mail($email_data);
          $response_data['success'] = true;
          $response_data['msg'] = 'Successfully updated customer info';
          return $this->response->setJSON($response_data);
        } else {
          $response_data['success'] = false;
          $response_data['msg'] = 'There was a problem updating the customer info';
        }
      } else {
        $response_data['success'] = false;
        $response_data['msg'] = 'There was a problem updating the customer info';
        $response_data['meta'] = $this->validation->getErrors();
      }
      return $this->response->setJSON($response_data);
    }
    return redirect('auth');
  }

  public function toggle_status() {
    if ($this->session->active) {
      $this->validation->setRules([
        'user_id' => 'required',
        'status' => 'required'
      ]);
      $response_data = array();
      if ($this->validation->withRequest($this->request)->run()) {
        $post_data = $this->request->getPost();
        $user_data = array(
          'user_id' => $post_data['user_id'],
          'status' => $post_data['status'] == 1 ? 0 : 1,
        );
        $user_update = $this->userModel->save($user_data);
        if ($user_update) {
          $user = $this->userModel->find($post_data['user_id']);
          $response_data['success'] = true;
          if ($user['status']) {
            $response_data['msg'] = 'Successfully activated this user account';
            $email_data['subject'] = 'Fiber Portal Account Activated';
            $email_data['email_body'] = 'account-activated';
          } else {
            $response_data['msg'] = 'Successfully deactivated this user account';
            $email_data['subject'] = 'Fiber Portal Account Deactivated';
            $email_data['email_body'] = 'account-deactivated';
          }
          $email_data['data']['name'] = $user['name'];
          $email_data['email'] = $user['email'];
          $email_data['from_name'] = 'Connexxion Telecom Support';
          $email_data['from_email'] = 'support@connexxiontelecom.com';
          $this->send_mail($email_data);
          return $this->response->setJSON($response_data);
        } else {
          $response_data['success'] = false;
          $response_data['msg'] = 'There was a problem updating the user';
        }
      } else {
        $response_data['success'] = false;
        $response_data['msg'] = 'There was a problem updating the user';
        $response_data['meta'] = $this->validation->getErrors();
      }
      return $this->response->setJSON($response_data);
    }
    return redirect('auth');
  }

  private function _get_customer($user_id) {
    $customer = $this->userModel->find($user_id);
    if ($customer) {
      $customer['customer_info'] = $this->customerInfoModel->where('user_id', $customer['user_id'])->first();
      if ($customer['customer_info'])
        $customer['payment_method'] = $this->paymentMethodModel->where('payment_method_id', $customer['customer_info']['payment_method_id'])->first();
    }
    return $customer;
  }
}