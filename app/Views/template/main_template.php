<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $title ?></title>
    <link rel="icon" type="image/png" sizes="32x32" href="<?=site_url()?>img/favicon-32x32.png">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?=site_url()?>assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=site_url()?>assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?=site_url()?>assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet" href="<?=site_url()?>assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?=site_url()?>assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
    <!-- <link rel="stylesheet" href="<?=site_url()?>assets/modules/bootstrap-daterangepicker/daterangepicker.css"> -->
    <link rel="stylesheet" href="<?=site_url()?>assets/modules/summernote/summernote-bs4.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?=site_url()?>assets/css/style.css">
    <link rel="stylesheet" href="<?=site_url()?>assets/css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>

    <script src="<?=site_url()?>assets/modules/jquery.min.js"></script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <!-- navbar -->
            <?= $this->include('template/navbar'); ?>
            <!-- sidebar -->
            <?= $this->include('template/sidebar'); ?>
            <!-- Main Content -->
            <?= $content ?>
            <!-- footer -->
            <?= $this->include('template/footer'); ?>
        </div>
    </div>

    <!-- General JS Scripts -->

    <script src="<?=site_url()?>assets/modules/popper.js"></script>
    <script src="<?=site_url()?>assets/modules/tooltip.js"></script>
    <script src="<?=site_url()?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=site_url()?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="<?=site_url()?>assets/modules/moment.min.js"></script>
    <script src="<?=site_url()?>assets/js/stisla.js"></script>
    <!-- JS Libraies -->
    <script src="<?=site_url()?>assets/modules/datatables/datatables.min.js"></script>
    <script src="<?=site_url()?>assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?=site_url()?>assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
    <!-- <script src="<?=site_url()?>assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script> -->
    <script src="<?=site_url()?>assets/modules/jquery-ui/jquery-ui.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="<?=site_url()?>assets/js/page/modules-datatables.js"></script>

    <!-- JS Libraies -->
    <script src="<?=site_url()?>assets/modules/summernote/summernote-bs4.js"></script>

    <!-- Page Specific JS File -->
    <script src="<?=site_url()?>assets/js/page/index-0.js"></script>

    <!-- Template JS File -->
    <script src="<?=site_url()?>assets/js/scripts.js"></script>
    <script src="<?=site_url()?>assets/js/custom.js"></script>

    <script>
        $(document).ready(function() {
            // Function to populate the form with JSON data
            function populateForm(data) {
                $("#namasidebar").html(data.nama);
                $("#namafooter").html(data.nama);
                $("#aliassidebar").html(data.alias);
            }
            // Fetch JSON data using AJAX
            $.ajax({
                url: "<?= site_url('perusahaan/1') ?>",
                dataType: "json",
                success: function(data) {
                    populateForm(data);
                },
                error: function() {
                    console.log("Error fetching JSON data.");
                }
            });
        });
    </script>
</body>

</html>