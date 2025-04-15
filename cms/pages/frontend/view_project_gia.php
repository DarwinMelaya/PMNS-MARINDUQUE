<?php

$page = "gia_masterlist";
include 'template/header.php';
include '../../connection/connection.php';

// SQL query to select all records from the projects table

if ($_SESSION['id'] == "") header("Location:../../../");
$id = $_GET["id"];
$sql = "SELECT * FROM projects WHERE project_id='" . $id . "'";

// Execute the query
$result = $conn->query($sql);

// Check if any records are returned
if ($result->num_rows > 0) {
  // Fetch each row and store its data into separate variables
  while ($row = $result->fetch_assoc()) {
    $project_id = $row['project_id'];
    $project_code = $row['project_code'];
    $project_type = $row['project_type'];
    $year_approved = $row['year_approved'];
    $project_title = $row['project_title'];
    $project_desc = $row['project_desc'];
    $duration_from = $row['duration_from'];
    $duration_to = $row['duration_to'];
    $revised_duration = $row['revised_duration'];
    $updated_duration_from = $row['updated_duration_from'];
    $updated_duration_to = $row['updated_duration_to'];
    $beneficiaries = $row['beneficiaries'];
    $collaborating_agencies = $row['collaborating_agencies'];
    $proponent = $row['proponent'];
    $date_released = $row['date_released'];
    $date_approved = $row['date_approved'];
    $investment_map = $row['investment_map'];
    $status = $row['status'];
    $street = $row['street'];
    $province = $row['province'];
    $city_mun = $row['city_mun'];
    $barangay = $row['barangay'];
    $project_cost = $row['project_cost'];
    $counterpart_fund = $row['counterpart_fund'];
    $other_project_cost = $row['other_project_cost'];
    $counterpart_desc = $row['counterpart_desc'];
    $ps = $row['personal_service'];
    $mooe = $row['maintenance_other'];
    $eo = $row['equip_outlay'];
    $realigned_budget = $row['realigned_budget'];
    $realigned_counterpart = $row['realigned_counterpart_fund'];
    $realigned_ps = $row['realigned_personal_service'];
    $realigned_mooe = $row['realigned_maintenance_other'];
    $realigned_eo = $row['realigned_equip_outlay'];
    $user_id = $row['user_id'];
    $mode_pro = $row['modepro'];
  }
} else {
  echo "0 results";
}
if ($revised_duration == 'yes') {
  $duration_from = $updated_duration_from;
  $duration_to = $updated_duration_to;
}

$duration_from = date_create($duration_from);
$duration_to = date_create($duration_to);
$date_approved = date_create($date_approved);
$date_released = date_create($date_released);


// Fetch all initiation docs if completed
$pidocs = 0;
$stmt = $conn->prepare("SELECT count(*) as num FROM pidocs_uploads WHERE project_id = ?");
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();
$stmt->bind_result($pidocs);
$stmt->fetch();
$stmt->close();

// Fetch all progress docs if something is uploaded
$progress = 0;
$stmt = $conn->prepare("SELECT count(*) as num FROM progress_uploads WHERE project_id = ?");
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();
$stmt->bind_result($progress);
$stmt->fetch();
$stmt->close();

