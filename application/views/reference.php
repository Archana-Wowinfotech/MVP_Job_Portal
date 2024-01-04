<!DOCTYPE html>
<html lang="en">
    <style>
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

                            <h1 class="m-0">Reference</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url() . 'Home/dashboard'; ?>">Home<p style="margin-bottom:0px;padding-bottom:0px;"> </a></li>
                                <li class="breadcrumb-item active">Reference</li>
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
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> Add New Reference</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="modal-default">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Add New Reference </h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="post" action="<?php echo base_url() . 'Reference/saveReference' ?>" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <input type="text" class="form-control" placeholder="Enter Position Name" name="name" required>
                                                    </div>



                                                    <!-- </div> -->
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="Submit" class="btn btn-default">Submit</button>
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
                                                <th>Name</th>
                                                <!-- <th>Date</th> -->
                                                <th> Status</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                            foreach ($referencelist as $row) { ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $row['name']; ?></td>

                                                    <!-- <?php
                                                    $this->load->helper('date');

                                                    $originalDate  = $row['reg_date_time'];
                                                    $newDate = date("d-m-Y", strtotime($originalDate)); 
                                                    ?>
                                                    <td><?php echo $newDate; ?></td> -->
                                                    <td>
                                                        <?php $status = $row['status'];
                                                        if ($status == 'Active') { ?>
                                                            <a href="<?php echo base_url() . 'Reference/status_update/' . $row['id']; ?>" style="color: green;"><?php echo $status; ?></a>
                                                        <?php } else { ?>
                                                            <a href="<?php echo base_url() . 'Reference/status_update/' . $row['id']; ?>" style="color: red;"><?php echo $status; ?></a>
                                                        <?php  } ?>
                                                    </td>
                                                    <!-- <td><a class="btn btn-info" data-toggle="modal" data-target="#modal-edit<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                                                    </td> -->
                                                </tr>

                                </div>
                                <?php $i++;
                                            } ?>
                                    </table>
                                </div>
                                <!-- <div class="modal fade" id="modal-edit<?php echo $row['CATEGORY_ID']; ?>">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Category </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="post" action="<?php echo base_url() . 'Category/updateCategory' ?>" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input type="hidden" value="<?php echo $row['CATEGORY_ID']; ?>" id="CATEGORY_ID" class="form-control" name="CATEGORY_ID">
                                                 
                                                        <div class="form-group">
                                                            <label>Category Title</label>
                                                            <input type="text" value="<?php echo isset($row['CATEGORY_TITLE']) ? $row['CATEGORY_TITLE'] : ''; ?>" id="CATEGORY_TITLE" name="CATEGORY_TITLE" class="form-control" required>
                                                        </div>



                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="Submit" class="btn btn-default">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    
                                    </div>

                                </div> -->
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
    <script src="//cdn.gaic.com/cdn/ui-bootstrap/0.58.0/js/lib/ckeditor/ckeditor.js"></script>
    <script src="//cdn.gaic.com/cdn/ui-bootstrap/0.58.0/js/lib/jquery.min.js"></script>
    <script src="//cdn.gaic.com/cdn/ui-bootstrap/0.58.0/js/lib/angular.min.js"></script>
    <script src="//cdn.gaic.com/cdn/ui-bootstrap/0.58.0/js/gaig-ui-bootstrap.js"></script>

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