<?php

class GuruModel
{
    private $table = 'guru';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllGuru()
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE deleted_at IS NULL';
        $this->db->query($query);
        return $this->db->getAllData();
    }

    public function tambahDataGuru($data)
    {
        $query = "INSERT INTO $this->table (id, nip, nm_guru, alamat_guru, jabatan, created_at, updated_at)
                    VALUES (:id ,:nip, :nm_guru, :alamat_guru, :jabatan, :created_at, :updated_at)";

        $this->db->query($query);
        $this->db->bind('id', $data['nip']);
        $this->db->bind('nip', $data['nip']);
        $this->db->bind('nm_guru', $data['nm_guru']);
        $this->db->bind('alamat_guru', $data['alamat_guru']);
        $this->db->bind('jabatan', $data['jabatan']);
        $this->db->bind('created_at', $data['created_at']);
        $this->db->bind('updated_at', $data['updated_at']);
        

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getGuruByID($id)
    {
        $query = "SELECT * FROM $this->table WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->getFirstData();
    }

    public function deleteGuru($data)
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

    public function ubahDataGuru($data)
    {
        $query = "UPDATE $this->table SET 
                    nm_guru = :nm_guru, 
                    alamat_guru = :alamat_guru, 
                    jabatan = :jabatan,
                    updated_at = :updated_at
                WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nm_guru', $data['nm_guru']);
        $this->db->bind('alamat_guru', $data['alamat_guru']);
        $this->db->bind('jabatan', $data['jabatan']);
        $this->db->bind('updated_at', $data['updated_at']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function searchGuru($keyword)
    {
        $query = "SELECT * FROM $this->table WHERE nm_guru LIKE :nm_guru";
        $this->db->query($query);
        $this->db->bind('nm_guru', '%' . $keyword . '%');
        return $this->db->getAllData();
    }
}
