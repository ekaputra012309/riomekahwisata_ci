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
      <h2 class="section-title">Hi, <span id="nama"></span>!</h2>
      <p class="section-lead">
        Change information about yourself on this page.
      </p>

      <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-5">
          <div class="card">
            <div id="accordion">
              <div class="accordion">
                <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="true">
                  <h4>Picture</h4>
                </div>
                <div class="accordion-body collapse show" id="panel-body-1" data-parent="#accordion">
                  <div class="text-center">
                    <img id="vlama" alt="image" src="<?=site_url()?>assets/img/avatar/avatar-1.png" class="rounded-circle w-75 m-3">
                    <img id="vphoto" alt="image" src="" class="rounded-circle w-75 m-3">
                  </div>
                </div>
              </div>
              <div class="accordion">
                <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-2">
                  <h4>Change Password</h4>
                </div>
                <div class="accordion-body collapse" id="panel-body-2" data-parent="#accordion">
                  <form id="formpass" method="post" class="needs-validation" novalidate="">
                    <div class="card-body">
                      <div class="row">
                        <div class="form-group col-md-12 col-12">
                          <label>New Password</label>
                          <div class="input-group">
                            <input type="hidden" class="form-control" required="" name="id_user" id="id_user">
                            <input type="password" class="form-control" required="" name="pass" id="pass">
                            <div class="input-group-append">
                              <button id="togglePassword" type="button" class="btn btn-outline-secondary"><i class="fas fa-eye"></i></button>
                            </div>
                            <div class="invalid-feedback">
                              Please fill in the password
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-12 col-12">
                          <label>Confirm Password</label>
                          <div class="input-group">
                            <input type="password" class="form-control" required="" id="cpass">
                            <div class="input-group-append">
                              <button id="togglePassword2" type="button" class="btn btn-outline-secondary"><i class="fas fa-eye"></i></button>
                            </div>
                            <div id="retypepass" class="invalid-feedback">
                              Please re-type the password
                            </div>
                          </div>
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
        </div>
        <div class="col-12 col-md-12 col-lg-7">
          <div class="card">
            <form id="formup" method="post" class="needs-validation" novalidate="">
              <div class="card-header">
                <h4>Edit <?= $title ?></h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-4 col-12">
                    <label>User Name</label>
                    <input type="hidden" class="form-control" name="id_user" id="id_user">
                    <input type="hidden" class="form-control" name="pass" id="pass">
                    <input type="text" class="form-control" required="" name="username" id="username">
                    <div class="invalid-feedback">
                      Please fill in the user name
                    </div>
                  </div>
                  <div class="form-group col-md-8 col-12">
                    <label>Full Name</label>
                    <input type="text" class="form-control" required="" name="fullname" id="fullname">
                    <div class="invalid-feedback">
                      Please fill in the full name
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-7 col-12">
                    <label>Email</label>
                    <input type="email" class="form-control" required="" name="email" id="email">
                    <div class="invalid-feedback">
                      Please fill in the email
                    </div>
                  </div>
                  <div class="form-group col-md-5 col-12">
                    <label>Phone</label>
                    <input type="tel" class="form-control" required="" name="phone" id="phone">
                    <div class="invalid-feedback">
                      Please fill in the phone
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12 col-12">
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
    $('#togglePassword2').click(function() {
      var passwordField = $('#cpass');
      var fieldType = passwordField.attr('type');

      if (fieldType === 'password') {
        passwordField.attr('type', 'text');
        $('#togglePassword2').find('i').removeClass('fa-eye').addClass('fa-eye-slash');
      } else {
        passwordField.attr('type', 'password');
        $('#togglePassword2').find('i').removeClass('fa-eye-slash').addClass('fa-eye');
      }
    });

    // Assuming the JSON data URL
    var jsonDataUrl = "<?= $url ?>";

    // Function to populate the form with JSON data
    function populateForm(data) {
      $("#id_user").val(data.id);
      $("#username").val(data.username);
      $("#nama").html(data.username);
      $("#fullname").val(data.fullname);
      $("#email").val(data.email);
      $("#phone").val(data.phone);
      if (data.photo) {
        $("#vphoto").attr("src", "<?=site_url()?>uploads/" + data.photo);
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

    // edit user profile
    $("#formup").submit(function(event) {
      event.preventDefault(); // Prevent the default form submission

      // Perform form validation
      var isValid = true;

      // Check each input for validity
      $("#formup input[required]").each(function() {
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
            location.reload();
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
    $("#formup input[required]").on("input", function() {
      $(this).removeClass("is-invalid");
    });

    // change password
    $("#formpass").submit(function(event) {
      event.preventDefault(); // Prevent the default form submission

      // Perform form validation
      var isValid = true;

      var newPassword = $("#pass").val();
      var confirmPassword = $("#cpass").val();
      // Check each input for validity
      $("#formpass input[required]").each(function() {
        if (!$(this).val()) {
          $(this).addClass("is-invalid");
          isValid = false;
        } else {
          $(this).removeClass("is-invalid");
        }
      });

      if (newPassword !== confirmPassword) {
        $("#cpass").addClass("is-invalid");
        $("#retypepass").html("Re-type password not match!")
        isValid = false;
      } else {
        $("#cpass").removeClass("is-invalid");
      }

      if (isValid) {
        // Form is valid, proceed with submission
        var formData = new FormData(this);
        var id_user = formData.get("id_user");

        // Perform Ajax POST request
        $.ajax({
          url: "<?= site_url('upass/') ?>" + id_user, // Use the correct URL
          type: "POST",
          data: formData,
          processData: false,
          contentType: false,
          success: function(response) {
            // Handle success response
            console.log("Password updated successfully:", response);
            if (response.messages && response.messages.success) {
              alert(response.messages.success);
            }
            location.reload();
          },
          error: function(error) {
            // Handle error response
            console.error("Error updating password:", error);
            // Display an error message or perform other actions
          }
        });
      }
    });

    // Add event listener to retype password field to remove validation error when user starts typing
    $("#cpass").on("input", function() {
      $(this).removeClass("is-invalid");
    });
  });
</script>