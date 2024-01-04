<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Position extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Position_Model');
        $this->load->model('Applicant_Model');
        $this->load->helper('form');
    }
    public function index()
    {

        if ($this->session->userdata('Id') != '') {
            $data['education'] =  $this->Applicant_Model->getAllEducationOfficer();
            $data['positionlist'] =  $this->Position_Model->getAllPosition();
            $data['req_source'] = $this->Position_Model->getRequirementSource();
             
            $this->load->view('position', $data);
        } else {
            redirect('Home/index');
        }
    }
    public function positionlist()
    { 
        $data['positionlist'] =  $this->Position_Model->getAllPosition();
        $this->load->view('positionlist.php',$data);
    }

    public function savePosition()
    {
        if ($this->session->userdata('Id') != '') {
            $id = $this->input->post('id');
            $eo_id = $this->input->post('eo_id');
            $institute_name = $this->input->post('institute_name');
            $positions = $this->input->post('positions');
            $name = $this->input->post('name');
            $timeline = $this->input->post('timeline');
            $end_date = $this->input->post('end_date');
            $requirement_source = $this->input->post('requirement_source');
            $specialization = $this->input->post('specialization');
            $cast_category = $this->input->post('cast_category');
            $assign_to = $this->input->post('assign_to');

           
            $data = array(
                'id' => $id,
                'eo_id' => $eo_id,
                'name' => $name,
                'institute_name' => $institute_name,
                'positions' => $positions,
                'timeline' => $timeline,
                'end_date' => $end_date,
                'requirement_source' => $requirement_source,
                'specialization' => $specialization,
                'cast_category' => $cast_category,
                'assign_to' => $assign_to
            );

            // print_r($data);   die();
            $result = $this->Position_Model->save($data);
            if ($result == 1) {
                echo $this->session->set_flashdata('success', 'Record insert successfully');
                redirect('Position/index');
            } else {
                echo $this->session->set_flashdata('error', 'Record not inserted');
                redirect('Position/index');
            }
        } else {
            redirect('Home/index');
        }
    }


    public function updatePosition()
    {
        if ($this->session->userdata('Id') != '') {
            $id = $this->input->post('id');
            $eo_id = $this->input->post('eo_id');
            $name = $this->input->post('name');
            $institute_name = $this->input->post('institute_name');
            $positions = $this->input->post('positions');
            $timeline = $this->input->post('timeline');
            $end_date = $this->input->post('end_date');
            $requirement_source = $this->input->post('requirement_source');
            $specialization = $this->input->post('specialization');
            $cast_category = $this->input->post('cast_category');
            $assign_to = $this->input->post('assign_to');
           

            $data = array(
           
                'eo_id' => $eo_id,
                'name' => $name,
                'institute_name' => $institute_name,
                'positions' => $positions,
                'timeline' => $timeline,
                'end_date' => $end_date,
                'requirement_source' => $requirement_source,
                'specialization' => $specialization,
                'cast_category' => $cast_category,
                'assign_to' => $assign_to
            );

            $result = $this->Position_Model->updatePositionDetails($data, $id);
            $this->session->set_flashdata('success', 'Data Updated Successfully');
            redirect('Position/index');
        } else {
            redirect('Home/index');
        }
    }
    public function status_update($id)
    {
        if ($this->session->userdata('Id') != '') {
            $data['result'] = $this->Position_Model->getStatusDetails($id);
            foreach ($data['result'] as $row) {
                $statusval = $row['status'];
            }

            $status = $statusval == 'Active' ? 'Deactive' : 'Active';
            $data = array(
                'status' => $status
            );

            $result = $this->Position_Model->updatePositionDetails($data, $id);
            if ($result > 0) {
                $this->session->set_flashdata('success', 'Status Updated Successfully');
                redirect('Position/index');
            }
        } else {
            redirect('Home/index');
        }
    }
}
