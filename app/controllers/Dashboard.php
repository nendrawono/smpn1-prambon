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

        $check_semmester= $_SESSION["user_login"]['tahun_ajaran']['semester'];

        if((int)$check_semmester % 2){
            $label = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni'];
        }else{
            $label = ['Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        }

        // var_dump($tidak_emosi[0]);
        // die();

        for($i=0; $i < 6 ;$i++){
            if(isset($emosi[$i])){
                if($label[$i] ){
                        array_push($arr_emosi, $emosi[$i]['emosi_siswa'] );
                }
            }else{
                array_push($arr_emosi, 0 );         
            }
        }

        for($i=0;$i<6;$i++){
            if(isset($tidak_emosi[$i])){
                if($label[$i] ){
                    array_push($arr_tidak_emosi, $tidak_emosi[$i]['emosi_siswa'] );
                }
            }else{
                array_push($arr_tidak_emosi, 0 );      
            }
        }

        // var_dump($arr_tidak_emosi);
        // die();

        // foreach($emosi as $item){
        //     array_push($arr_emosi, $item['emosi'] );
        // }

        // foreach($tidak_emosi as $item){
        //     array_push($arr_tidak_emosi, $item['tidak_emosi'] );
        // }
        
        
        $data = [
            'title' => 'Dashboard',
            'title_page' => 'Dashboard',
            'breadcrumb' => 'Dashboard',
            'jadwal_pelajaran' => 'jadwal_pelajaran',
            'pengumuman' => $this->model('PengumumanModel')->getAllPengumuman(),
            'emosi' => json_encode($arr_emosi),
            'tidak_emosi' => json_encode($arr_tidak_emosi),
            'label' => json_encode($label),
            // 'emosi' => json_encode($this->model('EmosiModel')->getDataEmosi($id_siswa, $tahun_ajaran_id)),
            // 'tidak_emosi' => json_encode($this->model('EmosiModel')->getDataTidakEmosi($id_siswa, $tahun_ajaran_id))
        ];

    
        // var_dump($data);
        // var_dump($data['emosi']);
        // // echo $menu_active['parent'];
        // exit;

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('dashboard/index', $data);
        $this->view('templates/footer');
    }
}
