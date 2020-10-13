<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\DosenModel;
use App\Models\MahasiswaModel;
use phpDocumentor\Reflection\Types\Null_;
use phpDocumentor\Reflection\Types\This;

class Login extends BaseController
{
    protected $login;
    protected $mahasiswa;
    protected $dosen;

    public function __construct()
    {
        $this->mahasiswa = new MahasiswaModel();
        $this->dosen = new DosenModel();
        $this->login = new LoginModel();
    }

    public function loginWeb()
    {
        $data = [
            'title' => 'Login'
        ];

        return view('loginku/halamanLogin', $data);
    }

    // private function exists($nama, $password)
    // {
    //     $model = $this->login;
    //     $modeldua = $this->mahasiswa;
    //     $modeltiga = $this->dosen;

    //     $account = $model->where('nama', $nama)->first();
    //     $account2 = $modeldua->where('nama', $nama)->first();
    //     $account3 = $modeltiga->where('nama', $nama)->first();

    //     if ($account2 != NULL) {
    //         if ($modeldua->where('nim', $password)->first()) {
    //             return $account2;
    //         }
    //     }

    //     if ($account3 != NULL) {
    //         if ($modeltiga->where('nik', $password)->first()) {
    //             return $account3;
    //         }
    //     }

    //     if ($account != NULL) {
    //         //if (password_verify($password, $account['nim'])) {
    //         if ($model->where('nim', $password)->first()) {
    //             return $account;
    //             //}
    //         }
    //     }
    //     return NULL;
    // }

    private function exists($nama, $password, $level)
    {
        $model = $this->login;
        $modeldua = $this->mahasiswa;
        $modeltiga = $this->dosen;

        $account = $model->where('nama', $nama)->first();
        $account2 = $modeldua->where('nama', $nama)->first();
        $account3 = $modeltiga->where('nama', $nama)->first();

        if ($account2 != NULL) {
            if ($modeldua->where('nim', $password)->first()) {
                return $account2;
            }
        }

        if ($account3 != NULL) {
            if ($modeltiga->where('nik', $password)->first()) {
                return $account3;
            }
        }

        if ($account != NULL) {
            //if (password_verify($password, $account['nim'])) {
            if ($model->where('nim', $password)->first()) {
                return $account;
            }
            //}
        }
        return NULL;
    }

    // public function auth()
    // {
    //     $nama = $this->request->getVar('nama');
    //     $password = $this->request->getVar('nim');

    //     if ($this->exists($nama, $password) != null) {
    //         $session = session();
    //         //$levell = $this->login->findColumn('level');
    //         $level = $this->login->findColumn('level');
    //         $datanya = [
    //             'nama' => $nama,
    //             'nim' => $password,
    //             'kasta' => $level
    //             //'tolol' => $levell
    //         ];
    //         $session->set($datanya);
    //         return $this->response->redirect('/utama');
    //     } else {
    //         session()->setFlashdata('gagal', 'Username atau password salah');
    //         return $this->response->redirect('/Login/loginWeb');
    //     }
    // }

    public function auth()
    {
        $nama = $this->request->getVar('nama');
        $password = $this->request->getVar('nim');
        $level = $this->login->findColumn('level');

        if ($this->exists($nama, $password, $level) != null) {
            $session = session();
            //$levell = $this->login->findColumn('level');
            // $level = $this->login->findColumn('level');
            $datanya = [
                'nama' => $nama,
                'nim' => $password,
                'kasta' => $level
                //'tolol' => $levell
            ];
            $session->set($datanya);
            return $this->response->redirect('/utama');
        } else {
            session()->setFlashdata('gagal', 'Username atau password salah');
            return $this->response->redirect('/Login/loginWeb');
        }
    }

    public function Logout()
    {
        session()->destroy();
        return redirect()->to('/Login/loginWeb');
    }
}
