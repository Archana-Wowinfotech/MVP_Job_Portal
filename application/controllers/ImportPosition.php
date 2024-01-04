<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once(APPPATH . 'libraries/libraries/PHPExcel.php');

class ImportPosition extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Report_Model');
        $this->load->model('Position_Model');
        $this->load->model('Applicant_Model');
        $this->load->helper('form');
        
    }

    public function Position()
    { 
        $this->load->view('positionlist.php');
    }
    function ImportPosition()
    {
        
        if (isset($_FILES["file"]["name"])) {
            $path = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for ($row = 2; $row <= $highestRow; $row++) {
                    // $s_numbers = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $name = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                 echo $s_numbers;
                 echo $name;
                    $data2 = array(
                        'name' => $name
                       
                    );
                   
        echo "<pre>";
        print_r($data2);die();
                    $r =  $this->Positon_Model->insertPosition($data2);
                }
            }
            redirect('ImportPosition/Position');
        }
    }
}
