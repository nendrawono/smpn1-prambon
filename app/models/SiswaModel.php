<?php

class SiswaModel
{
    private $table = 'siswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllSiswa()
    {
        // $query = 'SELECT siswa.*, kelas.nm_kelas
        //             FROM siswa
        //             INNER JOIN kelas ON siswa.kelas_id = kelas.id
        //             WHERE siswa.deleted_at IS NULL';
        $query = "SELECT S.*, K.nm_kelas, G.nm_guru ,GROUP_CONCAT(DISTINCT P.prestasi SEPARATOR ';') AS prestasi
                    FROM siswa S
                    JOIN kelas K ON S.kelas_sekarang = K.id
                    join guru G on G.id = S.guru_pendamping_sekarang 
                    left join prestasi P on S.id = P.siswa_id 
                    WHERE S.deleted_at IS null 
                    group by S.id";
        $this->db->query($query);
        return $this->db->getAllData();
    }

    public function getRaportSiswaByID($id)
    {
        $query = "SELECT S.*, K.nm_kelas, G.nm_guru ,GROUP_CONCAT(DISTINCT P.prestasi SEPARATOR ';') AS prestasi
                    FROM siswa S
                    JOIN kelas K ON S.kelas_sekarang = K.id
                    join guru G on G.id = S.guru_pendamping_sekarang 
                    left join prestasi P on S.id = P.siswa_id 
                    WHERE S.deleted_at IS null 
                    AND S.id = :id
                    group by S.id";

        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->getFirstData();
    }

    public function getTahunAjaranByID($id)
    {
        $query = "SELECT * FROM tahun_ajaran
                    WHERE deleted_at IS null 
                    AND id = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->getFirstData();
    }

    // TODO::RAPORT SISWA

    public function checkRaportSiswa($nis, $tahun_ajaran)
    {
        $query = "SELECT R.* FROM raport R
                    WHERE R.siswa_id = :siswa_id
                    AND R.tahun_ajaran_id = :tahun_ajaran_id ";

        $this->db->query($query);
        $this->db->bind('siswa_id', $nis);
        $this->db->bind('tahun_ajaran_id', $tahun_ajaran);
        return $this->db->getFirstData();
    }

    public function insertRaportSiswa($nis, $kelas_sekarang, $tahun_ajaran_id)
    {

        // echo '<pre>' , print_r($kelas_sekarang) , '</pre>';
        // echo $kelas_sekarang;
        // exit();

        $query = "INSERT INTO raport (siswa_id, kelas_id, tahun_ajaran_id, raport_status)
                    VALUES (:nis, :kelas_id, :tahun_ajaran_id, :raport_status) ";
       
        $this->db->query($query);
        $this->db->bind('nis', $nis);
        $this->db->bind('kelas_id', $kelas_sekarang);
        $this->db->bind('tahun_ajaran_id', $tahun_ajaran_id);
        $this->db->bind('raport_status', 'draft');

        $this->db->execute();

        $id_raport = $this->db->lastInsertId();

        $this->insertRaportMatpelSiswa($id_raport, $kelas_sekarang, $tahun_ajaran_id, $nis);

        return $this->db->rowCount();
    }

    public function insertRaportMatpelSiswa($id_raport, $kelas_sekarang, $tahun_ajaran_id, $nis)
    {

        $matpel = $this->getMatpelSiswaByID($kelas_sekarang);
        $bakat_minat = $this->getBakatMinatSiswaByID($nis);

        // echo '<pre>' , print_r($matpel) , '</pre>';
        // exit();

        foreach($matpel as $val){
            $query = "INSERT INTO raport_matpel (raport_id, matpel_id , nilai, predikat)
            VALUES (:id_raport, :matpel_id , '0', '-')";

            $this->db->query($query);
            $this->db->bind('id_raport', $id_raport);
            $this->db->bind('matpel_id', $val['matpel_id']);
            $this->db->execute();

            $this->db->rowCount();
        }

        foreach($bakat_minat as $val){
            $query = "INSERT INTO raport_ekstra (raport_id, ekstra_id)
            VALUES (:id_raport, :ekstra_id)";

            $this->db->query($query);
            $this->db->bind('id_raport', $id_raport);
            $this->db->bind('ekstra_id', $val['ekstra_id']);
            $this->db->execute();

            $this->db->rowCount();
        }

        return $id_raport;
    }

