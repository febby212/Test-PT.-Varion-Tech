<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $data = array();

    public function __construct()
    {
        $this->data['title'] = 'Dashboard';
    }

    public function index() {
        return view('dashboard');
    }
}
