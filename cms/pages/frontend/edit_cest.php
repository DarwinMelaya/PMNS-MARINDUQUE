<?php
// header("refresh: 2");
$page = "cest_masterlist";
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
                    <h1>Edit CEST Project</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Project</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <?php
            // Assuming you have a project ID from the URL or session
            $project_id = $_GET['id']; // Or $_SESSION['project_id']

            // Fetch project details from the database
            include '../../connection/connection.php';
            $sql = "SELECT * FROM projects WHERE project_id = '$project_id'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc(); // Assuming only one project with the ID

            // Close the connection
            $conn->close();
            ?>

            <form id="updateProjectForm" action="../backend/update_cest.php" method="post">
                <input type="hidden" name="project_id" value="<?php echo $project_id; ?>">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">CEST Profile</h3>
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
                                    <input type="text" class="form-control" placeholder="Project Code" name="project_code" style="width: 100%;" required value="<?php echo $row['project_code']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label>Project Title <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" placeholder="Project Title" name="project_title" style="width:100%;" required value="<?php echo stripslashes($row['project_title']); ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Investment Map <span style="color:red">*</span></label>
                                    <select class="form-control select2" name="investment_map" data-placeholder="Select Investment Map" style="width: 100%;" required>
                                        <!--  <option value="Assistance to R&D" <?php if ($row['investment_map'] == 'Assistance to R&D') {
                                                                                    echo 'Selected';
                                                                                }; ?>>Assistance to R&D</option> -->
                                        <option value="CEST" <?php if ($row['investment_map'] == 'CEST') {
                                                                    echo 'Selected';
                                                                }; ?>>CEST</option>
                                        <!--  <option value="TBED" <?php if ($row['investment_map'] == 'TBED') {
                                                                        echo 'Selected';
                                                                    }; ?>>TBED</option> -->
                                        <!--  <option value="STI Promotion" <?php if ($row['investment_map'] == 'STI Promotion') {
                                                                                echo 'Selected';
                                                                            }; ?>>STI Promotion</option> -->
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Province <span style="color:red">*</span></label>
                                    <select class="form-control select2" name="province" id="province" data-placeholder="Select Province" style="width: 100%;" onchange="showCityMun(this.value)" required>
                                        <option value="000">REGIONWIDE</option>
                                        <?php
                                        include '../../connection/connection.php';
                                        $sql = "SELECT * FROM province where region_c = 17 ORDER by province_m ASC";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row2 = $result->fetch_assoc()) {
                                                echo '<option value="' . $row2["province_c"] . '"';
                                                if ($row['province'] == $row2["province_c"]) {
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Municipality / City</label>
                                    <select class="form-control" name="city_mun" id="city_mun" data-placeholder="Select City/Municipality" style="width: 100%;">
                                        <option value="">Select City/Municipality</option>
                                        <?php
                                        include '../../connection/connection.php';

                                        $sql = "Select citymun_c, citymun_m from citymun where region_c = '17' and province_c = '" . $row["province"] . "'";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row3 = mysqli_fetch_assoc($result)) {
                                                echo '<option class="form-control" value="' . $row3["citymun_c"] . '"';
                                                if ($row['city_mun'] == $row3["citymun_c"]) {
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
                                    <input type="text" class="form-control" id="barangay" name="barangay" placeholder="Enter Barangay" style="width: 100%;" value="<?php echo $row['barangay']; ?>">
                                </div>
                                <!-- /.form-group -->
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-9">
                                <div class="form-group">
                                    <label>Street Address</label>
                                    <input type="text" name="street" class="form-control" placeholder="Enter Street Address" value="<?php echo $row['street']; ?>">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Date Approved <span style="color:red">*</span></label>
                                    <input type="date" name="date_approved" id="date_approved" class="form-control" required value="<?php echo $row['date_approved']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Project Description <span style="color:red; font-size: 12px;">(Note: Max character 350) *</span></label>
                                    <textarea name="prog_desc" id="desc" rows="3" class="form-control" maxlength="350" placeholder="Enter program Description" name="project_desc" style="width: 100%;"><?php echo stripslashes($row['project_desc']); ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Duration From <span style="color:red">*</span></label>
                                    <input type="date" class="form-control" name="duration_from" style="width:100%;" required value="<?php echo $row['duration_from']; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Duration To <span style="color:red">*</span></label>
                                    <input type="date" class="form-control" name="duration_to" style="width:100%;" required value="<?php echo $row['duration_to']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Proponent <span style="color:red">*</span></label>
                                    <div id="proponent-container">
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control proponent-input" name="proponent[]" placeholder="Enter Proponent" value="" required>
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-success add-proponent"><i class="fas fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Collaborating Agency</label>
                                    <div id="collab-container">
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control collab-input" name="collab[]" placeholder="Enter Collaborating Agency" value="">
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-success add-collab"><i class="fas fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Contact email <span style="color:red">*</span></label>
                                    <input type="email" id="proj_email" name="proj_email" placeholder="Enter Contact Email" class="form-control" value="<?php echo $row['proj_email']; ?>" required>
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
                                    <label>Personal Services <span style="color:red">*</span></label>
                                    <input type="number" id="ps" name="ps" max="99999999" step="0.01" min="0" class="form-control" placeholder="0.00" required value="<?php echo $row['personal_service']; ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Maintenance and Other Expenses <span style="color:red">*</span></label>
                                    <input type="number" id="moe" name="moe" max="99999999" step="0.01" min="0" class="form-control" placeholder="0.00" required value="<?php echo $row['maintenance_other']; ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Equipment Outlay <span style="color:red">*</span></label>
                                    <input type="number" id="eo" name="eo" max="99999999" step="0.01" min="0" class="form-control" placeholder="0.00" required value="<?php echo $row['equip_outlay']; ?>">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Counterpart Funding <span style="color:red">*</span></label>
                                    <input type="number" id="cpf" max="99999999" step="0.01" min="0" name="cpf" class="form-control" placeholder="0.00" required value="<?php echo $row['counterpart_fund']; ?>">
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
                                    <label>Counterpart Description <span style="color:red">*</span></label>
                                    <textarea name="counterdesc" id="counterdesc" rows="3" class="form-control" placeholder="Enter counterpart Description" required><?php echo stripslashes($row['counterpart_desc']); ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mode of Procurement <span style="color:red">*</span></label>
                                    <select name="modepro" id="modepro" class="form-control" required>
                                        <option value="1" <?php if ($row['modepro'] == 1) {
                                                                echo 'selected';
                                                            }; ?>>Direct Release</option>
                                        <option value="2" <?php if ($row['modepro'] == 2) {
                                                                echo 'selected';
                                                            }; ?>>Regional Office Procurement</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date Fund Released <span style="color:red">*</span></label>
                                    <input type="date" name="date_released" class="form-control" value="<?php echo $row['date_released']; ?>" required>
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
                                    <input type="text" name="beneficiaries" id="beneficiaries" placeholder="Enter beneficiaries" class="form-control" required value="<?php echo stripslashes($row['beneficiaries']); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Type of Beneficiaries</label>
                                    <div class="input-group">
                                        <select class="form-control" name="type_bene" id="type_bene">
                                            <option value="">Select Type</option>
                                        </select>
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTypeModal">
                                                <i class="fas fa-plus"></i> Add New
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>No. of household(s)</label>
                                <input type="number" name="no_of_household" min="0" class="form-control" placeholder="Enter no. household" value="<?php echo $row['no_household']; ?>">
                            </div>
                            <div class="col-md-6">
                                <label>No. of individual(s)</label>
                                <input type="number" name="no_of_individual" min="0" class="form-control" placeholder="Enter no. individual" value="<?php echo $row['no_individual']; ?>">
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-12">
                                <label>Remarks</label>
                                <textarea name="beneficiary_remarks" class="form-control" placeholder="Enter details of the beneficiaries / breakdown per sector"><?php echo $row['beneficiary_remarks']; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
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

<!-- Modal for Adding New Type -->
<div class="modal fade" id="addTypeModal" tabindex="-1" role="dialog" aria-labelledby="addTypeModalLabel" aria-hidden="true" style="z-index: 1050;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTypeModalLabel">Manage Beneficiary Types</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="newTypeName">New Type Name</label>
                    <input type="text" class="form-control" id="newTypeName" autocomplete="off">
                </div>
                <div class="mt-3">
                    <h6>Existing Types</h6>
                    <ul class="list-group" id="existingTypes">
                        <!-- Types will be loaded here -->
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="addNewType">Add Type</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="functionality/proj_script.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
</script>
<script>
// Initialize with existing collaborating agencies
$(document).ready(function() {
    const existingCollabs = <?php echo json_encode(explode(';', $row['collaborating_agencies'])); ?>;
    
    if (existingCollabs && existingCollabs[0]) {
        // Clear the default empty input
        $('#collab-container').empty();
        
        // Add each existing collab
        existingCollabs.forEach((collab, index) => {
            addCollabField(collab.trim());
        });
    }
    
    // Add new collaborating agency field
    $('.add-collab').on('click', function() {
        addCollabField();
    });
    
    // Remove collaborating agency field
    $(document).on('click', '.remove-collab', function() {
        $(this).closest('.input-group').remove();
    });
    
    function addCollabField(value = '') {
        const field = `
            <div class="input-group mb-2">
                <input type="text" class="form-control collab-input" name="collab[]" placeholder="Enter Collaborating Agency" value="${value}">
                <div class="input-group-append">
                    ${$('#collab-container .input-group').length === 0 
                        ? '<button type="button" class="btn btn-success add-collab"><i class="fas fa-plus"></i></button>'
                        : '<button type="button" class="btn btn-danger remove-collab"><i class="fas fa-minus"></i></button>'}
                </div>
            </div>
        `;
        $('#collab-container').append(field);
    }
});
</script>
<script>
// Initialize with existing proponents
$(document).ready(function() {
    const existingProponents = <?php echo json_encode(explode(';', $row['proponent'])); ?>;
    
    if (existingProponents && existingProponents[0]) {
        // Clear the default empty input
        $('#proponent-container').empty();
        
        // Add each existing proponent
        existingProponents.forEach((proponent, index) => {
            addProponentField(proponent.trim());
        });
    }
    
    // Add new proponent field
    $('.add-proponent').on('click', function() {
        addProponentField();
    });
    
    // Remove proponent field
    $(document).on('click', '.remove-proponent', function() {
        if ($('#proponent-container .input-group').length > 1) { // Ensure at least one proponent remains
            $(this).closest('.input-group').remove();
        }
    });
    
    function addProponentField(value = '') {
        const field = `
            <div class="input-group mb-2">
                <input type="text" class="form-control proponent-input" name="proponent[]" placeholder="Enter Proponent" value="${value}" required>
                <div class="input-group-append">
                    ${$('#proponent-container .input-group').length === 0 
                        ? '<button type="button" class="btn btn-success add-proponent"><i class="fas fa-plus"></i></button>'
                        : '<button type="button" class="btn btn-danger remove-proponent"><i class="fas fa-minus"></i></button>'}
                </div>
            </div>
        `;
        $('#proponent-container').append(field);
    }
});
</script>
<script>
$(document).ready(function() {
    // Handle form submission
    $('#updateProjectForm').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission
        
        // Get form data
        const formData = new FormData(this);
        
        // Submit form via AJAX
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.status === 'success') {
                    // Show success alert
                    Swal.fire({
                        title: 'Success!',
                        text: 'Project has been updated successfully',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        // Redirect back to the same page to show updated data
                        window.location.href = `edit_cest.php?id=<?php echo $project_id; ?>`;
                    });
                } else {
                    // Show error alert
                    Swal.fire({
                        title: 'Error!',
                        text: response.message || 'An error occurred while updating the project',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            },
            error: function(xhr, status, error) {
                // Show error alert
                Swal.fire({
                    title: 'Error!',
                    text: 'An error occurred while updating the project',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        });
    });
});
</script>
<script>
$(document).ready(function() {
    // Initialize the modal
    $('#addTypeModal').on('shown.bs.modal', function () {
        $('#newTypeName').focus();
    });

    // Clear input when modal is closed
    $('#addTypeModal').on('hidden.bs.modal', function () {
        $('#newTypeName').val('');
    });

    // Handle enter key in the input field
    $('#newTypeName').on('keypress', function(e) {
        if (e.which === 13) { // Enter key
            e.preventDefault();
            $('#addNewType').click();
        }
    });

    // Load beneficiary types
    function loadBeneficiaryTypes() {
        $.ajax({
            type: "POST",
            url: "../backend/manage_beneficiary_types.php",
            data: { action: "get" },
            success: function(response) {
                if (response.success) {
                    let dropdown = $("#type_bene");
                    dropdown.empty();
                    dropdown.append('<option value="">Select Type</option>');
                    
                    let typesList = $("#existingTypes");
                    typesList.empty();
                    
                    response.types.forEach(function(type) {
                        // Set selected if it matches the current type
                        const selected = (type.type_name === '<?php echo $row["type_of_beneficiaries"]; ?>') ? 'selected' : '';
                        dropdown.append(`<option value="${type.id}" ${selected}>${type.type_name}</option>`);
                        
                        typesList.append(`
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                ${type.type_name}
                                <button class="btn btn-danger btn-sm remove-type" data-id="${type.id}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </li>
                        `);
                    });
                }
            }
        });
    }

    // Load types on page load
    loadBeneficiaryTypes();

    // Add new type
    $("#addNewType").click(function() {
        let typeName = $("#newTypeName").val().trim();
        if (typeName) {
            $.ajax({
                type: "POST",
                url: "../backend/manage_beneficiary_types.php",
                data: {
                    action: "add",
                    type_name: typeName
                },
                success: function(response) {
                    if (response.success) {
                        $("#newTypeName").val('');
                        loadBeneficiaryTypes();
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'New beneficiary type has been added',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Failed to add new beneficiary type'
                        });
                    }
                }
            });
        }
    });

    // Remove type
    $(document).on('click', '.remove-type', function() {
        let typeId = $(this).data('id');
        let typeName = $(this).closest('li').text().trim();
        
        Swal.fire({
            title: 'Are you sure?',
            text: `Do you want to remove "${typeName}"?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, remove it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "../backend/manage_beneficiary_types.php",
                    data: {
                        action: "remove",
                        type_id: typeId
                    },
                    success: function(response) {
                        if (response.success) {
                            loadBeneficiaryTypes();
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: 'The beneficiary type has been removed',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'Failed to remove the beneficiary type'
                            });
                        }
                    }
                });
            }
        });
    });
});
</script>
<!-- /.content-wrapper -->
<?php
include 'template/footer.php';
?>