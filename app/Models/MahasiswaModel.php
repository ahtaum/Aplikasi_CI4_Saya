<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class MahasiswaModel extends Model
{
    protected $table      = 'mahasiswa';
    protected $allowedFields = ['nama', 'nim', 'ipk', 'jk', 'level', 'komentar', 'penanda', 'slug', 'judul', 'file', 'status'];
    protected $useTimestamps = true;

    public function getMahasiswaCek($id = false)
    {
        if ($id == false) {
            return $this->findAll(); // selek bintang from
        }
        return $this->where(['id' => $id])->first();
    }

    public function gabungTabelSpesifik($nama)
    {
        return $this->db->table('dosen')->select('mahasiswa.id as idmhs,dosen.id as iddsn,mahasiswa.nama as mhs,dosen.nama,mahasiswa.nim,dosen.nik,mahasiswa.ipk,mahasiswa.status')->join('mahasiswa', 'dosen.slug = mahasiswa.slug')->where(['mahasiswa.nama' => $nama])->get()->getResultArray();
    }

    // kunci
    // select mhs.nama as nama_mahasiswa,dsn.nama as nama_dosen
    // -> from mahasiswa mhs join dosen dsn on mhs.slug = dsn.slug where mhs.nama = 'Hartono';

    // public function cariMhs($nama)
    // {
    //     return $this->where(['nama' => $nama])->first();
    // }
}
