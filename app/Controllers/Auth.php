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
            if($cek){
                        session()->set('id_karyawan', $cek['id_karyawan']);
                        session()->set('nama_jabatan', $cek['nama_jabatan']);
                        session()->set('level',2);
                        return redirect()->to('Home');
            }else
            {
                    session()->setFlashdata('pesan','Username  atau Password Salah');
                    return redirect()->to('Auth');
            }
        }
    }

    public function cekLoginUser()
    {
        
    }
}
