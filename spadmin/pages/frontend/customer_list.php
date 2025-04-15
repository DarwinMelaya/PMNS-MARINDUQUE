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


            <div class="card">
              <div class="card-header">
                <h2 class="card-title">DataTable with default features</h2>
                <a href="add_customer.php" class="btn btn-primary btn-sm float-right">Add &nbsp;<i class="fas fa-plus"></i></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Customer Name</th>
                      <th>Address</th>
                      <th>Year Established</th>
                      <th>Register DTI</th>
                      <th>Date DTI Register</th>
                      <th>Owner</th>
                      <th>Phone No.</th>
                      <th>Mobile No.</th>
                      <th>Email</th>
                      <th>Website</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include '../../../cms/connection/connection.php';

                    $sql = "SELECT * from psi_cooperators";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                      echo "<tr><td>" . $row["coop_id"] . "</td>";
                      echo "<td>" . $row["coop_name"] . "</td>";
                      echo "<td>" . $row["coop_address"] . "</td>";
                      echo "<td>" . $row["coop_year_established"] . "</td>";
                      echo "<td>" . $row["coop_reg_dti"] . "</td>";
                      echo "<td>" . $row["coop_reg_dti_date"] . "</td>";
                      echo "<td>" . $row["coop_p_fname"] . " " . $row["coop_p_mname"] . " " . $row["coop_p_lname"];
                      echo "<td>" . $row["coop_phone"] . "</td>";
                      echo "<td>" . $row["coop_mobile"] . "</td>";
                      echo "<td>" . $row["coop_email"] . "</td>";
                      echo "<td>" . $row["coop_website"] . "</td>";
                      echo  '<td style="text-align: center;">
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="view_customer.php?id=' . $row["coop_id"] . '" type="button" class="btn btn-primary btn-sm" title="view details">
                          <i class="fas fa-eye"></i>
                        </a>
                        <a href="../backend/delete_customer.php?id=' . $row["coop_id"] . '" type="button" class="btn btn-danger btn-sm" title="delete project">
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