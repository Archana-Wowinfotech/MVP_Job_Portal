<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Position_Model extends CI_Model
{
    public function save($data)
    {
        $this->load->database();
        $query = $this->db->insert('tb_position', $data);
        return TRUE;
    }

    public function getAllPosition()
    {
        $this->load->database();
    
        $this->db->select('tb_position.*, tb_requirement_source.name as requirement_source');
        $this->db->from('tb_position');
        $this->db->join('tb_requirement_source', 'tb_requirement_source.id = tb_position.requirement_source', 'left');
        $this->db->order_by('tb_position.id', 'DESC');
        
        $query = $this->db->get();
        
        return $query->result_array();
    }
    
    public function getAllPositionForEO($eo_id)
{
    $this->load->database();

    $this->db->select('tb_position.*, tb_requirement_source.name as requirement_source');
    $this->db->from('tb_position');
    $this->db->join('tb_requirement_source', 'tb_requirement_source.id = tb_position.requirement_source', 'left');
    $this->db->where("(assign_to = 'eo' AND eo_id = '$eo_id') OR assign_to = 'all'");
    $this->db->order_by('tb_position.id', 'DESC');

    $query = $this->db->get();
    return $query->result_array();

    // Rest of your code...
}

        
        // return $query->result_array();
        // $this->load->database();

        // $query = $this->db->query("SELECT * FROM tb_position 
        // WHERE (CASE WHEN assign_to = 'eo' THEN eo_id = '$eo_id' ELSE assign_to = 'all' END)");
        // $query = $this->db->select('*')
        //     ->from('tb_position')
        //     ->where('eo_id', $eo_id)
        //     ->order_by('id', 'DESC')
        //     ->get();


        // return $query->result_array();
    // }




    public function updatePositionDetails($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('tb_position', $data);
    }

    public function getStatusDetails($id)
    {
        $query = $this->db->query("select * from tb_position where id='$id'");
        return $query->result_array();
    }
    public function getRequirementSource()
    {
        $query = $this->db->query("SELECT * FROM `tb_requirement_source` WHERE `STATUS`='Active'"); 
      return $query->result_array();  
    }

    public function insertPosition($data)
    {
        $this->load->database();
        $query = $this->db->insert('tb_position', $data);
        return TRUE;
    }
}
