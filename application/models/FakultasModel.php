<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FakultasModel extends CI_Model {

    protected $table = 'fakultas';

    // compatible names with assignment: getAll / getById
    public function getAll()
    {
        return $this->db->order_by('fakultas_id', 'ASC')->get($this->table)->result_array();
    }

    public function getById($id)
    {
        return $this->db->where('fakultas_id', $id)->get($this->table)->row_array();
    }

    // generic CRUD helpers
    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('fakultas_id', $id)->update($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db->where('fakultas_id', $id)->delete($this->table);
    }
}
