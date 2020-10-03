<?php

namespace App\Controllers;

use App\Models\LoginModel;
use phpDocumentor\Reflection\Types\Null_;

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

    private function exists($nama, $nim)
    {
        $model = $this->login;
        $account = $model->where('nama', $nama)->first();
        if ($account != NULL) {
            //if (password_verify($nim, $account['nim'])) {
            if ($model->where('nim', $nim)->first()) {
                return $account;
                //}
            }
        }
        return NULL;
    }

    public function auth()
    {
        $nama = $this->request->getVar('nama');
        $nim = $this->request->getVar('nim');

        if ($this->exists($nama, $nim) != null) {
            $session = session();
            $session->set('nama', $nama);
            return $this->response->redirect('/utama');
        } else {
            echo "tolol";
        }
    }

    public function Logout()
    {
        session()->destroy();
        return redirect()->to('/Login/loginWeb');
    }
}
