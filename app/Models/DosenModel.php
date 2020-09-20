<?php

namespace App\Models;

use CodeIgniter\Model;

class DosenModel extends Model
{
    protected $table      = 'dosen';
    protected $allowedFields = ['nama', 'nik', 'bidangkeahlian', 'jk'];
    protected $useTimestamps = true;

    public function getDosenCek($id = false)
    {
        if ($id == false) {
            return $this->findAll(); // selek bintang from
        }
        return $this->where(['id' => $id])->first();
    }
}
