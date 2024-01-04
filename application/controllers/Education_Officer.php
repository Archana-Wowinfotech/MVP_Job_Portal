<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Education_Officer extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Education_Officer_Model');
        $this->load->model('Applicant_Model');
        $this->load->helper('form');
    }
    public function index()
    {

        if ($this->session->userdata('Id') != '') {
            $data['position'] =  $this->Education_Officer_Model->getAllPosition();
            $data['institute'] =  $this->Education_Officer_Model->getAllInstitute();
            $data['eolist'] =  $this->Education_Officer_Model->getAllEO();

            $this->load->view('education_officer', $data);
        } else {
            redirect('Home/index');
        }
    }

    public function saveEO()
    {
        if ($this->session->userdata('Id') != '') {



            $id = $this->input->post('id');
            // $institute_id = $this->input->post('institute_id');
            $name = $this->input->post('name');
            $contact_no = $this->input->post('contact_no');
            $email = $this->input->post('email');
            $address = $this->input->post('address');

            //$username = $this->input->post('username');
            $password = $this->input->post('password');
            $role = $this->input->post('role');


            $data = array(
                'id' => $id,
                //'institute_id' => $institute_id,
                'name' => $name,
                'contact_no' => $contact_no,
                'email' => $email,
                'address' => $address,

                //'username' => $username,
                'password' => $password,
                'role' => 'education_officer'

            );

            $result = $this->Education_Officer_Model->save($data);
            if ($result == 1) {
                echo $this->session->set_flashdata('success', 'Record insert successfully');
                redirect('Education_Officer/index');
            } else {
                echo $this->session->set_flashdata('error', 'Record not inserted');
                redirect('Education_Officer/index');
            }
        } else {
            redirect('Home/index');
        }
    }

    public function checkEmailExists()
    {
        $email = $this->input->post('email');
        $exists = $this->Education_Officer_Model->checkEmailExists($email);

        echo json_encode(array('exists' => $exists));
    }



    public function updateEO()
    {
        if ($this->session->userdata('Id') != '') {
            $id = $this->input->post('id');
            // $institute_id = $this->input->post('institute_id');
            $name = $this->input->post('name');
            $contact_no = $this->input->post('contact_no');
            $email = $this->input->post('email');
            $address = $this->input->post('address');
            $password = $this->input->post('password');
            $role = $this->input->post('role');



            $data = array(

                'id' => $id,
                //'institute_id' => $institute_id,
                'name' => $name,
                'contact_no' => $contact_no,
                'email' => $email,
                'address' => $address,
                'password' => $password,
                'role' => 'education_officer'
            );

            $result = $this->Education_Officer_Model->updateEODetails($data, $id);
            $this->session->set_flashdata('success', 'Data Updated Successfully');
            redirect('Education_Officer/index');
        } else {
            redirect('Home/index');
        }
    }
    public function status_update($id)
    {
        if ($this->session->userdata('Id') != '') {
            $data['result'] = $this->Education_Officer_Model->getStatusDetails($id);
            foreach ($data['result'] as $row) {
                $statusval = $row['status'];
            }

            $status = $statusval == 'Active' ? 'Deactive' : 'Active';
            $data = array(
                'status' => $status
            );

            $result = $this->Education_Officer_Model->updateEODetails($data, $id);
            if ($result > 0) {
                $this->session->set_flashdata('success', 'Status Updated Successfully');
                redirect('Education_Officer/index');
            }
        } else {
            redirect('Home/index');
        }
    }
}
