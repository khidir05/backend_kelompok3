<?php // app/Controllers/Api/DataController.php
namespace App\Controllers\Api;
use App\Controllers\BaseController;
use App\Models\MahasiswaModel;
use App\Models\StaffModel;
use App\Models\JurusanModel;
use App\Models\ProdiModel;

class DataController extends BaseController
{
    // ======================= Mahasiswa =======================
    public function mahasiswa()
    {
        $model = new MahasiswaModel();
        return $this->response->setJSON($model->findAll());
    }

    public function mahasiswaShow($id)
    {
        $model = new MahasiswaModel();
        $data = $model->find($id);
        return $data ? $this->response->setJSON($data) : $this->response->setStatusCode(404)->setJSON(['message' => 'Not found']);
    }

    public function mahasiswaCreate()
    {
        $model = new MahasiswaModel();
        $data = $this->request->getJSON(true);
        $model->insert($data);
        return $this->response->setJSON(['message' => 'Created']);
    }

    public function mahasiswaUpdate($id)
    {
        $model = new MahasiswaModel();
        $data = $this->request->getJSON(true);
        $model->update($id, $data);
        return $this->response->setJSON(['message' => 'Updated']);
    }

    public function mahasiswaDelete($id)
    {
        $model = new MahasiswaModel();
        $model->delete($id);
        return $this->response->setJSON(['message' => 'Deleted']);
    }

    // ======================= Staff =======================
    public function staff()
    {
        $model = new StaffModel();
        return $this->response->setJSON($model->findAll());
    }

    public function staffShow($id)
    {
        $model = new StaffModel();
        $data = $model->find($id);
        return $data ? $this->response->setJSON($data) : $this->response->setStatusCode(404)->setJSON(['message' => 'Not found']);
    }

    public function staffCreate()
    {
        $model = new StaffModel();
        $data = $this->request->getJSON(true);
        $model->insert($data);
        return $this->response->setJSON(['message' => 'Created']);
    }

    public function staffUpdate($id)
    {
        $model = new StaffModel();
        $data = $this->request->getJSON(true);
        $model->update($id, $data);
        return $this->response->setJSON(['message' => 'Updated']);
    }

    public function staffDelete($id)
    {
        $model = new StaffModel();
        $model->delete($id);
        return $this->response->setJSON(['message' => 'Deleted']);
    }

    // ======================= Jurusan =======================
    public function jurusan()
    {
        $model = new JurusanModel();
        return $this->response->setJSON($model->findAll());
    }

    public function jurusanShow($id)
    {
        $model = new JurusanModel();
        $data = $model->find($id);
        return $data ? $this->response->setJSON($data) : $this->response->setStatusCode(404)->setJSON(['message' => 'Not found']);
    }

    public function jurusanCreate()
    {
        $model = new JurusanModel();
        $data = $this->request->getJSON(true);
        $model->insert($data);
        return $this->response->setJSON(['message' => 'Created']);
    }

    public function jurusanUpdate($id)
    {
        $model = new JurusanModel();
        $data = $this->request->getJSON(true);
        $model->update($id, $data);
        return $this->response->setJSON(['message' => 'Updated']);
    }

    public function jurusanDelete($id)
    {
        $model = new JurusanModel();
        $model->delete($id);
        return $this->response->setJSON(['message' => 'Deleted']);
    }

    // ======================= Prodi =======================
    public function prodi()
    {
        $model = new ProdiModel();
        return $this->response->setJSON($model->findAll());
    }

    public function prodiShow($id)
    {
        $model = new ProdiModel();
        $data = $model->find($id);
        return $data ? $this->response->setJSON($data) : $this->response->setStatusCode(404)->setJSON(['message' => 'Not found']);
    }

    public function prodiCreate()
    {
        $model = new ProdiModel();
        $data = $this->request->getJSON(true);
        $model->insert($data);
        return $this->response->setJSON(['message' => 'Created']);
    }

    public function prodiUpdate($id)
    {
        $model = new ProdiModel();
        $data = $this->request->getJSON(true);
        $model->update($id, $data);
        return $this->response->setJSON(['message' => 'Updated']);
    }

    public function prodiDelete($id)
    {
        $model = new ProdiModel();
        $model->delete($id);
        return $this->response->setJSON(['message' => 'Deleted']);
    }
}
