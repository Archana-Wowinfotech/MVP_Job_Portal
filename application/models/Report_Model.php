<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report_Model extends CI_Model
{

    public function getInstitute_type($id){
        $this->load->database();
    
        $query = $this->db->query("select c.college_id,c.college_name,c.institute_id,c.status,c.created_date,c.Location,i.name as institute_name from tbl_college c LEFT JOIN tb_institute i ON c.institute_id=i.id where c.status='Active'
        and c.college_id='$id'");
        return $query -> result_array();
    }

    // public function getApplicantAllStatus()
    // {
    //     $this->load->database();

    //     $this->db->select('tb_applicant.*, tb_reference.name as reference_name, tb_position.name as position_name, tb_district.name as district_name, tb_taluka.name as taluka_name, tb_recruitment_cell.name as eo_name');
    //     $this->db->join('tb_reference', 'tb_reference.id = tb_applicant.reference_id', 'left');
    //     $this->db->join('tb_position', 'tb_position.id = tb_applicant.position_id', 'left');
    //     $this->db->join('tb_district', 'tb_district.id = tb_applicant.district_id', 'left');
    //     $this->db->join('tb_taluka', 'tb_taluka.id = tb_applicant.taluka_id', 'left');
    //     $this->db->join('tb_recruitment_cell', 'tb_recruitment_cell.id = tb_applicant.eo_id', 'left');

    //     $institute_id_from_url = $this->uri->segment(2);


    //     $this->db->where('tb_applicant.institute_id', $institute_id_from_url);
    //     $this->db->order_by('tb_applicant.id', 'DESC');
    //     $query = $this->db->get('tb_applicant');
    //     return $query->result_array();
    // }

    public function getApplicantAllStatus($institute_name,$college_name)
    {
     
    
        $this->load->database();

        if ($institute_name == 'School') {
            $this->db->where('education', $college_name);
        } elseif ($institute_name == 'college') {
            $this->db->where('college', $college_name);
        } elseif ($institute_name == 'Professional-College') {
            $this->db->where('professional', $college_name);
        }

        

        $this->db->select('tb_applicant.*, tb_reference.name as reference_name, tb_position.name as position_name, tb_district.name as district_name, tb_taluka.name as taluka_name, tb_recruitment_cell.name as eo_name');
        $this->db->join('tb_reference', 'tb_reference.id = tb_applicant.reference_id', 'left');
        $this->db->join('tb_position', 'tb_position.id = tb_applicant.position_id', 'left');
        $this->db->join('tb_district', 'tb_district.id = tb_applicant.district_id', 'left');
        $this->db->join('tb_taluka', 'tb_taluka.id = tb_applicant.taluka_id', 'left');
        $this->db->join('tb_recruitment_cell', 'tb_recruitment_cell.id = tb_applicant.eo_id', 'left');
    
        $this->db->where('tb_applicant.institute_id', $institute_name);
       

        $this->db->order_by('tb_applicant.id', 'DESC');
        $query = $this->db->get('tb_applicant');
        return $query->result_array();
    }
    

    public function instituteSelectedApplicant($institute_name,$college_name)
    {
        
        $this->load->database();

        if ($institute_name == 'School') {
            $this->db->where('education', $college_name);
        } elseif ($institute_name == 'college') {
            $this->db->where('college', $college_name);
        } elseif ($institute_name == 'Professional-College') {
            $this->db->where('professional', $college_name);
        }

        

        $this->db->select('tb_applicant.*, tb_reference.name as reference_name, tb_position.name as position_name, tb_district.name as district_name, tb_taluka.name as taluka_name, tb_recruitment_cell.name as eo_name');
        $this->db->join('tb_reference', 'tb_reference.id = tb_applicant.reference_id', 'left');
        $this->db->join('tb_position', 'tb_position.id = tb_applicant.position_id', 'left');
        $this->db->join('tb_district', 'tb_district.id = tb_applicant.district_id', 'left');
        $this->db->join('tb_taluka', 'tb_taluka.id = tb_applicant.taluka_id', 'left');
        $this->db->join('tb_recruitment_cell', 'tb_recruitment_cell.id = tb_applicant.eo_id', 'left');
       
        $this->db->where('tb_applicant.status', 'Selected');
        $this->db->where('tb_applicant.institute_id', $institute_name);
       

        $this->db->order_by('tb_applicant.id', 'DESC');
        $query = $this->db->get('tb_applicant');
        return $query->result_array();
    }

    public function instituteInprocessApplicant($institute_name,$college_name)
    {
        $this->load->database();

        if ($institute_name == 'School') {
            $this->db->where('education', $college_name);
        } elseif ($institute_name == 'college') {
            $this->db->where('college', $college_name);
        } elseif ($institute_name == 'Professional-College') {
            $this->db->where('professional', $college_name);
        }
        
        $this->db->select('tb_applicant.*, tb_reference.name as reference_name, tb_position.name as position_name, tb_district.name as district_name, tb_taluka.name as taluka_name, tb_recruitment_cell.name as eo_name');
        $this->db->join('tb_reference', 'tb_reference.id = tb_applicant.reference_id', 'left');
        $this->db->join('tb_position', 'tb_position.id = tb_applicant.position_id', 'left');
        $this->db->join('tb_district', 'tb_district.id = tb_applicant.district_id', 'left');
        $this->db->join('tb_taluka', 'tb_taluka.id = tb_applicant.taluka_id', 'left');
        $this->db->join('tb_recruitment_cell', 'tb_recruitment_cell.id = tb_applicant.eo_id', 'left');
        
        $this->db->where('tb_applicant.status', 'In_Process');
        $this->db->where('tb_applicant.institute_id', $institute_name);
        
        $this->db->order_by('tb_applicant.id', 'DESC');
        
        $query = $this->db->get('tb_applicant');
        return $query->result_array();
        
    }

    public function institutePendingApplicant($institute_name,$college_name)
    {
        
        $this->load->database();

        if ($institute_name == 'School') {
            $this->db->where('education', $college_name);
        } elseif ($institute_name == 'college') {
            $this->db->where('college', $college_name);
        } elseif ($institute_name == 'Professional-College') {
            $this->db->where('professional', $college_name);
        }
        $this->db->select('tb_applicant.*, tb_reference.name as reference_name, tb_position.name as position_name, tb_district.name as district_name, tb_taluka.name as taluka_name, tb_recruitment_cell.name as eo_name');
        $this->db->join('tb_reference', 'tb_reference.id = tb_applicant.reference_id', 'left');
        $this->db->join('tb_position', 'tb_position.id = tb_applicant.position_id', 'left');
        $this->db->join('tb_district', 'tb_district.id = tb_applicant.district_id', 'left');
        $this->db->join('tb_taluka', 'tb_taluka.id = tb_applicant.taluka_id', 'left');
        $this->db->join('tb_recruitment_cell', 'tb_recruitment_cell.id = tb_applicant.eo_id', 'left');

       
        $this->db->where('tb_applicant.status', 'Pending');
        $this->db->where('tb_applicant.institute_id', $institute_name);
      

        $this->db->order_by('tb_applicant.id', 'DESC');
        $query = $this->db->get('tb_applicant');
        return $query->result_array();
    }
    public function instituteRejectedApplicant($institute_name,$college_name)
    {
       
        $this->load->database();

        if ($institute_name == 'School') {
            $this->db->where('education', $college_name);
        } elseif ($institute_name == 'college') {
            $this->db->where('college', $college_name);
        } elseif ($institute_name == 'Professional-College') {
            $this->db->where('professional', $college_name);
        }
        $this->db->select('tb_applicant.*, tb_reference.name as reference_name, tb_position.name as position_name, tb_district.name as district_name, tb_taluka.name as taluka_name, tb_recruitment_cell.name as eo_name');
        $this->db->join('tb_reference', 'tb_reference.id = tb_applicant.reference_id', 'left');
        $this->db->join('tb_position', 'tb_position.id = tb_applicant.position_id', 'left');
        $this->db->join('tb_district', 'tb_district.id = tb_applicant.district_id', 'left');
        $this->db->join('tb_taluka', 'tb_taluka.id = tb_applicant.taluka_id', 'left');
        $this->db->join('tb_recruitment_cell', 'tb_recruitment_cell.id = tb_applicant.eo_id', 'left');
    
        $this->db->where('tb_applicant.status', 'Rejected');
        $this->db->where('tb_applicant.institute_id',$institute_name);
       

        $this->db->order_by('tb_applicant.id', 'DESC');
        $query = $this->db->get('tb_applicant');
        return $query->result_array();
    }

    public function getReferenceAllStatus($reference_id)
    {
        $this->load->database();

        $this->db->select('tb_applicant.*, tb_reference.name as reference_name, tb_position.name as position_name, tb_district.name as district_name, tb_taluka.name as taluka_name, tb_recruitment_cell.name as eo_name');
        $this->db->join('tb_reference', 'tb_reference.id = tb_applicant.reference_id', 'left');
        $this->db->join('tb_position', 'tb_position.id = tb_applicant.position_id', 'left');
        $this->db->join('tb_district', 'tb_district.id = tb_applicant.district_id', 'left');
        $this->db->join('tb_taluka', 'tb_taluka.id = tb_applicant.taluka_id', 'left');
        $this->db->join('tb_recruitment_cell', 'tb_recruitment_cell.id = tb_applicant.eo_id', 'left');

        $this->db->where('tb_reference.name', $reference_id);
        $this->db->order_by('tb_applicant.id', 'DESC');
        $query = $this->db->get('tb_applicant');
        return $query->result_array();
    }

    public function getSelectedReference($id)
    {
        $this->load->database();

        $this->db->select('tb_applicant.*, tb_reference.name as reference_name, tb_position.name as position_name, tb_district.name as district_name, tb_taluka.name as taluka_name, tb_recruitment_cell.name as eo_name');
        $this->db->join('tb_reference', 'tb_reference.id = tb_applicant.reference_id', 'left');
        $this->db->join('tb_position', 'tb_position.id = tb_applicant.position_id', 'left');
        $this->db->join('tb_district', 'tb_district.id = tb_applicant.district_id', 'left');
        $this->db->join('tb_taluka', 'tb_taluka.id = tb_applicant.taluka_id', 'left');
        $this->db->join('tb_recruitment_cell', 'tb_recruitment_cell.id = tb_applicant.eo_id', 'left');

        $this->db->where('tb_reference.name', $id);
        $this->db->where('tb_applicant.status', 'Selected');

        $this->db->order_by('tb_applicant.id', 'DESC');
        $query = $this->db->get('tb_applicant');
        return $query->result_array();
    }
    public function getInprocessReference($id)
    {
        $this->load->database();

        $this->db->select('tb_applicant.*, tb_reference.name as reference_name, tb_position.name as position_name, tb_district.name as district_name, tb_taluka.name as taluka_name, tb_recruitment_cell.name as eo_name');
        $this->db->join('tb_reference', 'tb_reference.id = tb_applicant.reference_id', 'left');
        $this->db->join('tb_position', 'tb_position.id = tb_applicant.position_id', 'left');
        $this->db->join('tb_district', 'tb_district.id = tb_applicant.district_id', 'left');
        $this->db->join('tb_taluka', 'tb_taluka.id = tb_applicant.taluka_id', 'left');
        $this->db->join('tb_recruitment_cell', 'tb_recruitment_cell.id = tb_applicant.eo_id', 'left');

        $this->db->where('tb_reference.name', $id);
        $this->db->where('tb_applicant.status', 'In_Process');

        $this->db->order_by('tb_applicant.id', 'DESC');
        $query = $this->db->get('tb_applicant');
        return $query->result_array();
    }

    public function getPendingReference($id)
    {
        $this->load->database();

        $this->db->select('tb_applicant.*, tb_reference.name as reference_name, tb_position.name as position_name, tb_district.name as district_name, tb_taluka.name as taluka_name, tb_recruitment_cell.name as eo_name');
        $this->db->join('tb_reference', 'tb_reference.id = tb_applicant.reference_id', 'left');
        $this->db->join('tb_position', 'tb_position.id = tb_applicant.position_id', 'left');
        $this->db->join('tb_district', 'tb_district.id = tb_applicant.district_id', 'left');
        $this->db->join('tb_taluka', 'tb_taluka.id = tb_applicant.taluka_id', 'left');
        $this->db->join('tb_recruitment_cell', 'tb_recruitment_cell.id = tb_applicant.eo_id', 'left');

        $this->db->where('tb_reference.name', $id);
        $this->db->where('tb_applicant.status', 'Pending');

        $this->db->order_by('tb_applicant.id', 'DESC');
        $query = $this->db->get('tb_applicant');
        return $query->result_array();
    }

    public function getRejectedReference($id)
    {
        $this->load->database();

        $this->db->select('tb_applicant.*, tb_reference.name as reference_name, tb_position.name as position_name, tb_district.name as district_name, tb_taluka.name as taluka_name, tb_recruitment_cell.name as eo_name');
        $this->db->join('tb_reference', 'tb_reference.id = tb_applicant.reference_id', 'left');
        $this->db->join('tb_position', 'tb_position.id = tb_applicant.position_id', 'left');
        $this->db->join('tb_district', 'tb_district.id = tb_applicant.district_id', 'left');
        $this->db->join('tb_taluka', 'tb_taluka.id = tb_applicant.taluka_id', 'left');
        $this->db->join('tb_recruitment_cell', 'tb_recruitment_cell.id = tb_applicant.eo_id', 'left');

        $this->db->where('tb_reference.name', $id);
        $this->db->where('tb_applicant.status', 'Rejected');

        $this->db->order_by('tb_applicant.id', 'DESC');
        $query = $this->db->get('tb_applicant');
        return $query->result_array();
    }

    public function getPendingEO($id)
    {
        $this->load->database();

        $this->db->select('tb_applicant.*, tb_reference.name as reference_name, tb_position.name as position_name, tb_district.name as district_name, tb_taluka.name as taluka_name, tb_recruitment_cell.name as eo_name');
        $this->db->join('tb_reference', 'tb_reference.id = tb_applicant.reference_id', 'left');
        $this->db->join('tb_position', 'tb_position.id = tb_applicant.position_id', 'left');
        $this->db->join('tb_district', 'tb_district.id = tb_applicant.district_id', 'left');
        $this->db->join('tb_taluka', 'tb_taluka.id = tb_applicant.taluka_id', 'left');
        $this->db->join('tb_recruitment_cell', 'tb_recruitment_cell.id = tb_applicant.eo_id', 'left');

        // $this->db->where('tb_recruitment_cell.name', $id);
        $this->db->where('tb_applicant.eo_id', $id);
        $this->db->where('tb_applicant.status', 'Pending');
        $this->db->order_by('tb_applicant.id', 'DESC');
        $query = $this->db->get('tb_applicant');
        return $query->result_array();
    }

    public function getInprocessEO($id)
    {
        $this->load->database();

        $this->db->select('tb_applicant.*, tb_reference.name as reference_name, tb_position.name as position_name, tb_district.name as district_name, tb_taluka.name as taluka_name, tb_recruitment_cell.name as eo_name');
        $this->db->join('tb_reference', 'tb_reference.id = tb_applicant.reference_id', 'left');
        $this->db->join('tb_position', 'tb_position.id = tb_applicant.position_id', 'left');
        $this->db->join('tb_district', 'tb_district.id = tb_applicant.district_id', 'left');
        $this->db->join('tb_taluka', 'tb_taluka.id = tb_applicant.taluka_id', 'left');
        $this->db->join('tb_recruitment_cell', 'tb_recruitment_cell.id = tb_applicant.eo_id', 'left');

        // $this->db->where('tb_recruitment_cell.name', $id);
        $this->db->where('tb_applicant.eo_id', $id);
        $this->db->where('tb_applicant.status', 'In_Process');
        $this->db->order_by('tb_applicant.id', 'DESC');
        $query = $this->db->get('tb_applicant');
        return $query->result_array();
    }

    public function getSelcetedEO($id)
    {
        $this->load->database();

        $this->db->select('tb_applicant.*, tb_reference.name as reference_name, tb_position.name as position_name, tb_district.name as district_name, tb_taluka.name as taluka_name, tb_recruitment_cell.name as eo_name');
        $this->db->join('tb_reference', 'tb_reference.id = tb_applicant.reference_id', 'left');
        $this->db->join('tb_position', 'tb_position.id = tb_applicant.position_id', 'left');
        $this->db->join('tb_district', 'tb_district.id = tb_applicant.district_id', 'left');
        $this->db->join('tb_taluka', 'tb_taluka.id = tb_applicant.taluka_id', 'left');
        $this->db->join('tb_recruitment_cell', 'tb_recruitment_cell.id = tb_applicant.eo_id', 'left');

        // $this->db->where('tb_recruitment_cell.name', $id);
        $this->db->where('tb_applicant.eo_id', $id);
        $this->db->where('tb_applicant.status', 'Selected');
        $this->db->order_by('tb_applicant.id', 'DESC');
        $query = $this->db->get('tb_applicant');
        return $query->result_array();
    }

    public function getRejectedEO($id)
    {
        $this->load->database();

        $this->db->select('tb_applicant.*, tb_reference.name as reference_name, tb_position.name as position_name, tb_district.name as district_name, tb_taluka.name as taluka_name, tb_recruitment_cell.name as eo_name');
        $this->db->join('tb_reference', 'tb_reference.id = tb_applicant.reference_id', 'left');
        $this->db->join('tb_position', 'tb_position.id = tb_applicant.position_id', 'left');
        $this->db->join('tb_district', 'tb_district.id = tb_applicant.district_id', 'left');
        $this->db->join('tb_taluka', 'tb_taluka.id = tb_applicant.taluka_id', 'left');
        $this->db->join('tb_recruitment_cell', 'tb_recruitment_cell.id = tb_applicant.eo_id', 'left');

        // $this->db->where('tb_recruitment_cell.name', $id);
        $this->db->where('tb_applicant.eo_id', $id);
        $this->db->where('tb_applicant.status', 'Rejected');
        $this->db->order_by('tb_applicant.id', 'DESC');
        $query = $this->db->get('tb_applicant');
        return $query->result_array();
    }

    public function getAllStatusEO($id)

    {
        $this->load->database();

        $this->db->select('tb_applicant.*, tb_reference.name as reference_name, tb_position.name as position_name, tb_district.name as district_name, tb_taluka.name as taluka_name, tb_recruitment_cell.name as eo_name');
        $this->db->join('tb_reference', 'tb_reference.id = tb_applicant.reference_id', 'left');
        $this->db->join('tb_position', 'tb_position.id = tb_applicant.position_id', 'left');
        $this->db->join('tb_district', 'tb_district.id = tb_applicant.district_id', 'left');
        $this->db->join('tb_taluka', 'tb_taluka.id = tb_applicant.taluka_id', 'left');
        $this->db->join('tb_recruitment_cell', 'tb_recruitment_cell.id = tb_applicant.eo_id', 'left');

        // $this->db->where('tb_recruitment_cell.name', $id);
        $this->db->where('tb_applicant.eo_id', $id);

        $this->db->order_by('tb_applicant.id', 'DESC');
        $query = $this->db->get('tb_applicant');
        return $query->result_array();
    }
}
