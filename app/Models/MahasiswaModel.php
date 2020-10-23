<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class MahasiswaModel extends Model
{
    protected $table      = 'mahasiswa';
    protected $allowedFields = ['nama', 'nim', 'ipk', 'jk', 'level', 'komentar', 'penanda'];
    protected $useTimestamps = true;

    public function getMahasiswaCek($id = false)
    {
        if ($id == false) {
            return $this->findAll(); // selek bintang from
        }
        return $this->where(['id' => $id])->first();
    }
}
