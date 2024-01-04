<!DOCTYPE html>
<html lang="en">
<style>
    .btn-primary {
        color: #fff;
        background-color: #026C7C !important;
        border-color: #026C7C !important;
        box-shadow: none;
    }

    .modal-header {
        background-color: #026C7C;
    }

    .modal-title {
        color: #fff;
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

                            <h1 class="m-0">Position</h1>
                            <!-- <a class="btn btn-warning  float-right" data-toggle="modal" data-target="#importExcel" style="float: right;margin-right:5px;">Import</a> -->
                        </div><!-- /.col -->


                        <div id="importExcel" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- <div class="modal-header bg-warning">
                                        <h4 class="modal-title">Import Excel</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div> -->
                                    <!-- <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <form action="<?php echo base_url() . 'ImportPosition/ImportPosition'; ?>" enctype="multipart/form-data" Method="POST" style="margin-left: 12px;margin-right: 12px;">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <p><label>Select Excel File</label>
                                                                <input type="file" name="name" id="file" required accept=".xls, .xlsx" />
                                                            </p>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <br><br>
                                                            <center><button type="submit" class="btn btn-info">Save</button></center>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url() . 'Home/dashboard'; ?>">Home<p style="margin-bottom:0px;padding-bottom:0px;"> </a></li>
                                <li class="breadcrumb-item active">Position</li>
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
                                        <?php if ($this->session->userdata('Role') == 'education_officer') { ?>

                                        <?php  } else {
                                        ?>
                                            <div class="col-lg-6 text-right">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> Add New Position</button>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="modal fade" id="modal-default">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h4 class="modal-title">Add New Position </h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="post" action="<?php echo base_url() . 'Position/savePosition' ?>" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label>Name *:</label>
                                                                <input type="text" class="form-control" placeholder="Enter Position Name" onkeyup="LettersOnly(this)" name="name" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label>Institute Name: *</label>
                                                                <input type="text" class="form-control" placeholder="Enter Institute Name" name="institute_name" onkeyup="LettersOnly(this)" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label>Number of Positions: *</label>
                                                                <input type="text" class="form-control" placeholder="Enter Number Of Position" name="positions" onkeyup="NumbersOnly(this)" required>
                                                            </div>

                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label>Start Date: *</label>
                                                                <input type="date" class="form-control" placeholder="Enter Timeline" name="timeline" required>
                                                            </div>

                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label>End Date: *</label>
                                                                <input type="date" class="form-control" placeholder="Enter Timeline" name="end_date" required>
                                                            </div>

                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label>Specialization: </label>
                                                                <input type="text" class="form-control" placeholder="Enter Specialization" name="specialization" onkeyup="LettersOnly(this)">
                                                            </div>

                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label>Caste Category: *</label>
                                                                <input type="text" class="form-control" placeholder="Enter Caste Category" name="cast_category" onkeyup="LettersOnly(this)" required>
                                                            </div>

                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="requirement_source">Requirement Source *</label>
                                                                <select class="form-control" name="requirement_source" id="requirement_source" required>
                                                                    <option value="">Select Requirement Source</option>
                                                                    <?php foreach ($req_source as $key => $value) : ?>
                                                                        <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="exam">Assign To EO: *</label><br>
                                                                <input type="radio" id="done" name="assign_to" value="eo">
                                                                <label for="eo">Individual</label>
                                                                &nbsp;&nbsp;
                                                                <input type="radio" id="all" name="assign_to" value="all">
                                                                <label for="all">All</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6 col-md-6 col-lg-6" id="eoDropdown" style="display: none;">
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
                                                    </div>


                                                    <!-- </div> -->
                                                    <div class="modal-footer justify-content-center">
                                                        <center><button type="Submit" class="btn btn-primary">Submit</button></center>
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
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Sr.No</th>
                                                    <th>Position Name</th>
                                                    <th>Institute Name</th>
                                                    <th>No.of Positions</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>Specialization</th>
                                                    <th>Caste Category</th>
                                                    <th>Requirement Source</th>
                                                    <th> Status</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1;
                                                foreach ($positionlist as $row) { ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $row['name']; ?></td>
                                                        <td><?php echo $row['institute_name']; ?></td>
                                                        <td><?php echo $row['positions']; ?></td>
                                                        <td><?php echo $row['timeline']; ?></td>
                                                        <td><?php echo $row['end_date']; ?></td>
                                                        <td><?php echo $row['specialization']; ?></td>
                                                        <td><?php echo $row['cast_category']; ?></td>
                                                        <td><?php echo $row['requirement_source']; ?></td>

                                                        <!-- <?php
                                                                $this->load->helper('date');

                                                                $originalDate  = $row['reg_date_time'];
                                                                $newDate = date("d-m-Y", strtotime($originalDate));
                                                                ?>
                                                    <td><?php echo $newDate; ?></td> -->
                                                        <td>
                                                            <?php $status = $row['status'];
                                                            if ($status == 'Active') { ?>
                                                                <a href="<?php echo base_url() . 'Position/status_update/' . $row['id']; ?>" style="color: green;"><?php echo $status; ?></a>
                                                            <?php } else { ?>
                                                                <a href="<?php echo base_url() . 'Position/status_update/' . $row['id']; ?>" style="color: red;"><?php echo $status; ?></a>
                                                            <?php  } ?>
                                                        </td>
                                                        <td><a class="btn btn-info" data-toggle="modal" data-target="#modal-edit<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                                                        </td>
                                                    </tr>

                                    </div>

                                </div>
                                <div class="modal fade" id="modal-edit<?php echo $row['id']; ?>">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Position </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="post" action="<?php echo base_url() . 'Position/updatePosition' ?>" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input type="hidden" value="<?php echo $row['id']; ?>" id="id" class="form-control" name="id">
                                                        <div class="row">
                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                <div class="form-group">
                                                                    <label> Name :</label>
                                                                    <input type="text" class="form-control" value="<?php echo $row['name']; ?>" name="name" onkeyup="LettersOnly(this)" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Institute Name:</label>
                                                                    <input type="text" class="form-control" value="<?php echo $row['institute_name']; ?>" name="institute_name" onkeyup="LettersOnly(this)" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                <div class="form-group">
                                                                    <label> Number of Positions:</label>
                                                                    <input type="text" class="form-control" value="<?php echo $row['positions']; ?>" name="positions" onkeyup="NumbersOnly(this)" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                <div class="form-group">
                                                                    <label> Start Date:</label>
                                                                    <input type="date" class="form-control" value="<?php echo $row['timeline']; ?>" name="timeline">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                <div class="form-group">
                                                                    <label> End Date:</label>
                                                                    <input type="date" class="form-control" value="<?php echo $row['end_date']; ?>" name="end_date">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Specialization:</label>
                                                                    <input type="text" class="form-control" value="<?php echo $row['specialization']; ?>" name="specialization" onkeyup="LettersOnly(this)">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                <div class="form-group">
                                                                    <label> Caste Category:</label>
                                                                    <input type="text" class="form-control" value="<?php echo $row['cast_category']; ?>" name="cast_category" onkeyup="LettersOnly(this)" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Requirement Source:</label>
                                                                    <!-- <input type="text" class="form-control" value="<?php echo $row['requirement_source']; ?>" name="requirement_source" onkeyup="LettersOnly(this)" required>

                                                                    <label>Category Name</label>  -->

                                                                    <select class="form-control" name="CATEGORY_ID" required="">
                                                                        <option value="">Requirement Source:</option>
                                                                        <?php foreach ($req_source as $key => $value) : ?>
                                                                            <option value="<?php echo $value['id']; ?>" <?php if ($value['id'] == $row['requirement_source']) {
                                                                                                                            echo 'Selected';
                                                                                                                        } ?>><?php echo $value['name']; ?></option>
                                                                        <?php endforeach ?>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label for="exam">Assign To EO:</label><br>
                                                                    <input type="radio" name="assign_to2" id="assign_to_eo_<?php echo $i; ?>" value="eo" onclick="assign_to('eo',<?php echo $i; ?>);" <?php if ($row['assign_to'] == 'eo') echo 'checked'; ?>>
                                                                    <label for="eo">Individual</label>
                                                                    &nbsp;&nbsp;
                                                                    <input type="radio" name="assign_to2" id="assign_to_all_<?php echo $i; ?>" value="all" onclick="assign_to('all',<?php echo $i; ?>);" <?php if ($row['assign_to'] == 'all') echo 'checked'; ?>>
                                                                    <label for="all">All</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12" id="eoRadio1<?php echo $i; ?>" style="display: <?php if ($row['eo_id'] != '' && $row['assign_to'] == 'eo') {
                                                                                                                                                                echo 'block';
                                                                                                                                                            } else {
                                                                                                                                                                echo 'none';
                                                                                                                                                            } ?>;">
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
        function assign_to(eoRadio, id) {
            var v1 = "eoRadio1" + id;

            if (eoRadio == 'eo') {
                document.getElementById(v1).style.display = 'block';
            } else {
                document.getElementById(v1).style.display = 'none';
            }
        }
    </script>

    <!-- arbaj 08-12-23 -->


    <script>
        // jQuery code to get the selected radio button value
        $(document).ready(function() {
            $('input[name="assign_to"]').change(function() {
                var selectedValue = $('input[name="assign_to"]:checked').val();
                console.log(selectedValue);

                if (selectedValue == 'eo') {

                    $('#eoDropdown').show();
                } else {

                    $('#eoDropdown').hide();
                }
            });
        });
    </script>
    <!-- arbaj 08-12-23 -->

    <!-- <script>
        var eoRadio = document.getElementById("done");
        var eoDropdown = document.getElementById("eoDropdown");

         
        eoRadio.addEventListener("click", function() {
            if (eoRadio.checked) {
              // alert("ok");
                eoDropdown.style.display = "block";
            }
        });

        var allRadio = document.getElementById("all");
        allRadio.addEventListener("click", function() {
            eoDropdown.style.display = "none";
        });
    </script> -->
    <script>
        var eoRadio = document.getElementById("done1");
        var eoDropdown = document.getElementById("eoDropdown1");

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