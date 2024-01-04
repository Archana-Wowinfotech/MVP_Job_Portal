<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reference_Model extends CI_Model
{
    public function save($data)
    {
        $this->load->database();
        $query = $this->db->insert('tb_reference', $data);
        return TRUE;
    }

    public function getAllReference()
    {
        $this->load->database();
        //data is retrive from this query  
        $query = $this->db->query('select * from tb_reference ORDER BY id DESC');
        return $query->result_array();
    }

   

    public function updateReferenceDetails($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('tb_reference', $data);
    }

    public function getStatusDetails($id)
    {
        $query = $this->db->query("select * from tb_reference where id='$id'");
        return $query->result_array();
    }
}
