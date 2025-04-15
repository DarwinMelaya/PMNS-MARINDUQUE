<?php
$page = "setup_masterlist";
include 'template/header.php';
if ($_SESSION['id'] == "") header("Location:../../../");

$sql = "SELECT * from projects where project_id = '" . $_GET['id'] . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch each row and store its data into separate variables
    while ($row = $result->fetch_assoc()) {
        $project_email = $row['proj_email'];
        $project_id = $row['project_id'];
        $project_code = $row['project_code'];
        $tag = $row['tag'];
        $proj_title = $row['project_title'];
        $project_desc = $row['project_desc'];
        $typeorg = $row['typeorg'];
        $bene = $row['beneficiaries'];
        $collab = $row['collaborating_agencies'];
        $implementor = $row['implementor'];
        //$total_project_cost = $row['total_project_cost'];
        //$amount_assist = $row['amount_assist'];
        $counterpar_fund = $row['counterpart_fund'];
        $date_fund_rel = $row['date_released'];
        $personal_service = $row['personal_service'];
        $maintenance_other = $row['maintenance_other'];
        $equip_outlay = $row['equip_outlay'];
        $modepro = $row['modepro'];
        $counterpart_desc = $row['counterpart_desc'];
        $street = $row['street'];
        //$district = $row['district'];
        $province = $row['province'];
        $city_mun = $row['city_mun'];
        $brgy = $row['barangay'];
        $fname = $row['project_fname'];
        $mname = $row['project_mname'];
        $lname = $row['project_lname'];
        $sex = $row['project_sex'];
        $age = $row['project_age'];
        $liquidated = $row['liquidated'];
        $date_approved = $row['date_approved'];
    }
}
$conn->close();
?>
<style>
    .hidden {
        display: none;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add SETUP Project</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Project</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <form action="../backend/update_setup.php" method="POST">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Company Details</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <input type="text" name="project_id" value="<?= $_GET['id'] ?>" hidden>
                    <input type="number" name="project_type" id="project_type" value="2" hidden>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label>Project Code <span style="color:red;">*</span></label>
                                    <input class="form-control" name="project_code" value="<?= $project_code ?>" type="text" placeholder="Enter Project Code" style="width: 100%;" required>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Project Tag</label>
                                    <input type="text" name="tag" value="<?= $tag ?>" placeholder="Enter Tag" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Project Title<span style="color:red;">*</span></label>
                                    <input class="form-control" name="project_title" value="<?= $proj_title ?>" type="text" placeholder="Enter Project Title" style="width: 100%;" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Project Description</label>
                                    <textarea class="form-control" name="project_desc" rows="3" placeholder="Enter Project Description (300 max characters)" maxlength="300" style="width: 100%;"><?= $project_desc ?></textarea>
                                </div>
                                <!-- /.form-group -->
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Type of Organization</label>
                                    <select name="typeorg" id="typeorg" class="form-control">
                                        <option value="">Select type of organization</option>
                                        <option value="1" <?php if ($typeorg == 1) {
                                                                echo 'selected';
                                                            } ?>>Single Proprietorship</option>
                                        <option value="2" <?php if ($typeorg == 2) {
                                                                echo 'selected';
                                                            } ?>>Partnership</option>
                                        <option value="3" <?php if ($typeorg == 3) {
                                                                echo 'selected';
                                                            } ?>>Cooperative</option>
                                        <option value="4" <?php if ($typeorg == 4) {
                                                                echo 'selected';
                                                            } ?>>Corporation Profit</option>
                                        <option value="5" <?php if ($typeorg == 5) {
                                                                echo 'selected';
                                                            } ?>>Corporation Non-Profit</option>
                                        <option value="6" <?php if ($typeorg == 6) {
                                                                echo 'selected';
                                                            } ?>>LGU</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Beneficiaries</label>
                                    <input type="text" class="form-control" name="beneficiaries" placeholder="Enter Beneficiaries" value="<?php echo $bene; ?>">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Collaborating Agencies</label>
                                    <input type="text" class="form-control" name="collaborating_agencies" placeholder="Enter collaborating agencies" value="<?php echo $collab; ?>">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>No. of Implementor</label>
                                    <input type="number" class="form-control" min="0" name="implementor" placeholder="Enter No. of Implementor" value="<?php echo $implementor; ?>">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                </div>
                <div class="card card-blue">
                    <div class="card-header">
                        <h3 class="card-title">Financial Funding</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Personal Services</label>
                                    <input type="number" id="ps" name="ps" max="99999999" step="0.01" min="0" class="form-control" placeholder="0.00" value="<?php echo $personal_service; ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Maintenance and Other Expenses</label>
                                    <input type="number" id="moe" name="moe" max="99999999" step="0.01" min="0" class="form-control" placeholder="0.00" value="<?php echo $maintenance_other; ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Equipment Outlay</label>
                                    <input type="number" id="eo" name="eo" max="99999999" step="0.01" min="0" class="form-control" placeholder="0.00" value="<?php echo $equip_outlay; ?>">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Counterpart Funding</label>
                                    <input type="number" id="cpf" max="99999999" step="0.01" min="0" name="cpf" class="form-control" placeholder="0.00" value="<?php echo $counterpar_fund; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Equipment Outlay Details <span style="color:red">*</span></label>
                                    <textarea name="eo_details" id="eo_details" rows="3" class="form-control" placeholder="Enter Equipment Outlay Details" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Counterpart Description</label>
                                    <textarea name="counterdesc" id="counterdesc" rows="3" class="form-control" placeholder="Enter counterpart Description"><?php echo $counterpart_desc; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mode of Procurement</label>
                                    <select name="modepro" id="modepro" class="form-control">
                                        <option value="">Select mode</option>
                                        <option value="1" <?php if ($modepro == 1) {
                                                                echo 'selected';
                                                            }; ?>>Direct Release</option>
                                        <option value="2" <?php if ($modepro == 2) {
                                                                echo 'selected';
                                                            }; ?>>Regional Office Procurement</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date Fund Released</span></label>
                                    <input type="date" name="date_released" class="form-control" value="<?php echo $date_fund_rel; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Project Location</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Province <span style="color:red;">*</span></label></label>
                                    <select class="form-control select2" name="province" id="province" data-placeholder="Select Province" style="width: 100%;" onchange="showCityMun(this.value)" required>
                                        <option value="000">REGIONWIDE</option>
                                        <?php
                                        include '../../connection/connection.php';
                                        $sql = "SELECT * FROM province where region_c = 17 ORDER by province_m ASC";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row2 = $result->fetch_assoc()) {
                                                echo '<option value="' . $row2["province_c"] . '"';
                                                if ($province == $row2["province_c"]) {
                                                    echo 'Selected';
                                                }
                                                echo '>' . $row2["province_m"] . '</option>';
                                            }
                                        }
                                        $conn->close();
                                        ?>
                                    </select>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Municipality / City</label>
                                    <select class="form-control" name="city_mun" id="city_mun" data-placeholder="Select City/Municipality" style="width: 100%;">
                                        <option value="">Select City/Municipality</option>
                                        <?php
                                        include '../../connection/connection.php';

                                        $sql = "Select citymun_c, citymun_m from citymun where region_c = '17' and province_c = '" . $province . "'";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row3 = mysqli_fetch_assoc($result)) {
                                                echo '<option class="form-control" value="' . $row3["citymun_c"] . '"';
                                                if ($city_mun == $row3["citymun_c"]) {
                                                    echo 'Selected';
                                                }
                                                echo '>' . $row3["citymun_m"] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Barangay</label>
                                    <input type="text" class="form-control" id="barangay" name="barangay" placeholder="Select Barangay" value="<?php echo $brgy; ?>">

                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Street Address</label>
                                    <input class="form-control" name="street" type="text" placeholder="Enter Street Address" style="width: 100%;" value="<?php echo $street; ?>">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <input type="text" id="project_type" hidden value="2">
                        </div>
                    </div>
                    <!-- /.row -->

                </div>
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">
                            Beneficiary Profile
                        </h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>First name</label>
                                    <input type="text" value="<?= $fname ?>" name="fname" class="form-control" placeholder="Enter first name">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Middle name</label>
                                    <input type="text" value="<?= $mname ?>" name="mname" class="form-control" placeholder="Enter middle/initial name">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Last name</label>
                                    <input type="text" value="<?= $lname ?>" name="lname" class="form-control" placeholder="Enter last name">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Sex</label>
                                    <select name="setgender" id="setgender" class="form-control">
                                        <option value="">Select Gender</option>
                                        <option value="1" <?php if ($sex == 1) {
                                                                echo "selected";
                                                            } ?>>Male</option>
                                        <option value="2" <?php if ($sex == 2) {
                                                                echo "selected";
                                                            } ?>>Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Age</label>
                                    <input type="number" value="<?= $age ?>" name="age" min="0" class="form-control" placeholder="Enter age">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Liquidated</label>
                                    <input type="number" value="<?= $liquidated ?>" min="0" name="liquidated" placeholder="Enter Liquidated" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Date Approved</label>
                                    <input value="<?= $date_approved ?>" type="date" name="date_approved" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" class="form-control" name="proj_email" value="<?= $project_email ?>" placeholder="Enter Email Address">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="text-align: center">
                    <button type="submit" class="btn btn-primary btn-lg">Update Project</button>
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