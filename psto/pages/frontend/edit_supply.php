<?php
$page = "supplier_list";
include 'template/header.php';
include '../../connection/connection.php';

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
}
$address = explode(",", $sp_address);
$street = $address[0];
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
            <form action="../backend/update_supplier.php" method="get">
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
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Supplier Name <span style="color:red;">*</span></label>
                                    <input type="text" name="sp_name" value="<?= $sp_name ?>" class="form-control" placeholder="Enter Supplier Name" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Other Service</label>
                                    <input type="text" name="sp_other_service" value="<?= $sp_other_service ?>" class="form-control" placeholder="Enter Other Service">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Designation <span style="color:red;">*</span></label>
                                    <input type="text" name="sp_designation" value="<?= $sp_designation ?>" class="form-control" placeholder="Enter Designation" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Expertise</label>
                                    <textarea name="sp_expertise" id="sp_expertise" rows="3" class="form-control" placeholder="Enter Expertise"><?= $sp_expertise ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Product Line</label>
                                    <input type="text" name="sp_product_line" value="<?= $sp_expertise ?>" class="form-control" style="width: 100%;" placeholder="Enter Product Line">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" name="sp_fname" value="<?= $sp_fname ?>" class="form-control" placeholder="Enter First Name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Middle Name/Initial <span style="color:red; font-size:10px;">(Note: Please include period if middle inital)</span></label>
                                    <input type="text" name="sp_mname" value="<?= $sp_mname ?>" class="form-control" placeholder="Enter Middle Name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" name="sp_lname" value="<?= $sp_lname ?>" class="form-control" placeholder="Enter Last Name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" name="sp_email" value="<?= $sp_email ?>" class="form-control" placeholder="Enter email address">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>website</label>
                                    <input type="text" name="sp_website" value="<?= $sp_website ?>" placeholder="Enter website url" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="number" name="sp_phone" value="<?= $sp_phone ?>" class="form-control" placeholder="Enter phone number">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <input type="number" name="sp_mobile" value="<?= $sp_mobile ?>" placeholder="Enter mobile number" class="form-control">
                                </div>
                            </div>
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
                                    <input class="form-control" name="street" type="text" placeholder="Enter Street Address" value="<?= $street ?>" style="width: 100%;">
                                </div>
                                <!-- /.form-group -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Province</label>
                                    <select class="form-control" name="province" id="province" style="width: 100%;" required>
                                        <option value="">Select Province</option>
                                        <?php
                                        include '../../connection/connection.php';
                                        $sql = "SELECT * FROM province where region_c = 17 ORDER by province_m ASC";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<option value="' . $row["province_id"] . '"';
                                                if ($address[3] == $row['province_id']) {
                                                    echo 'selected';
                                                }
                                                echo '>' . $row["province_m"] . '</option>';
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
                                    <select class="form-control" name="city_mun" id="city_mun" data-placeholder="Select City/Municipality" style="width: 100%;">
                                        <option value="">Select City/Municipality</option>

                                        <?php
                                        include '../../connection/connection.php';
                                        $sql1 = "SELECT * FROM citymun where province_c = '" . $address[3] . "'";
                                        $result = $conn->query($sql1);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<option value="' . $row["citymun_c"] . '"';
                                                if ($address[2] == $row['citymun_id']) {
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
                                    <select class="form-control" name="barangay" id="barangay" data-placeholder="Select Barangay" style="width: 100%;">
                                        <option value="">Select Barangay</option>
                                        <?php
                                        include '../../connection/connection.php';
                                        $sql1 = "SELECT * FROM barangays where city_id = '" . $address[2] . "' ";
                                        $result = $conn->query($sql1);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<option value="' . $row["barangay_id"] . '"';
                                                if ($address[1] == $row['barangay_id']) {
                                                    echo 'selected';
                                                }
                                                echo '>' . $row["barangay_name"] . '</option>';
                                            }
                                        }
                                        $conn->close();
                                        ?>
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
                <input type="text" name="sp_id" value="<?= $sp_id ?>" hidden />
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