<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class About extends Controller
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
        $isi = ['title' => 'About', 'url'   => site_url('apiperusahaan/1')];
        $data = [
            'title' => 'About',
            'content' => view('page/page_about', $isi),
        ];
        echo view('template/main_template', $data);
    }
}
