<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Css Cosutum -->
    <!-- <link href="<?= base_url('assets/') ?>/assets/css/login.css" rel="stylesheet"> -->
    <title>Registrasi</title>

</head>

<body>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="<?php echo base_url() ?>/assets/img/Gambar-login.png" class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">

                    <?= $this->session->flashdata('message'); ?>
                    <?= $this->session->flashdata('email_sent'); ?>
                    <form class="user" method="post" action="<?= base_url('auth/register')?>" style="width: 23rem;">

                        <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Register</h3>

                        <div class="form-outline mb-2">
                            <input type="text" name="fullname" class="form-control form-control-user"
                                placeholder="Fullname" value="<?= set_value('fullname') ?>">
                            <?= form_error('fullname', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>

                        <div class="form-outline mb-2">
                            <input type="email" name="email" class="form-control form-control-user" placeholder="Email"
                                value="<?= set_value('email') ?>">
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>

                        <div class="form-outline mb-2">
                            <input type="text" name="username" class="form-control form-control-user"
                                placeholder="Usename" value="<?= set_value('username') ?>">
                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0 input-group">
                                <input id="pass" type="password" name="password" class="form-control form-control-user"
                                    placeholder="Password" value="<?= set_value('password') ?>">

                                <div class="input-group-append">
                                    <span id="mybutton" class="input-group-text form-control form-control-user"
                                        onclick="show()"><i class="fas fa-eye"> </i></span>
                                </div>
                            </div>
                            <div class="col-sm-6 input-group">
                                <input id="pass1" type="password" name="repeat_password"
                                    class="form-control form-control-user" placeholder="Repeat"
                                    value="<?= set_value('repeat_password') ?>">

                                <div class="input-group-append">
                                    <span id="mybutton2" class="input-group-text form-control form-control-user"
                                        onclick="show2()"><i class="fas fa-eye"> </i></span>
                                </div>
                            </div>
                            <?= form_error('password', '<small class="text-danger col-sm-6 mb-3 ml-3 mt-1 mb-sm-0">', '</small>') ?>
                            <?= form_error('repeat_password', '<small class="text-danger col-sm-5 mt-1">', '</small>') ?>
                        </div>

                        <div class="pt-1 mb-4">
                            <button class="btn btn-info btn-lg btn-block" type="submit">Register</button>
                        </div>

                        <!-- <p class="small mb-3 pb-lg-2"><a class="text-muted"
                                href="<?= base_url('auth/forgotpassword'); ?>">Forgot password?</a></p> -->
                        <p>Already have an account? <a href="<?= base_url('auth') ?>" class="link-info">Login!</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

    <script type="text/javascript">
    function show() {
        var x = document.getElementById('pass').type;

        if (x == 'password') {
            document.getElementById('pass').type = 'text';
            document.getElementById('mybutton').innerHTML = '<i class="fas fa-eye-slash"></i>';
        } else {
            document.getElementById('pass').type = 'password';
            document.getElementById('mybutton').innerHTML = '<i class="fas fa-eye"></i>';
        }
    }
    </script>

    <script type="text/javascript">
    function show2() {
        var x = document.getElementById('pass1').type;

        if (x == 'password') {
            document.getElementById('pass1').type = 'text';
            document.getElementById('mybutton2').innerHTML = '<i class="fas fa-eye-slash"></i>';
        } else {
            document.getElementById('pass1').type = 'password';
            document.getElementById('mybutton2').innerHTML = '<i class="fas fa-eye"></i>';
        }
    }
    </script>

</body>

</html>