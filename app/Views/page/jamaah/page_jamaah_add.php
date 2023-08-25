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
                                    <div class="form-group col-md-6 col-12">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" required="" name="nama_lengkap" id="nama_lengkap">
                                        <div class="invalid-feedback">
                                            Please fill in the Nama Lengkap
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Nomor KTP</label>
                                        <input type="number" class="form-control" required="" name="nomor_ktp" id="nomor_ktp">
                                        <div class="invalid-feedback">
                                            Please fill in the Nomor KTP
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3 col-12">
                                        <label>Tempat</label>
                                        <input type="text" class="form-control" required="" name="tempat" id="tempat">
                                        <div class="invalid-feedback">
                                            Please fill in the Tempat
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 col-12">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" class="form-control" required="" id="tgl_lahir" name="tgl_lahir">
                                        <div class="invalid-feedback">
                                            Please fill in the Tanggal Lahir
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2 col-12">
                                        <label>Umur</label>
                                        <input type="number" class="form-control" required="" name="umur" id="umur">
                                        <div class="invalid-feedback">
                                            Please fill in the Umur
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 col-12">
                                        <label>Kewarganegaraan</label>
                                        <input type="text" class="form-control" required="" name="kewarganegaraan" id="kewarganegaraan">
                                        <div class="invalid-feedback">
                                            Please fill in the Kewarganegaraan
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-10 col-12">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control" required="" name="alamat" id="alamat">
                                        <div class="invalid-feedback">
                                            Please fill in the Alamat
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2 col-12">
                                        <label>Kode Pos</label>
                                        <input type="number" class="form-control" required="" id="kode_pos" name="kode_pos">
                                        <div class="invalid-feedback">
                                            Please fill in the Kode Pos
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3 col-12">
                                        <label>Provinsi</label>
                                        <input type="text" class="form-control" required="" name="provinsi" id="provinsi">
                                        <div class="invalid-feedback">
                                            Please fill in the Provinsi
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 col-12">
                                        <label>Kota / Kabupaten</label>
                                        <input type="text" class="form-control" required="" id="kota" name="kota">
                                        <div class="invalid-feedback">
                                            Please fill in the Kota / Kabupaten
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 col-12">
                                        <label>Kecamatan</label>
                                        <input type="text" class="form-control" required="" name="kecamatan" id="kecamatan">
                                        <div class="invalid-feedback">
                                            Please fill in the Kecamatan
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 col-12">
                                        <label>Desa</label>
                                        <input type="text" class="form-control" required="" id="desa" name="desa">
                                        <div class="invalid-feedback">
                                            Please fill in the Desa
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3 col-12">
                                        <label>No HP</label>
                                        <input type="number" class="form-control" required="" name="handphone" id="handphone">
                                        <div class="invalid-feedback">
                                            Please fill in the No HP
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 col-12">
                                        <label>Email</label>
                                        <input type="email" class="form-control" required="" id="email" name="email">
                                        <div class="invalid-feedback">
                                            Please fill in the Email
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 col-12">
                                        <label>Pendidikan</label>
                                        <input type="text" class="form-control" required="" name="pendidikan" id="pendidikan">
                                        <div class="invalid-feedback">
                                            Please fill in the Pendidikan
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 col-12">
                                        <label>Pekerjaan</label>
                                        <input type="text" class="form-control" required="" id="pekerjaan" name="pekerjaan">
                                        <div class="invalid-feedback">
                                            Please fill in the Pekerjaan
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-5 col-12">
                                        <label>No Passport</label>
                                        <input type="number" class="form-control" required="" name="no_passport" id="no_passport">
                                        <div class="invalid-feedback">
                                            Please fill in the No Passport
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2 col-12">
                                        <label>Tgl Dikeluarkan</label>
                                        <input type="date" class="form-control" required="" id="tgl_dikeluarkan" name="tgl_dikeluarkan">
                                        <div class="invalid-feedback">
                                            Please fill in the Tgl Dikeluarkan
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 col-12">
                                        <label>Tempat Dikeluarkan</label>
                                        <input type="text" class="form-control" required="" name="tempat_dikeluarkan" id="tempat_dikeluarkan">
                                        <div class="invalid-feedback">
                                            Please fill in the Tempat Dikeluarkan
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2 col-12">
                                        <label>Masa Berlaku</label>
                                        <input type="date" class="form-control" required="" id="masa_berlaku" name="masa_berlaku">
                                        <div class="invalid-feedback">
                                            Please fill in the Masa Berlaku
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4 col-12">
                                        <label>Nama Marham</label>
                                        <input type="text" class="form-control" required="" name="nama_marham" id="nama_marham">
                                        <div class="invalid-feedback">
                                            Please fill in the Nama Marham
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 col-12">
                                        <label>Hubungan Marham</label>
                                        <input type="text" class="form-control" required="" id="hub_marham" name="hub_marham">
                                        <div class="invalid-feedback">
                                            Please fill in the Hubungan Marham
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 col-12">
                                        <label>Status Perkawinan</label>
                                        <select class="form-control selectric" id="status" name="status" required="">
                                            <option value="">Pilih Status</option>
                                            <option value="Menikah">Menikah</option>
                                            <option value="Belum_Menikah">Belum Menikah</option>
                                            <option value="Janda/Duda">Janda/Duda</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please fill in the Status Perkawinan
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4 col-12">
                                        <label>Golongan Darah</label>
                                        <select class="form-control selectric" id="gol_darah" name="gol_darah" required="">
                                            <option value="">Pilih Golongan Darah</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="AB">AB</option>
                                            <option value="O">O</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please fill in the Golongan Darah
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 col-12">
                                        <label>Ukuran Baju</label>
                                        <select class="form-control selectric" id="baju" name="baju" required="">
                                            <option value="">Pilih Ukuran Baju</option>
                                            <option value="S">Small</option>
                                            <option value="M">Medium</option>
                                            <option value="L">Large</option>
                                            <option value="XL">Xtra Large</option>
                                            <option value="other">Other</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please fill in the Ukuran Baju
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
                        window.location.href = "<?= site_url('jamaah') ?>";
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