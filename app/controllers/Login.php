<?php

class Login extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Login SIABK',
        ];

        $this->view('login/header', $data);
        $this->view('login/index');
        // $this->view('templates/footer');
    }
}
