<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Log_Model extends CI_Model
{
   
    public function getAllLogRecords()
    {
        //$RCC_id = $this->session->userdata('Id');
        $this->load->database();
        $this->db->select('tbl_log_rcc.*, tb_new_applicant.*, tb_recruitment_cell.*');
        $this->db->from('tbl_log_rcc');
        $this->db->join('tb_new_applicant', 'tb_new_applicant.id = tbl_log_rcc.candidate_id');
        $this->db->join('tb_recruitment_cell', 'tb_recruitment_cell.id = tbl_log_rcc.rcc_id');
        $this->db->where('tbl_log_rcc.type', 'candidate'); 
       
        $this->db->order_by('tb_new_applicant.id', 'DESC');
        $query = $this->db->get();
    
        return $query->result_array();
    }
    

    public function getApplicantLogRecords()
    {
        $RCC_id = $this->session->userdata('Id');
        $this->load->database();
        $this->db->select('tbl_log_rcc.*, tb_applicant.*, tb_recruitment_cell.*');
        $this->db->from('tbl_log_rcc');
        $this->db->join('tb_applicant', 'tb_applicant.id = tbl_log_rcc.applicant_id');
        $this->db->join('tb_recruitment_cell', 'tb_recruitment_cell.id = tbl_log_rcc.rcc_id');
        $this->db->where('tbl_log_rcc.type', 'applicant'); 
    
        $this->db->group_by('tb_applicant.id'); // Use the correct alias here
    
        $this->db->order_by('tbl_log_rcc.log_id', 'DESC');
        $query = $this->db->get();
    
        return $query->result_array();
    }
    

    public function getAllApplicantLogRecords($applicant_id)
    {
        $RCC_id = $this->session->userdata('Id');
        $this->load->database();
        $this->db->select('tbl_log_rcc.*, tb_applicant.*,tb_recruitment_cell.*,tb_position.name as position_name');
        $this->db->from('tbl_log_rcc');
        $this->db->join('tb_applicant','tbl_log_rcc.applicant_id=tb_applicant.id');
        $this->db->join('tb_recruitment_cell','tb_recruitment_cell.id = tbl_log_rcc.rcc_id');
        $this->db->join('tb_position','tbl_log_rcc.position_id=tb_position.id');
        $this->db->where('tbl_log_rcc.applicant_id', $applicant_id);
        $this->db->order_by('tbl_log_rcc.log_id','DESC');
        $query=$this->db->get();
      // $query =  $this->db->query("SELECT * FROM `tbl_log_rcc` WHERE candidate_id='$candidate_id'");
        
    
        return $query->result_array();
    }
    
}