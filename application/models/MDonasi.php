<?php
class MDonasi extends CI_Model
{
    public $table = 'donasi';

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
        //echo $this->db->last_query(); exit;
    }

    // get all data
    function get_all()
    {
        $this->db->order_by('id_donasi', 'DESC');
        return $this->db->get($this->table)->result();
    }

    function delete($id_donasi)
    {
        $this->db->where('id_donasi', $id_donasi);
        $this->db->delete($this->table);
    }    

    function get_by_id($id_donasi)
    {
        $this->db->where('id_donasi', $id_donasi);
        return $this->db->get($this->table)->row();
    }

        function update($id_donasi, $data)
    {
        $this->db->where('id_donasi', $id_donasi);
        $this->db->update($this->table, $data);
    }
}