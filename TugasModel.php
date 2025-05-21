<?php

// app/Models/TugasModel.php
namespace App\Models;

use CodeIgniter\Model;

class TugasModel extends Model {
    protected $table = 'tugas'; // Nama tabel
    protected $allowedFields = ['judul', 'deskripsi', 'deadline', 'status', 'user_id']; // Kolom yang diizinkan untuk diisi
    protected $useTimestamps = false; // Tidak menggunakan timestamp
}
