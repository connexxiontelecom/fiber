<?php
namespace App\Controllers;

class Speedtest extends BaseController {
  public function index() {
    if ($this->session->active) {
      $page_data['title'] = 'SpeedTest Gauges';
      return view('speedtest/index', $page_data);
    }
    return redirect('auth');
  }
}