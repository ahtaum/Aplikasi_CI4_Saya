<?php

namespace App\Models;

use CodeIgniter\Model;

class DosenModel extends Model
{
    protected $table      = 'dosen';
    protected $allowedFields = ['nama', 'nik', 'bidangkeahlian', 'jk', 'level', 'penanda', 'slug'];
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
    }

    public function level($nama)
    {
        return $this->db->table('dosen')->select('level')->where(['nama', $nama])->get()->getResultArray();
    }

    public function gabungTabelSpesifik($slug)
    {
        return $this->db->table('dosen')->select('mahasiswa.id as idmhs,mahasiswa.nama as mhs,mahasiswa.nim,mahasiswa.judul')->join('mahasiswa', 'dosen.slug = mahasiswa.slug')->where(['dosen.slug' => $slug])->get()->getResultArray();
    }

    // public function cariDsn($id)
    // {
    //     return $this->where(['id' => $id])->first();
    // }
}
