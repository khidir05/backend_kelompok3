<?php

namespace App\Models;

use CodeIgniter\Model;

class JurusanModel extends Model
{
    protected $table = 'jurusan';
    protected $primaryKey = 'id_jurusan'; // ✅ Ganti jadi id_jurusan, bukan 'id'
    protected $allowedFields = ['id_jurusan', 'nama'];

    protected $validationRules = [
        'id_jurusan' => 'required',
        'nama' => 'required'
    ];
}
