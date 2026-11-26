<?php

namespace App\Controllers;

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

    // Menyimpan data mahasiswa
    public function store()
    {
        $rules = [
            'nim' => [
                'rules' => 'required|min_length[8]|max_length[15]|is_unique[mahasiswa.nim]',
                'errors' => [
                    'required' => 'NIM wajib diisi.',
                    'min_length' => 'NIM minimal 8 karakter.',
                    'max_length' => 'NIM maksimal 15 karakter.',
                    'is_unique' => 'NIM sudah terdaftar.'
                ]
            ],
            'nama' => [
                'rules' => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required' => 'Nama wajib diisi.',
                    'min_length' => 'Nama minimal 3 karakter.',
                    'max_length' => 'Nama maksimal 100 karakter.'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|max_length[100]',
                'errors' => [
                    'required' => 'Email wajib diisi.',
                    'valid_email' => 'Format email tidak valid.',
                    'max_length' => 'Email maksimal 100 karakter.'
                ]
            ],
            'prodi' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Program studi wajib diisi.',
                    'max_length' => 'Program studi maksimal 100 karakter.'
                ]
            ],
            'ipk' => [
                'rules' => 'required|decimal|greater_than_equal_to[0]|less_than_equal_to[4]',
                'errors' => [
                    'required' => 'IPK wajib diisi.',
                    'decimal' => 'IPK harus berupa angka desimal.',
                    'greater_than_equal_to' => 'IPK minimal 0.',
                    'less_than_equal_to' => 'IPK maksimal 4.'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nim' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'prodi' => $this->request->getPost('prodi'),
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

        $rules = [
            'nim' => [
                'rules' => "required|min_length[8]|max_length[15]|is_unique[mahasiswa.nim,id,{$id}]",
                'errors' => [
                    'required' => 'NIM wajib diisi.',
                    'min_length' => 'NIM minimal 8 karakter.',
                    'max_length' => 'NIM maksimal 15 karakter.',
                    'is_unique' => 'NIM sudah digunakan mahasiswa lain.'
                ]
            ],
            'nama' => [
                'rules' => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required' => 'Nama wajib diisi.',
                    'min_length' => 'Nama minimal 3 karakter.',
                    'max_length' => 'Nama maksimal 100 karakter.'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|max_length[100]',
                'errors' => [
                    'required' => 'Email wajib diisi.',
                    'valid_email' => 'Format email tidak valid.',
                    'max_length' => 'Email maksimal 100 karakter.'
                ]
            ],
            'prodi' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Program studi wajib diisi.',
                    'max_length' => 'Program studi maksimal 100 karakter.'
                ]
            ],
            'ipk' => [
                'rules' => 'required|decimal|greater_than_equal_to[0]|less_than_equal_to[4]',
                'errors' => [
                    'required' => 'IPK wajib diisi.',
                    'decimal' => 'IPK harus berupa angka desimal.',
                    'greater_than_equal_to' => 'IPK minimal 0.',
                    'less_than_equal_to' => 'IPK maksimal 4.'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nim' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'prodi' => $this->request->getPost('prodi'),
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
