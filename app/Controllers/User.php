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
          $response_data['success'] = true;
          $response_data['msg'] = 'Successfully created new user';
        } else {
          $response_data['success'] = false;
          $response_data['msg'] = 'There was a problem creating new user';
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
}