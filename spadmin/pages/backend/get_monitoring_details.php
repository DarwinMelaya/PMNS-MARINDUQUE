<?php session_start();
include "../../connection/connection.php";


//  view modal
if (isset($_POST['click_view_btn'])) {
  $id = $_POST['proj_id'];
  $fetch_query = "SELECT * from project_files pf
  left join document_name prj on pf.doc_id = prj.doc_id
    WHERE project_id = $id";
  $fetch_query_run = mysqli_query($conn, $fetch_query);
?>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <form action="project_monitoring.php?" method="POST" enctype="multipart/form-data">
          <input type="file" class="form-control" name="myfile">
          <input type="hidden" name=""></input>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <select class="form-control select2" name="docid" id="docid" data-placeholder="Select Document Type" required>
          <option>Select Document Type</option>';
          <?php
          $docsql = 'SELECT * from document_name';
          $docsql_run = mysqli_query($conn, $docsql);
          if ($docsql_run->num_rows > 0) {
            while ($row = $docsql_run->fetch_assoc()) {
              echo '<option value="' . $row["doc_id"] . '">' . $row["doc_name"] . '</option>';
            }
          }
          ?>

        </select>
      </div>
    </div>
    <button type="submit" name="save" class="btn-primary"> Upload Project Files</button></form>
  </div>

  <table class="table caption-top">
    <caption>File Documents</caption>
    <thead>
      <tr>
        <th scope="col">File Number</th>
        <th scope="col">Name</th>
        <th scope="col">Date</th>
        <th scope="col">Check</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
      <tr>

      <?php
      if (mysqli_num_rows($fetch_query_run) > 0) {
        while ($row = mysqli_fetch_array($fetch_query_run)) {
          echo '<td>' . $row['file_id'] . '</td>';
          echo '<td>' . $row['doc_name'] . '</td>';
          echo '<td>' . $row['datecreated'] . '</td>';
          echo '<td> </td>';
          echo '<td> Download </td></tr>';
        }
      } else {
        echo $result = '<td><h4>No record found</h4></td>';
      }
      echo '</tr>
  </tbody>
</table>
    ';
    } ?>