<?php
$page = "setup_monitoring";
include 'template/header.php';

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>SET-UP Monitoring</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">SET-UP Projects Monitoring</li>
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
                <table id="example1" class="table table-bordered table-hover"">
                    <thead>
                        <tr>
                             <th>Tags</th>
                                        <th>Project Code</th>
                                        <th>Project Title</th>
                                        <th>Description</th>
                                        <th>Location</th>
                                        <th>Type of Oganization</th>
                                        <th>beneficiaries</th>
                                        <th>owner Name</th>
                                        <th>Sex</th>
                                        <th>Date Approved</th>
                                        <th>Collaborating Agency</th>
                                        <th>No. of Implementors</th>
                                        <th>Total Project Cost</th>
                                        <th>Amount of Assistance</th>
                                        <th>Counterpart Funding</th>
                                        <th>Date Fund Released</th>
                                        <th>Personal Service</th>
                                        <th>Maintenance and other Expenses</th>
                                        <th>Equipment Outlay</th>
                                        <th>Counterpart Description</th>
                                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                        <?php
                        include '../../../cms/connection/connection.php';

                        // SQL query to retrieve data
                        $sql = "select * from projects p
                                    left join province prov on p.province = prov.province_id
                                    left join citymun cm on p.city_mun = cm.citymun_id
                                    left join barangays brgy on p.barangay = brgy.barangay_id
                                    left join psi_project_types t on p.project_type = t.prj_type_id
                                    left join psi_cooperators c on p.beneficiaries = c.coop_id
                                    left join psi_implementors i on p.implementor = i.implementor_id
                                    left join psi_collaborators col on p.collaborating_agencies = col.col_id
                                    left join psi_project_status s on p.status = s.prj_status_id where project_type = 2
                      order by p.date_encoded desc";
                        // Execute the query
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $date_approve = $row["date_approved"];
                                $date_fund_rel = $row["date_fund_rel"];
                                $date_fund_rel = date_create($date_fund_rel);
                                $date_approved = date_create($date_approve);
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
                                switch ($row['typeorg']) {
                                    case '1':
                                        $typeorg = "Single Proprietorship";
                                        break;
                                    case '2':
                                        $typeorg = "Partnership";
                                        break;
                                    case '3':
                                        $typeorg = "Cooperative";
                                        break;
                                    case '4':
                                        $typeorg = "Corporation Profit";
                                        break;
                                    case '5':
                                        $typeorg = "Corporation Non-Profit";
                                        break;
                                    case '6':
                                        $typeorg = "Local Government Unit";
                                        break;
                                }
                                if ($row['project_sex']) {
                                    $sex = 'Male';
                                } else {
                                    $sex = 'Female';
                                }
                                echo "<tr>";
                                echo "<td>" . $row["tag"] . "</td>";
                                echo "<td>" . $row["project_code"] . "</td>";
                                echo "<td>" . $row["project_title"] . "</td>";
                                echo "<td>" . $row["project_desc"] . "</td>";
                                echo "<td>" . $row["street"] . " " . $row["barangay_name"] . ", " . $row["citymun_m"] . " " . $row["province_m"] . "</td>";
                                echo "<td>" . $typeorg . "</td>";
                                echo "<td>" . $row["coop_name"] . "</td>";
                                echo "<td>" . $row["project_lname"] . ", " . $row["project_fname"] . " " . $row["project_mname"] . "</td>";
                                echo "<td>" . $sex . "</td>";
                                echo "<td>" . date_format($date_approved, "F d, Y") . "</td>";
                                echo "<td>" . $row['col_name'] . "</td>";
                                echo "<td>" . $row["implementor"] . "</td>";
                                echo "<td>" . number_format($row["total_project_cost"], 2) . "</td>";
                                echo "<td>" . number_format($row["amount_assist"], 2) . "</td>";
                                echo "<td>" . number_format($row["counterpart_fund"], 2) . "</td>";
                                echo "<td>" . date_format($date_fund_rel, "F d, Y") . "</td>";
                                echo "<td>" . number_format($row["personal_service"], 2) . "</td>";
                                echo "<td>" . number_format($row["maintenance_other"], 2) . "</td>";
                                echo "<td>" . number_format($row["equip_outlay"], 2) . "</td>";
                                echo "<td>" . $row["counterpart_desc"] . "</td>";
                                echo '
                              <td style="text-align: center;">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <a href="view_setup.php?id=' . $row["project_id"] . '" type="button" class="btn btn-primary btn-sm" title="View Details">
                                    <i class="fas fa-eye"></i>
                                  </a>
                                  '; ?><a href=" #" type="button" class="btn btn-success btn-sm" title="Edit Project" onclick="editProject('<?= $row['project_id'] ?>')">
                    <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" type="button" class="btn btn-danger btn-sm" title="Delete Project" onclick="deleteProject('<?= $row['project_id'] ?>')">
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
        </div>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- view modal -->
<script>
    function deleteProject(projectId) {
        Swal.fire({
            title: 'Are you sure you want to delete this project?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete'
        }).then((result) => {
                if (result.isConfirmed) {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Delete!",
                            text: "The project has been deleted.",
                            icon: "success"
                        });
                        // Send AJAX request or redirect to delete_project.php with projectId
                        window.location.href = "../backend/delete_project.php?id=" + projectId;
                    }
                });
        }

        function editProject(projectId) {
            Swal.fire({
                title: 'Are you sure you want to edit this project?',
                text: "This action cannot be undone!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Send AJAX request or redirect to delete_project.php with projectId
                    window.location.href = "../frontend/edit_setup.php?id=" + projectId;
                }
            });
        }
</script>


<?php
include 'template/charts.php';
include 'template/footer.php';
?>