<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Jamaah extends Controller
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
        $isi = ['title' => 'Jamaah', 'url'   => site_url('apijamaah')];
        $data = [
            'title' => 'Jamaah',
            'content' => view('page/jamaah/page_jamaah', $isi),
        ];
        echo view('template/main_template', $data);
    }

    public function tambah()
    {
        $isi = ['title' => 'Jamaah', 'url'   => site_url('apijamaah')];
        $data = [
            'title' => 'Jamaah Add',
            'content' => view('page/jamaah/page_jamaah_add', $isi),
        ];
        echo view('template/main_template', $data);
    }

    public function edit($id)
    {
        $isi = ['title' => 'Jamaah', 'url'   => site_url('apijamaah/').base64_decode($id)];
        $data = [
            'title' => 'Jamaah Edit',
            'content' => view('page/jamaah/page_jamaah_edit', $isi),
        ];
        echo view('template/main_template', $data);
    }
}
