<?php

class MatpelModel
{
    private $table = 'matpel';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMatpel()
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE deleted_at IS NULL';
        $this->db->query($query);
        return $this->db->getAllData();
    }

    public function tambahDataMatpel($data)
    {
        $query = "INSERT INTO $this->table (kelas_id, nm_pelajaran, kkm, deskripsi, kelompok, created_at, updated_at)
                    VALUES (:kelas_id, :nm_pelajaran, :kkm, :deskripsi, :kelompok ,:created_at, :updated_at)";

        $this->db->query($query);
        $this->db->bind('kelas_id', $data['kelas_id']);
        $this->db->bind('nm_pelajaran', $data['nm_pelajaran']);
        $this->db->bind('kkm', $data['kkm']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('kelompok', $data['kelompok']);
        $this->db->bind('created_at', $data['created_at']);
        $this->db->bind('updated_at', $data['updated_at']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getMatpelByID($id)
    {
        $query = "SELECT * FROM $this->table WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->getFirstData();
    }

    public function deleteMatpel($data)
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

    public function ubahDataMatpel($data)
    {
        $query = "UPDATE $this->table SET 
                    kelas_id = :kelas_id,
                    nm_pelajaran = :nm_pelajaran,
                    kkm = :kkm,
                    deskripsi = :deskripsi,
                    kelompok = :kelompok,
                    updated_at = :updated_at
                WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('kelas_id', $data['kelas_id']);
        $this->db->bind('nm_pelajaran', $data['nm_pelajaran']);
        $this->db->bind('kkm', $data['kkm']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('kelompok', $data['kelompok']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function searchMatpel($keyword)
    {
        $query = "SELECT * FROM $this->table WHERE nm_pelajaran LIKE :nm_pelajaran";
        $this->db->query($query);
        $this->db->bind('nm_pelajaran', '%' . $keyword . '%');
        return $this->db->getAllData();
    }
}
