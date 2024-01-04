<style>
    .form-style input {
        border: 0;
        height: 50px;
        border-radius: 0;
        border-bottom: 1px solid #ebebeb;
    }

    .form-style input:focus {
        border-bottom: 1px solid #007bff;
        box-shadow: none;
        outline: 0;
        background-color: #ebebeb;
    }

    .sideline {
        display: flex;
        width: 100%;
        justify-content: center;
        align-items: center;
        text-align: center;
        color: #ccc;
    }

    button {
        height: 50px;
    }

    .sideline:before,
    .sideline:after {
        content: '';
        border-top: 1px solid #ebebeb;
        margin: 0 20px 0 0;
        flex: 1 0 20px;
    }

    .sideline:after {
        margin: 0 0 0 20px;
    }

    .m-44 {
        margin: 8rem !important;
    }



    @media screen and (max-width: 1366px) {
        .m-44 {
            margin: 5rem 8rem 0 !important;
        }

        .bg-white.p-5 {
            padding: 1rem 3rem !important;
        }
    }

    @media screen and (max-width:1280px) {
        .m-44 {
            margin: 4rem 8rem 0 !important;
        }

        .bg-white.p-5 {
            padding: 1rem 3rem !important;
        }
    }

    @media screen and (max-width:575px) {
        .d-md-block {
            display: none !important;
        }

        .m-44 {
            margin: 4rem 3rem 0 !important;
        }
    }

    @media screen and (max-width:479px) {
        .d-md-block {
            display: none !important;
        }

        .m-44 {
            margin: 4rem 3rem 0 !important;
        }
    }

    .submited .btn {
        width: 100px;
        padding: 0;
        height: 42px;
    }
</style>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url() . 'dist/css/custom.css'; ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
<div class="container">
    <div class="row m-44 no-gutters shadow-lg">
        <div class="col-lg-6 col-md-12 col-sm-12 d-none d-md-block">
            <img src="<?php echo base_url() . 'upload/college.png'; ?>" class="img-fluid" style="min-height:100%;" />
        </div>

    


        <div class="col-lg-6 col-md-12 col-sm-12 bg-white p-5">
      

            <div class="form-style">

                <form action="<?php echo base_url() . 'Home/save'; ?>" method="post">


                    <div class="form-group text-center pb-3">
                        <img src="<?php echo base_url() . 'upload/logo.jpg'; ?>" class="img-fluid" height="200px" width="200px" />
                    </div>
                    <div class="form-group text-center pb-3">
                    <h2 style="color: #b24545;"><b>Talent Aquisition Cell</b></h2>
                    </div>


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
                    <!-- <?php echo form_error('Role', "<p style='color:red'>", "</p>"); ?>
                    <div class="form-group text-center pb-3">

                        <select id="dropdown" class="form-control" name="role" style="color: #026C7C; font-weight: bold;">
                            <option value="education_officer" style="font-weight: bold;">Education Officer</option>
                            <option value="recruitement cell coordinator" style="font-weight:bold;">Recruitment Cell Co-ordinator</option>
                            <option value="sarchitnis" style="font-weight:bold;">Sarchitnis</option>

                        </select>
                    </div> -->
                    <?php echo form_error('Role', "<p style='color:red'>", "</p>"); ?>
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <?php echo form_error('Email', "<p style='color:red'>", "</p>"); ?>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" id="password-field">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                        </div>
                    </div>
                    <?php echo form_error('password', "<p style='color:red'>", "</p>"); ?>
                    <div class="submited">
                        <center><button type="submit" class="btn btn-primary btn-block">Login</button></center>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>


<script src="https://use.fontawesome.com/f59bcd8580.js"></script>

<script>
    $(".toggle-password").on('click', function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
</script>
<script>
    var timeout = 3000; // in miliseconds (3*1000)
    $('#success-alert').delay(timeout).fadeOut(300);
    $('#danger-alert').delay(timeout).fadeOut(300);
</script>