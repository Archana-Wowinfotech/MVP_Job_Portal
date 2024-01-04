<!DOCTYPE html>
<html lang="en">
<style>
    .card-header {
    background-color: #d0e0ea !important;
    }
    .card-primary.card-outline {
    border-top: 5px solid #2f4862 !important;
    }
</style>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MVP JOB PORTAL</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url().'plugins/fontawesome-free/css/all.min.css'; ?>">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url().'plugins/icheck-bootstrap/icheck-bootstrap.min.css'; ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url().'dist/css/adminlte.min.css'; ?>">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="row">
            <!-- Left Column for Image -->
            <div class="col-md-6">
                <div class="card card-outline card-primary">
                    <div class="card-header text-center">
                        <img src="<?= base_url().'upload/college.jpg'; ?>" style="width: 400px" height="500px" alt="User Image">
                    </div>
                </div>
            </div>
            <!-- Right Column for Login Form -->
            <div class="col-md-6">
                <div class="card card-outline card-primary">
                    <div class="card-header text-center">
                        <p class="login-box-msg">Sign in to start your session</p>
                        <?php if ($this->session->flashdata('success') != '') { ?>
                            <center>
                                <p class="text-success"><?php echo $this->session->flashdata('success'); ?></p>
                            </center>
                        <?php } ?>
                        <?php if ($this->session->flashdata('error') != '') { ?>
                            <center>
                                <p class="text-danger"><?php echo $this->session->flashdata('error'); ?></p>
                            </center>
                        <?php } ?>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url('Home/save').''; ?>" method="post">
                            <div class="input-group mb-3">
                                <input type="text" name="username" class="form-control" placeholder="Username">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_error('Username', "<p style='color:red'>", "</p>"); ?>
                            <div class="input-group mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_error('password', "<p style='color:red'>", "</p>"); ?>
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?php echo base_url() . 'plugins/jquery/jquery.min.js'; ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url() . 'plugins/bootstrap/js/bootstrap.bundle.min.js'; ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url() . 'dist/js/adminlte.min.js'; ?>"></script>
</body>


</html>