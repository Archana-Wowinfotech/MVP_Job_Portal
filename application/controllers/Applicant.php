<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Applicant extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Applicant_Model');
        $this->load->helper('form');
    }

    public function getallApplicant()
    {
        $data['district'] =  $this->Applicant_Model->getAllDistrict();
        $data['taluka'] =  $this->Applicant_Model->getAllTaluka();
        $data['applicantlist'] =  $this->Applicant_Model->getAllApplicantList();
        $this->load->view('applicant_list', $data);
    }

    public function saveApplicantBasicDetail()
    {
        if ($this->session->userdata('Id') != '') {
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $contact_no = $this->input->post('contact_no');
            $aadhar = $this->input->post('aadhar');
            $email_id = $this->input->post('email_id');
            $district_id = $this->input->post('district_id');
            $taluka_id = $this->input->post('taluka_id');
            $city = $this->input->post('city');
            $RCC_id = $this->session->userdata('Id');

            $d2['adharinfo'] = $this->Applicant_Model->checkAdharAlreadyExists($aadhar);
            if (count($d2['adharinfo']) > 0) {
                echo $this->session->set_flashdata('error', 'Aadhar card number already exists.');
                redirect('Applicant/getallApplicant');
            } else {

                $data = array(
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'contact_no' => $contact_no,
                    'aadhar' => $aadhar,
                    'email_id' => $email_id,
                    'district_id' => $district_id,
                    'taluka_id' => $taluka_id,
                    'city' => $city,
                    'RCC_id' => $RCC_id
                );

                $d1 = $this->Applicant_Model->saveApplicantBasicDetail($data);
                if ($d1 == true) {
                    $currentDate = date('d-m-Y');
                    $r1 = $this->db->query("select id from tb_new_applicant order by id desc limit 1");
                    if (count($r1->result_array()) > 0) {
                        foreach ($r1->result_array() as $key) {
                            $can_id = $key['id'];
                            $RCC_ID = $this->session->userdata('Id');   
                        }

                        $data1 = array(
                            'candidate_id' => $can_id,
                            'log_remark' => 'New candidate register.',
                            'type' => 'candidate',
                            'rcc_id' => $RCC_ID,
                            'created_date' => $currentDate
                        );

                        $d3 = $this->Applicant_Model->savelogrcc($data1);
                    } else {
                    }
                }

                echo $this->session->set_flashdata('success', 'Record insert successfully');
                redirect('Applicant/getallApplicant');
            }
        }
    }
    public function UpdateApplicantBasicDetail()
    {
        if ($this->session->userdata('Id') != '') {
            $id = $this->input->post('id');
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $contact_no = $this->input->post('contact_no');
            $aadhar = $this->input->post('aadhar');
            $email_id = $this->input->post('email_id');
            $district_id = $this->input->post('district_id');
            $taluka_id = $this->input->post('taluka_id');
            $city = $this->input->post('city');
            $RCC_id = $this->session->userdata('Id');

            $data = array(
                'id' => $id,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'contact_no' => $contact_no,
                'aadhar' => $aadhar,
                'email_id' => $email_id,
                'district_id' => $district_id,
                'taluka_id' => $taluka_id,
                'city' => $city,
                'RCC_id' => $RCC_id
            );

            $d1 = $this->Applicant_Model->UpdateApplicantBasicDetail($id, $data);

            if ($d1 == true) {
                $currentDate = date('d-m-Y');
                $r1 = $this->db->query("select id from tb_new_applicant order by id desc limit 1");

                if (count($r1->result_array()) > 0) {
                    foreach ($r1->result_array() as $key) {
                        $can_id = $key['id'];
                        $RCC_ID = $this->session->userdata('Id');
                    }

                    $data1 = array(
                        'candidate_id' => $can_id,
                        'log_remark' => 'Update Candidate.',
                        'type' => 'candidate',
                        'rcc_id' => $RCC_ID,
                        'updated_date' => $currentDate
                    );

                    $d3 = $this->Applicant_Model->savelogrcc($data1);
                } else {
                    // Handle the case when there are no results
                }
            }

            echo $this->session->set_flashdata('success', 'Record insert successfully');
            redirect('Applicant/getallApplicant');
        }
    }

    public function index($statuses, $candidate_id)
    {
        // echo $this->session->userdata('Id'); die();

        if ($this->session->userdata('Id') != '') {


            // $status = $this->input->post('status');
            $data['education'] =  $this->Applicant_Model->getAllEducationOfficer();
            $data['position'] =  $this->Applicant_Model->getAllPosition();
            $data['reference'] =  $this->Applicant_Model->getAllReference();
            $data['institute'] =  $this->Applicant_Model->getAllInstitute();
            $data['district'] =  $this->Applicant_Model->getAllDistrict();
            $data['taluka'] =  $this->Applicant_Model->getAllTaluka();


            if ($statuses == 'Pending') {
                $data['applicantlist'] =  $this->Applicant_Model->getAllApplicantFilter($statuses, $candidate_id);
            } elseif ($statuses == 'Rejected') {
                $data['applicantlist'] =  $this->Applicant_Model->getAllApplicantFilter($statuses, $candidate_id);
            } elseif ($statuses == 'Selected') {
                $data['applicantlist'] =  $this->Applicant_Model->getAllApplicantFilter($statuses, $candidate_id);
            } elseif ($statuses == 'In_Process') {
                $data['applicantlist'] =  $this->Applicant_Model->getAllApplicantFilter($statuses, $candidate_id);
            } else {

                $data['applicantlist'] =  $this->Applicant_Model->getAllApplicant($candidate_id);
            }
            // } else{
            //     $data['applicantlist'] =  $this->Applicant_Model->getAllApplicantFilter($statuses);
            // }

            $this->load->view('applicant', $data);
        } else {
            redirect('Home/index');
        }
    }


    public function getApplicantByStatus($statuses)
    {
        // echo $this->session->userdata('Id'); die();

        if ($this->session->userdata('Id') != '') {


            // $status = $this->input->post('status');
            $data['education'] =  $this->Applicant_Model->getAllEducationOfficer();
            $data['position'] =  $this->Applicant_Model->getAllPosition();
            $data['reference'] =  $this->Applicant_Model->getAllReference();
            $data['institute'] =  $this->Applicant_Model->getAllInstitute();
            $data['district'] =  $this->Applicant_Model->getAllDistrict();
            $data['taluka'] =  $this->Applicant_Model->getAllTaluka();


            if ($statuses == 'Pending') {
                $data['applicantlist'] =  $this->Applicant_Model->getAllApplicantFilter1($statuses);
                $this->load->view('applicantlist', $data);
            } elseif ($statuses == 'Rejected') {
                $data['applicantlist'] =  $this->Applicant_Model->getAllApplicantFilter1($statuses);
                $this->load->view('applicantlist', $data);
            } elseif ($statuses == 'Selected') {
                $data['applicantlist'] =  $this->Applicant_Model->getAllApplicantFilter1($statuses);
                $this->load->view('applicantlist', $data);
            } elseif ($statuses == 'In_Process') {
                $data['applicantlist'] =  $this->Applicant_Model->getAllApplicantFilter1($statuses);
                $this->load->view('applicantlist', $data);
            } elseif ($statuses == 'Refered_to') {
                $data['applicantlist'] =  $this->Applicant_Model->getAllApplicantFilter1($statuses);
                $this->load->view('applicantlist', $data);
            } else {

                $data['applicantlist'] =  $this->Applicant_Model->getAllApplicant1();
                $this->load->view('add_applicant', $data);
            }
            // } else{
            //     $data['applicantlist'] =  $this->Applicant_Model->getAllApplicantFilter($statuses);
            // }


        } else {
            redirect('Home/index');
        }
    }

    public function saveApplicant()
    {
        if ($this->session->userdata('Id') != '') {


            $candidate_id = $this->input->post('candidate_id');
            $institute_id = $this->input->post('institute_id');
            $position_id = $this->input->post('position_id');
            $eo_id = $this->input->post('eo_id');
            $reference_id = $this->input->post('reference_id');
            $district_id = $this->input->post('district_id');
            $taluka_id = $this->input->post('taluka_id');
            $other_reference_name = $this->input->post('other_reference_name');
            $relation = $this->input->post('relation');
            $other_reference_id = $this->input->post('other_reference_id');
            $sabhasad_mobile_no = $this->input->post('sabhasad_mobile_no');
            $sabhasad_name = $this->input->post('sabhasad_name');
            $name_director = $this->input->post('name_director');
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $contact_no = $this->input->post('contact_no');
            $aadhar = $this->input->post('aadhar');
            $city = $this->input->post('city');
            $email_id = $this->input->post('email_id');
            $qualification = $this->input->post('qualification');
            $remark = $this->input->post('remark');
            $exam = $this->input->post('exam');
            $demo_lectures = $this->input->post('demo_lectures');
            $education = $this->input->post('education');
            $college = $this->input->post('college');
            $professional = $this->input->post('professional');
            $other_position = $this->input->post('other_position');
            $assign_to = $this->input->post('assign_to');
            $background = $this->input->post('background');
            $exam_remark = $this->input->post('exam_remark');
            $demo_lectures_remark = $this->input->post('demo_lectures_remark');
            $RCC_ID = $this->session->userdata('Id');

            // echo '<pre>';
            // print_r($name_director[0]);die();

            if ($candidate_id == "") {
                $data = array(
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'contact_no' => $contact_no,
                    'aadhar' => $aadhar,
                    'city' => $city,
                    'email_id' => $email_id,
                    'district_id' => $district_id,
                    'taluka_id' => $taluka_id,
                    'RCC_id' => $RCC_ID
                    
                );

                $result1 = $this->Applicant_Model->saveBasicDetails($data);
                if ($result1 == true) {
                    $currentDate = date('d-m-Y');
                    $r1 = $this->db->query("select id from tb_new_applicant order by id desc limit 1");
                    if (count($r1->result_array()) > 0) {
                        foreach ($r1->result_array() as $key) {
                            $can_id = $key['id'];
                            $RCC_ID = $this->session->userdata('Id');
                        }

                        $data1 = array(
                            'candidate_id' => $can_id,
                            'log_remark' => 'New candidate register.',
                            'type' => 'candidate',
                            'rcc_id' => $RCC_ID,
                            'created_date' => $currentDate,
                            'position_id' => $position_id
                        );

                        $d3 = $this->Applicant_Model->savelogrcc($data1);
                        $datass = array(

                            'first_name' => $first_name,
                            'last_name' => $last_name,
                            'contact_no' => $contact_no,
                            'aadhar' => $aadhar,
                            'city' => $city,
                            'email_id' => $email_id,
                            'district_id' => $district_id,
                            'qualification' => $qualification,
                            'taluka_id' => $taluka_id,

                            'institute_id' => $institute_id,
                            'position_id' => $position_id,
                            'eo_id' => $eo_id,
                            'reference_id' => $reference_id,

                            'other_reference_name' => $other_reference_name,
                            'relation' => $relation,
                            'other_reference_id' => $other_reference_id,
                            'sabhasad_mobile_no' => $sabhasad_mobile_no,
                            'sabhasad_name' => $sabhasad_name,
                            'name_director' => $name_director,
                            'remark' => $remark,
                            // 'status_remark' => $status_remark,
                            'exam' => $exam,
                            'demo_lectures' => $demo_lectures,
                            'education' => $education,
                            'college' => $college,
                            'professional' => $professional,
                            'other_position' => $other_position,
                            'assign_to' => $assign_to,
                            'background' => $background,
                            'exam_remark' => $exam_remark,
                            'demo_lectures_remark' => $demo_lectures_remark,
                            'candidate_id' => $can_id



                        );

                        // print_r($director_name);   die();
                        // $result1 = $this->Applicant_Model->saveBasicDetails($data1);
                        $result2 = $this->Applicant_Model->saveReferenceDetails($datass);



                        if ($result2 == 1) {
                            $currentDate = date('d-m-Y');
                            $r1 = $this->db->query("select id from tb_applicant order by id desc limit 1");

                            if (count($r1->result_array()) > 0) {
                                foreach ($r1->result_array() as $key) {
                                    $app_id = $key['id'];
                                    $RCC_ID = $this->session->userdata('Id');
                                }


                                $data1 = array(
                                    'applicant_id' => $app_id,
                                    'candidate_id' => $candidate_id,
                                    'log_remark' => 'Add New Application.',
                                    'type' => 'applicant',
                                    'rcc_id' => $RCC_ID,
                                    'created_date' => $currentDate,
                                    'position_id' => $position_id
                                );

                                $d3 = $this->Applicant_Model->savelogrcc($data1);
                            }
                            echo $this->session->set_flashdata('success', 'Record insert successfully');
                            redirect($_SERVER['HTTP_REFERER']);
                            // redirect('Applicant/getApplicantByStatus/All/' . $candidate_id);
                        } else {
                            echo $this->session->set_flashdata('error', 'Record not inserted');
                            redirect('Applicant/getApplicantByStatus/All/' . $candidate_id);
                        }
                    }
                }
            } else {
                $data2 = array(

                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'contact_no' => $contact_no,
                    'aadhar' => $aadhar,
                    'city' => $city,
                    'email_id' => $email_id,
                    'district_id' => $district_id,
                    'qualification' => $qualification,
                    'taluka_id' => $taluka_id,

                    'institute_id' => $institute_id,
                    'position_id' => $position_id,
                    'eo_id' => $eo_id,
                    'reference_id' => $reference_id,

                    'other_reference_name' => $other_reference_name,
                    'relation' => $relation,
                    'other_reference_id' => $other_reference_id,
                    'sabhasad_mobile_no' => $sabhasad_mobile_no,
                    'sabhasad_name' => $sabhasad_name,
                    'name_director' => $name_director,
                    'remark' => $remark,
                    // 'status_remark' => $status_remark,
                    'exam' => $exam,
                    'demo_lectures' => $demo_lectures,
                    'education' => $education,
                    'college' => $college,
                    'professional' => $professional,
                    'other_position' => $other_position,
                    'assign_to' => $assign_to,
                    'background' => $background,
                    'exam_remark' => $exam_remark,
                    'demo_lectures_remark' => $demo_lectures_remark,
                    'candidate_id' => $candidate_id



                );

                // print_r($director_name);   die();
                // $result1 = $this->Applicant_Model->saveBasicDetails($data1);
                $result2 = $this->Applicant_Model->saveReferenceDetails($data2);



                if ($result2 == 1) {
                    $currentDate = date('d-m-Y');
                    $r1 = $this->db->query("select id from tb_applicant order by id desc limit 1");

                    if (count($r1->result_array()) > 0) {
                        foreach ($r1->result_array() as $key) {
                            $app_id = $key['id'];
                            $RCC_ID = $this->session->userdata('Id');


                            $data1 = array(
                                'applicant_id' => $app_id,
                                'log_remark' => 'Add New Application.',
                                'type' => 'applicant',
                                'rcc_id' => $RCC_ID,
                                'created_date' => $currentDate,
                                'position_id' => $position_id
                            );

                            $d3 = $this->Applicant_Model->savelogrcc($data1);
                        }
                        echo $this->session->set_flashdata('success', 'Record insert successfully');
                        redirect($_SERVER['HTTP_REFERER']);
                        // redirect('Applicant/getApplicantByStatus/All/' . $candidate_id);
                    } else {
                        echo $this->session->set_flashdata('error', 'Record not inserted');
                        redirect('Applicant/getApplicantByStatus/All/' . $candidate_id);
                    }
                } else {
                    redirect('Home/index');
                }
            }
        }
    }

    public function updateApplicant()
    {
        if ($this->session->userdata('Id') != '') {
            $candidate_id = $this->input->post('candidate_id');
            $id = $this->input->post('id');
            $institute_id = $this->input->post('institute_id');
            $position_id = $this->input->post('position_id');
            $eo_id = $this->input->post('eo_id');
            $reference_id = $this->input->post('reference_id');
            $other_reference_name = $this->input->post('other_reference_name');
            $relation = $this->input->post('relation');
            $other_reference_id = $this->input->post('other_reference_id');
            $sabhasad_mobile_no = $this->input->post('sabhasad_mobile_no');
            $name_director = $this->input->post('name_director');
            $sabhasad_name = $this->input->post('sabhasad_name');
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $contact_no = $this->input->post('contact_no');
            $aadhar = $this->input->post('aadhar');
            $city = $this->input->post('city');
            $email_id = $this->input->post('email_id');
            $qualification = $this->input->post('qualification');
            $remark = $this->input->post('remark');
            $exam = $this->input->post('exam');
            $demo_lectures = $this->input->post('demo_lectures');
            $education = $this->input->post('education');
            $college = $this->input->post('college');
            $professional = $this->input->post('professional');
            $assign_to = $this->input->post('assign_to');
            $background = $this->input->post('background');
            $exam_remark = $this->input->post('exam_remark');
            $demo_lectures_remark = $this->input->post('demo_lectures_remark');



            $data = array(
                'id' => $id,
                'institute_id' => $institute_id,
                'position_id' => $position_id,
                'eo_id' => $eo_id,
                'reference_id' => $reference_id,
                'other_reference_name' => $other_reference_name,
                'relation' => $relation,
                'other_reference_id' => $other_reference_id,
                'sabhasad_mobile_no' => $sabhasad_mobile_no,
                'sabhasad_name' => $sabhasad_name,
                'name_director' => $name_director,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'contact_no' => $contact_no,
                'aadhar' => $aadhar,
                'city' => $city,
                'email_id' => $email_id,
                'qualification' => $qualification,
                'remark' => $remark,
                'exam' => $exam,
                'demo_lectures' => $demo_lectures,
                'education' => $education,
                'college' => $college,
                'professional' => $professional,
                'assign_to' => $assign_to,
                'background' => $background,
                'exam_remark' => $exam_remark,
                'demo_lectures_remark' => $demo_lectures_remark,
                'candidate_id' => $candidate_id

            );

            $result = $this->Applicant_Model->updateApplicantDetails($data, $id);


            if ($result == 1) {
                $currentDate = date('d-m-Y');
                $r1 = $this->db->query("select id from tb_applicant order by id desc limit 1");

                if (count($r1->result_array()) > 0) {
                    foreach ($r1->result_array() as $key) {
                        $app_id = $key['id'];
                        $RCC_ID = $this->session->userdata('Id');


                        $data1 = array(
                            'applicant_id' => $app_id,
                            'log_remark' => 'Update Applicant Details.',
                            'type' => 'applicant',
                            'rcc_id' => $RCC_ID,
                            'updated_date' => $currentDate,
                            'position_id' => $position_id
                        );
                        // print_r($data1);
                        $d3 = $this->Applicant_Model->savelogrcc($data1);
                    }
                } else {
                    // Handle the case when there are no results
                }
            }


            //print_r($result); die();
            $this->session->set_flashdata('success', 'Data Updated Successfully');
            redirect($_SERVER['HTTP_REFERER']);
            // redirect('Applicant/getApplicantByStatus/All/' . $candidate_id);
        } else {
            redirect('Home/index');
        }
    }

    public function status_update($id)
    {
        if ($this->session->userdata('Id') != '') {
            $newStatus = $this->input->post('status');

            $data = array('status' => $newStatus);
            $result = $this->Applicant_Model->updateApplicantDetails($data, $id);

            if ($result == 1) {

                $this->session->set_flashdata('success', 'Status Updated Successfully');
                redirect('Applicant/getApplicantByStatus/All');
            }
        } else {
            redirect('Home/index');
        }
    }



    public function updateStatusRemark()
    {
        $this->load->model('Applicant_model');

        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $position_id = $this->input->post('position_id');
        $status_remark = $this->input->post('status_remark');

       $data = array(
                        'id' => $id,
                        'status' => $status,
                        'position_id' => $position_id,
                        'status_remark' => $status_remark

                    );
      $result =  $this->Applicant_model->updateStatus($data , $id);
      if ($result > 0) {
        $currentDate = date('d-m-Y');
        $r1 = $this->db->query("select id from tb_applicant order by id desc limit 1");

        if (count($r1->result_array()) > 0) {
            foreach ($r1->result_array() as $key) {
                $app_id = $key['id'];
                $RCC_ID = $this->session->userdata('Id');


                $data1 = array(
                    'applicant_id' => $app_id,
                    'log_remark' => 'Update Status of Applicant.',
                    'type' => 'applicant',
                    'rcc_id' => $RCC_ID,
                    'updated_date' => $currentDate,
                    'position_id' => $position_id
                );
                // print_r($data1);
                $d3 = $this->Applicant_Model->savelogrcc($data1);
            }
        }
     } else {
            redirect('Home/index');
        }

        redirect($_SERVER['HTTP_REFERER']);
        // redirect('Applicant/getApplicantByStatus/All');
    }

    // public function deleteUser($id)
    // {
    //     $query = $this->Applicant_Model->deleteUser($id);
    //     if ($query) {
    //         $this->session->set_flashdata('success', 'User Deleted successfully...!!');
    //         $data['applicantlist'] =  $this->Applicant_Model->getAllApplicant();
    //         redirect('Applicant/index/All');
    //     } else {
    //         $this->session->set_flashdata('error', 'Something went wrong. Please try again.');
    //         redirect('Applicant/index/All');
    //     }
    // }

    public function fetch_taluka()
    {

        echo $district_id = $this->input->post('district_id');
        echo  $this->Applicant_Model->getTalukaList($district_id);
        //print_r($data['result']);
    }

    public function statusUpdateForCandidate()
    {
        if ($this->session->userdata('Id') != '') {
            $id = $this->input->post('id');
            $status = $this->input->post('status');
            $remarkforstatus = $this->input->post('remarkforstatus');



            $data = array(
                'status' => $status,
                'remarkforstatus' => $remarkforstatus
            );

            $result = $this->Applicant_Model->updateCandidiateDetails($data, $id);
            if ($result > 0) {
                $currentDate = date('d-m-Y');
                $r1 = $this->db->query("select id from tb_applicant order by id desc limit 1");

                if (count($r1->result_array()) > 0) {
                    foreach ($r1->result_array() as $key) {
                        $app_id = $key['id'];
                        $RCC_ID = $this->session->userdata('Id');

                        $data1 = array(
                            'applicant_id' => $app_id,
                            'log_remark' => 'Update Status of Candidate .',
                            'type' => 'candidate',
                            'rcc_id' => $RCC_ID,
                            'updated_date' => $currentDate
                            // 'position_id' => $position_id
                        );
                        // print_r($data1);
                        $d3 = $this->Applicant_Model->savelogrcc($data1);
                        $this->session->set_flashdata('success', 'Status Updated Successfully');
                        redirect('Applicant/getallApplicant');
                    }
                } else {
                    redirect('Home/index');
                }
            }
        }
    }


    public function getCandidateDetailsByAadhar()
    {
        $textboxValue = $this->input->post('textboxValue');
        $this->load->model('Applicant_Model');
        $data = $this->Applicant_Model->getCandidateDetailsByAadhar($textboxValue);
        echo json_encode($data);
    }

    public function search_applicant()
    {
        
        $textboxValue = $this->input->post('val');
        $this->load->model('Applicant_Model');
        $data = $this->Applicant_Model->getCandidateDetailsByText($textboxValue);
        echo json_encode($data);

    }
}
