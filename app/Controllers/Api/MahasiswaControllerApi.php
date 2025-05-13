<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\MahasiswaModel;

class MahasiswaControllerApi extends ResourceController
{
    protected $modelName = 'App\Models\MahasiswaModel';
    protected $format    = 'json';
    
    public function index()
    {
        return $this->respond([
            'success' => true,
            'message' => 'Data Mahasiswa',
            'data' => $this->model->findAll()
            ]   
        );
    }
    
    public function show($id = null)
    {
        $data = $this->model->find($id);
        if ($data) {
            return $this->respond($data);
        }
        return $this->failNotFound('Data tidak ditemukan');
    }
    
    public function create()
    {
        $data = $this->request->getPost();
        
        $this->model->insert($data);
        
        return $this->respondCreated([
            'status' => 201,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
        
        
        
    }
    
    public function update($id = null)
{
    $data = $this->request->getRawInput(); // untuk PUT request
    $this->model->update($id, $data);

    if (!$this->model->errors()) {
        return $this->respond([
            'status' => 201,
            'message' => 'Data berhasil diupdate',
            'data' => $data
        ], 200, 'Data berhasil diupdate');
    }

    return $this->fail('Gagal update data', 500);
}

    
    public function delete($id = null)
    {
        if ($this->model->delete($id)) {
            return $this->respondDeleted([
                'status' => 200,
                'id' => $id,
                'message' => 'Data berhasil dihapus'

            ], 'Data berhasil dihapus');
        }
        return $this->failNotFound('Data tidak ditemukan');
    }
}
