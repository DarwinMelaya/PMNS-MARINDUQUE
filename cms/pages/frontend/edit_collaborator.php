<?php
$page = "collaborator_list";
include 'template/header.php';
?>

<?php
include '../../connection/connection.php';
$sql = "SELECT * FROM psi_collaborators WHERE col_id = '" . $_GET['id'] . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $col_name = $row['col_name'];
        $col_abbr = $row['col_abbr'];
        $ot_id = $row['ot_id'];
    }
}
$conn->close();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Collaborator</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <form action="../backend/update_collaborator.php" method="get">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Collaborator Information</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Agency Name</label>
                                    <input type="text" name="col_name" value="<?= $col_name ?>" placeholder="Enter Agency Name" class="form-control">
                                </div>
                            </div>
                            <input type="text" class="form-control" name="col_id" value="<?= $_GET['id'] ?>" hidden>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Abbreviation</label>
                                    <input type="text" name="col_abbr" value="<?= $col_abbr ?>" placeholder="Enter Agency Abbreviation" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label>Category</label>
                                    <select name="ot_id" id="ot_id" class="form-control">
                                        <option value="">Select Category</option>
                                        <?php
                                        include '../../connection/connection.php';
                                        $sql = "SELECT * FROM psi_col_category";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<option value="' . $row["cat_id"] . '"';
                                                if ($row["cat_id"] == $ot_id) {
                                                    echo 'selected';
                                                }
                                                echo '>' . $row["ot_name"] . '</option>';
                                            }
                                        }
                                        $conn->close();
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="text-align: center">
                    <button type="submit" class="btn btn-primary btn-lg">Submit Consultancy</button>
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