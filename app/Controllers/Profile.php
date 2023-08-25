<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Profile extends Controller
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
        $isi = ['title' => 'Profile', 'url'   => site_url('apiusers/') . $_SESSION['user_id']];
        $data = [
            'title' => 'Profile',
            'content' => view('page/page_profile', $isi),
        ];
        echo view('template/main_template', $data);
    }
}
