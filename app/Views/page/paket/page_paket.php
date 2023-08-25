<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data <?= $title ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= site_url('/') ?>">Dashboard</a></div>
                <div class="breadcrumb-item"><?= $title ?></div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="m-0">Data <?= $title ?></h4>
                            <a href="<?=site_url('paket/t')?>" class="btn btn-primary ">Add Data <i class="fas fa-plus-circle"></i></a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Kategori</th>
                                            <th>Nama Paket</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(document).ready(function() {
        // Fetch and populate data when the page loads
        fetchDataAndPopulateTable();

        function fetchDataAndPopulateTable() {
            $.ajax({
                url: "<?= $url ?>", // Update with your API URL
                type: "GET",
                dataType: "json",
                success: function(response) {
                    // Handle success response
                    populateTable(response.tbl_paket);
                },
                error: function(error) {
                    // Handle error response
                    console.error("Error fetching data:", error);
                    // Display an error message or perform other actions
                }
            });
        }

        function populateTable(paket) {
            var tableBody = $("#table-1 tbody");
            tableBody.empty(); // Clear existing table rows

            $.each(paket, function(index, paket) {
                var row = $("<tr>");
                row.append($("<td>").text(index + 1));
                row.append($("<td>").text(paket.kategori));
                row.append($("<td>").text(paket.nama_paket));
                row.append($("<td>").append(
                    $("<a>").html('<i class="fas fa-edit"></i>').attr("href", "<?= site_url('paket/e/') ?>" + btoa(paket.id)).addClass("btn btn-sm btn-primary"),
                    $("<a>").html('<i class="fas fa-trash"></i>').attr("href", "#").addClass("btn btn-sm btn-danger ml-2").on("click", function(e) {
                        e.preventDefault(); // Prevent default link behavior

                        var shouldDelete = confirm("Are you sure you want to delete this paket?");
                        if (shouldDelete) {
                            // Perform the delete Ajax request
                            $.ajax({
                                url: "<?= site_url('apipaket/') ?>" + paket.id, // Update with your API URL
                                type: "DELETE",
                                success: function(response) {
                                    // Handle success response
                                    console.log("paket deleted successfully:", response);
                                    if (response.messages && response.messages.success) {
                                        alert(response.messages.success);
                                    }
                                    fetchDataAndPopulateTable();
                                },
                                error: function(error) {
                                    // Handle error response
                                    console.error("Error deleting paket:", error);
                                    // Display an error message or perform other actions
                                }
                            });
                        }
                    })
                ));


                tableBody.append(row);
            });
        }
    });
</script>