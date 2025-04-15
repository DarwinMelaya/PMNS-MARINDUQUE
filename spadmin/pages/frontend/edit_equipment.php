<?php
$page = "equipment_list";
include 'template/header.php';
include '../../../cms/connection/connection.php';

if ($_SESSION['id'] == "") header("Location:../../../");

// SQL query to select all records from the projects table
$sql = "SELECT * FROM psi_equipment eq
left join psi_equipment_brands eqb on eq.brand_id = eqb.brand_id
WHERE eqp_id='" . $_GET['id'] . "'";

// Execute the query
$result = $conn->query($sql);

// Check if any records are returned
if ($result->num_rows > 0) {
    // Fetch each row and store its data into separate variables
    while ($row = $result->fetch_assoc()) {
        $eqp_id = $row['eqp_id'];
        $brand_name = $row['brand_name'];
        $eqp_property_no = $row['eqp_property_no'];
        $eqp_qty = $row['eqp_qty'];
        $eqp_amount_approved = number_format($row['eqp_amount_approved'], 2);
        $eqp_amount_acquired = number_format($row['eqp_amount_acquired'], 2);
        $eqp_specs = $row['eqp_specs'];
        $eqp_receipt_no = $row['eqp_receipt_no'];
        $eqp_receipt_date = $row['eqp_receipt_date'];
        $eqp_date_acquired = $row['eqp_date_acquired'];
        $eqp_warranty = $row['eqp_warranty'];
        $eqp_remarks = $row['eqp_remarks'];
        $eqp_specs_acquired = $row['eqp_specs_acquired'];
        $eqp_acquired_yesno = $row['eqp_acquired_yesno'];
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
                    <h1>Edit Equipment</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Equipment</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <form action="../backend/update_Equipment.php" method="get">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Equipment Profile</h3>
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Brand Name</label>
                                    <input class="form-control" name="brand_name" type="text" placeholder="Enter Brand Name" value="<?= $brand_name ?>" style="width: 100%;" required>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Equipment Specification</label>
                                    <textarea class="form-control" name="eqp_specs" type="text" style="width: 100%;" required><?= $eqp_specs ?></textarea>
                                </div>
                                <!-- /.form-group -->
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Quantity*</label>
                                    <input type="quantity" class="form-control" name="eqp_qty" placeholder="Enter Quantity" value="<?= $eqp_qty ?>" style="width: 100%;" required>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Amount Approved</label>
                                    <input type="text" class="form-control" name="eqp_amount_approved" placeholder="Enter Amount Approved" value="<?= $eqp_amount_approved ?>" style="width: 100%;">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label> Amount acquired</label>
                                    <input type="text" class="form-control" name="eqp_amount_acquired" placeholder="Enter Amount Acquired" value="<?= $eqp_amount_acquired ?>" style="width: 100%;">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Property Number</label>
                                    <input class="form-control" name="eqp_property_no" type="number" placeholder="Enter Property Number" value="<?= $eqp_property_no ?>" style="width: 100%;">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Date Acquired*</label>
                                    <input type="date" class="form-control" name="eqp_date_acquired" placeholder="Enter Mobile Number" value="<?= $eqp_date_acquired ?>" style="width: 100%;" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Receipt Number</label>
                                    <input class="form-control" name="eqp_receipt_no" type="text" placeholder="Enter Receipt Number" value="<?= $eqp_receipt_no ?>" style="width: 100%;">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Receipt Date</label>
                                    <input type="date" class="form-control" name="eqp_receipt_date" value="<?= $eqp_receipt_date ?>" required>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Warranty</label>
                                    <input type="text" class="form-control" name="eqp_warranty" placeholder="Enter warranty" value="<?= $eqp_warranty ?>" style="width: 100%;">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Remarks</label>
                                    <textarea type="text" class="form-control" name="eqp_remarks" placeholder="Enter Remarks" style="width: 100%;"><?= $eqp_remarks ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Specification Acquired</label>
                                    <textarea type="text" class="form-control" name="eqp_specs_acquired" placeholder="Enter Specification Acquired" style="width: 100%;"><?= $eqp_specs_acquired ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Acquired status*</label>
                                    <select class="form-control" name="eqp_acquired_yesno" data-placeholder="Select Acquired Status" style="width: 100;" required>
                                        <option value="">Select Status</option>
                                        <?php
                                        if ($eqp_acquired_yesno == 0) {
                                            echo "<option value='1' selected>yes</option>";
                                            echo "<option value='0'>no</option>";
                                        } else {
                                            echo "<option value='1'>yes</option>";
                                            echo "<option value='0' selected>no</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Equipment Location</h3>

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
                <input type="hidden" name="eqp_id" value="<?= $eqp_id ?>" />
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