<?php

class KelasModel
{
    private $table = 'kelas';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllKelas()
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE deleted_at IS NULL';
        $this->db->query($query);
        return $this->db->getAllData();
    }

    public function tambahDataKelas($data)
    {
        $query = "INSERT INTO $this->table (nm_kelas, status, created_at, updated_at)
                    VALUES (:nm_kelas, :status, :created_at, :updated_at)";

        $this->db->query($query);
        $this->db->bind('nm_kelas', $data['nm_kelas']);
        $this->db->bind('status', '1');
        $this->db->bind('created_at', $data['created_at']);
        $this->db->bind('updated_at', $data['updated_at']);
        

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getKelasByID($id)
    {
        $query = "SELECT * FROM $this->table WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->getFirstData();
    }

    public function deleteKelas($data)
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

    public function ubahDataKelas($data)
    {
        $query = "UPDATE $this->table SET 
                    nm_kelas = :nm_kelas,
                    updated_at = :updated_at
                WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nm_kelas', $data['nm_kelas']);
        $this->db->bind('updated_at', $data['updated_at']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function searchKelas($keyword)
    {
        $query = "SELECT * FROM $this->table WHERE nm_kelas LIKE :nm_kelas";
        $this->db->query($query);
        $this->db->bind('nm_kelas', '%' . $keyword . '%');
        return $this->db->getAllData();
    }

    public function valideKelas($keyword)
    {
        $query = "SELECT * FROM $this->table WHERE nm_kelas LIKE :nm_kelas";
        $this->db->query($query);
        $this->db->bind('nm_kelas', '%' . $keyword . '%');
        return $this->db->getAllData();
    }
}
