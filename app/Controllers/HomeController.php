<?php

namespace App\Controllers;

class HomeController extends BaseController
{
	public function index()
	{
		// $session = session();
		// echo "Welcome back, ".$session->get('user_name');
		return view('home');
	}
}
