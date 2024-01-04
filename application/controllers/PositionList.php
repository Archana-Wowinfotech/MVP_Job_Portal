<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PositionList extends CI_Controller
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

            $eo_id= $this->session->userdata('Id');
            // print_r($eo_id); die();
            $data['positionlist'] =  $this->Position_Model->getAllPositionForEO($eo_id);

            $this->load->view('positionlist', $data);
        } else {
            redirect('Home/index');
        }
    }
    public function PositionForSarchitnis()
    {

        if ($this->session->userdata('Id') != '') {

       
            $data['positionlist'] =  $this->Position_Model->getAllPosition();

            $this->load->view('positionlist', $data);
        } else {
            redirect('Home/index');
        }
    }
     
   
}
