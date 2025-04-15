<?php

use PgSql\Lob;

$page = "setup_masterlist";
include 'template/header.php';
include '../../../cms/connection/connection.php';

// SQL query to select all records from the projects table

if ($_SESSION['id'] == "") header("Location:../../../");
$id = $_GET["id"];
$sql = "SELECT * FROM projects p
left join province prov on p.province = prov.province_id
left join citymun cm on p.city_mun = cm.citymun_id
left join barangays brgy on p.barangay = brgy.barangay_id
left join psi_project_types t on p.project_type = t.prj_type_id
left join psi_cooperators c on p.beneficiaries = c.coop_id
left join psi_implementors i on p.implementor = i.implementor_id
left join psi_collaborators col on p.collaborating_agencies = col.col_id
left join psi_project_status s on p.status = s.prj_status_id
WHERE project_id='" . $id . "'";

// Execute the query
$result = $conn->query($sql);

// Check if any records are returned
if ($result->num_rows > 0) {
    // Fetch each row and store its data into separate variables
    while ($row = $result->fetch_assoc()) {
        $project_id = $row['tag'];
        $project_code = $row['project_code'];
        $project_title = $row['project_title'];
        $project_desc = $row['project_desc'];
        $street = $row['street'];
        $age = $row['project_age'];
        $barangay = $row['barangay_name'];
        $city_mun = $row['citymun_m'];
        $province = $row['province_m'];
        $typeorg = $row['typeorg'];
        $beneficiaries = $row['beneficiaries'];
        $project_fname = $row['project_fname'];
        $project_mname = $row['project_mname'];
        $project_lname = $row['project_lname'];
        $sex = $row['project_sex'];
        $date_approved = $row['date_approved'];
        $collaborating_agencies = $row["col_name"];
        $no_imp = $row['implementor'];
        $total_project_cost = $row['total_project_cost'];
        $amount_assist = $row['amount_assist'];
        $counterpart_fund = $row['counterpart_fund'];
        $date_fund_rel = $row['date_fund_rel'];
        $personal_service = $row['personal_service'];
        $maintenance_other = $row['maintenance_other'];
        $equip_outlay = $row['equip_outlay'];
        $counterpart_desc = $row['counterpart_desc'];
        $user_id = $row['user_id'];
    }
}

if ($sex == 1) {
    $sex = "Male";
} else if ($sex == 2) {
    $sex = "Female";
}

switch ($typeorg) {
    case 1:
        $typeorg = "Single Proprietorship";
        break;
    case 2:
        $typeorg = "Partnership";
        break;
    case 3:
        $typeorg = "Cooperative";
        break;
    case 4:
        $typeorg = "Corporation Profit";
        break;
    case 5:
        $typeorg = "Corporation Non-Profit";
        break;
    case 6:
        $typeorg = "Local Government Unit";
        break;
    default:
        break;
}

