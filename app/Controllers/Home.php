<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index() {
	  if ($this->session->active) {
      $page_data['title'] = 'Dashboard';
      return view('index', $page_data);
    }
	  return redirect('auth');
	}
}