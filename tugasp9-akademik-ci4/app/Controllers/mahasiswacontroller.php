<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;

class MahasiswaController extends BaseController
{
    protected $mahasiswaModel;

    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
    }

    // Menampilkan daftar mahasiswa
    public function index()
    {
        $data = [
            'mahasiswa' => $this->mahasiswaModel->findAll()
        ];

        return view('mahasiswa/index', $data);
    }

    // Menampilkan form tambah
    public function create()
    {
        return view('mahasiswa/create');
    }

    // Menyimpan mahasiswa baru
    public function store()
    {
        $aturan = [
            'nim' => 'required|is_unique[mahasiswa.nim]',
            'nama' => 'required',
            'email' => 'required|valid_email|is_unique[mahasiswa.email]',
            'prodi' => 'required',
            'angkatan' => 'required|numeric',
            'ipk' => 'required|decimal|greater_than_equal_to[0]|less_than_equal_to[4]'
        ];

        if (!$this->validate($aturan)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nim' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'prodi' => $this->request->getPost('prodi'),
            'angkatan' => $this->request->getPost('angkatan'),
            'ipk' => $this->request->getPost('ipk')
        ];

        $this->mahasiswaModel->insert($data);

        return redirect()->to('/mahasiswa')
            ->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $mahasiswa = $this->mahasiswaModel->find($id);

        if (!$mahasiswa) {
            return redirect()->to('/mahasiswa')
                ->with('error', 'Data mahasiswa tidak ditemukan.');
        }

        return view('mahasiswa/edit', [
            'mahasiswa' => $mahasiswa
        ]);
    }

    // Memperbarui data mahasiswa
    public function update($id)
    {
        $mahasiswa = $this->mahasiswaModel->find($id);

        if (!$mahasiswa) {
            return redirect()->to('/mahasiswa')
                ->with('error', 'Data mahasiswa tidak ditemukan.');
        }

        $aturan = [
            'nim' => "required|is_unique[mahasiswa.nim,id,$id]",
            'nama' => 'required',
            'email' => "required|valid_email|is_unique[mahasiswa.email,id,$id]",
            'prodi' => 'required',
            'angkatan' => 'required|numeric',
            'ipk' => 'required|decimal|greater_than_equal_to[0]|less_than_equal_to[4]'
        ];

        if (!$this->validate($aturan)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nim' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'prodi' => $this->request->getPost('prodi'),
            'angkatan' => $this->request->getPost('angkatan'),
            'ipk' => $this->request->getPost('ipk')
        ];

        $this->mahasiswaModel->update($id, $data);

        return redirect()->to('/mahasiswa')
            ->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    // Menghapus data mahasiswa
    public function delete($id)
    {
        $mahasiswa = $this->mahasiswaModel->find($id);

        if (!$mahasiswa) {
            return redirect()->to('/mahasiswa')
                ->with('error', 'Data mahasiswa tidak ditemukan.');
        }

        $this->mahasiswaModel->delete($id);

        return redirect()->to('/mahasiswa')
            ->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}
