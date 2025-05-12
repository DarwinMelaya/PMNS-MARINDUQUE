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
                        <h3 class="card-title">Budgetary Requirements</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- SETUP Funding Section -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="card card-outline card-primary">
                                    <div class="card-header">
                                        <h5 class="m-0"><i class="fas fa-tools mr-2"></i>SETUP Funding</h5>
                                    </div>
                                    <div class="card-body">
                                        <div id="setup-items">
                                            <div class="row mb-2 align-items-center">
                                                <div class="col-md-4">
                                                    <label class="mb-0">Type</label>
                                                    <select class="form-control" name="setup_type[]" required>
                                                        <option value="">Select Type</option>
                                                        <option value="equipment" <?php echo ($equip_outlay > 0) ? 'selected' : ''; ?>>Equipment</option>
                                                        <option value="others">Others</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-0">Amount (₱)</label>
                                                    <input type="text" class="form-control setup-amount" name="setup_amount[]" 
                                                           value="<?php echo number_format($equip_outlay, 2); ?>" 
                                                           placeholder="Enter amount" oninput="formatAmount(this)" 
                                                           onchange="calculateTotals()" required>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="mb-0">&nbsp;</label>
                                                    <button type="button" class="btn btn-success btn-block" onclick="addSetupItem()">
                                                        <i class="fas fa-plus"></i> Add Item
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Counterpart Funding Section -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="card card-outline card-success">
                                    <div class="card-header">
                                        <h5 class="m-0"><i class="fas fa-handshake mr-2"></i>Counterpart Funding</h5>
                                    </div>
                                    <div class="card-body">
                                        <div id="counterpart-items">
                                            <div class="row mb-2 align-items-center">
                                                <div class="col-md-4">
                                                    <label class="mb-0">Type</label>
                                                    <select class="form-control" name="counterpart_type[]">
                                                        <option value="">Select Type</option>
                                                        <option value="land">Land</option>
                                                        <option value="building">Building</option>
                                                        <option value="others">Others</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-0">Amount (₱)</label>
                                                    <input type="text" class="form-control counterpart-amount" 
                                                           name="counterpart_amount[]" 
                                                           value="<?php echo number_format($counterpar_fund, 2); ?>" 
                                                           placeholder="Enter amount" oninput="formatAmount(this)" 
                                                           onchange="calculateTotals()">
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="mb-0">&nbsp;</label>
                                                    <button type="button" class="btn btn-success btn-block" onclick="addCounterpartItem()">
                                                        <i class="fas fa-plus"></i> Add Item
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Totals Section -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="card card-outline card-info">
                                    <div class="card-header">
                                        <h5 class="m-0"><i class="fas fa-calculator mr-2"></i>Summary</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Total SETUP Funding</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">₱</span>
                                                        </div>
                                                        <input type="text" id="total_setup" class="form-control text-right" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Total Counterpart Funding</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">₱</span>
                                                        </div>
                                                        <input type="text" id="total_counterpart" class="form-control text-right" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label><strong>Overall Project Cost</strong></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">₱</span>
                                                        </div>
                                                        <input type="text" id="total_project_cost" class="form-control text-right font-weight-bold" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                <input type="hidden" id="eo" name="eo" value="<?php echo $equip_outlay; ?>">
                <input type="hidden" id="cpf" name="cpf" value="<?php echo $counterpar_fund; ?>">
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

