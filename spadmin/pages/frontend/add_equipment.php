<?php
$page = "equipment_list";
include 'template/header.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Equipment</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Equipment</li>
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
                        <h3 class="card-title">Equipment</h3>
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
                                    <label>Equipment Specification(s)<span style="color:red;">*</span></label>
                                    <textarea type="text" rows="3" class="form-control" placeholder="Enter Equipment Specification" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Equipment Property No. <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Propert No." required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Quantity <span style="color:red;">*</span></label>
                                    <input type="number" min="0" class="form-control" placeholder="Enter Quantity" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Amount Approved</label>
                                    <input type="number" min="0" class="form-control" placeholder="Enter Amount Approved">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Type of Equipment</label>
                                    <select name="type_eqp" id="type_eqp" class="form-control">
                                        <option value="">Select Type</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Equipment Receipt No.</label>
                                    <input type="text" class="form-control" placeholder="Enter Receipt No.">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Warranty date year</label>
                                    <input type="number" min="2005" class="form-control" placeholder="Enter Warranty Date year">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Receipt Date</label>
                                    <input type="date" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Equipment Date Tag</label>
                                    <input type="date" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Remarks</label>
                                    <textarea name="eqp_remarks" id="eqp_remarks" rows="3" class="form-control" placeholder="Enter Remarks"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Equipment Acquisition</h3>
                        <div class="card-tools">
                            <button class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Equipment Specification Acquired</label>
                                    <textarea name="eqp_spec_acq" id="eqp_spec_acq" class="form-control" placeholder="Enter Specification Acquired"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Equipment Brand</label>
                                    <input type="text" class="form-control" placeholder="Enter Brand">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Amount Acquired</label>
                                    <input type="number" min="0" class="form-control" placeholder="Enter Amount Acquired">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Quantity Acquired</label>
                                    <input type="number" min="0" class="form-control" placeholder="Enter Quantity Acquired">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Equipment Acquired</label>
                                    <select name="eqp_acq" id="eqp_acq" class="form-control">
                                        <option value="#">Select Acquired</option>
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="text-align: center">
                    <button type="submit" class="btn btn-primary btn-lg">Submit Equipment</button>
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