<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Applicant_Model extends CI_Model
{

    public function getAllProfessionalInstitute()
    {
        $this->load->database();
        $query = $this->db->query("select c.college_id,c.college_name,c.institute_id,c.status,c.created_date,c.Location,i.name as institute_name from tbl_college c LEFT JOIN tb_institute i ON c.institute_id=i.id where c.status='Active'");
        return $query->result_array();
    }
    public function saveBasicDetails($data)
    {
        $this->load->database();
        $query = $this->db->insert('tb_new_applicant', $data);
        return TRUE;
    }
    public function saveReferenceDetails($data)
    {
        $this->load->database();
        $query = $this->db->insert('tb_applicant', $data);
        return TRUE;
    }
    public function saveCertificate($data)
    {
        $this->load->database();
        $query = $this->db->insert('tb_certificate', $data);
        return TRUE;
    }

    public function checkAdharAlreadyExists($aadhar)
    {
        $this->load->database();
        $query = $this->db->query("select * from tb_new_applicant where aadhar='$aadhar' ");
        return $query->result_array();
    }

    public function saveApplicantBasicDetail($data)
    {
        $this->load->database();
        $query = $this->db->insert('tb_new_applicant', $data);
        return TRUE;
    }
    public function UpdateApplicantBasicDetail($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('tb_new_applicant', $data);
    }
    public function getAllApplicantList()
    {
        $RCC_id = $this->session->userdata('Id');
        $this->load->database();
        $query = $this->db->query("SELECT na.id,
                                        na.first_name,
                                        na.last_name,
                                        na.contact_no,
                                        na.email_id,
                                        na.aadhar,
                                        na.district_id,
                                        na.taluka_id,
                                        na.city,
                                        na.qualification,
                                        na.reg_date_time,
                                        na.status,
                                        na.remarkforstatus,
                                        t.name as taluka_name,
                                        d.name as district_name
                                FROM tb_new_applicant na
                                LEFT JOIN tb_taluka t ON na.taluka_id = t.id
                                LEFT JOIN tb_district d ON na.district_id = d.id
                                WHERE na.RCC_id = '$RCC_id'
                                ORDER BY na.id DESC;
                                ");
        return $query->result_array();
    }

    public function getCandidateDetails($candidate_id)
    {
        $RCC_id = $this->session->userdata('Id');
        $this->load->database();
        $query = $this->db->query("select na.id,na.first_name,
                                        na.last_name,
                                        na.contact_no,
                                        na.email_id,
                                        na.aadhar,
                                        na.district_id,
                                        na.taluka_id,
                                        na.city,
                                        na.qualification,
                                        na.reg_date_time,
                                        na.status,
                                        na.remarkforstatus,
                                        t.name as taluka_name,
                                        d.name as district_name
                                        from tb_new_applicant na 
                                        LEFT JOIN tb_taluka t ON na.taluka_id=t.id 
                                        LEFT JOIN tb_district d ON na.district_id=d.id
                                        where na.id='$candidate_id'");
        return $query->result_array();
    }

    public function getAllApplicant($candidate_id)
    {
        $this->load->database();
        $this->db->select('tb_applicant.*, tb_reference.name as reference_name,tb_position.name,tb_district.name as district_name,tb_taluka.name as taluka_name,tb_recruitment_cell.name as eo_name');
        $this->db->join('tb_reference', 'tb_reference.id = tb_applicant.reference_id', 'left');
        $this->db->join('tb_position', 'tb_position.id = tb_applicant.position_id', 'left');
        $this->db->join('tb_district', 'tb_district.id = tb_applicant.district_id', 'left');
        $this->db->join('tb_taluka', 'tb_taluka.id = tb_applicant.taluka_id', 'left');
        $this->db->join('tb_recruitment_cell', 'tb_recruitment_cell.id = tb_applicant.eo_id', 'left');
        $this->db->where('tb_applicant.candidate_id', $candidate_id);
        $this->db->order_by('tb_applicant.id', 'DESC');
        $query = $this->db->get('tb_applicant');

        return $query->result_array();
    }

    public function getAllApplicantSarchitnis()
    {
        $this->load->database();
        $this->db->select('tb_applicant.*, tb_reference.name as reference_name,tb_position.name,tb_district.name as district_name,tb_taluka.name as taluka_name,tb_recruitment_cell.name as eo_name');
        $this->db->join('tb_reference', 'tb_reference.id = tb_applicant.reference_id', 'left');
        $this->db->join('tb_position', 'tb_position.id = tb_applicant.position_id', 'left');
        $this->db->join('tb_district', 'tb_district.id = tb_applicant.district_id', 'left');
        $this->db->join('tb_taluka', 'tb_taluka.id = tb_applicant.taluka_id', 'left');
        $this->db->join('tb_recruitment_cell', 'tb_recruitment_cell.id = tb_applicant.eo_id', 'left');
        $this->db->order_by('tb_applicant.id', 'DESC');
        $query = $this->db->get('tb_applicant');

        return $query->result_array();
    }


    public function getAllApplicant1()
    {
        $this->load->database();
        $this->db->select('tb_applicant.*, tb_reference.name as reference_name,tb_position.name,tb_district.name as district_name,tb_taluka.name as taluka_name,tb_recruitment_cell.name as eo_name');
        $this->db->join('tb_reference', 'tb_reference.id = tb_applicant.reference_id', 'left');
        $this->db->join('tb_position', 'tb_position.id = tb_applicant.position_id', 'left');
        $this->db->join('tb_district', 'tb_district.id = tb_applicant.district_id', 'left');
        $this->db->join('tb_taluka', 'tb_taluka.id = tb_applicant.taluka_id', 'left');
        $this->db->join('tb_recruitment_cell', 'tb_recruitment_cell.id = tb_applicant.eo_id', 'left');

        $this->db->order_by('tb_applicant.id', 'DESC');
        $query = $this->db->get('tb_applicant');

        return $query->result_array();
    }

    public function savelogrcc($data)
    {

        $this->load->database();
        $query = $this->db->insert('tbl_log_rcc', $data);
        return TRUE;
    }
    public function getAllApplicantForReferenceReport()
    {
        $this->load->database();
        $this->db->select('tb_applicant.*, tb_reference.name as reference_name,tb_position.name,tb_district.name as district_name,tb_taluka.name as taluka_name,tb_recruitment_cell.name as eo_name');
        $this->db->join('tb_reference', 'tb_reference.id = tb_applicant.reference_id', 'left');
        $this->db->join('tb_position', 'tb_position.id = tb_applicant.position_id', 'left');
        $this->db->join('tb_district', 'tb_district.id = tb_applicant.district_id', 'left');
        $this->db->join('tb_taluka', 'tb_taluka.id = tb_applicant.taluka_id', 'left');
        $this->db->join('tb_recruitment_cell', 'tb_recruitment_cell.id = tb_applicant.eo_id', 'left');
        $this->db->group_by('tb_applicant.reference_id');
        $this->db->order_by('tb_applicant.id', 'DESC');
        $query = $this->db->get('tb_applicant');

        return $query->result_array();
    }
    public function getAllApplicantforInstituteReport()
    {
        $this->load->database();
        $this->db->select('tb_applicant.*, tb_reference.name as reference_name,tb_position.name,tb_district.name as district_name,tb_taluka.name as taluka_name,tb_recruitment_cell.name as eo_name');
        $this->db->join('tb_reference', 'tb_reference.id = tb_applicant.reference_id', 'left');
        $this->db->join('tb_position', 'tb_position.id = tb_applicant.position_id', 'left');
        $this->db->join('tb_district', 'tb_district.id = tb_applicant.district_id', 'left');
        $this->db->join('tb_taluka', 'tb_taluka.id = tb_applicant.taluka_id', 'left');
        $this->db->join('tb_recruitment_cell', 'tb_recruitment_cell.id = tb_applicant.eo_id', 'left');
        $this->db->group_by('tb_applicant.education');
        $this->db->order_by('tb_applicant.id', 'DESC');
        $query = $this->db->get('tb_applicant');

        return $query->result_array();
    }

    public function getAllInstituteReport()
    {
        $query = $this->db->query("SELECT * FROM `tb_applicant` WHERE `status`='Active'");
        return $query->result_array();
    }

    public function getOneApplicant($id)
    {
        $this->load->database();

        $this->db->select('tb_applicant.*, tb_reference.name as reference_name,tb_position.name,tb_district.name as district_name,tb_taluka.name as taluka_name,tb_recruitment_cell.name as eo_name');
        $this->db->join('tb_reference', 'tb_reference.id = tb_applicant.reference_id', 'left');
        $this->db->join('tb_position', 'tb_position.id = tb_applicant.position_id', 'left');
        $this->db->join('tb_district', 'tb_district.id = tb_applicant.district_id', 'left');
        $this->db->join('tb_taluka', 'tb_taluka.id = tb_applicant.taluka_id', 'left');
        $this->db->join('tb_recruitment_cell', 'tb_recruitment_cell.id = tb_applicant.eo_id', 'left');
        $this->db->where('tb_applicant.id', $id);
        $this->db->order_by('tb_applicant.id', 'DESC');
        $query = $this->db->get('tb_applicant');
        return $query->result_array();
    }

    public function getAllApplicantByEO($eo_id)
    {
        $this->load->database();

        $this->db->select('tb_applicant.*, tb_reference.name as reference_name, tb_position.name, tb_district.name as district_name, tb_taluka.name as taluka_name, tb_recruitment_cell.name as eo_name');
        $this->db->join('tb_reference', 'tb_reference.id = tb_applicant.reference_id', 'left');
        $this->db->join('tb_position', 'tb_position.id = tb_applicant.position_id', 'left');
        $this->db->join('tb_district', 'tb_district.id = tb_applicant.district_id', 'left');
        $this->db->join('tb_taluka', 'tb_taluka.id = tb_applicant.taluka_id', 'left');
        $this->db->join('tb_recruitment_cell', 'tb_recruitment_cell.id = tb_applicant.eo_id', 'left');

        // Add a condition to check assign_to
        $this->db->where('(tb_applicant.assign_to = "eo" AND tb_applicant.eo_id = ' . $eo_id . ') OR tb_applicant.assign_to = "all"');

        $this->db->order_by('tb_applicant.id', 'DESC');
        $query = $this->db->get('tb_applicant');
        return $query->result_array();
    }


    public function getAllApplicantForEOReport()
    {
        $this->load->database();

        $this->db->select('tb_applicant.*, tb_reference.name as reference_name,tb_position.name,tb_district.name as district_name,tb_taluka.name as taluka_name,tb_recruitment_cell.name as eo_name');
        $this->db->join('tb_reference', 'tb_reference.id = tb_applicant.reference_id', 'left');
        $this->db->join('tb_position', 'tb_position.id = tb_applicant.position_id', 'left');
        $this->db->join('tb_district', 'tb_district.id = tb_applicant.district_id', 'left');
        $this->db->join('tb_taluka', 'tb_taluka.id = tb_applicant.taluka_id', 'left');
        $this->db->join('tb_recruitment_cell', 'tb_recruitment_cell.id = tb_applicant.eo_id', 'left');
        $this->db->where('tb_applicant.assign_to', 'eo');
        $this->db->group_by('tb_applicant.eo_id');
        $this->db->order_by('tb_applicant.id', 'DESC');
        $query = $this->db->get('tb_applicant');
        return $query->result_array();
    }


    public function getAllDistrict()
    {
        $this->load->database();

        $query = $this->db->query("SELECT * FROM `tb_district` WHERE `status`='Active'");
        return $query->result_array();
    }

    public function getAllTaluka()
    {
        $this->load->database();
        $query = $this->db->query("SELECT * FROM `tb_taluka` WHERE `status`='Active'");
        return $query->result_array();
    }


    public function updateApplicantDetails($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('tb_applicant', $data);
    }


    public function updateStatus($data, $id)
    {
        // Assuming 'applicants' is your table name
        $this->db->where('id', $id);
        return $this->db->update('tb_applicant', $data);

        // $this->db->where('id', $id);
        // return  $this->db->update('tb_applicant', array('status' => $status));
    }

    public function getStatusDetails($id)
    {
        $query = $this->db->query("select * from tb_applicant where id='$id'");
        return $query->result_array();
    }

    public function getAllPosition()
    {
        $query = $this->db->query("SELECT * FROM `tb_position` WHERE `status`='Active'");
        return $query->result_array();
    }

    public function getAllPositionEO()
    {
        $query = $this->db->query("SELECT * FROM `tb_position` WHERE `status`='Active'");
        return $query->result_array();
    }

    public function getAllReference()
    {
        $query = $this->db->query("SELECT * FROM `tb_reference` WHERE `status`='Active'");
        return $query->result_array();
    }

    public function getAllInstitute()
    {
        $query = $this->db->query("SELECT * FROM `tb_institute` WHERE `status` = 'Active'");
        return $query->result_array();
    }

    public function getAllApplicantFilter($status, $candidate_id)
    {
        $this->load->database();

        $this->db->select('tb_applicant.*, tb_reference.name as reference_name,tb_position.name,tb_recruitment_cell.name as eo_name,tb_district.name as district_name,tb_taluka.name as taluka_name');
        $this->db->join('tb_reference', 'tb_reference.id = tb_applicant.reference_id', 'left');
        $this->db->join('tb_position', 'tb_position.id = tb_applicant.position_id', 'left');
        $this->db->join('tb_recruitment_cell', 'tb_recruitment_cell.id = tb_applicant.eo_id', 'left');
        $this->db->join('tb_district', 'tb_district.id = tb_applicant.district_id', 'left');
        $this->db->join('tb_taluka', 'tb_taluka.id = tb_applicant.taluka_id', 'left');
        $this->db->where('tb_applicant.status', $status);
        $this->db->where('tb_applicant.candidate_id', $candidate_id);
        $this->db->order_by('tb_applicant.id', 'DESC');
        $query = $this->db->get('tb_applicant');
        return $query->result_array();
    }
    public function getAllApplicantFilter1($status)
    {
        $this->load->database();

        $this->db->select('tb_applicant.*, tb_reference.name as reference_name,tb_position.name,tb_recruitment_cell.name as eo_name,tb_district.name as district_name,tb_taluka.name as taluka_name');
        $this->db->join('tb_reference', 'tb_reference.id = tb_applicant.reference_id', 'left');
        $this->db->join('tb_position', 'tb_position.id = tb_applicant.position_id', 'left');
        $this->db->join('tb_recruitment_cell', 'tb_recruitment_cell.id = tb_applicant.eo_id', 'left');
        $this->db->join('tb_district', 'tb_district.id = tb_applicant.district_id', 'left');
        $this->db->join('tb_taluka', 'tb_taluka.id = tb_applicant.taluka_id', 'left');
        $this->db->where('tb_applicant.status', $status);

        $this->db->order_by('tb_applicant.id', 'DESC');
        $query = $this->db->get('tb_applicant');
        return $query->result_array();
    }

    public function getAllApplicantFilterEO($status, $eo_id)
    {
        $this->load->database();

        $this->db->select('tb_applicant.*, tb_reference.name as reference_name, tb_position.name, tb_recruitment_cell.name as eo_name, tb_district.name as district_name, tb_taluka.name as taluka_name');
        $this->db->join('tb_reference', 'tb_reference.id = tb_applicant.reference_id', 'left');
        $this->db->join('tb_position', 'tb_position.id = tb_applicant.position_id', 'left');
        $this->db->join('tb_recruitment_cell', 'tb_recruitment_cell.id = tb_applicant.eo_id', 'left');
        $this->db->join('tb_district', 'tb_district.id = tb_applicant.district_id', 'left');
        $this->db->join('tb_taluka', 'tb_taluka.id = tb_applicant.taluka_id', 'left');

        $this->db->where('tb_applicant.status', $status);

        // Use group_start and group_end for grouping conditions
        $this->db->group_start();

        // Check if eo_id is greater than 0 and assign_to is 'eo'
        $this->db->where('(tb_applicant.eo_id = ' . $eo_id . ' AND tb_applicant.assign_to = "eo")', NULL, FALSE);


        // If eo_id is less than or equal to 0, include 'all' condition
        $this->db->or_where('(tb_applicant.eo_id <= 0 AND tb_applicant.assign_to = "all")', NULL, FALSE);

        $this->db->group_end();

        $this->db->order_by('tb_applicant.id', 'DESC');
        $query = $this->db->get('tb_applicant');
        return $query->result_array();
    }



    public function getAllApplicantFilterSarchitnis($status)
    {
        $this->load->database();

        $this->db->select('tb_applicant.*, tb_reference.name as reference_name,tb_position.name,tb_recruitment_cell.name as eo_name,tb_district.name as district_name,tb_taluka.name as taluka_name');
        $this->db->join('tb_reference', 'tb_reference.id = tb_applicant.reference_id', 'left');
        $this->db->join('tb_position', 'tb_position.id = tb_applicant.position_id', 'left');
        $this->db->join('tb_recruitment_cell', 'tb_recruitment_cell.id = tb_applicant.eo_id', 'left');
        $this->db->join('tb_district', 'tb_district.id = tb_applicant.district_id', 'left');
        $this->db->join('tb_taluka', 'tb_taluka.id = tb_applicant.taluka_id', 'left');
        $this->db->where('tb_applicant.status', $status);
        $this->db->order_by('tb_applicant.id', 'DESC');
        $query = $this->db->get('tb_applicant');
        return $query->result_array();
    }


    public function deleteUser($id)
    {
        $this->db->where('tb_applicant.id', $id);
        return $this->db->delete('tb_applicant');
    }

    public function getAllEducationOfficer()
    {
        $query = $this->db->query("SELECT * FROM `tb_recruitment_cell` WHERE `status` = 'Active' AND `role` = 'education_officer'");

        return $query->result_array();
    }


    public function getAllCertificate($id)
    {
        $query = $this->db->query("select * from tb_certificate where applicant_id ='$id' ");
        return $query->result_array();
    }

    public function updateApplicantCertificate($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('tb_certificate', $data);
    }

    public function getTalukaList($district_id)
    {
        $query = $this->db->query("SELECT * FROM `tb_taluka` WHERE district_id='$district_id' ");

        $output = '<option value="" selected>Select Taluka</option>';

        foreach ($query->result_array() as $key => $row) {
            $output .= '<option value=' . $row['id'] . '>' . $row['name'] . '</option>';
        }
        return $output;
    }

    public function getAdminDetails($Id)
    {
        $this->load->database();

        $query = $this->db->query("SELECT * FROM `tb_recruitment_cell` WHERE id='$Id' AND `status`='Active'");
        return $query->result_array();
    }

    public function getAllDocument($id)
    {
        $this->load->database();

        $query = $this->db->query("SELECT * FROM `tb_certificate` WHERE applicant_id='$id'");
        return $query->result_array();
    }
    public function getCandidateStatusDetails($id)
    {
        $query = $this->db->query("select * from tb_new_applicant where id='$id'");
        return $query->result_array();
    }
    public function updateCandidiateDetails($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('tb_new_applicant', $data);
    }

    public function getCandidateDetailsByAadhar($textboxValue)
    {
        $query = $this->db->query("select na.id,na.first_name,
        na.last_name,
        na.contact_no,
        na.email_id,
        na.aadhar,
        na.district_id,
        na.taluka_id,
        na.city,
        na.qualification,
        na.reg_date_time,
        na.status,
        na.remarkforstatus,
        t.name as taluka_name,
        d.name as district_name
        from tb_new_applicant na 
        LEFT JOIN tb_taluka t ON na.taluka_id=t.id 
        LEFT JOIN tb_district d ON na.district_id=d.id
        where aadhar='$textboxValue'");
        return $query->result_array();
    }

    public function getCandidateDetailsByText($textboxValue)
    {
        $q = '';

        if (!empty($textboxValue)) {
            // Use parameterized queries to prevent SQL injection
            $this->db->where('aadhar', $textboxValue);
        }

        $this->db->select('tb_applicant.*, tb_reference.name as reference_name, tb_position.name, tb_district.name as district_name, tb_taluka.name as taluka_name, tb_recruitment_cell.name as eo_name');
        $this->db->join('tb_reference', 'tb_reference.id = tb_applicant.reference_id', 'left');
        $this->db->join('tb_position', 'tb_position.id = tb_applicant.position_id', 'left');
        $this->db->join('tb_district', 'tb_district.id = tb_applicant.district_id', 'left');
        $this->db->join('tb_taluka', 'tb_taluka.id = tb_applicant.taluka_id', 'left');
        $this->db->join('tb_recruitment_cell', 'tb_recruitment_cell.id = tb_applicant.eo_id', 'left');
        $this->db->order_by('tb_applicant.id', 'DESC');

        $query = $this->db->get('tb_applicant');

        return $query->result_array();
    }
}
