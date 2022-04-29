<?php

class TahunAjaranModel
{
    private $table = 'tahun_ajaran';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllTahunAjaran()
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE deleted_at IS NULL';
        $this->db->query($query);
        return $this->db->getAllData();
    }

    public function tambahDataTahunAjaran($data)
    {
        $query = "INSERT INTO $this->table (tahun_ajaran, semester, created_at, updated_at)
                    VALUES (:tahun_ajaran,:semester, :created_at, :updated_at)";

        $this->db->query($query);
        $this->db->bind('tahun_ajaran', $data['tahun_ajaran']);
        $this->db->bind('semester', $data['semester']);
        $this->db->bind('created_at', $data['created_at']);
        $this->db->bind('updated_at', $data['updated_at']);
        

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getTahunAjaranByID($id)
    {
        $query = "SELECT * FROM $this->table WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->getFirstData();
    }

    public function deleteTahunAjaran($data)
    {
        // $query = "DELETE FROM $this->table WHERE id=:id";
        $query = "UPDATE $this->table SET 
                    deleted_at = :deleted_at
                    WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('deleted_at', $data['deleted_at']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataTahunAjaran($data)
    {
        $query = "UPDATE $this->table SET 
                    tahun_ajaran = :tahun_ajaran,
                    semester = :semester,
                    updated_at = :updated_at
                WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('tahun_ajaran', $data['tahun_ajaran']);
        $this->db->bind('semester', $data['semester']);
        $this->db->bind('updated_at', $data['updated_at']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function searchTahunAjaran($keyword)
    {
        $query = "SELECT * FROM $this->table WHERE tahun_ajaran LIKE :tahun_ajaran";
        $this->db->query($query);
        $this->db->bind('tahun_ajaran', '%' . $keyword . '%');
        return $this->db->getAllData();
    }
}
