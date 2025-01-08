<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAuth;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->ModelAuth = new ModelAuth();
    }

    public function index()
    {
        return view('v_login');
    }

    public function cekLoginKaryawan()
    {
        if($this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong'
                ]
                ],
                'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'Prrors' => [
                    'required' => '{field} Tidak Boleh Kosong'
                ]
                ],
        ])){
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $cek = $this->ModelAuth->loginKaryawan($username,$password);
        }
    }

    public function cekLoginUser()
    {
        
    }
}
