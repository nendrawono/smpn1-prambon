<?php

class Dashboard extends Controller
{
    public function index()
    {
        $id_siswa = $_SESSION["user_login"]['siswa']['nis'];
        $tahun_ajaran_id = $_SESSION["user_login"]['tahun_ajaran']['id'];

        $emosi = $this->model('EmosiModel')->getDataEmosi($id_siswa, $tahun_ajaran_id);
        $arr_emosi = array();
        $tidak_emosi =  $this->model('EmosiModel')->getDataTidakEmosi($id_siswa, $tahun_ajaran_id);
        $arr_tidak_emosi = array();

        // var_dump($emosi);
        // die();

        foreach($emosi as $item){
            array_push($arr_emosi, $item['emosi'] );
        }

        foreach($tidak_emosi as $item){
            array_push($arr_tidak_emosi, $item['tidak_emosi'] );
        }
        
        $data = [
            'title' => 'Dashboard',
            'title_page' => 'Dashboard',
            'breadcrumb' => 'Dashboard',
            'jadwal_pelajaran' => 'jadwal_pelajaran',
            'pengumuman' => $this->model('PengumumanModel')->getAllPengumuman(),
            'emosi' => json_encode($arr_emosi),
            'tidak_emosi' => json_encode($arr_tidak_emosi)
            // 'emosi' => json_encode($this->model('EmosiModel')->getDataEmosi($id_siswa, $tahun_ajaran_id)),
            // 'tidak_emosi' => json_encode($this->model('EmosiModel')->getDataTidakEmosi($id_siswa, $tahun_ajaran_id))
        ];

    
        // var_dump($data['emosi']);
        // // echo $menu_active['parent'];
        // exit;

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('dashboard/index', $data);
        $this->view('templates/footer');
    }
}
