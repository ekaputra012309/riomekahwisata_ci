<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsersModel;
use App\Models\JamaahModel;

class Dashboard extends Controller
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
        $userModel = new UsersModel();
        $userCount = $userModel->countAll();
        $jamaahModel = new JamaahModel();
        $jamaahCount = $jamaahModel->countAll();

        $isi = [
            'userCount' => $userCount,
            'jamaahCount' => $jamaahCount,
        ];
        $data = [
            'title' => 'Dashboard',
            'content' => view('page/page_dashboard', $isi),
        ];
        echo view('template/main_template', $data);
    }
}
