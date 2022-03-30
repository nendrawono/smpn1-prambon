<?php

class About extends Controller
{
    public function index($nama = 'Rayhan', $pekerjaan = 'Mahasiswa')
    {
        $data = [
            'title' => 'About Me',
            'nama' => $nama,
            'pekerjaan' => $pekerjaan
        ];

        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }
}
