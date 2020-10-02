<?php

namespace App\Controllers;

use App\Models\LoginModel;

class Login extends BaseController
{
    protected $login;

    public function __construct()
    {
        $this->login = new LoginModel();
    }

    public function loginWeb()
    {
        $data = [
            'title' => 'Login'
        ];

        return view('loginku/halamanLogin', $data);
    }

    public function auth()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $tombolLogin = $this->request->getPost('login');

        $cek = $this->login->cekLogin($username, $password);
    }

    public function Logout()
    {
        session()->destroy();
        return redirect('Loginku/halamanLogin');
    }
}
