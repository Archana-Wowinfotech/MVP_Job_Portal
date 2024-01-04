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
        #modal-viewData<?php echo $j; ?>,
        #modal-viewData<?php echo $j; ?>* {
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

                            <h1 class="m-0">Institute Report</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url() . 'Home/dashboard'; ?>">Home<p style="margin-bottom:0px;padding-bottom:0px;"> </a></li>
                                <li class="breadcrumb-item active">Institute Report</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <!-- <div class="text-right mb-4">
                        <a href="<?php echo base_url() . 'Report/toExcel/' . $institute_id; ?>" class="btn btn-success"><i class="fa fa-file-excel-o" aria-hidden="true"></i>&nbsp; Export Excel</a>
                    </div> -->
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
                                                   
                                                    <th>Institute Name</th>
                                                    <th>Institute </th>
                                                    

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1;
                                                foreach ($getProfessionalInstitute as $row) { ?>
                                                    <tr>
                                                    <td><?php echo $i; ?></td>
                                                        <td>
                                                        <a href="<?php echo base_url().'institute-details/'.$row['college_id'];?>"><?php echo $row['college_name']; ?></a>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['institute_name']; ?>
                                                        </td>
                                                     
                                                       
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