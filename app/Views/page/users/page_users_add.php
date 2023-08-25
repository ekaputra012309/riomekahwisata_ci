<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title ?> </h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= site_url('/') ?>">Dashboard</a></div>
                <div class="breadcrumb-item"><?= $title ?></div>
            </div>
        </div>
        <div class="section-body">

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form id="formadd" method="post" class="needs-validation" novalidate="">
                            <div class="card-header">
                                <h4>Add Data <?= $title ?></h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-4 col-12">
                                        <label>User Name</label>
                                        <input type="text" class="form-control" required="" name="username" id="username">
                                        <div class="invalid-feedback">
                                            Please fill in the user name
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 col-12">
                                        <label>Full Name</label>
                                        <input type="text" class="form-control" required="" name="fullname" id="fullname">
                                        <div class="invalid-feedback">
                                            Please fill in the full name
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 col-12">
                                        <label>Email</label>
                                        <input type="email" class="form-control" required="" name="email" id="email">
                                        <div class="invalid-feedback">
                                            Please fill in the email
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4 col-12">
                                        <label>Phone</label>
                                        <input type="tel" class="form-control" required="" name="phone" id="phone">
                                        <div class="invalid-feedback">
                                            Please fill in the phone
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 col-12">
                                        <label>Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" required="" name="pass" id="pass">
                                            <div class="input-group-append">
                                                <button id="togglePassword" type="button" class="btn btn-outline-secondary"><i class="fas fa-eye"></i></button>
                                            </div>
                                            <div class="invalid-feedback">
                                                Please fill in the password
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 col-12">
                                        <label>Photo</label>
                                        <input type="file" class="form-control" id="photo" name="photo">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(document).ready(function() {
        // show hide password and retype password
        $('#togglePassword').click(function() {
            var passwordField = $('#pass');
            var fieldType = passwordField.attr('type');

            if (fieldType === 'password') {
                passwordField.attr('type', 'text');
                $('#togglePassword').find('i').removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                passwordField.attr('type', 'password');
                $('#togglePassword').find('i').removeClass('fa-eye-slash').addClass('fa-eye');
            }
        });

        // Assuming the JSON data URL
        var jsonDataUrl = "<?= $url ?>";

        // add user
        $("#formadd").submit(function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Perform form validation
            var isValid = true;

            // Check each input for validity
            $("#formadd input[required]").each(function() {
                if (!$(this).val()) {
                    $(this).addClass("is-invalid");
                    isValid = false;
                } else {
                    $(this).removeClass("is-invalid");
                }
            });

            if (isValid) {
                // Form is valid, proceed with submission
                var formData = new FormData(this);

                // Perform Ajax POST request
                $.ajax({
                    url: jsonDataUrl,
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Handle success response
                        console.log("Data updated successfully:", response);
                        if (response.messages && response.messages.success) {
                            alert(response.messages.success);
                        }
                        window.location.href = "<?=site_url('user')?>";
                    },
                    error: function(error) {
                        // Handle error response
                        console.error("Error updating data:", error);
                        // Display an error message or perform other actions
                    }
                });
            }
        });

        // Add event listeners for input fields to remove validation error when user starts typing
        $("#formadd input[required]").on("input", function() {
            $(this).removeClass("is-invalid");
        });
    });
</script>