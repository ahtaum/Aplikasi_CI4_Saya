<?php

namespace App\Controllers;

use App\Models\DosenModel;
use App\Models\MahasiswaModel;
use App\Models\LoginModel;
use Exception;

class Dataku extends BaseController
{

    protected $dataMahasiswa;
    protected $dataDosen;
    protected $admin;

    public function __construct()
    {
        $this->dataMahasiswa = new MahasiswaModel();
        $this->dataDosen = new DosenModel();
        $this->admin = new LoginModel();
    }

    public function index()
    {
        if (session()->get('kasta') == 'mahasiswa' || session()->get('kasta') == 'dosen' || session()->get('kasta') == '') {
            session()->setFlashdata('gagal', 'Anda Harus Login !!!');
            return redirect()->to('login/loginWeb');
        }

        $data = [
            'title' => 'Tentang Saya',
            'cumatabel' => $this->dataMahasiswa->findAll(),
            'cumatabeldua' => $this->dataDosen->findAll(),
            'gabung' => $this->dataDosen->gabungTabel()
        ];

        return view('data/index', $data);
    }

    public function indexMahasiswa()
    {
        if (session()->get('kasta') == '') {
            session()->setFlashdata('gagal', 'Anda Harus Login !!!');
            return redirect()->to('login/loginWeb');
        }

        $data = [
            'title' => 'saya sayang ibuku',
            'bimbinganMhs' => $this->dataDosen->gabungTabel()
        ];

        return view('data/indexmhs', $data);
    }

    public function pengajuan($id)
    {
        if (session()->get('kasta') == '') {
            session()->setFlashdata('gagal', 'Anda Harus Login !!!');
            return redirect()->to('login/loginWeb');
        }

        $data = [
            'title' => 'Pengajuan',
            'dataCek' => $this->dataMahasiswa->getMahasiswaCek($id),
            'dataMhs' => $this->dataMahasiswa->findColumn('judul')
        ];

        return view('data/halamanPengajuan', $data);
    }

    public function ubah($id)
    {
        if (session()->get('kasta') == 'mahasiswa' || session()->get('kasta') == 'dosen') {
            session()->setFlashdata('gagal', 'Anda Harus Login !!!');
            return redirect()->to('../Utama');
        } elseif (session()->get('kasta') == '') {
            session()->setFlashdata('gagal', 'Anda Harus Login !!!');
            return redirect()->to('../login/loginWeb');
        }

        $data = [
            'title' => 'Ubah Data',
            'datanya' => $this->dataMahasiswa->getMahasiswaCek($id),
            'datanyaDosen' => $this->dataDosen->getDosenCek($id),
            'dataqu' => $this->dataDosen->findColumn('slug'),
            'dataslug' => $this->dataDosen->findAll()
        ];

        $dosenUbahHalaman = $this->request->getVar('ubahDosen');

        if (isset($dosenUbahHalaman) == true) {
            return view('data/ubahdosen', $data);
        } else {
            return view('data/ubah', $data);
        }
    }

    public function detail($id)
    {
        if (session()->get('kasta') == 'mahasiswa' || session()->get('kasta') == 'dosen') {
            session()->setFlashdata('gagal', 'Anda Harus Login !!!');
            return redirect()->to('../Utama');
        } elseif (session()->get('kasta') == '') {
            session()->setFlashdata('gagal', 'Anda Harus Login !!!');
            return redirect()->to('../login/loginWeb');
        }

        $data = [
            'title' => 'Detail Mahasiswa',
            'tampildetail' => $this->dataMahasiswa->getMahasiswaCek($id)
        ];

        return view('data/detail', $data);
    }

    public function detailDosen($id)
    {
        if (session()->get('kasta') == 'mahasiswa' || session()->get('kasta') == 'dosen') {
            session()->setFlashdata('gagal', 'Anda Harus Login !!!');
            return redirect()->to('../Utama');
        } elseif (session()->get('kasta') == '') {
            session()->setFlashdata('gagal', 'Anda Harus Login !!!');
            return redirect()->to('../login/loginWeb');
        }

        $data = [
            'title' => 'Detail Dosen',
            'tampildetaildosen' => $this->dataDosen->getDosenCek($id)
        ];

        return view('data/detailDosen', $data);
    }

    public function tambahMahasiswa()
    {
        if (session()->get('kasta') == 'mahasiswa' || session()->get('kasta') == 'dosen') {
            session()->setFlashdata('gagal', 'Anda Harus Login !!!');
            return redirect()->to('../Utama');
        } elseif (session()->get('kasta') == '') {
            session()->setFlashdata('gagal', 'Anda Harus Login !!!');
            return redirect()->to('../login/loginWeb');
        }

        $data = [
            'title' => 'Tambah Data Mahasiswa',
            'validasi' => \Config\Services::validation()
        ];

        return view('data/mahasiswa', $data);
    }
    public function tambahDosen()
    {
        if (session()->get('kasta') == 'mahasiswa' || session()->get('kasta') == 'dosen') {
            session()->setFlashdata('gagal', 'Anda Harus Login !!!');
            return redirect()->to('../Utama');
        } elseif (session()->get('kasta') == '') {
            session()->setFlashdata('gagal', 'Anda Harus Login !!!');
            return redirect()->to('../login/loginWeb');
        }

        $data = [
            'title' => 'Tambah Data Dosen',
            'validasidua' => \Config\Services::validation()
        ];

        return view('data/dosen', $data);
    }

