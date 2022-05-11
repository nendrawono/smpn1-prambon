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
        // $query = 'SELECT * FROM ' . $this->table . ' WHERE deleted_at IS NULL';
        $query  = 'select K.*, G.nip, G.nm_guru 
                    from kelas K
                    join guru G on K.wali_kelas_id = G.id
                    where K.deleted_at is null ';

        $this->db->query($query);
        return $this->db->getAllData();
    }

    public function tambahDataKelas($data)
    {
        $query = "INSERT INTO $this->table (nm_kelas, wali_kelas_id, status, created_at, updated_at)
                    VALUES (:nm_kelas, :wali_kelas_id, :status, :created_at, :updated_at)";

        $this->db->query($query);
        $this->db->bind('nm_kelas', $data['nm_kelas']);
        $this->db->bind('wali_kelas_id', $data['wali_kelas_id']);
        $this->db->bind('status', '1');
        $this->db->bind('created_at', $data['created_at']);
        $this->db->bind('updated_at', $data['updated_at']);
        

        $this->db->execute();
        return $this->db->rowCount();
    }
    
    public function simpanJadwalKelas($data)
    {

        $query = "DELETE FROM jadwal_kelas
                    WHERE kelas_id = :kelas_id AND hari = :hari";
        
        $this->db->query($query);
        $this->db->bind('hari', $data['pilihHari']);
        $this->db->bind('kelas_id', $data['kelas_id']);
        $this->db->execute();

        foreach ($data['matpel_id'] as $i => $value) {
            
            $query = "INSERT INTO jadwal_kelas (hari, jam_ke, jam_mulai, jam_selesai, kelas_id, guru_id, matpel_id, created_at, updated_at)
                VALUES ( :hari, :jam_ke, :jam_mulai, :jam_selesai, :kelas_id, :guru_id, :matpel_id, :created_at, :updated_at)";

            $this->db->query($query);
            $this->db->bind('hari', $data['pilihHari']);
            $this->db->bind('kelas_id', $data['kelas_id']);

            $this->db->bind('jam_ke', $data['jam_ke'][$i]);
            $this->db->bind('jam_mulai', $data['jam_mulai'][$i]);
            $this->db->bind('jam_selesai', $data['jam_selesai'][$i]);
            $this->db->bind('guru_id', $data['guru_id'][$i]);
            $this->db->bind('matpel_id', $data['matpel_id'][$i]);
            $this->db->bind('created_at', $data['created_at']);
            $this->db->bind('updated_at', $data['updated_at']);

            $this->db->execute();

        }

        return $this->db->rowCount();
    }

    public function getKelasByID($id)
    {
        $query = "SELECT * FROM $this->table WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->getFirstData();
    }

    public function getJadwalByID($data)
    {       
        $query = "SELECT K.id as 'kelas_id', K.nm_kelas, JK.hari, M.id as 'matpel_id' ,M.nm_matpel, JK.jam_ke, JK.jam_mulai, JK.jam_selesai, G.id as 'guru_id' ,G.nm_guru
                    FROM jadwal_kelas JK 
                    JOIN kelas K ON JK.kelas_id = K.id 
                    JOIN guru G ON JK.guru_id = G.id
                    JOIN matpel M ON JK.matpel_id = M.id
                    WHERE K.id = :kelas_id
                    AND JK.hari = :hari
                    ORDER BY JK.jam_ke ASC";
        $this->db->query($query);
        $this->db->bind('kelas_id', $data['id']);
        $this->db->bind('hari', $data['hari']);

        return $this->db->getAllData();
    }

    public function lihatJadwalByID($data)
    {       
        $query = "SELECT K.id as 'kelas_id', K.nm_kelas, JK.hari, M.id as 'matpel_id' ,M.nm_matpel, JK.jam_ke, JK.jam_mulai, JK.jam_selesai, G.id as 'guru_id' ,G.nm_guru
                    FROM jadwal_kelas JK 
                    JOIN kelas K ON JK.kelas_id = K.id 
                    JOIN guru G ON JK.guru_id = G.id
                    JOIN matpel M ON JK.matpel_id = M.id
                    WHERE K.id = :kelas_id AND JK.hari = :hari
                    ORDER BY JK.jam_ke ASC";
                    
        $this->db->query($query);
        $this->db->bind('kelas_id', $data['id']);
        $this->db->bind('hari', $data['hari']);

        return $this->db->getAllData();
    }

    public function deleteKelas($data)
    {
        $queryJadwalMatpel = "UPDATE jadwal_kelas SET 
                    deleted_at = :deleted_at
                    WHERE kelas_id = :kelas_id";

        $this->db->query($queryJadwalMatpel);
        $this->db->bind('kelas_id', $data['id']);
        $this->db->bind('deleted_at', $data['deleted_at']);
        $this->db->execute();

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
                    wali_kelas_id = :wali_kelas_id,
                    updated_at = :updated_at
                WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nm_kelas', $data['nm_kelas']);
        $this->db->bind('wali_kelas_id', $data['wali_kelas_id']);        
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
}
