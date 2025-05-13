<?php

namespace App\Models;

use CodeIgniter\Model;

class StaffModel extends Model
{
    protected $table = 'staff';
    protected $primaryKey = 'NIP'; // ✅ Ganti jadi NIP, bukan 'id'
    protected $allowedFields = ['NIP', 'nama', 'jabatan'];

    protected $validationRules = [
        'NIP' => 'required',
        'nama' => 'required',
        'jabatan' => 'required'
    ];
}
