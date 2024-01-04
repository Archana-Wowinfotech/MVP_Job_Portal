<?php
defined('BASEPATH') or exit('No direct script access allowed');
class DataModel extends CI_Model
{

            function savedata($email, $password)
            {
                $this->load->database();

                // Add the condition for status = Active
                $this->db->where('email', $email);
                $query = $this->db->get('tb_recruitment_cell');

                if ($query->num_rows() > 0) {
                    foreach ($query->result_array() as $row) {
                        $dbpassword = $row['password'];
                        $status = $row['status'];
                       $this->session->set_userdata($row);
                        if ($status == 'Active') {
                            if ($dbpassword == $password) {
                                $this->session->set_userdata('Id', $row['id']);
                                $this->session->set_userdata('Role', $row['role']);
                            } else {
                                return "Invalid password";
                            }
                        } else {
                            return "Account is deactivated";
                        }
                    }
                } else {
                    return "Invalid Email";
                }
            }

    // $dbrole = $row['role'];
    // if ($dbrole == $role) {
    //     $this->session->set_userdata('Id', $row['id']);
    //     // $this->session->set_userdata('Role', $row['role']);
    // } else {
    //     return "Invalid Role";
    // }
    // function savedata($email, $password, $role)



    public function getApplicantCount()
    {
        $query = $this->db->get('tb_applicant');
        return $query->result_array();
    }
  public function getApplicantCountEO($eo_id)
{
    $query = $this->db->query("SELECT * FROM tb_applicant 
                               WHERE (CASE WHEN assign_to = 'eo' THEN eo_id = '$eo_id' ELSE assign_to = 'all' END)");
    return $query->result_array();
}

    public function getSelectedApplicantCount()
    {
        $query = "SELECT COUNT(*) FROM tb_applicant WHERE status = 'Selected'";
        $result = $this->db->query($query)->row();

        return (int) $result->{'COUNT(*)'};
    }
    // public function getSelectedApplicantCountEO($eo_id)
    // {
    //     $query = "SELECT COUNT(*) FROM tb_applicant WHERE eo_id='$eo_id' AND status = 'Selected'";
    //     $result = $this->db->query($query)->row();

    //     return (int) $result->{'COUNT(*)'};
    // }


    public function getSelectedApplicantCountEO($eo_id)
{
    $query = "SELECT COUNT(*) as count FROM tb_applicant 
              WHERE (assign_to = 'eo' AND eo_id = '$eo_id' AND status = 'Selected') OR (assign_to = 'all' AND status = 'Selected')";
    
    $result = $this->db->query($query)->row();

    return (int) $result->count;
}

    public function getInprocessApplicantCount()
    {
        $query = "SELECT COUNT(*) FROM tb_applicant WHERE status = 'In_Process'";
        $result = $this->db->query($query)->row();

        return (int) $result->{'COUNT(*)'};
    }
    // public function getInprocessApplicantCountEO($eo_id)
    // {
    //     $query = "SELECT COUNT(*) FROM tb_applicant WHERE eo_id='$eo_id' AND status = 'In_Process'";
    //     $result = $this->db->query($query)->row();

    //     return (int) $result->{'COUNT(*)'};
    // }
    public function getInprocessApplicantCountEO($eo_id)
{
    $query = "SELECT COUNT(*) as count FROM tb_applicant 
              WHERE (assign_to = 'eo' AND eo_id = '$eo_id' AND status = 'In_Process') OR (assign_to = 'all' AND status = 'In_Process')";
    
    $result = $this->db->query($query)->row();

    return (int) $result->count;
}


    public function getPendingApplicantCount()
    {
        $query = "SELECT COUNT(*) FROM tb_applicant WHERE status = 'Pending'";
        $result = $this->db->query($query)->row();
        return  (int)  $result->{'COUNT(*)'};
    }
    // public function getPendingApplicantCountEO($eo_id)
    // {
    //     $query = "SELECT COUNT(*) FROM tb_applicant WHERE eo_id='$eo_id' AND status = 'Pending'";
    //     $result = $this->db->query($query)->row();
    //     return  (int)  $result->{'COUNT(*)'};
    // }
    public function getPendingApplicantCountEO($eo_id)
{
    $query = "SELECT COUNT(*) as count FROM tb_applicant 
              WHERE (assign_to = 'eo' AND eo_id = '$eo_id' AND status = 'Pending') OR (assign_to = 'all' AND status = 'Pending')";
    
    $result = $this->db->query($query)->row();

    return (int) $result->count;
}

    public function getRejectedApplicantCount()
    {
        $query = "SELECT COUNT(*) FROM tb_applicant WHERE status  = 'Rejected'";
        $result = $this->db->query($query)->row();
        return (int) $result->{'COUNT(*)'};
    }
    // public function getRejectedApplicantCountEO($eo_id)
    // {
    //     $query = "SELECT COUNT(*) FROM tb_applicant WHERE eo_id='$eo_id' AND status  = 'Rejected'";
    //     $result = $this->db->query($query)->row();
    //     return (int) $result->{'COUNT(*)'};
    // }

    public function getRejectedApplicantCountEO($eo_id)
{
    $query = "SELECT COUNT(*) as count FROM tb_applicant 
              WHERE (assign_to = 'eo' AND eo_id = '$eo_id' AND status = 'Rejected') OR (assign_to = 'all' AND status = 'Rejected')";
    
    $result = $this->db->query($query)->row();

    return (int) $result->count;
}

    public function getReferredApplicantCount()
    {
        $query = "SELECT COUNT(*) FROM tb_applicant WHERE status  = 'Refered_to'";
        $result = $this->db->query($query)->row();
        return (int) $result->{'COUNT(*)'};
    }



    public function getReferenceCount()
    {
        $query = $this->db->get('tb_reference');
        return $query->result_array();
    }
}
