<?php

namespace App\Controllers;
use App\Models\ProdiModel;
use App\Models\JurusanModel;

class ProdiController extends BaseController
{
    protected $prodiModel;
    protected $jurusanModel;

    public function __construct()
    {
        $this->prodiModel = new ProdiModel();
        $this->jurusanModel = new JurusanModel();
    }

    public function index()
    {
        $data['prodi'] = $this->prodiModel->select('prodi.*, jurusan.nama as jurusan')
                            ->join('jurusan', 'jurusan.id_jurusan = prodi.id_jurusan')
                            ->findAll();
        return view('prodi/index', $data);
    }

    public function create()
    {
        $data['jurusan'] = $this->jurusanModel->findAll();
        return view('prodi/create', $data);
    }

    public function store()
    {
        $this->prodiModel->save($this->request->getPost());
        return redirect()->to('/prodi')->with('message', 'Prodi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data['prodi'] = $this->prodiModel->find($id);
        $data['jurusan'] = $this->jurusanModel->findAll();
        return view('prodi/edit', $data);
    }

    public function update($id)
    {
        $this->prodiModel->update($id, $this->request->getPost());
        return redirect()->to('/prodi')->with('message', 'Prodi berhasil diperbarui');
    }

    public function delete($id)
    {
        $this->prodiModel->delete($id);
        return redirect()->to('/prodi')->with('message', 'Prodi berhasil dihapus');
    }
}
