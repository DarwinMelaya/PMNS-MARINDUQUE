<?php
$page = "consultancy_masterlist";
include 'template/header.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Consultancy</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Consultancy</li>
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
          <!-- /.card -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Masterlist of Consultancies</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example5" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Type</th>
                    <th>Consultant</th>
                    <th>Duration</th>
                    <th>Amount</th>
                    <th>No. of Males</th>
                    <th>No. of Females</th>
                    <th>Senior citizen</th>
                    <th>IPe</th>
                    <th>Firm Name</th>
                    <th>Propietor</th>
                    <th>Contact No.</th>
                    <th>Sex</th>
                    <th>Address</th>
                    <th>Product Line</th>
                    <th>Sector</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include '../../connection/connection.php';

                  // SQL query to retrieve data
                  $sql = "select * from consultancies c left join psi_consultancy_types t on c.consultancy_type = t.con_type_id  order by c.date_encoded desc";

                  // Execute the query
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      $consultancy_start = $row["consultancy_start"];
                      $consultancy_end = $row["consultancy_end"];
                      $consultancy_start = date_create($consultancy_start);
                      $consultancy_end = date_create($consultancy_end);

                      if ($row["gender"] == 1) {
                        $sex = "Female";
                      } else {
                        $sex = "Male";
                      }

                      echo "<tr>";
                      echo "<td>" . $row["con_type_name"] . "</td>";
                      echo "<td>" . $row["consultant_name"] . "</td>";
                      echo "<td>" . date_format($consultancy_start, "M d, Y") . " to " . date_format($consultancy_end, "M d, Y") . "</td>";
                      echo "<td> PhP" . number_format($row["consultancy_cost"],2) . "</td>";
                      echo "<td>" . $row["no_male"] . "</td>";
                      echo "<td>" . $row["no_female"] . "</td>";
                      echo "<td>" . $row["no_sr"] . "</td>";
                      echo "<td>" . $row["no_ip"] . "</td>";
                      echo "<td>" . $row["firm_name"] . "</td>";
                      echo "<td>" . $row["proprietor"] . "</td>";
                      echo "<td>" . $row["contact_no"] . "</td>";
                      echo "<td>" . $sex . "</td>";
                      echo "<td>";
                      if (!empty($row['street'])) {
                        echo $row['street'] . ', ';
                      }
                      if ($row['barangay'] != 0) {
                        echo $row['barangay_name'] . ', ';
                      }
                      if (isset($row['city_mun'])) {
                        if ($row['city_mun'] != 0) {
                          echo $row['city_mun'] . ', ';
                        }
                      }
                      if (isset($row['province_m'])) {
                        echo $row['province_m'];
                      }
                      echo "</td>";
                      echo "<td>" . $row["prod_line"] . "</td>";
                      echo "<td>" . $row["sector"] . "</td>";
                      echo '
                              <td style="text-align: center;">
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                  <a href="view_consultancy.php?id=' . $row["consultancy_id"] . '" type="button" class="btn btn-primary btn-sm" title="view details">
                                    <i class="fas fa-eye"></i>
                                  </a>';
                    if($_SESSION['level']==1 ||$_SESSION['level']==0){
                                  echo '
                                  <a href="edit_consultancy.php?id=' . $row["consultancy_id"] . '" type="button" class="btn btn-success btn-sm" title="edit project">
                                    <i class="fas fa-edit"></i>
                                  </a>
                                  <a href="../backend/delete_consultancy.php?id=' . $row["consultancy_id"] . '" type="button" class="btn btn-danger btn-sm" title="delete project">
                                    <i class="fas fa-trash-alt"></i>
                                  </a>';}
                     echo'
                                </div>
                              </td>';
                      echo "</tr>";
                    }
                  }

                  // Close connection
                  $conn->close();

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