    public function getRaportData($nis, $tahun_ajaran_id)
    {
        $query = "SELECT R.*
                    from raport R
                    where R.siswa_id = :nis
                    and R.tahun_ajaran_id = :tahun_ajaran_id ";

        $this->db->query($query);
        $this->db->bind('nis', $nis);
        $this->db->bind('tahun_ajaran_id', $tahun_ajaran_id);
        return $this->db->getFirstData();
    }

    public function getMatpelData($id_raport)
    {
        $query = "SELECT M.id, M.nm_matpel, M.kkm, M.kelompok, M.deskripsi, RM.*
                from raport_matpel RM
                join matpel M on RM.matpel_id = M.id 
                where RM.raport_id = :id_raport
                order by M.kelompok ASC";

        $this->db->query($query);
        $this->db->bind('id_raport', $id_raport);
        return $this->db->getAllData();
    }
    

    public function getEkstraData($id_raport)
    {
        $query = "SELECT E.nm_ekstra, RE.*
                    from raport_ekstra RE
                    join ekstra E on RE.ekstra_id = E.id 
                    where RE.raport_id = :id_raport";

        $this->db->query($query);
        $this->db->bind('id_raport', $id_raport);
        return $this->db->getAllData();
    }

    // END RAPORT

    public function getMatpelSiswaByID($kelas_sekarang_id)
    {
        $query = "SELECT K.id as 'kelas_sekarang_id', K.nm_kelas, M.id as 'matpel_id', M.nm_matpel, M.kkm, M.kelompok, M.deskripsi
                    FROM jadwal_kelas JK 
                    JOIN kelas K ON JK.kelas_id = K.id 
                    JOIN guru G ON JK.guru_id = G.id
                    JOIN matpel M ON JK.matpel_id = M.id
                    WHERE K.id = :id
                    AND M.deleted_at IS NULL 
                    group by M.nm_matpel
                    order by M.kelompok ASC ";

        $this->db->query($query);
        $this->db->bind('id', $kelas_sekarang_id);
        return $this->db->getAllData();
    }

    public function getBakatMinatSiswaByID($nis)
    {
        $query = "SELECT S.nis, S.nm_siswa, E.id as 'ekstra_id' ,E.nm_ekstra
                    from detail_ekstra DE
                    join siswa S on DE.siswa_id = S.id 
                    join ekstra E on DE.ekstra_id = E.id 
                    where DE.siswa_id = :id";

        $this->db->query($query);
        $this->db->bind('id', $nis);
        return $this->db->getAllData();
    }

