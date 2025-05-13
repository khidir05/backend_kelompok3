<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Login');
$routes->setDefaultMethod('index');
$routes->setAutoRoute(true); // Aktifkan agar routing otomatis bisa digunakan saat pengembangan

// Auth routes
$routes->get('/', 'Login::index');
$routes->post('/login/process', 'Login::process');
$routes->get('/logout', function() {
    session()->destroy();
    return redirect()->to('/login');
});

// Dashboard
$routes->get('/hello', fn() => 'Hello World!');
$routes->get('/dashboard', 'Dashboard::index');
$routes->post('/dashboard/submit', 'Dashboard::submit');
$routes->get('/dashboard/update-status/(:num)/(:segment)', 'Dashboard::updateStatus/$1/$2');
$routes->get('/dashboard/dashboardStaff', 'Dashboard::dashboardStaff');
$routes->get('/dashboard/mahasiswa', 'Dashboard::mahasiswa');
$routes->get('/dashboard/menunggu', 'Dashboard::menunggu');
$routes->get('/dashboard/tambahMahasiswa', 'Dashboard::tambahMahasiswa');
$routes->post('/dashboard/simpanMahasiswa', 'Dashboard::simpanMahasiswa');
$routes->get('/dashboard/editMahasiswa/(:segment)', 'Dashboard::editMahasiswa/$1');
$routes->post('/dashboard/updateMahasiswa/(:segment)', 'Dashboard::updateMahasiswa/$1');
$routes->get('/dashboard/hapusMahasiswa/(:segment)', 'Dashboard::hapusMahasiswa/$1');

// Staff Routes (Web)
$routes->get('/staff', 'StaffController::index');
$routes->get('/staff/create', 'StaffController::create');
$routes->post('/staff/store', 'StaffController::store');
$routes->get('/staff/edit/(:segment)', 'StaffController::edit/$1');
$routes->post('/staff/update/(:segment)', 'StaffController::update/$1');
$routes->get('/staff/delete/(:segment)', 'StaffController::delete/$1');

// Jurusan Routes (Web)
$routes->get('/jurusan', 'JurusanController::index');
$routes->get('/jurusan/create', 'JurusanController::create');
$routes->post('/jurusan/store', 'JurusanController::store');
$routes->get('/jurusan/edit/(:segment)', 'JurusanController::edit/$1');
$routes->post('/jurusan/update/(:segment)', 'JurusanController::update/$1');
$routes->get('/jurusan/delete/(:segment)', 'JurusanController::delete/$1');

// Prodi Routes (Web)
$routes->get('/prodi', 'ProdiController::index');
$routes->get('/prodi/create', 'ProdiController::create');
$routes->post('/prodi/store', 'ProdiController::store');
$routes->get('/prodi/edit/(:segment)', 'ProdiController::edit/$1');
$routes->post('/prodi/update/(:segment)', 'ProdiController::update/$1');
$routes->get('/prodi/delete/(:segment)', 'ProdiController::delete/$1');


// ===== ✅ API Routes for Postman (JSON response) =====

// Mahasiswa API
$routes->group('api/mahasiswa', ['namespace' => 'App\Controllers\Api'], function($routes) {
    $routes->post('login', 'AuthController::loginMahasiswa');
    $routes->get('/', 'MahasiswaControllerApi::index');
    $routes->get('(:segment)', 'MahasiswaControllerApi::show/$1');
    $routes->post('/', 'MahasiswaControllerApi::create');
    $routes->put('(:segment)', 'MahasiswaControllerApi::update/$1');
    $routes->delete('(:segment)', 'MahasiswaControllerApi::delete/$1');
});

// $routes->group('api/mahasiswa/(:segment)', ['namespace' => 'App\Controllers\Api'], function($routes) {
//     $routes->get('pengajuan', 'MahasiswaControllerApi::pengajuan/$1');
//     $routes->post('pengajuan', 'MahasiswaControllerApi::submit/$1');
// });
$routes->group('api/pengajuan', ['namespace' => 'App\Controllers\Api'], function($routes) {
    $routes->get('/', 'PengajuanControllerApi::index');
    $routes->post('/', 'PengajuanControllerApi::create');
    $routes->put('(:segment)', 'PengajuanControllerApi::update/$1');
});


// Staff API
$routes->group('api/staff', ['namespace' => 'App\Controllers\Api'], function($routes) {
    $routes->post('login', 'AuthController::loginStaff');
    $routes->get('/', 'StaffControllerApi::index');
    $routes->get('(:segment)', 'StaffControllerApi::show/$1');
    $routes->post('/', 'StaffControllerApi::create');
    $routes->put('(:segment)', 'StaffControllerApi::update/$1');
    $routes->delete('(:segment)', 'StaffControllerApi::delete/$1');
});

// Jurusan API
$routes->group('api/jurusan', ['namespace' => 'App\Controllers\Api'], function($routes) {
    $routes->get('/', 'JurusanControllerApi::index');
    $routes->get('(:segment)', 'JurusanControllerApi::show/$1');
    $routes->post('/', 'JurusanControllerApi::create');
    $routes->put('(:segment)', 'JurusanControllerApi::update/$1');
    $routes->delete('(:segment)', 'JurusanControllerApi::delete/$1');
});

// Prodi API
$routes->group('api/prodi', ['namespace' => 'App\Controllers\Api'], function($routes) {
    $routes->get('/', 'ProdiControllerApi::index');
    $routes->get('(:segment)', 'ProdiControllerApi::show/$1');
    $routes->post('/', 'ProdiControllerApi::create');
    $routes->put('(:segment)', 'ProdiControllerApi::update/$1');
    $routes->delete('(:segment)', 'ProdiControllerApi::delete/$1');
});

