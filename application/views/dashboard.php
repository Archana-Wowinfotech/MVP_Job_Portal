<!DOCTYPE html>
<html lang="en">

<?php include 'public/head.php'; ?>
<style>
    .small-box>.inner {
        padding: 10px;
        height: 90px;
    }

    .small-box>.small-box-footer {

        height: 33px;
    }

    p {
        /* margin-top: 0; */
        margin-bottom: 0rem !important;
        font-size: 20px !important;
        margin-top: 10px;
        /* margin-left: 10px; */
    }

    .bg-blue {
        background-color: #3975b5 !important;
    }

    .bg-pink {
        background-color: #b12867 !important;
    }

    .bg-success {
        background-color: #0d8328 !important;
    }

    .bg-purple {
        background-color: #7a43df !important;
    }
    .bg-red {
    background-color: #b704ab!important;
}
</style>
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">



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
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url() . 'Home/dashboard'; ?>">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>


            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row"> <!-- ./col -->
                        <?php

                        if ($this->session->userdata('Role') == 'recruitement cell coordinator') {
                        ?>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-pink">
                                    <div class="inner">
                                        <p>Total Application : &nbsp;&nbsp;
                                            <b style="font-size:30px;"><?php echo count($applicantCount); ?></b>
                                        </p>
                                    </div>
                                    <div class="icon">
                                        <!-- <i class="fas fa-user"></i> -->
                                    </div>
                                    <a href="<?php echo base_url() . 'Applicant/getApplicantByStatus/All'; ?>" class="small-box-footer">Read More <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-purple">
                                    <div class="inner">
                                        <p>Pending Application  : &nbsp;
                                            <b style="font-size:30px;"><?php echo $PendingCount; ?></b>
                                        </p>
                                        <!-- <p>Job Allocated: <?php echo $PendingCount; ?></p> -->

                                    </div>
                                    <div class="icon">
                                        <!-- <i class="fas fa-address-card"></i> -->
                                    </div>
                                    <a href="<?php echo base_url() . 'Applicant/getApplicantByStatus/Pending'; ?>" class="small-box-footer"> Read More <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <p>In Process Application : &nbsp;
                                            <b style="font-size:30px;"><?php echo $InprocessCount; ?></b>
                                        </p>
                                        <!-- <p>In Process Applicant List: <?php echo $InprocessCount; ?></p> -->

                                    </div>
                                    <div class="icon">
                                        <!-- <i class="fas fa-address-card"></i> -->
                                    </div>
                                    <a href="<?php echo base_url() . 'Applicant/getApplicantByStatus/In_Process'; ?>" class="small-box-footer"> Read More <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">

                                        <p>Selected Application : &nbsp;
                                            <b style="font-size:30px;"><?php echo $SelectedCount; ?></b>
                                        </p>

                                        <!-- <p>Job Allocated: <?php echo $SelectedCount; ?></p> -->

                                    </div>
                                    <div class="icon">
                                        <!-- <i class="fas fa-address-card"></i> -->
                                    </div>
                                    <a href="<?php echo base_url() . 'Applicant/getApplicantByStatus/Selected'; ?>" class="small-box-footer"> Read More <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                           
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-blue">
                                    <div class="inner">

                                        <p>Rejected Application  :
                                            <b style="font-size:30px;"><?php echo $RejectedCount; ?></b>
                                        </p>
                                        <!-- <p>Job Allocated: <?php echo $RejectedCount; ?></p> -->

                                    </div>
                                    <div class="icon">
                                        <!-- <i class="fas fa-address-card"></i> -->
                                    </div>
                                    <a href="<?php echo base_url() . 'Applicant/getApplicantByStatus/Rejected'; ?>" class="small-box-footer"> Read More <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-red">
                                    <div class="inner">

                                        <p>Referred Application  :
                                            <b style="font-size:30px;"><?php echo $ReferredCount; ?></b>
                                        </p>
                                        <!-- <p>Job Allocated: <?php echo $ReferredCount; ?></p> -->

                                    </div>
                                    <div class="icon">
                                        <!-- <i class="fas fa-address-card"></i> -->
                                    </div>
                                    <a href="<?php echo base_url() . 'Applicant/getApplicantByStatus/Referred_to'; ?>" class="small-box-footer"> Read More <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                        <?php }
                        if ($this->session->userdata('Role') == 'education_officer') { ?>

                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-pink">
                                    <div class="inner">
                                        <?php count($applicantCountEO); ?>
                                        <p> Total Application : &nbsp;
                                            <b style="font-size:30px;"> <?php echo count($applicantCountEO); ?>
                                        </p></b>

                                    </div>
                                    <div class="icon">
                                        <!-- <i class="ion ion-bag"></i> -->
                                    </div>
                                    <a href="<?php echo base_url() . 'ApplicantList/index/all'; ?>" class="small-box-footer"> Read More <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-purple">
                                    <div class="inner">
                                        <p>Pending Application : &nbsp;
                                            <b style="font-size:30px;"><?php echo $PendingCountEO; ?></b>
                                        </p>
                                        <!-- <p>Job Allocated: <?php echo $PendingCountEO; ?></p> -->

                                    </div>
                                    <div class="icon">
                                        <!-- <i class="fas fa-address-card"></i> -->
                                    </div>
                                    <a href="<?php echo base_url() . 'ApplicantList/index/Pending'; ?>" class="small-box-footer"> Read More <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <p>In Process Application : &nbsp;
                                            <b style="font-size:30px;"><?php echo $InprocessCountEO; ?></b>
                                        </p>
                                        <!-- <p>In Process Applicant List: <?php echo $InprocessCountEO; ?></p> -->

                                    </div>
                                    <div class="icon">
                                        <!-- <i class="fas fa-address-card"></i> -->
                                    </div>
                                    <a href="<?php echo base_url() . 'ApplicantList/index/In_Process'; ?>" class="small-box-footer"> Read More <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">

                                        <p>Selected Application : &nbsp;
                                            <b style="font-size:30px;"><?php echo $SelectedCountEO; ?></b>
                                        </p>

                                        <!-- <p>Job Allocated: <?php echo $SelectedCountEO; ?></p> -->

                                    </div>
                                    <div class="icon">
                                        <!-- <i class="fas fa-address-card"></i> -->
                                    </div>
                                    <a href="<?php echo base_url() . 'ApplicantList/index/Selected'; ?>" class="small-box-footer"> Read More <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                           
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-blue">
                                    <div class="inner">

                                        <p>Rejected Application :
                                            <b style="font-size:30px;"><?php echo $RejectedCountEO; ?></b>
                                        </p>
                                        <!-- <p>Job Allocated: <?php echo $RejectedCountEO; ?></p> -->

                                    </div>
                                    <div class="icon">
                                        <!-- <i class="fas fa-address-card"></i> -->
                                    </div>
                                    <a href="<?php echo base_url() . 'ApplicantList/index/Rejected'; ?>" class="small-box-footer"> Read More <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-red">
                                    <div class="inner">

                                        <p>Referred Application  :
                                            <b style="font-size:30px;"><?php echo $ReferredCount; ?></b>
                                        </p>
                                        <!-- <p>Job Allocated: <?php echo $ReferredCount; ?></p> -->

                                    </div>
                                    <div class="icon">
                                        <!-- <i class="fas fa-address-card"></i> -->
                                    </div>
                                    <a href="<?php echo base_url() . 'ApplicantList/index/Refered_to'; ?>" class="small-box-footer"> Read More <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                        <?php }
                        if ($this->session->userdata('Role') == 'sarchitnis') { ?>

                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-pink">
                                    <div class="inner">
                                        <?php count($applicantCount); ?>
                                        <p> Total Application :
                                            <b style="font-size:30px;"><?php echo count($applicantCount); ?>
                                        </p></b>

                                    </div>
                                    <div class="icon">
                                        <!-- <i class="ion ion-bag"></i> -->
                                    </div>
                                    <a href="<?php echo base_url() . 'ApplicantList/getApplicantForSarchitnis/all'; ?>" class="small-box-footer"> Read More <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-purple">
                                    <div class="inner">
                                        <p>Pending Application  : &nbsp;
                                            <b style="font-size:30px;"><?php echo $PendingCount; ?></b>
                                        </p>
                                        <!-- <p>Job Allocated: <?php echo $PendingCount; ?></p> -->

                                    </div>
                                    <div class="icon">
                                        <!-- <i class="fas fa-address-card"></i> -->
                                    </div>
                                    <a href="<?php echo base_url() . 'ApplicantList/getApplicantForSarchitnis/Pending'; ?>" class="small-box-footer"> Read More <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <p>In Process Application : &nbsp;
                                            <b style="font-size:30px;"><?php echo $InprocessCount; ?></b>
                                        </p>
                                        <!-- <p>In Process Applicant List: <?php echo $InprocessCount; ?></p> -->

                                    </div>
                                    <div class="icon">
                                        <!-- <i class="fas fa-address-card"></i> -->
                                    </div>
                                    <a href="<?php echo base_url() . 'ApplicantList/getApplicantForSarchitnis/In_Process'; ?>" class="small-box-footer"> Read More <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">

                                        <p>Selected Application : &nbsp;
                                            <b style="font-size:30px;"><?php echo $SelectedCount; ?></b>
                                        </p>

                                        <!-- <p>Job Allocated: <?php echo $SelectedCount; ?></p> -->

                                    </div>
                                    <div class="icon">
                                        <!-- <i class="fas fa-address-card"></i> -->
                                    </div>
                                    <a href="<?php echo base_url() . 'ApplicantList/getApplicantForSarchitnis/Selected'; ?>" class="small-box-footer"> Read More <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-blue">
                                    <div class="inner">

                                        <p>Rejected Application :
                                            <b style="font-size:30px;"><?php echo $RejectedCount; ?></b>
                                        </p>
                                        <!-- <p>Job Allocated: <?php echo $RejectedCount; ?></p> -->

                                    </div>
                                    <div class="icon">
                                        <!-- <i class="fas fa-address-card"></i> -->
                                    </div>
                                    <a href="<?php echo base_url() . 'ApplicantList/getApplicantForSarchitnis/Rejected'; ?>" class="small-box-footer"> Read More <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-red">
                                    <div class="inner">

                                        <p>Referred Application :
                                            <b style="font-size:30px;"><?php echo $ReferredCount; ?></b>
                                        </p>
                                        <!-- <p>Job Allocated: <?php echo $ReferredCount; ?></p> -->

                                    </div>
                                    <div class="icon">
                                        <!-- <i class="fas fa-address-card"></i> -->
                                    </div>
                                    <a href="<?php echo base_url() . 'ApplicantList/getApplicantForSarchitnis/Refered_to'; ?>" class="small-box-footer"> Read More <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                        <?php } ?>


                    </div><!-- /.container-fluid -->
            </section>


        </div>


        <!-- /.content-wrapper -->
        <?php include 'public/footer.php'; ?>



    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php include 'public/script.php'; ?>

</body>

</html>