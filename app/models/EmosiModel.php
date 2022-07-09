<?php

class EmosiModel
{
    private $table = 'emosi';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllSiswa()
    {
        $query = 'SELECT S.nis ,S.nm_siswa, K.nm_kelas 
                    FROM siswa S
                    JOIN kelas K ON K.id = S.kelas_sekarang 
                    WHERE S.deleted_at IS NULL';
        $this->db->query($query);
        return $this->db->getAllData();
    }

    public function tambahDataEmosi($data)
    {
        foreach($data['nis'] as $index => $val){
            $query = "INSERT INTO $this->table (siswa_id, hari, bulan, tahun_ajaran_id, emosi, created_at)
            VALUES (:siswa_id, :hari, :bulan, :tahun_ajaran_id, :emosi, :created_at)";

            $this->db->query($query);
            $this->db->bind('siswa_id', $val);
            $this->db->bind('hari', $data['hari']);
            $this->db->bind('bulan', $data['bulan']);
            $this->db->bind('tahun_ajaran_id', $data['tahun_ajaran_id']);
            $this->db->bind('emosi', $data['emosi'.$index]);
            $this->db->bind('created_at', $data['created_at']);        

            $this->db->execute();
        }
       
        return $this->db->rowCount();
    }

    public function getDataEmosi($siswa_id, $tahun_ajaran_id)
    {
        $query = "SELECT bulan ,count(emosi) AS 'emosi_siswa'
                    FROM emosi 
                    where siswa_id = :siswa_id
                    and tahun_ajaran_id = :tahun_ajaran_id
                    AND emosi = 0
                    group by bulan";

        // $query = " select * v_emosi from where where siswa_id = :siswa_id and tahun_ajaran_id = :tahun_ajaran_id  ";
        $this->db->query($query);
        $this->db->bind('siswa_id', $siswa_id);
        $this->db->bind('tahun_ajaran_id', $tahun_ajaran_id);

        return $this->db->getAllData();
    }

    public function getDataTidakEmosi($siswa_id, $tahun_ajaran_id)
    {
        $query = "SELECT bulan ,count(emosi) AS 'emosi_siswa'
                FROM emosi 
                where siswa_id = :siswa_id
                and tahun_ajaran_id = :tahun_ajaran_id
                AND emosi = 1
                group by bulan";
        $this->db->query($query);
        $this->db->bind('siswa_id', $siswa_id);
        $this->db->bind('tahun_ajaran_id', $tahun_ajaran_id);

        return $this->db->getAllData();
    }

}
