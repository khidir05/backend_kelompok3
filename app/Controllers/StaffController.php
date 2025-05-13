<?php

namespace App\Controllers;
use App\Models\StaffModel;

class StaffController extends BaseController
{
    protected $staffModel;

    public function __construct()
    {
        $this->staffModel = new StaffModel();
    }

    public function index()
    {
        $data['staff'] = $this->staffModel->findAll();
        return view('staff/index', $data);
    }

    public function create()
    {
        return view('staff/create');
    }

    public function store()
    {
        $this->staffModel->save($this->request->getPost());
        return redirect()->to('/staff')->with('message', 'Staff berhasil ditambahkan');
    }

    public function edit($nip)
    {
        $data['staff'] = $this->staffModel->find($nip);
        return view('staff/edit', $data);
    }

    public function update($nip)
    {
        $this->staffModel->update($nip, $this->request->getPost());
        return redirect()->to('/staff')->with('message', 'Staff berhasil diperbarui');
    }

    public function delete($nip)
    {
        $this->staffModel->delete($nip);
        return redirect()->to('/staff')->with('message', 'Staff berhasil dihapus');
    }
}

