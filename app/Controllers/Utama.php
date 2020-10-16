<?php

namespace App\Controllers;

class Utama extends BaseController
{

  protected $login;

  // public function __construct()
  // {
  //   //helper('proteksiPkeSession');
  // }

  public function index()
  {
    if (session()->get('nama') == '') {
      session()->setFlashdata('gagal', 'Anda Harus Login !!!');
      return redirect()->to('login/loginWeb');
    }
    $data = [
      'title' => 'Halaman Utama'
    ];
    return view('utama/index', $data);
  }
}
