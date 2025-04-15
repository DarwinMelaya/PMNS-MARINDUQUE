<?php
// header("refresh: 2");
$page = "profile";
include 'template/header.php';

$sql = "SELECT * FROM users where user_id ='" . $_SESSION['id'] . "'";
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
        $password = $row['password'];
    }
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <form action="../backend/update_profile.php" method="get">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Account Profile</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Username:</label>
                                    <input type="text" name="username" value="<?= $username ?>" class="form-control" disabled>
                                    <input type="text" name="username" value="<?= $username ?>" class="form-control" hidden>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Password:</label>
                                    <input type="password" name="password" placeholder="Enter new password" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email:</label>
                                    <input type="email" name="email" value="<?= base64_decode($email) ?>" placeholder="Enter new email address" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>First Name:</label>
                                    <input type="text" name="fname" value="<?= $user_fname ?>" placeholder="Enter first name" class="form-control">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last Name:</label>
                                    <input type="text" name="lname" value="<?= $user_lname ?>" placeholder="Enter new last name" class="form-control">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div style="text-align: center">
                    <button type="submit" class="btn btn-primary btn-lg">Update Account</button>
                </div><br /><br /><br />
            </form>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>



<script type="text/javascript" src="functionality/proj_script.js"></script>
<!-- /.content-wrapper -->
<?php
include 'template/footer.php';
?>