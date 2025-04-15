<?php
$page = "customer_list";
include 'template/header.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Customer</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Customer</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <form action="../backend/add_consultancy.php" method="get">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Customer Details</h3>
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
                                    <label>Cooperator Name<span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Cooperator Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Year Established</label>
                                    <input type="number" class="form-control" min="1700" placeholder="Enter Year Established" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Register DTI</label>
                                    <input type="text" class="form-control" placeholder="Enter Register DTI">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Date DTI Register</label>
                                    <input type="date" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" placeholder="Enter First name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Middle Name/Intial <span style="color:red; font-size:10px;">(Note: Please include period if initial)</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Middle Name/Initial">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Last Name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="number" class="form-control" placeholder="Enter Phone Number">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <input type="number" class="form-control" placeholder="Enter Mobile Number">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" placeholder="Enter Email Address">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Website</label>
                                    <input type="email" class="form-control" placeholder="Enter Website url">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Cooperator Location</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Street</label>
                                    <input type="text" placeholder="Enter Street Address" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>District</label>
                                    <select name="distric" id="distric" class="form-control">
                                        <option value="">Select District</option>
                                        <?php
                                        include '../../../cms/connection/connection.php';
                                        $sql = "SELECT * from psi_districts";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0)
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<option value="' . $row["distric_id"] . '">' . $row["district_name"] . '</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Province</label>
                                    <select name="province" id="province" class="form-control">
                                        <option value="">Select Province</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Municipality</label>
                                    <select name="city_mun" id="city_mun" class="form-control">
                                        <option value="">Select Municipality</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Barangay</label>
                                    <select name="barangay" id="barangay" class="form-control">
                                        <option value="">Select Barangay</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="text-align: center">
                    <button type="submit" class="btn btn-primary btn-lg">Submit Customer</button>
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