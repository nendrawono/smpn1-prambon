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
        $query = 'SELECT siswa.*, kelas.nm_kelas
                    FROM siswa
                    INNER JOIN kelas ON siswa.kelas_id = kelas.id
                    WHERE siswa.deleted_at IS NULL';
        $this->db->query($query);
        return $this->db->getAllData();
    }

    public function tambahDataSiswa($data)
    {
        $query = "INSERT INTO $this->table (user_id, nama, tempat_lahir, tgl_lahir, jenis_kelamin , alamat, created_at, updated_at)
                    VALUES (:user_id, :nama, :tempat_lahir, :tgl_lahir, :jenis_kelamin, :alamat, :created_at, :updated_at)";

        $this->db->query($query);
        $this->db->bind('user_id', $data['user_id']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('tempat_lahir', $data['tempat_lahir']);
        $this->db->bind('tgl_lahir', $data['tgl_lahir']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind('created_at', $data['created_at']);
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

    public function deleteSiswa($data)
    {
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
        $query = "UPDATE $this->table SET 
                    nama = :nama, 
                    tempat_lahir = :tempat_lahir, 
                    tgl_lahir = :tgl_lahir, 
                    jenis_kelamin = :jenis_kelamin, 
                    alamat = :alamat,
                    updated_at = :updated_at
                WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('tempat_lahir', $data['tempat_lahir']);
        $this->db->bind('tgl_lahir', $data['tgl_lahir']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('updated_at', $data['updated_at']);
        $this->db->bind('id', $data['id']);

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
