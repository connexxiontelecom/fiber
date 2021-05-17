<?php
namespace App\Controllers;

class Plan extends BaseController {
  public function index() {
    if ($this->session->active) {
      if ($this->session->is_admin) {
        $plans = $this->planModel->findAll();
        $page_data['title'] = 'Plans';
        $page_data['plans'] = $plans;
        return view('plan/index', $page_data);
      }
      return $this->_unauthorized();
    }
    return redirect('auth');
  }

  public function new_plan() {
    if ($this->session->active) {
      if ($this->session->is_admin) {
        $page_data['title'] = 'New Plan';
        return view('plan/new-plan', $page_data);
      }
      return $this->_unauthorized();
    }
    return redirect('auth');
  }

  public function create_plan() {
    if ($this->session->active) {
      $this->validation->setRules([
        'name' => 'required|is_unique[plans.name]',
        'price' => 'required'
      ]);
      $response_data = array();
      if ($this->validation->withRequest($this->request)->run()) {
        $post_data = $this->request->getPost();
        $plan_data = array(
          'name' => $post_data['name'],
          'price' => $post_data['price'],
          'status' => 1,
        );
        $new_plan = $this->planModel->save($plan_data);
        if ($new_plan) {
          $response_data['success'] = true;
          $response_data['msg'] = 'Successfully created new plan';
        } else {
          $response_data['success'] = false;
          $response_data['msg'] = 'There was a problem creating new plan';
        }
      } else {
        $response_data['success'] = false;
        $response_data['msg'] = 'There was a problem creating new plan';
        $response_data['meta'] = $this->validation->getErrors();
      }
      return $this->response->setJSON($response_data);
    }
    return redirect('auth');
  }
}