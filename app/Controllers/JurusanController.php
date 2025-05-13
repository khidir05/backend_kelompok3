<?php

namespace App\Controllers;
use App\Models\JurusanModel;

class JurusanController extends BaseController
{
    protected $jurusanModel;

    public function __construct()
    {
        $this->jurusanModel = new JurusanModel();
    }

    public function index()
    {
        $data['jurusan'] = $this->jurusanModel->findAll();
        return view('jurusan/index', $data);
    }

    public function create()
    {
        return view('jurusan/create');
    }

    public function store()
    {
        $this->jurusanModel->save($this->request->getPost());
        return redirect()->to('/jurusan')->with('message', 'Jurusan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data['jurusan'] = $this->jurusanModel->find($id);
        return view('jurusan/edit', $data);
    }

    public function update($id)
    {
        $this->jurusanModel->update($id, $this->request->getPost());
        return redirect()->to('/jurusan')->with('message', 'Jurusan berhasil diperbarui');
    }

    public function delete($id)
    {
        $this->jurusanModel->delete($id);
        return redirect()->to('/jurusan')->with('message', 'Jurusan berhasil dihapus');
    }
}
