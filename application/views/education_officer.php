<!DOCTYPE html>
<html lang="en">
<style>
    .modal-header {
        background-color: #026C7C;
    }

    .modal-title {
        color: #fff;
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
                    <div class="row mb-2">
                        <div class="col-sm-6">

                            <h1 class="m-0">Education Officer</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url() . 'Home/dashboard'; ?>">Home<p style="margin-bottom:0px;padding-bottom:0px;"> </a></li>
                                <li class="breadcrumb-item active">Education Officer</li>
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
                                            <!-- <h3 class="card-title">Category List<p style="margin-bottom:0px;padding-bottom:0px;"> -->
                                            </h3>
                                        </div>
                                        <div class="col-lg-6 text-right">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> Add New </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="modal-default">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Add New Education Officer </h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="post" action="<?php echo base_url() . 'Education_Officer/saveEO' ?>" enctype="multipart/form-data" onsubmit="return validateForm()" id="educationOfficerForm">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <!-- <div class="col-lg-6 col-md-6 col-sm-12 col-12 ">
                                                            <label for="institute_id">Institute</label>
                                                            <select class="form-control" name="institute_id" id="institute_id" required>
                                                                <option value="">Select Institute</option>
                                                                <?php foreach ($institute as $key => $value) : ?>
                                                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div> -->

                                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label>Name *</label>
                                                                <input type="text" class="form-control" placeholder="Enter Name" name="name" onkeyup="LettersOnly(this)" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label>Contact Number *</label>
                                                                <input type="text" class="form-control" placeholder="Enter Contact Number" name="contact_no" maxlength="10" pattern="[789][0-9]{9}" onkeyup="NumbersOnly(this)" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label>Address *</label>
                                                                <textarea class="form-control" placeholder="Enter Address" name="address" required></textarea>
                                                            </div>
                                                        </div>



                                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label>Email ID *</label>
                                                                <input type="email" class="form-control" placeholder="Enter Email Id" id="email" name="email" oninput="validateEmail()" required>
                                                                <span id="email-error" style="color: red;"></span>
                                                            </div>
                                                        </div>

                                                        <!-- <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label>Branch</label>
                                                                <input type="text" class="form-control" placeholder="Enter Branch" name="branch" required>
                                                            </div>
                                                        </div> -->
                                                        <!-- <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label>Username</label>
                                                                <input type="text" class="form-control" placeholder="Enter Username" name="username" required>
                                                            </div>
                                                        </div> -->
                                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label>Password *</label>
                                                                <input type="password" name="password" class="form-control" placeholder="Generated Password" required>

                                                            </div>
                                                        </div>


                                                    </div>



                                                    <!-- </div> -->
                                                    <div class="modal-footer justify-content-center">
                                                        <button type="Submit" class="btn btn-primary">Submit</button>

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
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Sr.No</th>
                                                    <th>Name</th>
                                                    <th>Contact No</th>
                                                    <th>Email</th>
                                                    <!-- <th>Reference</th> -->
                                                    <!-- <th>Branch</th> -->
                                                    <th> Status</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1;
                                                foreach ($eolist as $row) { ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $row['name']; ?></td>
                                                        <td><?php echo $row['contact_no']; ?></td>
                                                        <td><?php echo $row['email']; ?></td>
                                                        <!-- <td><?php echo $row['branch']; ?></td> -->




                                                        <!-- <?php
                                                                $this->load->helper('date');

                                                                $originalDate  = $row['reg_date_time'];
                                                                $newDate = date("d-m-Y", strtotime($originalDate));
                                                                ?>
                                                    <td><?php echo $newDate; ?></td> -->
                                                        <td>
                                                            <?php $status = $row['status'];
                                                            if ($status == 'Active') { ?>
                                                                <a href="<?php echo base_url() . 'Education_Officer/status_update/' . $row['id']; ?>" style="color: green;"><?php echo $status; ?></a>
                                                            <?php } else { ?>
                                                                <a href="<?php echo base_url() . 'Education_Officer/status_update/' . $row['id']; ?>" style="color: red;"><?php echo $status; ?></a>
                                                            <?php  } ?>
                                                        </td>
                                                        <td> <a class="btn btn-info" data-toggle="modal" data-target="#modal-edit<?php echo $row['id']; ?>">
                                                                <i class="fas fa-edit"></i>
                                                            </a>

                                                            <a class="btn btn-success" data-toggle="modal" data-target="#modal-info<?php echo $row['id']; ?>">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        </td>
                                                    </tr>

                                    </div>
                                </div>

                                <div class="modal fade" id="modal-info<?php echo $row['id']; ?>">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Education Officer Details : </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>

                                            </div>
                                            <div class="modal-body pl-10">


                                                <div class="form-group">
                                                    <div class="row">

                                                        <div class="col-md-4">
                                                            <b>Name :</b>
                                                        </div>

                                                        <div class="col-md-8">
                                                            <?php echo $row['name']; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-group">
                                                    <div class="row">

                                                        <div class="col-md-4">
                                                            <b>Email Id :</b>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <?php echo $row['email']; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>

                                                <div class="form-group">
                                                    <div class="row">

                                                        <div class="col-md-4">
                                                            <b> Mobile No :</b>
                                                        </div>

                                                        <div class="col-md-8">
                                                            <?php echo $row['contact_no']; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <!-- <div class="form-group">
                                                    <div class="row">

                                                        <div class="col-md-4">
                                                            <b> Branch:</b>
                                                        </div>

                                                        <div class="col-md-8">
                                                            <?php echo $row['branch']; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr> -->
                                                <div class="form-group">
                                                    <div class="row">

                                                        <div class="col-md-4">
                                                            <b> Address :</b>
                                                        </div>

                                                        <div class="col-md-8">
                                                            <?php echo $row['address']; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>


                                                <div class="form-group">
                                                    <div class="row">

                                                        <div class="col-md-4">
                                                            <b>Date:</b>
                                                        </div>

                                                        <div class="col-md-8">

                                                            <?php $this->load->helper('date');

                                                            $originalDate  = $row['reg_date_time'];
                                                            $newDate = date("d-m-Y", strtotime($originalDate)); // format the timestamp as a string in the desired format
                                                            ?>

                                                            <?php echo $newDate; ?>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="modal fade" id="modal-edit<?php echo $row['id']; ?>">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Education Officer Details </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="post" action="<?php echo base_url() . 'Education_Officer/updateEO' ?>">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input type="hidden" value="<?php echo $row['id']; ?>" class="form-control" name="id">

                                                        <div class="row">
                                                            <!-- <div class="form-group"> -->
                                                            <!-- <label>Institute</label>
                                                            <input type="text" value="<?php echo isset($row['name']) ? $row['name'] : ''; ?>" id="name" name="institute_id" class="form-control" required> -->
                                                            <!-- </div> -->
                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label> Name *</label>
                                                                    <input type="text" class="form-control" value="<?php echo $row['name']; ?>" name="name" onkeyup="LettersOnly(this)">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label> Contact Number *</label>
                                                                    <input type="text" class="form-control" value="<?php echo $row['contact_no']; ?>" name="contact_no" onkeyup="NumbersOnly(this)">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label> Address *</label>
                                                                    <textarea class="form-control" name="address"><?php echo $row['address']; ?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label> Email *</label>
                                                                    <textarea class="form-control" name="email"><?php echo $row['email']; ?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label> Password *</label>
                                                                    <textarea class="form-control" name="password"><?php echo $row['password']; ?></textarea>
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
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php include 'public/script.php'; ?>
    <script>
    document.getElementById('educationOfficerForm').addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the form from submitting

        // Get the email input value
        var email = document.getElementById('email').value;

        // Perform AJAX request to check if the email exists
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '<?php echo base_url() . 'Education_Officer/checkEmailExists' ?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);

                if (response.exists) {
                    // Email already exists, show alert and prevent form submission
                    alert('Email already exists');
                } else {
                    // Email does not exist, submit the form
                    document.getElementById('educationOfficerForm').submit();
                }
            }
        };

        // Send the email value to the server
        xhr.send('email=' + encodeURIComponent(email));
    });
</script>

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

</body>

</html>