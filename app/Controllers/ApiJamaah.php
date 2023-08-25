<?php

namespace App\Controllers;

use App\Models\JamaahModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class ApiJamaah extends ResourceController
{
    use ResponseTrait;
    // all jamaah
    public function index()
    {
        $model = new JamaahModel();
        $data['tbl_jamaah'] = $model->orderBy('id', 'DESC')->findAll();
        return $this->respond($data);
    }
    // create
    public function create()
    {
        $model = new JamaahModel();
        $data = [
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'nomor_ktp' => $this->request->getVar('nomor_ktp'),
            'tempat' => $this->request->getVar('tempat'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'umur' => $this->request->getVar('umur'),
            'kewarganegaraan' => $this->request->getVar('kewarganegaraan'),
            'alamat' => $this->request->getVar('alamat'),
            'provinsi' => $this->request->getVar('provinsi'),
            'kota' => $this->request->getVar('kota'),
            'kecamatan' => $this->request->getVar('kecamatan'),
            'desa' => $this->request->getVar('desa'),
            'kode_pos' => $this->request->getVar('kode_pos'),
            'handphone' => $this->request->getVar('handphone'),
            'email' => $this->request->getVar('email'),
            'pendidikan' => $this->request->getVar('pendidikan'),
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'no_passport' => $this->request->getVar('no_passport'),
            'tgl_dikeluarkan' => $this->request->getVar('tgl_dikeluarkan'),
            'tempat_dikeluarkan' => $this->request->getVar('tempat_dikeluarkan'),
            'masa_berlaku' => $this->request->getVar('masa_berlaku'),
            'nama_marham' => $this->request->getVar('nama_marham'),
            'hub_marham' => $this->request->getVar('hub_marham'),
            'status' => $this->request->getVar('status'),
            'gol_darah' => $this->request->getVar('gol_darah'),
            'baju' => $this->request->getVar('baju')
        ];
        $image = $this->request->getFile('photo');
        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/uploads', $newName);
            $data['photo'] = $newName;
        }
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Jamaah added.'
            ]
        ];
        return $this->respondCreated($response);
    }
    // single perusahaan
    public function show($id = null)
    {
        $model = new JamaahModel();
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
        $model = new JamaahModel();

        // Fetch the existing jamaah data
        $jamaah = $model->find($id);

        if ($jamaah) {
            // Get the updated data from the request
            $data = [
                'nama_lengkap' => $this->request->getVar('nama_lengkap'),
                'nomor_ktp' => $this->request->getVar('nomor_ktp'),
                'tempat' => $this->request->getVar('tempat'),
                'tgl_lahir' => $this->request->getVar('tgl_lahir'),
                'umur' => $this->request->getVar('umur'),
                'kewarganegaraan' => $this->request->getVar('kewarganegaraan'),
                'alamat' => $this->request->getVar('alamat'),
                'provinsi' => $this->request->getVar('provinsi'),
                'kota' => $this->request->getVar('kota'),
                'kecamatan' => $this->request->getVar('kecamatan'),
                'desa' => $this->request->getVar('desa'),
                'kode_pos' => $this->request->getVar('kode_pos'),
                'handphone' => $this->request->getVar('handphone'),
                'email' => $this->request->getVar('email'),
                'pendidikan' => $this->request->getVar('pendidikan'),
                'pekerjaan' => $this->request->getVar('pekerjaan'),
                'no_passport' => $this->request->getVar('no_passport'),
                'tgl_dikeluarkan' => $this->request->getVar('tgl_dikeluarkan'),
                'tempat_dikeluarkan' => $this->request->getVar('tempat_dikeluarkan'),
                'masa_berlaku' => $this->request->getVar('masa_berlaku'),
                'nama_marham' => $this->request->getVar('nama_marham'),
                'hub_marham' => $this->request->getVar('hub_marham'),
                'status' => $this->request->getVar('status'),
                'gol_darah' => $this->request->getVar('gol_darah'),
                'baju' => $this->request->getVar('baju')
            ];
            // Handle image upload if a new image is provided
            $newImage = $this->request->getFile('photo');
            if ($newImage->isValid() && !$newImage->hasMoved()) {
                // Delete the old photo if it exists
                $oldPhotoFileName = $jamaah['photo'];
                if ($oldPhotoFileName && file_exists(ROOTPATH . 'public/uploads/' . $oldPhotoFileName)) {
                    unlink(ROOTPATH . 'public/uploads/' . $oldPhotoFileName);
                }

                // Upload the new photo
                $newName = $newImage->getRandomName();
                $newImage->move(ROOTPATH . 'public/uploads', $newName);
                $data['photo'] = $newName;
            }

            // Update the perusahaan record in the database
            $model->update($id, $data);

            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Jamaah updated.'
                ]
            ];
            return $this->respond($response);
        } else {
            return $this->failNotFound('Data not found.');
        }
    }

    // delete
    public function delete($id = null)
    {
        $model = new JamaahModel();
        $jamaah = $model->find($id); // Fetch the jamaah data to get the photo filename

        if ($jamaah) {
            // Delete the photo file from the directory
            $photoFileName = $jamaah['photo'];
            if ($photoFileName && file_exists(ROOTPATH . 'public/uploads/' . $photoFileName)) {
                unlink(ROOTPATH . 'public/uploads/' . $photoFileName);
            }

            // Delete the jamaah record from the database
            $model->delete($id);

            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'jamaah deleted.'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Data not found.');
        }
    }
}
