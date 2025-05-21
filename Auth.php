<?php

// app/Controllers/Auth.php
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller {
    // Fungsi untuk login
    public function login() {
        helper(['form']); // Memuat helper form untuk validasi

        // Memeriksa apakah metode request adalah POST
        if ($this->request->getMethod() === 'post') {
            $model = new UserModel(); // Membuat instance dari UserModel
            // Mencari user berdasarkan username
            $user = $model->where('username', $this->request->getPost('username'))->first();

            // Memverifikasi password
            if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
                // Menyimpan data user ke session
                session()->set(['user_id' => $user['id'], 'username' => $user['username']]);
                return redirect()->to('/tugas'); // Redirect ke halaman tugas
            }
            return redirect()->back()->with('error', 'Login gagal'); // Pesan error jika login gagal
        }
        return view('auth/login'); // Menampilkan halaman login
    }

    // Fungsi untuk registrasi
    public function register() {
        helper(['form']); // Memuat helper form untuk validasi

        // Memeriksa apakah metode request adalah POST
        if ($this->request->getMethod() === 'post') {
            $model = new UserModel(); // Membuat instance dari UserModel
            // Menyiapkan data untuk disimpan
            $data = [
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT), // Meng-hash password
            ];
            $model->insert($data); // Menyimpan data user ke database
            return redirect()->to('/login'); // Redirect ke halaman login
        }
        return view('auth/register'); // Menampilkan halaman registrasi
    }

    // Fungsi untuk logout
    public function logout() {
        session()->destroy(); // Menghancurkan session
        return redirect()->to('/login'); // Redirect ke halaman login
    }
}
