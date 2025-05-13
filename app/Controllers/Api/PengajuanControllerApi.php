<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\PengajuanModel;

class PengajuanControllerApi extends ResourceController
{
    protected $modelName = 'App\Models\PengajuanModel';
    protected $format    = 'json';
    
    public function index()
    {
        return $this->respond([
            'success' => true,
            'message' => 'Success',
            'data' => $this->model->findAll()
            ]   
        );
    }
    
    public function create()
    {
    $data = $this->request->getPost();

    if ($this->model->insert($data) === false) {
        return $this->fail([
            'status' => 500,
            'message' => 'Gagal menyimpan data',
            'errors' => $this->model->errors()
        ]);
    }

    return $this->respondCreated([
        'status' => 201,
        'message' => 'Data berhasil disimpan',
        'data' => $data
    ]);
}


    public function update($id = null)
{
    $data = $this->request->getRawInput();

    // Filter hanya kolom yang ingin kamu izinkan untuk update
    $allowedUpdate = array_intersect_key($data, array_flip(['status_pengajuan']));

    if (empty($allowedUpdate)) {
        return $this->fail('Tidak ada data yang valid untuk diupdate', 400);
    }

    $this->model->update($id, $allowedUpdate);

    if (!$this->model->errors()) {
        return $this->respond([
            'status' => 200,
            'message' => 'Status berhasil diupdate',
            'data' => $allowedUpdate
        ]);
    }

    return $this->fail('Gagal update data', 500);
}
}
