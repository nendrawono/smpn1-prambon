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

    public function getPesertaByID($data)
    {       
        $query = "select S.id, S.nm_siswa, K.nm_kelas
                    from detail_ekstra DE
                    join ekstra E on DE.ekstra_id = E.id 
                    join siswa S on DE.siswa_id = S.id
                    join kelas K on S.kelas_id = K.id 
                    where E.id = :id
                    and E.deleted_at is null ";

        $this->db->query($query);
        $this->db->bind('id', $data['id']);

        return $this->db->getAllData();
    }

    public function getSelect2Peserta($data)
    {       
        $query = "SELECT S.id ,S.nm_siswa, S.kelas_sekarang, K.nm_kelas 
                    FROM siswa S, kelas K
                    WHERE S.kelas_sekarang = K.id 
                    and NOT EXISTS(SELECT * FROM detail_ekstra DE
                                    WHERE S.id = DE.siswa_id and DE.ekstra_id = :ekstra_id)
                    group by S.nm_siswa ";

        $this->db->query($query);
        $this->db->bind('ekstra_id', $data['ekstra_id']);

        return $this->db->getAllData();
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

    public function ubahDataPeserta($data)
    {

        $query = "DELETE FROM detail_ekstra
                WHERE ekstra_id = :ekstra_id";

        $this->db->query($query);
        $this->db->bind('ekstra_id', $data['ekstra_id']);
        $this->db->execute();

        foreach ($data['siswa_id'] as $i => $value) {
            
            $query = "INSERT INTO detail_ekstra ( siswa_id, ekstra_id,created_at, updated_at)
                VALUES (  :siswa_id, :ekstra_id,:created_at, :updated_at)";

            $this->db->query($query);
            $this->db->bind('ekstra_id', $data['ekstra_id']);
            $this->db->bind('siswa_id', $data['siswa_id'][$i]);

            $this->db->bind('created_at', $data['created_at']);
            $this->db->bind('updated_at', $data['updated_at']);

            $this->db->execute();

        }

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
