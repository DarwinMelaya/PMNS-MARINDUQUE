<?php header("refresh: 2");
$page = "equipment_list";
include 'template/header.php';

include '../../connection/connection.php';

// SQL query to select all records from the projects table

if ($_SESSION['id'] == "") header("Location:../../../");

$sql = "SELECT * FROM psi_equipment eq
left join psi_equipment_brands br on eq.brand_id = br.brand_id
WHERE eqp_id='" . $_GET['id'] . "'";

// Execute the query
$result = $conn->query($sql);

// Check if any records are returned
if ($result->num_rows > 0) {
    // Fetch each row and store its data into separate variables
    while ($row = $result->fetch_assoc()) {
        $eqp_id = $row['eqp_id'];
        $brand_name = $row['brand_name'];
        $eqp_specs = $row['eqp_specs'];
        $eqp_qty = $row['eqp_qty'];
        $eqp_amount_approved = $row['eqp_amount_approved'];
        $eqp_amount_acquired = $row['eqp_amount_acquired'];
        $eqp_date_acquired = $row['eqp_date_acquired'];
        $eqp_receipt_no = $row['eqp_receipt_no'];
        $eqp_receipt_date = $row['eqp_receipt_date'];
        $eqp_qty_acquired = $row['eqp_qty_acquired'];
        $eqp_acquired = $row['eqp_acquired'];
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
                    <h1>Equipment Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Equipment Details</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Equipment Detail</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">
                        <div class="row">
                            <div class="col-6 col-md-6 col-lg-6 order-1 order-md-2">
                                <h5 class="text-primary"><b style="color: black;">Equipment Brand: </b><br />
                                    <?= $brand_name ?>
                                </h5>
                                <hr />
                                <p class="text-muted"><b style="color: black;">Equipment Specification: </b> <?= $eqp_specs ?></p>

                                <div class="text-muted">
                                    <p class="text-sm">Equipment Quantity:
                                        <b class="d-block">
                                            <?= $eqp_qty ?>
                                        </b>
                                    </p>
                                </div>
                                <div class="text-muted">
                                    <p class="text-sm">Equipment Date Acquired
                                        <b class="d-block">
                                            <?= $eqp_date_acquired ?>
                                        </b>
                                    </p>
                                </div>
                            </div>
                            <div class="col-6 col-md-6 col-lg-6 order-1 order-md-2">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="info-box bg-yellow">
                                            <div class="info-box-content">
                                                <span class="info-box-text text-center text-muted" style="color: black;">Amount Acquired</span>
                                                <span class="info-box-number text-center mb-0">Php <?= number_format($eqp_amount_acquired, 2) ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="info-box bg-yellow">
                                            <div class="info-box-content">
                                                <span class="info-box-text text-center text-muted">eqp_amount_approved</span>
                                                <span class="info-box-number text-center mb-0">Php <?= number_format($eqp_amount_approved, 2) ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="info-box bg-yellow">
                                            <div class="info-box-content">
                                                <span class="info-box-text text-center text-muted">Quantity acquired</span>
                                                <span class="info-box-number text-center mb-0"><?= $eqp_qty_acquired ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <p class="text-primary"><b style="color:black;">Equipment Receipt No.</b>
                                    <b class="d-block">
                                        <?= $eqp_receipt_no ?>
                                    </b>
                                </p>
                                <div class="text-muted">
                                    <p class="text-sm">Receipt Date
                                        <b class="d-block">
                                            <?= $eqp_receipt_date ?>
                                        </b>
                                    </p>
                                </div>
                                <div class="text-muted">
                                    <p class="text-sm">Equipment acquired
                                        <b class="d-block">
                                            <?= $eqp_acquired ?>
                                        </b>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <h5 class="mt-5 text-muted">Project Documentation</h5>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>File</th>
                                    <th>Download</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Project Proposal</td>
                                    <td><a href="#"><span class="badge badge-success">Download</span></a></td>
                                </tr>
                                <tr>
                                    <td>Memorandum of Agreement</td>
                                    <td><a href="#"><span class="badge badge-success">Download</span></a></td>
                                </tr>
                                <tr>
                                    <td>PIS Form</td>
                                    <td><a href="#"><span class="badge badge-success">Download</span></a></td>
                                </tr>
                                <tr>
                                    <td>Progress Report</td>
                                    <td><small>No Uploaded File</small.< /td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="text-center mt-5 mb-3">
                            <a href="#" class="btn btn-sm btn-primary">Upload Project File</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'template/footer.php';
?>