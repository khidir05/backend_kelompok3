<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'NIM'; // ✅ Ganti jadi NIM, bukan 'id'
    protected $allowedFields = ['NIM', 'nama', 'kelas', 'semester', 'tahun_akademik', 'status', 'id_prodi'];

    protected $validationRules = [
        'NIM' => 'required',
        'nama' => 'required',
        'kelas' => 'required',
        'semester' => 'required|numeric',
        'tahun_akademik' => 'required|numeric',
        'status' => 'required',
        'id_prodi' => 'required'
    ];
}