    public function updateRaportSiswa($data)
    {
        // echo "model update raport";

        // echo '<pre>' , print_r($data) , '</pre>';
        // exit();

        $query = "UPDATE raport SET 
                spiritual_pred = :predikat_spiritual,
                spiritual_des = :spiritual_des,
                sosial_pred = :sosial_predikat,
                sosial_des = :sosial_des,
                sakit = :sakit,
                ijin = :ijin,
                tanpa_keterangan = :tanpa_ket,
                membaca = :membaca,
                menghitung = :menghitung,
                prilaku = :prilaku,
                disiplin = :disiplin,
                kerja_keras = :kerja_keras,
                kreatif = :kreatif,
                mandiri = :mandiri,
                rasa_ingin_tau = :rasa_ingin_tau,
                tanggung_jawab = :tanggung_jawab,
                raport_status = :raport_status,
                created_at = :created_at
                WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $data['id_raport']);
        $this->db->bind('predikat_spiritual', $data['predikat_spiritual']);
        $this->db->bind('spiritual_des', $data['spiritual_des']);
        $this->db->bind('sosial_predikat', $data['sosial_predikat']);
        $this->db->bind('sosial_des', $data['sosial_des']);
        $this->db->bind('sakit', $data['sakit']);
        $this->db->bind('ijin', $data['ijin']);
        $this->db->bind('tanpa_ket', $data['tanpa_ket']);
        $this->db->bind('membaca', $data['membaca']);
        $this->db->bind('menghitung', $data['menghitung']);
        $this->db->bind('prilaku', $data['prilaku']);
        $this->db->bind('disiplin', $data['disiplin']);
        $this->db->bind('kerja_keras', $data['kerja_keras']);
        $this->db->bind('kreatif', $data['kreatif']);
        $this->db->bind('mandiri', $data['mandiri']);
        $this->db->bind('rasa_ingin_tau', $data['rasa_ingin_tau']);
        $this->db->bind('tanggung_jawab', $data['tanggung_jawab']);
        $this->db->bind('raport_status', $data['raport_status']);

        $this->db->bind('created_at', $data['created_at']);
        
        $this->db->execute();
        $r = $this->db->rowCount();

        

        $delete_detail = $this->deleteDetailBeforeUpdate($data['id_raport']);

        foreach($data['matpel_id'] as $index => $val){
            $query = "INSERT INTO raport_matpel (
                        raport_id, matpel_id , nilai, predikat
                    )
            VALUES (:id_raport, :matpel_id , :nilai, :predikat)";

            $this->db->query($query);
            $this->db->bind('id_raport', $data['id_raport']);
            $this->db->bind('matpel_id', $data['matpel_id'][$index]);
            $this->db->bind('nilai', $data['nilai'][$index]);
            $this->db->bind('predikat', $data['predikat'][$index]);
            $this->db->execute();

