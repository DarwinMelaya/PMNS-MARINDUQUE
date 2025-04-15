<?php
$page = "cest_masterlist";
include 'template/header.php';
$sql = "SELECT * from projects where project_id = '" . $_GET['id'] . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch each row and store its data into separate variables
    while ($row = $result->fetch_assoc()) {
        $project_id = $row['project_id'];
        $proj_code = $row['project_code'];
        $project_title = $row['project_title'];
        $province = $row['province'];
        $city_mun = $row['city_mun'];
        $barangay = $row['barangay'];
        $district = $row['district'];
        $street = $row['street'];
        $date_approved = $row['date_approved'];
        $project_desc = $row['project_desc'];
        $duration_from = $row['duration_from'];
        $duration_to = $row['duration_to'];
        $proponent = $row['proponent'];
        $personal_service = $row['personal_service'];
        $maintenance_other = $row['maintenance_other'];
        $equip_outlay = $row['equip_outlay'];
        $modepro = $row['modepro'];
        $amount_assist = $row['amount_assist'];
        $counterpart_desc = $row['counterpart_desc'];
        $date_fund_rel = $row['date_fund_rel'];
        $total_project_cost = $row['total_project_cost'];
        $counterpart_desc = $row['counterpart_desc'];
        $beneficiaries = $row['beneficiaries'];
        $type_of_beneficiaries = $row['type_of_beneficiaries'];
        $no_household = $row['no_household'];
        $no_individual = $row['no_individual'];
        $project_entry_point = $row['project_entry_point'];
    }
}
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
                    <h1>Add CEST Project</h1>
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
            <form action="../backend/edit_cest.php" method="get">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">CEST Profile</h3>
                        <div class="card-3tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <input type="number" name="project_type" id="project_type" value="3" hidden>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Project Code <span style="color:red">*</span></label>
                                    <input tye="text" name="project_code" value="<?= $proj_code ?>" class="form-control" placeholder="Enter Project Code" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Project Title <span style="color:red">*</span></label>
                                    <input type="text" name="project_title" value="<?= $project_title ?>" class="form-control" placeholder="Enter Project Title" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Province</label>
                                    <select name="province" id="province" data-placeholder="Enter Province" class="form-control">
                                        <option value="">Select Province</option>
                                        <?php
                                        include '../../../cms/connection/connection.php';
                                        $sql = "SELECT * FROM province where region_c = 17 ORDER by province_m ASC";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<option value="' . $row["province_id"] . '">' . $row["province_m"] . '</option>';
                                            }
                                        }
                                        $conn->close();
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Municipality/City</label>
                                    <select name="city_mun" id="city_mun" data-placeholder="Enter Municipality/City" class="form-control">
                                        <option value="">Select City/Municipality</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Barangay</label>
                                    <select name="barangay" id="barangay" data-placeholder="Enter Barangay" class="form-control">
                                        <option value="">Select Barangay</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>District</label>
                                    <select name="district" id="district" data-placeholder="Enter District" class="form-control">
                                        <option value="">Select District</option>
                                        <?php
                                        include '../../../cms/connection/connection.php';
                                        $sql = "SELECT * FROM psi_districts";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<option value="' . $row["district_id"] . '">' . $row["district_name"] . '</option>';
                                            }
                                        }
                                        $conn->close()
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Street Address</label>
                                    <input type="text" name="street" value="<?= $street ?>" placeholder="Enter Street Address" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Date Approved</label>
                                    <input type="date" name="date_approved" value="<?= date_create($date_approved) ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="desc" id="desc" rows="3" class="form-control" placeholder="Enter Description"><?= $project_desc ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Duration From</label>
                                    <input type="date" value="<?= date_create($duration_from) ?>" name="duration_from" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Duration To</label>
                                    <input type="date" name="duration_to" value="<?= date_create($duration_to) ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Proponent</label>
                                    <input type="text" name="proponent" class="form-control" value="<?= $proponent ?>" placeholder="Enter Proponent">
                                </div>
                            </div>
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
                                    <input type="number" name="ps" value="<?= $personal_service ?>" id="ps" min="0" class="form-control" onchange="amtofassist()" placeholder="0" step="0.01">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Maintenance and Other Expenses</label>
                                    <input type="number" name="moe" id="moe" min="0" value="<?= $maintenance_other ?>" class="form-control" onchange="amtofassist()" placeholder="0" step="0.01">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Equipment Outlay</label>
                                    <input type="number" name="eo" id="eo" min="0" value="<?= $equip_outlay ?>" class="form-control" onchange="amtofassist()" placeholder="0" step="0.01">
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
                                    <select name="modepro" id="modepro" class="form-control" placeholder="0">
                                        <option value="">Select mode</option>
                                        <option value="1">Direct Release</option>
                                        <option value="2">Regional Office Procurement</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Amount of Assistance <span style="color:red; font-size:10px;">(Note:Total of PS, MOE, EO)</span></label>
                                    <input type="number" name="aoa" id="aoa" min="0" class="form-control" value="<?= $amount_assist ?>" placeholder="0" onchange="addnum()" disabled>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Counterpart Funding</label>
                                    <input type="number" name="cpf" id="cpf" min="0" value="<?= $counterpart_fund ?>" class="form-control" onchange="addnum()" placeholder="0" step="0.01">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Date Fund Released</label>
                                    <input type="date" name="date_fund_rel" value="<?= date_create($date_fund_rel) ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Total Project Cost <span style="color:red; font-size:10px;">(Note: to update the value change the value of counterpart funding)</span></label>
                                    <input type="number" name="totalprojcost" id="totalprojcost" value="<?= $total_project_cost ?>" placeholder="0" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Counterpart Description</label>
                                    <textarea name="counterdesc" id="counterdesc" rows="3" class="form-control" placeholder="Enter Counterpart Description"><?= $counterpart_desc ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Beneficiaries Details</h3>

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
                                    <label>Beneficiaries</label>
                                    <input type="text" name="beneficiaries" value="<?= $beneficiaries ?>" id="beneficiaries" placeholder="Enter beneficiaries" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Type of Beneficiaries</label>
                                    <select name="type_bene" id="type_bene" class="form-control">
                                        <option value="">Select Type of Beneficiaries</option>
                                        <option value="1">random</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>No. of household(s)</label>
                                <input type="number" value="<?= $no_household ?>" name="no_of_household" min="0" class="form-control" placeholder="Enter no. household">
                            </div>
                            <div class="col-md-6">
                                <label>No. of individual(s)</label>
                                <input type="number" value="<?= $no_individual ?>" name="no_of_individual" min="0" class="form-control" placeholder="Enter no. individual">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Project Entry points</label>
                                <select name="proj_entry" id="proj_entry" class="form-control">
                                    <option value="">Select Project Entry Points</option>
                                    <option value="1">testing</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>KPI(s)</label><button type="button" name="add" id="add" class="btn btn-success btn-xs"><i class="fa fa-plus"></i></button>
                                <input type="text" name="skill[]" placeholder="Enter no. of KPI" class="form-control name_list" />
                                <div class="dynamic_field" id="dynamic_field"></div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var i = 1;
        $('#add').click(function() {
            i++;
            $('#dynamic_field').append('<div id="row' + i + '"class="form-group"><input type="text" name="skill[]" placeholder="Enter your Skill" class="form-control name_list" /><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></div>');
        });

        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
    });
</script>


<script type="text/javascript" src="functionality/proj_script.js"></script>
<!-- /.content-wrapper -->
<?php
include 'template/footer.php';
?>