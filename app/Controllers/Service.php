<?php
namespace App\Controllers;

class Service extends BaseController {
  public function index() {
    if ($this->session->active) {
      if ($this->session->is_admin) {
        $services = $this->serviceModel->findAll();
        $page_data['title'] = 'Services';
        $page_data['services'] = $services;
        return view('service/index', $page_data);
      }
      return $this->_unauthorized();
    }
    return redirect('auth');
  }

  public function new_service() {
    if ($this->session->active) {
      if ($this->session->is_admin) {
        $page_data['title'] = 'New Service';
        return view('service/new-service', $page_data);
      }
      return $this->_unauthorized();
    }
    return redirect('auth');
  }

  public function create_service() {
    if ($this->session->active) {
      $this->validation->setRules([
        'name' => 'required|is_unique[services.name]',
        'price' => 'required'
      ]);
      $response_data = array();
      if ($this->validation->withRequest($this->request)->run()) {
        $post_data = $this->request->getPost();
        $service_data = array(
          'name' => $post_data['name'],
          'price' => $post_data['price'],
          'status' => 1,
        );
        $new_service = $this->serviceModel->save($service_data);
        if ($new_service) {
          $response_data['success'] = true;
          $response_data['msg'] = 'Successfully created new service';
        } else {
          $response_data['success'] = false;
          $response_data['msg'] = 'There was a problem creating new service';
        }
      } else {
        $response_data['success'] = false;
        $response_data['msg'] = 'There was a problem creating new service';
        $response_data['meta'] = $this->validation->getErrors();
      }
      return $this->response->setJSON($response_data);
    }
    return redirect('auth');
  }
}