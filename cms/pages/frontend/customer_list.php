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
                    include '../../connection/connection.php';

                    $sql = "SELECT * from psi_cooperators";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result)) {


                      $address = explode(",", $row['coop_address']);
                      $street = $address[0];
                      $brgy = "SELECT * from province prov 
                    left join citymun city on city.province_c = prov.province_id 
                    left join barangays brg on brg.city_id= city.citymun_id  where province_id ='" . $address[3] . "' AND citymun_id ='" . $address[2] . "' AND barangay_id='" . $address[1] . "'";
                      $resultbrg = mysqli_query($conn, $brgy);
                      while ($row1 = mysqli_fetch_array($resultbrg)) {
                        $barangay = $row1['barangay_name'];
                        $city_mun = $row1['citymun_m'];
                        $province = $row1['province_m'];
                      }
                      echo "<tr>";
                      echo "<td>" . $row["coop_name"] . "</td>";
                      echo "<td>" . $street . ", " . $barangay . ", " . $city_mun . ", " . $province . "</td>";
                      echo "<td>" . $row["coop_year_established"] . "</td>";
                      echo "<td>" . $row["coop_reg_dti"] . "</td>";
                      echo "<td>" . $row["coop_reg_dti_date"] . "</td>";
                      echo "<td>" . $row["coop_p_fname"] . " " . $row["coop_p_mname"] . " " . $row["coop_p_lname"];
                      echo "<td>" . $row["coop_phone"] . "</td>";
                      echo "<td>" . $row["coop_mobile"] . "</td>";
                      echo "<td>" . $row["coop_email"] . "</td>";
                      echo "<td><a href='https://" . $row["coop_website"] . "' target='_blank'>" . $row["coop_website"] . "</a></td>";
                      echo  '<td style="text-align: center;">
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="view_customer.php?id=' . $row["coop_id"] . '" type="button" class="btn btn-primary btn-sm" title="view details">
                          <i class="fas fa-eye"></i>
                        </a>'; ?>
                      <a href="#" type="button" class="btn btn-success btn-sm" title="Edit Customer" onclick="editCustomer('<?= $row['coop_id'] ?>')">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a href="#" type="button" class="btn btn-danger btn-sm" title="Delete Customer" onclick="deleteCustomer('<?= $row['coop_id'] ?>')">
                        <i class="fas fa-trash-alt"></i>
                      </a>
                    <?php echo '
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
<script>
  function deleteCustomer(coopId) {
    Swal.fire({
      title: 'Are you sure you want to delete this customer?',
      text: "This action cannot be undone!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Confirm'
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          title: "Delete!",
          text: "The Customer has been deleted.",
          icon: "success"
        });
        window.location.href = "../backend/delete_customer.php?id=" + coopId;
      }
    });
  }

  function editCustomer(coopId) {
    Swal.fire({
      title: 'Are you sure you want to edit this project?',
      text: "This action cannot be undone!",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Confirm'
    }).then((result) => {
      if (result.isConfirmed) {
        // Send AJAX request or redirect to delete_project.php with projectId
        window.location.href = "edit_customer.php?id=" + coopId;
      }
    });
  }
</script>
<?php
include 'template/footer.php';
?>