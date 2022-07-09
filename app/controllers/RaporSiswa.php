<?php

class RaporSiswa extends Controller
{
    public function index($nis, $tahun_ajaran)
    {

        // var_dump($nis);
        
        // $data = [
        //     'title' => 'Rapor Siswa Tahun',
        //     'title_page' => 'Rapor Tahun Ajaran '.$_SESSION["user_login"]['tahun_ajaran']['tahun_ajaran']."| Semester  ".$_SESSION["user_login"]['tahun_ajaran']['semester'] ,
        //     // 'user' => $this->model('UserModel')->getAllUser()
        // ];

        $check_raport_exist  = $this->model('SiswaModel')->checkRaportSiswa($nis, $tahun_ajaran);
        $siswa = $this->model('SiswaModel')->getRaportSiswaByID($nis);


        // var_dump($check_raport_exist['id']);
        // die();

        if($check_raport_exist){
            // echo "true";
            $data = [
                'title' => 'Rapor Siswa Tahun',
                'title_page' => 'Rapor Tahun Ajaran '.$_SESSION["user_login"]['tahun_ajaran']['tahun_ajaran']."| Semester  ".$_SESSION["user_login"]['tahun_ajaran']['semester'] ,
                'id_raport' => $check_raport_exist['id'],
                'siswa' => $siswa,
                'tahun_ajaran' => $this->model('SiswaModel')->getTahunAjaranByID($tahun_ajaran),
                'raport' => $this->model('SiswaModel')->getRaportData($nis, $tahun_ajaran),
                'matpel_siswa' => $this->model('SiswaModel')->getMatpelData($check_raport_exist['id']),
                'bakatminat_siswa' => $this->model('SiswaModel')->getEkstraData($check_raport_exist['id']),
                'publish' => 1
            ];
        }else{
            $raport = $this->model('SiswaModel')->insertRaportSiswa($nis, $siswa['kelas_sekarang'], $tahun_ajaran);

            // $this->model('SiswaModel')->getMatpelData($raport);
            // $this->model('SiswaModel')->getEkstraData($raport);
            

            $data = [
                'title' => 'Rapor Siswa Tahun',
                'title_page' => 'Rapor Tahun Ajaran '.$_SESSION["user_login"]['tahun_ajaran']['tahun_ajaran']."| Semester  ".$_SESSION["user_login"]['tahun_ajaran']['semester'] ,
                'id_raport' => $raport,
                'siswa' => $siswa,
                'tahun_ajaran' => $this->model('SiswaModel')->getTahunAjaranByID($tahun_ajaran),
                'raport' => $this->model('SiswaModel')->getRaportData($nis, $tahun_ajaran),
                'matpel_siswa' => $this->model('SiswaModel')->getMatpelData($raport),
                'bakatminat_siswa' => $this->model('SiswaModel')->getEkstraData($raport),
                'publish' => 0
                // 'select2_kelas' => $this->model('SiswaModel')->getAllKelas(),
                // 'select2_guru' => $this->model('SiswaModel')->getAllGuru()
            ];
        }

        //isi qrcode jika di scan
        $codeContents = 'VERIVED'; 
        

        $logopath = 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/ba/City_of_Surabaya_Logo.svg/1200px-City_of_Surabaya_Logo.svg.png';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('rapor-siswa/index', $data);
        // $this->view('templates/footer');
    }

    // public function raport($nis, $tahun_ajaran)
    // {
    //     $check_raport_exist  = $this->model('SiswaModel')->checkRaportSiswa($nis, $tahun_ajaran);
    //     $siswa = $this->model('SiswaModel')->getRaportSiswaByID($nis);


    //     // var_dump($check_raport_exist['id']);
    //     // die();

    //     if($check_raport_exist){
    //         // echo "true";
    //         $data = [
    //             'title' => 'Master',
    //             'title_page' => 'Isi Raport',
    //             'id_raport' => $check_raport_exist['id'],
    //             'siswa' => $siswa,
    //             'tahun_ajaran' => $this->model('SiswaModel')->getTahunAjaranByID($tahun_ajaran),
    //             'raport' => $this->model('SiswaModel')->getRaportData($nis, $tahun_ajaran),
    //             'matpel_siswa' => $this->model('SiswaModel')->getMatpelData($check_raport_exist['id']),
    //             'bakatminat_siswa' => $this->model('SiswaModel')->getEkstraData($check_raport_exist['id'])
    //         ];
    //     }else{
    //         $raport = $this->model('SiswaModel')->insertRaportSiswa($nis, $siswa['kelas_sekarang'], $tahun_ajaran);

    //         // $this->model('SiswaModel')->getMatpelData($raport);
    //         // $this->model('SiswaModel')->getEkstraData($raport);
            

    //         $data = [
    //             'title' => 'Master',
    //             'title_page' => 'Isi Raport',
    //             'id_raport' => $raport,
    //             'siswa' => $siswa,
    //             'tahun_ajaran' => $this->model('SiswaModel')->getTahunAjaranByID($tahun_ajaran),
    //             'raport' => $this->model('SiswaModel')->getRaportData($nis, $tahun_ajaran),
    //             'matpel_siswa' => $this->model('SiswaModel')->getMatpelData($raport),
    //             'bakatminat_siswa' => $this->model('SiswaModel')->getEkstraData($raport)
    //             // 'select2_kelas' => $this->model('SiswaModel')->getAllKelas(),
    //             // 'select2_guru' => $this->model('SiswaModel')->getAllGuru()
    //         ];

    //         // getMatpelData
    //         // echo "false";
    //     }
    //     // var_dump($data['bakatminat_siswa']);
    //     // die();

    //     //isi qrcode jika di scan
    //     $codeContents = 'VERIVED'; 
        

    //     $logopath = 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/ba/City_of_Surabaya_Logo.svg/1200px-City_of_Surabaya_Logo.svg.png';
        
    //     //output gambar langsung ke browser, sebagai PNG
    //     // echo QRcode::png($codeContents); 
        


    //     // var_dump($siswa['kelas_sekarang']);
    //     // die();
    //     // $data = [
    //     //     'title' => 'Master',
    //     //     'title_page' => 'Isi Raport',
    //     //     'siswa' => $siswa,
    //     //     'tahun_ajaran' => $this->model('SiswaModel')->getTahunAjaranByID($tahun_ajaran),
    //     //     'matpel_siswa' => $this->model('SiswaModel')->getMatpelSiswaByID($siswa['kelas_sekarang']),
    //     //     'bakatminat_siswa' => $this->model('SiswaModel')->getBakatMinatSiswaByID($siswa['nis'])
    //     //     // 'select2_kelas' => $this->model('SiswaModel')->getAllKelas(),
    //     //     // 'select2_guru' => $this->model('SiswaModel')->getAllGuru()
    //     // ];

    //     // // print_r($data);
    //     // print("<pre>".print_r($data,true)."</pre>");
    //     // die();

    //     $this->view('templates/header', $data);
    //     $this->view('templates/sidebar', $data);
    //     $this->view('master-siswa/isi-raport', $data);
    //     // $this->view('master-siswa/isi-raport-khusus', $data);
    //     $this->view('templates/footer');
    // }

}
