<?php

class Dashboard extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'title_page' => 'Dashboard',
            'breadcrumb' => 'Dashboard',
        ];

    
        // var_dump($menu_active);
        // echo $menu_active['parent'];
        // exit;

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('dashboard/index', $data);
        $this->view('templates/footer');
    }
}
