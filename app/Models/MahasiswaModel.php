<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class MahasiswaModel extends Model
{
    protected $table      = 'mahasiswa';
    protected $allowedFields = ['nama', 'nim', 'ipk', 'jk', 'level', 'komentar', 'penanda', 'slug'];
    protected $useTimestamps = true;

    public function getMahasiswaCek($id = false)
    {
        if ($id == false) {
            return $this->findAll(); // selek bintang from
        }
        return $this->where(['id' => $id])->first();
    }

    // public function cariMhs($nama)
    // {
    //     return $this->where(['nama' => $nama])->first();
    // }
}
