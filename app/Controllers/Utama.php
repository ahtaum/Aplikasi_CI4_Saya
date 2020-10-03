<?php

namespace App\Controllers;

class Utama extends BaseController
{

  public function index()
  {
    if (session()->get('nama') == '') {
      session()->setFlashdata('pesan', 'Anda Harus Login !!!');
      return redirect()->to('login/loginWeb');
    }

    $data = [
      'title' => 'Halaman Utama'
    ];
    return view('utama/index', $data);
  }
}
