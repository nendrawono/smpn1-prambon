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

    
    public function validasiLogin()
    {

        
        $validasi = $this->model('UserModel')->validasiLogin($_POST);

        // var_dump($validasi);
        // die();
        
        if($validasi){
            $status_user = null;

            switch ($validasi['id_role']) {
                case "1":
                    $status_user = "ADMIN";

                    $siswa = $this->model('SiswaModel')->getSiswaByID($validasi['siswa_id']);

                    $user = [
                        'siswa' => $siswa,
                        'kelas_sekarang' => $this->model('KelasModel')->getKelasByID($siswa['kelas_sekarang']),
                        'tahun_ajaran' => $this->model('TahunAjaranModel')->getTahunAjaranActive(),
                        'role' => $status_user,
                    ];

                    $_SESSION["user_login"] = $user;

                    // var_dump($_SESSION["user_login"]);
                    // die();

                    $redirectUrl = BASE_URL."/dashboard";

                    break;
                case "2":
                    $status_user = "GURU";

                    $siswa = $this->model('GuruModel')->getGuruByID($validasi['siswa_id']);

                  

                    $user = [
                        'siswa' => $siswa,
                        'tahun_ajaran' => $this->model('TahunAjaranModel')->getTahunAjaranActive(),
                        'role' => $status_user,
                    ];

                    // var_dump($user);
                    // die();

                    $_SESSION["user_login"] = $user;

                    $redirectUrl = BASE_URL."/dashboardguru";

                    break;
                case "3":
                    $status_user = "ORTU";

                    $siswa = $this->model('SiswaModel')->getSiswaByID($validasi['siswa_id']);

                    $user = [
                        'siswa' => $siswa,
                        'kelas_sekarang' => $this->model('KelasModel')->getKelasByID($siswa['kelas_sekarang']),
                        'tahun_ajaran' => $this->model('TahunAjaranModel')->getTahunAjaranActive(),
                        'role' => $status_user,
                    ];

                            
                    $_SESSION["user_login"] = $user;

                    // var_dump($_SESSION["user_login"]);
                    // die();

                    $redirectUrl = BASE_URL."/dashboard";

                    break;
                default:
            }
           


            var_dump("sukses");
            // header("location: ".BASE_URL."/dashboard", true, 301);
            // header("location: ".BASE_URL, true, 301);



        }else{
            
            var_dump("gagal");
            $_SESSION["user_login"] = null;
            $redirectUrl = BASE_URL;

        }

        // var_dump($redirectUrl);
        // die();

        header("location: ".$redirectUrl, true, 301);

        // var_dump($redirectUrl);
        // die();

    }

    public function logOut()
    {
        session_destroy();
        unset($_SESSION['user_login']);
        header('location:'.BASE_URL, true, 301);
    }
}



