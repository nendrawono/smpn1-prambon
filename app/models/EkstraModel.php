<?php

class EkstraModel
{
    private $table = 'ekstra';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllEkstra()
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE deleted_at IS NULL';
        $this->db->query($query);
        return $this->db->getAllData();
    }

    public function tambahDataEkstra($data)
    {
        $query = "INSERT INTO $this->table (nm_ekstra, created_at, updated_at)
                    VALUES (:nm_ekstra, :created_at, :updated_at)";

        $this->db->query($query);
        $this->db->bind('nm_ekstra', $data['nm_ekstra']);
        $this->db->bind('created_at', $data['created_at']);
        $this->db->bind('updated_at', $data['updated_at']);
        

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getEkstraByID($id)
    {
        $query = "SELECT * FROM $this->table WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->getFirstData();
    }

    public function deleteEkstra($data)
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

    public function ubahDataEkstra($data)
    {
        $query = "UPDATE $this->table SET 
                    nm_ekstra = :nm_ekstra,
                    updated_at = :updated_at
                WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nm_ekstra', $data['nm_ekstra']);
        $this->db->bind('updated_at', $data['updated_at']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function searchEkstra($keyword)
    {
        $query = "SELECT * FROM $this->table WHERE nm_ekstra LIKE :nm_ekstra";
        $this->db->query($query);
        $this->db->bind('nm_ekstra', '%' . $keyword . '%');
        return $this->db->getAllData();
    }

    public function valideEkstra($keyword)
    {
        $query = "SELECT * FROM $this->table WHERE nm_ekstra LIKE :nm_ekstra";
        $this->db->query($query);
        $this->db->bind('nm_ekstra', '%' . $keyword . '%');
        return $this->db->getAllData();
    }
}
