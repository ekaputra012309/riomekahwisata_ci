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
    <link rel="stylesheet" href="<?=site_url()?>assets/modules/bootstrap-social/bootstrap-social.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?=site_url()?>assets/css/style.css">
    <link rel="stylesheet" href="<?=site_url()?>assets/css/components.css">
    <style>
        .error-message {
            color: red;
            margin-bottom: 10px;
        }
    </style>
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
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
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img id="vlama" alt="image" src="<?=site_url()?>assets/img/stisla-fill.svg" width="100" class="shadow-light rounded-circle">
                            <img id="vphoto" alt="image" src="" width="100" class="shadow-light">
                        </div>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>

                            <div class="card-body">
                                <?php if (session()->getFlashdata('msg')) : ?>
                                    <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                                <?php endif; ?>
                                <form method="POST" action="<?= site_url('auth/login') ?>" class="needs-validation" novalidate="">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Please fill in your email
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                        </div>
                                        <div class="input-group">
                                            <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                            <div class="input-group-append">
                                                <button id="togglePassword" type="button" class="btn btn-outline-secondary"><i class="fas fa-eye"></i></button>
                                            </div>
                                            <div class="invalid-feedback">
                                                Please fill in your password.
                                            </div>
                                        </div>

                                    </div>


                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <!-- <div class="mt-5 text-muted text-center">
                            Don't have an account? <a href="auth-register.html">Create One</a>
                        </div> -->
                        <div class="simple-footer">
                            Copyright &copy; <?php if (date('Y') == '2023') : ?>
                                2023
                            <?php else : ?>
                                2023 - <?= date('Y') ?>
                            <?php endif ?> <div class="bullet"></div> <span id="nama"></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="<?=site_url()?>assets/modules/jquery.min.js"></script>
    <script src="<?=site_url()?>assets/modules/popper.js"></script>
    <script src="<?=site_url()?>assets/modules/tooltip.js"></script>
    <script src="<?=site_url()?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=site_url()?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="<?=site_url()?>assets/modules/moment.min.js"></script>
    <script src="<?=site_url()?>assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="<?=site_url()?>assets/js/scripts.js"></script>
    <script src="<?=site_url()?>assets/js/custom.js"></script>

    <script>
        $(document).ready(function() {
            $('#togglePassword').click(function() {
                var passwordField = $('#password');
                var fieldType = passwordField.attr('type');

                if (fieldType === 'password') {
                    passwordField.attr('type', 'text');
                    $('#togglePassword').find('i').removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    passwordField.attr('type', 'password');
                    $('#togglePassword').find('i').removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });

            var autoDismissTime = 3000;
            // Select the alert element
            var alertElement = $('.alert');
            // Dismiss the alert after the specified time
            setTimeout(function() {
                alertElement.fadeOut('slow', function() {
                    $(this).remove();
                });
            }, autoDismissTime);

            var jsonDataUrl = "<?= $url ?>";
            // Function to populate the form with JSON data
            function populateForm(data) {
                $("#nama").html(data.nama);
                if (data.logo) {
                    $("#vphoto").attr("src", "<?=site_url()?>img/" + data.logo);
                    $("#vlama").hide();
                } else {
                    $("#vphoto").hide();
                    $("#vlama").show();
                }
            }
            // Fetch JSON data using AJAX
            $.ajax({
                url: jsonDataUrl,
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