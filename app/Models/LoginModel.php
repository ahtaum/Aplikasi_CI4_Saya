<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table      = 'login';
    protected $allowedFields = ['nama', 'nim'];
    protected $useTimestamps = true;

    public function cekLogin($username, $password)
    {
        return $this->where(['nama' => $username, 'nim' => $password])->first();
    }

    // public function getMahasiswaCek($id = false)
    // {
    //     if ($id == false) {
    //         return $this->findAll(); // selek bintang from
    //     }
    //     return $this->where(['id' => $id])->first();
    // }
}
