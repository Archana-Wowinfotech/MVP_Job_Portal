<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Certificate extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Applicant_Model');
        $this->load->helper('form');
    }
    public function index($id,$candidate_id)
    {
        $data['applicant_id'] = $id;
        $data['candidate_id'] = $candidate_id;
        $data['certificate'] =  $this->Applicant_Model->getAllCertificate($id);
        $this->load->view('certificate', $data);
    }
    public function Certificate()
    {

        $applicant_id   = $this->input->post('applicant_id');
        $type   = $this->input->post('type');
        $otherCertificate   = $this->input->post('otherCertificate');
        $config['upload_path'] = 'upload/product/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '*';
        $upload_data;

        $this->load->library('upload', $config);


        // Upload the first file (resume)
        $config['upload_path'] = './upload/resume/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '*';
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('resume')) {
            $resume = '';  // Handle the case where upload fails
        } else {
            $upload_data = $this->upload->data();
            // Get the uploaded file name
            $resume = 'upload/resume/' . $upload_data['file_name'];
        }


        $data = array(

            'applicant_id' => $applicant_id,
            'resume' => $resume,
            'type' => $type,
            'otherCertificate' => $otherCertificate
        );

        //  print_r($data);   die();
        $result = $this->Applicant_Model->saveCertificate($data);
        if ($result == 1) {
            echo $this->session->set_flashdata('success', 'Record insert successfully');
            // redirect('certificate/' . $applicant_id);
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            echo $this->session->set_flashdata('error', 'Record not inserted');
            redirect('certificate/' . $applicant_id);
        }
    }

    public function UploadCertificateImages()
    {


        $id   = $this->input->post('id');
        $applicant_id = $this->input->post('applicant_id');
        $type = $this->input->post('type');
        $otherCertificate   = $this->input->post('otherCertificate');
        $this->load->library('upload');

        // Upload the first file (resume)
        $config['upload_path'] = './upload/resume/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '*';
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('resume')) {
            $resume = '';  // Handle the case where upload fails
        } else {
            $upload_data = $this->upload->data();
            // Get the uploaded file name
            $resume = 'upload/resume/' . $upload_data['file_name'];
        }



        $data = array(
            'id' => $id,
            'applicant_id' => $applicant_id,
            'resume' => $resume,
            'otherCertificate' => $otherCertificate,
            'type' => $type
        );


        $data['type'] = $type; //withaut update image but display image as it is in admin pannel
        if ($type == "") {
            unset($data['type']);
        }
        $data['resume'] = $resume; //withaut update image but display image as it is in admin pannel
        if ($resume == "") {
            unset($data['resume']);
        }


        //print_r($data);   die();
        $result = $this->Applicant_Model->updateApplicantCertificate($data, $id);
        //print_r($result); die();
        if ($result == 1) {
            echo $this->session->set_flashdata('success', 'Record insert successfully');
            redirect('certificate/' . $applicant_id);
        } else {
            echo $this->session->set_flashdata('error', 'Record not inserted');
            redirect('certificate/' . $applicant_id);
        }
    }
}
