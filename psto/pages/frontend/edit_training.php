<?php
$page = "training_masterlist";
include 'template/header.php';
include '../../connection/connection.php';

// SQL query
$sql = "SELECT * FROM trainings where training_id = '" . $_GET['id'] . "'";

// Execute query
$result = $conn->query($sql);

// Check if any results were returned
if ($result->num_rows > 0) {
  // Fetch each row and assign column values to individual variables
  while ($row = $result->fetch_assoc()) {
    $training_title = $row['training_title'];
    $charging_program = $row['charging_program'];
    $charge_remark = $row['charge_remark'];
    $tag = $row['tag'];
    $amount_training = $row['amount_training'];
    $resource_fname = $row['resource_fname'];
    $resource_mname = $row['resource_mname'];
    $resource_lname = $row['resource_lname'];
    $resource_designation = $row['resource_designation'];
    $resource_agency = $row['resource_agency'];
    $dateconducted = $row['dateconducted'];
    $resource_venue = $row['resource_venue'];
    $training_type = $row['training_type'];
    $training_desc = $row['training_desc'];
    $requesting_party = $row['requesting_party'];
    $cooperator = $row['cooperator'];
    $service_provider = $row['service_provider'];
    $sectors = $row['sectors'];
    $start_date = $row['start_date'];
    $end_date = $row['end_date'];
    $training_cost = $row['training_cost'];
    $overall_csf = $row['overall_csf'];
    $implementor = $row['implementor'];
    $remarks = $row['remarks'];
    $participant_name = $row['participant_name'];
    $participant_address = $row['participant_address'];
    $pwd_participants = $row['pwd_participants'];
    $sr_participants = $row['sr_participants'];
    $dost_assist_firm_male = $row['dost_assist_firm_male'];
    $dost_assist_firm_female = $row['dost_assist_firm_female'];
    $nondost_assist_firm_male = $row['nondost_assist_firm_male'];
    $nondost_assist_firm_female = $row['nondost_assist_firm_female'];
    $coop_male = $row['coop_male'];
    $coop_female = $row['coop_female'];
    $startup_male = $row['startup_male'];
    $startup_female = $row['startup_female'];
    $individual_male = $row['individual_male'];
    $individual_female = $row['individual_female'];
    $academe_male = $row['academe_male'];
    $academe_female = $row['academe_female'];
    $government_male = $row['government_male'];
    $government_female = $row['government_female'];
    $ipe = $row['ipe'];
    $street = $row['street'];
    $province = $row['province'];
    $city_mun = $row['city_mun'];
    $barangay = $row['barangay'];
  }
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
          <h1>Technology Training</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Technology Training</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <form action="../backend/add_training.php" method="get">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Technology Training Profile</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <!--  <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button> -->
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Title *</label>
                  <input class="form-control" name="training_title" value="<?= $training_title ?>" type="text" placeholder="Enter Technology Training Title" style="width: 100%;" required>
                </div>
                <!-- /.form-group -->
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Charging</label>
                  <select name="charging_program" id="charging_program" class="form-control">
                    <option value="">Select charging</option>
                    <option value="1" <?php if ($charging_program) {
                                        echo 'selected';
                                      } ?>>TAIS</option>
                    <option value="2" <?php if ($charging_program) {
                                        echo 'selected';
                                      } ?>>GIA</option>
                    <option value="3" <?php if ($charging_program) {
                                        echo 'selected';
                                      } ?>>CEST</option>
                    <option value="4" <?php if ($charging_program) {
                                        echo 'selected';
                                      } ?>>SSCP</option>
                    <option value="5" <?php if ($charging_program) {
                                        echo 'selected';
                                      } ?>>Others</option>
                  </select>
                </div>
                <!-- /.form-group -->
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Remarks</label>
                  <textarea name="charge_remarks" id="charge_remarks" vaclass="form-control" disabled><?= $charge_remark ?></textarea>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Amount of Training</label>
                  <input type="number" name="amount_training" value="<?= $amount_training ?>" min="0" class="form-control">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">Resource Speaker</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <!--  <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button> -->
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>First Name</label>
                  <input type="text" placeholder="Enter first name" name="resource_fname" value="<?= $resource_fname ?>" class="form-control">
                </div>
                <!-- /.form-group -->
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Middle Name/initial</label>
                  <input type="text" placeholder="Enter middle name/initial" name="resource_mname" value="<?= $resource_mname ?>" class="form-control">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Last name</label>
                  <input type="text" placeholder="Enter last name" name="resource_lname" value="<?= $resource_lname ?>" class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Designation/Position</label>
                  <input type="text" class="form-control" name="resource_designation" value="<?= $resource_designation ?>" placeholder="Enter designation">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Agency</label>
                  <input type="text" class="form-control" placeholder="Enter agency" value="<?= $resource_agency ?>" name="resource_agency">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Date Conducted</label>
                  <input type="date" class="form-control" value="<?= $dateconducted ?>" name="dateconducted">
                </div>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <label>Venue</label>
                  <input type="text" class="form-control" name="resource_venue" value="<?= $resource_venue ?>" placeholder="Enter venue">
                </div>
              </div>
            </div>
          </div>
          <!-- /.row -->
        </div>
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Participants</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Complete name</label>
                  <input type="text" class="form-control" value="<?= $participant_name ?>" name="participant_name" placeholder="Enter complete name">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" class="form-control" value="<?= $participant_address ?>" name="participant_address" placeholder="Enter address">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card card-warning">
          <div class="card-header">
            <h3 class="card-title">Technology Training Demographics</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>DOST-Assisted Firms</label>
                  <div class="col-md-12">
                    <label>Male</label>
                    <input type="number" name="dost_assist_firm_male" value="<?= $dost_assist_firm_male ?>" min="0" class="form-control" placeholder="Enter male">
                  </div>
                  <div class="col-md-12">
                    <label>Female</label>
                    <input type="number" name="dost_assist_firm_female" value="<?= $dost_assist_firm_female ?>" class="form-control" min="0" placeholder="Enter female">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Non-DOST-Assisted Firms</label>
                  <div class="col-md-12">
                    <label>Male</label>
                    <input type="number" min="0" name="nondost_assist_firm_male" value="<?= $nondost_assist_firm_male ?>" placeholder="Enter male" class="form-control">
                  </div>
                  <div class="col-md-12">
                    <label>Female</label>
                    <input type="number" min="0" name="nondost_assist_firm_female" value="<?= $nondost_assist_firm_female ?>" placeholder="Enter female" class="form-control">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>CBEs/Cooperatives</label>
                  <div class="col-md-12">
                    <label>Male</label>
                    <input type="number" min="0" name="coop_male" value="<?= $coop_male ?>" placeholder="Enter male" class="form-control">
                  </div>
                  <div class="col-md-12">
                    <label>Female</label>
                    <input type="number" min="0" name="coop_female" value="<?= $coop_female ?>" placeholder="Enter female" class="form-control">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Startups</label>
                  <div class="col-md-12">
                    <label>Male</label>
                    <input type="number" min="0" name="startup_male" value="<?= $startup_male ?>" placeholder="Enter male" class="form-control">
                  </div>
                  <div class="col-md-12">
                    <label>Female</label>
                    <input type="number" min="0" name="startup_female" value="<?= $startup_female ?>" placeholder="Enter female" class="form-control">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Individuals</label>
                  <div class="col-md-12">
                    <label>Male</label>
                    <input type="number" min="0" name="individual_male" value="<?= $individual_male ?>" placeholder="Enter male" class="form-control">
                  </div>
                  <div class="col-md-12">
                    <label>Female</label>
                    <input type="number" min="0" name="individual_female" value="<?= $individual_female ?>" placeholder="Enter female" class="form-control">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Academe</label>
                  <div class="col-md-12">
                    <label>Male</label>
                    <input type="number" min="0" name="academe_male" value="<?= $academe_male ?>" placeholder="Enter male" class="form-control">
                  </div>
                  <div class="col-md-12">
                    <label>Female</label>
                    <input type="number" min="0" name="academe_female" value="<?= $academe_female ?>" placeholder="Enter female" class="form-control">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <p class="text-center"><label>Government</label></p>
                  <div class="row">
                    <div class="col-md-6">
                      <label>Male</label>
                      <input type="number" min="0" name="government_male" value="<?= $government_male ?>" placeholder="Enter male" class="form-control">
                    </div>
                    <div class="col-md-6">
                      <label>Female</label>
                      <input type="number" min="0" name="government_female" value="<?= $government_female ?>" placeholder="Enter female" class="form-control">
                    </div>
                  </div>

                </div>
              </div>

            </div>
            <div class="row">
              <div class="col-md-4">
                <label>PWD</label>
                <input type="number" min="0" name="pwd_participants" value="<?= $pwd_participants ?>" placeholder="Enter no. of PWD" class="form-control">
              </div>
              <div class="col-md-4">
                <label>Senior Citizen</label>
                <input type="number" min="0" name="sr_participants" value="<?= $sr_participants ?>" placeholder="Enter no. of Senior" class="form-control">
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>No. of IPe</label>
                  <input type="number" min="0" name="ipe" value="<?= $ipe ?>" placeholder="Enter no. of IPe" class="form-control">
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->

        <div style="text-align: center">
          <button type="submit" class="btn btn-primary btn-lg">Submit Training</button>
        </div><br /><br /><br />
      </form>
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'template/footer.php';
?>