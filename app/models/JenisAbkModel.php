<?php

class JenisAbkModel
{
    private $table = 'jenis_abk';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllJenisAbk()
    {
        $query = 'SELECT *
                    FROM jenis_abk
                    WHERE deleted_at IS null 
                    ORDER BY jenis_abk asc';
        $this->db->query($query);
        return $this->db->getAllData();
    }

    public function tambahDataJenisAbk($data)
    {        
        $query = "INSERT INTO $this->table (jenis_abk, created_at, updated_at)
                    VALUES (:jenis_abk, :created_at, :updated_at)";


        $this->db->query($query);
        $this->db->bind('jenis_abk', $data['jenis_abk']);
        $this->db->bind('created_at', $data['created_at']);
        $this->db->bind('updated_at', $data['updated_at']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getJenisAbkByID($id)
    {
        $query = "SELECT * FROM $this->table WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->getFirstData();
    }

    public function deleteJenisAbk($data)
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

    public function ubahDataJenisAbk($data)
    {
        $query = "UPDATE $this->table SET 
                    jenis_abk = :jenis_abk, 
                    updated_at = :updated_at
                WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('jenis_abk', $data['jenis_abk']);
        $this->db->bind('updated_at', $data['updated_at']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function searchJenisAbk($keyword)
    {
        $query = "SELECT * FROM $this->table WHERE jenis_abk LIKE :jenis_abk";
        $this->db->query($query);
        $this->db->bind('jenis_abk', '%' . $keyword . '%');
        return $this->db->getAllData();
    }
}
