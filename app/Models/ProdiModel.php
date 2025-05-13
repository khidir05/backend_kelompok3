<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdiModel extends Model
{
    protected $table = 'prodi';
    protected $primaryKey = 'id_prodi'; // ✅ Ganti jadi id_prodi, bukan 'id'
    protected $allowedFields = ['id_prodi', 'nama', 'id_jurusan'];

    protected $validationRules = [
        'id_prodi' => 'required',
        'nama' => 'required',
        'id_jurusan' => 'required'
    ];
}
