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

        <!-- Improved Modal -->
        <div class="modal fade" id="lackingDocsModal" tabindex="-1" role="dialog" aria-labelledby="lackingDocsModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="lackingDocsModalLabel">Required Documents</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Document Title</th>
                                    <th>Uploaded?</th>
                                </tr>
                            </thead>
                            <tbody id="docsTableBody" class="small">
                                <!-- Document statuses will be populated here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Monitoring</h3>
            </div>
            <div class="card-body">
            <table id="example3" class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 20%">
                          Project Title
                      </th>
                      <th style="width: 8%">
                          Province
                      </th>
                      <th style="width: 10%">
                          Duration
                      </th>
                      <th style="width: 10%">
                          Project Cost
                      </th>
                      <th style="width: 8%" class="text-center">
                        Status
                      </th>
                      <th style="width: 13%">
                        Physical
                      </th>
                      <th style="width: 13%">
                        Financial
                      </th>
                      <th style="width: 13%">
                        Documentary
                      </th>
                      
                      <th style="width: 5%">
                      </th>
                  </tr>
              </thead>
              <tbody>
            <?php
                include '../../connection/connection.php';
                $sql = "select * from projects where project_type = '3' AND province='$province'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        
            ?>
                  <tr>
                      <td>
                          <?= stripslashes($row['project_title']); ?>
                      </td>
                      <td>
                          <?php
                                if($row['province']=='000'){
                                    echo "REGIONWIDE";
                                }else if($row['province']=='40'){
                                    echo "MARINDUQUE";
                                }else if($row['province']=='51'){
                                    echo "OCCIDENTAL MINDORO";
                                }else if($row['province']=='52'){
                                    echo "ORIENTAL MINDORO";
                                }else if($row['province']=='53'){
                                    echo "PALAWAN";
                                }else if($row['province']=='59'){
                                    echo "ROMBLON";
                                }else if($row['province']=='315'){
                                    echo "PUERTO PRINCESA";
                                }
                          ?>
                      </td>
                      <td>
                         <?php
                                $duration_from = date_create($row['duration_from']);
                                $duration_to = date_create($row['duration_to']);
                                echo date_format($duration_from, "M d, Y") . " to " . date_format($duration_to, "M d, Y");
                         ?>
                      </td>
                      
                      <td>
                        <?= "PhP " . number_format(($row['personal_service']+$row['maintenance_other']+$row['equip_outlay']+$row['counterpart_fund']), 2); ?>
                      </td>
                      <td class="project-state">
                      <?php
                            $duration_from = date_create($row['duration_from']);
                            $duration_to = date_create($row['duration_to']);
                            $today = date_create(date("Y-m-d"));

                            // Check if the project is on time or delayed
                            if ($today <= $duration_to) {
                                echo '<span class="badge badge-success">On Time</span>';
                            } else {
                                echo '<span class="badge badge-danger">Delayed</span>';
                            }
                        ?>

                      </td>
                      <td class="project_progress">
                      <?php
                            $rate = 0.00;
                            $as_of = "-";
                            $sql1= "select completion_rate, as_of_date from progress_uploads where project_id = '".$row['project_id']."' order by completion_rate asc";
                            $result1 = $conn->query($sql1);
                            if ($result1->num_rows > 0) {
                                while ($row1 = $result1->fetch_assoc()) {
                                        $rate = $row1['completion_rate'];
                                        $as_of = date_create($row1['as_of_date']);
                                        
                                }
                        ?>
                          
                          <div class="progress progress-sm">
                              <div class="progress-bar bg-green" role="progressbar" aria-valuenow="<?= $rate ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $rate ?>%">
                              </div>
                          </div>
                          <small>
                              <?= $rate."% as of ".date_format($as_of, "M d, Y"); ?> 
                          </small>
                        <?php
                            }
                            else{
                                echo '<div class="progress progress-sm"><div class="progress-bar bg-green" role="progressbar" aria-valuenow="<?= $rate ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $rate ?>%"></div></div>
                                <small>No Uploaded Progress Report</small>';
                            }
                        ?>
                      </td>
                      <td class="project_progress">
                          
                      <?php
                            $rate = 0.00;
                            $as_of = "-";
                            $sql2= "select utilization_rate, as_of_date from progress_uploads where project_id = '".$row['project_id']."' order by utilization_rate asc";
                            $result2 = $conn->query($sql2);
                            if ($result2->num_rows > 0) {
                                while ($row2 = $result2->fetch_assoc()) {
                                        $rate = $row2['utilization_rate'];
                                        $as_of = date_create($row2['as_of_date']);
                                        
                                }
                        ?>
                          
                          <div class="progress progress-sm">
                              <div class="progress-bar bg-blue" role="progressbar" aria-valuenow="<?= $rate ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $rate ?>%">
                              </div>
                          </div>
                          <small>
                              <?= $rate."% as of ".date_format($as_of, "M d, Y"); ?> 
                          </small>
                        <?php
                            }
                            else{
                                echo '<div class="progress progress-sm"><div class="progress-bar bg-blue" role="progressbar" aria-valuenow="<?= $rate ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $rate ?>%"></div></div>
                                <small>No Uploaded Progress Report</small>';
                            }
                        ?>
                      </td>
                      <td class="project_progress">
                        <?php
                            $totalUploads = 0;
                            $rate = 0;
                            $sql3 = "select count(project_id) as num from pidocs_uploads where project_id = '".$row['project_id']."'";
                            $result3 = $conn->query($sql3);
                            if ($result3->num_rows > 0) {
                                while ($row3 = $result3->fetch_assoc()) {
                                        $totalUploads = $row3['num'];
                                }
                            $rate = ($totalUploads/24)*100;
                        ?>
                          
                          <div class="progress progress-sm">
                              <div class="progress-bar bg-yellow" role="progressbar" aria-valuenow="<?= $rate ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $rate ?>%">
                              </div>
                          </div>
                          <small>
                              <?= $totalUploads ?> out of 24 uploaded
                          </small>
                        <?php
                                }
                        ?>

                      </td>
                      <td class="project-actions text-right">
                      <div class="btn-group" role="group">

                        <a class="btn btn-primary btn-sm" href="view_project_cest.php?id=<?= $row['project_id'] ?>" title="View to Upload Progress Reports">
                            <i class="fas fa-eye"></i>
                        </a>
                        <?php if($_SESSION['level']==1||$_SESSION['level']==0){ ?>
                        <a href="#" type="button" class="btn btn-success btn-sm" title="Edit Project" onclick="editProject('<?= $row['project_id'] ?>')">
                            <i class="fas fa-edit"></i>
                        </a>
                        <?php } ?>
                        <a class="btn btn-warning btn-sm" href="#" title="View Lacking Documents" onclick="showModal('<?= $row['project_id'] ?>')">
                            <i class="fas fa-folder-open"></i> 
                        </a>
                        </div>

                      </td>
                  </tr>

            <?php
                }
            } 
                $conn->close();
            ?> 
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
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script>
    // JavaScript function to show the modal and fetch lacking documents
    function showModal(projectId) {
        // Clear existing content in the table body
        document.getElementById("docsTableBody").innerHTML = '';

        // Fetch the lacking documents via AJAX
        fetch('fetch_lacking_docs.php?project_id=' + projectId)
            .then(response => response.json())
            .then(data => {
                let tableBody = document.getElementById("docsTableBody");

                if (data.length > 0) {
                    // Populate the table with lacking documents
                    data.forEach(doc => {
                        let row = document.createElement("tr");
                        let cell = document.createElement("td");
                        cell.textContent = doc.document_title;
                        row.appendChild(cell);

                     // Status cell with check or cross icon
                    let statusCell = document.createElement("td");
                    statusCell.classList.add("text-center");
                    if (doc.is_uploaded == 1) { // Ensure it checks for numeric 1
                        statusCell.innerHTML = '<span class="text-success"><i class="fas fa-check-circle"></i> </span>';
                    } else if (doc.is_uploaded == 0) {
                        statusCell.innerHTML = '<span class="text-danger"><i class="fas fa-times-circle"></i></span>';
                    }
                    row.appendChild(statusCell);

                        tableBody.appendChild(row);
                    });
                } else {
                    // Show message if there are no lacking documents
                    let row = document.createElement("tr");
                    let cell = document.createElement("td");
                    cell.setAttribute("colspan", "1");
                    cell.textContent = "No lacking documents.";
                    row.appendChild(cell);
                    tableBody.appendChild(row);
                }
            })
            .catch(error => console.error('Error fetching lacking documents:', error));

        // Show the modal
        $('#lackingDocsModal').modal('show');
    }

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
                window.location.href = "../frontend/edit_cest.php?id=" + projectId;
            }
        });
    }
</script>