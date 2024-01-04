<!DOCTYPE html>
<html lang="en">
<style>
    .btn-primary {
        color: #fff;
        background-color: #026C7C !important;
        border-color: #026C7C !important;
        box-shadow: none;
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
</style>
<?php include 'public/head.php'; ?>

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
                    <div class="row">
                         <div class="col-sm-4">
                            <a href="<?php echo base_url() . 'Applicant/index/All/'.$candidate_id; ?>" class="back-button">
                                <button class="custom-back-button">
                                    <!-- <?php //print_r($candidate_id);?> -->
                                    Back <span>&larr;</span>
                                </button>
                            </a>
                        </div> 

                        <div class="col-sm-4">

                            <h1 class="m-0">Documents</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-4">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url() . 'Home/dashboard'; ?>">Home<p style="margin-bottom:0px;padding-bottom:0px;"> </a></li>
                                <li class="breadcrumb-item active">Documents</li>
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
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h3 class="card-title">Documents List<p style="margin-bottom:0px;padding-bottom:0px;">
                                            </h3>
                                        </div>
                                        <div class="col-lg-6 text-right">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> Add Documents</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="modal-default">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Add Documents </h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="post" action="<?php echo base_url() . 'Certificate/Certificate' ?>" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <input type="hidden" name="applicant_id" value="<?php echo $applicant_id; ?>">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <div>
                                                            <select id="certificateType" name="type" class="form-control" onchange="handleCertificateTypeChange()">
                                                                <option value="">Select Document</option>
                                                                <option value="Resume">Resume</option>
                                                                <option value="Adhar Card">Adhar Card</option>
                                                                <option value="SSC Certificate">SSC Certificate</option>
                                                                <option value="HSC Certificate">HSC Certificate</option>
                                                                <option value="Graduation Certificate">Graduation Certificate</option>
                                                                <option value="Post Graduation Certificate">Post Graduation Certificate</option>
                                                                <option value="Other">Other</option>
                                                            </select>
                                                        </div>
                                                    </div><br>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <div id="otherCertificateInput" style="display: none;">
                                                            <input type="text" id="otherCertificate" name="otherCertificate" class="form-control" placeholder="Enter Certificate Type">
                                                        </div>


                                                    </div>

                                                    <br>

                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12" style="border: solid 1px #cbc8c8;">
                                                        <div class="form-group" id="uploadField" style="margin-left: 16px;">
                                                            <label>Upload Document: <span style="color:red">(.doc/.pdf)</span></label><br>
                                                            <input type="file" name="resume" accept=".pdf, application/pdf, .docx, application/msword" required>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer justify-content-center">
                                                        <button type="Submit" class="btn btn-primary" id="submitBtn">Submit</button>

                                                    </div>
                                                </div>
                                            </form>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                </div>

                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Sr.No</th>

                                                <th> Document Title</th>
                                                <th>View</th>
                                                <th>Reg Date</th>

                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                            foreach ($certificate as $row) {

                                                //    print_r($row); 



                                            ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td> <?php
                                                            if ($row['type'] == 'Other') {
                                                                echo $row['otherCertificate'];
                                                            } else {
                                                                echo $row['type'];
                                                            }
                                                            ?>
                                                    </td>
                                                    <td>

                                                        <?php
                                                        $resume = $row['resume'];

                                                        if (!empty($resume)) {
                                                            $fileExtension = pathinfo($resume, PATHINFO_EXTENSION);

                                                            $baseURL = base_url();
                                                            $pdfURL = $baseURL . $resume;


                                                            // Display PDF icon if the file is a PDF
                                                            if (strtolower($fileExtension) === 'pdf') {
                                                                echo '<a href="' . $pdfURL . '" target="_blank"><img src="' . $baseURL . 'upload/pdf.png" alt="PDF Icon" width="50" height="50"> || </a>';
                                                            }
                                                            // Display document icon if the file is not a PDF
                                                            else {
                                                                echo '
                                                        <a href="' . $pdfURL . '" target="_blank"><img src="' . $baseURL . 'upload/document.png" alt="Document Icon" width="50" height="50"> || </a>';
                                                            }
                                                            echo '<a href="' . $pdfURL . '" download>Download</a>';
                                                        } else {
                                                            // Certificate1 is not uploaded, display a message in red.
                                                            echo '<p style="color: red;">Resume not uploaded</p>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?php $this->load->helper('date');

                                                        $originalDate  = $row['reg_date_time'];
                                                        $newDate = date("d-m-Y", strtotime($originalDate));
                                                        ?>

                                                        <?php echo $newDate; ?></td>


                                                    <td><a class="btn btn-info" data-toggle="modal" data-target="#modal-edit<?php echo $row['id']; ?>"> <i class="fas fa-pencil-alt"></i> <!-- Use Font Awesome icon class -->
                                                        </a></td>

                                                </tr>

                                </div>
                                <div class="modal fade" id="modal-edit<?php echo $row['id']; ?>">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Certificate </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="post" action="<?php echo base_url() . 'Certificate/UploadCertificateImages' ?>" enctype="multipart/form-data">
                                                <div class="modal-body">

                                                    <input type="hidden" name="applicant_id" value="<?php echo $row['applicant_id']; ?>">
                                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <div>
                                                            <select id="certificateType1" name="type" class="form-control" onchange="handleCertificateTypeChange1()">
                                                                <option value="<?php echo $row['type']; ?>">Select Certificate</option>
                                                                <option value="Resume" <?php if ($row['type'] == 'Resume') {
                                                                                            echo 'Selected';
                                                                                        } else {
                                                                                            echo '';
                                                                                        } ?>>Resume</option>
                                                                <option value="Adhar Card" <?php if ($row['type'] == 'Adhar Card') {
                                                                                                echo 'Selected';
                                                                                            } else {
                                                                                                echo '';
                                                                                            } ?>>Adhar Card</option>
                                                                <option value="SSC Certificate">SSC Certificate</option>
                                                                <option value="HSC Certificate" <?php if ($row['type'] == 'HSC Certificate') {
                                                                                                    echo 'Selected';
                                                                                                } else {
                                                                                                    echo '';
                                                                                                } ?>>HSC Certificate</option>
                                                                <option value="Graduation Certificate" <?php if ($row['type'] == 'Graduation Certificate') {
                                                                                                            echo 'Selected';
                                                                                                        } else {
                                                                                                            echo '';
                                                                                                        } ?>>Graduation Certificate</option>
                                                                <option value="Post Graduation Certificate" <?php if ($row['type'] == 'Post Graduation Certificate') {
                                                                                                                echo 'Selected';
                                                                                                            } else {
                                                                                                                echo '';
                                                                                                            } ?>>Post Graduation Certificate</option>
                                                                <option value="Other" <?php if ($row['type'] == 'Other') {
                                                                                            echo 'Selected';
                                                                                        } else {
                                                                                            echo '';
                                                                                        } ?>>Other</option>
                                                            </select>
                                                        </div>
                                                    </div>


                                                    <br>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                                                        <div id="otherCertificateInput1" style="display: none;">
                                                            <input type="text" id="otherCertificate1" name="otherCertificate" class="form-control" placeholder="Enter Certificate Type">
                                                        </div>


                                                    </div><br>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12" style="border: solid 1px #cbc8c8;">
                                                        <div class="form-group" id="uploadField" style="margin-left: 16px;">
                                                            <label>Upload resume:<span style="color:red">(.doc/.pdf)</span></label>
                                                            <input type="file" name="resume" accept=".pdf, application/pdf, .docx, application/msword" value="<?php echo $row['resume']; ?>">

                                                        </div>

                                                    </div>

                                                    <div class="modal-footer justify-content-center">
                                                        <button type="Submit" class="btn btn-primary">Update</button>
                                                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- /.modal-content -->
                                        </div>
                                    <?php $i++;
                                            } ?>
                                    </table>
                                    <!-- /.modal-dialog -->
                                    </div>

                                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include 'public/footer.php'; ?>



    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php include 'public/script.php'; ?>


    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script> -->

    <script>
        function handleCertificateTypeChange() {
            var certificateTypeSelect = document.getElementById("certificateType");
            var otherCertificateInput = document.getElementById("otherCertificateInput");

            if (certificateTypeSelect.value === "Other") {
                otherCertificateInput.style.display = "block";
            } else {
                otherCertificateInput.style.display = "none";
            }
        }
    </script>
    <script>
        function handleCertificateTypeChange1() {
            var certificateTypeSelect = document.getElementById("certificateType1");
            var otherCertificateInput1 = document.getElementById("otherCertificateInput1");

            if (certificateTypeSelect.value === "Other") {
                otherCertificateInput1.style.display = "block";
            } else {
                otherCertificateInput1.style.display = "none";
            }

            console.log("Function called");
        }
    </script>



    <!-- arbaj -->

    <script>
        function handleCertificateTypeChange1() {
            var certificateTypeSelect = document.getElementById("certificateType1");
            var otherCertificateInput1 = document.getElementById("otherCertificateInput1");

            // alert(certificateTypeSelect.value);

            if (certificateTypeSelect.value === "Other") {
                otherCertificateInput1.style.display = "block";
            } else {
                otherCertificateInput1.style.display = "none";
            }
        }
    </script>
    <!-- arbaj -->


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