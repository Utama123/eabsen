<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Admin extends BaseController
{
    public function index()
    {
        $data =[
            'judul' => 'Dashboard',
            'menu' => 'dashboard',   
            'page' => 'backend/v_dashboard'
        ];
        return view('v_template_back', $data);
    }
}
