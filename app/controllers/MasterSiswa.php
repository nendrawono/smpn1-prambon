<?php

class MasterSiswa extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Master',
            'title_page' => 'Data Master Siswa',
            'siswa' => $this->model('SiswaModel')->getAllSiswa(),
            'select2_kelas' => $this->model('SiswaModel')->getAllKelas(),
            'select2_guru' => $this->model('SiswaModel')->getAllGuru()
        ];

        // print_r($data);
        // print("<pre>".print_r($data,true)."</pre>");
        // die();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('master-siswa/index', $data);
        $this->view('templates/footer');
    }

    public function raport($nis, $tahun_ajaran)
    {


        $check_raport_exist  = $this->model('SiswaModel')->checkRaportSiswa($nis, $tahun_ajaran);
        $siswa = $this->model('SiswaModel')->getRaportSiswaByID($nis);


        

        if($check_raport_exist){
            // var_dump($check_raport_exist['id']);
            // die();
            // echo "true";
            $data = [
                'title' => 'Master',
                'title_page' => 'Isi Raport',
                'id_raport' => $check_raport_exist['id'],
                'siswa' => $siswa,
                'tahun_ajaran' => $this->model('SiswaModel')->getTahunAjaranByID($tahun_ajaran),
                'raport' => $this->model('SiswaModel')->getRaportData($nis, $tahun_ajaran),
                'matpel_siswa' => $this->model('SiswaModel')->getMatpelData($check_raport_exist['id']),
                'bakatminat_siswa' => $this->model('SiswaModel')->getEkstraData($check_raport_exist['id'])
            ];
        }else{
            
            $raport = $this->model('SiswaModel')->insertRaportSiswa($nis, $siswa['kelas_sekarang'], $tahun_ajaran);

            // $this->model('SiswaModel')->getMatpelData($raport);
            // $this->model('SiswaModel')->getEkstraData($raport);
            

            $data = [
                'title' => 'Master',
                'title_page' => 'Isi Raport',
                'id_raport' => $raport,
                'siswa' => $siswa,
                'tahun_ajaran' => $this->model('SiswaModel')->getTahunAjaranByID($tahun_ajaran),
                'raport' => $this->model('SiswaModel')->getRaportData($nis, $tahun_ajaran),
                'matpel_siswa' => $this->model('SiswaModel')->getMatpelData($raport),
                'bakatminat_siswa' => $this->model('SiswaModel')->getEkstraData($raport)
                // 'select2_kelas' => $this->model('SiswaModel')->getAllKelas(),
                // 'select2_guru' => $this->model('SiswaModel')->getAllGuru()
            ];

            // getMatpelData
            // echo "false";
        }
        // var_dump($data['bakatminat_siswa']);
        // die();

        // echo '<pre>' . print_r($data, true) . '</pre>';
        // die();

        //isi qrcode jika di scan
        $codeContents = 'VERIVED'; 
        

        $logopath = 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/ba/City_of_Surabaya_Logo.svg/1200px-City_of_Surabaya_Logo.svg.png';
        
        //output gambar langsung ke browser, sebagai PNG
        // echo QRcode::png($codeContents); 
        


        // var_dump($siswa['kelas_sekarang']);
        // die();
        // $data = [
        //     'title' => 'Master',
        //     'title_page' => 'Isi Raport',
        //     'siswa' => $siswa,
        //     'tahun_ajaran' => $this->model('SiswaModel')->getTahunAjaranByID($tahun_ajaran),
        //     'matpel_siswa' => $this->model('SiswaModel')->getMatpelSiswaByID($siswa['kelas_sekarang']),
        //     'bakatminat_siswa' => $this->model('SiswaModel')->getBakatMinatSiswaByID($siswa['nis'])
        //     // 'select2_kelas' => $this->model('SiswaModel')->getAllKelas(),
        //     // 'select2_guru' => $this->model('SiswaModel')->getAllGuru()
        // ];

        // // print_r($data);
        // print("<pre>".print_r($data,true)."</pre>");
        // die();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('master-siswa/isi-raport', $data);
        // $this->view('master-siswa/isi-raport-khusus', $data);
        $this->view('templates/footer');
    }

    public function raportUpdate($status)
    {

        // var_dump('Controller raportUpdate');
        // var_dump($_POST);
        // die();

        // echo '<pre>' , print_r($_POST) , '</pre>';
        // exit();

        $datetime = date('Y-m-d H:i:s');
        $_POST['created_at'] = $datetime;
        $_POST['updated_at'] = $datetime;
        $_POST['raport_status'] = $status;

        if ($this->model('SiswaModel')->updateRaportSiswa($_POST) > 0) {
            if($status == "draft"){
                $msg = "Raport Siswa berhasil disimpan sebagai Draft.";
                Flasher::setFlash('Raport Siswa berhasil disimpan sebagai Draft.');
            }else{
                $msg = "Raport Siswa berhasil Dipublish.";
                Flasher::setFlash('Raport Siswa berhasil Dipublish.');
            }
        } else {
            if($status == "draft"){
                $msg = "Raport Siswa gagal disimpan sebagai Draft.";
                Flasher::setFlash('Raport Siswa gagal disimpan sebagai Draft.', 'danger');
            }else{
                $msg = "Raport Siswa gagal dipublish.";
                Flasher::setFlash('Raport Siswa gagal dipublish.', 'danger');
            }
        }
        // header('Location: ' . BASE_URL . '/mastersiswa');
        echo json_encode($msg);
        exit;
    }

    public function tambah()
    {
        $datetime = date('Y-m-d H:i:s');

        $_POST['diterima_tgl'] = date('Y-m-d', strtotime($_POST['diterima_tgl']));
        $_POST['tgl_lahir'] = date('Y-m-d', strtotime($_POST['tgl_lahir']));
        $_POST['created_at'] = $datetime;
        $_POST['updated_at'] = $datetime;

        if($_FILES['reff_passfoto']){
			$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
			$nama = $_POST['nis'].'.jpg';
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['reff_passfoto']['size'];
			$file_tmp = $_FILES['reff_passfoto']['tmp_name'];
 
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){			

                    if (!file_exists(DIR_UPLOAD_IMG)) {
                        mkdir(DIR_UPLOAD_IMG, 0777, true);
                    }

					move_uploaded_file($file_tmp, DIR_UPLOAD_IMG.$nama);
                    $_POST['reff_passfoto'] = DIR_UPLOAD_IMG.$nama;

				}else{
					echo 'UKURAN FILE TERLALU BESAR';
				}
			}else{
				echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}
		}

        if ($this->model('SiswaModel')->tambahDataSiswa($_POST) > 0) {
            Flasher::setFlash('Data Siswa telah berhasil ditambahkan.');
        } else {
            Flasher::setFlash('Data Siswa gagal ditambahkan.', 'danger');
        }
        header('Location: ' . BASE_URL . '/mastersiswa');
        exit;
    }

    public function delete($id)
    {
        if (isset($_POST['_method'])) {
            $datetime = date('Y-m-d H:i:s');
            $_POST['deleted_at'] = $datetime;
            $_POST['id'] = $id;
            if ($this->model('SiswaModel')->deleteSiswa($_POST) > 0) {
                Flasher::setFlash('Data User telah berhasil dihapus.');
            } else {
                Flasher::setFlash('Data User gagal dihapus.', 'danger');
            }
            header('Location: ' . BASE_URL . '/mastersiswa');
            exit;
        } else {
            die("Error: The Page does not exist.");
        }
    }

    public function getUbah()
    {
        echo json_encode($this->model('SiswaModel')->getSiswaByID($_POST['id']));
    }

    public function getPrestasi()
    {
        echo json_encode($this->model('SiswaModel')->getPrestasiID($_POST['id']));
    }

    public function ubah()
    {
        $datetime = date('Y-m-d H:i:s');
        $_POST['diterima_tgl'] = date('Y-m-d', strtotime($_POST['diterima_tgl']));
        $_POST['tgl_lahir'] = date('Y-m-d', strtotime($_POST['tgl_lahir']));
        $_POST['updated_at'] = $datetime;

        if($_FILES['reff_passfoto']){
			$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
			$nama = $_POST['nis'].'.jpg';
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['reff_passfoto']['size'];
			$file_tmp = $_FILES['reff_passfoto']['tmp_name'];
 
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){			
                    
					move_uploaded_file($file_tmp, DIR_UPLOAD_IMG.$nama);
                    $_POST['reff_passfoto'] = DIR_UPLOAD_IMG.$nama;

				}else{
					echo 'UKURAN FILE TERLALU BESAR';
				}
			}else{
				echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}
		}

        if ($this->model('SiswaModel')->ubahDataSiswa($_POST) > 0) {
            Flasher::setFlash('Data Siswa telah berhasil diubah.');
        } else {
            Flasher::setFlash('Data Siswa gagal diubah.', 'danger');
        }
        header('Location: ' . BASE_URL . '/mastersiswa');
        exit;
    }

    public function simpanPrestasi()
    {
        $datetime = date('Y-m-d H:i:s');
        $_POST['created_at'] = $datetime;
        $_POST['updated_at'] = $datetime;
        
        if ($this->model('siswaModel')->simpanPrestasiSiswa($_POST) > 0) {
            Flasher::setFlash('Prestasi telah berhasil ditambahkan.');
        } else {
            Flasher::setFlash('Prestasi Kelas gagal ditambahkan.', 'danger');
        }
        header('Location: ' . BASE_URL . '/mastersiswa');
        exit;
    }

    public function ubahGuruPendampingSiswa()
    {
        $datetime = date('Y-m-d H:i:s');
        $_POST['created_at'] = $datetime;
        $_POST['updated_at'] = $datetime;
        
        if ($this->model('siswaModel')->ubahGuruPendampingSiswa($_POST) > 0) {
            Flasher::setFlash('Guru Pendamping telah berhasil diubah.');
        } else {
            Flasher::setFlash('Guru Pendamping gagal diubah.', 'danger');
        }
        header('Location: ' . BASE_URL . '/mastersiswa');
        exit;
    }
}
