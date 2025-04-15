<?php
$page = "consultancy_masterlist";
include 'template/header.php';
include '../../connection/connection.php';

// SQL query
$sql = "SELECT * FROM consultancies where consultancy_id = '" . $_GET['id'] . "'";

// Execute query
$result = $conn->query($sql);

// Check if any results were returned
if ($result->num_rows > 0) {
  // Fetch each row and assign column values to individual variables
  while ($row = $result->fetch_assoc()) {
    $consultancy_type = $row['consultancy_type'];
    $consultant_name = $row['consultant_name'];
    $consultancy_start = $row['consultancy_start'];
    $consultancy_end = $row['consultancy_end'];
    $consultancy_cost = $row['consultancy_cost'];
    $no_male = $row['no_male'];
    $no_female = $row['no_female'];
    $no_sr = $row['no_sr'];
    $no_ip = $row['no_ip'];
    $firm_name = $row['firm_name'];
    $proprietor = $row['proprietor'];
    $contact_no = $row['contact_no'];
    $gender = $row['gender'];
    $street = $row['street'];
    $province = $row['province'];
    $city_mun = $row['city_mun'];
    $barangay = $row['barangay'];
    $sector = $row['sector'];
    $prod_line = $row['prod_line'];
    $is_senior = $row['is_senior'];
    $is_pwd = $row['is_pwd'];
    $is_ip = $row['is_ip'];

    // Now you have individual variables for each column of the fetched row
    // You can process these variables as needed
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
          <h1>Consultancy</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Consultancy</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <form action="../backend/update_consultancy.php" method="get">
        <div class="card card-pink">
          <div class="card-header">
            <h3 class="card-title">Consultancy information</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <input type="text" class="form-control" name="consult_id" value="<?= $_GET['id'] ?>" hidden>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Type<span style=color:red>*</span></label>
                  <select class="form-control select2" name="consultancy_type" data-placeholder="Select Consultancy Type" style="width: 100%;" required>
                    <option value="">Please select type of consultancy</option>
                    <?php
                    include '../../connection/connection.php';
                    $sql = "SELECT * FROM psi_consultancy_types";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row["con_type_id"] . '"';
                        if ($consultancy_type = $row["con_type_id"]) {
                          echo 'selected';
                        }
                        echo '>' . $row["con_type_name"] . '</option>';
                      }
                    }
                    $conn->close();
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Consultant<span style=color:red>*</span></label>
                  <input type="text" name="consultant_name" value="<?= $consultant_name ?>" class="form-control" placeholder="Enter Consultant" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Consultancy start<span style=color:red>*</span></label>
                  <input type="date" name="duration_from" value="<?= $consultancy_start ?>" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Consultancy end</label>
                  <input type="date" name="duration_to" value="<?= $consultancy_end ?>" class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Amount <span style=color:red>*</span></label>
                  <input type="number" name="amount" min="0" value="<?= $consultancy_cost ?>" placeholder="Enter Amount" class="form-control">
                </div>
              </div>
            </div>
          </div>
        </div>



        <div class="card card-warning">
          <div class="card-header">
            <h3 class="card-title">Consultancy Demographics</h3>
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
                  <label>No. of Males</label>
                  <input type="number" name="male" min="0" value="<?= $no_male ?>" class="form-control" placeholder="Enter number of males">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>No. of Females</label>
                  <input type="number" name="female" min="0" value="<?= $no_female ?>" class="form-control" placeholder="Enter number of females">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>No. of Senior Citizen</label>
                  <input type="number" name="sr" min="0" value="<?= $no_sr ?>" class="form-control" placeholder="Enter number of senior citizen">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>No. of IPe</label>
                  <input type="number" name="ip" min="0" value="<?= $no_ip ?>" class="form-control" placeholder="Enter number of IP">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">Beneficiaries</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="form-group">
              <div class="row">
                <div class="col-md-5">
                  <label>Firm Name</label>
                  <input type="text" class="form-control" value="<?= $firm_name ?>" placeholder="Enter Firm Name" name="firm_name">
                </div>
                <div class="col-md-4">
                  <label>Proprietor</label>
                  <input type="text" class="form-control" value="<?= $proprietor ?>" name="proprietor" placeholder="Enter Proprietor">
                </div>
                <div class="col-md-3">
                  <label>Contact No.</label>
                  <input type="number" class="form-control" value="<?= $contact_no ?>" name="contact_no" placeholder="Enter Contact no.">
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <label>Sex</label>
                  <select name="sex" id="sex" class="form-control">
                    <option value="">Select Sex</option>
                    <option value="M" <?php if($gender=='M'){echo 'selected';}; ?>>Male</option>
                    <option value="F" <?php if($gender=='F'){echo 'selected';}; ?>>Female</option>
                  </select>
                </div>
                <div class="col-md-3">
                  <label>Province</label>
                  <select class="form-control select2" name="province" id="province" data-placeholder="Select Province" style="width: 100%;" onchange="showCityMun(this.value)" required>
                                <option value="000">REGIONWIDE</option>
                                <?php
                                include '../../connection/connection.php';
                                $sql = "SELECT * FROM province where region_c = 17 ORDER by province_m ASC";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row2 = $result->fetch_assoc()) {
                                        echo '<option value="' . $row2["province_c"] . '"';
                                        if($province==$row2["province_c"]){echo 'Selected';}
                                        echo '>' . $row2["province_m"] . '</option>';
                                    }
                                }
                                $conn->close();
                                ?>
                            </select>
                </div>
                <div class="col-md-3">
                  <label>Municipality</label>
                  <select class="form-control" name="city_mun" id="city_mun" data-placeholder="Select City/Municipality" style="width: 100%;">
            <option value="">Select City/Municipality</option>
            <?php
                include '../../connection/connection.php';

                $sql = "Select citymun_c, citymun_m from citymun where region_c = '17' and province_c = '".$province."'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while($row3 = mysqli_fetch_assoc($result)) {
                        echo '<option class="form-control" value="'.$row3["citymun_c"].'"';
                        if($city_mun==$row3["citymun_c"]){echo 'Selected';}
                        echo '>'.$row3["citymun_m"].'</option>';
                    }
                }
            ?> 
            </select>
                </div>
                <div class="col-md-3">
                  <label>Barangay</label>
                  <input type="text" name="barangay" id="barangay" placeholder="Enter Barangay" class="form-control" value="<?= $barangay ?>">
                  </select>
                </div>
              </div>
              <div class="row">
              <div class="col-md-12">
                  <label>Street Address</label>
                  <input type="text" class="form-control" name="street" id="street" placeholder="Enter Street Address" value="<?= $street ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <label>Product Line</label>
                  <input type="text" class="form-control" value="<?= $prod_line ?>" name="prod_line" placeholder="Enter Product Line">
                </div>
                <div class="col-md-3">
                  <label>Sector</label>
                  <input type="text" class="form-control" value="<?= $sector ?>" name="sector" placeholder="Enter Sector">
                </div>
                <div class="col-sm-6">
                  <br><br>
                  <div class="form-group clearfix">
                    <div class="icheck-danger d-inline">
                    <input type="checkbox" id="checkboxDanger1" name="senior" value="1" <?php if($is_senior == '1'){ echo 'checked'; } ?>>
                      <label for="checkboxDanger1">
                        Senior
                      </label>
                    </div>
                    <div class="icheck-danger d-inline">
                    <input type="checkbox" id="checkboxDanger2" name="pwd" value="1" <?php if($is_pwd == '1'){ echo 'checked'; } ?>>
                      <label for="checkboxDanger2">
                        PWD
                      </label>
                    </div>
                    <div class="icheck-danger d-inline">
                    <input type="checkbox" id="checkboxDanger3" name="ips" value="1" <?php if($is_ip == '1'){ echo 'checked'; } ?>>
                      <label for="checkboxDanger3">
                        IP
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div style="text-align: center">
          <button type="submit" class="btn btn-primary btn-lg">Update Consultancy</button>
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