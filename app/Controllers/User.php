<?php
namespace App\Controllers;

class User extends BaseController {
  public function index() {
    $users = $this->userModel->findAll();
    $page_data['title'] = 'User Management';
    $page_data['users'] = $users;
    return view('user-management/index', $page_data);
  }

  public function new_admin() {
    $page_data['title'] = 'New Admin';
    return view('user-management/new-admin', $page_data);
  }

  public function create_admin() {
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
        'status' => true,
        'is_admin' => true,
      );
      $new_user = $this->userModel->save($user_data);
      if ($new_user) {
        $response_data['success'] = true;
        $response_data['msg'] = 'Successfully created new admin user';
      } else {
        $response_data['success'] = false;
        $response_data['msg'] = 'There was a problem creating new admin user';
      }
    } else {
      $response_data['success'] = false;
      $response_data['msg'] = 'There was a problem creating new admin user';
      $response_data['meta'] = $this->validation->getErrors();
    }
    return $this->response->setJSON($response_data);
  }
}