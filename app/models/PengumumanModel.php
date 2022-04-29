<?php

class PengumumanModel
{
    private $table = 'pengumuman';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPengumuman()
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE deleted_at IS NULL';
        $this->db->query($query);
        return $this->db->getAllData();
    }


    public function ubahDataPengumuman($data)
    {
        $query = "UPDATE $this->table SET 
                    id = :id,
                    isi_pengumuman = :isi_pengumuman,
                    updated_at = :updated_at
                WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('isi_pengumuman', $data['isi_pengumuman']);
        $this->db->bind('updated_at', $data['updated_at']);

        $this->db->execute();
        return $this->db->rowCount();
    }

}
