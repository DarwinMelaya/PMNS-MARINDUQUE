<?php
// header("refresh: 2");
$page = "add_giaproj";
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
                    <h1>Add GIA Project</h1>
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
            <form action="../backend/add_gia.php" method="get">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Project Profile</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <input type="hidden" name="project_type" value="1">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Project Title <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" placeholder="Project Title" name="project_title" style="width:100%;" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Investment Map <span style="color:red">*</span></label>
                                    <select class="form-control select2" name="investment_map" data-placeholder="Select Investment Map" style="width: 100%;" required>
                                        <option value="">Select Investment Map</option>
                                        <option value="Assistance to R&D">Assistance to R&D</option>
                                        <option value="CEST">CEST</option>
                                        <option value="TBED">TBED</option>
                                        <option value="STI Promotion">STI Promotion</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Sector <span style="color:red">*</span></label>
                                    <select class="form-control select2" name="sector" data-placeholder="Select Sector" style="width: 100%;" required>
                                        <option value="">Select Sector</option>
                                        <option value="digitalization">Digitalization</option>
                                        <option value="smart_communities">Smart Communities</option>
                                        <option value="blue_economy">Blue Economy</option>
                                        <option value="drrm">DRRM</option>
                                        <option value="cca">CCA/Environmental Management</option>
                                        <option value="water_tech">Water Technologies</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Province <span style="color:red">*</span></label>
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
                                    <input type="text" class="form-control" id="barangay" name="barangay" placeholder="Enter Barangay" style="width: 100%;">

                                </div>
                                <!-- /.form-group -->
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-9">
                                <div class="form-group">
                                    <label>Street Address</label>
                                    <input type="text" name="street" class="form-control" placeholder="Enter Street Address">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Date Approved <span style="color:red">*</span></label>
                                    <input type="date" name="date_approved" id="date_approved" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Project Description <span style="color:red; font-size: 12px;">(Note: Max character 1000) *</span></label>
                                    <textarea name="prog_desc" id="desc" rows="3" class="form-control" maxlength="1000" placeholder="Enter program Description" name="project_desc" style="width: 100%;" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Duration From <span style="color:red">*</span></label>
                                    <input type="date" class="form-control" name="duration_from" style="width:100%;" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Duration To <span style="color:red">*</span></label>
                                    <input type="date" class="form-control" name="duration_to" style="width:100%;" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Proponent <span style="color:red">*</span></label>
                                    <input type="text" name="proponent" class="form-control" placeholder="Enter Proponent" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Collaborating Agency</label>
                                    <input type="text" id="collab" name="collab" placeholder="Enter Collaborating Agency" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Contact email <span style="color:red">*</span></label>
                                    <input type="email" id="proj_email" name="proj_email" placeholder="Enter Contact Email" class="form-control" required>
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
                        <!-- Expense Items Section -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="card card-outline card-primary">
                                    <div class="card-header">
                                        <h5 class="m-0"><i class="fas fa-money-bill mr-2"></i>Expense Items</h5>
                                    </div>
                                    <div class="card-body">
                                        <div id="expense-items">
                                            <div class="row mb-2 align-items-center">
                                                <div class="col-md-4">
                                                    <label class="mb-0">Type</label>
                                                    <select class="form-control expense-type" name="expense_type[]">
                                                        <option value="">Select Type</option>
                                                        <option value="ps">Personal Services (PS)</option>
                                                        <option value="mooe">Maintenance and Other Operating Expenses (MOOE)</option>
                                                        <option value="eo">Equipment Outlay (EO)</option>
                                                        <option value="cpf">Counterpart Funding (CPF)</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-0">Amount (₱)</label>
                                                    <input type="number" class="form-control expense-amount" name="expense_amount[]" 
                                                           placeholder="Enter amount" step="0.01" min="0" onchange="calculateExpenseTotals()">
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="mb-0">&nbsp;</label>
                                                    <button type="button" class="btn btn-success btn-block" onclick="addExpenseItem()">
                                                        <i class="fas fa-plus"></i> Add Item
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Equipment Outlay Details -->
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Equipment Outlay Details</label>
                                    <textarea name="eo_details" id="eo_details" class="form-control" 
                                              placeholder="Enter Equipment Outlay Details"></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Counterpart Description -->
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Counterpart Description <span style="color:red">*</span></label>
                                    <textarea name="counterdesc" id="counterdesc" rows="3" class="form-control" 
                                              placeholder="Enter counterpart Description" required></textarea>
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
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Total PS</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">₱</span>
                                                        </div>
                                                        <input type="number" id="total_ps" name="ps" class="form-control text-right" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Total MOOE</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">₱</span>
                                                        </div>
                                                        <input type="number" id="total_mooe" name="moe" class="form-control text-right" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Total EO</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">₱</span>
                                                        </div>
                                                        <input type="number" id="total_eo" name="eo" class="form-control text-right" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Total CPF</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">₱</span>
                                                        </div>
                                                        <input type="number" id="total_cpf" name="cpf" class="form-control text-right" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label><strong>Overall Project Cost</strong></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">₱</span>
                                                        </div>
                                                        <input type="number" id="total_project_cost" class="form-control text-right font-weight-bold" readonly>
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Beneficiaries</label>
                                    <input type="text" name="beneficiaries" id="beneficiaries" placeholder="Enter beneficiaries" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Type of Beneficiaries</label>
                                    <input type="text" class="form-control" name="type_bene" id="type_bene" placeholder="Enter type of beneficiaries">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>No. of household(s)</label>
                                <input type="number" name="no_of_household" min="0" class="form-control" placeholder="Enter no. household">
                            </div>
                            <div class="col-md-6">
                                <label>No. of individual(s)</label>
                                <input type="number" name="no_of_individual" min="0" class="form-control" placeholder="Enter no. individual">
                            </div>
                        </div> <br />
                        <div class="row">
                            <div class="col-md-12">
                                <label>Remarks</label>
                                <textarea name="beneficiary_remarks" class="form-control" placeholder="Enter details of the beneficiaries / breakdown per sector"></textarea>
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



