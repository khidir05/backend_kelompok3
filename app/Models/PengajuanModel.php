<?php

namespace App\Models;

use CodeIgniter\Model;

class PengajuanModel extends Model
{
    protected $table = 'pengajuan';
    protected $primaryKey = 'id_pengajuan';
    protected $allowedFields = [
    'id_pengajuan',
    'NIM',
    'nama',
    'kelas',
    'semester',
    'tgl_pengajuan',
    'tgl_mulai_cuti',
    'tgl_selesai_cuti',
    'alasan',
    'dokumen',
    'status_pengajuan'  // ✅ ini penting
];

    protected $validationRules = [
        'id_pengajuan' => 'required',
        'NIM' => 'required',
        'nama' => 'required',
        'kelas' => 'required',
        'semester' => 'required',
        'tgl_pengajuan' => 'required',
        'tgl_mulai_cuti' => 'required',
        'tgl_selesai_cuti' => 'required',
        'alasan' => 'required',
        'dokumen' => 'required', // jika ada upload dokumen
        'status_pengajuan' => 'required'
        // 'dokumen' => 'uploaded[dokumen]|max_size[dokumen,2048]|ext_in[dokumen,pdf,doc,docx]', // jika ada upload dokumen
    ];
}
