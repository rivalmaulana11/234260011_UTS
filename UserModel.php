<?php

// app/Models/UserModel.php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
    protected $table = 'users'; // Nama tabel
    protected $allowedFields = ['username', 'password']; // Kolom yang diizinkan untuk diisi
    protected $useTimestamps = false; // Tidak menggunakan timestamp
}
