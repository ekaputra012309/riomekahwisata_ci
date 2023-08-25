<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Paket extends Controller{

    public function ceklog()
    {
        if (!session('logged_in')) {
            return redirect()->to('/');
        }
    }

    public function index()
    {
        $this->ceklog();
        $isi = ['title' => 'Paket', 'url'   => site_url('apipaket')];
        $data = [
            'title' => 'Paket',
            'content' => view('page/paket/page_paket', $isi),
        ];
        echo view('template/main_template', $data);
    }

    public function tambah()
    {
        $isi = ['title' => 'Paket', 'url'   => site_url('apipaket')];
        $data = [
            'title' => 'Paket Add',
            'content' => view('page/paket/page_paket_add', $isi),
        ];
        echo view('template/main_template', $data);
    }

    public function edit($id)
    {
        $isi = ['title' => 'Paket', 'url'   => site_url('apipaket/').base64_decode($id)];
        $data = [
            'title' => 'Paket Edit',
            'content' => view('page/paket/page_paket_edit', $isi),
        ];
        echo view('template/main_template', $data);
    }
}