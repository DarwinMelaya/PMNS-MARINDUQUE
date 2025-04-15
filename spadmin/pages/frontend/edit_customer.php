<?php
$page = "customer_list";
include 'template/header.php';
include '../../../cms/connection/connection.php';

if ($_SESSION['id'] == "") header("Location:../../../");

// SQL query to select all records from the projects table
$sql = "SELECT * FROM psi_cooperators WHERE coop_id='" . $_GET['id'] . "'";

// Execute the query
$result = $conn->query($sql);

// Check if any records are returned
if ($result->num_rows > 0) {
    // Fetch each row and store its data into separate variables
    while ($row = $result->fetch_assoc()) {
        $coop_id = $row['coop_id'];
        $coop_name = $row['coop_name'];
        $coop_fname = $row['coop_p_fname'];
        $coop_mname = $row['coop_p_mname'];
        $coop_lname = $row['coop_p_lname'];
        $coop_address = $row['coop_address'];
        $coop_phone = $row['coop_phone'];
        $coop_fax = $row['coop_fax'];
        $coop_mobile = $row['coop_mobile'];
        $coop_email = $row['coop_email'];
        $coop_website = $row['coop_website'];
        $coop_year_established = $row['coop_year_established'];
        $coop_reg_dti = $row['coop_reg_dti'];
        $coop_reg_dti_date = $row['coop_reg_dti_date'];
    }
} else {
    echo "0 results";
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
                    <h1>Edit Customer</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Customer</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <form action="../backend/update_customer.php" method="get">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Customer Profile</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <!--  <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button> -->
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input class="form-control" name="coop_p_fname" type="text" placeholder="Enter First Name" style="width: 100%;" value="<?= $coop_fname ?>" required>
                                </div>
                                <!-- /.form-group -->
                            </div>

                            <!-- /.col -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Middle Intial *</label>
                                    <input class="form-control" name="coop_mname" type="text" placeholder="Enter Middle Initial" style="width: 100%;" value="<?= $coop_mname ?>" required>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Last Name *</label>
                                    <input class="form-control" name="coop_lnam" type="text" placeholder="Enter Last Name" style="width: 100%;" value="<?= $coop_lname ?>" required>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Cooperator Name</label>
                                    <input class="form-control" name="coop_name" type="text" placeholder="Enter Cooperator Name" value="<?= $coop_name ?>" style="width: 100%;" required>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Registered DTI</label>
                                    <input class="form-control" name="coop_reg_dti" type="text" value="<?= $coop_reg_dti ?>" style="width: 100%;" required>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Registered DTI Date</label>
                                    <input class="form-control" name="coop_reg_dti_date" type="date" placeholder="Enter Registered DTI date" value="<?= $coop_reg_dti_date ?>" style="width: 100%;" required>
                                </div>
                                <!-- /.form-group -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email Address*</label>
                                    <input type="email" class="form-control" name="coop_email" placeholder="Enter Email Address" value="<?= $coop_email ?>" style="width: 100%;" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Website</label>
                                    <input type="text" class="form-control" name="coop_website" placeholder="Enter Website link" value="<?= $coop_website ?>" style="width: 100%;">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-grou">
                                    <label> Cooperator Year Established</label>
                                    <input type="number" class="form-control" max="<?= date("Y"); ?>" name="coop_year_established" value="<?= $coop_year_established ?>" style="width: 100%;" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input class="form-control" name="coop_phone" type="number" placeholder="Enter Phone Number" value="<?= $coop_phone ?>" style="width: 100%;">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Fax</label>
                                    <input class="form-control" name="coop_fax" type="text" placeholder="Enter Fax" value="<?= $coop_fax ?>" style="width: 100%;">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Mobile Number*</label>
                                    <input type="number" class="form-control" name="coop_mobile" placeholder="Enter Mobile Number" value="<?= $coop_mobile ?>" style="width: 100%;" required>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>



                    </div>
                </div>
                <!-- /.row -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Cooperator Location</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <!--  <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button> -->
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Street Address</label>
                                    <input class="form-control" name="street" type="text" placeholder="Enter Street Address" value="" style="width: 100%;">
                                </div>
                                <!-- /.form-group -->

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Province</label>
                                    <select class="form-control select2" name="province" data-placeholder="Select Province" style="width: 100%;" required>
                                        <option value="">Select Province</option>

                                        <?php
                                        include '../../../cms/connection/connection.php';
                                        $sql1 = "SELECT * FROM psi_implementors";
                                        $result = $conn->query($sql1);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<option value="' . $row["implementor_id"] . '"';
                                                if ($province == $row['implementor_id']) {
                                                    echo 'selected';
                                                }
                                                echo '>' . $row["implementor_name"] . '</option>';
                                            }
                                        }
                                        $conn->close();
                                        ?>
                                    </select>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Municipality / City</label>
                                    <select class="form-control select2" name="city_mun" data-placeholder="Select City/Municipality" style="width: 100%;">
                                        <option value="">Select City/Municipality</option>

                                        <?php
                                        include '../../../cms/connection/connection.php';
                                        $sql1 = "SELECT * FROM citymun where region_c = 17";
                                        $result = $conn->query($sql1);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<option value="' . $row["citymun_c"] . '"';
                                                if ($city_mun == $row['citymun_c']) {
                                                    echo 'selected';
                                                }
                                                echo '>' . $row["citymun_m"] . '</option>';
                                            }
                                        }
                                        $conn->close();
                                        ?>

                                    </select>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Barangay</label>
                                    <select class="form-control select2" name="barangay" data-placeholder="Select Barangay" style="width: 100%;">
                                        <option value="">Select Barangay</option>

                                    </select>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                    <!-- /.row -->
                </div>


                <!-- /.row -->
                <input type="hidden" name="coop_id" value="<?= $coop_id ?>" />
        </div>
        <div style="text-align: center">
            <button type="submit" class="btn btn-primary btn-lg">Update Project</button>
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