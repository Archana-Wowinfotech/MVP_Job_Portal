<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reference extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Reference_Model');
        $this->load->helper('form');
    }
    public function index()
    {

        if ($this->session->userdata('Id') != '') {
            $data['referencelist'] =  $this->Reference_Model->getAllReference();
            
            $this->load->view('reference', $data);
        } else {
            redirect('Home/index');
        }
    }

    public function saveReference()
    {
        if ($this->session->userdata('Id') != '') {
            $id = $this->input->post('id');
            $name = $this->input->post('name');

           
            $data = array(
                'id' => $id,
                'name' => $name

            );

            // print_r($data);   die();
            $result = $this->Reference_Model->save($data);
            if ($result == 1) {
                echo $this->session->set_flashdata('success', 'Record insert successfully');
                redirect('Reference/index');
            } else {
                echo $this->session->set_flashdata('error', 'Record not inserted');
                redirect('Reference/index');
            }
        } else {
            redirect('Home/index');
        }
    }


    // public function updatePosition()
    // {
    //     if ($this->session->userdata('Id') != '') {
    //         $id = $this->input->post('id');
    //         $name = $this->input->post('name');
           

    //         $data = array(
           
    //             'name' => $name
    //         );

    //         $result = $this->Position_Model->updatePositionDetails($data, $id);
    //         $this->session->set_flashdata('success', 'Data Updated Successfully');
    //         redirect('Position/index');
    //     } else {
    //         redirect('Home/index');
    //     }
    // }
    public function status_update($id)
    {
        if ($this->session->userdata('Id') != '') {
            $data['result'] = $this->Reference_Model->getStatusDetails($id);
            foreach ($data['result'] as $row) {
                $statusval = $row['status'];
            }

            $status = $statusval == 'Active' ? 'Deactive' : 'Active';
            $data = array(
                'status' => $status
            );

            $result = $this->Reference_Model->updateReferenceDetails($data, $id);
            if ($result > 0) {
                $this->session->set_flashdata('success', 'Status Updated Successfully');
                redirect('Reference/index');
            }
        } else {
            redirect('Home/index');
        }
    }
}
