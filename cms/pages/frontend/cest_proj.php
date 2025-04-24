<?php
// header("refresh: 2");
$page = "add_cestproj";
include 'template/header.php';
?>
<style>
    .hidden {
        display: none;
    }
    .modal {
        background: rgba(0, 0, 0, 0.5);
    }
    .modal-dialog {
        margin-top: 100px;
    }
    .modal .form-control:focus {
        z-index: 2;
        position: relative;
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
            <form action="../backend/add_cest.php" method="get">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">CEST Profile</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <input type="hidden" name="project_type" value="3">
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
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label>Project Title <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" placeholder="Project Title" name="project_title" style="width:100%;" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Investment Map <span style="color:red">*</span></label>
                                    <select class="form-control select2" name="investment_map" data-placeholder="Select Investment Map" style="width: 100%;" required>
                                        <!--  <option value="">Select Investment Map</option> -->
                                        <!--  <option value="Assistance to R&D">Assistance to R&D</option> -->
                                        <option value="CEST">CEST</option>
                                        <!--  <option value="TBED">TBED</option> -->
                                        <!-- <option value="STI Promotion">STI Promotion</option> -->
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
                                    <label>Collaborating Agency </label>
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
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Personal Services <span style="color:red">*</span></label>
                                    <input type="number" id="ps" name="ps" max="99999999" step="0.01" min="0" class="form-control" placeholder="0.00" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Maintenance and Other Expenses <span style="color:red">*</span></label>
                                    <input type="number" id="moe" name="moe" max="99999999" step="0.01" min="0" class="form-control" placeholder="0.00" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Equipment Outlay <span style="color:red">*</span></label>
                                    <input type="number" id="eo" name="eo" max="99999999" step="0.01" min="0" class="form-control" placeholder="0.00" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Counterpart Funding <span style="color:red">*</span></label>
                                    <input type="number" id="cpf" max="99999999" step="0.01" min="0" name="cpf" class="form-control" placeholder="0.00" required>
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
                                    <textarea name="counterdesc" id="counterdesc" rows="3" class="form-control" placeholder="Enter counterpart Description" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mode of Procurement <span style="color:red">*</span></label>
                                    <select name="modepro" id="modepro" class="form-control" required>
                                        <option value="">Select mode</option>
                                        <option value="1">Direct Release</option>
                                        <option value="2">Regional Office Procurement</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date Fund Released <span style="color:red">*</span></label>
                                    <input type="date" name="date_released" class="form-control" required>
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
                                    <input type="text" name="beneficiaries" id="beneficiaries" placeholder="Enter beneficiaries" class="form-control" required>
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

    // Add the following new JavaScript code
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
                            dropdown.append(`<option value="${type.id}">${type.type_name}</option>`);
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