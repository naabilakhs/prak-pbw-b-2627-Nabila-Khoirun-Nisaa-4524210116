
<?php

use App\Controllers\MahasiswaController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Menampilkan daftar mahasiswa
$routes->get('/mahasiswa', 'MahasiswaController::index');

// Menampilkan form tambah mahasiswa
$routes->get('/mahasiswa/tambah', 'MahasiswaController::create');

// Menyimpan data mahasiswa
$routes->post('/mahasiswa/simpan', 'MahasiswaController::store');
