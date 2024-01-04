<!DOCTYPE html>
<html lang="en">
<?php include 'public/head.php'; ?>

<style>
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

    .bb-line {
        width: 100%;
        height: 1px;
        background: #fff;
        margin-top: 10px;
        margin-bottom: 10px;

    }

    .modal-header {
        background-color: #026C7C;
    }

    .modal-title {
        color: #fff;
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

                            echo "<h1 class='m-0'>$name Applicant List</h1>";
                            ?>

                            <!-- <h1 class="m-0">Applicant</h1> -->
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url() . 'Home/dashboard'; ?>">Home<p style="margin-bottom:0px;padding-bottom:0px;"> </a></li>
                                <li class="breadcrumb-item active">Applicant</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
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
                                                        <select class="form-control" name="status" required="Select......">
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
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> Add New Applicant</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade bd-example-modal-lg custom-modal" id="modal-default">
                                    <div class="modal-dialog modal-xl"> <!-- You can change 'modal-xl' to your preferred width class -->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" style="margin: left 200px !important;">Add New Applicant </h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true" style="color: #fff;">&times;</span>
                                                </button>
                                            </div>
                                            <form method="post" action="<?php echo base_url() . 'Applicant/saveApplicant' ?>" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label>First Name</label>
                                                                <input type="text" class="form-control" placeholder="Enter First Name" name="first_name" onkeyup="LettersOnly(this)" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label>Last Name</label>
                                                                <input type="text" class="form-control" placeholder="Enter Last Name" name="last_name" onkeyup="LettersOnly(this)" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label>Contact Number</label>
                                                                <input type="text" class="form-control" placeholder="Enter Contact Number" name="contact_no" maxlength="10" pattern="[789][0-9]{9}" onkeyup="NumbersOnly(this)" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label>Aadhar Number</label>
                                                                <input type="text" class="form-control" placeholder="Enter Aadhar Number" maxlength="12" name="aadhar" pattern="[0-9]{12}" title="Aadhar number must be 12 digits" onkeyup="NumbersOnly(this)" required>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label>Email ID</label>
                                                                <input type="email" class="form-control" placeholder="Enter Email Id" name="email_id" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                            <label for="district_id">District</label>
                                                            <select class="form-control" name="district_id" id="district_list" required>
                                                                <option value="">Select District</option>
                                                                <?php foreach ($district as $key => $value) : ?>
                                                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                            <label>Taluka</label>
                                                            <select class="form-control" name="taluka_id" id="taluka_list">
                                                                <option>Select Taluka</option>
                                                            </select>


                                                            <!-- <select class="form-control" name="taluka_id" id="taluka_id" required>
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
                                                                <label>Village</label>
                                                                <input type="text" class="form-control" placeholder="Enter Village Name" name="city" required>
                                                            </div>
                                                        </div>
                                                        <!-- <label for="institute_id">Institute</label>
                                                            <select class="form-control" name="institute_id" id="institute_id" required>
                                                                <option value="">Select Institute</option>
                                                                <?php foreach ($institute as $key => $value) : ?>
                                                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                                                <?php endforeach; ?>
                                                            </select> -->

                                                        <!-- <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                        
                                                            <label for="education">Select Institute:</label>
                                                            <select class="form-control" id="education" name="institute_id">
                                                                <option value="">Select</option>
                                                                <option value="school">School</option>
                                                                <option value="college">College</option>
                                                                <option value="other">Professional College</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12" id="selectmedium" style="display: none;">
                                                            <div>
                                                                <label for="subEducation">Select Medium:</label>
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
                                                                <select class="form-control" id="" name="college">
                                                                    <option value="">Select</option>
                                                                    <option value="Junior">Junior</option>
                                                                    <option value="Senior">Senior</option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12" id="selectprofessional" style="display: none;">
                                                            <div>
                                                                <label for="subEducation">Select Professional College:</label>
                                                                <select class="form-control" id="" name="professional">
                                                                    <option value="">Select</option>

                                                                    <option value="RajarshiShahuMaharaj">Rajarshi Shahu Maharaj Polytechnic, Nashik</option>
                                                                    <option value="KBTCOE">Karmaveer Adv. Baburao Ganpatrao Thakare College of Engineering (KBTCOE)</option>
                                                                    <option value="IMRT">Institute of Management Research & Technology (IMRT)</option>
                                                                    <option value="SharadchandraPawarji">Sharadchandra Pawarji College of Architecture, Nashik</option>
                                                                    <option value="AgriculturePolytechnicCollege">Agriculture Polytechnic College</option>
                                                                    <option value="KarmayogiDulaji">Karmayogi Dulaji Sitaram Patil College of Agriculture, Nashik</option>
                                                                    <option value="LawCollegeNashik">Law College, Nashik.</option>
                                                                    <option value="CollegeofPharmacy, Nashik">College of Pharmacy, Nashik</option>
                                                                    <option value="InstituteofPharmaceutical Sciences">Institute of Pharmaceutical Sciences</option>
                                                                    <option value="DrVasantrao">Dr. Vasantrao Pawar Medical College, Hospital & Research Centre, Nashik</option>
                                                                    <option value="SchoolNashik">School of Fine Arts, Nashik</option>
                                                                    <option value="Institute_nursing">Institute of Nursing Education, Nashik</option>
                                                                    <option value="Maratha">Maratha Vidya Prasarak Samaj Printing Press, Nashik</option>

                                                                    <option value="ITI">ITI</option>
                                                                    <option value="Other">Other</option>


                                                                </select>
                                                            </div>
                                                        </div> -->
                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">


                                                            <div class="form-group">
                                                                <label for="position_id">Position</label>
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
                                                            <label for="education">Select Institute:</label>
                                                            <div class="form-group">

                                                                <input type="radio" id="schoolRadio" name="institute_id" value="school" onclick="showFields('school')"><b> School </b>&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" id="collegeRadio" name="institute_id" value="college" onclick="showFields('college')"><b> College</b> &nbsp;&nbsp;&nbsp;
                                                                <input type="radio" id="otherRadio" name="institute_id" value="Professional-College" onclick="showFields('Professional-College')"> <b>Professional College</b>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12" id="selectmedium" style="display: none;">
                                                            <div>
                                                                <label for="subEducation">Select Medium:</label>
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
                                                                <label for="name">Other Positon</label>
                                                                <input type="text" class="form-control" name="other_position" id="name" placeholder="Enter Other Position">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label>Qualification</label>
                                                                <input type="text" class="form-control" placeholder="Enter qualification" name="qualification" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label for="position_id">Reference</label>
                                                                <select class="form-control" name="reference_id" id="reference_id" required>
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
                                                                <label for="name">Relation</label>
                                                                <input type="text" class="form-control" name="relation" id="relation" placeholder="Enter Relation">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12" id="nameInputField3" style="display: none;">
                                                            <div class="form-group">
                                                                <label for="name">Sabhasad Mobile Number</label>
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



                                                       

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label for="background">Background:</label><br>
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
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label for="exam">Assign To EO:</label><br>
                                                                <input type="radio" id="done" name="assign_to" value="eo">
                                                                <label for="eo">Individual</label>
                                                                &nbsp;&nbsp;
                                                                <input type="radio" id="all" name="assign_to" value="all">
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
                                                                <label>Sarchitnis Remark</label>
                                                                <input type="text" class="form-control" placeholder="Enter Sarchitnis Remark" name="remark" required>
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
                                                <th>Name</th>
                                                <th>Contact No</th>
                                                <th>Village</th>
                                                <th>Institute</th>
                                                <th>Position</th>

                                                <!-- <th>Other Information</th> -->

                                                <!-- <th>Resume</th> -->

                                                <!-- <th>Remark</th> -->
                                                <th>Documents</th>
                                                <th>Education Ofiicer</th>
                                                <th> Status</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                            foreach ($applicantlist as $row) { ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <!-- <a data-toggle="modal" data-target="#modal-edit<?php echo $row['id']; ?>" style="color: blue;"> -->
                                                    <td>
                                                        <?php echo $row['first_name'] . ' ' . $row['last_name']; ?>
                                                    </td>
                                                    <td><?php echo $row['contact_no']; ?></td>
                                                    <td><?php echo $row['city']; ?></td>
                                                    <td><?php echo $row['institute_id']; ?></td>
                                                    <td><?php echo $row['name']; ?></td>

                                                    <!-- <td><?php echo $row['remark']; ?></td> -->


                                                    <!-- <td>
                                                            <?php
                                                            //if (isset($row['status_remark']) && !empty($row['status_remark'])) {
                                                            //echo $row['status_remark'];
                                                            //}else {

                                                            // echo $row['status_remark'];
                                                            //}
                                                            ?>
                                                        </td> -->
                                                    <td>
                                                        <a href="<?php echo base_url() . 'certificate/' . $row['id']; ?>">Add Documents
                                                    </td>
                                                    <td>
                                                        <?php if ($row['assign_to'] == 'all') {
                                                            echo $row['assign_to'];
                                                        } else {
                                                            echo $row['eo_name'];
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['status']; ?>
                                                    </td>


                                                    <td>
                                                        <a class="btn btn-success" data-toggle="modal" data-target="#modal-info<?php echo $row['id']; ?>">
                                                            <i class="fas fa-eye"></i>
                                                        </a> ||

                                                        <a class="btn btn-warning" data-toggle="modal" data-target="#modal-status<?php echo $row['id']; ?>">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <!-- ||

                                                            <a href="<?php echo base_url() . 'Applicant/deleteUser/' . $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">
                                                                <i class="fas fa-trash"></i>
                                                            </a> -->

                                                    </td>
                                                </tr>


                                </div>

                            </div>

                            <div class="modal fade" id="modal-status<?php echo $row['id']; ?>">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"> Details : </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>

                                        </div>
                                        <div class="modal-body pl-10">
                                            <form method="post" action="<?php echo base_url() . 'Applicant/updateStatusRemark' ?>" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <input type="hidden" value="<?php echo $row['id']; ?>" id="id" class="form-control" name="id">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 ">

                                                            <label>
                                                                Select Status:
                                                            </label>
                                                            <br>

                                                            <?php
                                                            $status = $row['status'];
                                                            $status_options = array(
                                                                'Pending' => 'Pending',
                                                                'Selected' => 'Selected',
                                                                'In_Process' => 'In_Process',
                                                                'Rejected' => 'Rejected'
                                                            );
                                                            ?>
                                                            <select name="status" id="status_dropdown" class="form-control">
                                                                <?php
                                                                foreach ($status_options as $option_value => $option_label) {
                                                                    $selected = ($status == $option_value) ? 'selected' : '';
                                                                    echo "<option value='$option_value' $selected>$option_label</option>";
                                                                }
                                                                ?>
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                                                            <label>Remark:</label>
                                                            <textarea class="form-control" placeholder="Enter Remark" name="status_remark" required></textarea>


                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-center">
                                                    <button type="Submit" class="btn btn-primary">Submit</button>
                                                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->

                                                </div>
                                        </div>
                                        </form>




                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal fade" id="modal-info<?php echo $row['id']; ?>">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Applicant Details : </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>

                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group row ">
                                            <div class="col-md-6 row">
                                                <div class="col-md-6"> <b>Name :</b></div>
                                                <div class="col-md-6"> <?php echo $row['first_name'] . ' ' . $row['last_name']; ?></div>

                                            </div>

                                            <div class="col-md-6 row">
                                                <div class="col-md-6"> <b>Email Id :</b></div>
                                                <div class="col-md-6"> <?php echo $row['email_id']; ?></div>

                                            </div>
                                            <div class="bb-line"></div>
                                            <div class="col-md-6 row">
                                                <div class="col-md-6"> <b> Mobile No :</b></div>
                                                <div class="col-md-6"> <?php echo $row['contact_no']; ?></div>

                                            </div>
                                            <div class="col-md-6 row">
                                                <div class="col-md-6"> <b> Aadhar No :</b></div>
                                                <div class="col-md-6"> <?php echo $row['aadhar']; ?> </div>

                                            </div>
                                            <div class="bb-line"></div>
                                            <div class="col-md-6 row">
                                                <div class="col-md-6"> <b> District: </b></div>
                                                <div class="col-md-6"><?php echo $row['district_name']; ?> </div>

                                            </div>
                                            <div class="col-md-6 row">
                                                <div class="col-md-6"> <b>Taluka: </b></div>
                                                <div class="col-md-6"><?php echo $row['taluka_name']; ?> </div>

                                            </div>
                                            <div class="bb-line"></div>
                                            <div class="col-md-6 row">
                                                <div class="col-md-6"> <b> Village: </b></div>
                                                <div class="col-md-6"> <?php echo $row['city']; ?> </div>

                                            </div>
                                            <div class="col-md-6 row">
                                                <div class="col-md-6"> <b>Reference : </b></div>
                                                <div class="col-md-6"> <?php echo $row['reference_name']; ?></div>

                                            </div>
                                            <div class="bb-line"></div>
                                            <?php
                                                if ($row['reference_id'] == 1) { ?>
                                                <div class="col-md-6 row">
                                                    <div class="col-md-6"> <b>Sabhasad Name : </b></div>
                                                    <div class="col-md-6"> <?php echo $row['other_reference_name']; ?></div>

                                                </div>



                                                <div class="col-md-6 row">
                                                    <div class="col-md-6"> <b>Relation : </b></div>
                                                    <div class="col-md-6"> <?php echo $row['relation']; ?></div>

                                                </div>
                                                <div class="bb-line"></div>
                                                <div class="col-md-6 row">
                                                    <div class="col-md-6"> <b> Sabhasad Mobile Number :</b></div>
                                                    <div class="col-md-6"> <?php echo $row['sabhasad_mobile_no']; ?> </div>

                                                </div>

                                                <div class="col-md-6 row">
                                                    <div class="col-md-6"> <b> Sabhasad ID : </b></div>
                                                    <div class="col-md-6"> <?php echo $row['other_reference_id']; ?></div>

                                                </div>
                                                <div class="bb-line"></div>
                                            <?php
                                                } elseif ($row['reference_id'] == 2 || $row['reference_id'] == 4) {
                                            ?>
                                                <div class="col-md-6 row">
                                                    <div class="col-md-6"> <b> Reference Name :</b></div>
                                                    <div class="col-md-6"> <?php echo $row['other_reference_name']; ?></div>

                                                </div>

                                            <?php } elseif ($row['reference_id'] == 3) {
                                            ?>
                                                <div class="col-md-6 row">
                                                    <div class="col-md-6"> <b> Sabhasad Name :</b></div>
                                                    <div class="col-md-6"> <?php echo $row['other_reference_name']; ?> </div>

                                                </div>
                                                <div class="bb-line"></div>
                                                <div class="col-md-6 row">
                                                    <div class="col-md-6"> <b>Director Name : </b></div>
                                                    <div class="col-md-6"> <?php echo $row['director_name']; ?></div>

                                                </div>

                                                <div class="col-md-6 row">
                                                    <div class="col-md-6"> <b> Relation :</b></div>
                                                    <div class="col-md-6"> <?php echo $row['relation']; ?></div>

                                                </div>
                                                <div class="bb-line"></div>
                                                <div class="col-md-6 row">
                                                    <div class="col-md-6"> <b> Sabhasad Mobile Number : </b></div>
                                                    <div class="col-md-6"> <?php echo $row['sabhasad_mobile_no']; ?> </div>

                                                </div>

                                                <div class="col-md-6 row">
                                                    <div class="col-md-6"> <b> Sabhasad ID :</b></div>
                                                    <div class="col-md-6"><?php echo $row['other_reference_id']; ?> </div>

                                                </div>
                                                <div class="bb-line"></div>
                                            <?php } ?>


                                            <div class="col-md-6 row">
                                                <div class="col-md-6"> <b>Position : </b></div>
                                                <div class="col-md-6"> <?php echo $row['name']; ?> </div>

                                            </div>

                                            <div class="col-md-6 row">
                                                <div class="col-md-6"> <b>Institute : </b></div>
                                                <div class="col-md-6"> <?php echo $row['institute_id']; ?></div>


                                            </div>
                                            <div class="bb-line"></div>
                                            <?php if ($row['institute_id'] == 'school') {  ?>
                                                <div class="col-md-6 row">
                                                    <div class="col-md-6"> <b>Medium : </b></div>
                                                    <div class="col-md-6"> <?php echo $row['education']; ?></div>


                                                </div>


                                            <?php } elseif ($row['institute_id'] == 'college') {
                                            ?>
                                                <div class="col-md-6 row">
                                                    <div class="col-md-6"> <b>College : </b></div>
                                                    <div class="col-md-6"> <?php echo $row['college']; ?></div>


                                                </div>
                                                <div class="bb-line"></div>
                                            <?php  } elseif ($row['institute_id'] == 'Professional-College') {
                                            ?>
                                                <div class="col-md-6 row">
                                                    <div class="col-md-6"> <b>Professional College : </b></div>
                                                    <div class="col-md-6"> <?php echo $row['professional']; ?></div>


                                                </div>

                                            <?php  }
                                            ?>


                                            <div class="col-md-6 row">
                                                <div class="col-md-6"> <b> Qualification :</b></div>
                                                <div class="col-md-6"> <?php echo $row['qualification']; ?> </div>

                                            </div>
                                            <div class="bb-line"></div>
                                            <div class="col-md-6 row">
                                                <div class="col-md-6"> <b> Exam :</b></div>
                                                <div class="col-md-6"> <?php echo $row['exam']; ?></div>

                                            </div>

                                            <div class="col-md-6 row">
                                                <div class="col-md-6"> <b> Demo Lectures :</b></div>
                                                <div class="col-md-6"> <?php echo $row['demo_lectures']; ?></div>

                                            </div>
                                            <div class="bb-line"></div>
                                            <div class="col-md-6 row">
                                                <div class="col-md-6"> <b> Assign To EO :</b></div>
                                                <div class="col-md-6"> <?php if ($row['assign_to'] == 'all') {
                                                                            echo $row['assign_to'];
                                                                        } else {
                                                                            echo $row['eo_name'];
                                                                        }
                                                                        ?></div>

                                            </div>

                                            <div class="col-md-6 row">
                                                <div class="col-md-6"> <b>Remark : </b></div>
                                                <div class="col-md-6"><?php echo $row['remark']; ?> </div>

                                            </div>
                                            <div class="bb-line"></div>
                                            <div class="col-md-6 row">
                                                <div class="col-md-6"> <b> Date:</b></div>
                                                <div class="col-md-6">
                                                    <?php $this->load->helper('date');

                                                    $originalDate  = $row['reg_date_time'];
                                                    $newDate = date("d-m-Y", strtotime($originalDate));
                                                    ?>

                                                    <?php echo $newDate; ?> </div>

                                            </div>



                                        </div>









                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="modal fade bd-example-modal-lg custom-modal" id="modal-edit<?php echo $row['id']; ?>">
                            <div class="modal-dialog modal-xl"> <!-- You can change 'modal-xl' to your preferred width class -->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Applicant Details </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="post" action="<?php echo base_url() . 'Applicant/updateApplicant' ?>" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <input type="hidden" value="<?php echo $row['id']; ?>" id="id" class="form-control" name="id">

                                                <div class="row">

                                                    <!-- <div class="col-lg-4 col-md-4 col-sm-12 col-12"> -->


                                                    <!-- <div class="form-group">

                                                                    <label for="position_id">Institute</label>
                                                                    <select class="form-control" name="institute_id" id="institute_id" required>
                                                                        <option value="">Select Institute</option>
                                                                        <?php foreach ($institute as $key => $value) : ?>
                                                                            <option value="<?php echo $value['id']; ?>" <?php if ($value['id'] == $row['institute_id']) {
                                                                                                                            echo 'Selected';
                                                                                                                        } ?>><?php echo $value['name']; ?></option>
                                                                        <?php endforeach ?>

                                                                    </select>
                                                                </div>

                                                            </div> -->
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
                                                                <option value="Karmaveer Adv. Baburao Ganpatrao Thakare College of Engineering (KBTCOE)" <?php if ($row['Karmaveer Adv. Baburao Ganpatrao Thakare College of Engineering (KBTCOE)'] == 'Other') {
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
                                                            <input type="text" class="form-control" value="<?php echo $row['first_name']; ?>" name="first_name" onkeyup="LettersOnly(this)" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                        <div class="form-group">
                                                            <label>Last Name</label>
                                                            <input type="text" class="form-control" value="<?php echo $row['last_name']; ?>" name="last_name" onkeyup="LettersOnly(this)" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                        <div class="form-group">
                                                            <label>Contact Number</label>
                                                            <input type="text" class="form-control" value="<?php echo $row['contact_no']; ?>" name="contact_no" maxlength="10" pattern="[789][0-9]{9}" onkeyup="NumbersOnly(this)" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                        <div class="form-group">
                                                            <label>Aadhar Number</label>
                                                            <input type="text" class="form-control" value="<?php echo $row['aadhar']; ?>" maxlength="12" name="aadhar" pattern="[0-9]{12}" title="Aadhar number must be 12 digits" onkeyup="NumbersOnly(this)" required>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                        <div class="form-group">
                                                            <label>Email ID</label>
                                                            <input type="email" class="form-control" value="<?php echo $row['email_id']; ?>" name="email_id" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                        <div class="form-group">

                                                            <label for="district_id">District</label>
                                                            <select class="form-control" name="district_id" id="district_id" required>
                                                                <option value="">Select District</option>
                                                                <?php foreach ($district as $key => $value) : ?>
                                                                    <option value="<?php echo $value['id']; ?>" <?php if ($value['id'] == $row['district_id']) {
                                                                                                                    echo 'Selected';
                                                                                                                } ?>><?php echo $value['name']; ?></option>
                                                                <?php endforeach ?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">

                                                        <div class="form-group">

                                                            <label for="position_id">Taluka</label>
                                                            <select class="form-control" name="taluka_id" id="taluka_id" required>
                                                                <option value="">Select Taluka</option>
                                                                <?php foreach ($taluka as $key => $value) : ?>
                                                                    <option value="<?php echo $value['id']; ?>" <?php if ($value['id'] == $row['taluka_id']) {
                                                                                                                    echo 'Selected';
                                                                                                                } ?>><?php echo $value['name']; ?></option>
                                                                <?php endforeach ?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                        <div class="form-group">
                                                            <label>Village</label>
                                                            <input type="text" class="form-control" value="<?php echo $row['city']; ?>" name="city" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">


                                                        <div class="form-group">

                                                            <label for="position_id">Position</label>
                                                            <select class="form-control" name="position_id" id="position_id" required>
                                                                <option value="">Select Category</option>
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
                                                            <select class="form-control" name="reference_id" id="reference_idedit" required>
                                                                <option value="">Select Reference</option>
                                                                <?php foreach ($reference as $key => $value) : ?>
                                                                    <option value="<?php echo $value['id']; ?>" <?php if ($value['id'] == $row['reference_id']) {
                                                                                                                    echo 'Selected';
                                                                                                                } ?>><?php echo $value['name']; ?></option>
                                                                <?php endforeach ?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12" id="nameInputField11">
                                                        <div class="form-group">
                                                            <label for="name">Reference Name</label>
                                                            <input type="text" class="form-control" name="other_reference_name" value="<?php echo $row['other_reference_name']; ?>" placeholder="Enter Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12" id="nameInputField4">
                                                        <div class="form-group">
                                                            <label for="name">Relation</label>
                                                            <input type="text" class="form-control" name="relation" value="<?php echo $row['relation']; ?>" id="name" placeholder="Enter Relation">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12" id="nameInputField6">
                                                        <div class="form-group">
                                                            <label for="name">Sabhasad Mobile Number</label>
                                                            <input type="text" class="form-control" name="sabhasad_mobile_no" maxlength="10" pattern="[789][0-9]{9}" onkeyup="NumbersOnly(this)" value="<?php echo $row['sabhasad_mobile_no']; ?>" id="name">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12" id="nameInputField5">
                                                        <div class="form-group">
                                                            <label for="name">Sabhasad ID</label>
                                                            <input type="text" class="form-control" name="other_reference_id" value="<?php echo $row['other_reference_id']; ?>" id="name" placeholder="Enter Reference ID">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12" id="nameInputField7">
                                                        <div class="form-group">
                                                            <label for="name">Director Name</label>
                                                            <input type="text" class="form-control" name="director_name" value="<?php echo $row['director_name']; ?>" id="name" placeholder="Enter Director Name">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                        <div class="form-group">
                                                            <label>Qualification</label>
                                                            <input type="text" class="form-control" value="<?php echo $row['qualification']; ?>" name="qualification" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                        <div class="form-group">
                                                            <label>Sarchitnis Remark</label>
                                                            <input type="text" class="form-control" value="<?php echo $row['remark']; ?>" name="remark" required>
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

                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12" id="eoDropdownedit" style="display: <?php if ($row['assign_to'] != '') {
                                                                                                                                            echo 'block';
                                                                                                                                        } else {
                                                                                                                                            echo 'none';
                                                                                                                                        } ?>;">
                                                        <div>
                                                            <label for="eo_id">Select Education Officer:</label>
                                                            <select class="form-control" id="education-officer" name="eo_id" <?php if ($row['assign_to'] == 'all') echo 'disabled'; ?>>
                                                                <option value="">Select Education Officer</option>
                                                                <?php foreach ($education as $key => $value) : ?>
                                                                    <option value="<?php echo $value['id']; ?>" <?php if ($value['id'] == $row['eo_id']) echo 'selected'; ?>>
                                                                        <?php echo $value['name']; ?>
                                                                    </option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>
                                                    </div>



                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                        <div class="form-group">
                                                            <label for="exam">Exam:</label><br>
                                                            <input type="radio" id="done_exam" name="exam" value="done" <?php if ($row['exam'] === 'done') echo 'checked'; ?>>
                                                            <label for="done_exam">Done</label>

                                                            <input type="radio" id="not_done_exam" name="exam" value="not_done" <?php if ($row['exam'] === 'not_done') echo 'checked'; ?>>
                                                            <label for="not_done_exam">Not Done</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                        <div class="form-group">
                                                            <label for="demo_lectures">Demo Lecture:</label><br>
                                                            <input type="radio" id="done_demo_lectures" name="demo_lectures" value="done" <?php if ($row['demo_lectures'] === 'done') echo 'checked'; ?>>
                                                            <label for="done_demo_lectures">Done</label>

                                                            <input type="radio" id="not_done_demo_lectures" name="demo_lectures" value="not_done" <?php if ($row['demo_lectures'] === 'not_done') echo 'checked'; ?>>
                                                            <label for="not_done_demo_lectures">Not Done</label>
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
                    </table>
                    <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
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
    <script src="<?php echo base_url() . 'plugins/jquery/jquery.min.js'; ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url() . 'plugins/bootstrap/js/bootstrap.bundle.min.js'; ?>"></script>
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
                } else if (referenceDropdown.value == '2') {
                    nameInputField.style.display = 'block';
                    nameInputField2.style.display = 'none';
                    nameInputField3.style.display = 'none';
                    nameInputField10.style.display = 'none';
                    nameInputField12.style.display = 'none';
                    nameInputField13.style.display = 'none';
                } else if (referenceDropdown.value == '4') {
                    nameInputField.style.display = 'block';
                    nameInputField2.style.display = 'none';
                    nameInputField3.style.display = 'none';
                    nameInputField10.style.display = 'none';
                    nameInputField12.style.display = 'none';
                    nameInputField13.style.display = 'none';
                } else if (referenceDropdown.value == '3') {
                    nameInputField.style.display = 'block';
                    nameInputField2.style.display = 'block';
                    nameInputField3.style.display = 'block';
                    nameInputField10.style.display = 'block';

                    nameInputField12.style.display = 'block';

                }

            } else {
                nameInputField.style.display = 'none';
            }
        });
    </script>

    <script>
        // Add an event listener to the reference dropdown
        const referenceDropdownEdit = document.getElementById('reference_idedit');
        const nameInputField11 = document.getElementById('nameInputField11');
        const nameInputField4 = document.getElementById('nameInputField4');
        const nameInputField5 = document.getElementById('nameInputField5');
        const nameInputField6 = document.getElementById('nameInputField6');
        const nameInputField7 = document.getElementById('nameInputField7');

        referenceDropdownEdit.addEventListener('change', function() {
            if (referenceDropdownEdit.value !== '') {
                // Depending on the selected value, show or hide specific input fields
                if (referenceDropdownEdit.value === '1') {
                    nameInputField11.style.display = 'block';
                    nameInputField4.style.display = 'block';
                    nameInputField5.style.display = 'block';
                    nameInputField6.style.display = 'block';
                    nameInputField7.style.display = 'none';
                } else if (referenceDropdownEdit.value === '2') {
                    nameInputField11.style.display = 'block';
                    nameInputField4.style.display = 'none';
                    nameInputField5.style.display = 'none';
                    nameInputField6.style.display = 'none';
                    nameInputField7.style.display = 'none';
                } else if (referenceDropdownEdit.value === '4') {
                    nameInputField11.style.display = 'block';
                    nameInputField4.style.display = 'none';
                    nameInputField5.style.display = 'none';
                    nameInputField6.style.display = 'none';
                    nameInputField7.style.display = 'none';
                } else if (referenceDropdownEdit.value === '3') {
                    nameInputField11.style.display = 'block';
                    nameInputField4.style.display = 'block';
                    nameInputField5.style.display = 'block';
                    nameInputField6.style.display = 'block';
                    nameInputField7.style.display = 'block';
                }
            } else {
                // If no value selected, hide all input fields except nameInputField11
                nameInputField11.style.display = 'block';
                nameInputField4.style.display = 'none';
                nameInputField5.style.display = 'none';
                nameInputField6.style.display = 'none';
                nameInputField7.style.display = 'none';
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


</body>

</html>