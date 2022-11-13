<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container mt-auto">
        <div class="copyright text-center mt-auto">
            <span>Copyright &copy; Everything doing with ❤️ <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- jquery -->
<script src="<?php echo base_url() ?>/assets/vendor/jquery/jquery.min.js"></script>
<!-- jquery datatable -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

<!-- script tambahan  -->
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js">
</script>

<!-- fungsi datatable -->
<script>
$(document).ready(function() {
    $('#table_id').DataTable({
        // script untuk membuat export data 
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    })
});
</script>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url() ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() ?>/vendor/bootstrap-icons/bootstrap-icons.json"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url() ?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url() ?>/assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url() ?>/assets/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url() ?>/assets/js/demo/chart-area-demo.js"></script>
<script src="<?php echo base_url() ?>/assets/js/demo/chart-pie-demo.js"></script>

<!-- Date Time Pickers -->
<script src="<?php echo base_url() ?>/assets/js/jquery.datetimepicker.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
jQuery.datetimepicker.setLocale('moment');
$('#picker').datetimepicker({
    timepicker: false,
    datepicker: true,
    format: 'Y-m-d',
    weeks: true
});
$('#toggle').on('click', function() {
    $('#picker').datetimepicker('toggle')
})
</script>

<!-- Costum -->
<script src="<?php echo base_url() ?>/assets/js/purecounter_vanila.js"></script>

<script>
// Initialize PureCounter by Default. It also can be stored on variable
new PureCounter();
// Initialize PureCounter using custom selector and custom default configuration.
// It also can be stored on variable
new PureCounter({
    filesizing: true,
    selector: ".filesizecount",
    pulse: 2,
});
</script>

<script type="text/javascript">
$(function() {
    $('#datetimepicker6').datetimepicker();
    $('#datetimepicker7').datetimepicker({
        useCurrent: false //Important! See issue #1075
    });
    $("#datetimepicker6").on("dp.change", function(e) {
        $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
    });
    $("#datetimepicker7").on("dp.change", function(e) {
        $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
    });
});
</script>

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

<script type="text/javascript">
$(document).ready(function() {
    setInterval(function() {
        $.ajax({
            url: "<?=base_url()?>admin/notifikasi",
            type: "POST",
            dataType: "json", //datatype lainnya: html, text
            data: {},
            success: function(data) {
                $("#notif_count").html(data.notif_count);
            }
        });
    }, 2000);
})
</script>

<script type="text/javascript">
$(document).ready(function() {
    setInterval(function() {
        $.ajax({
            url: "<?=base_url()?>admin/notifSudahDibaca",
            type: "POST",
            dataType: "json", //datatype lainnya: html, text
            data: {},
            success: function(data) {
                $("#all_notif").html(data.all_notif);
            }
        });
    }, 2000);
})
</script>


<script>
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
})
</script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<?php if ($this->session->flashdata('add-success')) : ?>
<script>
swal.fire({
    icon: "success",
    title: "Success !",
    text: "Add data success !",
    showConfirmButton: false,
    timer: 1500
})
</script>
<?php endif; ?>

<?php if ($this->session->flashdata('update-success')) : ?>
<script>
swal.fire({
    icon: "success",
    title: "Success !",
    text: "Update data success !",
    showConfirmButton: false,
    timer: 1500
})
</script>
<?php endif; ?>

<script>
$('.delete-button').on('click', function(e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Ingin Delete Data Archve ?",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'No',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = href;
            Swal.fire({
                title: 'Canceled!',
                text: "Berhasil Delete Data Archive.",
                icon: 'success',
            })
        }
    })
})
</script>

<script>
$('.Req_Edit-button').on('click', function(e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Request Edit?',
        text: "Request untuk akses Edit?",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'No',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = href;
            Swal.fire({
                title: 'Success!',
                text: "Silahkan tunggu konfirmasi!",
                icon: 'success',
                confirmButtonText: 'No'
            })
        }
    })
})
</script>

<script>
$('.Req_Delete-button').on('click', function(e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Request Delete?',
        text: "Request untuk akses Delete?",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'No',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = href;
            Swal.fire({
                title: 'Success!',
                text: "Silahkan tunggu konfirmasi!",
                icon: 'success',
                confirmButtonText: 'No'
            })
        }
    })
})
</script>

<script>
$('.WR_Edit-button').on('click', function(e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah anda yakin ?',
        text: "Ingin Approved Edit Data Archve ?",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'No',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = href;
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "Berhasil Approved Edit Data Archive.",
                confirmButtonText: 'No',
                showConfirmButton: true,
            })
        }
    })
})
</script>

<script>
$('.WR_Delete-button').on('click', function(e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah anda yakin ?',
        text: "Ingin Approved Delete Data Archve ?",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'No',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = href;
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "Berhasil Approved Delete Data Archive.",
                confirmButtonText: 'No',
                showConfirmButton: true,
            })
        }
    })
})
</script>

<script>
$('.WR_Cancel-button').on('click', function(e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah anda yakin ?',
        text: "Ingin Reject Request Edit Data Archve ?",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'No',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = href;
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "Berhasil Reject Delete Data Archive.",
                confirmButtonText: 'No',
                showConfirmButton: true,
            })
        }
    })
})
</script>

<script>
$('.DC_barang-button').on('click', function(e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Exit Item?',
        text: "Barang ingin di kirim?",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'No',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = href;
            Swal.fire({
                title: 'Success!',
                text: "Succes kirim barang!",
                icon: 'success',
                confirmButtonText: 'No'
            })
        }
    })
})
</script>

<script>
// JQUERY untuk checkox role
$('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
});

$('.form-check-input').on('click', function() {
    const menuId = $(this).data('menu');
    const roleId = $(this).data('role');

    $.ajax({
        url: "<?= base_url('super_admin/changeaccess'); ?>",
        type: 'post',
        data: {
            menuId: menuId,
            roleId: roleId
        },
        success: function() {
            document.location.href = "<?= base_url('super_admin/roleaccess/'); ?>" + roleId;
        }
    });

});
</script>

</body>

</html>