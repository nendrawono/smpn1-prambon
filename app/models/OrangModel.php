<?php

class OrangModel
{
    private $table = 'orang';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllOrang()
    {
        $query = 'SELECT * FROM ' . $this->table;
        $this->db->query($query);
        return $this->db->getAllData();
    }

    public function tambahDataOrang($data)
    {
        // echo "sini";
        // var_dump($data); 
        // exit;

        $query = "INSERT INTO $this->table (nama, alamat, created_at, updated_at)
                    VALUES (:nama, :alamat, :created_at, :updated_at)";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('created_at', $data['created_at']);
        $this->db->bind('updated_at', $data['updated_at']);
        

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getOrangByID($id)
    {
        $query = "SELECT * FROM $this->table WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->getFirstData();
    }

    public function deleteOrang($id)
    {
        $query = "DELETE FROM $this->table WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataOrang($data)
    {
        $query = "UPDATE $this->table SET 
                    nama = :nama,
                    alamat = :alamat,
                    created_at = :created_at,
                    updated_at = :updated_at
                WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('created_at', $data['created_at']);
        $this->db->bind('updated_at', $data['updated_at']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function searchOrang($keyword)
    {
        $query = "SELECT * FROM $this->table WHERE nama LIKE :nama";
        $this->db->query($query);
        $this->db->bind('nama', '%' . $keyword . '%');
        return $this->db->getAllData();
    }
}
