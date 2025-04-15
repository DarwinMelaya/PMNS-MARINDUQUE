<?php
$page = "cest_monitoring";
include 'template/header.php';

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>CEST Projects</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">CEST Projects Monitoring</li>
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
                <h3 class="card-title">Monitoring</h3>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped" style="overflow-x:auto;">
                    <thead>
                        <tr>
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
                            <th>Date Fund Released</th>
                            <th>Personal Services</th>
                            <th>Maintenance and Other Expenses</th>
                            <th>Equipment Outlay</th>
                            <th>Mode of Procurement</th>
                            <th>Counterpart Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        include '../../../cms/connection/connection.php';

                        // SQL query to retrieve data
                        $sql = "SELECT * FROM projects p
                        left join province prov on p.province = prov.province_id
                        left join citymun cm on p.city_mun = cm.citymun_id
                        left join barangays brgy on p.barangay = brgy.barangay_id
                        left join psi_project_types t on p.project_type = t.prj_type_id
                        left join psi_cooperators c on p.beneficiaries = c.coop_id
                        left join psi_implementors i on p.implementor = i.implementor_id
                        left join psi_collaborators col on p.collaborating_agencies = col.col_id
                        left join psi_project_status s on p.status = s.prj_status_id
                         where project_type = 3";
                        // Execute the query
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $duration_from = $row['duration_from'];
                                $duration_to = $row['duration_to'];
                                $date_released = $row['date_released'];
                                $date_approved = $row['date_approved'];
                                $date_approved = date_create($date_approved);
                                $duration_from = date_create($duration_from);
                                $duration_to = date_create($duration_to);
                                $date_released = date_create($date_released);

                                if ($row['modepro'] = 1) {
                                    $modepro = "Direct Release";
                                } else if ($row['modepro'] = 2) {
                                    $modepro = "Regional Office Procurement";
                                }
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
                                echo "<tr>";
                                echo "<td>" . $row["project_code"] . "</td>";
                                echo "<td>" . $row["project_title"] . "</td>";
                                echo "<td>" . $row["street"] . ", " . $row["barangay_name"] . ", " . $row["citymun_m"] . ", " . $row["province_m"] . "</td>";
                                echo "<td>" . date_format($date_approved, "F d, Y") . "</td>";
                                echo "<td>" . $row["project_desc"] . "</td>";
                                echo "<td>" . date_format($duration_from, "F d, Y") . " to " . date_format($duration_to, "F d, Y") . "</td>";
                                echo "<td>" . $row['proponent'] . "</td>";
                                echo "<td>" . $row["collaborating_agencies"] . "</td>";
                                echo "<td>" . $row["beneficiaries"] . "</td>";
                                echo "<td> Map </td>";
                                echo "<td> Php " . number_format($row["total_project_cost"], 2) . "</td>";
                                echo "<td> Php " . number_format($row["amount_assist"], 2) . "</td>";
                                echo "<td> Php " . number_format($row['counterpart_fund'], 2) . "</td>";
                                echo "<td>" . date_format($date_released, "F d, Y") . "</td>";
                                echo "<td> Php " . number_format($row['personal_service'], 2) . "</td>";
                                echo "<td> Php " . number_format($row['maintenance_other'], 2) . "</td>";
                                echo "<td> Php " . number_format($row['equip_outlay'], 2) . "</td>";
                                echo "<td> " . $modepro . " </td>";
                                echo "<td>" . $row["counterpart_desc"] . "</td>";
                                echo '
                              <td style="text-align: center;">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <a href="view_cest.php?id=' . $row["project_id"] . '" type="button" class="btn btn-primary btn-sm" title="View Details">
                                    <i class="fas fa-eye"></i>
                                  </a>
                                  '; ?>
                                <a href="#" type="button" class="btn btn-danger btn-sm" title="Delete Project" onclick="deleteProject('<?= $row['project_id'] ?>')">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                        <?php echo '</div></td>';
                                echo "</tr>";
                            }
                        }

                        // Close connection
                        $conn->close();

                        ?>
                        <!-- <a href='#' class='btn btn-info btn-sm view_data'>
                            <i class='fas fa-pencil-alt'>
                            </i>
                            View & Uploading File
                        </a> -->
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'template/charts.php';
include 'template/footer.php';
?>
<script>
    function deleteProject(projectId) {
        Swal.fire({
            title: 'Are you sure you want to delete this project?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirm'
        }).then((result) => {
            if (result.isConfirmed) {
                // Send AJAX request or redirect to delete_project.php with projectId
                window.location.href = "../backend/delete_project.php?id=" + projectId;
            }
        });
    }
</script>