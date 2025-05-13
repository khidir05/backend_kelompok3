<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
class AuthController extends ResourceController
{

    public function index()
    {
        //
    }

    public function loginMahasiswa()
    {
        $mahasiswaModel = new MahasiswaModel();

        $nim = $this->request->getPost('nim');
        $nama = $this->request->getPost('nama');
        if(!$nim || !$nama){ 
            return $this->failValidationErrors('NIM or Nama is required');
        }

        $mahasiswa = $mahasiswaModel->where('nim', $nim)->where('nama', $nama)->first();

        if ($mahasiswa) {
            return $this->respond([
                'status' => 200,
                'message' => 'Login successful',
                'role' => 'mahasiswa',
                'data' => $mahasiswa
            ]);
        }

        return $this->failNotFound('Username Atau password salah');

    }

    public function loginStaff()
    {
        $staffModel = new \App\Models\StaffModel();

        $nip = $this->request->getPost('nip');
        $nama = $this->request->getPost('nama');

        if(!$nip || !$nama){ 
            return $this->failValidationErrors('Username or Password is required');
        }

        $staff = $staffModel->where('nama', $nama)->where('nip', $nip)->first();

        if ($staff) {
            return $this->respond([
                'status' => 200,
                'message' => 'Login successful',
                'role' => 'staff',
                'data' => $staff
            ]);
        }

        return $this->failNotFound('Username Atau password salah');

    }
}
