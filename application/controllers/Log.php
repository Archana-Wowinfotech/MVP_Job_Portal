<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Log extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Log_Model');
        $this->load->model('Applicant_Model');
        $this->load->helper('form');
    }
    public function index()
    {
        if ($this->session->userdata('Id') != '') {
            $data['log_records'] =  $this->Log_Model->getAllLogRecords();
                     
            $this->load->view('log', $data);
        } else {
            redirect('Home/index');
        }
    }
    public function LogForApplicant()
    {
        if ($this->session->userdata('Id') != '') {
            $data['log_records'] =  $this->Log_Model->getApplicantLogRecords();
                     
            $this->load->view('log', $data);
        } else {
            redirect('Home/index');
        }
    }

    public function applicant_log($applicant_id)
    {
        $data['log_records'] =  $this->Log_Model->getAllApplicantLogRecords($applicant_id);
        $this->load->view('applicant_log',$data);
    }
}
