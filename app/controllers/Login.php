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

        // var_dump($_POST);
        // die();
        $validasi = $this->model('UserModel')->validasiLogin($_POST);
        
        if($validasi){
            $status_user = null;

            switch ($validasi['id_role']) {
                case 1:
                    $status_user = "ADMIN";
                    break;
                case 2:
                    $status_user = "GURU";
                    break;
                case 3:
                    $status_user = "ORTU";
                    break;
                default:
            }

            $user = [
                'siswa' => $this->model('SiswaModel')->getSiswaByID($validasi['siswa_id']),
                'tahun_ajaran' => $this->model('TahunAjaranModel')->getTahunAjaranActive(),
                'role' => $status_user,
            ];

           

            $_SESSION["user_login"] = $user;

            // var_dump($_SESSION["user_login"]);
            // die();

            $redirectUrl = BASE_URL."/dashboard";

            var_dump("sukses");
            // header("location: ".BASE_URL."/dashboard", true, 301);
            // header("location: ".BASE_URL, true, 301);



        }else{
            
            var_dump("gagal");
            $_SESSION["user_login"] = null;
            $redirectUrl = BASE_URL;

        }

        header("location: ".$redirectUrl, true, 301);

        // var_dump($redirectUrl);
        // die();

    }
}



