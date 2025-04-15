<?php
$page = "setup_masterlist";
include 'template/header.php';
if ($_SESSION['id'] == "") header("Location:../../../");

$sql = "SELECT * from projects where project_id = '" . $_GET['id'] . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch each row and store its data into separate variables
    while ($row = $result->fetch_assoc()) {
        $project_id = $row['project_id'];
        $project_code = $row['project_code'];
        $tag = $row['tag'];
        $proj_title = $row['project_title'];
        $project_desc = $row['project_desc'];
        $typeorg = $row['typeorg'];
        $bene = $row['beneficiaries'];
        $collab = $row['collaborating_agencies'];
        $total_project_cost = $row['total_project_cost'];
        $amount_assist = $row['amount_assist'];
        $counterpar_fund = $row['counterpart_fund'];
        $date_fund_rel = $row['date_fund_rel'];
        $personal_service = $row['personal_service'];
        $maintenance_other = $row['maintenance_other'];
        $equip_outlay = $row['equip_outlay'];
        $modepro = $row['modepro'];
        $counterpart_desc = $row['counterpart_desc'];
        $street = $row['street'];
        $district = $row['district'];
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
            <form action="../backend/edit_setupproj.php" method="get">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Company Details</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <input type="number" name="project_type" id="project_type" value="2" hidden>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label>Project Code</label>
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
                                    <label>Project Title</label>
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
                                    <select class="select2" name="beneficiaries" multiple="multiple" data-placeholder="Select Beneficiaries" style="width: 100%;">
                                        <option value="">Please select beneficiaries</option>
                                        <?php
                                        include '../../../cms/connection/connection.php';
                                        $sql = "SELECT * FROM psi_cooperators";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<option value="' . $row["coop_id"] . '"';
                                                if ($bene == $row['coop_id']) {
                                                    echo 'selected';
                                                }
                                                echo '>' . $row["coop_name"] . '</option>';
                                            }
                                        }
                                        $conn->close();
                                        ?>
                                    </select>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Collaborating Agencies</label>
                                    <select class="select2" name="collaborating_agencies" multiple="multiple" data-placeholder="Select Collaborating Agencies" style="width: 100%;">
                                        <option value="">Please select
                                            <?php
                                            include '../../../cms/connection/connection.php';
                                            $sql = "SELECT * FROM psi_collaborators";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo '<option value="' . $row["col_id"] . '"';
                                                    if ($collab == $row['col_id']) {
                                                        echo 'selected';
                                                    }
                                                    echo '>' . $row["col_name"] . '</option>';
                                                }
                                            }
                                            $conn->close();
                                            ?>
                                    </select>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>No. of Implementor</label>
                                    <select class="form-control select2" name="implementor" style="width: 100%;" data-placeholder="Select Implementor" required>
                                        <option value="">Select Implementor</option>
                                        <?php
                                        include '../../../cms/connection/connection.php';
                                        $sql = "SELECT * FROM psi_implementors";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<option value="' . $row["implementor_id"] . '">' . $row["implementor_name"] . '</option>';
                                            }
                                        }
                                        $conn->close();
                                        ?>
                                    </select>
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Total Project Cost <span style="color:red; font-size:10px;">(Note: to update the value change the value of counterpart funding)</span></label>
                                    <input type="number" id="totalprojcost" value="<?= $total_project_cost ?>" name="totalprojcost" class="form-control" placeholder="0" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Amount of Assistance</label>
                                    <input type="number" id="aoa" min="0" name="aoa" value="<?= $amount_assist ?>" class="form-control" onchange="addnum()" placeholder="0" disabled>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Counterpart Funding</label>
                                    <input type="number" id="cpf" min="0" name="cpf" value="<?= $counterpar_fund ?>" class="form-control" placeholder="0" onchange="addnum()">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Date Fund Released</label>
                                    <input type="date" class="form-control" name="date_fund_rel" value="<?= $date_fund_rel ?>" id="date_fund_rel">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Personal Services</label>
                                    <input type="number" id="ps" name="ps" min="0" value="<?= $personal_service ?>" class="form-control" placeholder="0" onchange="amtofassist()">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Maintenance and Other Expenses</label>
                                    <input type="number" id="moe" name="moe" min="0" value="<?= $maintenance_other ?>" class="form-control" placeholder="0" onchange="amtofassist()">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Equipment Outlay</label>
                                    <input type="number" id="eo" name="eo" min="0" value="<?= $equip_outlay ?>" class="form-control" placeholder="0" onchange="amtofassist()">
                                </div>
                            </div>


                            <script>
                                function amtofassist() {
                                    var ps = parseFloat($("#ps").val());
                                    var moe = parseFloat($("#moe").val());
                                    var eo = parseFloat($("#eo").val());
                                    var sum = ps + moe + eo;
                                    $("#aoa").val(sum);
                                }

                                function addnum() {
                                    var AoA = parseFloat($("#aoa").val());
                                    var cpf = parseFloat($("#cpf").val());
                                    var sum = AoA + cpf;
                                    $("#totalprojcost").val(sum);

                                }
                            </script>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Mode of Procurement</label>
                                    <select name="modepro" id="modepro" class="form-control">
                                        <option value="">Select mode</option>
                                        <option value="1" <?php if ($modepro == 1) {
                                                                echo 'selected';
                                                            } ?>>Direct Release</option>
                                        <option value="2" <?php if ($modepro == 1) {
                                                                echo 'selected';
                                                            } ?>>Regional Office Procurement</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Counterpart Description</label>
                                    <textarea name="counterdesc" id="counterdesc" rows="3" class="form-control" placeholder="Enter counterpart Description"><?= $counterpart_desc ?></textarea>
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Street Address</label>
                                    <input class="form-control" value="<?= $street ?>" name="street" type="text" placeholder="Enter Street Address" style="width: 100%;">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <input type="text" id="project_type" hidden value="2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>District</label>
                                    <select name="district_id" id="district_id" class="form-control select2" data-placeholder="Enter District" style="width: 100%;">
                                        <option value="">Select District</option>
                                        <?php
                                        include '../../../cms/connection/connection.php';
                                        $sql = "SELECT * FROM psi_districts";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<option value="' . $row["district_id"] . '"';
                                                if ($district == $row['district_id']) {
                                                    echo 'selected';
                                                }
                                                echo '>' . $row["district_name"] . '</option>';
                                            }
                                        }
                                        $conn->close()
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Province</label>
                                    <select class="form-control select2" name="province" id="province" data-placeholder="Select Province" style="width: 100%;" required>
                                        <option value="">Select Province</option>
                                        <?php
                                        include '../../../cms/connection/connection.php';
                                        $sql = "SELECT * FROM province where region_c = 17 ORDER by province_m ASC";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<option value="' . $row["province_id"] . '"';
                                                if ($province == $row['province_id']) {
                                                    echo 'selected';
                                                }
                                                echo '>' . $row["province_m"] . '</option>';
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
                                    <select class="form-control select2" name="city_mun" id="city_mun" data-placeholder="Select City/Municipality" style="width: 100%;">
                                        <option value="">Select City/Municipality</option>
                                        <?php
                                        include '../../../cms/connection/connection.php';
                                        $sql1 = "SELECT * FROM citymun where region_c = 17 and province_c = $province";
                                        $result = $conn->query($sql1);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<option value="' . $row["citymun_c"] . '"';
                                                if ($city_mun == $row['citymun_id']) {
                                                    echo 'selected';
                                                }
                                                echo '>' . $row["citymun_m"] . '</option>';
                                            }
                                        }
                                        $conn->close(); ?>
                                    </select>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Barangay</label>
                                    <select class="form-control select2" id="barangay" name="barangay" data-placeholder="Select Barangay" style="width: 100%;">
                                        <option value="">Select Barangay</option>
                                        <?php
                                        include '../../../cms/connection/connection.php';
                                        $sql = "SELECT * FROM barangays where city_id = $city_mun";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<option value="' . $row["barangay_id"] . '"';
                                                if ($brgy == $row['barangay_id']) {
                                                    echo 'selected';
                                                }
                                                echo '>' . $row["barangay_name"] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
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
                                    <input type="number" value="<?= $age ?>" name="age" min="1" class="form-control" placeholder="Enter age">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Liquidated</label>
                                    <input type="number" value="<?= $liquidated ?>" min="0" name="liquidated" placeholder="Enter Liquidated" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date Approved</label>
                                    <input value="<?= $date_approved ?>" type="date" name="date_approved" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="text-align: center">
                    <button type="submit" class="btn btn-primary btn-lg">Submit Project</button>
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