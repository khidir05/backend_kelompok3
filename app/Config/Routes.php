<?php

use CodeIgniter\Router\RouteCollection;
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

