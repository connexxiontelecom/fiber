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
}