// Fetch to check if Terminal progress docs is uploaded
$terminal = 0;
$stmt = $conn->prepare("SELECT COUNT(*) AS uploaded_docs_count FROM progress_uploads WHERE project_id = ? AND report_id IN (15, 16)");
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();
$stmt->bind_result($terminal);
$stmt->fetch();
$stmt->close();



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
          <h1>Project Details</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Project Details</li>
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
        <h3 class="card-title">Projects Detail</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>

      <div class="card-body">
        <div class="row">
          <div class="container">
            <div class="card-body">
              <div class="track">
                <div class="step active"> <span class="icon"> <i class="fa fa-folder"></i> </span> <span class="text">Project Initial Stage</span> </div>
                <div class="step <?php if ($pidocs == '24') {
                                    echo 'active';
                                  } ?>"> <span class="icon"> <i class="fa fa-thumbs-up"></i> </span> <span class="text"> Project Implementation</span> </div>
                <div class="step <?php if ($pidocs == '24' && $progress > 0) {
                                    echo 'active';
                                  } ?>"> <span class="icon"> <i class="fa fa-eye"></i> </span> <span class="text"> Project Monitoring</span> </div>
                <div class="step <?php if ($pidocs == '24' && $progress > 2 && $terminal == '2') {
                                    echo 'active';
                                  } ?>"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Project Completion </span> </div>
                <div class="step "> <span class="icon"> <i class="fa fa-handshake"></i> </span> <span class="text"> Transfer </span> </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-md-12 col-lg-7 order-2 order-md-1">
            <div class="row">
              <div class="col-12 col-sm-4">
                <div class="info-box bg-yellow">
                  <div class="info-box-content">
                    <span class="info-box-text text-center text-muted">Project Status</span>
                    <span class="info-box-number text-center mb-0">Approved</span>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-4">
                <div class="info-box bg-lime">
                  <div class="info-box-content">
                    <span class="info-box-text text-center text-muted">Project Cost</span>
                    <span class="info-box-number text-center mb-0">
                      <?php
                      if ($realigned_budget == 'yes') {
                        echo 'PhP ' . number_format(($realigned_counterpart + $realigned_ps + $realigned_mooe + $realigned_eo), 2) . ' (realigned)';
                      } else {
                        echo 'PhP ' . number_format(($ps + $mooe + $eo), 2);
                      }
                      ?>
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-4">
                <div class="info-box bg-orange">
                  <div class="info-box-content">
                    <span class="info-box-text text-center text-muted">Project Duration</span>
                    <span class="info-box-number text-center mb-0"><?= date_format($duration_from, "M d, Y") . " to " . date_format($duration_to, "M d, Y") ?></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-12">
                <h4><b style="color: blue;">Project Information</b></h4>
                <table class="table table-bordered table-striped">
                  <tbody>
                    <tr>
                      <th class="text-nowrap" scope="row">Project Code</th>
                      <td><?= strtoupper($project_code) ?></td>
                    </tr>
                    <tr>
                      <th class="text-nowrap" scope="row">Project Title</th>
                      <td><?= strtoupper(stripslashes($project_title)) ?></td>
                    </tr>
                    <tr>
                      <th class="text-nowrap" scope="row">Date Approved</th>
                      <td><?= date_format($date_approved, "F d, Y") ?> </td>
                    </tr>
                    <tr>
                      <th class="text-nowrap" scope="row">Date Fund Released</th>
                      <td><?= date_format($date_released, "F d, Y") ?></td>
                    </tr>
                    <tr>
                      <th class="text-nowrap" scope="row">Duration</th>
                      <td><?= date_format($duration_from, "F d, Y") ?> - <?= date_format($duration_to, "F d,Y") ?>
                        <?php if ($revised_duration == 'yes') {
                          echo '<b>(Revised Duration)</b>';
                        } ?>
                      </td>
                    </tr>
                    <tr>
                      <th class="text-nowrap" scope="row">Proponent</th>
                      <td><?= stripslashes($proponent) ?></td>
                    </tr>
                    <tr>
                      <th class="text-nowrap" scope="row">Investment Map</th>
                      <td><?= $investment_map ?></td>
                    </tr>
                    <tr>
                      <th class="text-nowrap" scope="row">Mode of Procurement</th>
                      <td><?php if ($mode_pro == "1") {
                            echo "Direct Release";
                          } else {
                            echo "Regional Office Procurement";
                          } ?></td>
                    </tr>
                  </tbody>
                </table>
                <hr />
                <h4><b style="color: blue;">Financial Information</b></h4>

                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>LINE-ITEM BUDGET</th>
                      <th>As Approved</th>
                      <?php if ($realigned_budget == 'yes') {
                        echo '<th>Realignment</th>';
                      } ?>
                    </tr>
                  </thead>

                  <tbody>

                    <tr>
                      <th class="text-nowrap" scope="row">Personal Service</th>
                      <td>Php <?= number_format($ps, 2) ?></td>
                      <?php if ($realigned_budget == 'yes') {
                        echo '<td>Php ' . number_format($realigned_ps, 2) . '</td>';
                      } ?>
                    </tr>
                    <tr>
                      <th class="text-nowrap" scope="row">Maintenance and Other Expense</th>
                      <td>Php <?= number_format($mooe, 2) ?></td>
                      <?php if ($realigned_budget == 'yes') {
                        echo '<td>Php ' . number_format($realigned_mooe, 2) . '</td>';
                      } ?>
                    </tr>
                    <tr>
                      <th class="text-nowrap" scope="row">Equipment Outlay</th>
                      <td>Php <?= number_format($eo, 2) ?></td>
                      <?php if ($realigned_budget == 'yes') {
                        echo '<td> Php ' . number_format($realigned_eo, 2) . '</td>';
                      } ?>
                    </tr>
                    <tr>
                      <th class="text-nowrap" scope="row">Counterpart Funding</th>
                      <td>Php <?= number_format($counterpart_fund, 2) ?></td>
                      <?php if ($realigned_budget == 'yes') {
                        echo '<td> Php ' . number_format($realigned_counterpart, 2) . '</td>';
                      } ?>
                    </tr>
                    <tr>
                      <th class="text-nowrap" scope="row">Amount of Assistance</th>
                      <td>Php <?= number_format(($ps + $mooe + $eo), 2) ?></td>
                      <?php if ($realigned_budget == 'yes') {
                        echo '<td> Php ' . number_format(($realigned_ps + $realigned_mooe + $realigned_eo), 2) . '</td>';
                      } ?>
                    </tr>

                    <tr>
                      <th class="text-nowrap" scope="row">Total Project Cost</th>
                      <td>Php <?= number_format(($ps + $mooe + $eo + $counterpart_fund), 2) ?></td>
                      <?php if ($realigned_budget == 'yes') {
                        echo '<td> Php ' . number_format(($realigned_counterpart + $realigned_ps + $realigned_mooe + $realigned_eo), 2) . '</td>';
                      } ?>
                    </tr>

                  </tbody>
                </table>

              </div>
            </div>
          </div>
          <div class="col-12 col-md-12 col-lg-5 order-1 order-md-2">
            <div class="card card-row card-primary">
              <div class="card-header">
                <h3 class="card-title">
                  Documentary Requirements
                </h3>
              </div>
              <div class="card-body">
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h5 class="card-title">Project Initiation Documents</h5>
                    <div class="card-tools">
                      <a href="#" class="btn btn-tool">
                        <i class="fas fa-upload" data-toggle="modal" data-target="#uploadModal">&nbsp;Upload Document</i>
                      </a>
                    </div>
                  </div>
                  <div class="card-body">
                    <table class="table table-bordered table-hover">
                      <thead class="thead-dark">
                        <tr>
                          <th>Title of the Documents</th>
                          <th>Date Uploaded</th>
                          <th>Controls</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        include '../../connection/connection.php';
                        $sql = "select * from pidocs_uploads p left join docs_list d on p.doc_id = d.doc_id where project_id = '" . $_GET['id'] . "' order by p.doc_id asc";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                            echo '<tr><td>' . $row['document_title'] . '</td><td>' . $row['date_time_uploaded'] . '</td><td style="text-align: center"><div class="btn-group" role="group" aria-label="Controls">';
                            if ($row['file_name'] != "N/A") {
                              echo '
                                                <a href="#" class="text-primary mx-1" data-bs-toggle="modal" data-bs-target="#pdfModal" data-pdf-url="../uploads/' . $row['file_name'] . '"><i class="fas fa-eye"></i></a>
                                                <a href="../uploads/' . $row['file_name'] . '" class="text-success mx-1" download><i class="fas fa-download"></i></a>
                                                ';
                            }
                            echo '
                                                <a href="../backend/delete_pidocs.php?id=' . $row['project_id'] . '&uid=' . $row['upload_id'] . '" class="text-danger mx-1"><i class="fas fa-trash"></i></a>
                                            </div></td></tr>';
                          }
                        } else {
                          echo "<h5 style='color: red;'>No Documents Uploaded</h5>";
                        }
                        $conn->close();
                        ?>


                      </tbody>
                    </table>
                  </div>
                </div>

                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h5 class="card-title">Monitoring Reports</h5>
                    <div class="card-tools">
                      <a href="#" class="btn btn-tool">
                        <i class="fas fa-upload" data-toggle="modal" data-target="#uploadModal1">&nbsp;Upload Report</i>
                      </a>
                    </div>
                  </div>

                  <div class="card-body">
                    <table class="table table-bordered table-hover">
                      <thead class="thead-dark">
                        <tr>
                          <th>Title of the Documents</th>
                          <th>Date Uploaded</th>
                          <th>Controls</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        include '../../connection/connection.php';
                        $sql = "select * from progress_uploads p left join reports_list d on p.report_id = d.report_id where project_id = '" . $_GET['id'] . "' order by p.report_id asc";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                            echo '<tr><td>' . $row['report_title'] . '</td><td>' . $row['date_time_uploaded'] . '</td><td><div class="btn-group" role="group" aria-label="Controls">
                                                <a href="#" class="text-primary mx-1" data-bs-toggle="modal" data-bs-target="#pdfModal" data-pdf-url="../uploads/' . $row['file_name'] . '"><i class="fas fa-eye"></i></a>
                                                <a href="../uploads/' . $row['file_name'] . '" class="text-success mx-1" download><i class="fas fa-download"></i></a>
                                                <a href="../backend/delete_progress.php?id=' . $row['project_id'] . '&uid=' . $row['upload_id'] . '" class="text-danger mx-1"><i class="fas fa-trash"></i></a>
                                            </div></td></tr>';
                          }
                        } else {
                          echo "<h5 style='color: red;'>No Documents Uploaded</h5>";
                        }
                        $conn->close();
                        ?>


                      </tbody>
                    </table>
                  </div>
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

  <!-- Modal -->
  <div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="pdfModalLabel">PDF Preview</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <embed id="pdfEmbed" src="" type="application/pdf" width="100%" height="500px">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Upload Modal PID -->
  <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="uploadModalLabel">Upload Document</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../backend/save_pids_uploads.php" method="post" enctype="multipart/form-data" id="uploadForm">
            <div class="form-group">
              <input type="hidden" name="project_id" value="<?= $_GET['id']; ?>" />
              <label for="documentTitle">Document Title</label>
              <select class="form-control" name="documentTitle" required>
                <option value="">Select Document</option>
                <?php
                include '../../connection/connection.php';
                $sql = "SELECT d.doc_id as docs, document_title FROM docs_list d LEFT JOIN pidocs_uploads p ON d.doc_id = p.doc_id AND p.project_id = '" . $_GET['id'] . "' WHERE d.gia_req = '1' and p.doc_id IS NULL order by d.gia_arr asc";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row['docs'] . '">' . $row['document_title'] . '</option>';
                  }
                } else {
                  echo "0 results";
                }
                $conn->close();
                ?>
              </select>
            </div>
            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="notRequired" name="notRequired">
              <label class="form-check-label" for="notRequired">Document is not required</label>
            </div>
            <div class="form-group">
              <input type="file" name="pdfFile" id="pdfFile" accept="application/pdf" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="submitButton">Upload</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Upload Modal PROGRESS REPORTS -->
  <div class="modal fade" id="uploadModal1" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="uploadModalLabel">Upload Monitoring Report</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../backend/save_progress_uploads.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <input type="hidden" name="project_id" value="<?= $_GET['id']; ?>" />
              <label for="documentTitle">Report Title</label>
              <select class="form-control" name="documentTitle" id="reportlist" onchange="hideOptions(this.value)" required>
                <option value="">Select Document</option>
                <?php
                include '../../connection/connection.php';
                $sql = "SELECT * from reports_list";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {

                    echo '<option value="' . $row['report_id'] . '">' . $row['report_title'] . '</option>';
                  }
                } else {
                  echo "0 results";
                }
                $conn->close();
                ?>
              </select>
            </div>
            <div class="form-group">
              <input type="file" name="pdfFile" id="pdfFile" accept="application/pdf" required>
            </div>

            <div class="form-group" id="completion_rate" style="display: none">
              <label for="financial">Accumulated Completion Rate (%): </label>
              <input class="form-control" type="number" min="1.00" max="100.00" name="completion_rate" placeholder="Completion rate (do not include %)" />
            </div>

            <div class="form-group" id="utilization_rate" style="display: none">
              <label for="financial">Fund Utilization Rate (%): </label>
              <input class="form-control" type="number" min="1.00" max="100.00" name="utilization_rate" placeholder="Utilization rate (do not include %)" />
            </div>

            <div class="form-group" id="as_of_date" style="display: none">
              <label for="financial">Date of Accomplishment: </label>
              <input class="form-control" type="date" name="as_of_date" placeholder="accomplishment date" />
            </div>

            <!-- For the request of extension -->
            <div class="form-group" id="duration_from" style="display: none">
              <label for="financial">Updated Duration (Start): </label>
              <input class="form-control" type="date" name="duration_from" placeholder="Updated Start Date" />
            </div>

            <div class="form-group" id="duration_to" style="display: none">
              <label for="financial">Updated Duration (Completion): </label>
              <input class="form-control" type="date" name="duration_to" placeholder="Update End Date" />
            </div>

            <!-- For the realignment-->
            <div class="form-group" id="counterpart" style="display: none">
              <label for="financial">Updated Counterpart Fund: </label>
              <input type="number" name="counterpart" max="99999999" step="0.01" min="0" class="form-control" placeholder="0.00">
            </div>

            <div class="form-group" id="ps" style="display: none">
              <label for="financial">Updated Personal Services: </label>
              <input type="number" name="ps" max="99999999" step="0.01" min="0" class="form-control" placeholder="0.00">
            </div>

            <div class="form-group" id="mooe" style="display: none">
              <label for="financial">Updated MOOE </label>
              <input type="number" name="mooe" max="99999999" step="0.01" min="0" class="form-control" placeholder="0.00">
            </div>

            <div class="form-group" id="eo" style="display: none">
              <label for="financial">Updated Equipment Outlay </label>
              <input type="number" name="eo" max="99999999" step="0.01" min="0" class="form-control" placeholder="0.00">
            </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Upload</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function() {
    $('#reportlist').change(function() {

      var selectedCode = $(this).val();
      // alert(selectedCode);
      if (selectedCode === '8') {
        $('#completion_rate').css('display', 'none');
        $('#utilization_rate').css('display', 'block');
        $('#as_of_date').css('display', 'block');
        $('#duration_from').css('display', 'none');
        $('#duration_to').css('display', 'none');
        $('#counterpart').css('display', 'none');
        $('#ps').css('display', 'none');
        $('#mooe').css('display', 'none');
        $('#eo').css('display', 'none');
      } else if (selectedCode === '6') {
        $('#completion_rate').css('display', 'block');
        $('#utilization_rate').css('display', 'none');
        $('#as_of_date').css('display', 'block');
        $('#duration_from').css('display', 'none');
        $('#duration_to').css('display', 'none');
        $('#counterpart').css('display', 'none');
        $('#ps').css('display', 'none');
        $('#mooe').css('display', 'none');
        $('#eo').css('display', 'none');
      } else if (selectedCode === '7') {
        $('#completion_rate').css('display', 'block');
        $('#utilization_rate').css('display', 'none');
        $('#as_of_date').css('display', 'block');
        $('#duration_from').css('display', 'none');
        $('#duration_to').css('display', 'none');
        $('#counterpart').css('display', 'none');
        $('#ps').css('display', 'none');
        $('#mooe').css('display', 'none');
        $('#eo').css('display', 'none');
      } else if (selectedCode === '18') {
        $('#counterpart').css('display', 'block');
        $('#ps').css('display', 'block');
        $('#mooe').css('display', 'block');
        $('#eo').css('display', 'block');
        $('#completion_rate').css('display', 'none');
        $('#utilization_rate').css('display', 'none');
        $('#as_of_date').css('display', 'none');
        $('#duration_from').css('display', 'none');
        $('#duration_to').css('display', 'none');
      } else if (selectedCode === '19') {
        $('#duration_from').css('display', 'block');
        $('#duration_to').css('display', 'block');
        $('#completion_rate').css('display', 'none');
        $('#utilization_rate').css('display', 'none');
        $('#as_of_date').css('display', 'none');
        $('#counterpart').css('display', 'none');
        $('#ps').css('display', 'none');
        $('#mooe').css('display', 'none');
        $('#eo').css('display', 'none');
      } else {
        $('#completion_rate').css('display', 'none');
        $('#utilization_rate').css('display', 'none');
        $('#as_of_date').css('display', 'none');
        $('#duration_from').css('display', 'none');
        $('#duration_to').css('display', 'none');
        $('#counterpart').css('display', 'none');
        $('#ps').css('display', 'none');
        $('#mooe').css('display', 'none');
        $('#eo').css('display', 'none');
      }
    });
  });

  // Dynamically set the PDF file URL when the modal is opened
  const pdfModal = document.getElementById('pdfModal');
  pdfModal.addEventListener('show.bs.modal', function(event) {
    const button = event.relatedTarget; // Button that triggered the modal
    const pdfUrl = button.getAttribute('data-pdf-url'); // Extract PDF URL from the button
    const pdfEmbed = document.getElementById('pdfEmbed'); // The embed element in the modal
    pdfEmbed.src = pdfUrl; // Set the PDF URL
  });

  const notRequiredCheckbox = document.getElementById('notRequired');
  const pdfFileInput = document.getElementById('pdfFile');
  const uploadForm = document.getElementById('uploadForm');
  const submitButton = document.getElementById('submitButton');

  notRequiredCheckbox.addEventListener('change', function() {
    if (this.checked) {
      pdfFileInput.required = false;
      uploadForm.action = "../backend/save_not_required.php";
      submitButton.textContent = "Update Checklist"; // Correctly set button text
    } else {
      pdfFileInput.required = true;
      uploadForm.action = "../backend/save_pids_uploads.php";
      submitButton.textContent = "Upload"; // Revert button text
    }
  });
</script>
<?php
include 'template/footer.php';
?>