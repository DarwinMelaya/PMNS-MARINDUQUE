<?php
$page = "customer_list";
include 'template/header.php';

include '../../../cms/connection/connection.php';

// SQL query to select all records from the projects table

if ($_SESSION['id'] == "") header("Location:../../../");

$sql = "SELECT * FROM psi_cooperators p
WHERE coop_id='" . $_GET['id'] . "'";

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
        $coop_mobile = $row['coop_mobile'];
        $coop_email = $row['coop_email'];
        $coop_established = $row['coop_year_established'];
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
                    <h1>Customer Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Customer Details</li>
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
                <h3 class="card-title">Customer Detail</h3>

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
                                <h5 class="text-primary"><b style="color: black;">Customer Name: </b><br />
                                    <?= $coop_name ?> <small><span class="badge badge-success"><?= $coop_established ?></span></small>
                                </h5>
                                <hr />
                                <p class="text-muted"><b style="color: black;">Address: </b><?= $coop_address ?></p>

                                <div class="text-muted">
                                    <p class="text-sm">Customer Name:
                                        <b class="d-block">
                                            <?= $coop_fname . " " . $coop_mname . " " . $coop_lname ?>
                                        </b>
                                    </p>
                                    <p class="text-sm">Customer Phone Number:
                                        <b class="d-block">
                                            <?= $coop_mobile ?>
                                        </b>
                                    </p>
                                </div>
                            </div>
                            <div class="col-6 col-md-6 col-lg-6 order-1 order-md-2">
                                <div class="barline"></div>
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