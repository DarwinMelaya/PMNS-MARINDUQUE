<?php
$page = "gia_monitoring";
include 'template/header.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>GIA Masterlist</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">GIA Projects Masterlist</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Masterlist of GIA Projects</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Tags</th>
                                        <th>Project Code</th>
                                        <th>Project Title</th>
                                        <th>Address</th>
                                        <th>Date Approved</th>
                                        <th>Project Description</th>
                                        <th>Duration</th>
                                        <th>Proponent</th>
                                        <th>Collaborating Agency</th>
                                        <th>Beneficiaries</th>
                                        <th>Investment Map</th>
                                        <th>Total Project Cost</th>
                                        <th>Amount of Assistance</th>
                                        <th>Counterpart Funding</th>
                                        <th>Date Fund release</th>
                                        <th>Personal Service</th>
                                        <th>Maintenance and Other Expenses</th>
                                        <th>Equipment Outlay</th>
                                        <th>Mode of Procurement</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include '../../../cms/connection/connection.php';

                                    // SQL query to retrieve data
                                    $sql = "SELECT * from projects p
                                    left join province prov on p.province = prov.province_id
                                    left join citymun cm on p.city_mun = cm.citymun_id
                                    left join barangays brgy on p.barangay = brgy.barangay_id
                                    left join psi_project_types t on p.project_type = t.prj_type_id
                                    left join psi_cooperators c on p.beneficiaries = c.coop_id
                                    left join psi_implementors i on p.implementor = i.implementor_id
                                    left join psi_collaborators col on p.collaborating_agencies = col.col_id
                                    left join psi_project_status s on p.status = s.prj_status_id where project_type = 1 and user_id = '" . $_SESSION['id'] . "'
                                    order by p.date_encoded desc";

                                    // Execute the query
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $duration_from = $row["duration_from"];
                                            $duration_to = $row["duration_to"];
                                            $date_approve = $row["date_approved"];
                                            $date_fund_rel = $row["date_fund_rel"];
                                            $date_fund_rel = date_create($date_fund_rel);
                                            $date_approved = date_create($date_approve);
                                            $duration_from = date_create($duration_from);
                                            $duration_to = date_create($duration_to);
                                            switch ($row["prj_status_name"]) {
                                                case "New":
                                                    $badge = "primary";
                                                    break;
                                                case "On-going":
                                                    $badge = "warning";
                                                    break;
                                                case "Graduated":
                                                    $badge = "success";
                                                    break;
                                                case "Deferred":
                                                    $badge = "secondary";
                                                    break;
                                                case "Terminated":
                                                    $badge = "danger";
                                                    break;
                                                case "Withdrawn":
                                                    $badge = "info";
                                                    break;
                                                default:
                                                    break;
                                            }
                                            if ($row['modepro']) {
                                                $modepro = 'Direct Release';
                                            } else {
                                                $modepro = 'Regional Office Procurement';
                                            }
                                            echo "<tr>";
                                            echo "<td>" . $row["tag"] . "</td>";
                                            echo "<td>" . $row["project_code"] . "</td>";
                                            echo "<td>" . $row["project_title"] . "</td>";
                                            echo "<td>" . $row["street"] . "," . $row["barangay_name"] . "," . $row["citymun_m"] . "," . $row["province_m"] . "</td>";
                                            echo "<td>" . date_format($date_approved, "F d, Y") . "</td>";
                                            echo "<td>" . $row["project_desc"] . "</td>";
                                            echo "<td>" . date_format($duration_from, "F d, Y") . " to " . date_format($duration_to, "F d, Y") . "</td>";
                                            echo "<td>" . $row["proponent"] . " </td>";
                                            echo "<td>" . $row["col_name"] . "</td>";
                                            echo "<td>" . $row["coop_name"] . "</td>";
                                            echo "<td> investment map </td>";
                                            echo "<td> Php " . number_format($row["total_project_cost"], 2) . "</td>";
                                            echo "<td>" . number_format($row["amount_assist"]) . "</td>";
                                            echo "<td> Php" . number_format($row["counterpart_fund"], 2) . "</td>";
                                            echo "<td>" . date_format($date_fund_rel, "F d, Y") . "</td>";
                                            echo "<td> Php" . number_format($row["personal_service"], 2) . "</td>";
                                            echo "<td> Php" . number_format($row["maintenance_other"], 2) . "</td>";
                                            echo "<td> Php" . number_format($row["equip_outlay"], 2) . "</td>";
                                            echo "<td>" . $modepro . "</td>";
                                            echo "<td>" . $row["counterpart_desc"] . "</td>";
                                            echo '
                              <td style="text-align: center;">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <a href="view_gia.php?id=' . $row["project_id"] . '" type="button" class="btn btn-primary btn-sm" title="View Details">
                                    <i class="fas fa-eye"></i>
                                  </a>'; ?>
                                            <a href="#" type="button" class="btn btn-success btn-sm" title="Edit Project" onclick="editProject('<?= $row['project_id'] ?>')">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" type="button" class="btn btn-danger btn-sm" title="Delete Project" onclick="deleteProject(' <?= $row['project_id'] ?>')">
                                                <i class="fas fa-trash-alt"></i>
                                            </a><?php echo '
                                </div>
                              </td>';
                                                echo "</tr>";
                                            }
                                        }

                                        // Close connection
                                        $conn->close();

                                                ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
    function deleteProject(projectId) {
        Swal.fire({
            title: 'Are you sure you want to delete this project?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'delete'
        }).then((result) => {
            if (result.isConfirmed) {
                // Send AJAX request or redirect to delete_project.php with projectId
                window.location.href = "../backend/delete_project.php?id=" + projectId;
            }
        });
    }

    function editProject(projectId) {
        Swal.fire({
            title: 'Are you sure you want to update this project?',
            text: "This action cannot be undone!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirm'
        }).then((result) => {
            if (result.isConfirmed) {
                // Send AJAX request or redirect to delete_project.php with projectId
                window.location.href = "../frontend/edit_gia.php?id=" + projectId;
            }
        });
    }
</script>
<?php
include 'template/footer.php';
?>