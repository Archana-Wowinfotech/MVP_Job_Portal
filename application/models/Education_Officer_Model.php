<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Education_Officer_Model extends CI_Model
{
    public function save($data)
    {
        $this->load->database();
        $query = $this->db->insert('tb_recruitment_cell', $data);
        return TRUE;
    }

    // Inside Education_Officer_Model
    public function checkEmailExists($email)
    {
        $this->load->database();
        $query = $this->db->get_where('tb_recruitment_cell', array('email' => $email));

        return $query->num_rows() > 0;
    }


    public function getAllEO()
    {
        $query = $this->db->query("SELECT * FROM tb_recruitment_cell WHERE role = 'education_officer' ORDER BY id DESC");
        return $query->result_array();
    }

   
    public function updateEODetails($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('tb_recruitment_cell', $data);
    }

    public function getStatusDetails($id)
    {
        $query = $this->db->query("select * from tb_recruitment_cell where id='$id'");
        return $query->result_array();
    }

    public function getAllPosition()
    {
        $query = $this->db->query("SELECT * FROM `tb_position` WHERE `status`='Active'");
        return $query->result_array();
    }

    public function getAllInstitute()
    {
        $query = $this->db->query("SELECT * FROM `tb_institute` WHERE `status` = 'Active'");
        return $query->result_array();
    }
}
