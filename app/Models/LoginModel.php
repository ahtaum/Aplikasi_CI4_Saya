<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table      = 'login';
    protected $allowedFields = ['nama', 'nim', 'level', 'penanda'];
    protected $useTimestamps = true;

    public function gabungTabelLogin()
    {
        // return $this->db->table('dosen')->select('mahasiswa.nama as mhs,dosen.nama,mahasiswa.nim,dosen.nik,mahasiswa.ipk')->join('mahasiswa', 'dosen.slug = mahasiswa.slug')->get()->getResultArray();
        return $this->db->table('login')->select('login.nama as nama_admin,login.nim,login.level,
            mahasiswa.nama as nama_mahasiswa,mahasiswa.nim,mahasiswa.level,
            dosen.nama as nama_dosen,dosen.nik,dosen.level')->join('mahasiswa', 'login.penanda = mahasiswa.penanda')
            ->join('dosen', 'dosen.penanda = mahasiswa.penanda')->get()->getResultArray();
    }
}
