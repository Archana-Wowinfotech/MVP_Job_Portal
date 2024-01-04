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
    .content-section .nav-pills .nav-link {
        color: black !important;
        padding: 0 30px;
        font-size: 20px;
        border: 2px solid #026C7C;
        margin-left: 30px;
        margin-right: 30px;
        /* background-color: #bbbec1; */
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        color: #fff !important;
        background-color: #007bff;
    }

    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        background-color: #ececec !important;
    }

    .back-button {
        text-decoration: none;
    }

    .custom-back-button {
        background-color: #3498db;
        color: #fff;
        padding: 6px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .custom-back-button:hover {
        background-color: #2980b9;
    }
    .btn-primary {
    color: #fff;
    background-color: #026C7C !important;
    border-color: #026C7C !important;
    box-shadow: none;
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
    .close {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
        color: white;
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
                        <div class="col-sm-4">
                            <a href="<?php echo base_url() . 'Institute_Report/Eo_report'; ?>" class="back-button">
                                <button class="custom-back-button">
                                    Back <span>&larr;</span>
                                </button>
                            </a>
                        </div>

                        <div class="col-sm-4" style="text-align: center;">

                            <h1 class="m-0">
                                <?php
                                $firstRow = true;
                                foreach ($education_officer_report as $row) {
                                    if ($firstRow) {
                                        echo '<td>' . $row['eo_name'] . '</td>';
                                        $firstRow = false;
                                    }
                                }
                                ?>

                            </h1>
                        </div><!-- /.col -->

                        <div class="col-sm-4">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url() . 'Home/dashboard'; ?>">Home<p style="margin-bottom:0px;padding-bottom:0px;"> </a></li>
                                <li class="breadcrumb-item active">Education Officer Report</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <div class="text-right" id="excel-export-button" style="display:none;">
                        <a href="<?php echo base_url() . 'Report/toExcelEOReport/'.$eo_id; ?>" class="btn btn-success"><i class="fa fa-file-excel-o" aria-hidden="true"></i>&nbsp; Export Excel</a>
                    </div>
                </div><!-- /.container-fluid -->
            </div><br>
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
                    <div class="content-section">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">All</a>
                            </li>
                                <a class="nav-link" id="pills-pending-tab" data-toggle="pill" href="#pills-pending" role="tab" aria-controls="pills-pending" aria-selected="false">Pending</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">In Process</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Selected</a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link" id="pills-rejected-tab" data-toggle="pill" href="#pills-rejected" role="tab" aria-controls="pills-rejected" aria-selected="false">Rejected</a>
                            </li>
                            
                        </ul>
                        <br>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

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

                                                    <th>Documents</th>
                                                    <th>Education Ofiicer</th>
                                                    <th> Status</th>
                                                    <th>Referred By</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1;
                                                foreach ($education_officer_report as $row) { ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <!-- <a data-toggle="modal" data-target="#modal-edit<?php echo $row['id']; ?>" style="color: blue;"> -->
                                                        <td>
                                                            <?php echo $row['first_name'] . ' ' . $row['last_name']; ?>
                                                        </td>
                                                        <td><?php echo $row['contact_no']; ?></td>
                                                        <td><?php echo $row['city']; ?></td>
                                                        <td><?php echo $row['institute_id']; ?></td>
                                                        <td><?php echo $row['position_name']; ?></td>

                                                        <td>
                                                            <a href="<?php echo base_url() . 'certificate_view/' . $row['id']; ?>">View
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
                                                            <?php echo $row['reference_name']; ?>
                                                        </td>


                                                        <td>
                                                        <a class="btn btn-success" data-toggle="modal" data-target="#modal-viewData<?php echo $i ?>">
                                                            <i class="fas fa-eye"></i>
                                                        </a>


                                                        </td>
                                                    </tr>
                                                <?php $i++;
                                                } ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div class="card-body ">
                                    <div class="table-responsive">
                                        <table id="example2" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Contact No</th>
                                                    <th>Village</th>
                                                    <th>Institute</th>
                                                    <th>Position</th>

                                                    <th>Documents</th>
                                                    <th>Education Ofiicer</th>

                                                    <th>Referred By</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1;
                                                foreach ($eo_selected_applicant as $row) { ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <!-- <a data-toggle="modal" data-target="#modal-edit<?php echo $row['id']; ?>" style="color: blue;"> -->
                                                        <td>
                                                            <?php echo $row['first_name'] . ' ' . $row['last_name']; ?>
                                                        </td>
                                                        <td><?php echo $row['contact_no']; ?></td>
                                                        <td><?php echo $row['city']; ?></td>
                                                        <td><?php echo $row['institute_id']; ?></td>
                                                        <td><?php echo $row['position_name']; ?></td>

                                                        <td>
                                                            <a href="<?php echo base_url() . 'certificate_view/' . $row['id']; ?>">View
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
                                                            <?php echo $row['reference_name']; ?>
                                                        </td>


                                                        <td>
                                                        <a class="btn btn-success" data-toggle="modal" data-target="#modal-viewData<?php echo $i ?>">
                                                            <i class="fas fa-eye"></i>
                                                        </a>


                                                        </td>
                                                    </tr>
                                                <?php $i++;
                                                } ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                <div class="card-body ">
                                    <div class="table-responsive">
                                        <table id="example4" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Contact No</th>
                                                    <th>Village</th>
                                                    <th>Institute</th>
                                                    <th>Position</th>

                                                    <th>Documents</th>
                                                    <th>Education Ofiicer</th>

                                                    <th>Referred By</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1;
                                                foreach ($eo_inprocess_applicant as $row) { ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <!-- <a data-toggle="modal" data-target="#modal-edit<?php echo $row['id']; ?>" style="color: blue;"> -->
                                                        <td>
                                                            <?php echo $row['first_name'] . ' ' . $row['last_name']; ?>
                                                        </td>
                                                        <td><?php echo $row['contact_no']; ?></td>
                                                        <td><?php echo $row['city']; ?></td>
                                                        <td><?php echo $row['institute_id']; ?></td>
                                                        <td><?php echo $row['position_name']; ?></td>

                                                        <td>
                                                            <a href="<?php echo base_url() . 'certificate_view/' . $row['id']; ?>">View
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
                                                            <?php echo $row['reference_name']; ?>
                                                        </td>


                                                        <td>
                                                        <a class="btn btn-success" data-toggle="modal" data-target="#modal-viewData<?php echo $i ?>">
                                                            <i class="fas fa-eye"></i>
                                                        </a>

                                                        </td>
                                                    </tr>
                                                <?php $i++;
                                                } ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-pending" role="tabpanel" aria-labelledby="pills-contact-tab">
                                <div class="card-body ">
                                    <div class="table-responsive">
                                        <table id="example5" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Contact No</th>
                                                    <th>Village</th>
                                                    <th>Institute</th>
                                                    <th>Position</th>

                                                    <th>Documents</th>
                                                    <th>Education Ofiicer</th>

                                                    <th>Referred By</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1;
                                                foreach ($eo_pending_applicant as $row) { ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <!-- <a data-toggle="modal" data-target="#modal-edit<?php echo $row['id']; ?>" style="color: blue;"> -->
                                                        <td>
                                                            <?php echo $row['first_name'] . ' ' . $row['last_name']; ?>
                                                        </td>
                                                        <td><?php echo $row['contact_no']; ?></td>
                                                        <td><?php echo $row['city']; ?></td>
                                                        <td><?php echo $row['institute_id']; ?></td>
                                                        <td><?php echo $row['position_name']; ?></td>


                                                        <td>
                                                            <a href="<?php echo base_url() . 'certificate_view/' . $row['id']; ?>">View
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
                                                            <?php echo $row['reference_name']; ?>
                                                        </td>


                                                        <td>
                                                        <a class="btn btn-success" data-toggle="modal" data-target="#modal-viewData<?php echo $i ?>">
                                                            <i class="fas fa-eye"></i>
                                                        </a>


                                                        </td>
                                                    </tr>
                                                <?php $i++;
                                                } ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-rejected" role="tabpanel" aria-labelledby="pills-contact-tab">
                                <div class="card-body ">
                                    <div class="table-responsive">
                                        <table id="example6" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Contact No</th>
                                                    <th>Village</th>
                                                    <th>Institute</th>
                                                    <th>Position</th>
                                                    <th>Documents</th>
                                                    <th>Education Ofiicer</th>

                                                    <th>Referred By</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1;
                                                foreach ($eo_rejected_applicant as $row) { ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <!-- <a data-toggle="modal" data-target="#modal-edit<?php echo $row['id']; ?>" style="color: blue;"> -->
                                                        <td>
                                                            <?php echo $row['first_name'] . ' ' . $row['last_name']; ?>
                                                        </td>
                                                        <td><?php echo $row['contact_no']; ?></td>
                                                        <td><?php echo $row['city']; ?></td>
                                                        <td><?php echo $row['institute_id']; ?></td>
                                                        <td><?php echo $row['position_name']; ?></td>


                                                        <td>
                                                            <a href="<?php echo base_url() . 'certificate_view/' . $row['id']; ?>">View
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
                                                            <?php echo $row['reference_name']; ?>
                                                        </td>


                                                        <td>
                                                        <a class="btn btn-success" data-toggle="modal" data-target="#modal-viewData<?php echo $row['id']; ?>">
                                                            <i class="fas fa-eye"></i>
                                                        </a>


                                                        </td>
                                                    </tr>
                                                <?php $i++;
                                                } ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php $j = 1;

foreach ($education_officer_report as $row1) {
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
                <button class="btn btn-success" id="printButton" onclick="printDiv('dvContents_<?php echo $j; ?>')" style="float: right; margin-bottom:15px;"><i class="fa fa-print" aria-hidden="true"></i></button>
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
                            <td><?php echo $row1['position_name']; ?></td>
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
                                <td><?php echo $row['remark']; ?></td>
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
                                        <option value="Selected" <?php if ($row1['status'] == 'Selected') {
                                                                        echo 'Selected';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>>Selected</option>
                                        <option value="Pending" <?php if ($row1['status'] == 'Pending') {
                                                                    echo 'Selected';
                                                                } else {
                                                                    echo '';
                                                                } ?>>Pending</option>
                                        <option value="In_Process" <?php if ($row1['status'] == 'In_Process') {
                                                                        echo 'Selected';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>>In_Process</option>
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
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php include 'public/script.php'; ?>
    

    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script> -->
    <!-- <script src="<?php echo base_url() . 'plugins/jquery/jquery.min.js'; ?>"></script> -->
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
    document.addEventListener('DOMContentLoaded', function() {
        // Show/hide export button based on the selected tab
        var pillsTab = document.getElementById('pills-tab');
        var excelExportButton = document.getElementById('excel-export-button');
        // alert(excelExportButton);
        pillsTab.addEventListener('click', function(event) {
            var selectedTab = event.target.getAttribute('aria-controls');

            if (selectedTab === 'pills-home') {
                excelExportButton.style.display = 'block';
            } else {
                excelExportButton.style.display = 'none';
            }
        });
    });
</script>
    <script>
        $(function() {
            $("#example1").DataTable();
            $("#example2").DataTable();
            $("#example3").DataTable();
            $("#example4").DataTable();
            $("#example5").DataTable();
            $("#example6").DataTable();

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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
    <script>
        function printDiv(divId) {
            var printContents = document.getElementById(divId).outerHTML;
            var printWindow = window.open('', '_blank', 'width=800,height=600');
            printWindow.document.write('<html><head><title>Print</title>');
            printWindow.document.write('<style type="text/css">');
            printWindow.document.write('table { border-collapse: collapse; width: 100%; }');
            printWindow.document.write('th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }');
            printWindow.document.write('th { background-color: #F2F2F2; }');
            printWindow.document.write('</style>');
            printWindow.document.write('</head><body>');
            printWindow.document.write(printContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            // Delay the print operation to ensure content is fully loaded
            setTimeout(function() {
                printWindow.print();
                printWindow.close();
            }, 500); // Adjust the delay time as needed
        }
    </script>
</body>

</html>