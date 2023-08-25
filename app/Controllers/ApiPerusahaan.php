<?php

namespace App\Controllers;

use App\Models\PerusahaanModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class ApiPerusahaan extends ResourceController
{
    use ResponseTrait;
    // all perusahaan
    public function index()
    {
        $model = new PerusahaanModel();
        $data['tbl_perusahaan'] = $model->orderBy('id', 'DESC')->findAll();
        return $this->respond($data);
    }
    // create
    public function create()
    {
        $model = new PerusahaanModel();
        $data = [
            'nama' => $this->request->getVar('nama'),
            'alias' => $this->request->getVar('alias'),
            'alamat'  => $this->request->getVar('alamat'),
            'deskripsi'  => $this->request->getVar('deskripsi'),
        ];
        $image = $this->request->getFile('logo');
        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/img', $newName);
            $data['logo'] = $newName;
        }
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Company added.'
            ]
        ];
        return $this->respondCreated($response);
    }
    // single perusahaan
    public function show($id = null)
    {
        $model = new PerusahaanModel();
        $data = $model->where('id', $id)->first();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Data not found.');
        }
    }
    // update
    public function update($id = null)
    {
        $model = new PerusahaanModel();

        // Fetch the existing user data
        $user = $model->find($id);

        if ($user) {
            // Get the updated data from the request
            $data = [
                'nama' => $this->request->getVar('nama'),
                'alias' => $this->request->getVar('alias'),
                'alamat'  => $this->request->getVar('alamat'),
                'deskripsi'  => $this->request->getVar('deskripsi'),
            ];

            // Handle image upload if a new image is provided
            $newImage = $this->request->getFile('logo');
            if ($newImage->isValid() && !$newImage->hasMoved()) {
                // Delete the old logo if it exists
                $oldLogoFileName = $user['logo'];
                if ($oldLogoFileName && file_exists(ROOTPATH . 'public/img/' . $oldLogoFileName)) {
                    unlink(ROOTPATH . 'public/img/' . $oldLogoFileName);
                }

                // Upload the new logo
                $newName = $newImage->getRandomName();
                $newImage->move(ROOTPATH . 'public/img', $newName);
                $data['logo'] = $newName;
            }

            // Update the perusahaan record in the database
            $model->update($id, $data);

            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Company updated.'
                ]
            ];
            return $this->respond($response);
        } else {
            return $this->failNotFound('Data not found.');
        }
    }
}
