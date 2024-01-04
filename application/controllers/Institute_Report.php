<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Institute_Report extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Applicant_Model');
        $this->load->model('Report_Model');
        $this->load->helper('form');
    }
    public function index()
    {

        if ($this->session->userdata('Id') != '') {

            $data['position'] =  $this->Applicant_Model->getAllPosition();
            $data['reference'] =  $this->Applicant_Model->getAllReference();
            $data['institute'] =  $this->Applicant_Model->getAllInstitute();
            //$data['applicantlist'] =  $this->Applicant_Model->getAllApplicant();

            $data['getProfessionalInstitute'] =  $this->Applicant_Model->getAllProfessionalInstitute();

            $this->load->view('institute_report', $data);
        } else {
            redirect('Home/index');
        }
    }

    public function Reference_report()
    {

        if ($this->session->userdata('Id') != '') {

            $data['position'] =  $this->Applicant_Model->getAllPosition();
            $data['reference'] =  $this->Applicant_Model->getAllReference();
            $data['institute'] =  $this->Applicant_Model->getAllInstitute();
            $data['applicantlist'] =  $this->Applicant_Model->getAllApplicantForReferenceReport();

            $this->load->view('reference_report', $data);
        } else {
            redirect('Home/index');
        }
    }

    public function Eo_report()
    {

        if ($this->session->userdata('Id') != '') {
            

            $data['position'] =  $this->Applicant_Model->getAllPosition();
            $data['reference'] =  $this->Applicant_Model->getAllReference();
            $data['institute'] =  $this->Applicant_Model->getAllInstitute();
            $data['applicantlist'] =  $this->Applicant_Model->getAllApplicantForEOReport();

            $this->load->view('eo_report', $data);
        } else {
            redirect('Home/index');
        }
    }
 
   
}
