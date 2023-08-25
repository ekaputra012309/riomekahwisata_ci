<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsersModel;

class AuthController extends Controller
{
    protected $userModel;
    private $session;

    public function __construct()
    {
        $this->userModel = new UsersModel();
        helper(['form', 'url', 'session']);
        $this->session = session();
    }

    public function index()
    {
        $data = [
            'title' => 'Login',
            'url'   => site_url('apiperusahaan/1'),
        ];

        echo view('page/page_login', $data);
    }

    public function login()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $this->userModel->where('email', $email)->first();
        if ($data) {
            $pass = $data['pass'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'user_id'       => $data['id'],
                    'user_name'     => $data['username'],
                    'full_name'     => $data['fullname'],
                    'user_email'    => $data['email'],
                    'user_photo'    => $data['photo'],
                    'logged_in'     => TRUE
                ];
                $this->session->set($ses_data);
                return redirect()->route('dashboard');
            } else {
                session()->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/');
            }
        } else {
            session()->setFlashdata('msg', 'Email not Found');
            return redirect()->to('/');
        }
    }

    public function logout()
    {
        $session = session();
		$session->destroy();
        return redirect()->to('/');
    }
}
