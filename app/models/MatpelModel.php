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
        $query = "INSERT INTO $this->table (nm_matpel, kkm, kelompok, deskripsi, created_at, updated_at)
        VALUES (:nm_matpel, :kkm, :kelompok, :deskripsi , :created_at, :updated_at)";

        $this->db->query($query);
        $this->db->bind('nm_matpel', $data['nm_matpel']);
        $this->db->bind('kkm', $data['kkm']);
        $this->db->bind('kelompok', $data['kelompok']);
        $this->db->bind('deskripsi', $data['deskripsi']);
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
                    nm_matpel = :nm_matpel,
                    kkm = :kkm,
                    kelompok = :kelompok,
                    deskripsi = :deskripsi,
                    updated_at = :updated_at
                WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nm_matpel', $data['nm_matpel']);
        $this->db->bind('kkm', $data['kkm']);
        $this->db->bind('kelompok', $data['kelompok']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('updated_at', $data['updated_at']);
        $this->db->bind('id', $data['id']);
        

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function searchMatpel($keyword)
    {
        $query = "SELECT * FROM $this->table WHERE nm_matpel LIKE :nm_matpel";
        $this->db->query($query);
        $this->db->bind('nm_matpel', '%' . $keyword . '%');
        return $this->db->getAllData();
    }
}