<!-- Add the JavaScript functions at the bottom of the file, before </body> -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    function formatNumberWithCommas(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    function unformatNumber(numberString) {
        if (!numberString) return 0;
        // Remove commas and convert to float
        const cleanNumber = numberString.replace(/,/g, '');
        const parsed = parseFloat(cleanNumber);
        return isNaN(parsed) ? 0 : parsed;
    }

    function addSetupItem() {
        const setupItemsDiv = document.getElementById('setup-items');
        const newRow = document.createElement('div');
        newRow.className = 'row mb-2 align-items-center';
        newRow.innerHTML = `
            <div class="col-md-4">
                <label class="mb-0">Type</label>
                <select class="form-control" name="setup_type[]">
                    <option value="">Select Type</option>
                    <option value="equipment">Equipment</option>
                    <option value="others">Others</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="mb-0">Amount (₱)</label>
                <input type="text" class="form-control setup-amount" name="setup_amount[]" placeholder="Enter amount" oninput="formatAmount(this)" onchange="calculateTotals()">
            </div>
            <div class="col-md-2">
                <label class="mb-0">&nbsp;</label>
                <button type="button" class="btn btn-danger btn-block" onclick="removeItem(this)">
                    <i class="fas fa-minus"></i> Remove
                </button>
            </div>
        `;
        setupItemsDiv.appendChild(newRow);
    }

    function addCounterpartItem() {
        const counterpartItemsDiv = document.getElementById('counterpart-items');
        const newRow = document.createElement('div');
        newRow.className = 'row mb-2 align-items-center';
        newRow.innerHTML = `
            <div class="col-md-4">
                <label class="mb-0">Type</label>
                <select class="form-control" name="counterpart_type[]">
                    <option value="">Select Type</option>
                    <option value="land">Land</option>
                    <option value="building">Building</option>
                    <option value="others">Others</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="mb-0">Amount (₱)</label>
                <input type="text" class="form-control counterpart-amount" name="counterpart_amount[]" placeholder="Enter amount" oninput="formatAmount(this)" onchange="calculateTotals()">
            </div>
            <div class="col-md-2">
                <label class="mb-0">&nbsp;</label>
                <button type="button" class="btn btn-danger btn-block" onclick="removeItem(this)">
                    <i class="fas fa-minus"></i> Remove
                </button>
            </div>
        `;
        counterpartItemsDiv.appendChild(newRow);
    }

    function formatAmount(input) {
        // Save cursor position
        const start = input.selectionStart;
        const end = input.selectionEnd;
        const previousLength = input.value.length;

        // Remove any non-digit characters except decimal point
        let value = input.value.replace(/[^\d.]/g, '');
        
        // Ensure only one decimal point
        let parts = value.split('.');
        if (parts.length > 2) {
            parts = [parts[0], parts.slice(1).join('')];
        }
        if (parts[1]) {
            parts[1] = parts[1].slice(0, 2); // Limit to 2 decimal places
        }
        value = parts.join('.');
        
        // Format with commas for thousands
        if (value) {
            const num = value.split('.');
            num[0] = num[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            input.value = num.join('.');
        } else {
            input.value = '';
        }

        // Restore cursor position
        const newLength = input.value.length;
        const cursorAdjust = newLength - previousLength;
        input.setSelectionRange(start + cursorAdjust, end + cursorAdjust);
    }

    function removeItem(button) {
        button.closest('.row').remove();
        calculateTotals();
    }

    function calculateTotals() {
        let setupTotal = 0;
        document.querySelectorAll('.setup-amount').forEach(input => {
            const value = parseFloat(input.value.replace(/,/g, '') || 0);
            setupTotal += isNaN(value) ? 0 : value;
        });

        let counterpartTotal = 0;
        document.querySelectorAll('.counterpart-amount').forEach(input => {
            const value = parseFloat(input.value.replace(/,/g, '') || 0);
            counterpartTotal += isNaN(value) ? 0 : value;
        });

        // Update display totals with comma formatting
        document.getElementById('total_setup').value = formatNumberWithCommas(setupTotal.toFixed(2));
        document.getElementById('total_counterpart').value = formatNumberWithCommas(counterpartTotal.toFixed(2));
        document.getElementById('total_project_cost').value = formatNumberWithCommas((setupTotal + counterpartTotal).toFixed(2));

        // Update hidden fields with full values
        document.getElementById('eo').value = setupTotal;
        document.getElementById('cpf').value = counterpartTotal;
    }

    // Update the form submission handler
    document.querySelector('form').addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent default submission
        
        // Remove commas from all amount inputs before submission
        document.querySelectorAll('.setup-amount, .counterpart-amount').forEach(input => {
            // Remove commas but keep the decimal places
            input.value = input.value.replace(/,/g, '');
        });

        // Now submit the form
        this.submit();
    });

    // Initialize calculations when page loads
    document.addEventListener('DOMContentLoaded', function() {
        calculateTotals();
    });
</script>