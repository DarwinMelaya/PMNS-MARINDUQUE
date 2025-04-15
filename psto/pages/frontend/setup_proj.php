<?php
$page = "add_setupproj";
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
            <form action="../backend/add_setupproj.php" method="get">
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
                                    <input class="form-control" name="project_code" type="text" placeholder="Enter Project Code" style="width: 100%;" required>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Project Tag</label>
                                    <input type="text" name="tag" placeholder="Enter Tag" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Project Title</label>
                                    <input class="form-control" name="project_title" type="text" placeholder="Enter Project Title" style="width: 100%;" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Project Description<span style="color:red; font-size: 12px;">(Note: Max character 250)</span></label>
                                    <textarea class="form-control" name="project_desc" rows="3" type="text" placeholder="Enter Project Description" maxlength="250" style="width: 100%;"></textarea>
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
                                        <option value="1">Single Proprietorship</option>
                                        <option value="2">Partnership</option>
                                        <option value="3">Cooperative</option>
                                        <option value="4">Corporation Profit</option>
                                        <option value="5">Corporation Non-Profit</option>
                                        <option value="6">Local Government Unit</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Beneficiaries</label>
                                    <select class="select2" name="beneficiaries" multiple="multiple" data-placeholder="Select Beneficiaries" style="width: 100%;">
                                        <option value="">Please select beneficiaries</option>
                                        <?php
                                        include '../../connection/connection.php';
                                        $sql = "SELECT * FROM psi_cooperators";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<option value="' . $row["coop_id"] . '">' . $row["coop_name"] . '</option>';
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
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>No. of Implementor</label>
                                    <select class="form-control select2" name="implementor" style="width: 100%;" data-placeholder="Select Implementor" required>
                                        <option value="">Select Implementor</option>
                                        <?php
                                        include '../../connection/connection.php';
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
                                    <input type="date" class="form-control" name="date_fund_rel" id="date_fund_rel">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Total Project Cost <span style="color:red; font-size:10px;">(Note: to update the value change the value of counterpart funding)</span></label>
                                    <input type="number" id="totalprojcost" name="totalprojcost" class="form-control" placeholder="0" disabled>
                                </div>
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
                                    <input class="form-control" name="street" type="text" placeholder="Enter Street Address" style="width: 100%;">
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
                                        include '../../connection/connection.php';
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
                            <!-- /.col -->
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
                                    <input type="text" name="fname" class="form-control" placeholder="Enter first name">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Middle name</label>
                                    <input type="text" name="mname" class="form-control" placeholder="Enter middle/initial name">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Last name</label>
                                    <input type="text" name="lname" class="form-control" placeholder="Enter last name">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Sex</label>
                                    <select name="setgender" id="setgender" class="form-control">
                                        <option value="">Select Gender</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Age</label>
                                    <input type="number" name="age" min="1" class="form-control" placeholder="Enter age">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Liquidated</label>
                                    <input type="number" min="0" name="liquidated" placeholder="Enter Liquidated" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date Approved</label>
                                    <input type="date" name="date_approved" class="form-control">
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