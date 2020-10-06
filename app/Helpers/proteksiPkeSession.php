<?php

function proteksi()
{
    if (session()->get('nama') == '') {
        session()->setFlashdata('gagal', 'Anda Harus Login !!!');
        return redirect()->to('login/loginWeb');
    }
}
