<?php
$page = "equipment_list";
include 'template/header.php';
include '../../connection/connection.php';

if ($_SESSION['id'] == "") header("Location:../../../");

// SQL query to select all records from the projects table
$sql = "SELECT * FROM psi_equipment
WHERE eqp_id='" . $_GET['id'] . "'";

// Execute the query
$result = $conn->query($sql);

// Check if any records are returned
if ($result->num_rows > 0) {
    // Fetch each row and store its data into separate variables
    while ($row = $result->fetch_assoc()) {
        $eqp_id = $row['eqp_id'];
        $eqp_specs = $row['eqp_specs'];
        $brand_name = $row['brand_name'];
        $eqp_property_no = $row['eqp_property_no'];
        $eqp_qty = $row['eqp_qty'];
        $eqp_amount_approved = $row['eqp_amount_approved'];
        $eqp_amount_acquired = $row['eqp_amount_acquired'];
        $eqp_specs = $row['eqp_specs'];
        $type_eqp = $row['type_eqp'];
        $eqp_receipt_no = $row['eqp_receipt_no'];
        $eqp_receipt_date = $row['eqp_receipt_date'];
        $eqp_date_acquired = $row['eqp_date_acquired'];
        $eqp_warranty = $row['eqp_warranty'];
        $eqp_remarks = $row['eqp_remarks'];
        $eqp_specs_acquired = $row['eqp_specs_acquired'];
        $eqp_acquired = $row['eqp_acquired'];
        $eqp_date_tagged = $row['eqp_date_tagged'];
        $eqp_remarks = $row['eqp_remarks'];
        $eqp_qty_acquired = $row['eqp_qty_acquired'];
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

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Equipment Specification(s)</label>
                                    <textarea class="form-control" name="eqp_specs" type="text" style="width: 100%;" required><?= $eqp_specs ?></textarea>
                                </div>
                                <!-- /.form-group -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Equipment Property No. <span style="color:red;">*</span></label>
                                    <input type="text" name="eqp_property_no" value="<?= $eqp_property_no ?>" class="form-control" placeholder="Enter Propert No." required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Quantity <span style="color:red;">*</span></label>
                                    <input type="number" name="eqp_qty" value="<?= $eqp_qty ?>" min="0" class="form-control" placeholder="Enter Quantity" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Amount Approved</label>
                                    <input type="number" name="eqp_amount_approved" value="<?= $eqp_amount_approved ?>" min="0" class="form-control" placeholder="Enter Amount Approved">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Type of Equipment</label>
                                    <select name="type_eqp" id="type_eqp" class="form-control">
                                        <option value="">Select Type</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Equipment Receipt No.</label>
                                    <input type="text" name="eqp_receipt_no" value="<?= $eqp_receipt_no ?>" class="form-control" placeholder="Enter Receipt No.">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Warranty date year</label>
                                    <input type="number" name="eqp_warranty" min="2005" value="<?= $eqp_warranty ?>" class="form-control" placeholder="Enter Warranty Date year">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Receipt Date</label>
                                    <input type="date" name="eqp_receipt_date" value="<?= $eqp_receipt_date ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Equipment Date Tag</label>
                                    <input type="date" name="eqp_date_tagged" value="<?= $eqp_date_tagged ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Remarks</label>
                                    <textarea name="eqp_remarks" id="eqp_remarks" rows="3" class="form-control" placeholder="Enter Remarks"><?= $eqp_remarks ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Equipment Acquisition</h3>
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
                                    <label>Equipment Specification Acquired</label>
                                    <textarea name="eqp_spec_acquired" id="eqp_spec_acq" class="form-control" placeholder="Enter Specification Acquired"><?= $eqp_specs_acquired ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Equipment Brand</label>
                                    <input type="text" name="brand_id" value="<?= $brand_name ?>" class="form-control" placeholder="Enter Brand">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Amount Acquired</label>
                                    <input type="number" name="eqp_amount_acquired" value="<?= $eqp_amount_acquired ?>" min="0" class="form-control" placeholder="Enter Amount Acquired">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Quantity Acquired</label>
                                    <input type="number" name="eqp_qty_acquired" value="<?= $eqp_qty_acquired ?>" min="0" class="form-control" placeholder="Enter Quantity Acquired">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Equipment Acquired</label>
                                    <select name="eqp_acquired" id="eqp_acq" class="form-control">
                                        <option value="#">Select Acquired</option>
                                        <option value="1" <?php if ($eqp_acquired == 1) {
                                                                echo 'selected';
                                                            } ?>>Yes</option>

                                        <option value="2" <?php if ($eqp_acquired == 2) {
                                                                echo 'selected';
                                                            } ?>>No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
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