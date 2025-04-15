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
              <a href="add_equipment.php" class="btn btn-primary btn-sm float-right">ADD&nbsp;<i class="fa fa-plus"></i></a>
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
                  include '../../../cms/connection/connection.php';

                  $sqlquery = "SELECT * from psi_equipment eq
                  left join psi_equipment_brands eqp on eq.brand_id = eqp.brand_id";
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
                    echo "<td>" . $row["eqp_acquired"] . "</td>";

                    echo  '<td style="text-align: center;">
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="view_equipment.php?id=' . $row["eqp_id"] . '" type="button" class="btn btn-primary btn-sm" title="view details">
                          <i class="fas fa-eye"></i>
                        </a>
                        <a href="#deleteEmployeeModal" type="button" class="btn btn-danger btn-sm" title="delete project">
                          <i class="fas fa-trash-alt"></i>
                        </a>
                      </div>
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
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form>
        <div class="modal-header">
          <h4 class="modal-title">Delete User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="id_d" name="id" class="form-control">
          <p>Are you sure you want to delete these Records?</p>
          <p class="text-warning"><small>This action cannot be undone.</small></p>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
          <button type="button" class="btn btn-danger" id="delete">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  $(document).on("click", ".delete", function() {
    var id = $(this).attr("data-id");
    $('#id_d').val(id);

  });
  $(document).on("click", "#delete", function() {
    $.ajax({
      url: "backend/save.php",
      type: "POST",
      cache: false,
      data: {
        type: 3,
        id: $("#id_d").val()
      },
      success: function(dataResult) {
        $('#deleteEmployeeModal').modal('hide');
        $("#" + dataResult).remove();

      }
    });
  });
  $(document).on("click", "#delete_multiple", function() {
    var user = [];
    $(".user_checkbox:checked").each(function() {
      user.push($(this).data('user-id'));
    });
    if (user.length <= 0) {
      alert("Please select records.");
    } else {
      WRN_PROFILE_DELETE = "Are you sure you want to delete " + (user.length > 1 ? "these" : "this") + " row?";
      var checked = confirm(WRN_PROFILE_DELETE);
      if (checked == true) {
        var selected_values = user.join(",");
        console.log(selected_values);
        $.ajax({
          type: "POST",
          url: "backend/save.php",
          cache: false,
          data: {
            type: 4,
            id: selected_values
          },
          success: function(response) {
            var ids = response.split(",");
            for (var i = 0; i < ids.length; i++) {
              $("#" + ids[i]).remove();
            }
          }
        });
      }
    }
  });
  $(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
    var checkbox = $('table tbody input[type="checkbox"]');
    $("#selectAll").click(function() {
      if (this.checked) {
        checkbox.each(function() {
          this.checked = true;
        });
      } else {
        checkbox.each(function() {
          this.checked = false;
        });
      }
    });
    checkbox.click(function() {
      if (!this.checked) {
        $("#selectAll").prop("checked", false);
      }
    });
  });
</script>
<!-- /.content-wrapper -->
<?php
include 'template/footer.php';
?>