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
                            <a href="<?=site_url('user/t')?>" class="btn btn-primary ">Add Data <i class="fas fa-plus-circle"></i></a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Photo</th>
                                            <th>Username</th>
                                            <th>Nama Lengkap</th>
                                            <th>Email</th>
                                            <th>No HP</th>
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
                    populateTable(response.tbl_users);
                },
                error: function(error) {
                    // Handle error response
                    console.error("Error fetching data:", error);
                    // Display an error message or perform other actions
                }
            });
        }

        function populateTable(users) {
            var tableBody = $("#table-1 tbody");
            tableBody.empty(); // Clear existing table rows

            $.each(users, function(index, user) {
                var row = $("<tr>");
                row.append($("<td>").text(index + 1));
                // Check if photo exists, otherwise use default photo
                var photoUrl = user.photo ? user.photo : "default-photo.png"; // Use default photo if photo is empty or null
                var photoElement = $("<img>").attr("src", "<?=site_url()?>uploads/" + photoUrl).attr("alt", "User Photo").addClass("rounded-circle").css("width", "50px");
                row.append($("<td>").append(photoElement));
                row.append($("<td>").text(user.username));
                row.append($("<td>").text(user.fullname));
                row.append($("<td>").text(user.email));
                row.append($("<td>").text(user.phone));
                row.append($("<td>").append(
                    $("<a>").html('<i class="fas fa-edit"></i>').attr("href", "<?= site_url('user/e/') ?>" + btoa(user.id)).addClass("btn btn-sm btn-primary"),
                    $("<a>").html('<i class="fas fa-trash"></i>').attr("href", "#").addClass("btn btn-sm btn-danger ml-2").on("click", function(e) {
                        e.preventDefault(); // Prevent default link behavior

                        var shouldDelete = confirm("Are you sure you want to delete this user?");
                        if (shouldDelete) {
                            // Perform the delete Ajax request
                            $.ajax({
                                url: "<?= site_url('apiusers/') ?>" + user.id, // Update with your API URL
                                type: "DELETE",
                                success: function(response) {
                                    // Handle success response
                                    console.log("User deleted successfully:", response);
                                    if (response.messages && response.messages.success) {
                                        alert(response.messages.success);
                                    }
                                    fetchDataAndPopulateTable();
                                },
                                error: function(error) {
                                    // Handle error response
                                    console.error("Error deleting user:", error);
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