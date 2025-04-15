<?php
$page = "supplier_list";
include 'template/header.php';

include '../../../cms/connection/connection.php';

// SQL query to select all records from the projects table

if ($_SESSION['id'] == "") header("Location:../../../");

$sql = "SELECT * FROM psi_service_providers
WHERE sp_id='" . $_GET['id'] . "'";

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
        $sp_mobile = $row['sp_mobile'];
        $sp_website = $row['sp_website'];
        $sp_phone = $row['sp_phone'];
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
                    <h1>Supplier Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Supplier Details</li>
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
                <h3 class="card-title">Supplier Detail</h3>

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
                                <h5 class="text-primary"><b style="color: black;">Supplier Name: </b><br />
                                    <?= $sp_name ?>
                                </h5>
                                <hr />
                                <p class="text-muted"><b style="color: black;">Address: </b><?= $sp_address ?></p>

                                <div class="text-muted">
                                    <p class="text-sm">Supplier Name:
                                        <b class="d-block">
                                            <?= $sp_fname . " " . $sp_mname . " " . $sp_lname ?>
                                        </b>
                                    </p>
                                    <p class="text-sm">Supplier Phone Number:
                                        <b class="d-block">
                                            <?= $sp_phone ?>
                                        </b>
                                    </p>
                                    <p class="text-sm">Supplier Mobile Number:
                                        <b class="d-block">
                                            <?= $sp_mobile ?>
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