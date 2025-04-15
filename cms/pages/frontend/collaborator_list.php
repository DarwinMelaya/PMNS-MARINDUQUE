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
                    <h1>Collaborator list</h1>
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
            <div class="row">
                <div class="col-12">
                    <div class="card">


                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title"></h2>
                                <a href="add_collaborators.php" class="btn btn-primary btn-sm float-right">Add &nbsp;<i class="fas fa-plus"></i></a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Collaborator Name</th>
                                            <th>Abbreviation</th>
                                            <th>Category</th>
                                            <th>Date Encoded</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../../connection/connection.php';

                                        $sql = "SELECT * from psi_collaborators";
                                        $result = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_array($result)) {

                                            switch ($row['ot_id']) {
                                                case '1':
                                                    $cat_name = 'Academe';
                                                    break;
                                                case '2':
                                                    $cat_name = 'Funding Agency';
                                                    break;
                                                case '3':
                                                    $cat_name = 'Government';
                                                    break;
                                                case '4':
                                                    $cat_name = 'Local Government Unit';
                                                    break;
                                                case '5':
                                                    $cat_name = 'Non-Government Organization';
                                                    break;
                                                case '6':
                                                    $cat_name = 'Private Sector';
                                                    break;
                                                default:
                                                    break;
                                            }

                                            echo "<td>" . $row["col_name"] . "</td>";
                                            echo "<td>" . $row["col_abbr"] . "</td>";
                                            echo "<td>" . $cat_name . "</td>";
                                            echo "<td>" . date_format(date_create($row['date_encoded']), "F d, Y") . "</td>";
                                            echo  '<td style="text-align: center;">
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="view_customer.php?id=' . $row["col_id"] . '" type="button" class="btn btn-primary btn-sm" title="view details">
                          <i class="fas fa-eye"></i>
                        </a>'; ?>
                                            <a href="#" type="button" class="btn btn-success btn-sm" title="Edit Collaborator" onclick="editCollaborator('<?= $row['col_id'] ?>')">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" type="button" class="btn btn-danger btn-sm" title="Delete Collaborator" onclick="deleteCollaborator('<?= $row['col_id'] ?>')">
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
    function deleteCollaborator(col_id) {
        Swal.fire({
            title: 'Are you sure you want to delete this collaborator?',
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
                    text: "The Collaborator has been deleted.",
                    icon: "success"
                });
                window.location.href = "../backend/delete_collaborator.php?id=" + col_id;
            }
        });
    }

    function editCollaborator(col_id) {
        Swal.fire({
            title: 'Are you sure you want to edit this collaborator?',
            text: "This action cannot be undone!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirm'
        }).then((result) => {
            if (result.isConfirmed) {
                // Send AJAX request or redirect to delete_project.php with projectId
                window.location.href = "edit_collaborator.php?id=" + col_id;
            }
        });
    }
</script>
<?php
include 'template/footer.php';
?>