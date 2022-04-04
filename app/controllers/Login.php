<?php

class Login extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Login Aku Sekolah',
        ];

        $this->view('login/header', $data);
        $this->view('login/index');
        // $this->view('templates/footer');
    }
}
