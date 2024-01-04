<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Report_Model');
        $this->load->model('Applicant_Model');
        $this->load->helper('form');
    }
	public function institute_details($id)
	{
        $d1['gettype'] = $this -> Report_Model -> getInstitute_type($id);
        if(count($d1['gettype']) > 0 ){
            foreach($d1['gettype'] as $k1){
                $institute_name = $k1['institute_name'];
                $college_name = $k1['college_name'];
            }
        }else{
            $institute_name = "";
            $college_name = "";
        }
    //   $id=$_GET['page'];
        $data['institute_selected_applicant'] = $this->Report_Model->instituteSelectedApplicant($institute_name,$college_name);
        $data['institute_inprocess_applicant'] = $this->Report_Model->instituteInprocessApplicant($institute_name,$college_name);
        $data['institute_pending_applicant'] = $this->Report_Model->institutePendingApplicant($institute_name,$college_name);
        $data['institute_rejected_applicant'] = $this->Report_Model->instituteRejectedApplicant($institute_name,$college_name);
        $data['institute_applicant'] =  $this->Report_Model->getApplicantAllStatus($institute_name,$college_name);
      

        $data['institute_id']=$id;
        // print_r($data['institute_applicant']); die();
		$this->load->view('all_institute_report',$data);
	}

    public function Reference_details($id)
    {
       // print_r($id); die();
        $data['reference_selected_applicant'] = $this->Report_Model->getSelectedReference($id);
        $data['reference_inprocess_applicant'] = $this->Report_Model->getInprocessReference($id);
        $data['reference_pending_applicant'] = $this->Report_Model->getPendingReference($id);
        $data['rejected_pending_applicant'] = $this->Report_Model->getRejectedReference($id);
        $data['reference_report'] =  $this->Report_Model->getReferenceAllStatus($id);

        $data['reference_id']=$id;

        $this->load->view('all_reference_report',$data);
    }

    public function educationOfficeReport($id)
    {
    //print_r($id); die();
        // $data['eo_applicant'] = $this->Report_Model->getEOAllStatus($id);
        $data['eo_pending_applicant'] = $this->Report_Model->getPendingEO($id);
        $data['eo_inprocess_applicant'] = $this->Report_Model->getInprocessEO($id);
        $data['eo_selected_applicant'] =  $this->Report_Model->getSelcetedEO($id);
        $data['eo_rejected_applicant'] = $this->Report_Model->getRejectedEO($id);
        $data['education_officer_report'] = $this->Report_Model->getAllStatusEO($id);

        $data['eo_id']=$id;
        $this->load->view('all_eo_report',$data);
    }

    public function toExcel($id) {
        $d1['gettype'] = $this -> Report_Model -> getInstitute_type($id);
        if(count($d1['gettype']) > 0 ){
            foreach($d1['gettype'] as $k1){
                $institute_name = $k1['institute_name'];
                $college_name = $k1['college_name'];
            }
        }else{
            $institute_name = "";
            $college_name = "";
        }
        // Load the PHPExcel library
      //  $institute_id_from_url = $this->uri->segment(2);
        $this->load->library('PHPExcel');
        // Create a new PHPExcel object
        $objPHPExcel = new PHPExcel();
        // Set the default sheet index to 0
        $objPHPExcel->setActiveSheetIndex(0);
        // Fetch data from your model or any other source

        $data = $this->Report_Model->getApplicantAllStatus($institute_name,$college_name);
      // print_r($data); die();
        // Set the column headers
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'NAME OF APPLICANT');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'CONTACT NO');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'VILLAGE');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'INSTITUTE');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'POSITION');
        $objPHPExcel->getActiveSheet()->setCellValue('F1', 'EDUCATION OFFICER');
        // $objPHPExcel->getActiveSheet()->setCellValue('G1', 'REFERED BY');
        $objPHPExcel->getActiveSheet()->setCellValue('H1', 'STATUS');
        $objPHPExcel->getActiveSheet()->setCellValue('I1', 'DATE');
        // Add more columns as needed
        // Set the data rows
        $row = 2; // Start from row 2
        foreach ($data as $item) {
           //  print_r($item); die();
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $row, $item['first_name'] . ' ' . $item['last_name']);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $item['contact_no']);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $item['city']);

            $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $item['institute_id']);
            
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $item['position_name']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $item['eo_name']);
            // $objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $item['eo_name']);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $row, $item['status']);
        
            $this->load->helper('date');
        
            $originalDate = $item['reg_date_time'];
            $newDate = date("d-m-Y", strtotime($originalDate));
        
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $row, $newDate);
        
            // Add more columns as needed
            $row++;
        }
        
        // Set the headers for the Excel file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Institute_Report.csv"');
        header('Cache-Control: max-age=0');
        // Create the PHPExcel Writer object and save the file to the browser
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
    }

    public function toExcelReference($id) {
        // Load the PHPExcel library
        $this->load->library('PHPExcel');
        // Create a new PHPExcel object
        $objPHPExcel = new PHPExcel();
        // Set the default sheet index to 0
        $objPHPExcel->setActiveSheetIndex(0);
        // Fetch data from your model or any other source

        $data = $this->Report_Model->getReferenceAllStatus($id);
    //    print_r($data); die();
        // Set the column headers
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'REFERENCE');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'NAME OF REFERENCE');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'NAME OF APPLICANT');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'CONTACT NUMBER');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'AADHAR NUMBER');
        $objPHPExcel->getActiveSheet()->setCellValue('F1', 'STATUS');
        $objPHPExcel->getActiveSheet()->setCellValue('G1', 'DATE');
        // Add more columns as needed
        // Set the data rows
        $row = 2; // Start from row 2
        foreach ($data as $item) {
         //print_r($item); die();
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $row, $item['reference_name']);
            
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $item['other_reference_name']);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $item['first_name'] . ' ' . $item['last_name']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $item['contact_no']);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $item['aadhar']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $item['status']);
        
            $this->load->helper('date');
        
            $originalDate = $item['reg_date_time'];
            $newDate = date("d-m-Y", strtotime($originalDate));
        
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $row, $newDate);
        
            // Add more columns as needed
            $row++;
        }
        
        // Set the headers for the Excel file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Institute_Report.csv"');
        header('Cache-Control: max-age=0');
        // Create the PHPExcel Writer object and save the file to the browser
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
    }

    public function toExcelEOReport($id)
     {
        // Load the PHPExcel library
        $this->load->library('PHPExcel');
        // Create a new PHPExcel object
        $objPHPExcel = new PHPExcel();
        // Set the default sheet index to 0
        $objPHPExcel->setActiveSheetIndex(0);
        // Fetch data from your model or any other source

        $data = $this->Report_Model->getAllStatusEO($id);
       
        // Set the column headers
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'EDUCATION OFFICER NAME');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'NAME OF APPLICANT');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'CONTACT NUMBER');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'AADHAR NUMBER');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'REMARK');
        $objPHPExcel->getActiveSheet()->setCellValue('F1', 'STATUS');
        $objPHPExcel->getActiveSheet()->setCellValue('G1', 'DATE');
        // Add more columns as needed
        // Set the data rows
        $row = 2; // Start from row 2
        foreach ($data as $item) {
            // print_r($item); die();
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $row, $item['eo_name']);
            
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $item['first_name'] . ' ' . $item['last_name']);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $item['contact_no']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $item['aadhar']);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $item['remark']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $item['status']);
        
            $this->load->helper('date');
        
            $originalDate = $item['reg_date_time'];
            $newDate = date("d-m-Y", strtotime($originalDate));
        
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $row, $newDate);
        
            // Add more columns as needed
            $row++;
        }
        
        // Set the headers for the Excel file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Institute_Report.csv"');
        header('Cache-Control: max-age=0');
        // Create the PHPExcel Writer object and save the file to the browser
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
    }


}
