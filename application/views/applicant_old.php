<!DOCTYPE html>
<html lang="en">
<?php include 'public/head.php'; ?>

<style>
    .head-td {
        background-color: #026C7C !important;
        font-weight: bold;
        color: #fff;
    }

    .form-button-cls {
        margin-top: 12px;
    }

    .last-table-cls {
        border: 2px solid #c5c5c5;
        border-radius: 10px;
        padding: 12px;
        margin-left: 279px;
    }

    div.dataTables_wrapper div.dataTables_filter {
        text-align: left !important;
    }

    div.dataTables_wrapper div.dataTables_filter input {
        margin-left: .5em;
        display: inline-block;
        width: 500px !important;
    }

    /* .dataTables_wrapper div.dataTables_filter label input {
        width: 100% !important;
    }

    .dataTables_wrapper div.dataTables_filter label {
        width: 100% !important;
        display: flex !important;
    } */

    #example1_wrapper .col-md-6 {
        max-width: 33.33% !important;
    }

    @media screen and (max-width:479px) {
        .dataTables_wrapper div.dataTables_filter label input {
            width: auto !important;
        }

        .dataTables_wrapper div.dataTables_filter label {
            width: 100% !important;
            display: block !important;
        }

        #example1_wrapper .row {
            display: block;
        }
    }

    .plus-button {
        background-color: #2273c9;
        color: white;
        border: none;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        font-size: 24px;
        line-height: 24px;
        cursor: pointer;
    }

    .plus-button:focus {
        outline: none;
    }

    .popup {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
    }

    .popup-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        padding: 20px;
        text-align: center;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }

    .close {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
    }


    .radio-group {
        margin-bottom: 10px;
    }

    .radio-group input {
        margin-right: 5px;
    }

    /* b {
        font-size: 30px;
    } */


    h3 {
        /* margin-left: 450px !important; */
        /* margin-bottom: 25px !important; */
    }

    .modal-header {
        background-color: #026C7C;
    }

    .modal-title {
        color: #fff;
    }

    .status-cell {
        padding: 10px;
        font-weight: bold;
        text-align: center;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    /* Define colors for different status values */
    .status-cell.pending {
        color: blueviolet;
    }

    .status-cell.selected {
        color: green;
    }

    .status-cell.rejected {
        color: red;
    }

    .status-cell.in_process {
        color: #026C7C;
    }

    /* Add more status colors as needed */

    /* Add a simple hover effect */

    .modal-dialog.modal-xl {
        border-radius: 20px;
        overflow: hidden;
    }

    .modal-dialog.modal-xl button.close {
        opacity: 1;
        font-size: 45px;
        font-weight: 400;
        right: 15px;
        color: #fff;
    }

    .box-tbl-1 {
        background: #bfd3d940;
        border-radius: 20px;
        color: #000;
        padding: 20px 0;
        margin: 15px auto;
        border: 1px solid #c9c9c9;
    }

    .bb-line {
        width: 100%;
        height: 1px;
        background: #c9c9c9;
        margin-top: 10px;
        margin-bottom: 10px;

    }

    .btn-primary {
        color: #fff;
        background-color: #026C7C !important;
        border-color: #026C7C !important;
        box-shadow: none;
    }

    /* Add this style to your existing styles */
    /* .modal-body {
        max-height: 75vh;
        overflow-y: auto;
    } */

    @media print {
        body * {
            visibility: hidden;
        }

        .modal-content,
        .modal-content * {
            visibility: visible;
        }

        .modal-content {
            position: absolute;
            left: 0;
            top: 0;
        }
    }

    @media print {

        /* Hide non-essential elements during printing */
        body * {
            visibility: hidden;
        }

    }
</style>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">


        <!-- Navbar -->
        <?php include 'public/navbar.php'; ?>

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include 'public/sidebar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <?php $name = $this->uri->segment(3);
        
                            echo "<h1 class='m-0'>$name Application List</h1>";
                            ?>

                            <!-- <h1 class="m-0">Applicant</h1> -->
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url() . 'Home/dashboard'; ?>">Home<p style="margin-bottom:0px;padding-bottom:0px;"> </a></li>
                                <li class="breadcrumb-item active">Application List</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <!-- /.content-header -->
                    <?php if ($this->session->flashdata('success')) { ?>
                        <div class="alert alert-info" role="alert" id="success-alert">
                            <strong>Success !</strong> <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php } ?>
                    <?php if ($this->session->flashdata('error')) { ?>
                        <div class="alert alert-danger" role="alert" id="danger-alert">
                            <strong>Error !</strong> <?php echo $this->session->flashdata('error'); ?>
                        </div>
                    <?php } ?>
                    <!-- Main content -->
                    <section class="content">
                        <div class="container-fluid">
                            <!-- Small boxes (Stat box) -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <!-- <div class="row" style="justify-content: center;">
                                                    <div class="col-lg-5 col-md-5 col-sm-5">
                                                        <form action="<?php echo base_url() . 'Applicant/index'; ?>" method="post">
                                                            <div class="row" class="justify-content-right">
                                                                <div class="col-md-4">
                                                                    <select class="form-control" name="status" ="Select......">
                                                                        <option value="">Select Status...</option>
                                                                        <option value="Pending">Pending</option>
                                                                        <option value="Selected">Selected</option>
                                                                        <option value="In_Process">In Process</option>
                                                                        <option value="Rejected">Rejected</option>
                                                                    </select>

                                                                </div>
                                                                <div class="col-md-2">
                                                                    <button type="submit" value="submit" class="btn btn-success">Find</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div> -->



                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <!-- <h3 class="card-title">Category List<p style="margin-bottom:0px;padding-bottom:0px;"> -->
                                                    </h3>
                                                </div>
                                                <div class="col-lg-6 text-right">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> Add New Application</button>
                                                </div>
                                            </div>

                                            <div class="modal fade bd-example-modal-lg custom-modal" id="modal-default">
                                                <div class="modal-dialog modal-xl"> <!-- You can change 'modal-xl' to your preferred width class -->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title" style="margin: left 200px !important;">Add New Application </h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true" style="color: #fff;">&times;</span>
                                                                </button>
                                                        </div>
                                                        <form method="post" action="<?php echo base_url() . 'Applicant/saveApplicant' ?>" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                <?php
                                                                $candidate_id = $this->uri->segment(4);
                                                                $candidate_details = $this->Applicant_Model->getCandidateDetails($candidate_id);
                                                                if (count($candidate_details) > 0) {
                                                                    foreach ($candidate_details as $can) {
                                                                        $fname = $can['first_name'];
                                                                        $lname = $can['last_name'];
                                                                        $contactno = $can['contact_no'];
                                                                        $email_id = $can['email_id'];
                                                                        $aadhar = $can['aadhar'];
                                                                        $city = $can['city'];
                                                                        $taluka_name = $can['taluka_name'];
                                                                        $district_name = $can['district_name'];
                                                                        $district_id = $can['district_id'];
                                                                        $taluka_id = $can['taluka_id'];
                                                                    }
                                                                } else {
                                                                    $fname = "";
                                                                    $lname = "";
                                                                    $contactno = "";
                                                                    $email_id = "";
                                                                    $aadhar = "";
                                                                    $city = "";
                                                                    $taluka_name = "";
                                                                    $district_name = "";
                                                                    $district_id = "";
                                                                    $taluka_id = "";
                                                                }


                                                                ?>
                                                                <div class="row">
                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                        <div class="form-group">
                                                                            <label>First Name *</label>
                                                                            <input type="hidden" value="<?php echo $candidate_id; ?>" name="candidate_id">
                                                                            <input type="text" readonly value="<?php echo $fname; ?>" class="form-control" placeholder="Enter First Name" name="first_name" onkeyup="LettersOnly(this)" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                        <div class="form-group">
                                                                            <label>Last Name *</label>
                                                                            <input type="text" class="form-control" readonly value="<?php echo $lname; ?>" placeholder="Enter Last Name" name="last_name" onkeyup="LettersOnly(this)" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                        <div class="form-group">
                                                                            <label>Contact Number *</label>
                                                                            <input type="text" class="form-control" readonly value="<?php echo $contactno; ?>" placeholder="Enter Contact Number" name="contact_no" maxlength="10" pattern="[789][0-9]{9}" onkeyup="NumbersOnly(this)" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                        <div class="form-group">
                                                                            <label>Aadhar Number *</label>
                                                                            <input type="text" class="form-control" readonly value="<?php echo $aadhar; ?>" placeholder="Enter Aadhar Number" maxlength="12" name="aadhar" pattern="[0-9]{12}" title="Aadhar number must be 12 digits" onkeyup="NumbersOnly(this)" required>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                        <div class="form-group">
                                                                            <label>Email ID *</label>
                                                                            <input type="email" class="form-control" readonly value="<?php echo $email_id; ?>" placeholder="Enter Email Id" name="email_id" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                        <label for="district_id">District *</label>
                                                                        <select class="form-control" name="district_id" id="district_list" readonly required>

                                                                            <option value="<?php echo $district_id; ?>" selected><?php echo $district_name ?></option>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                        <label>Taluka *</label>
                                                                        <select class="form-control" name="taluka_id" id="taluka_list" readonly required>
                                                                            <option value="<?php echo $taluka_id; ?>" selected><?php echo $taluka_name ?></option>
                                                                        </select>


                                                                        <!-- <select class="form-control" name="taluka_id" id="taluka_id" >
                                                                <option value="">Select Taluka</option>
                                                                <?php //foreach ($taluka as $key => $value) : 
                                                                ?>
                                                                    <option value="<?php //echo $value['id']; 
                                                                                    ?>"><?php //echo $value['name']; 
                                                                                        ?></option>
                                                                <?php //endforeach; 
                                                                ?>
                                                            </select> -->
                                                                    </div>

                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                        <div class="form-group">
                                                                            <label>Village *</label>
                                                                            <input type="text" class="form-control" readonly value="<?php echo $city; ?>" placeholder="Enter Village Name" name="city" required>
                                                                        </div>
                                                                    </div>



                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">


                                                                        <div class="form-group">
                                                                            <label for="position_id">Position *</label>
                                                                            <select class="form-control" name="position_id" id="position" required>
                                                                                <option value="">Select Position</option>
                                                                                <?php foreach ($position as $key => $value) : ?>
                                                                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                                                                <?php endforeach; ?>

                                                                            </select>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                                <div class="row">

                                                                    <div class="col-lg-4 col-md-64 col-sm-12 col-12">
                                                                        <label for="education">Select Institute: *</label>
                                                                        <div class="form-group">
                                                                            <input type="radio" id="schoolRadio" name="institute_id" value="school" onclick="showFields('school')" ><b> School </b>&nbsp;&nbsp;&nbsp;
                                                                            <input type="radio" id="collegeRadio" name="institute_id" value="college" onclick="showFields('college')"><b> College</b> &nbsp;&nbsp;&nbsp;
                                                                            <input type="radio" id="otherRadio" name="institute_id" value="Professional-College" onclick="showFields('Professional-College')"> <b>Professional College</b>
                                                                        </div>
                                                                    </div>


                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12" id="selectmedium" style="display: none;">
                                                                        <div>
                                                                            <label for="subEducation">Select Medium: </label>
                                                                            <select class="form-control" id="subEducation" name="education">
                                                                                <option value="">Select</option>
                                                                                <option value="Marathi">Marathi</option>
                                                                                <option value="English">English</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12" id="selectcollege" style="display: none;">
                                                                        <div>
                                                                            <label for="subEducation">Select College:</label>
                                                                            <select class="form-control" id="collegeSelect" name="college">
                                                                                <option value="">Select</option>
                                                                                <option value="Junior">Junior</option>
                                                                                <option value="Senior">Senior</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12" id="selectprofessional" style="display: none;">
                                                                        <div>
                                                                            <label for="subEducation">Select Professional College:</label>
                                                                            <select class="form-control" id="professionalSelect" name="professional">
                                                                                <option value="">Select</option>
                                                                                <option value="Rajarshi Shahu Maharaj Polytechnic, Nashik">Rajarshi Shahu Maharaj Polytechnic, Nashik</option>
                                                                                <option value="Karmaveer Adv. Baburao Ganpatrao Thakare College of Engineering (KBTCOE)">Karmaveer Adv. Baburao Ganpatrao Thakare College of Engineering (KBTCOE)</option>
                                                                                <option value="Institute of Management Research & Technology (IMRT)">Institute of Management Research & Technology (IMRT)</option>
                                                                                <option value="Sharadchandra Pawarji College of Architecture, Nashik">Sharadchandra Pawarji College of Architecture, Nashik</option>
                                                                                <option value="Agriculture Polytechnic College">Agriculture Polytechnic College</option>

                                                                                <option value="Karmayogi Dulaji Sitaram Patil College of Agriculture, Nashik">Karmayogi Dulaji Sitaram Patil College of Agriculture, Nashik</option>
                                                                                <option value="Law College, Nashik.">Law College, Nashik.</option>
                                                                                <option value="College of Pharmacy, Nashik">College of Pharmacy, Nashik</option>
                                                                                <option value="Institute of Pharmaceutical Sciences">Institute of Pharmaceutical Sciences</option>
                                                                                <option value="Dr. Vasantrao Pawar Medical College, Hospital & Research Centre, Nashik">Dr. Vasantrao Pawar Medical College, Hospital & Research Centre, Nashik</option>
                                                                                <option value="School of Fine Arts, Nashik">School of Fine Arts, Nashik</option>
                                                                                <option value="Institute of Nursing Education, Nashik">Institute of Nursing Education, Nashik</option>
                                                                                <option value="Maratha Vidya Prasarak Samaj Printing Press, Nashik">Maratha Vidya Prasarak Samaj Printing Press, Nashik</option>

                                                                                <option value="ITI">ITI</option>
                                                                                <option value="Other">Other</option>
                                                                                <!-- Add your professional colleges options here -->
                                                                            </select>
                                                                        </div>
                                                                    </div>


                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12" id="other_position" style="display: none;">
                                                                        <div class="form-group">
                                                                            <label for="name">Other Positon *</label>
                                                                            <input type="text" class="form-control" name="other_position" id="name" placeholder="Enter Other Position">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                        <div class="form-group">
                                                                            <label>Qualification *</label>
                                                                            <input type="text" class="form-control" placeholder="Enter qualification" name="qualification" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                        <div class="form-group">
                                                                            <label for="position_id">Reference *</label>
                                                                            <select class="form-control" name="reference_id" id="reference_id">
                                                                                <option value="">Select Reference</option>
                                                                                <?php foreach ($reference as $key => $value) :
                                                                                ?>
                                                                                    <option value="<?php echo $value['id'];
                                                                                                    ?>"><?php echo $value['name'];
                                                                                                        ?></option>
                                                                                <?php endforeach;
                                                                                ?>
                                                                            </select>

                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12" id="nameInputField" style="display: none;">
                                                                        <div class="form-group">
                                                                            <label for="name">Reference Name</label>
                                                                            <input type="text" class="form-control" name="other_reference_name" id="name" placeholder="Enter Name">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12" id="nameInputField2" style="display: none;">
                                                                        <div class="form-group">
                                                                            <label for="relation">Relation</label>
                                                                            <select class="form-control" name="relation" id="relation">
                                                                                <option value="">Select Relation</option>
                                                                                <option value="parent">Parent</option>
                                                                                <option value="sibling">Sibling</option>
                                                                                <option value="friend">Friend</option>
                                                                                <!-- Add more options as needed -->
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12" id="nameInputField3" style="display: none;">
                                                                        <div class="form-group">
                                                                            <label for="name">Reference Mobile Number</label>
                                                                            <input type="text" class="form-control" name="sabhasad_mobile_no" maxlength="10" pattern="[789][0-9]{9}" onkeyup="NumbersOnly(this)" id="sabhasad_mobile_no" placeholder="Enter Sabhasad Mobile Number">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12" id="nameInputField10" style="display: none;">
                                                                        <div class="form-group">
                                                                            <label for="name">Sabhasad ID</label>
                                                                            <input type="text" class="form-control" name="other_reference_id" id="other_reference_id" placeholder="Enter Sabhasad ID">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12" id="nameInputField12" style="display: none;">
                                                                        <div class="form-group">
                                                                            <label for="name">Director Name</label>
                                                                            <input type="text" class="form-control" name="director_name" id="director_name" placeholder="Enter Director Name">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12" id="nameInputField312" style="display: none;">
                                                                        <div class="form-group">
                                                                            <label for="name">Employee Unit Name</label>
                                                                            <input type="text" class="form-control" name="director_name" id="director_name" placeholder="Enter Director Name">
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                        <div class="form-group">
                                                                            <label for="exam">Assign To EO: *</label><br>
                                                                            <input type="radio" id="done" name="assign_to" value="eo" >
                                                                            <label for="eo">Individual</label>
                                                                            &nbsp;&nbsp;
                                                                            <input type="radio" id="all" name="assign_to" value="all" >
                                                                            <label for="all">All</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12" id="eoDropdown" style="display: none;">
                                                                        <div>
                                                                            <label for="education-officer">Select Education Officer:</label>
                                                                            <select class="form-control" name="eo_id" id="education-officer">
                                                                                <option value="">Select Education Officer</option>
                                                                                <?php foreach ($education as $key => $value) : ?>
                                                                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                                                                <?php endforeach; ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                        <div class="form-group">
                                                                            <label for="background">Background: *</label><br>
                                                                            <input type="radio" name="background" value="technical">
                                                                            <label for="tech">Technical</label>
                                                                            &nbsp;&nbsp;
                                                                            <input type="radio" id="nontech" name="background" value="nontechnical">
                                                                            <label for="nontech">Non Technical</label>
                                                                        </div>
                                                                    </div>


                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                        <div class="form-group">
                                                                            <label for="exam">Exam:</label><br>
                                                                            <input type="radio" name="exam" value="done">
                                                                            <label for="done">Done</label>
                                                                            &nbsp;&nbsp;
                                                                            <input type="radio" id="not_done" name="exam" value="not_done">
                                                                            <label for="not_done">Not Done</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12" id="exam-remark">
                                                                        <div class="form-group">
                                                                            <label>Exam Remark</label>
                                                                            <textarea class="form-control " placeholder="Enter Remark" name="exam_remark"></textarea>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                        <div class="form-group">
                                                                            <label for="exam">Demo Lecture:</label><br>
                                                                            <input type="radio" name="demo_lectures" value="done">
                                                                            <label for="done">Done</label>
                                                                            &nbsp;&nbsp;
                                                                            <input type="radio" id="not_done" name="demo_lectures" value="not_done">
                                                                            <label for="not_done">Not Done</label>
                                                                        </div>
                                                                    </div>



                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12" id="demo-remark">
                                                                        <div class="form-group">
                                                                            <label>Demo Lecture Remark</label>
                                                                            <textarea class="form-control" placeholder="Enter Remark" name="demo_lectures_remark"></textarea>
                                                                        </div>
                                                                    </div>


                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                        <div class="form-group">
                                                                            <label>Sarchitnis Remark</label>

                                                                            <textarea class="form-control" placeholder="Enter Sarchitnis Remark" name="remark"> </textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>



                                                            <!-- </div> -->
                                                            <div class="modal-footer justify-content-center">

                                                                <button type="Submit" class="btn btn-primary">Submit</button>
                                                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                                            </div>
                                                    </div>
                                                    </form>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                        </div>

                                        <!-- /.card-header -->
                                        <div class="card-body ">
                                            <div class="table-responsive">
                                                <table id="example1" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <!-- <th>Name</th>
                                                            <th>Contact No</th>
                                                            <th>Village</th> -->

                                                            <th>Position</th>
                                                            <th>Institute</th>
                                                            <th>Documents</th>
                                                            <th>Education Ofiicer</th>
                                                            <th> Status</th>
                                                            <th>Action</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1;
                                                        $id = '';
                                                        foreach ($applicantlist as $row) {
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $i; ?></td>
                                                                <!-- <a data-toggle="modal" data-target="#modal-edit<?php echo $row['id']; ?>" style="color: blue;"> -->
                                                                <!-- <td>
                                                                    <?php echo $row['first_name'] . ' ' . $row['last_name']; ?>
                                                                </td>
                                                                <td><?php echo $row['contact_no']; ?></td>
                                                                <td><?php echo $row['city']; ?></td> -->

                                                                <td><?php echo $row['name']; ?></td>
                                                                <td><?php echo $row['institute_id']; ?></td>
                                                                <!-- <td><? //php echo $row['remark']; 
                                                                            ?></td> -->


                                                                <!-- <td>
                                                            <?php
                                                            //if (isset($row['status_remark']) && !empty($row['status_remark'])) {
                                                            //echo $row['status_remark'];
                                                            //}else {

                                                            // echo $row['status_remark'];
                                                            //}
                                                            ?>
                                                        </td> -->
                                                                <td class="text-center">
                                                                    <a href="<?php echo base_url() . 'certificate/' . $row['id']; ?>">Add Document
                                                                </td>
                                                                <td>
                                                                    <?php if ($row['assign_to'] == 'all') {
                                                                        echo $row['assign_to'];
                                                                    } else {
                                                                        echo $row['eo_name'];
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td class="status-cell <?php echo strtolower($row['status']); ?>">
                                                                    <?php echo $row['status']; ?>
                                                                </td>


                                                                <td>
                                                                    <!-- <a class="btn btn-success" data-toggle="modal" data-target="#modal-infoview<?php echo $row['id']; ?>" onclick="openModal(<?php echo $row['id']; ?>)">
                                                            <i class="fas fa-eye"></i>
                                                        </a>  -->
                                                                    <a class="btn btn-success" data-toggle="modal" data-target="#modal-viewData<?php echo $i ?>">
                                                                        <i class="fas fa-eye"></i>
                                                                    </a>
                                                                    <!-- <a class="btn btn-warning" data-toggle="modal" data-target="#modal-status<?php echo $row['id']; ?>">
                                                            <i class="fas fa-edit"></i>
                                                        </a> -->
                                                                    <a class="btn btn-info" data-toggle="modal" data-target="#modal-edit_<?php echo $row['id']; ?>">
                                                                        <i class="fas fa-edit"></i>
                                                                    </a>



                                                                </td>
                                                            </tr>



                                                            <div class="modal fade" id="modal-edit_<?php echo $row['id']; ?>">
                                                                <div class="modal-dialog modal-xl"> <!-- You can change 'modal-xl' to your preferred width class -->
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Edit Application Details </h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span> </button>
                                                                        </div>
                                                                        <form method="post" action="<?php echo base_url() . 'Applicant/updateApplicant' ?>" enctype="multipart/form-data">
                                                                            <div class="modal-body">
                                                                                <div class="form-group">
                                                                                    <input type="hidden" value="<?php echo $row['id']; ?>" id="id" class="form-control" name="id">
                                                                                    <input type="hidden" name="candidate_id" value="<?php echo  $candidate_id; ?>">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                                            <label for="education">Select Institute:</label>
                                                                                            <select class="form-control" id="education2" name="institute_id">
                                                                                                <option value="">Select</option>
                                                                                                <option value="school" <?php if ($row['institute_id'] == 'school') {
                                                                                                                            echo 'selected';
                                                                                                                        } ?>>School</option>
                                                                                                <option value="college" <?php if ($row['institute_id'] == 'college') {
                                                                                                                            echo 'selected';
                                                                                                                        } ?>>College</option>
                                                                                                <option value="Professional-College" <?php if ($row['institute_id'] == 'Professional-College') {
                                                                                                                                            echo 'selected';
                                                                                                                                        } ?>>Professional College</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                                            <div id="selectmedium2" style="display: <?php if ($row['education'] != '') {
                                                                                                                                        echo 'block';
                                                                                                                                    } else {
                                                                                                                                        echo 'none';
                                                                                                                                    } ?>;">
                                                                                                <label for="subEducation">Select Medium:</label>

                                                                                                <select class="form-control" id="subEducation" name="education">
                                                                                                    <option value="">Select</option>
                                                                                                    <option value="Marathi" <?php if ($row['education'] == 'Marathi') {
                                                                                                                                echo 'selected';
                                                                                                                            } ?>>Marathi</option>
                                                                                                    <option value="English" <?php if ($row['education'] == 'English') {
                                                                                                                                echo 'selected';
                                                                                                                            } ?>>English</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div id="selectcollege2" style="display: <?php if ($row['college'] != '') {
                                                                                                                                            echo 'block';
                                                                                                                                        } else {
                                                                                                                                            echo 'none';
                                                                                                                                        } ?>">
                                                                                                <label for="subEducation">Select College:</label>
                                                                                                <select class="form-control" id="" name="college">
                                                                                                    <option value="">Select</option>
                                                                                                    <option value="Junior" <?php if ($row['college'] == 'Junior') {
                                                                                                                                echo 'selected';
                                                                                                                            } ?>>Junior</option>
                                                                                                    <option value="Senior" <?php if ($row['college'] == 'Senior') {
                                                                                                                                echo 'selected';
                                                                                                                            } ?>>Senior</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div id="selectprof" style="display: <?php if ($row['professional'] != '') {
                                                                                                                                        echo 'block';
                                                                                                                                    } else {
                                                                                                                                        echo 'none';
                                                                                                                                    } ?>;">
                                                                                                <label for="subEducation">Select Professional College:</label>
                                                                                                <select class="form-control" id="" name="professional">
                                                                                                    <option value="">Select</option>
                                                                                                    <option value="ITI" <?php if ($row['professional'] == 'ITI') {
                                                                                                                            echo 'selected';
                                                                                                                        } ?>>ITI</option>
                                                                                                    <option value="Other" <?php if ($row['professional'] == 'Other') {
                                                                                                                                echo 'selected';
                                                                                                                            } ?>>Other</option>
                                                                                                    <option value="Rajarshi Shahu Maharaj Polytechnic, Nashik" <?php if ($row['professional'] == 'Rajarshi Shahu Maharaj Polytechnic, Nashik') {
                                                                                                                                                                    echo 'selected';
                                                                                                                                                                } ?>>Rajarshi Shahu Maharaj Polytechnic, Nashik</option>
                                                                                                    <option value="Karmaveer Adv. Baburao Ganpatrao Thakare College of Engineering (KBTCOE)" <?php if ($row['institute_type'] = 'Karmaveer Adv. Baburao Ganpatrao Thakare College of Engineering (KBTCOE)') {
                                                                                                                                                                                                    echo 'selected';
                                                                                                                                                                                                } ?>>Karmaveer Adv. Baburao Ganpatrao Thakare College of Engineering (KBTCOE)</option>
                                                                                                    <option value="IMRT" <?php if ($row['professional'] == 'Institute of Management Research & Technology (IMRT)') {
                                                                                                                                echo 'selected';
                                                                                                                            } ?>>Institute of Management Research & Technology (IMRT)</option>
                                                                                                    <option value="Sharadchandra Pawarji College of Architecture, Nashik" <?php if ($row['professional'] == 'Sharadchandra Pawarji College of Architecture, Nashik') {
                                                                                                                                                                                echo 'selected';
                                                                                                                                                                            } ?>>Sharadchandra Pawarji College of Architecture, Nashik</option>
                                                                                                    <option value="Agriculture Polytechnic College" <?php if ($row['professional'] == 'Agriculture Polytechnic College') {
                                                                                                                                                        echo 'selected';
                                                                                                                                                    } ?>>Agriculture Polytechnic College</option>
                                                                                                    <option value="Karmayogi Dulaji Sitaram Patil College of Agriculture, Nashik" <?php if ($row['professional'] == 'Karmayogi Dulaji Sitaram Patil College of Agriculture, Nashik') {
                                                                                                                                                                                        echo 'selected';
                                                                                                                                                                                    } ?>>Karmayogi Dulaji Sitaram Patil College of Agriculture, Nashik</option>
                                                                                                    <option value="Law College, Nashik" <?php if ($row['professional'] == 'Law College, Nashik') {
                                                                                                                                            echo 'selected';
                                                                                                                                        } ?>>Law College, Nashik.</option>
                                                                                                    <option value="College of Pharmacy, Nashik" <?php if ($row['professional'] == 'College of Pharmacy, Nashik') {
                                                                                                                                                    echo 'selected';
                                                                                                                                                } ?>>College of Pharmacy, Nashik</option>
                                                                                                    <option value="Institute of Pharmaceutical Sciences" <?php if ($row['professional'] == 'Institute of Pharmaceutical Sciences') {
                                                                                                                                                                echo 'selected';
                                                                                                                                                            } ?>>Institute of Pharmaceutical Sciences</option>
                                                                                                    <option value="Dr. Vasantrao Pawar Medical College, Hospital & Research Centre, Nashik" <?php if ($row['professional'] == 'Dr. Vasantrao Pawar Medical College, Hospital & Research Centre, Nashik') {
                                                                                                                                                                                                echo 'selected';
                                                                                                                                                                                            } ?>>Dr. Vasantrao Pawar Medical College, Hospital & Research Centre, Nashik</option>
                                                                                                    <option value="School of Fine Arts, Nashik" <?php if ($row['professional'] == 'School of Fine Arts, Nashik') {
                                                                                                                                                    echo 'selected';
                                                                                                                                                } ?>>School of Fine Arts, Nashik</option>
                                                                                                    <option value="Maratha Vidya Prasarak Samaj Printing Press, Nashik" <?php if ($row['professional'] == 'Maratha Vidya Prasarak Samaj Printing Press, Nashik') {
                                                                                                                                                                            echo 'selected';
                                                                                                                                                                        } ?>>Maratha Vidya Prasarak Samaj Printing Press, Nashik.</option>
                                                                                                    <option value="Institute of Nursing Education, Nashik" <?php if ($row['professional'] == 'Institute of Nursing Education, Nashik') {
                                                                                                                                                                echo 'selected';
                                                                                                                                                            } ?>>Institute of Nursing Education, Nashik</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                                            <div class="form-group">
                                                                                                <label>First Name</label>
                                                                                                <input type="text" class="form-control" value="<?php echo $row['first_name']; ?>" name="first_name" onkeyup="LettersOnly(this)" readonly>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                                            <div class="form-group">
                                                                                                <label>Last Name</label>
                                                                                                <input type="text" class="form-control" value="<?php echo $row['last_name']; ?>" name="last_name" onkeyup="LettersOnly(this)" readonly>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                                            <div class="form-group">
                                                                                                <label>Contact Number</label>
                                                                                                <input type="text" class="form-control" value="<?php echo $row['contact_no']; ?>" name="contact_no" readonly maxlength="10" pattern="[789][0-9]{9}" onkeyup="NumbersOnly(this)">
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                                            <div class="form-group">
                                                                                                <label>Aadhar Number</label>
                                                                                                <input type="text" class="form-control" value="<?php echo $row['aadhar']; ?>" maxlength="12" readonly name="aadhar" pattern="[0-9]{12}" title="Aadhar number must be 12 digits" onkeyup="NumbersOnly(this)">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                                            <div class="form-group">
                                                                                                <label>Email ID</label>
                                                                                                <input type="email" class="form-control" value="<?php echo $row['email_id']; ?>" readonly name="email_id">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                                            <div class="form-group">
                                                                                                <label for="district_id">District</label>
                                                                                                <select class="form-control" name="district_id" id="district_id" readonly>
                                                                                                    <?php
                                                                                                    if (count($district) > 0) {
                                                                                                        foreach ($district as $key => $value) {
                                                                                                            if ($value['id'] == $row['district_id']) {
                                                                                                                $dist_name = $value['name'];
                                                                                                            }
                                                                                                        }
                                                                                                    } else {
                                                                                                        $dist_name  = "";
                                                                                                    } ?>

                                                                                                    <option value="<?php echo $row['id']; ?>"><?php echo $dist_name; ?></option>


                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                                            <div class="form-group">
                                                                                                <label for="position_id">Taluka</label>
                                                                                                <select class="form-control" name="taluka_id" id="taluka_id" readonly>

                                                                                                    <?php
                                                                                                    if (count($taluka) > 0) {
                                                                                                        foreach ($taluka as $key => $value) {
                                                                                                            if ($value['id'] == $row['taluka_id']) {
                                                                                                                $tal_name = $value['name'];
                                                                                                            }
                                                                                                        }
                                                                                                    } else {
                                                                                                        $tal_name  = "";
                                                                                                    } ?>
                                                                                                    <option value="<?php echo $row['taluka_id']; ?>" selected><?php echo $tal_name; ?></option>


                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                                            <div class="form-group">
                                                                                                <label>Village</label>
                                                                                                <input type="text" class="form-control" value="<?php echo $row['city']; ?>" name="city" readonly>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                                            <div class="form-group">
                                                                                                <label for="position_id">Position</label>
                                                                                                <select class="form-control" name="position_id" id="position_id">
                                                                                                    <option value="">Select Position</option>
                                                                                                    <?php foreach ($position as $key => $value) : ?>
                                                                                                        <option value="<?php echo $value['id']; ?>" <?php if ($value['id'] == $row['position_id']) {
                                                                                                                                                        echo 'Selected';
                                                                                                                                                    } ?>><?php echo $value['name']; ?></option>
                                                                                                    <?php endforeach ?>

                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                                            <div class="form-group">
                                                                                                <label for="position_id">Reference</label>
                                                                                                <select class="form-control" name="reference_id" id="reference_idedit_<?php echo $i; ?>" onchange="hide_ref(this.value,<?php echo $i; ?>)">
                                                                                                    <option value="">Select Reference</option>
                                                                                                    <?php foreach ($reference as $key => $value) : ?>
                                                                                                        <option value="<?php echo $value['id']; ?>" <?php echo ($value['id'] == $row['reference_id']) ? 'selected' : ''; ?>>
                                                                                                            <?php echo $value['name']; ?>
                                                                                                        </option>
                                                                                                    <?php endforeach ?>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12" id="nameInputField11_<?php echo $i; ?>">
                                                                                            <div class="form-group">
                                                                                                <label for="name">Reference Name</label>
                                                                                                <input type="text" class="form-control" name="other_reference_name" value="<?php echo $row['other_reference_name']; ?>" placeholder="Enter Name">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12" id="nameInputField4_<?php echo $i; ?>"  style="display:<?php if($row['reference_id'] =='2'){
                                                                                            echo "none"; 
                                                                                            }else{
                                                                                                echo "block";
                                                                                            } ?>">
                                                                                            <div class="form-group">
                                                                                                <label for="relation">Relation</label>
                                                                                                <select class="form-control" name="relation" id="relation">
                                                                                                    <?php
                                                                                                    // Array of possible relation values
                                                                                                    $relationOptions = array("parent", "sibling", "friend", "other");

                                                                                                    // Current relation value from the database
                                                                                                    $currentRelation = $row['relation'];

                                                                                                    // Loop through the options and generate the dropdown
                                                                                                    foreach ($relationOptions as $option) {
                                                                                                        $selected = ($option == $currentRelation) ? "selected" : "";
                                                                                                        echo "<option value='$option' $selected>$option</option>";
                                                                                                    }
                                                                                                    ?>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12" style="display:<?php if($row['reference_id'] =='2'){
                                                                                            echo "none"; 
                                                                                            }else{
                                                                                                echo "block";
                                                                                            } ?>" id="nameInputField6_<?php echo $i; ?>">
                                                                                            <div class="form-group">
                                                                                                <label for="name">Sabhasad Mobile Number</label>
                                                                                                <input type="text" class="form-control" name="sabhasad_mobile_no" maxlength="10" pattern="[789][0-9]{9}" onkeyup="NumbersOnly(this)" value="<?php echo $row['sabhasad_mobile_no']; ?>" id="name">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12" id="nameInputField5_<?php echo $i; ?>"  style="display:<?php if($row['reference_id'] =='2'){
                                                                                            echo "none"; 
                                                                                            }else{
                                                                                                echo "block";
                                                                                            } ?>">
                                                                                            <div class="form-group">
                                                                                                <label for="name">Sabhasad ID</label>
                                                                                                <input type="text" class="form-control" name="other_reference_id" value="<?php echo $row['other_reference_id']; ?>" id="name" placeholder="Enter Reference ID">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12" id="nameInputField7_<?php echo $i; ?>"  style="display:<?php if($row['reference_id'] =='2' || $row['reference_id']=='1'){
                                                                                            echo "none"; 
                                                                                            }else{
                                                                                                echo "block";
                                                                                            } ?>">
                                                                                            <div class="form-group">
                                                                                                <label for="name">Director Name</label>
                                                                                                <input type="text" class="form-control" name="director_name" value="<?php echo $row['director_name']; ?>" id="name" placeholder="Enter Director Name">
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                                            <div class="form-group">
                                                                                                <label>Qualification</label>
                                                                                                <input type="text" class="form-control" value="<?php echo $row['qualification']; ?>" name="qualification">
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                                            <div class="form-group">
                                                                                                <label for="exam">Assign To EO:</label><br>
                                                                                                <input type="radio" name="assign_to" value="eo" <?php if ($row['assign_to'] == 'eo') echo 'checked'; ?>>
                                                                                                <label for="eo">Individual</label>
                                                                                                &nbsp;&nbsp;
                                                                                                <input type="radio" name="assign_to" value="all" <?php if ($row['assign_to'] == 'all') echo 'checked'; ?>>
                                                                                                <label for="all">All</label>
                                                                                            </div>
                                                                                        </div>
                                                                                        <?php if ($row['assign_to'] == 'all') {
                                                                                        } else {
                                                                                        ?>
                                                                                            <div class="col-lg-4 col-md-4 col-sm-12 col-12" id="eoDropdownedit">
                                                                                                <div>

                                                                                                    <label for="eo_id">Select Education Officer:</label>
                                                                                                    <select class="form-control" id="education-officer" name="eo_id">
                                                                                                        <option value="">Select Education Officer</option>
                                                                                                        <?php foreach ($education as $key => $value) : ?>
                                                                                                            <option value="<?php echo $value['id']; ?>" <?php if ($value['id'] == $row['eo_id']) echo 'selected'; ?>>
                                                                                                                <?php echo $value['name']; ?>
                                                                                                            </option>
                                                                                                        <?php endforeach ?>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                        <?php
                                                                                        }
                                                                                        ?>

                                                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                                            <div class="form-group">
                                                                                                <label for="exam">Exam:</label><br>
                                                                                                <input type="radio" id="done_exam" name="exam" value="done" <?php if ($row['exam'] === 'done') echo 'checked'; ?>>
                                                                                                <label for="done_exam">Done</label>

                                                                                                <input type="radio" id="not_done_exam" name="exam" value="not_done" <?php if ($row['exam'] === 'not_done') echo 'checked'; ?>>
                                                                                                <label for="not_done_exam">Not Done</label>

                                                                                                <!-- Additional Field for Exam Remark -->

                                                                                                <div id="examRemarkField" style="display: none;">
                                                                                                    <label for="exam_remark">Exam Remark:</label>

                                                                                                    <textarea class="form-control" id="exam_remark" placeholder="Enter Remark" name="exam_remark"><?php echo $row['exam_remark']; ?></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                                            <div class="form-group">
                                                                                                <label for="demo_lectures">Demo Lecture:</label><br>
                                                                                                <input type="radio" id="done_demo_lectures" name="demo_lectures" value="done" <?php if ($row['demo_lectures'] === 'done') echo 'checked'; ?>>
                                                                                                <label for="done_demo_lectures">Done</label>

                                                                                                <input type="radio" id="not_done_demo_lectures" name="demo_lectures" value="not_done" <?php if ($row['demo_lectures'] === 'not_done') echo 'checked'; ?>>
                                                                                                <label for="not_done_demo_lectures">Not Done</label>

                                                                                                <!-- Additional Field for Demo Lectures Remark -->
                                                                                                <div id="demoLecturesRemarkField" style="display: none;">
                                                                                                    <label for="demo_lectures_remark">Demo Lectures Remark:</label>


                                                                                                    <textarea class="form-control" id="demo_lectures_remark" placeholder="Enter Remark" name="demo_lectures_remark"><?php echo $row['demo_lectures_remark']; ?></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                                            <div class="form-group">
                                                                                                <label>Sarchitnis Remark</label>
                                                                                                <!-- Replace input with textarea -->
                                                                                                <textarea class="form-control" name="remark"><?php echo $row['remark']; ?></textarea>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer justify-content-center">
                                                                                    <button type="Submit" class="btn btn-primary">Update</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>

                                                                </div>
                                                            </div>





                                                        <?php $i++;
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div>




                                        </div>

                                    </div>



                                </div>

                            </div>




                            <!-- /.container-fluid -->
                    </section>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php $j = 1;

        foreach ($applicantlist as $row1) {
        ?>
            <!-- Modal -->
            <div id="modal-viewData<?php echo $j; ?>" class="modal fade" role="dialog">
                <div class="modal-dialog modal-xl">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title">Applicant Details</h3>
                        </div>
                        <div class="modal-body">
                            <button class="btn btn-success" onclick="printModalContent()" style="float: right; margin-bottom:15px;"><i class="fa fa-print" aria-hidden="true"></i></button>
                            <table class="table table-bordered" style="border-width:2px;">

                                <tbody>
                                    <tr>
                                        <td colspan="4" class="head-td">Personal Details</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Name :</td>
                                        <td><?php echo $row1['first_name'] . ' ' . $row1['last_name']; ?></td>
                                        <td class="font-weight-bold">Email Id :</td>
                                        <td> <?php echo $row1['email_id']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Mobile Number :</td>
                                        <td><?php echo $row1['contact_no']; ?></td>
                                        <td class="font-weight-bold">Aadhar Number :</td>
                                        <td><?php echo $row1['aadhar']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">District :</td>
                                        <td><?php echo $row1['district_name']; ?></td>
                                        <td class="font-weight-bold">Taluka :</td>
                                        <td><?php echo $row1['taluka_name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Village :</td>
                                        <td><?php echo $row1['city']; ?></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="head-td">Applied For</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Reference :</td>
                                        <td><?php echo $row1['reference_name']; ?></td>
                                        <?php
                                        if ($row1['reference_id'] == 1) { ?>
                                            <td class="font-weight-bold">Sabhasad Name :</td>
                                            <td><?php echo $row1['other_reference_name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Relation :</td>
                                        <td><?php echo $row1['relation']; ?></td>
                                        <td class="font-weight-bold">Sabhasad Mobile Number :</td>
                                        <td><?php echo $row1['sabhasad_mobile_no']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Sabhasad ID :</td>
                                        <td><?php echo $row1['other_reference_id']; ?></td>
                                    <?php
                                        } elseif ($row1['reference_id'] == 2 || $row1['reference_id'] == 4) {
                                    ?>
                                        <td class="font-weight-bold">Reference Name :</td>
                                        <td><?php echo $row1['other_reference_name']; ?></td>

                                    </tr>

                                <?php } elseif ($row['reference_id'] == 3) {
                                ?>
                                    <td class="font-weight-bold">Sabhasad Name :</td>
                                    <td><?php echo $row['other_reference_name']; ?></td>


                                    <tr>
                                        <td class="font-weight-bold">Sabhasad Name :</td>
                                        <td><?php echo $row['other_reference_name']; ?></td>
                                        <td class="font-weight-bold"> Director Name </td>
                                        <td><?php echo $row1['director_name']; ?></td>
                                    </tr>

                                    <tr>
                                        <td class="font-weight-bold">Relation :</td>
                                        <td><?php echo $row1['relation']; ?></td>
                                        <td class="font-weight-bold"> Sabhasad Mobile Number </td>
                                        <td><?php echo $row1['sabhasad_mobile_no']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Sabhasad ID :</td>
                                        <td><?php echo $row1['other_reference_id']; ?></td>
                                    <?php } ?>
                                    <td class="font-weight-bold"> Position</td>
                                    <td><?php echo $row1['name']; ?></td>
                                    </tr>

                                    <tr>
                                        <td colspan="4" class="head-td">Applied For</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Institute :</td>
                                        <td><?php echo $row1['institute_id']; ?></td>
                                        <?php if ($row['institute_id'] == 'school') {  ?>
                                            <td class="font-weight-bold">Medium :</td>
                                            <td><?php echo $row1['education']; ?></td>
                                        <?php } elseif ($row1['institute_id'] == 'college') {
                                        ?>
                                            <td class="font-weight-bold">College :</td>
                                            <td><?php echo $row1['college']; ?></td>
                                        <?php  } elseif ($row1['institute_id'] == 'Professional-College') {
                                        ?>
                                            <td class="font-weight-bold">College Name :</td>
                                            <td><?php echo $row1['professional']; ?></td>
                                        <?php  }
                                        ?>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Qualification</td>
                                        <td><?php echo $row1['qualification']; ?></td>

                                        <td class="font-weight-bold">Exam :</td>
                                        <td> <?php echo $row1['exam']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Demo Lectures :</td>
                                        <td><?php echo $row1['demo_lectures']; ?></td>
                                        <td class="font-weight-bold">Assign To EO :</td>
                                        <td><?php if ($row1['assign_to'] == 'all') {
                                                echo $row1['assign_to'];
                                            } else {
                                                echo $row1['eo_name'];
                                            }
                                            ?></td>

                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Background :</td>
                                        <td> <?php echo $row1['background']; ?></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="head-td">Other Information</td>
                                    </tr>
                                    <tr>
                                        <?php if ($row1['exam'] == 'done') {
                                        ?>
                                            <td class="font-weight-bold">Exam Remark :</td>
                                            <td><?php echo $row1['exam_remark']; ?></td>
                                        <?php
                                        }   ?>
                                        <?php if ($row1['demo_lectures'] == 'done') {
                                        ?>
                                            <td class="font-weight-bold">Demo Lecture Remark :</td>
                                            <td><?php echo $row1['demo_lectures_remark']; ?></td>
                                        <?php } ?>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Sarchitnis Remark:</td>
                                        <td><?php echo $row1['remark']; ?></td>
                                        <td class="font-weight-bold">Date :</td>
                                        <td><?php $this->load->helper('date');

                                            $originalDate  = $row['reg_date_time'];
                                            $newDate = date("d-m-Y", strtotime($originalDate));
                                            ?>

                                            <?php echo $newDate; ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="head-td">Documents</td>
                                    </tr>
                                    <?php
                                    $applicant_id = $row1['id'];
                                    $this->load->model('Applicant_Model');
                                    $document = $this->Applicant_Model->getAllDocument($applicant_id);

                                    foreach ($document as $value) {
                                        //  print_r($value['resume']);

                                    ?>
                                        <tr>

                                            <td colspan="2" class="font-weight-bold"><?php echo $value['type']; ?> :</td>
                                            <td colspan="2"><?php
                                                            $resume = $value['resume'];
                                                            if (!empty($resume)) {
                                                                $fileExtension = pathinfo($resume, PATHINFO_EXTENSION);
                                                                $baseURL = base_url();
                                                                $pdfURL = $baseURL . $resume;
                                                                // Display PDF icon if the file is a PDF
                                                                if (strtolower($fileExtension) === 'pdf') {
                                                                    echo '<a href="' . $pdfURL . '" target="_blank"><img src="' . $baseURL . 'upload/pdf.png" alt="PDF Icon" width="50" height="50"> || </a>';
                                                                } // Display document icon if the file is not a PDF
                                                                else {
                                                                    echo ' <a href="' . $pdfURL . '" target="_blank"><img src="' . $baseURL . 'upload/document.png" alt="Document Icon" width="50" height="50"> || </a>';
                                                                }
                                                                echo '<a href="' . $pdfURL . '" download>Download</a>';
                                                            } else {
                                                                // Certificate1 is not uploaded, display a message in red.
                                                                echo '<p style="color: red;">Resume not uploaded</p>';
                                                            }
                                                            ?>
                                            </td>

                                        </tr>

                                    <?php } ?>

                                </tbody>
                            </table>
                            <div class="row" style="justify-content: center;">
                                <div class="col-md-6 text-center p-1" style="border: 4px solid #026C7C;">

                                    <form method="post" action="<?php echo base_url() . 'Applicant/updateStatusRemark'; ?>">
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="id" value="<?php echo $row1['id']; ?>">
                                        </div>
                                        <div class="form-group" style="margin-bottom: 0; margin:0px 20px 0px 20px;">
                                            <label for="exampleFormControlSelect1" style="margin-bottom: 30px!important; font-size:20px;">Change Status</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="status">
                                                <option value="Pending" <?php if ($row1['status'] == 'Pending') {
                                                                                echo 'Selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Pending</option>
                                                <option value="In_Process" <?php if ($row1['status'] == 'In_Process') {
                                                                            echo 'Selected';
                                                                        } else {
                                                                            echo '';
                                                                        } ?>>In-Process</option>
                                                <option value="Selected" <?php if ($row1['status'] == 'Selected') {
                                                                                echo 'Selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Selected</option>
                                                <option value="Rejected" <?php if ($row1['status'] == 'Rejected') {
                                                                                echo 'Selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Rejected</option>

                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary form-button-cls">Submit</button>


                                    </form>

                                </div>
                            </div>




                        </div>

                    </div>

                </div>
            </div>
        <?php
            $j++;
        }
        ?>

        <?php include 'public/footer.php'; ?>



    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        //get taluka
        $('#district_list').change(function() {
            var district_id = $('#district_list').val();
            //alert(district_id);

            $.ajax({
                url: '<?php echo base_url() . 'Applicant/fetch_taluka'; ?>',
                method: 'post',
                data: {
                    district_id: district_id
                },
                success: function(response) {
                    //alert(response); // Display the response in an alert
                    //console.log(response);
                    $('#taluka_list').html(response);

                    //alert('hii');
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert('Error: ' + errorThrown);
                    // error handler here
                }
            });
        });
    </script>



    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php include 'public/script.php'; ?>


    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script> -->
    <!-- <script src="<?php echo base_url() . 'plugins/jquery/jquery.min.js'; ?>"></script> -->
    <!-- Bootstrap 4 -->
    <!-- <script src="<?php echo base_url() . 'plugins/bootstrap/js/bootstrap.bundle.min.js'; ?>"></script> -->
    <!-- DataTables  & Plugins -->
    <script src="<?php echo base_url() . 'plugins/datatables/jquery.dataTables.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'plugins/datatables-responsive/js/dataTables.responsive.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'plugins/datatables-responsive/js/responsive.bootstrap4.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'plugins/datatables-buttons/js/dataTables.buttons.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'plugins/datatables-buttons/js/buttons.bootstrap4.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'plugins/jszip/jszip.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'plugins/pdfmake/pdfmake.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'plugins/pdfmake/vfs_fonts.js'; ?>"></script>
    <script src="<?php echo base_url() . 'plugins/datatables-buttons/js/buttons.html5.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'plugins/datatables-buttons/js/buttons.print.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'plugins/datatables-buttons/js/buttons.colVis.min.js'; ?>"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>



    <script>
        // Function to print modal content
        function printModalContent() {
            // Open the print window
            window.print();
        }
    </script>
    <script>
        // jQuery script to show/hide additional fields based on radio button selection
        $(document).ready(function() {
            // Check initial state of Exam radio buttons
            if ($('#done_exam').prop('checked')) {
                $('#examRemarkField').show();
            }

            // Check initial state of Demo Lectures radio buttons
            if ($('#done_demo_lectures').prop('checked')) {
                $('#demoLecturesRemarkField').show();
            }

            $('input[name="exam"]').change(function() {
                if ($(this).val() === 'done') {
                    $('#examRemarkField').show();
                } else {
                    $('#examRemarkField').hide();
                }
            });

            $('input[name="demo_lectures"]').change(function() {
                if ($(this).val() === 'done') {
                    $('#demoLecturesRemarkField').show();
                } else {
                    $('#demoLecturesRemarkField').hide();
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Hide the remark fields initially
            $("#exam-remark").hide();
            $("#demo-remark").hide();

            // Show/hide remark fields on radio button click
            $("input[name='exam']").change(function() {
                if ($(this).val() == 'done') {
                    $("#exam-remark").show();
                } else {
                    $("#exam-remark").hide();
                }
            });

            $("input[name='demo_lectures']").change(function() {
                if ($(this).val() == 'done') {
                    $("#demo-remark").show();
                } else {
                    $("#demo-remark").hide();
                }
            });
        });
    </script>
    <script>
        var eoRadio = document.getElementById("done");
        var eoDropdown = document.getElementById("eoDropdown");

        eoRadio.addEventListener("click", function() {
            if (eoRadio.checked) {
                eoDropdown.style.display = "block";
            }
        });

        var allRadio = document.getElementById("all");
        allRadio.addEventListener("click", function() {
            eoDropdown.style.display = "none";
        });
    </script>



    <script>
        function updateStatus(newStatus, applicantId) {
            var url = "<?php echo base_url() . 'Applicant/status_update/'; ?>" + applicantId;
            var data = {
                'status': newStatus
            };

            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                success: function(response) {
                    // Handle the response if needed
                    console.log(response);
                },
                error: function() {
                    // Handle errors if any
                    console.log('Error occurred.');
                }
            });
        }
    </script>


    <script>
        $(function() {
            $("#example1").DataTable();

        });
    </script>
    <script>
        function DemoCtrl() {
            this.foo = "foo";

            CKEDITOR.editorConfig = function(config) {
                config.extraPlugins = "confighelper";
            };
            CKEDITOR.replace("editor1");
        }

        angular
            .module("gaigDemo", ["gaigUiBootstrap"])
            .controller("DemoCtrl", DemoCtrl);
    </script>
    <script>
        const d = new Date();
        document.getElementById("demo").innerHTML = d;
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#success-alert').fadeIn().delay(1000).fadeOut();
            $('#danger-alert').fadeIn().delay(1000).fadeOut();
        });
    </script>





    <script>
        function hide_ref(selectedValue, id) {
            // alert(selectedValue);
            // alert(id);
            // You can implement your logic here based on the selected value
            // For example, if you want to hide/show an element based on a specific value:
            // var elementToHideShow = document.getElementById('elementToHideShowId');
            var referenceDropdownEdit = document.getElementById("reference_idedit_" + id);

            // if (referenceDropdownEdit) {
            //     // Element found, you can do something with it
            //     alert("Element selected properly with ID: reference_idedit_" + id);
            // } else {
            //     // Element not found
            //     alert("Element not found with ID: reference_idedit_" + id);
            // }

            var nameInputField11 = document.getElementById("nameInputField11_" + id);
            var nameInputField4 = document.getElementById("nameInputField4_" + id);
            var nameInputField5 = document.getElementById("nameInputField5_" + id);
            var nameInputField6 = document.getElementById("nameInputField6_" + id);
            var nameInputField7 = document.getElementById("nameInputField7_" + id);
            var nameInputField333 = document.getElementById("nameInputField333_" + id);


            if (selectedValue === '1') {


                nameInputField11.style.display = 'block';
                nameInputField4.style.display = 'block';
                nameInputField5.style.display = 'block';
                nameInputField6.style.display = 'block';
                nameInputField7.style.display = 'none';
            } else if (selectedValue === '2') {
                nameInputField11.style.display = 'block';
                nameInputField4.style.display = 'none';
                nameInputField5.style.display = 'none';
                nameInputField6.style.display = 'none';
                nameInputField7.style.display = 'none';
            } else if (selectedValue === '4') {
                nameInputField11.style.display = 'block';
                nameInputField4.style.display = 'none';
                nameInputField5.style.display = 'none';
                nameInputField6.style.display = 'none';
                nameInputField7.style.display = 'none';
            } else if (selectedValue === '3') {
                nameInputField11.style.display = 'block';
                nameInputField4.style.display = 'block';
                nameInputField5.style.display = 'block';
                nameInputField6.style.display = 'block';
                nameInputField7.style.display = 'block';
            } else {
                nameInputField11.style.display = 'block';
                nameInputField4.style.display = 'none';
                nameInputField5.style.display = 'none';
                nameInputField6.style.display = 'none';
                nameInputField7.style.display = 'none';
            }
        }
    </script>
    <script>
        // Add an event listener to the reference dropdown
        const referenceDropdown = document.getElementById('reference_id');
        const nameInputField = document.getElementById('nameInputField');

        referenceDropdown.addEventListener('change', function() {
            if (referenceDropdown.value !== '') {
                // nameInputField.style.display = 'block';

                if (referenceDropdown.value == '1') {
                    nameInputField.style.display = 'block';
                    nameInputField2.style.display = 'block';
                    nameInputField3.style.display = 'block';
                    nameInputField10.style.display = 'block';
                    nameInputField12.style.display = 'none';
                    nameInputField13.style.display = 'none';
                    nameInputField312.style.display = 'none';
                } else if (referenceDropdown.value == '2') {
                    nameInputField.style.display = 'block';
                    nameInputField2.style.display = 'none';
                    nameInputField3.style.display = 'none';
                    nameInputField10.style.display = 'none';
                    nameInputField12.style.display = 'none';
                    nameInputField13.style.display = 'none';
                    nameInputField312.style.display = 'none';
                } else if (referenceDropdown.value == '4') {
                    nameInputField.style.display = 'block';
                    nameInputField2.style.display = 'none';
                    nameInputField3.style.display = 'none';
                    nameInputField10.style.display = 'none';
                    nameInputField12.style.display = 'none';
                    nameInputField13.style.display = 'none';
                    nameInputField312.style.display = 'none';
                } else if (referenceDropdown.value == '3') {
                    nameInputField.style.display = 'block';
                    nameInputField2.style.display = 'block';
                    nameInputField3.style.display = 'block';
                    nameInputField10.style.display = 'block';
                    nameInputField312.style.display = 'none';
                    nameInputField12.style.display = 'block';

                } else if (referenceDropdown.value == '5') {
                    nameInputField.style.display = 'block';
                    nameInputField2.style.display = 'block';
                    nameInputField3.style.display = 'block';
                    nameInputField312.style.display = 'block';
                    nameInputField10.style.display = 'none';
                    nameInputField12.style.display = 'none';

                } else if (referenceDropdown.value == '5') {
                    nameInputField.style.display = 'block';
                    nameInputField2.style.display = 'block';
                    nameInputField3.style.display = 'block';
                    nameInputField312.style.display = 'block';
                    nameInputField10.style.display = 'none';
                    nameInputField12.style.display = 'none';

                }

            } else {
                nameInputField.style.display = 'none';
            }
        });
    </script>



    <!-- 06 -->
    <script>
        $(document).ready(function() {
            $("#education").change(function() {
                var op = $(this).val();
                // $("#selectmedium").css("display", "block");
                // $("#selectcollege").css("display", "block");
                // $("#selectprofessional").css("display", "block");

                if (op === "school") {
                    $("#selectmedium").css("display", "block");
                    $("#selectcollege").css("display", "none");
                    $("#selectprofessional").css("display", "none");
                } else if (op === "college") {
                    $("#selectcollege").css("display", "block");
                    $("#selectmedium").css("display", "none");
                    $("#selectprofessional").css("display", "none");
                } else if (op === "Professional-College") {
                    $("#selectprofessional").css("display", "block");
                    $("#selectcollege").css("display", "none");
                    $("#selectmedium").css("display", "none");
                }
            });
        });
    </script>
    <!-- 06  -->

    <script>
        $(document).ready(function() {
            $("#education2").change(function() {
                var op = $(this).val();
                // $("#selectmedium").css("display", "block");
                // $("#selectcollege").css("display", "block");
                // $("#selectprofessional").css("display", "block");

                if (op === "school") {
                    $("#selectmedium2").css("display", "block");
                    $("#selectcollege2").css("display", "none");
                    $("#selectprof").css("display", "none");
                } else if (op === "college") {
                    $("#selectcollege2").css("display", "block");
                    $("#selectmedium2").css("display", "none");
                    $("#selectprof").css("display", "none");
                } else if (op === "Professional-College") {
                    $("#selectprof").css("display", "block");
                    $("#selectcollege2").css("display", "none");
                    $("#selectmedium2").css("display", "none");
                }
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $("#position").change(function() {
                var op = $("#position option:selected").text();
                // alert(op);
                if (op === "Other") {
                    $("#other_position").css("display", "block");

                } else {

                    $("#other_position").css("display", "none");
                }
            });
        });
    </script>


    <script>
        document.getElementById("position_id").addEventListener("change", function() {
            var selectedValue = this.value;
            if (selectedValue === "other") {
                document.getElementById("otherPositionField").style.display = "block";
            } else {
                document.getElementById("otherPositionField").style.display = "none";
            }
        });
    </script>


    <script type="text/javascript">
        function LettersOnly(input) {
            var regex = /[^a-zA-Z ]/gi;
            input.value = input.value.replace(regex, "");
        }

        function NumbersOnly(input) {
            var regex1 = /[^0-9]/gi;
            input.value = input.value.replace(regex1, "");

        }
    </script>

    <script>
        const instituteDropdown = document.getElementById("institute_id");
        const schoolDropdown = document.getElementById("schoolDropdown");

        instituteDropdown.addEventListener("change", function() {
            if (instituteDropdown.value === "school") {
                schoolDropdown.style.display = "block";
            } else {
                schoolDropdown.style.display = "none";
            }
        });
    </script>

    <script>
        // D E V L O P E R N A M E : A R A J  S H E K H  D A T E : 08/12/2023
        function showFields(instituteType) {
            if (instituteType === 'school') {
                document.getElementById('selectmedium').style.display = 'block';
                document.getElementById('selectcollege').style.display = 'none';
                document.getElementById('selectprofessional').style.display = 'none';
            } else if (instituteType === 'college') {
                document.getElementById('selectmedium').style.display = 'none';
                document.getElementById('selectcollege').style.display = 'block';
                document.getElementById('selectprofessional').style.display = 'none';
            } else if (instituteType === 'Professional-College') {
                document.getElementById('selectmedium').style.display = 'none';
                document.getElementById('selectcollege').style.display = 'none';
                document.getElementById('selectprofessional').style.display = 'block';
            }
        }
    </script>
    <script>
        function openModal(id) {
            // Use the 'id' variable in your JavaScript code
            // console.log("Clicked button with id: " + id);
            // $('#idInput').val(id);
            $('#idDisplay').text(id);
            $('#modal-infoview').modal('show');

        }
    </script>

</body>

</html>