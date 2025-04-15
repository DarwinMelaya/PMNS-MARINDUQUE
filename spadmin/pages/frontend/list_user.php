<?php
$page = "list_user";
include 'template/header.php';

include '../../../cms/connection/connection.php';

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List of Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">List of Users</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Name</th>
                                        <th>Province</th>
                                        <th>Email</th>
                                        <th>Access Level</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // SQL query to select all records from the projects table
                                    $sql = "SELECT * FROM users";
                                    // Execute the query
                                    $result = $conn->query($sql);
                                    // Check if any records are returned
                                    if ($result->num_rows > 0) {
                                        // Fetch each row and store its data into separate variables
                                        while ($row = $result->fetch_assoc()) {
                                            $username = $row['username'];
                                            $user_fname = $row["user_fname"];
                                            $user_lname = $row['user_lname'];
                                            $email = $row['email'];
                                            $status = $row['status'];
                                            $access_level = $row['access_level'];
                                            //$province = $row['province_m'];
                                            if ($access_level == 1) {
                                                $access_level = "Regional Office";
                                            } else {
                                                $access_level = "PSTO";
                                            }
                                            if ($status != 0) {
                                                $status = "Active";
                                            } else {
                                                $status = "Inactive";
                                            }

                                            echo "<td>" . ucfirst(strtolower($username)) . "</td>";
                                            echo "<td>" . ucfirst(strtolower($user_fname)) . " " . ucfirst(strtolower($user_lname)) . "</td>";
                                            echo "<td>" . $province . "</td>";
                                            echo "<td>" . ucfirst(base64_decode($email)) . "</td>";
                                            echo "<td>" . $access_level . "</td>";
                                            echo "<td>" . $status . "</td>";
                                            echo '<td style="text-align: center;">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  '; ?>
                                            <a href="#" type="button" class="btn btn-danger btn-sm" title="Reset Password" onclick="resetAccount('<?= $row['user_id'] ?>')">
                                                <i class="fas fa-sync-alt"></i>
                                            </a>
                                            <?php echo '
                                  <a href="../frontend/editaccount.php?id=' . $row["user_id"] . '" type="button" class="btn btn-success btn-sm" title="Edit Account">
                                    <i class="fas fa-user-cog"></i>
                                  </a>
                                  '; ?>
                                            <a href="#" type="button" class="btn btn-danger btn-sm" title="Unlock Account" onclick="lockAccount('<?= $row['user_id'] ?>')">
                                                <i class="fas fa-unlock-alt"></i>
                                            </a>
                                    <?php echo '
                                </div>
                              </td>';
                                            echo "</tr>";
                                        }
                                    }
                                    // Close connection
                                    $conn->close(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
    function lockAccount(accountId) {
        Swal.fire({
            title: 'Are you sure you want to unlock this account?',
            text: "This action cannot be undone!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Unlock'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Unlock!",
                    text: "The Account has been unlock.",
                    icon: "success"
                });
                window.location.href = "../backend/unlock.php?id=" + accountId;
            }
        });
    }

    function resetAccount(accountId) {
        Swal.fire({
            title: 'Are you sure you want to reset the password of this account?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Reset'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Reset!",
                    text: "The Password has been Reset.",
                    icon: "reset"
                });
                // Send AJAX request or redirect to delete_project.php with projectId
                window.location.href = "../backend/resetpass.php?id=" + accountId;
            }
        });
    }
</script>
<?php
include 'template/footer.php';
?>