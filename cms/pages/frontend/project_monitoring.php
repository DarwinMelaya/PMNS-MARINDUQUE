<?php
$page = "project_monitoring";
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

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Projects</h3>
      </div>
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped" style="overflow-x:auto;">
          <thead>
            <tr>
              <th style="width: 10%">
                Project ID
              </th>
              <th style="width: 10%">
                Project Code
              </th>
              <th style="width: 20%">
                Project Title
              </th>
              <th style="width: 20%">
                Project Description
              </th>
              <th>
                Project Progress
              </th>
              <th style="width: 8%" class="text-center">
                Status
              </th>
              <th style="width: 20%" class="text-center">
                Action
              </th>
            </tr>
          </thead>
          <tbody>

            <?php
            include('../../connection/connection.php');

            // SQL query to retrieve data
            $sql = "SELECT * FROM projects";
            // Execute the query
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                switch ($row["status"]) {
                  case "3":
                    $badge = "primary";
                    $stat = "New";
                    break;
                  case "1":
                    $badge = "warning";
                    $stat = "On-going";
                    break;
                  case "4":
                    $badge = "success";
                    $stat = "Graduated";
                    break;
                  case "5":
                    $badge = "secondary";
                    $stat = "Deferred";
                    break;
                  case "6":
                    $badge = "danger";
                    $stat = "Terminated";
                    break;
                  case "7":
                    $badge = "info";
                    $stat = "Withdrawn";
                    break;
                  default:
                    break;
                }
                if ($row['percent'] == 100) {
                  $badge1 = "success";
                } else if ($row['percent'] >= 50) {
                  $badge1 = "warning";
                } else if ($row['percent'] >= 0) {
                  $badge1 = "primary";
                }

                echo "<tr>";
                echo "<td class='proj_id'>" . $row["project_id"] . "</td>";
                echo "<td>" . $row["project_code"] . "</td>";
                echo "<td>" . $row["project_title"] . "</td>";
                echo "<td>" . $row["project_desc"] . "</td>";
                echo "<td class='project_progress'>
                              <div class='progress progress-sm'>
                              <div class='progress-bar bg-" . $badge1 . "' role='progressbar' aria-valuenow='" . $row["percent"] . "' aria-valuemin='0' aria-valuemax='100' style='width:" . $row["percent"] . "%'>
                                  </div>
                              </div>
                              <small>
                                  " . $row["percent"] . "% Complete
                              </small>
                          </td>";

                echo "<td class='project-state'><span class='badge badge-$badge'>" . $stat . "</span></td>";
                echo "<td class='project-actions text-center'>
                    <a href='#' class='btn btn-info btn-sm view_data'>
                        <i class='fas fa-pencil-alt'>
                        </i>
                        View & Uploading File
                    </a>

                </td></tr>";
              }
            }

            ?>

          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- view modal -->
<div class="modal fade" id="viewusermodal" tabindex="-1" aria-labelledby="viewusermodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="viewusermodalLabel">File Documents</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="view_user_data">

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<?php
include 'template/charts.php';
include 'template/footer.php';
?>
<script>
  // view data
  $(document).ready(function() {

    $('.view_data').click(function(e) {
      e.preventDefault();
      var proj_id = $(this).closest('tr').find('.proj_id').text();


      $.ajax({
        method: "POST",
        url: "../backend/get_monitoring_details.php",
        data: {
          'click_view_btn': true,
          'proj_id': proj_id,
        },
        success: function(response) {
          $('.view_user_data').html(response);
          $('#viewusermodal').modal('show');
        }
      });
    });
  });
</script>