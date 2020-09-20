<?php

namespace App\Controllers;

use App\Models\DosenModel;
use App\Models\MahasiswaModel;

class Dataku extends BaseController
{

    protected $dataMahasiswa;
    protected $dataDosen;

    public function __construct()
    {
        $this->dataMahasiswa = new MahasiswaModel();
        $this->dataDosen = new DosenModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Tentang Saya',
            'cumatabel' => $this->dataMahasiswa->findAll(),
            'cumatabeldua' => $this->dataDosen->findAll()
        ];

        return view('data/index', $data);
    }

    public function ubah($id)
    {
        $data = [
            'title' => 'Ubah Data',
            'datanya' => $this->dataMahasiswa->getMahasiswaCek($id)
        ];

        return view('data/ubah', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Mahasiswa',
            'tampildetail' => $this->dataMahasiswa->getMahasiswaCek($id)
        ];

        return view('data/detail', $data);
    }

    public function detailDosen($id)
    {
        $data = [
            'title' => 'Detail Dosen',
            'tampildetaildosen' => $this->dataDosen->getDosenCek($id)
        ];

        return view('data/detailDosen', $data);
    }

    public function tambahMahasiswa()
    {
        $data = [
            'title' => 'Tambah Data Mahasiswa',
            'validasi' => \Config\Services::validation()
        ];

        return view('data/mahasiswa', $data);
    }
    public function tambahDosen()
    {
        $data = [
            'title' => 'Tambah Data Dosen',
            'validasidua' => \Config\Services::validation()
        ];

        return view('data/dosen', $data);
    }

    public function simpan()
    {

        $mhs = $this->request->getVar('mahasiswa');

        if (isset($mhs)) {
            if (!$this->validate([
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus di isi',
                        'is_unique' => '{field} sudah ada'
                    ]
                ],
                'nim' => [
                    'rules' => 'required|is_unique[mahasiswa.nim]',
                    'errors' => [
                        'required' => '{field} harus di isi',
                        'is_unique' => '{field} sudah ada'
                    ]
                ],
                'ipk' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus di isi'
                    ]
                ]
            ])) {
                return redirect()->to('/dataku/tambahMahasiswa')->withInput();
            }
        } else {
            if (!$this->validate([
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus di isi',
                        'is_unique' => '{field} sudah ada'
                    ]
                ],
                'nik' => [
                    'rules' => 'required|is_unique[dosen.nik]',
                    'errors' => [
                        'required' => '{field} harus di isi',
                        'is_unique' => '{field} sudah ada'
                    ]
                ],
                'bidangkeahlian' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus di isi',
                        'is_unique' => '{field} sudah ada'
                    ]
                ]
            ])) {
                return redirect()->to('/dataku/tambahDosen')->withInput();
            }
        }

        $mahasiswa = $this->request->getVar('mahasiswa');

        if (isset($mahasiswa)) {
            $this->dataMahasiswa->save([
                'nama' => $this->request->getVar('nama'),
                'nim' => $this->request->getVar('nim'),
                'ipk' => $this->request->getVar('ipk'),
                'jk' => $this->request->getVar('jk')
            ]);
        } else {
            $this->dataDosen->save([
                'nama' => $this->request->getVar('nama'),
                'nik' => $this->request->getVar('nik'),
                'bidangkeahlian' => $this->request->getVar('bidangkeahlian'),
                'jk' => $this->request->getVar('jk')
            ]);
        }

        return redirect()->to('/dataku');
    }

    public function hapus($id)
    {
        $hapusLurr = $this->request->getVar('mahasiswahapus');
        $hapusLurrdua = $this->request->getVar('dosenhapus');

        if (isset($hapusLurr) == true) {
            $this->dataMahasiswa->delete($id);
        } else {
            $this->dataDosen->delete($id);
        }

        session()->setFlashdata('pesan', 'Data berhasil di Hapus.');
        return redirect()->to('/dataku');
    }

    public function update($id)
    {
        $this->dataMahasiswa->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'nim' => $this->request->getVar('nim'),
            'ipk' => $this->request->getVar('ipk'),
            'jk' => $this->request->getVar('jk')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil di ubah.');

        // klo dah simpen data kembali ke halaman /buku/index
        return redirect()->to('/dataku');
    }
}
