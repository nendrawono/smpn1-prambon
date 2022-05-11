<?php

class UserModel
{
    private $table = 'users';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    
    public function validasiLogin($data)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE username = :username AND password= :password AND deleted_at IS NULL';
        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);
        return $this->db->getFirstData();
    }

    public function getAllUser()
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE deleted_at IS NULL';
        $this->db->query($query);
        return $this->db->getAllData();
    }

    public function tambahDataUser($data)
    {
        $query = "INSERT INTO $this->table (username, password, status, created_at, updated_at)
                    VALUES (:username, :password, :status, :created_at, :updated_at)";

        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('status', '1');
        $this->db->bind('created_at', $data['created_at']);
        $this->db->bind('updated_at', $data['updated_at']);
        

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getUserByID($id)
    {
        $query = "SELECT * FROM $this->table WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->getFirstData();
    }

    public function deleteUser($data)
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

    public function ubahDataUser($data)
    {
        $query = "UPDATE $this->table SET 
                    username = :username,
                    password = :password,
                    updated_at = :updated_at
                WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('updated_at', $data['updated_at']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function searchUser($keyword)
    {
        $query = "SELECT * FROM $this->table WHERE nama LIKE :nama";
        $this->db->query($query);
        $this->db->bind('nama', '%' . $keyword . '%');
        return $this->db->getAllData();
    }
}
