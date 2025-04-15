<?php
// header("refresh: 2");
$page = "add_sscpproj";
include 'template/header.php';
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
                    <h1>Add SSCP Project</h1>
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
            <form action="../backend/add_sscp.php" method="get">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">SSCP Profile</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <input type="number" name="project_type" value="4" hidden>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Project Code <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" placeholder="Project Code" name="project_code" style="width: 100%;" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Project Title <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" placeholder="Project Title" name="project_title" style="width:100%;" required>
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
                                        include '../../connection/connection.php';
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
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Municipality / City</label>
                                    <select class="form-control select2" name="city_mun" id="city_mun" data-placeholder="Select City/Municipality" style="width: 100%;">
                                        <option value="">Select City/Municipality</option>

                                    </select>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Barangay</label>
                                    <select class="form-control select2" id="barangay" name="barangay" data-placeholder="Select Barangay" style="width: 100%;">
                                        <option value="">Select Barangay</option>

                                    </select>
                                </div>
                                <!-- /.form-group -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>District</label>
                                    <select name="district" id="district" class="form-control" data-placeholder="Select District">
                                        <option value="">Select District</option>
                                        <?php
                                        include '../../connection/connection.php';
                                        $sql = "SELECT * FROM psi_districts";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<option value="' . $row["district_id"] . '">' . $row["district_name"] . '</option>';
                                            }
                                        }
                                        $conn
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Street Address</label>
                                    <input type="text" name="street" class="form-control" placeholder="Enter Street Address">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Date Approved</label>
                                    <input type="date" name="date_approved" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Project Description <span style="color:red; font-size: 12px;">(Note: Max character 250)</span></label>
                                    <textarea name="prog_desc" id="desc" rows="3" class="form-control" maxlength="250" placeholder="Enter program Description" name="project_desc" style="width: 100%;"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Duration From</label>
                                    <input type="date" class="form-control" name="duration_from" style="width:100%;" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Duration To</label>
                                    <input type="date" class="form-control" name="duration_to" style="width:100%;" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Proponent</label>
                                    <input type="text" name="proponent" class="form-control" placeholder="Enter Proponent">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Collaborating Agency</label>
                                    <select name="collab" id="collab" class="select2" data-placeholder="Enter Collaborating Agency" style="width:100%;">
                                        <?php
                                        include '../../connection/connection.php';
                                        $sql = "SELECT * FROM psi_collaborators";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<option value="' . $row["col_id"] . '">' . $row["col_name"] . '</option>';
                                            }
                                        }
                                        $conn->close();
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Beneficiaries</label>
                                    <select name="beneficiaries" id="beneficiaries" class="form-control">
                                        <option value="1">Select Beneficiaries</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Sector/Investment Map</label>
                                    <input type="text" name="sector" class="form-control" placeholder="Enter Sector/Investment Map">
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Total Project Cost <span style="color:red; font-size:10px;">(Note: to update the value change the value of counterpart funding)</span></label>
                                    <input type="number" id="totalprojcost" name="totalprojcost" class="form-control" placeholder="0" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Amount of Assistance</label>
                                    <input type="number" id="aoa" min="0" name="aoa" class="form-control" onchange="addnum()" placeholder="0" disabled>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Counterpart Funding</label>
                                    <input type="number" id="cpf" min="0" name="cpf" class="form-control" placeholder="0" onchange="addnum()">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Date Fund Released</label>
                                    <input type="date" name="date_fund_rel" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Personal Services</label>
                                    <input type="number" id="ps" name="ps" min="0" class="form-control" placeholder="0" onchange="amtofassist()">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Maintenance and Other Expenses</label>
                                    <input type="number" id="moe" name="moe" min="0" class="form-control" placeholder="0" onchange="amtofassist()">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Equipment Outlay</label>
                                    <input type="number" id="eo" name="eo" min="0" class="form-control" placeholder="0" onchange="amtofassist()">
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
                                        <option value="1">Direct Release</option>
                                        <option value="2">Regional Office Procurement</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Counterpart Description</label>
                                    <textarea name="counterdesc" id="counterdesc" rows="3" class="form-control" placeholder="Enter counterpart Description"></textarea>
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



<script type="text/javascript" src="functionality/proj_script.js"></script>
<!-- /.content-wrapper -->
<?php
include 'template/footer.php';
?>