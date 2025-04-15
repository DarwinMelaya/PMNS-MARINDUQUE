<?php
$page = "supplier_list";
include 'template/header.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Advanced Form</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Advanced Form</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with minimal features & hover style</h3>
              <a href="add_supplier.php" class="btn btn-primary btn-sm float-right">Add&nbsp;<i class="fa fa-plus"></i></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Other Service</th>
                    <th>Designation</th>
                    <th>Expertise</th>
                    <th>Product Line</th>
                    <th>Contact Person</th>
                    <th>Address</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include '../../../cms/connection/connection.php';

                  $sql = "SELECT * from psi_service_providers";
                  $result = mysqli_query($conn, $sql);
                  while ($row = mysqli_fetch_array($result)) {
                    echo "<tr><td>" . $row["sp_id"] . "</td>";
                    echo "<td>" . $row["sp_name"] . "</td>";
                    echo "<td>" . $row["sp_other_service"] . "</td>";
                    echo "<td>" . $row["sp_designation"] . "</td>";
                    echo "<td>" . $row["sp_expertise"] . "</td>";
                    echo "<td>" . $row["sp_product_line"] . "</td>";
                    echo "<td>" . $row["sp_fname"] . " " . $row["sp_mname"] . " " . $row["sp_lname"] . "</td>";
                    echo "<td>" . $row["sp_address"] . "</td>";
                    echo  '<td style="text-align: center;">
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="view_supply.php?id=' . $row["sp_id"] . '" type="button" class="btn btn-primary btn-sm" title="view details">
                          <i class="fas fa-eye"></i>
                        </a>
                        <a href="../backend/delete_supply.php?id=' . $row["sp_id"] . '" type="button" class="btn btn-danger btn-sm" title="delete project">
                          <i class="fas fa-trash-alt"></i>
                        </a>
                      </div>
                    </td></tr>';
                  }
                  ?>

                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'template/footer.php';
?>