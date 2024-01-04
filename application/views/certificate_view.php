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

                            <h1 class="m-0">Documents</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                            foreach ($certificate as $row) {

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


                                                  

                                                </tr>

                                                <?php $i++;
                                            } ?>

                                </div>
                              
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