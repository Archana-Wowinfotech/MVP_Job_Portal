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
    .status-cell.refered_to {
        color: yellowgreen;
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
                            <h1 class="m-0">Candidate List</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url() . 'Home/dashboard'; ?>">Home<p style="margin-bottom:0px;padding-bottom:0px;"> </a></li>
                                <li class="breadcrumb-item active">Candidate</li>
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
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> Add New Candidate</button>
                                                </div>
                                            </div>

                                            <div class="modal fade bd-example-modal-lg custom-modal" id="modal-default">
                                                <div class="modal-dialog modal-xl"> <!-- You can change 'modal-xl' to your preferred width class -->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title" style="margin: left 200px !important;">Add New Candidate </h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true" style="color: #fff;">&times;</span>
                                                                </button>
                                                        </div>
                                                        <form method="post" action="<?php echo base_url() . 'Applicant/saveApplicantBasicDetail' ?>" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                        <div class="form-group">
                                                                            <label>First Name *</label>

                                                                            <input type="text" class="form-control" placeholder="Enter First Name" name="first_name" onkeyup="LettersOnly(this)" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                        <div class="form-group">
                                                                            <label>Last Name *</label>
                                                                            <input type="text" class="form-control" placeholder="Enter Last Name" name="last_name" onkeyup="LettersOnly(this)" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                        <div class="form-group">
                                                                            <label>Contact Number *</label>
                                                                            <input type="text" class="form-control" placeholder="Enter Contact Number" name="contact_no" maxlength="10" pattern="[789][0-9]{9}" onkeyup="NumbersOnly(this)" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                        <div class="form-group">
                                                                            <label>Aadhar Number *</label>
                                                                            <input type="text" class="form-control" placeholder="Enter Aadhar Number" maxlength="12" name="aadhar" pattern="[0-9]{12}" title="Aadhar number must be 12 digits" onkeyup="NumbersOnly(this)" required>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                        <div class="form-group">
                                                                            <label>Email ID *</label>
                                                                            <input type="email" class="form-control" placeholder="Enter Email Id" name="email_id" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                        <label for="district_id">District *</label>
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
                                                                        <label>Taluka *</label>
                                                                        <select class="form-control" name="taluka_id" id="taluka_list" required>
                                                                            <option>Select Taluka</option>
                                                                        </select>


                                                                    </div>

                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                        <div class="form-group">
                                                                            <label>Village *</label>
                                                                            <input type="text" class="form-control" placeholder="Enter Village Name" name="city" required>
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
                                                            <th>Candidate Name</th>
                                                            <th>Aadhar Card Number</th>
                                                            <th>Contact No</th>
                                                            <th>Village</th>

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
                                                                <td>
                                                                    <?php echo $row['first_name'] . ' ' . $row['last_name']; ?>
                                                                </td>
                                                                <td><?php echo $row['aadhar']; ?></td>
                                                                <td><?php echo $row['contact_no']; ?></td>
                                                                <td><?php echo $row['city']; ?></td>

                                                                <?php
                                                                if ($row['status'] == 'Active') {
                                                                ?>
                                                                    <td>
                                                                        <span style="color:green;"><?php echo $row['status']; ?>
                                                                    </td>

                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <td>
                                                                        <span style="color:red;"><?php echo $row['status']; ?>
                                                                    </td>
                                                                <?php

                                                                }
                                                                ?>




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

                                                                    <a href="<?php echo base_url() . 'Applicant/index/All/' . $row['id']; ?>" class="btn btn-info">
                                                                        <i class="fas fa-plus"></i>
                                                                    </a>

                                                                </td>
                                                            </tr>



                                                            <div class="modal fade" id="modal-edit_<?php echo $row['id']; ?>">
                                                                <div class="modal-dialog modal-xl"> <!-- You can change 'modal-xl' to your preferred width class -->
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h3 class="modal-title" style="margin: left 200px !important;">Update Candidate Details</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true" style="color: #fff;">&times;</span>
                                                                                </button>
                                                                        </div>
                                                                        <form method="post" action="<?php echo base_url() . 'Applicant/UpdateApplicantBasicDetail' ?>" enctype="multipart/form-data">
                                                                            <div class="modal-body">
                                                                                <div class="form-group">
                                                                                    <input type="hidden" value="<?php echo $row['id']; ?>" id="id" class="form-control" name="id">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                                        <div class="form-group">
                                                                                                <label>First Name</label>
                                                                                                <input type="text" class="form-control" value="<?php echo $row['first_name']; ?>" name="first_name" onkeyup="LettersOnly(this)" >
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                                        <div class="form-group">
                                                                                                <label>Last Name</label>
                                                                                                <input type="text" class="form-control" value="<?php echo $row['last_name']; ?>" name="last_name" onkeyup="LettersOnly(this)" >
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                                        <div class="form-group">
                                                                                                <label>Contact Number</label>
                                                                                                <input type="text" class="form-control" value="<?php echo $row['contact_no']; ?>" name="contact_no"  maxlength="10" pattern="[789][0-9]{9}" onkeyup="NumbersOnly(this)">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                                        <div class="form-group">
                                                                                                <label>Aadhar Number</label>
                                                                                                <input type="text" class="form-control" value="<?php echo $row['aadhar']; ?>" maxlength="12" name="aadhar" pattern="[0-9]{12}" title="Aadhar number must be 12 digits" onkeyup="NumbersOnly(this)">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                                        <div class="form-group">
                                                                                                <label>Email ID</label>
                                                                                                <input type="email" class="form-control" value="<?php echo $row['email_id']; ?>" name="email_id">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                                        <div class="form-group">
                                                                                                <label for="district_id">District</label>
                                                                                                <select class="form-control" name="district_id" id="district_id" >
                                                                                                <option value="">Select District</option>
                                                                                        <?php foreach ($district as $key => $value) : ?>
                                                                                            <option value="<?php echo $value['id']; ?>" <?php if ($value['id'] == $row['district_id']) {
                                                                                                                                            echo 'Selected';
                                                                                                                                        } ?>><?php echo $value['name']; ?></option>
                                                                                        <?php endforeach ?>

                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                                        <div class="form-group">
                                                                                                <label for="position_id">Taluka</label>
                                                                                                <select class="form-control" name="taluka_id" id="taluka_id">
                                                                                                
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
                                                                                                <input type="text" class="form-control" value="<?php echo $row['city']; ?>" name="city">
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
                            <h3 class="modal-title">Candidate Details</h3>
                        </div>
                        <div class="modal-body">
                            <!--<button class="btn btn-success"  style="float: right; margin-bottom:15px;"><i class="fa fa-print" aria-hidden="true"></i></button>-->
                            <table class="table table-bordered" style="border-width:2px;" id="dvContents">

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
                                        <td class="font-weight-bold">Remark :</td>
                                        <td><?php echo $row1['remarkforstatus']; ?></td>
                                    </tr>

                                    <!-- <tr>
                                        <td colspan="4" class="head-td">Documents</td>
                                    </tr> -->
                                    <?php
                                    $applicant_id = $row1['id'];
                                    $this->load->model('Applicant_Model');
                                    $document = $this->Applicant_Model->getAllDocument($applicant_id);

                                    foreach ($document as $value) {
                                        //  print_r($value['resume']);

                                    ?>
                                        

                                    <?php } ?>

                                </tbody>
                            </table>
                            <div class="row" style="justify-content: center;">
                                <div class="col-md-6 text-center p-1" style="border: 4px solid #026C7C;">

                                    <form method="post" action="<?php echo base_url() . 'Applicant/statusUpdateForCandidate'; ?>">


                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="id" value="<?php echo $row1['id']; ?>">
                                        </div>
                                      
                                        <div class="form-group" style="margin-bottom: 0; margin:0px 20px 0px 20px;">
                                            <label for="exampleFormControlSelect1" style="margin-bottom: 30px!important; font-size:20px;">Change Status</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="status">
                                                <option value="Active" <?php if ($row1['status'] == 'Active') {
                                                                            echo 'selected';
                                                                        } ?>>Active</option>
                                                <option value="Deactive" <?php if ($row1['status'] == 'Deactive') {
                                                                                echo 'selected';
                                                                            } ?>>Deactive</option>
                                            </select>

                                        </div>
                                        <div class="form-group" style="margin: 20px;">
                                            <!-- <label for="statusRemark" style="font-size: 20px;">Status Remark</label> -->
                                            <textarea class="form-control" id="remarkforstatus" name="remarkforstatus" placeholder="Enter Remark" rows="2"><?php echo $row1['remarkforstatus']; ?></textarea>

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