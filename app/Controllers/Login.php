<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\MahasiswaModel;
use App\Models\StaffModel;
use CodeIgniter\Database\Exceptions\DatabaseException;

class Login extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function process()
    {
        try {
            $nama = $this->request->getPost('nama');
            $password = $this->request->getPost('password'); // NIM/NIP

            $mahasiswaModel = new MahasiswaModel();
            $staffModel = new StaffModel();

            // Cek mahasiswa
            $mhs = $mahasiswaModel->where('nama', $nama)->where('NIM', $password)->first();

            if ($mhs) {
                session()->set([
                    'role' => 'mahasiswa',
                    'nim' => $mhs['NIM'],
                    'nama' => $mhs['nama'],
            ]);
            return redirect()->to('/dashboard');
            }

            // Cek staff
            $stf = $staffModel->where('nama', $nama)->where('NIP', $password)->first();

            if ($stf) {
                session()->set([
                    'role' => 'staff',
                    'nip' => $stf['NIP'],
                    'nama' => $stf['nama'],
            ]);
            return redirect()->to('/dashboard');
            }

            return redirect()->back()->with('error', 'Nama atau password salah.');

        } catch (DatabaseException $e) {
            return redirect()->back()->with('error', 'Gagal terhubung ke database.');
        }
    }
}
