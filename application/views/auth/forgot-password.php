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

    <!-- Css Cosutum -->
    <link href="<?= base_url('assets/') ?>/assets/css/login.css" rel="stylesheet">
    <title>Login</title>

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
                    <form class="user" method="post" action="<?= base_url('auth/forgotpassword')?>"
                        style="width: 23rem;">

                        <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Forget Password</h3>

                        <div class="form-outline mb-4">
                            <input type="text" class="form-control form-control-user" id="email" name="email"
                                placeholder="Email Address" value="<?= set_value('email'); ?>">
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>

                        </div>

                        <button type="submit" class="btn btn-info btn-user btn-block">
                            Reset Password
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </section>

</body>

</html>



<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>


<!-- sweetalert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<?php if ($this->session->flashdata('register-success')) : ?>
<script>
swal.fire({
    icon: "success",
    title: "Berhasil!",
    text: "Register success!",
    showConfirmButton: false,
    timer: 1700
})
</script>
<?php endif; ?>

<?php if ($this->session->flashdata('login-failed-1')) : ?>
<script>
swal.fire({
    icon: "error",
    title: "Gagal!",
    text: "Login gagal, password salah!",
    showConfirmButton: false,
    timer: 1500
})
</script>
<?php endif; ?>

<?php if ($this->session->flashdata('login-failed-2')) : ?>
<script>
swal.fire({
    icon: "error",
    title: "Gagal!",
    text: "Username atau password salah!",
    showConfirmButton: false,
    timer: 1500
})
</script>
<?php endif; ?>

<?php if ($this->session->flashdata('login-failed-3')) : ?>
<script>
swal.fire({
    icon: "error",
    title: "Gagal!",
    text: "Anda belum memasukan username dan password!",
    showConfirmButton: true
})
</script>
<?php endif; ?>

<?php if ($this->session->flashdata('logout-success')) : ?>
<script>
swal.fire({
    icon: "success",
    title: "Berhasil!",
    text: "Anda berhasil logout!",
    showConfirmButton: false,
    timer: 1500
})
</script>
<?php endif; ?>

<script type="text/javascript">
// tampilkan password
$(document).ready(function() {
    $('.form-checkbox').click(function() {
        if ($(this).is(':checked')) {
            $('.form-password').attr('type', 'text');
        } else {
            $('.form-password').attr('type', 'password');
        }
    });
});
</script>


</body>

</html>