<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ApplicantList extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Applicant_Model');
        $this->load->helper('form');
    }
    public function index($statuses)
    {

        if ($this->session->userdata('Id') != '') {

           $eo_id= $this->session->userdata('Id');

           //print_r($eo_id); die();

            $data['position'] =  $this->Applicant_Model->getAllPosition();
            $data['reference'] =  $this->Applicant_Model->getAllReference();
            $data['institute'] =  $this->Applicant_Model->getAllInstitute();
            $data['applicantlist'] =  $this->Applicant_Model->getAllApplicant($eo_id);

    


            if ($statuses == 'Pending') {
                $data['applicantlist'] =  $this->Applicant_Model->getAllApplicantFilterEO($statuses,$eo_id);

            } elseif ($statuses == 'Rejected') {
                $data['applicantlist'] =  $this->Applicant_Model->getAllApplicantFilterEO($statuses,$eo_id);

            }elseif ($statuses == 'Selected') {
                $data['applicantlist'] =  $this->Applicant_Model->getAllApplicantFilterEO($statuses,$eo_id);

            } elseif ($statuses == 'In_Process') {
                $data['applicantlist'] =  $this->Applicant_Model->getAllApplicantFilterEO($statuses,$eo_id);
             
            } elseif ($statuses == 'Refered_to') {
                $data['applicantlist'] =  $this->Applicant_Model->getAllApplicantFilterEO($statuses,$eo_id);


            } else{ 

                $data['applicantlist'] =  $this->Applicant_Model->getAllApplicantByEO($eo_id);
            }

            $this->load->view('eo_applicant_list', $data);
        } else {
            redirect('Home/index');
        }
    }
    public function getApplicantForSarchitnis($statuses)
    {

        if ($this->session->userdata('Id') != '') {

          

           //print_r($eo_id); die();

            $data['position'] =  $this->Applicant_Model->getAllPosition();
            $data['reference'] =  $this->Applicant_Model->getAllReference();
            $data['institute'] =  $this->Applicant_Model->getAllInstitute();
            $data['applicantlist'] =  $this->Applicant_Model->getAllApplicantSarchitnis();




            if ($statuses == 'Pending') {
                $data['applicantlist'] =  $this->Applicant_Model->getAllApplicantFilterSarchitnis($statuses);

            } elseif ($statuses == 'Rejected') {
                $data['applicantlist'] =  $this->Applicant_Model->getAllApplicantFilterSarchitnis($statuses);

            }elseif ($statuses == 'Selected') {
                $data['applicantlist'] =  $this->Applicant_Model->getAllApplicantFilterSarchitnis($statuses);

            } elseif ($statuses == 'In_Process') {
                $data['applicantlist'] =  $this->Applicant_Model->getAllApplicantFilterSarchitnis($statuses);
            
            } elseif ($statuses == 'Refered_to') {
                $data['applicantlist'] =  $this->Applicant_Model->getAllApplicantFilterSarchitnis($statuses);


            } else{ 

                $data['applicantlist'] =  $this->Applicant_Model->getAllApplicantSarchitnis();
            }

            $this->load->view('applicantlistforSarchitnis', $data);
        } else {
            redirect('Home/index');
        }
    }

    
    public function updateStatusRemark()
    {
        $this->load->model('Applicant_model');

        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $this->Applicant_model->updateStatus($id, $status);
        // redirect('ApplicantList/getApplicantForSarchitnis/All');
        redirect($_SERVER['HTTP_REFERER']);
    }
      
    public function updateStatusRemarkEO()
    {
        $this->load->model('Applicant_model');

        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $this->Applicant_model->updateStatus($id, $status);
        // redirect('ApplicantList/index/All');
        redirect($_SERVER['HTTP_REFERER']);
    }

     
   
}
