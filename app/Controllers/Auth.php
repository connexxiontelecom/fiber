<?php
namespace App\Controllers;

class Auth extends BaseController {
  public function index() {
    if ($this->session->active) {
      return redirect('dashboard');
    }
    $page_data['title'] = 'Login';
    return view('auth/login', $page_data);
  }

  public function login() {
    $response_data = array();
    $this->validation->setRules([
      'login' => 'required',
      'password' => 'required'
    ]);
    if ($this->validation->withRequest($this->request)->run()) {
      $post_data = $this->request->getPost();
      $user = $this->userModel->where('login', $post_data['login'])->first();
      if ($user) {
        if (password_verify($post_data['password'], $user['password'])) {
          if ($user['status']) {
            $user_data = array(
              'login' => $user['login'],
              'name' => $user['name'],
              'email' => $user['email'],
              'is_admin' => $user['is_admin'],
              'status' => $user['status'],
              'active' => true,
            );
            $this->session->set($user_data);
            $response_data['success'] = true;
            return $this->response->setJSON($response_data);
          }
          $response_data['success'] = false;
          $response_data['msg'] = 'This user account is currently inactive!';
          return $this->response->setJSON($response_data);
        }
      }
    }
    $response_data['success'] = false;
    $response_data['msg'] = 'Your username or password is invalid!';
    return $this->response->setJSON($response_data);
  }

  public function logout() {
    if ($this->session->active) {
      $this->session->stop();
      $this->session->destroy();
    }
    return redirect('auth');
  }
}