<script type="text/javascript" src="functionality/proj_script.js"></script>
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

    function addExpenseItem() {
        const newItem = `
            <div class="row mb-2 align-items-center expense-row">
                <div class="col-md-4">
                    <select class="form-control expense-type" name="expense_type[]">
                        <option value="">Select Type</option>
                        <option value="ps">Personal Services (PS)</option>
                        <option value="mooe">Maintenance and Other Operating Expenses (MOOE)</option>
                        <option value="eo">Equipment Outlay (EO)</option>
                        <option value="cpf">Counterpart Funding (CPF)</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <input type="number" class="form-control expense-amount" name="expense_amount[]" 
                           placeholder="Enter amount" step="0.01" min="0" onchange="calculateExpenseTotals()">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger btn-block" onclick="removeExpenseItem(this)">
                        <i class="fas fa-minus"></i> Remove
                    </button>
                </div>
            </div>
        `;
        document.getElementById('expense-items').insertAdjacentHTML('beforeend', newItem);
    }

    function removeExpenseItem(button) {
        button.closest('.expense-row').remove();
        calculateExpenseTotals();
    }

    function calculateExpenseTotals() {
        let totalPS = 0;
        let totalMOOE = 0;
        let totalEO = 0;
        let totalCPF = 0;

        const rows = document.querySelectorAll('#expense-items .row');
        rows.forEach(row => {
            const type = row.querySelector('.expense-type').value;
            const amount = parseFloat(row.querySelector('.expense-amount').value) || 0;

            switch(type) {
                case 'ps':
                    totalPS += amount;
                    break;
                case 'mooe':
                    totalMOOE += amount;
                    break;
                case 'eo':
                    totalEO += amount;
                    break;
                case 'cpf':
                    totalCPF += amount;
                    break;
            }
        });

        document.getElementById('total_ps').value = totalPS;
        document.getElementById('total_mooe').value = totalMOOE;
        document.getElementById('total_eo').value = totalEO;
        document.getElementById('total_cpf').value = totalCPF;
        document.getElementById('total_project_cost').value = totalPS + totalMOOE + totalEO + totalCPF;
    }
</script>
<!-- /.content-wrapper -->
<?php
include 'template/footer.php';
?>