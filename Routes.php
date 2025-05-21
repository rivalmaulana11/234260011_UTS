<?php

// app/Config/Routes.php
$routes->get('/login', 'Auth::login'); // Route untuk halaman login
$routes->post('/login', 'Auth::login'); // Route untuk proses login
$routes->get('/register', 'Auth::register'); // Route untuk halaman registrasi
$routes->post('/register', 'Auth::register'); // Route untuk proses registrasi
$routes->get('/logout', 'Auth::logout'); // Route untuk logout

$routes->get('/tugas', 'Tugas::index'); // Route untuk halaman daftar tugas
$routes->get('/tugas/tambah', 'Tugas::tambah'); // Route untuk halaman tambah tugas
$routes->post('/tugas/tambah', 'Tugas::tambah'); // Route untuk proses tambah tugas
$routes->get('/tugas/edit/(:num)', 'Tugas::edit/$1'); // Route untuk halaman edit tugas
$routes->post('/tugas/edit/(:num)', 'Tugas::edit/$1'); // Route untuk proses edit tugas
$routes->get('/tugas/hapus/(:num)', 'Tugas::hapus/$1'); // Route untuk proses hapus tugas
