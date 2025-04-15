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
          <h1>Equipment Database</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Equipment Database</li>
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
              <h3 class="card-title">Equipment Database</h3>
              <a href="add_equipment.php" class="btn btn-primary  float-right">ADD Equipment&nbsp;<i class="fa fa-plus"></i></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Equipment Specification(s)</th>
                    <th>Equipment Quantity</th>
                    <th>Quantity</th>
                    <th>Amount Approved</th>
                    <th>Type of Equipment</th>
                    <th>Equipment Receipt No.</th>
                    <th>Warranty date year</th>
                    <th>Receipt Date</th>
                    <th>Equipment date tag</th>
                    <th>Remarks</th>
                    <th>Equipment Specification Acquired</th>
                    <th>Equipment Brand</th>
                    <th>Amount Acquired</th>
                    <th>Quantity Acquired</th>
                    <th>Equipment Acquired</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include '../../connection/connection.php';

                  $sqlquery = "SELECT * from psi_equipment";
                  $res = mysqli_query($conn, $sqlquery);
                  while ($row = mysqli_fetch_array($res)) {

                    echo "<div hidden>" . $row["eqp_id"] . "</div>";
                    echo "<tr><td>" . $row["eqp_specs"] . "</td>";
                    echo "<td>" . $row["eqp_property_no"] . "</td>";
                    echo "<td>" . $row["eqp_qty"] . "</td>";
                    echo "<td>" . $row["eqp_amount_approved"] . "</td>";
                    echo "<td> type of equipment </td>";
                    echo "<td>" . $row["eqp_receipt_no"] . "</td>";
                    echo "<td>" . $row["eqp_warranty"] . "</td>";
                    echo "<td>" . $row["eqp_receipt_date"] . "</td>";
                    echo "<td>" . $row["eqp_date_tagged"] . "</td>";
                    echo "<td>" . $row["eqp_remarks"] . "</td>";
                    echo "<td>" . $row["eqp_specs_acquired"] . "</td>";
                    echo "<td>" . $row["brand_name"] . "</td>";
                    echo "<td>" . number_format($row["eqp_amount_acquired"], 2) . "</td>";
                    echo "<td>" . $row["eqp_qty_acquired"] . "</td>";
                    echo "<td>";
                    if (isset($row['eqp_acquired'])) {
                      switch ($row['eqp_acquired']) {
                        case 1:
                          echo "Yes";
                          break;
                        case 2:
                          echo "No";
                          break;
                        default:
                          break;
                      }
                    }
                    echo "</td>";

                    echo  '<td style="text-align: center;">
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="view_equipment.php?id=' . $row["eqp_id"] . '" type="button" class="btn btn-primary btn-sm" title="view details">
                          <i class="fas fa-eye"></i>
                        </a>'; ?>
                    <a href="#" type="button" class="btn btn-success btn-sm" title="Edit Equipment" onclick="editEquipment('<?= $row['eqp_id'] ?>')">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" type="button" class="btn btn-danger btn-sm" title="Delete Equipment" onclick="deleteEquipment('<?= $row['eqp_id'] ?>')">
                      <i class="fas fa-trash-alt"></i>
                    </a>
                  <?php echo '</div>
                    </td></tr>';
                    // ../backend/delete_equipment.php?id=' . $row["eqp_id"] . '
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
<script>
  function deleteEquipment(eqp_Id) {
    Swal.fire({
      title: 'Are you sure you want to delete this equipment?',
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
          text: "The Equipment has been deleted.",
          icon: "success"
        });
        window.location.href = "../backend/delete_equipment.php?id=" + eqp_Id;
      }
    });
  }

  function editEquipment(eqp_Id) {
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
        window.location.href = "edit_equipment.php?id=" + eqp_Id;
      }
    });
  }
</script>
<!-- /.content-wrapper -->
<?php
include 'template/footer.php';
?>