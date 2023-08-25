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
                        <form id="formup" method="post" class="needs-validation" novalidate="">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="hidden" class="form-control" name="id_paket" id="id_paket">
                                    <select class="form-control selectric" id="kategori" name="kategori" required="">
                                        <option value="">Pilih Kategori</option>
                                        <option value="Haji">Haji</option>
                                        <option value="Umroh">Umroh</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please fill in the kategori
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Paket</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" required="" name="nama_paket" id="nama_paket">
                                    <div class="invalid-feedback">
                                        Please fill in the nama paket
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary">Save Changes</button>
                                </div>
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
        var jsonDataUrl = "<?= $url ?>";
        // Function to populate the form with JSON data
        function populateForm(data) {
            $("#id_paket").val(data.id);
            $("#kategori").val(data.kategori);
            $("#nama_paket").val(data.nama_paket);
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

        // add paket
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
                        window.location.href = "<?= site_url('paket') ?>";
                    },
                    error: function(error) {
                        // Handle error response
                        console.error("Error updating data:", error);
                        // Display an error message or perform other actions
                    }
                });
            }
        });

        // Add event listeners for input fields to remove validation error when paket starts typing
        $("#formup input[required]").on("input", function() {
            $(this).removeClass("is-invalid");
        });
    });
</script>