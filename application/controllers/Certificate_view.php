<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Certificate_view extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Applicant_Model');
        $this->load->helper('form');
    }
    public function index($id)
    {
            $data['applicant_id'] = $id;
            $data['certificate'] =  $this->Applicant_Model->getAllCertificate($id);
            $this->load->view('certificate_view', $data);  
    }
}
?>