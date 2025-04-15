<?php
$page = "add_consultancy";
include 'template/header.php';
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
      <form action="../backend/add_consultancy.php" method="get">
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
                        echo '<option value="' . $row["con_type_id"] . '">' . $row["con_type_name"] . '</option>';
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
                  <input type="text" name="consultant_name" class="form-control" placeholder="Enter Consultant" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Consultancy start<span style=color:red>*</span></label>
                  <input type="date" name="duration_from" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Consultancy end</label>
                  <input type="date" name="duration_to" class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Amount <span style=color:red>*</span></label>
                  <input type="number" name="amount" min="0" placeholder="Enter Amount" class="form-control">
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
                  <input type="number" name="male" min="0" class="form-control" placeholder="Enter number of males">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>No. of Females</label>
                  <input type="number" name="female" min="0" class="form-control" placeholder="Enter number of females">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>No. of Senior Citizen</label>
                  <input type="number" name="sr" min="0" class="form-control" placeholder="Enter number of senior citizen">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>No. of IPs</label>
                  <input type="number" name="ip" min="0" class="form-control" placeholder="Enter number of IP">
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
                  <input type="text" class="form-control" placeholder="Enter Firm Name" name="firm_name">
                </div>
                <div class="col-md-4">
                  <label>Proprietor</label>
                  <input type="text" class="form-control" name="proprietor" placeholder="Enter Proprietor">
                </div>
                <div class="col-md-3">
                  <label>Contact No.</label>
                  <input type="text" class="form-control" name="contact_no" placeholder="Enter Contact no.">
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <label>Sex</label>
                  <select name="sex" id="sex" class="form-control">
                    <option value="">Select Sex</option>
                    <option value="M">Female</option>
                    <option value="F">Male</option>
                  </select>
                </div>
                <div class="col-md-3">
                  <label>Province</label>
                  <select class="form-control select2" name="province" id="province" data-placeholder="Select Province" style="width: 100%;" onchange="showCityMun(this.value)" required>
                                        <option value="">Select Province</option>
                                        <option value="000">REGIONWIDE</option>
                                        <?php
                                        include '../../connection/connection.php';
                                        $sql = "SELECT * FROM province where region_c = 17 ORDER by province_m ASC";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<option value="' . $row["province_c"] . '">' . $row["province_m"] . '</option>';
                                            }
                                        }
                                        $conn->close();
                                        ?>
                                        
                                    </select>
                </div>
                <div class="col-md-3">
                  <label>Municipality</label>
                  <select name="city_mun" id="city_mun" class="form-control">
                    <option value="">Select Municipality</option>
                </select>
                </div>
                <div class="col-md-3">
                  <label>Barangay</label>
                  <input type="text" name="barangay" id="barangay" placeholder="Enter Barangay" class="form-control">
                  </select>
                </div>
              </div>
              <div class="row">
              <div class="col-md-12">
                  <label>Street Address</label>
                  <input type="text" class="form-control" name="street" id="street" placeholder="Enter Street Address">
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <label>Product Line</label>
                  <input type="text" class="form-control" name="prod_line" placeholder="Enter Product Line">
                </div>
                <div class="col-md-3">
                  <label>Sector</label>
                  <input type="text" class="form-control" name="sector" placeholder="Enter Sector">
                </div>
                <div class="col-sm-6">
                  <br><br>
                  <div class="form-group clearfix">
                    <div class="icheck-danger d-inline">
                    <input type="checkbox" id="checkboxDanger1" name="senior" value="1">
                      <label for="checkboxDanger1">
                        Senior
                      </label>
                    </div>
                    <div class="icheck-danger d-inline">
                    <input type="checkbox" id="checkboxDanger2" name="pwd" value="1">
                      <label for="checkboxDanger2">
                        PWD
                      </label>
                    </div>
                    <div class="icheck-danger d-inline">
                    <input type="checkbox" id="checkboxDanger3" name="ip" value="1">
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
          <button type="submit" class="btn btn-primary btn-lg">Submit Consultancy</button>
        </div><br /><br /><br />
      </form>
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    function showCityMun(province_c){
        if(province_c =="000"){
            $("#city_mun").html("<option value=''>Select City/Municipality</option>"); 
            $("#barangay").val("N/A");
        }else{
        
        $.ajax({
          type: "GET",
          url: "../backend/get_citymun.php",
          cache: false,
          data: {province_c},
          success: function(data){
            $("#city_mun").html(data); 
          }
        });
      }
    }

</script>
<?php
include 'template/footer.php';
?>
