<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index() {
	  $page_data['title'] = 'Dashboard';
		return view('index');
	}
}