            $this->db->rowCount();
        }

        if(isset($data['bakatminat_id'])){
            foreach($data['bakatminat_id'] as $index => $val){
                $query = "INSERT INTO raport_ekstra (raport_id, ekstra_id, keterangan, created_at)
                VALUES (:id_raport, :ekstra_id, :keterangan, :created_at)";
    
                $this->db->query($query);
                $this->db->bind('id_raport', $data['id_raport']);
                $this->db->bind('ekstra_id', $val);
                $this->db->bind('keterangan', $data['bakatminat_ket'][$index]);
                $this->db->bind('created_at', $data['created_at']);
                $this->db->execute();
    
                $this->db->rowCount();
            }
        }

        return $this->db->rowCount();

    }

    public function deleteDetailBeforeUpdate($id_raport)
    {
        $query = "DELETE FROM raport_matpel
                    WHERE raport_id = :raport_id";
        
        $this->db->query($query);
        $this->db->bind('raport_id', $id_raport);
        $this->db->execute();
        $this->db->rowCount();

        $query2 = "DELETE FROM raport_ekstra
                    WHERE raport_id = :raport_id";
        
        $this->db->query($query2);
        $this->db->bind('raport_id', $id_raport);
        $this->db->execute();

        $this->db->rowCount();
    }

    public function getAllKelas()
    {
        $query = 'SELECT * FROM kelas WHERE deleted_at IS NULL';
        $this->db->query($query);
        return $this->db->getAllData();
    }

    public function getAllGuru()
    {
        $query = 'SELECT * FROM guru WHERE deleted_at IS NULL';
        $this->db->query($query);
        return $this->db->getAllData();
    }

    public function tambahDataSiswa($data)
    {
        $query = "INSERT INTO siswa 
                (id,nis,kelas_id,nm_siswa,tempat_lahir,tgl_lahir,jenis_kelamin,alamat,agama,status_dalam_keluarga,anak_ke,tlp,sekolah_asal,diterima_dikelas,diterima_tgl,nm_ayah,nm_ibu,alamat_ortu,tlp_ortu,pekerjaan_ayah,pekerjaan_ibu ,nm_wali,alamat_wali,tlp_wali,pekerjaan_wali,reff_passfoto,original_passfoto,status,created_at ,updated_at, kelas_sekarang, guru_pendamping_sekarang)
                VALUES 
                ( :id,:nis,:kelas_id,:nm_siswa,:tempat_lahir,:tgl_lahir,:jenis_kelamin,:alamat,:agama,:status_dalam_keluarga,:anak_ke,:tlp,:sekolah_asal,:diterima_dikelas,:diterima_tgl,:nm_ayah,:nm_ibu,:alamat_ortu,:tlp_ortu,:pekerjaan_ayah,:pekerjaan_ibu ,:nm_wali,:alamat_wali,:tlp_wali,:pekerjaan_wali,:reff_passfoto,:original_passfoto,:status,:created_at ,:updated_at, :kelas_sekarang, :guru_pendamping_sekarang )";
       
        $this->db->query($query);
        $this->db->bind('id', $data['nis']);
        $this->db->bind('nis', $data['nis']);
        $this->db->bind('kelas_id', $data['kelas_id']);
        $this->db->bind('diterima_dikelas', $data['kelas_id']);
        $this->db->bind('nm_siswa', $data['nm_siswa']);
        $this->db->bind('tempat_lahir', $data['tempat_lahir']);
        $this->db->bind('tgl_lahir', $data['tgl_lahir']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);

        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('agama', $data['agama']);
        $this->db->bind('status_dalam_keluarga', $data['status_dalam_keluarga']);
        $this->db->bind('anak_ke', $data['anak_ke']);
        $this->db->bind('tlp', $data['tlp']);
        $this->db->bind('sekolah_asal', $data['sekolah_asal']);
        $this->db->bind('diterima_tgl', $data['diterima_tgl']);
        $this->db->bind('nm_ayah', $data['nm_ayah']);
        $this->db->bind('nm_ibu', $data['nm_ibu']);
        $this->db->bind('alamat_ortu', $data['alamat_ortu']);
        $this->db->bind('tlp_ortu', $data['tlp_ortu']);
        $this->db->bind('pekerjaan_ayah', $data['pekerjaan_ayah']);
        $this->db->bind('pekerjaan_ibu', $data['pekerjaan_ibu']);
        $this->db->bind('nm_wali', $data['nm_wali']);
        $this->db->bind('alamat_wali', $data['alamat_wali']);
        $this->db->bind('tlp_wali', $data['tlp_wali']);
        $this->db->bind('pekerjaan_wali', $data['pekerjaan_wali']);
        // $this->db->bind('reff_passfoto', $data['reff_passfoto']);
        // $this->db->bind('original_passfoto', $data['original_passfoto']);
        $this->db->bind('reff_passfoto', $data['reff_passfoto']);
        $this->db->bind('original_passfoto', null);
        $this->db->bind('status', 1);

        $this->db->bind('kelas_sekarang', $data['kelas_id']);
        $this->db->bind('guru_pendamping_sekarang', '0');



        $this->db->bind('created_at', $data['created_at']);
        $this->db->bind('updated_at', $data['updated_at']);

        // echo '<pre>' , print_r($query) , '</pre>';
        // exit();
        
        $this->db->execute();

        $this->createUserSiswa($data);

        return $this->db->rowCount();
    }

    public function createUserSiswa($dataSiswa)
    {

        $queryUser = "INSERT INTO users (username, password, siswa_id, status, id_role, created_at, updated_at)
                    VALUES (:username, :password, :siswa_id, :status, :id_role, :created_at, :updated_at)";

        $this->db->query($queryUser);
        $this->db->bind('username', $dataSiswa['nis']);
        $this->db->bind('password', $dataSiswa['nis']);
        $this->db->bind('siswa_id', $dataSiswa['nis']);
        $this->db->bind('status', '1');
        $this->db->bind('id_role', '3'); //3 role siswa
        $this->db->bind('created_at', $dataSiswa['created_at']);
        $this->db->bind('updated_at', $dataSiswa['updated_at']);

        $this->db->execute();
        return $this->db->rowCount();

    }

    public function simpanPrestasiSiswa($data)
    {

        $query = "DELETE FROM prestasi
                    WHERE siswa_id = :siswa_id AND hari = :hari";
        
        $this->db->query($query);
        $this->db->bind('siswa_id', $data['pilihHari']);
        $this->db->bind('kelas_id', $data['kelas_id']);
        $this->db->execute();

        foreach ($data['matpel_id'] as $i => $value) {
            
            $query = "INSERT INTO jadwal_kelas (hari, jam_ke, jam_mulai, jam_selesai, kelas_id, guru_id, matpel_id, created_at, updated_at)
                VALUES ( :hari, :jam_ke, :jam_mulai, :jam_selesai, :kelas_id, :guru_id, :matpel_id, :created_at, :updated_at)";

            $this->db->query($query);
            $this->db->bind('hari', $data['pilihHari']);
            $this->db->bind('kelas_id', $data['kelas_id']);

            $this->db->bind('jam_ke', $data['jam_ke'][$i]);
            $this->db->bind('jam_mulai', $data['jam_mulai'][$i]);
            $this->db->bind('jam_selesai', $data['jam_selesai'][$i]);
            $this->db->bind('guru_id', $data['guru_id'][$i]);
            $this->db->bind('matpel_id', $data['matpel_id'][$i]);
            $this->db->bind('created_at', $data['created_at']);
            $this->db->bind('updated_at', $data['updated_at']);

            $this->db->execute();

        }

        return $this->db->rowCount();
    }

    public function ubahGuruPendampingSiswa($data)
    {

        //  var_dump($data);
        // die();

        $query = "UPDATE $this->table SET 
                guru_pendamping_sekarang = :guru_pendamping_sekarang,
                updated_at = :updated_at
            WHERE id = :id";

        //  var_dump($query);
        // die();

        $this->db->query($query);
        $this->db->bind('id', $data['siswa_id']);
        $this->db->bind('guru_pendamping_sekarang', $data['guru_pendamping']);

        $this->db->bind('updated_at', $data['updated_at']);


        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getSiswaByID($id)
    {
        $query = "SELECT * FROM $this->table WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->getFirstData();
    }

    public function getPrestasiID($id)
    {
        $query = "SELECT * FROM prestasi WHERE siswa_id=:id AND deleted_at IS NULL";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->getAllData();
    }

    public function deleteSiswa($data)
    {
        // var_dump($data);
        // exit();
        $query = "UPDATE $this->table SET 
                    deleted_at = :deleted_at
                    WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('deleted_at', $data['deleted_at']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataSiswa($data)
    {

        //     echo '<pre>' , print_r($data) , '</pre>';
        // exit();
        
        // $query = "UPDATE $this->table SET 
        //             -- kelas_id = :kelas_id,
        //             nm_siswa = :nm_siswa,
        //             -- tempat_lahir = :tempat_lahir,
        //             -- tgl_lahir = :tgl_lahir,
        //             -- jenis_kelamin = :jenis_kelamin,
        //             -- alamat = :alamat,
        //             -- agama = :agama,
        //             -- status_dalam_keluarga = :status_dalam_keluarga,
        //             -- anak_ke = :anak_ke,
        //             -- tlp = :tlp,
        //             -- sekolah_asal = :sekolah_asal,
        //             -- diterima_dikelas = :diterima_dikelas,
        //             -- diterima_tgl = :diterima_tgl,
        //             -- nm_ayah = :nm_ayah,
        //             -- nm_ibu = :nm_ibu,
        //             -- alamat_ortu = :alamat_ortu,
        //             -- tlp_ortu = :tlp_ortu,
        //             -- pekerjaan_ayah = :pekerjaan_ayah,
        //             -- pekerjaan_ibu = :pekerjaan_ibu ,
        //             -- nm_wali = :nm_wali,
        //             -- alamat_wali = :alamat_wali,
        //             -- tlp_wali = :tlp_wali,
        //             -- pekerjaan_wali = :pekerjaan_wali,
        //             -- reff_passfoto = :reff_passfoto,
        //             -- original_passfoto = :original_passfoto,
        //             -- status = '1',
        //             -- updated_at = :updated_at
        //         WHERE id = :id";

        $query = "UPDATE $this->table SET 
                    kelas_id = :kelas_id,
                    nm_siswa = :nm_siswa,
                    tempat_lahir = :tempat_lahir,
                    tgl_lahir = :tgl_lahir,
                    jenis_kelamin = :jenis_kelamin,
                    alamat = :alamat,
                    agama = :agama,
                    status_dalam_keluarga = :status_dalam_keluarga,
                    anak_ke = :anak_ke,
                    tlp = :tlp,
                    sekolah_asal = :sekolah_asal,
                    diterima_dikelas = :kelas_id,
                    diterima_tgl = :diterima_tgl,
                    nm_ayah = :nm_ayah,
                    nm_ibu = :nm_ibu,
                    alamat_ortu = :alamat_ortu,
                    tlp_ortu = :tlp_ortu,
                    pekerjaan_ayah = :pekerjaan_ayah,
                    pekerjaan_ibu = :pekerjaan_ibu ,
                    nm_wali = :nm_wali,
                    alamat_wali = :alamat_wali,
                    tlp_wali = :tlp_wali,
                    pekerjaan_wali = :pekerjaan_wali,
                    reff_passfoto = :reff_passfoto,
                    original_passfoto = :original_passfoto,
                    status = :status,
                    updated_at = :updated_at
                WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('kelas_id', $data['kelas_id']);
        $this->db->bind('nm_siswa', $data['nm_siswa']);
        $this->db->bind('tempat_lahir', $data['tempat_lahir']);
        $this->db->bind('tgl_lahir', $data['tgl_lahir']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);

        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('agama', $data['agama']);
        $this->db->bind('status_dalam_keluarga', $data['status_dalam_keluarga']);
        $this->db->bind('anak_ke', $data['anak_ke']);
        $this->db->bind('tlp', $data['tlp']);
        $this->db->bind('sekolah_asal', $data['sekolah_asal']);
        $this->db->bind('diterima_dikelas', null);
        $this->db->bind('diterima_tgl', $data['diterima_tgl']);
        $this->db->bind('nm_ayah', $data['nm_ayah']);
        $this->db->bind('nm_ibu', $data['nm_ibu']);
        $this->db->bind('alamat_ortu', $data['alamat_ortu']);
        $this->db->bind('tlp_ortu', $data['tlp_ortu']);
        $this->db->bind('pekerjaan_ayah', $data['pekerjaan_ayah']);
        $this->db->bind('pekerjaan_ibu', $data['pekerjaan_ibu']);
        $this->db->bind('nm_wali', $data['nm_wali']);
        $this->db->bind('alamat_wali', $data['alamat_wali']);
        $this->db->bind('tlp_wali', $data['tlp_wali']);
        $this->db->bind('pekerjaan_wali', $data['pekerjaan_wali']);
        $this->db->bind('reff_passfoto', $data['reff_passfoto']);
        $this->db->bind('original_passfoto', null);
        $this->db->bind('status', 1);

        $this->db->bind('updated_at', $data['updated_at']);


        $this->db->execute();
        return $this->db->rowCount();
    }

    public function searchSiswa($keyword)
    {
        $query = "SELECT * FROM $this->table WHERE nama LIKE :nama OR id LIKE :id OR alamat LIKE :alamat";
        $this->db->query($query);
        $this->db->bind('nama', '%' . $keyword . '%');
        $this->db->bind('id', '%' . $keyword . '%');
        $this->db->bind('alamat', '%' . $keyword . '%');
        return $this->db->getAllData();
    }
}
