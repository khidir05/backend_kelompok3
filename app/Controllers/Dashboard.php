<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use App\Models\PengajuanModel;
use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        $session = session();
        $role = $session->get('role');
        
        if ($role == 'mahasiswa') {
            $mahasiswaModel = new MahasiswaModel();
            $mahasiswa = $mahasiswaModel->where('nim', $session->get('nim'))->first();
            return view('dashboard_mahasiswa', ['mhs' => $mahasiswa]);
        } elseif ($role == 'staff') {
            $pengajuanModel = new PengajuanModel();
            $data = $pengajuanModel->findAll();
            return view('dashboard_staff', ['pengajuan' => $data]);
        } else {
            return redirect()->to('/login');
        }
        //Login session
    }
    
    public function submit()
    {
        $session = session();
        $role = $session->get('role');
        
        if ($role !== 'mahasiswa') {
            return redirect()->to('/dashboard');
        }
        
        $pengajuanModel = new \App\Models\PengajuanModel();
        
        $pengajuanModel->insert([
            'NIM' => $session->get('nim'),
            'nama' => $session->get('nama'),
            'kelas' => $this->request->getPost('kelas'),
            'semester' => $this->request->getPost('semester'),
            'tgl_pengajuan' => date('Y-m-d'),
            'tgl_mulai_cuti' => $this->request->getPost('tgl_mulai_cuti'),
            'tgl_selesai_cuti' => $this->request->getPost('tgl_selesai_cuti'),
            'alasan' => $this->request->getPost('alasan'),
            'status_pengajuan' => 'menunggu',
        ]);
        
        return view('pengajuan_berhasil');
        //pengajuan
    }
    
    public function updateStatus($id, $aksi)
    {
        $pengajuanModel = new \App\Models\PengajuanModel();
        
        if ($aksi === 'setuju') {
            $status = 'disetujui';
        } elseif ($aksi === 'tolak') {
            $status = 'ditolak';
        } else {
            return redirect()->back()->with('error', 'Aksi tidak valid');
        }
        
        $pengajuanModel->update($id, ['status_pengajuan' => $status]);
        
        return redirect()->to('/dashboard')->with('success', 'Status pengajuan diperbarui.');
    }
    
    public function dashboardStaff()
    {
        // HANYA tampilkan pengajuan yang statusnya BUKAN menunggu
        $pengajuanModel = new \App\Models\PengajuanModel();
        $pengajuan = $pengajuanModel
        ->whereIn('status_pengajuan', ['disetujui', 'ditolak'])
        ->findAll();
        
        return view('dashboard_staff', ['pengajuan' => $pengajuan]);
    }
    
    public function menunggu()
    {
        $pengajuanModel = new \App\Models\PengajuanModel();
        $pengajuan = $pengajuanModel->where('status_pengajuan', 'menunggu')->findAll();
        
        return view('menunggu', ['pengajuan' => $pengajuan]);
    }
    
    public function mahasiswa()
    {
        $mahasiswaModel = new \App\Models\MahasiswaModel();
        $mahasiswa = $mahasiswaModel->findAll();
        
        return view('kelola_mahasiswa', ['mahasiswa' => $mahasiswa]);
    }
    
    // Tampilkan form tambah mahasiswa
    public function tambahMahasiswa()
    {
        return view('tambah_mahasiswa');
    }
    
    // Simpan data mahasiswa dari form tambah
    public function simpanMahasiswa()
    {
        $mahasiswaModel = new \App\Models\MahasiswaModel();
        $data = [
            'NIM' => $this->request->getPost('NIM'),
            'nama' => $this->request->getPost('nama'),
            'kelas' => $this->request->getPost('kelas'),
            'semester' => $this->request->getPost('semester'),
            'status' => $this->request->getPost('status'),
            'id_prodi' => $this->request->getPost('id_prodi')
        ];
        
        $mahasiswaModel->insert($data);
        return redirect()->to('/dashboard/mahasiswa');
    }
    
    // Tampilkan form edit berdasarkan NIM
    public function editMahasiswa($nim)
    {
        $mahasiswaModel = new \App\Models\MahasiswaModel();
        $mahasiswa = $mahasiswaModel->find($nim);
        
        return view('edit_mahasiswa', ['mahasiswa' => $mahasiswa]);
    }
    
    // Simpan hasil edit mahasiswa
    public function updateMahasiswa($nim)
    {
        $mahasiswaModel = new \App\Models\MahasiswaModel();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'kelas' => $this->request->getPost('kelas'),
            'semester' => $this->request->getPost('semester'),
            'status' => $this->request->getPost('status'),
            'id_prodi' => $this->request->getPost('id_prodi')
        ];
        
        $mahasiswaModel->update($nim, $data);
        return redirect()->to('/dashboard/mahasiswa');
    }
    
    // Hapus mahasiswa berdasarkan NIM
    public function hapusMahasiswa($nim)
    {
        $mahasiswaModel = new \App\Models\MahasiswaModel();
        $mahasiswaModel->delete($nim);
        
        return redirect()->to('/dashboard/mahasiswa');
    }
    
}
