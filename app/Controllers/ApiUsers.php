<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UsersModel;

class ApiUsers extends ResourceController
{
    use ResponseTrait;
    // all users
    public function index()
    {
        $model = new UsersModel();
        $data['tbl_users'] = $model->orderBy('id', 'DESC')->findAll();
        return $this->respond($data);
    }
    // create
    public function create()
    {
        $model = new UsersModel();
        // Get the provided username
        $username = $this->request->getVar('username');

        // Check if the username already exists
        if ($model->where('username', $username)->first()) {
            $response = [
                'status'   => 400,
                'error'    => 'Username already exists.',
                'messages' => [
                    'error' => 'Username already exists.'
                ]
            ];
            return $this->respond($response);
        } else {
            $data = [
                'username' => $this->request->getVar('username'),
                'fullname'  => $this->request->getVar('fullname'),
                'email'  => $this->request->getVar('email'),
                'phone'  => $this->request->getVar('phone'),
                'pass'  => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
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
                    'success' => 'User added.'
                ]
            ];
            return $this->respondCreated($response);
        }
    }
    // single user
    public function show($id = null)
    {
        $model = new UsersModel();
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
        $model = new UsersModel();

        // Fetch the existing user data
        $user = $model->find($id);

        if ($user) {
            // Get the updated data from the request
            if ($this->request->getVar('pass') !== '') {
                $data = [
                    'username' => $this->request->getVar('username'),
                    'fullname'    => $this->request->getVar('fullname'),
                    'email'    => $this->request->getVar('email'),
                    'phone'    => $this->request->getVar('phone'),
                    'pass'     => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
                ];
            } else {
                $data = [
                    'username' => $this->request->getVar('username'),
                    'fullname'    => $this->request->getVar('fullname'),
                    'email'    => $this->request->getVar('email'),
                    'phone'    => $this->request->getVar('phone'),
                ];
            }
            // Handle image upload if a new image is provided
            $newImage = $this->request->getFile('photo');
            if ($newImage->isValid() && !$newImage->hasMoved()) {
                // Delete the old photo if it exists
                $oldPhotoFileName = $user['photo'];
                if ($oldPhotoFileName && file_exists(ROOTPATH . 'public/uploads/' . $oldPhotoFileName)) {
                    unlink(ROOTPATH . 'public/uploads/' . $oldPhotoFileName);
                }

                // Upload the new photo
                $newName = $newImage->getRandomName();
                $newImage->move(ROOTPATH . 'public/uploads', $newName);
                $data['photo'] = $newName;
            }

            // Update the user record in the database
            $model->update($id, $data);

            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'User updated.'
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
        $model = new UsersModel();
        $user = $model->find($id); // Fetch the user data to get the photo filename

        if ($user) {
            // Delete the photo file from the directory
            $photoFileName = $user['photo'];
            if ($photoFileName && file_exists(ROOTPATH . 'public/uploads/' . $photoFileName)) {
                unlink(ROOTPATH . 'public/uploads/' . $photoFileName);
            }

            // Delete the user record from the database
            $model->delete($id);

            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'User deleted.'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Data not found.');
        }
    }

    public function uppass($id = null)
    {
        $model = new UsersModel();

        // Fetch the existing user data
        $user = $model->find($id);

        if ($user) {
            // Get the updated data from the request

            $data = [
                'pass'     => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
            ];

            // Update the user record in the database
            $model->update($id, $data);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Password updated.'
                ]
            ];
            return $this->respond($response);
        } else {
            return $this->failNotFound('Data not found.');
        }
    }
}
