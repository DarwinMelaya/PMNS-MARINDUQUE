<?php
$page = "list_user";
include 'template/header.php';
include '../../../cms/connection/connection.php';
if ($_SESSION['id'] == "") header("Location:../../../");
// SQL query
$sql = "SELECT * from users us
left join province p on us.province = p.province_id  WHERE user_id='" . $_GET['id'] . "'";

// Execute query
$result = $conn->query($sql);

// Check if any results were returned
if ($result->num_rows > 0) {
    // Fetch each row and assign column values to individual variables
    while ($row = $result->fetch_assoc()) {
        $username = $row['username'];
        $userfname = $row['user_fname'];
        $userlname = $row['user_lname'];
        $email = $row['email'];
        $status = $row['status'];
        $access_level = $row['access_level'];
        $province = $row['province_id'];
    }
}

// Close connection
$conn->close();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Account</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Account</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <form action="../backend/editacc.php" method="get">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Edit Account</h3>
                        <div class="card-tools">
                            <button class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Username:</label>
                                    <input type="text" name="username" value="<?= $username ?>" placeholder="Enter Username" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>First Name:</label>
                                    <input type="text" name="fname" placeholder="Enter First Name" value="<?= $userfname ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last Name:</label>
                                    <input type="text" name="lname" placeholder="Enter Last Name" value="<?= $userlname ?>" class="form-control">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" placeholder="Enter Email Address" name="email" value="<?= base64_decode($email) ?>" class="form-control">
                                </div>
                            </div>
                            <!-- <div class="col-md-3">
                                <div class="form-group">
                                    <label>Region</label>
                                    <select name="region" id="region" class="form-control">
                                        <option value="">Select Region</option>
                                    </select>
                                </div>
                            </div> -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Province</label>
                                    <select name="province" id="province" class="form-control">
                                        <option value="">Select Province</option>
                                        <option value="119" <?php if ($province == 119) {
                                                                echo 'selected';
                                                            } ?>>Regional Office</option>
                                        <?php
                                        include '../../../cms/connection/connection.php';
                                        $sql = "SELECT * FROM province where region_c = 17 ORDER by province_m ASC";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<option value="' . $row["province_id"] . '"';
                                                if ($province == $row['province_id']) {
                                                    echo 'selected';
                                                }
                                                echo '>' . $row["province_m"] . '</option>';
                                            }
                                        }
                                        $conn->close();
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="">Select Status</option>
                                        <option value="1" <?php if ($status == 1) {
                                                                echo 'selected';
                                                            } ?>>Active</option>
                                        <option value="0" <?php if ($status == 0) {
                                                                echo 'selected';
                                                            } ?>>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Access Level</label>
                                    <select name="access" id="access" class="form-control">
                                        <option value="">Select Access Level</option>
                                        <option value="1" <?php if ($access_level == 1) {
                                                                echo 'selected';
                                                            } ?>>Regional Office</option>
                                        <option value="2" <?php if ($access_level == 2) {
                                                                echo 'selected';
                                                            } ?>>PSTO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="number" name="user_id" value="<?= $_GET['id'] ?>" hidden>
                <div style="text-align: center">
                    <button type="submit" class="btn btn-primary btn-lg">Update</button>
                </div><br /><br /><br />
            </form>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'template/footer.php';
?>