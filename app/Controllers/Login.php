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

    private function cekAdmin($nama, $password, $level)
    {
        $model = $this->login;
        $akun = $model->where('nama', $nama)->first();
        if ($akun != NULL) {
            if ($model->where('nim', $password)->first() && $model->where('level', $level['admin'])->first() == true) {
                return $akun;
            }
        }
    }

    private function cekMahasiswa($nama, $password, $level)
    {
        $modeldua = $this->mahasiswa;
        $akundua = $modeldua->where('nama', $nama)->first();
        if ($akundua != NULL) {
            if ($modeldua->where('nim', $password)->first() && $modeldua->where('level', $level['mahasiswa'])->first() == true) {
                return $akundua;
            }
        }
    }

    private function cekDosen($nama, $password, $level)
    {
        $modeltiga = $this->dosen;
        $akuntiga = $modeltiga->where('nama', $nama)->first();
        if ($akuntiga != NULL) {
            if ($modeltiga->where('nik', $password)->first() && $modeltiga->where('level', $level['dosen'])->first() == true) {
                return $akuntiga;
            }
        }
    }

    public function auth()
    {
        $nama = $this->request->getVar('nama');
        $password = $this->request->getVar('nim');

        $level = [
            'admin' => $this->login->findColumn('level')[0],
            'mahasiswa' => $this->mahasiswa->findColumn('level')[0],
            'dosen' => $this->dosen->findColumn('level')[0]
        ];

        if ($this->cekAdmin($nama, $password, $level) != null) :
            $session = session();
            $data = [
                'nama' => $nama,
                'nim' => $password,
                'kasta' => $level['admin']
            ];
            $session->set($data);
            return $this->response->redirect('/utama');
        elseif ($this->cekMahasiswa($nama, $password, $level) != null) :
            $session = session();
            $data = [
                'nama' => $nama,
                'nim' => $password,
                'kasta' => $level['mahasiswa'],
                'datad' => $this->mahasiswa->gabungTabelSpesifik($nama)
            ];
            $session->set($data);
            return $this->response->redirect('/utama');
        elseif ($this->cekDosen($nama, $password, $level) != null) :
            $session = session();
            $slug = url_title($nama, '-', true);
            $data = [
                'nama' => $nama,
                'nik' => $password,
                'kasta' => $level['dosen'],
                'dataDosen' => $this->dosen->gabungTabelSpesifik($slug)
            ];
            $session->set($data);
            return $this->response->redirect('/utama');
        else :
            session()->setFlashdata('gagal', 'Username atau password salah');
            return $this->response->redirect('/Login/loginWeb');
        endif;
    }

    public function Logout()
    {
        session()->destroy();
        return redirect()->to('/Login/loginWeb');
    }
}
