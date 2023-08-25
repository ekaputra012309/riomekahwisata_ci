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
            <h2 class="section-title">Change information about your company on this page.</h2>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form id="formup" method="post" class="needs-validation" novalidate="">
                            <div class="card-header">
                                <h4>Edit <?= $title ?></h4>
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <img id="vlama" alt="image" src="<?=site_url()?>assets/img/stisla-fill.svg" class="rounded-circle w-25 m-3">
                                    <img id="vphoto" alt="image" src="" class="m-3">
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="form-group col-md-8 col-12">
                                        <label>Company Name</label>
                                        <input type="text" class="form-control" required="" name="nama" id="nama">
                                        <div class="invalid-feedback">
                                            Please fill in the company name
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 col-12">
                                        <label>Short Company Name</label>
                                        <input type="text" class="form-control" required="" name="alias" id="alias">
                                        <div class="invalid-feedback">
                                            Please fill in the initial company name
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Address</label>
                                        <input type="text" class="form-control" required="" name="alamat" id="alamat">
                                        <div class="invalid-feedback">
                                            Please fill in the address
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Description</label>
                                        <textarea id="deskripsi" name="deskripsi" class="form-control summernote-simple" required=""></textarea>
                                        <div class="invalid-feedback">
                                            Please fill in the description
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Logo</label>
                                        <input type="file" class="form-control" id="logo" name="logo">
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
        $('.summernote').summernote(); // Initialize Summernote
        // Assuming the JSON data URL
        var jsonDataUrl = "<?= $url ?>";

        // Function to populate the form with JSON data
        function populateForm(data) {
            $("#nama").val(data.nama);
            $("#alias").val(data.alias);
            $("#alamat").val(data.alamat);
            // Set Summernote content
            $('#deskripsi').summernote('code', data.deskripsi);
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

        // Prevent the form from submitting
        $("#formup").submit(function(event) {
            event.preventDefault();
            // Collect form data
            var formData = new FormData(this);

            // Perform Ajax POST request
            $.ajax({
                url: jsonDataUrl, // Update with your API URL
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
                    location.reload();
                }
            });
        });
    });
</script>