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
            <form action="../backend/add_setupproj.php" method="post">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Company Profile</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Project Identification -->
                        <div class="card card-outline card-primary mb-4">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-project-diagram mr-2"></i>Project Identification</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label>Project Code <span style="color:red;">*</span></label>
                                            <input class="form-control" name="project_code" type="text" placeholder="Enter Project Code" required>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Project Tag</label>
                                            <input type="text" name="tag" placeholder="Enter tags separated by commas (e.g. research, technology, agriculture)" class="form-control">
                                            <small class="text-muted">(Tag projects with identifiers for easy reference and categorization)</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Project Title <span style="color:red;">*</span></label>
                                            <input class="form-control" name="project_title" type="text" placeholder="Enter Project Title" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Company Information -->
                        <div class="card card-outline card-info mb-4">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-info-circle mr-2"></i>Company Information</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Proponent (Firm Name) <span style="color:red;">*</span></label>
                                            <input class="form-control" name="firm_name" type="text" placeholder="Enter Firm Name" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Contact Person <span style="color:red;">*</span></label>
                                            <input class="form-control" name="contact_person" type="text" placeholder="Enter Contact Person" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Position <span style="color:red;">*</span></label>
                                            <input class="form-control" name="position" type="text" placeholder="Enter Position" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Office Address <span style="color:red;">*</span></label>
                                            <input class="form-control" name="office_address" type="text" placeholder="Enter Office Address" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Contact Number <span style="color:red;">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input class="form-control" name="contact_number" type="text" placeholder="Enter Contact Number" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>E-mail Address <span style="color:red;">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                </div>
                                                <input class="form-control" name="email" type="email" placeholder="Enter Email Address" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Organization Profile -->
                        <div class="card card-outline card-success mb-4">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-sitemap mr-2"></i>Organization Profile</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Type of Organization <span style="color:red;">*</span></label>
                                            <select name="org_type" class="form-control select2" required>
                                                <option value="">Select Organization Type</option>
                                                <option value="single_prop">Single Proprietorship</option>
                                                <option value="partnership">Partnership</option>
                                                <option value="cooperative">Cooperative</option>
                                                <option value="corporation">Corporation</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Profit Status <span style="color:red;">*</span></label>
                                            <select name="profit_status" class="form-control select2" required>
                                                <option value="">Select Profit Status</option>
                                                <option value="profit">Profit</option>
                                                <option value="non_profit">Non-Profit</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Business Age <span style="color:red;">*</span></label>
                                            <select name="business_age" class="form-control select2" required>
                                                <option value="">Select Business Age</option>
                                                <option value="startup">Startup (1-3 years established)</option>
                                                <option value="non_startup">Non-startup (4 or more years established)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>MSME Profile <span style="color:red;">*</span></label>
                                            <select name="msme_profile" class="form-control select2" required>
                                                <option value="">Select MSME Profile</option>
                                                <option value="micro">Micro (Not more than ₱3,000,000)</option>
                                                <option value="small">Small (₱3,000,001 to ₱15,000,000)</option>
                                                <option value="medium">Medium (₱15,000,001 to ₱100,000,000)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Priority Sector -->
                        <div class="card card-outline card-warning mb-4">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-industry mr-2"></i>Priority Sector</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Select Priority Sector <span style="color:red;">*</span></label>
                                            <select name="priority_sector" class="form-control select2" required>
                                                <option value="">Select Priority Sector</option>
                                                <option value="crop_animal">Crop animal production, hunting, and related service activities</option>
                                                <option value="forestry">Forestry and logging</option>
                                                <option value="fishing">Fishing and aquaculture</option>
                                                <option value="food_processing">Food processing</option>
                                                <option value="beverage">Beverage manufacturing</option>
                                                <option value="textile">Textile manufacturing</option>
                                                <option value="apparel">Wearing apparel manufacturing</option>
                                                <option value="leather">Leather and related products manufacturing</option>
                                                <option value="wood">Wood and wood product manufacturing</option>
                                                <option value="paper">Paper and paper product manufacturing</option>
                                                <option value="chemicals">Chemicals and chemical product manufacturing</option>
                                                <option value="pharmaceutical">Basic pharmaceutical product and pharmaceutical preparation manufacturing</option>
                                                <option value="rubber">Rubber and plastic product manufacturing</option>
                                                <option value="non_metallic">Non-metallic mineral product manufacturing</option>
                                                <option value="fabricated">Fabricated metal product manufacturing</option>
                                                <option value="machinery">Machinery and equipment (n.e.c.) manufacturing</option>
                                                <option value="transport">Other transport equipment manufacturing</option>
                                                <option value="furniture">Furniture manufacturing</option>
                                                <option value="information">Information and communication</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Project Description -->
                        <div class="card card-outline card-secondary">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-file-alt mr-2"></i>Project Description</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Project Description <span style="color:red; font-size: 12px;">(Max 350 characters)</span></label>
                                            <textarea class="form-control" name="project_desc" rows="3" placeholder="Enter Project Description" maxlength="350"></textarea>
                                            <small class="text-muted">Provide a brief description of the project's objectives and expected outcomes.</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                                        <option value="equipment">Equipment</option>
                                                        <option value="others">Others</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-0">Amount (₱)</label>
                                                    <input type="text" class="form-control setup-amount" name="setup_amount[]" placeholder="Enter amount" oninput="formatAmount(this)" onchange="calculateTotals()" required>
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
                                                    <input type="text" class="form-control counterpart-amount" name="counterpart_amount[]" placeholder="Enter amount" oninput="formatAmount(this)" onchange="calculateTotals()">
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

                        <!-- Counterpart Description -->
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
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Municipality / City</label>
                                    <select class="form-control" name="city_mun" id="city_mun" data-placeholder="Select City/Municipality" style="width: 100%;">
                                        <option value="">Select City/Municipality</option>
                                    </select>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Barangay</label>
                                    <input type="text" class="form-control" id="barangay" name="barangay" placeholder="Select Barangay">

                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Street Address</label>
                                    <input class="form-control" name="street" type="text" placeholder="Enter Street Address" style="width: 100%;">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <input type="text" id="project_type" hidden value="2">
                        </div>
                    </div>
                    <!-- /.row -->

                </div>
 <!-- Beneficiary Profile -->


                <!-- Hidden fields with improved documentation -->
                <input type="hidden" name="cpf" id="cpf" value="0"> <!-- counterpart_fund: Total amount contributed by the beneficiary/partner -->
                <input type="hidden" name="ps" id="ps" value="0"> <!-- personal_service: Budget allocated for human resources/labor -->
                <input type="hidden" name="moe" id="moe" value="0"> <!-- maintenance_other: Operating expenses and maintenance costs -->
                <input type="hidden" name="eo" id="eo" value="0"> <!-- equipment_outlay: Cost of equipment and capital expenses -->
                <input type="hidden" name="modepro" id="modepro" value="1"> <!-- mode_of_procurement: How items/services will be purchased -->
                <input type="hidden" name="date_released" id="date_released" value="<?php echo date('Y-m-d'); ?>">

                <div style="text-align: center">
                    <button type="submit" class="btn btn-primary btn-lg">Submit Project</button>
                </div><br /><br /><br />

                <!-- Add these hidden fields right before the submit button -->
                <input type="hidden" name="project_email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
                <input type="hidden" name="project_type" value="2">
                <input type="hidden" name="beneficiaries" value="0">
                <input type="hidden" name="collaborating_agencies" value="">
                <input type="hidden" name="implementor" value="">
                <input type="hidden" name="typeorg" value="1">
                <input type="hidden" name="counterdesc" value="">
                <input type="hidden" name="fname" value="">
                <input type="hidden" name="mname" value="">
                <input type="hidden" name="lname" value="">
                <input type="hidden" name="setgender" value="">
                <input type="hidden" name="age" value="0">
                <input type="hidden" name="date_approved" value="<?php echo date('Y-m-d'); ?>">
                <input type="hidden" name="liquidated" value="0">
            </form>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- Add this before the closing </body> tag -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    function showCityMun(province_c) {
        if (province_c == "000") {
            $("#city_mun").html("<option value=''>Select City/Municipality</option>");
            $("#barangay").val("N/A");
        } else {
            $.ajax({
                type: "GET",
                url: "../backend/get_citymun.php",
                cache: false,
                data: {
                    province_c
                },
                success: function(data) {
                    $("#city_mun").html(data);
                }
            });
        }
    }

    // Add these utility functions for number formatting
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

<!-- /.content-wrapper -->
<?php
include 'template/footer.php';
?>
</body>

</html>