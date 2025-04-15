<?php
$page = "training_masterlist";
include 'template/header.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Technology Training Masterlist</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Technology Training Masterlist</li>
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
          <!-- /.card -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Masterlist of Encoded Technology Training</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example4" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th rowspan="2">Training Title</th>
                    <th rowspan="2">Charging</th>
                    <th rowspan="2">Amount of Training</th>
                    <th rowspan="2">Resource Speaker Name</th>
                    <th rowspan="2">Speaker Designation</th>
                    <th rowspan="2">Speaker Agency</th>
                    <th rowspan="2">Date Conducted</th>
                    <th rowspan="2">Venue</th>
                    <th rowspan="2">Participants name</th>
                    <th rowspan="2">Address</th>
                    <th colspan="2">DOST-Assisted Firms Male</th>
                    <th colspan="2">Non-DOST Assisted Firms Male</th>
                    <th colspan="2">Cooperatives Male</th>
                    <th colspan="2">Startup Male</th>
                    <th colspan="2">Individuals Male</th>
                    <th colspan="2">Academe Male</th>
                    <th colspan="2">Government Male</th>
                    <th rowspan="2">No. Person with Disability</th>
                    <th rowspan="2">No. Senior Citizen</th>
                    <th rowspan="2">No. of IPe</th>
                    <th rowspan="2">Action</th>
                  </tr>
                  <tr>
                    <td>Male</td>
                    <td>Female</td>
                    <td>Male</td>
                    <td>Female</td>
                    <td>Male</td>
                    <td>Female</td>
                    <td>Male</td>
                    <td>Female</td>
                    <td>Male</td>
                    <td>Female</td>
                    <td>Male</td>
                    <td>Female</td>
                    <td>Male</td>
                    <td>Female</td>

                  </tr>
                </thead>
                <tbody>
                  <?php
                  include '../../connection/connection.php';

                  $sql = "SELECT * FROM trainings t order by t.date_encoded desc";


                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                      $dateconducted = $row["dateconducted"];
                      $dateconducted = date_create($dateconducted);

                      $jsonData = $row['rps_details'];
                        $resourcePersons = [];

                        if (!empty($jsonData)) {
                            // Decode JSON data into an associative array
                            $resourcePersons = json_decode($jsonData, true);
                        }


                      switch ($row["charging_program"]) {
                        case 1:
                          $charging_program = "TAIS";
                          break;
                        case 2:
                          $charging_program = "GIA";
                          break;
                        case 3:
                          $charging_program = "CEST";
                          break;
                        case 4:
                          $charging_program = "SSCP";
                          break;
                        case 5:
                          $charging_program = "Others";
                          break;
                        default:
                          $charging_program = "";
                          break;
                      }

                      echo "<tr>";
                      echo "<td>" . $row["training_title"] . "</td>";
                      echo "<td>" . $charging_program . "</td>";
                      echo "<td>" . $row["amount_training"] . "</td>";
                      echo "<td>"; ?>
                      <?php if (!empty($resourcePersons)): ?>
                          <?php $x=1; foreach ($resourcePersons as $person): ?>
                              <strong>RP #<?= $x++; ?></strong> <?= htmlspecialchars($person['fullName']) ?>
                              <strong>/</strong> <?= htmlspecialchars($person['designation']) ?>
                              <strong>/</strong> <?= htmlspecialchars($person['agency']) ?><br />
                          <?php endforeach; ?> 
                      <?php else: ?>
                        <p>No data available to display.</p>
                      <?php endif; ?>
                      <?php echo "</td>";
                      echo "<td>-</td>";
                      echo "<td>-</td>";
                      echo "<td>" . date_format($dateconducted, "F d, Y") . "</td>";
                      echo "<td>" . $row["resource_venue"] . "</td>";
                      echo "<td>" . $row["participant_name"] . "</td>";
                      echo "<td>" . $row["participant_address"] . "</td>";
                      echo "<td>" . $row["dost_assist_firm_male"] . "</td>";
                      echo "<td>" . $row["dost_assist_firm_female"] . "</td>";
                      echo "<td>" . $row["nondost_assist_firm_male"] . "</td>";
                      echo "<td>" . $row["nondost_assist_firm_female"] . "</td>";
                      echo "<td>" . $row["coop_male"] . "</td>";
                      echo "<td>" . $row["coop_female"] . "</td>";
                      echo "<td>" . $row["startup_male"] . "</td>";
                      echo "<td>" . $row["startup_female"] . "</td>";
                      echo "<td>" . $row["individual_male"] . "</td>";
                      echo "<td>" . $row["individual_female"] . "</td>";
                      echo "<td>" . $row["academe_male"] . "</td>";
                      echo "<td>" . $row["academe_female"] . "</td>";
                      echo "<td>" . $row["government_male"] . "</td>";
                      echo "<td>" . $row["government_female"] . "</td>";
                      echo "<td>" . $row["pwd_participants"] . "</td>";
                      echo "<td>" . $row["sr_participants"] . "</td>";
                      echo "<td>" . $row["ipe"] . "</td>";
                      echo '
                              <td style="text-align: center;">
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                  <a href="view_training.php?id=' . $row["training_id"] . '" type="button" class="btn btn-primary btn-sm" title="view details">
                                    <i class="fas fa-eye"></i>
                                  </a>';
                             if($_SESSION['level']==1 || $_SESSION['level']==0){
                      echo '
                              <a href="edit_training.php?id=' . $row["training_id"] . '" type="button" class="btn btn-success btn-sm" title="edit project">
                                <i class="fas fa-edit"></i>
                              </a>
                              <a href="../backend/delete_training.php?id=' . $row["training_id"] . '" type="button" class="btn btn-danger btn-sm" title="delete project">
                                <i class="fas fa-trash-alt"></i>
                              </a>
                            </div>';
                            }
                            echo '</td>';
                      echo "</tr>";
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
<?php
include 'template/footer.php';
?>