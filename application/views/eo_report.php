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

        /* Display the modal content during printing */
        #modal-viewData<?php echo $j; ?>, #modal-viewData<?php echo $j; ?> * {
            visibility: visible;
        }

        /* Customize the printed modal appearance if needed */
        #modal-viewData<?php echo $j; ?> {
            position: absolute;
            left: 0;
            top: 0;
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

                            <h1 class="m-0">Education Officer Report</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url() . 'Home/dashboard'; ?>">Home<p style="margin-bottom:0px;padding-bottom:0px;"> </a></li>
                                <li class="breadcrumb-item active">Education Officer Report</li>
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



                                <!-- /.card-header -->
                                <div class="card-body ">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Sr.No</th>
                                                    <th>EO Name </th>

                                                    <!-- <th>Name Of Applicant</th> -->
                                                    <!-- <th>Contact No</th>
                                                    <th>Aadhar Number</th>
                                                    <th>Remark</th>
                                                    <th>Certificates</th>
                                                    <th> Status</th>
                                                    <th>Date</th>
                                                    <th>Action</th> -->

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1;
                                                foreach ($applicantlist as $row) { ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><a href="<?php echo base_url() . 'eo-details/' . $row['eo_id']; ?>"><?php echo $row['eo_name']; ?></a></td>

                                                        <!-- <td><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></td> -->
                                                        <!-- <td><?php echo $row['contact_no']; ?></td>
                                                        <td><?php echo $row['aadhar']; ?></td>
                                                        <td><?php echo $row['remark']; ?></td> -->
                                                        <!-- <td>
                                                            <a href="<?php echo base_url() . $row['resume']; ?>" target="_blank">View</a> ||
                                                            <a href="<?php echo base_url() . $row['resume']; ?>" download>Download</a>
                                                        </td> -->


<!-- 
                                                        <td>
                                                            <a href="<?php echo base_url() . 'certificate/' . $row['id']; ?>">View
                                                        </td>

                                                        <td>
                                                            <?php
                                                            $status = $row['status'];
                                                            echo $status;
                                                            ?>
                                                        </td>

                                                        <td>
                                                            <?php $this->load->helper('date');

                                                            $originalDate  = $row['reg_date_time'];
                                                            $newDate = date("d-m-Y", strtotime($originalDate));
                                                            ?>

                                                            <?php echo $newDate; ?>
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-success" data-toggle="modal" data-target="#modal-viewData<?php echo $i ?>">
                                                                <i class="fas fa-eye"></i>
                                                            </a>

                                                        </td> -->
                                                    </tr>


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


</body>

</html>

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