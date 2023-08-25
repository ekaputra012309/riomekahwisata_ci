<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class User extends Controller
{

    public function ceklog()
    {
        if (!session('logged_in')) {
            return redirect()->to('/');
        }
    }

    public function index()
    {
        $this->ceklog();
        $isi = ['title' => 'Users', 'url'   => site_url('apiusers')];
        $data = [
            'title' => 'Users',
            'content' => view('page/users/page_users', $isi),
        ];
        echo view('template/main_template', $data);
    }

    public function tambah()
    {
        $isi = ['title' => 'Users', 'url'   => site_url('apiusers')];
        $data = [
            'title' => 'Users Add',
            'content' => view('page/users/page_users_add', $isi),
        ];
        echo view('template/main_template', $data);
    }

    public function edit($id)
    {
        $isi = ['title' => 'Users', 'url'   => site_url('apiusers/').base64_decode($id)];
        $data = [
            'title' => 'Users Edit',
            'content' => view('page/users/page_users_edit', $isi),
        ];
        echo view('template/main_template', $data);
    }
}
