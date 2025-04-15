<?php
$page = "training_masterlist";
include 'template/header.php';
include '../../connection/connection.php';

if ($_SESSION['id'] == "") header("Location:../../../");
// SQL query
$sql = "SELECT * FROM trainings p WHERE training_id='" . $_GET['id'] . "'";

// Execute query
$result = $conn->query($sql);

// Check if any results were returned
if ($result->num_rows > 0) {
  // Fetch each row and assign column values to individual variables
  while ($row = $result->fetch_assoc()) {
    $training_id = $row["training_id"];
    $training_title = $row["training_title"];
    $charging = $row["charging_program"];
    $amount_training = $row["amount_training"];
    $date_conducted = $row['dateconducted'];
    $venue = $row['resource_venue'];
    $participants_name = $row['participant_name'];
    $participants_address = $row['participant_address'];
    $dost_assist_firm_male = $row['dost_assist_firm_male'];
    $dost_assist_firm_female = $row['dost_assist_firm_female'];
    $nondost_assist_firm_male = $row['nondost_assist_firm_male'];
    $nondost_assist_firm_female = $row['nondost_assist_firm_female'];
    $cooperative_male = $row['coop_male'];
    $cooperative_female = $row['coop_female'];
    $startup_male = $row['startup_male'];
    $startup_female = $row['startup_female'];
    $individual_male = $row['individual_male'];
    $individual_female = $row['individual_female'];
    $academe_male = $row['academe_male'];
    $academe_female = $row['academe_female'];
    $government_male = $row['government_male'];
    $government_female = $row['government_female'];
    $no_pwd = $row['pwd_participants'];
    $no_sr = $row['sr_participants'];
    $no_ip = $row['ipe'];
    $user_id = $row["user_id"];
    $date_encoded = $row["date_encoded"];
    $date_updated = $row["date_updated"];

    // Now you have individual variables for each column of the fetched row
    // You can process these variables as needed
  }
} else {
  echo "0 results";
}

$conn->close();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Technological Training Details</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Technological Training Details</li>
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
        <h3 class="card-title">Technological Training Detail</h3>

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
              <div class="col-md-12">
                <label>Title:</label>
                <input type="text" class="form-control" value="<?= $training_title ?>" disabled>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label>Charging</label>
                <input type="text" class="form-control" value="<?php switch ($charging) {
                                                                  case 1:
                                                                    echo "Single Proprietorship";
                                                                    break;
                                                                  case 2:
                                                                    echo "Partnership";
                                                                    break;
                                                                  case 3:
                                                                    echo "Cooperative";
                                                                    break;
                                                                  case 4:
                                                                    echo "Corporation Profit";
                                                                    break;
                                                                  case 5:
                                                                    echo "Corporation Non-Profit";
                                                                    break;
                                                                  case 6:
                                                                    echo "Local Government Unit";
                                                                    break;
                                                                  default:
                                                                    break;
                                                                } ?>" disabled>
              </div>
              <div class="col-md-6">
                <label>Amount of Training</label>
                <input type="text" class="form-control" value="<?= $amount_training ?>" disabled>
              </div>
            </div>
            <div class="row">
              <div class="col-md-8">
                <label>Resource Speaker Name</label>
                <input type="text" class="form-control" value="<?= $fname ?> <?= $mname ?> <?= $lname ?>" disabled>

              </div>
              <div class="col-md-2">
                <label>Designation</label>
                <input type="text" class="form-control" value="<?= $designation ?>" disabled>
              </div>
              <div class="col-md-2">
                <label>Agency</label>
                <input type="text" class="form-control" value="<?= $agency ?>" disabled>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <label>Venue</label>
                <input type="text" class="form-control" value="<?= $venue ?>" disabled>
              </div>
              <div class="col-md-2">
                <label>No. of PWD</label>
                <input type="text" class="form-control" value="<?= $no_pwd ?>" disabled>
              </div>
              <div class="col-md-2">
                <label>No. of Senior</label>
                <input type="text" class="form-control" value="<?= $no_sr ?>" disabled>
              </div>
              <div class="col-md-2">
                <label>No. of Ipe</label>
                <input type="text" class="form-control" value="<?= $no_ip ?>" disabled>
              </div>
              <div class="col-md-2">
                <label>Date Conducted</label>
                <input type="text" class="form-control" value="<?= date_format(date_create($date_conducted), 'F j, Y') ?>" disabled>

              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-8">
                <figure class="highcharts-figure">
                  <div id="trainingMF"></div>
                </figure>
              </div>
              <div class="col-md-4">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>File</th>
                      <th>Size</th>
                      <th>Download</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
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
include 'template/charts.php';
include 'template/footer.php';
?>