    // Registrasi Admin
    public function registrasiAdmin()
    {
        if (session()->get('kasta') == 'mahasiswa' || session()->get('kasta') == 'dosen') {
            session()->setFlashdata('gagal', 'Anda Harus Login !!!');
            return redirect()->to('../Utama');
        } elseif (session()->get('kasta') == '') {
            session()->setFlashdata('gagal', 'Anda Harus Login !!!');
            return redirect()->to('../login/loginWeb');
        }

        $data = [
            'title' => 'Registrasi Admin',
            'validasiRegistrasi' => \Config\Services::validation()
        ];

        return view('data/registrasi', $data);
    }

    public function simpanRegistrasi()
    {
        if (session()->get('kasta') == 'mahasiswa' || session()->get('kasta') == 'dosen' || session()->get('kasta') == '') {
            session()->setFlashdata('gagal', 'Anda Harus Login !!!');
            return redirect()->to('login/loginWeb');
        }

        $admin = $this->request->getVar('admin');
        if (isset($admin)) {
            if (!$this->validate([
                'nama' => [
                    'rules' => 'required|is_unique[login.nama]',
                    'errors' => [
                        'required' => '{field} harus di isi',
                        'is_unique' => '{field} sudah ada'
                    ]
                ],
                'nim' => [
                    'rules' => 'required|min_length[9]|max_length[9]|is_unique[login.nim]',
                    'errors' => [
                        'required' => '{field} harus di isi',
                        'min_length' => 'karakter harus 9 digit',
                        'max_length' => 'karakter harus 9 digit',
                        'is_unique' => '{field} sudah ada'
                    ]
                ]
            ])) {
                return redirect()->to('/dataku/registrasiAdmin')->withInput();
            }
        }

        $this->admin->save([
            'nama' => $this->request->getVar('nama'),
            'nim' => $this->request->getVar('nim'),
            'level' => $this->request->getVar('adm')
        ]);
        return redirect()->to('/dataku');
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
                    'rules' => 'required|min_length[9]|max_length[9]|is_unique[mahasiswa.nim]',
                    'errors' => [
                        'required' => '{field} harus di isi',
                        'min_length' => 'karakter harus 9 digit',
                        'max_length' => 'karakter harus 9 digit',
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
                    'rules' => 'required|min_length[9]|max_length[9]|is_unique[dosen.nik]',
                    'errors' => [
                        'required' => '{field} harus di isi',
                        'min_length' => 'karakter harus 9 digit',
                        'max_length' => 'karakter harus 9 digit',
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
                'jk' => $this->request->getVar('jk'),
                'level' => $this->request->getVar('mhs')
            ]);
        } else {
            $this->dataDosen->save([
                'nama' => $this->request->getVar('nama'),
                'nik' => $this->request->getVar('nik'),
                'bidangkeahlian' => $this->request->getVar('bidangkeahlian'),
                'jk' => $this->request->getVar('jk'),
                'level' => $this->request->getVar('dsn'),
                'slug' => url_title($this->request->getVar('nama'), '-', true)
            ]);
        }

        return redirect()->to('/dataku');
    }

    public function hapus($id)
    {
        if (session()->get('kasta') == 'mahasiswa' || session()->get('kasta') == 'dosen') {
            session()->setFlashdata('gagal', 'Anda Harus Login !!!');
            return redirect()->to('../Utama');
        } elseif (session()->get('kasta') == '') {
            session()->setFlashdata('gagal', 'Anda Harus Login !!!');
            return redirect()->to('../login/loginWeb');
        }

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
        if (session()->get('kasta') == 'dosen' || session()->get('kasta') == '') {
            session()->setFlashdata('gagal', 'Anda Harus Login !!!');
            return redirect()->to('../Utama');
        } elseif (session()->get('kasta') == '') {
            session()->setFlashdata('gagal', 'Anda Harus Login !!!');
            return redirect()->to('../login/loginWeb');
        }

        $mahasiswaUbah = $this->request->getVar('mahasiswaubah');
        $dosenUbah = $this->request->getVar('dosenUbah');
        $tambahjudul = $this->request->getVar('ajukan');

        if (isset($mahasiswaUbah) == true) {

            $slug = url_title($this->request->getVar('pilih'), '-', true);

            // update mahasiswa
            $this->dataMahasiswa->save([
                'id' => $id,
                'nama' => $this->request->getVar('nama'),
                'nim' => $this->request->getVar('nim'),
                'ipk' => $this->request->getVar('ipk'),
                'jk' => $this->request->getVar('jk'),
                'slug' => $slug,
            ]);

            session()->setFlashdata('pesan', 'Data berhasil di ubah.');
            return redirect()->to('/dataku');
        } elseif (isset($tambahjudul) == true) {

            $file = $this->request->getFile('file');
            $namaFile = $file->getRandomName();
            $file->getMimeType();
            $file->store('../../public/penyimpananFiles', $namaFile);

            $data = [
                'judul' => $this->request->getVar('judul'),
                'file' => $file
            ];

            $this->dataMahasiswa->update($id, $data);
            session()->setFlashdata('pesanJudul', 'Data berhasil di ubah.');
            return redirect()->to('/dataku/indexMahasiswa');
        } else {

            // update dosen
            $this->dataDosen->save([
                'id' => $id,
                'nama' => $this->request->getVar('nama'),
                'nik' => $this->request->getVar('nik'),
                'bidangkeahlian' => $this->request->getVar('bidangkeahlian'),
                'jk' => $this->request->getVar('jk')
            ]);

            session()->setFlashdata('pesan', 'Data berhasil di ubah.');
            return redirect()->to('/dataku');
        }
    }
}
