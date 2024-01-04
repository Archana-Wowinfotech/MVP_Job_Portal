<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('DataModel');
        $this->load->model('Applicant_Model');
        $this->load->helper('form');
        $this->load->library('session');
    }
    public function index()
    {
        
        // print_r($_SESSION); die();

        $this->load->view('login');
    }

    public function dashboard()
    {
        // Check if the user is logged in
        if ($this->session->userdata('Id') != '') {
            // Load counts for all applicants
            $data['applicantCount'] = $this->DataModel->getApplicantCount();
            $data['SelectedCount'] = $this->DataModel->getSelectedApplicantCount();
            $data['InprocessCount'] = $this->DataModel->getInprocessApplicantCount();
            $data['PendingCount'] = $this->DataModel->getPendingApplicantCount();
            $data['RejectedCount'] = $this->DataModel->getRejectedApplicantCount();
            $data['ReferredCount'] = $this->DataModel->getReferredApplicantCount();
    
            // Check the user role
            if ($this->session->userdata('Role') == 'education_officer') {
                // If the user is an education officer, load counts specific to that officer
                $eo_id = $this->session->userdata('Id');
                $data['applicantCountEO'] = $this->DataModel->getApplicantCountEO($eo_id);
                $data['SelectedCountEO'] = $this->DataModel->getSelectedApplicantCountEO($eo_id);
                $data['InprocessCountEO'] = $this->DataModel->getInprocessApplicantCountEO($eo_id);
                $data['PendingCountEO'] = $this->DataModel->getPendingApplicantCountEO($eo_id);
                $data['RejectedCountEO'] = $this->DataModel->getRejectedApplicantCountEO($eo_id);
            }
    
            // Load the dashboard view with the data
            $this->load->view('dashboard', $data);
        } else {
            // If the user is not logged in, redirect to the home page
            redirect('Home/index');
        }
    }
    
    public function dashboardForEO()
    {
        // echo $this->session->userdata('Id'); die();
        if ($this->session->userdata('Id') != '') {
           
        
          
            $this->load->view('dashboard',$data);
        } else {
            redirect('Home/index');
        }
    }

    public function save()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules("password", "password", "required");
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            $email = $this->input->post("email");
            $password = $this->input->post("password");
            // $role = $this->input->post("role");


            $this->load->model("DataModel");
            // $validate = $this->DataModel->savedata($email, $password, $role);
            $validate = $this->DataModel->savedata($email, $password);
            //echo $validate; //die();
            if ($validate == '') {
                $this->session->userdata('Id');
                $this->session->set_flashdata(
                    "success",
                    "You are successfully login"
                );
                redirect('Home/dashboard');
            } else {
                $this->session->set_flashdata("error", $validate);
                $this->load->view('login');
            }
        }
    }


    public function Logout()
    {
        $this->session->sess_destroy();
        redirect('Home/index');
    }
}
