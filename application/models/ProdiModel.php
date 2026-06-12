<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProdiModel extends CI_Model {

    protected $table = 'prodi';

    public function getAll()
    {
        return $this->db->select('prodi.*, fakultas.fakultas_name as fakultas_name')
            ->from($this->table)
            ->join('fakultas', 'fakultas.fakultas_id = prodi.fakultas_id', 'left')
            ->order_by('prodi.prodi_id', 'ASC')
            ->get()
            ->result_array();
    }

    public function getById($id)
    {
        return $this->db->where('prodi.prodi_id', $id)
            ->select('prodi.*, fakultas.fakultas_name as fakultas_name')
            ->from($this->table)
            ->join('fakultas', 'fakultas.fakultas_id = prodi.fakultas_id', 'left')
            ->get()
            ->row_array();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('prodi_id', $id)->update($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db->where('prodi_id', $id)->delete($this->table);
    }
}
