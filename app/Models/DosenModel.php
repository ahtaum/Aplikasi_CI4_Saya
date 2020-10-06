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

    public function gabungTabel()
    {
        return $this->db->table('dosen')->select('mahasiswa.nama as mhs,dosen.nama,mahasiswa.nim,dosen.nik,mahasiswa.ipk')->join('mahasiswa', 'dosen.slug = mahasiswa.slug')->get()->getResultArray();
        // return $this->db->table('dosen')->join('mahasiswa', 'dosen.slug = mahasiswa.slug')->get()->getResultArray();
    }
}
