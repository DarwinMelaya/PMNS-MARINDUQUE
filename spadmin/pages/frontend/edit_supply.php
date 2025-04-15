<?php
$page = "supplier_list";
include 'template/header.php';
include '../../../cms/connection/connection.php';

if ($_SESSION['id'] == "") header("Location:../../../");

// SQL query to select all records from the projects table
$sql = "SELECT * FROM psi_service_providers WHERE sp_id='" . $_GET['id'] . "'";

// Execute the query
$result = $conn->query($sql);

// Check if any records are returned
if ($result->num_rows > 0) {
    // Fetch each row and store its data into separate variables
    while ($row = $result->fetch_assoc()) {
        $sp_id = $row['sp_id'];
        $sp_name = $row['sp_name'];
        $sp_fname = $row['sp_fname'];
        $sp_mname = $row['sp_mname'];
        $sp_lname = $row['sp_lname'];
        $sp_address = $row['sp_address'];
        $sp_phone = $row['sp_phone'];
        $sp_product_line = $row['sp_product_line'];
        $sp_mobile = $row['sp_mobile'];
        $sp_email = $row['sp_email'];
        $sp_website = $row['sp_website'];
        $sp_other_service = $row['sp_other_service'];
        $sp_expertise = $row['sp_expertise'];
        $sp_designation = $row['sp_designation'];
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
                    <h1>Edit Supplier</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Supplier</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <form action="../backend/update_Supplier.php" method="get">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Supplier Profile</h3>
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
                                    <input class="form-control" name="sp_fname" type="text" placeholder="Enter First Name" style="width: 100%;" value="<?= $sp_fname ?>" required>
                                </div>
                                <!-- /.form-group -->
                            </div>

                            <!-- /.col -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Middle Intial *</label>
                                    <input class="form-control" name="sp_mname" type="text" placeholder="Enter Middle Initial" style="width: 100%;" value="<?= $sp_mname ?>" required>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Last Name *</label>
                                    <input class="form-control" name="coop_lnam" type="text" placeholder="Enter Last Name" style="width: 100%;" value="<?= $sp_lname ?>" required>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Supplier Name</label>
                                    <textarea class="form-control" name="sp_name" type="text" placeholder="Enter Supplier Name" style="width: 100%;" required><?= $sp_name ?></textarea>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Supplier Expertise</label>
                                    <textarea class="form-control" name="sp_expertise" type="text" style="width: 100%;" placeholder="Enter Supplier Expertise" required><?= $sp_expertise ?></textarea>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Supplier Designation</label>
                                    <input class="form-control" name="sp_address" type="text" placeholder="Enter Supplier Designation" value="<?= $sp_designation ?>" style="width: 100%;" required>
                                </div>
                                <!-- /.form-group -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email Address*</label>
                                    <input type="email" class="form-control" name="sp_email" placeholder="Enter Email Address" value="<?= $sp_email ?>" style="width: 100%;" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Website</label>
                                    <input type="text" class="form-control" name="sp_website" placeholder="Enter Website link" value="<?= $sp_website ?>" style="width: 100%;">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-grou">
                                    <label> Supplier Other Service</label>
                                    <input type="text" class="form-control" name="sp_other_service" placeholder="Enter SUpplier other Service" value="<?= $sp_other_service ?>" style="width: 100%;" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input class="form-control" name="sp_phone" type="number" placeholder="Enter Phone Number" value="<?= $sp_phone ?>" style="width: 100%;">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Mobile Number*</label>
                                    <input type="number" class="form-control" name="sp_mobile" placeholder="Enter Mobile Number" value="<?= $sp_mobile ?>" style="width: 100%;" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Product Line</label>
                                    <textarea class="form-control" name="sp_product_line" type="text" placeholder="Enter Product Line" style="width: 100%;"><?= $sp_product_line ?></textarea>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                        </div>



                    </div>
                </div>
                <!-- /.row -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Supplier Location</h3>

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
                                    <select class="form-control select2" name="province" data-placeholder="Select Province" data-placeholder="Select Province" style="width: 100%;" required>
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
                <input type="hidden" name="sp_id" value="<?= $sp_id ?>" />
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