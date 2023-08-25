<?php

namespace App\Controllers;

use App\Models\PaketModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class ApiPaket extends ResourceController
{
    use ResponseTrait;

    public function index()
    {
        $model = new PaketModel();
        $data['tbl_paket'] = $model->orderBy('id', 'DESC')->findAll();
        return $this->respond($data);
    }

    public function create()
    {
        $model = new PaketModel();
        $data = [
            'kategori' => $this->request->getVar('kategori'),
            'nama_paket' => $this->request->getVar('nama_paket'),
        ];
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Paket added.'
            ]
        ];
        return $this->respondCreated($response);
    }

    public function show($id = null)
    {
        $model = new PaketModel();
        $data = $model->where('id', $id)->first();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Data not found.');
        }
    }

    public function update($id = null)
    {
        $model = new PaketModel();


        $user = $model->find($id);

        if ($user) {

            $data = [
                'kategori' => $this->request->getVar('kategori'),
                'nama_paket' => $this->request->getVar('nama_paket'),
            ];

            $model->update($id, $data);

            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Paket updated.'
                ]
            ];
            return $this->respond($response);
        } else {
            return $this->failNotFound('Data not found.');
        }
    }

    public function delete($id = null)
    {
        $model = new PaketModel();
        $paket = $model->find($id);

        if ($paket) {
            $model->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Paket deleted.'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Data not found.');
        }
    }
}