$date_fund_rel = date_create($date_fund_rel);
$date_approved = date_create($date_approved);

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
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">SETUP project Details</li>
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

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div class="container py-4">
                    <div class="row">
                        <div class="col-md-3">
                            <!-- Tabs nav -->
                            <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link mb-3 p-4 shadow active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                    <i class="fa fa-address-card mr-2"></i>
                                    <span class="font-weight-bold small text-uppercase">SETUP Project information</span></a>

                                <a class="nav-link mb-3 p-4 shadow" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                    <i class="fa fa-credit-card mr-2"></i>
                                    <span class="font-weight-bold small text-uppercase">Financial Funding</span></a>

                                <a class="nav-link mb-3 p-4 shadow" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                                    <i class="fa fa-star mr-2"></i>
                                    <span class="font-weight-bold small text-uppercase">Files</span></a>
                            </div>
                        </div>


                        <div class="col-md-9">
                            <!-- Tabs content -->
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade shadow rounded bg-white show active p-5" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    <h4 class="font-italic mb-4">Information Details</h4>
                                    <p class="font-italic text-muted mb-2">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <tbody>
                                                <tr>
                                                    <th class="text-nowrap" scope="row">Project Code</th>
                                                    <td><?= strtoupper($project_code) ?></td>
                                                </tr>
                                                <tr>
                                                    <th class="text-nowrap" scope="row">Project Title</th>
                                                    <td><?= strtoupper($project_title) ?></td>
                                                </tr>
                                                <tr>
                                                    <th class="text-nowrap" scope="row">Project Description</th>
                                                    <td><?= $project_desc ?></td>

                                                </tr>
                                                <tr>
                                                    <th class="text-nowrap" scope="row">Location</th>
                                                    <td><?php echo $street . " " . $barangay . ", &nbsp " . $city_mun . ", &nbsp" . $province; ?></td>
                                                </tr>
                                                <tr>
                                                    <th class="text-nowrap" scope="row">Type of Organization</th>
                                                    <td><?= $typeorg ?></td>
                                                </tr>
                                                <tr>
                                                    <th class="text-nowrap" scope="row">beneficiaries</th>
                                                    <td><?= $beneficiaries ?></td>
                                                </tr>
                                                <tr>
                                                    <th class="text-nowrap" scope="row">Owner Name</th>
                                                    <td><?= $project_fname . " " . $project_mname . " " . $project_lname ?></td>
                                                </tr>
                                                <tr>
                                                    <th class="text-nowrap" scope="row">Sex</th>
                                                    <td><?= $sex ?></td>
                                                </tr>
                                                <tr>
                                                    <th class="text-nowrap" scope="row">Age</th>
                                                    <td><?= $age ?></td>
                                                </tr>
                                                <tr>
                                                    <th class="text-nowrap" scope="row">Date Approved</th>
                                                    <td><?= date_format($date_approved, "F d,Y") ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    </p>
                                </div>

                                <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                    <h4 class="font-italic mb-4">Funding</h4>
                                    <p class="font-italic text-muted mb-2">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <tbody>
                                                <tr>
                                                    <th class="text-nowrap" scope="row">Total Project Cost</th>
                                                    <td>Php <?= number_format($total_project_cost, 2) ?></td>
                                                </tr>
                                                <tr>
                                                    <th class="text-nowrap" scope="row">Amount of Assistance</th>
                                                    <td>Php <?= number_format($amount_assist, 2) ?></td>
                                                </tr>
                                                <tr>
                                                    <th class="text-nowrap" scope="row">Counterpart Funding</th>
                                                    <td>Php <?= number_format($counterpart_fund, 2) ?></td>
                                                </tr>
                                                <tr>
                                                    <th class="text-nowrap" scope="row">Personal Service</th>
                                                    <td>Php <?= number_format($personal_service, 2) ?></td>
                                                </tr>
                                                <tr>
                                                    <th class="text-nowrap" scope="row">Maintenance and Other Expense</th>
                                                    <td>Php <?= number_format($maintenance_other, 2) ?></td>
                                                </tr>
                                                <tr>
                                                    <th class="text-nowrap" scope="row">Equipment Outlay</th>
                                                    <td>Php <?= number_format($equip_outlay, 2) ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    </p>
                                </div>

                                <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                    <h4 class="font-italic mb-4">Files</h4>
                                    <p class="font-italic text-muted mb-2">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>File</th>
                                                <th>Download</th>
                                                <th>Date Uploaded</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include('../backend/filesLogic.php');
                                            $docsql = 'SELECT * from document_name where project_type_id = 2';
                                            $docsql_run = mysqli_query($conn, $docsql);
                                            if ($docsql_run->num_rows > 0) {
                                                while ($row = $docsql_run->fetch_assoc()) {
                                                    echo '<tr>
                                                    <td>' . $row['doc_name'] . '</td>';
                                                    echo '<td><a href="../backend/forcedl.php?file_id=<?= urlencode(' . $row['doc_id'] . ') ?>">Download</a></td>';
                                                    echo '<td></td>';
                                                    echo '</tr>';
                                                }
                                            }
                                            foreach ($files as $file) : ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <form action="view_project.php?id=<?= $id ?>" method="post" enctype="multipart/form-data">
                                        <select class="form-control select2" name="docid" id="docid" data-placeholder="Select Document Type" required>
                                            <option>Select Document Type</option>';

                                            <?php
                                            $docsql = 'SELECT * from document_name where project_type_id = 2';
                                            $docsql_run = mysqli_query($conn, $docsql);
                                            if ($docsql_run->num_rows > 0) {
                                                while ($row = $docsql_run->fetch_assoc()) {
                                                    echo '<option value="' . $row["doc_id"] . '">' . $row["doc_name"] . '</option>';
                                                }
                                            }
                                            ?>

                                        </select>
                                        <input type="file" name="myfile" id="myfile" class="form-control"> <br>
                                        <button type="submit" name="save" class="btn btn-sm btn-primary">upload</button>
                                    </form>
                                    </p>
                                </div>
                            </div>
                        </div>
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