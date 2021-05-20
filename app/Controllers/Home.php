<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index() {
	  if ($this->session->active) {
      $page_data['title'] = 'Dashboard';
      if ($this->session->is_admin) {
        return view('index', $page_data);
      }
      return view('index-alt', $page_data);
    }
	  return redirect('auth');
	}
}