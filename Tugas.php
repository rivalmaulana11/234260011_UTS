<?php

// app/Controllers/Tugas.php
namespace App\Controllers;

use App\Models\TugasModel;
use CodeIgniter\Controller;

class Tugas extends Controller {
    // Fungsi untuk menampilkan daftar tugas
    public function index() {
        $model = new TugasModel(); // Membuat instance dari TugasModel
        // Mengambil semua tugas milik user yang sedang login
        $data['tugas'] = $model->where('user_id', session()->get('user_id'))->findAll();
        return view('tugas/index', $data); // Menampilkan halaman tugas
    }

    // Fungsi untuk menambah tugas
    public function tambah() {
        // Memeriksa apakah metode request adalah POST
        if ($this->request->getMethod() === 'post') {
            $model = new TugasModel(); // Membuat instance dari TugasModel
            // Menyimpan data tugas ke database
            $model->save([
                'judul' => $this->request->getPost('judul'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'deadline' => $this->request->getPost('deadline'),
                'status' => $this->request->getPost('status'),
                'user_id' => session()->get('user_id'), // Mengaitkan tugas dengan user yang sedang login
            ]);
            return redirect()->to('/tugas'); // Redirect ke halaman tugas
        }
        return view('tugas/tambah'); // Menampilkan halaman tambah tugas
    }

    // Fungsi untuk mengedit tugas
    public function edit($id) {
        $model = new TugasModel(); // Membuat instance dari TugasModel
        // Memeriksa apakah metode request adalah POST
        if ($this->request->getMethod() === 'post') {
            // Memperbarui data tugas berdasarkan ID
            $model->update($id, [
                'judul' => $this->request->getPost('judul'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'deadline' => $this->request->getPost('deadline'),
                'status' => $this->request->getPost('status'),
            ]);
            return redirect()->to('/tugas'); // Redirect ke halaman tugas
        }
        $data['tugas'] = $model->find($id); // Mengambil data tugas berdasarkan ID
        return view('tugas/edit', $data); // Menampilkan halaman edit tugas
    }

    // Fungsi untuk menghapus tugas
    public function hapus($id) {
        $model = new TugasModel(); // Membuat instance dari TugasModel
        $model->delete($id); // Menghapus tugas berdasarkan ID
        return redirect()->to('/tugas'); // Redirect ke halaman tugas
    }
}
