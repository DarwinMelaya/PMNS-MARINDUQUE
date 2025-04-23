<?php
$page = "gia_masterlist";
include 'template/header.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Add this right after content-wrapper div opens -->
    <style>
        @media print {
            @page {
                size: landscape;
                margin: 1cm;
            }
            
            body * {
                visibility: hidden;
            }
            
            .print-section, .print-section * {
                visibility: visible;
            }
            
            .print-section {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }
            
            .no-print {
                display: none !important;
            }
            
            table {
                width: 100% !important;
                font-size: 11px !important;
            }
            
            th, td {
                padding: 5px !important;
                border: 1px solid black !important;
            }
            
            .print-header {
                text-align: center;
                margin-bottom: 20px;
            }
            
            /* Remove grey background */
            .card, 
            .card-body, 
            .content-wrapper,
            .table-bordered,
            .table-hover,
            table,
            tbody tr,
            thead tr {
                background-color: white !important;
                background: white !important;
            }
            
            /* Ensure table cells are white */
            table th,
            table td {
                background-color: white !important;
                background: white !important;
            }
            
            /* Remove any hover effects */
            tr:hover {
                background-color: white !important;
                background: white !important;
            }
            
            /* Ensure text is black on white */
            * {
                color: black !important;
                background-color: white !important;
            }
            
            /* Remove any shadows */
            .card {
                box-shadow: none !important;
        }
    </style>

    <!-- Add this right before the card div -->
    <div class="print-section" style="display: none;">
        <div class="print-header">
            <img src="../../dist/img/dost_logo.png" alt="DOST Logo" style="height: 80px;">
            <h4 style="margin: 10px 0;">Republic of the Philippines</h4>
            <h4>DEPARTMENT OF SCIENCE AND TECHNOLOGY</h4>
            <h4>MIMAROPA Region</h4>
            <h3>GIA Projects Masterlist</h3>
            <hr>
        </div>
        
        <!-- Table will be cloned here during print -->
        <div id="print-table-container"></div>
    </div>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>GIA Masterlist</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">GIA Projects Masterlist</li>
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
                            <h3 class="card-title">Masterlist of GIA Projects</h3>
                            <div class="float-right">
                                <button class="btn btn-success mr-2" onclick="exportToExcel()">
                                    <i class="fas fa-file-excel"></i> Export to Excel
                                </button>
                                <button class="btn btn-primary" onclick="printReport()">
                                    <i class="fas fa-print"></i> Print Report
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="tagFilter">Filter by Tag:</label>
                                    <select class="form-control" id="tagFilter">
                                        <option value="">All Tags</option>
                                        <?php
                                        include '../../connection/connection.php';
                                        $tagQuery = "SELECT DISTINCT tag FROM projects WHERE project_type = '1' AND tag IS NOT NULL AND tag != '' ORDER BY tag";
                                        $tagResult = $conn->query($tagQuery);
                                        while ($tagRow = $tagResult->fetch_assoc()) {
                                            echo "<option value='" . htmlspecialchars($tagRow['tag']) . "'>" . htmlspecialchars($tagRow['tag']) . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Tags</th>
                                        <th>Project Code</th>
                                        <th style="width: 25%">Project Title</th>
                                        <th>Province</th>
                                        <th>Date Approved</th>
                                        <th>Project Description</th>
                                        <th>Duration</th>
                                        <th>Proponent</th>
                                        <th>Collaborating Agency</th>
                                        <th>Beneficiaries</th>
                                        <th>Investment Map</th>
                                        <th>Total Project Cost</th>
                                        <th>Amount of Assistance</th>
                                        <th>Counterpart Funding</th>
                                        <th>Date Fund Release</th>
                                        <th>Personal Service</th>
                                        <th>Maintenance and Other Expenses</th>
                                        <th>Equipment Outlay</th>
                                        <th>Mode of Procurement</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include '../../connection/connection.php';

                                    // SQL query to retrieve data
                                    $sql = "SELECT * from projects p where project_type = '1' order by p.date_encoded desc";

                                    // Execute the query
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $duration_from = $row["duration_from"];
                                            $duration_to = $row["duration_to"];
                                            $date_approve = $row["date_approved"];
                                            $date_released = $row["date_released"];
                                            $date_released = date_create($date_released);
                                            $date_approved = date_create($date_approve);
                                            $duration_from = date_create($duration_from);
                                            $duration_to = date_create($duration_to);
                                            $modepro = $row['modepro'];
                                            switch ($modepro) {
                                                case 1:
                                                    $modepro = "Direct Release";
                                                    break;
                                                case 2:
                                                    $modepro = "Regional Office Procurement";
                                                    break;
                                                default:
                                                    $modepro = "";
                                                    break;
                                            }
                                            echo "<tr>";
                                            echo "<td>" . $row["tag"] . "</td>";
                                            echo "<td>" . $row["project_code"] . "</td>";
                                            echo "<td>" . stripslashes($row["project_title"]) . "</td>";
                                            echo "<td>";
                                            if($row['province']=='000'){
                                                echo "REGIONWIDE";
                                            }else if($row['province']=='40'){
                                                echo "MARINDUQUE";
                                            }else if($row['province']=='51'){
                                                echo "OCCIDENTAL MINDORO";
                                            }else if($row['province']=='52'){
                                                echo "ORIENTAL MINDORO";
                                            }else if($row['province']=='53'){
                                                echo "PALAWAN";
                                            }else if($row['province']=='59'){
                                                echo "ROMBLON";
                                            }else if($row['province']=='315'){
                                                echo "PUERTO PRINCESA";
                                            }
                                            
                                            echo "</td>";
                                            echo "<td>" . date_format($date_approved, "M d, Y") . "</td>";
                                            echo "<td>" . stripslashes($row["project_desc"]) . "</td>";
                                            echo "<td>" . date_format($duration_from, "M d, Y") . " to " . date_format($duration_to, "M d, Y") . "</td>";
                                            echo "<td>" . stripslashes($row["proponent"]) . " </td>";
                                            echo "<td>" . stripslashes($row["collaborating_agencies"]) . "</td>";
                                            echo "<td>" . stripslashes($row["beneficiaries"]) . "</td>";
                                            echo "<td>" . $row['investment_map'] . " </td>";
                                            echo "<td> Php " . number_format(($row["counterpart_fund"]+$row["personal_service"]+$row["maintenance_other"]+$row["equip_outlay"]), 2) . "</td>";
                                            echo "<td> Php " . number_format(($row["personal_service"]+$row["maintenance_other"]+$row["equip_outlay"]), 2) . "</td>";
                                            echo "<td> Php" . number_format($row["counterpart_fund"], 2) . "</td>";
                                            echo "<td>" . date_format($date_released, "F d, Y") . "</td>";
                                            echo "<td> Php" . number_format($row["personal_service"], 2) . "</td>";
                                            echo "<td> Php" . number_format($row["maintenance_other"], 2) . "</td>";
                                            echo "<td> Php" . number_format($row["equip_outlay"], 2) . "</td>";
                                            echo "<td>" . $modepro . "</td>";
                                            echo "<td>" . stripslashes($row["counterpart_desc"]) . "</td>";
                                            echo '
                              <td style="text-align: center;">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <a href="view_project_gia.php?id=' . $row["project_id"] . '" type="button" class="btn btn-primary btn-sm" title="View Details">
                                    <i class="fas fa-eye"></i>
                                  </a>'; 
                                  if($_SESSION['level']=='1' || $_SESSION['level']==0){
                                  ?>
                                            <a href="#" type="button" class="btn btn-success btn-sm" title="Edit Project" onclick="editProject('<?= $row['project_id'] ?>')">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" type="button" class="btn btn-danger btn-sm" title="Delete Project" onclick="deleteProject(' <?= $row['project_id'] ?>')">
                                                <i class="fas fa-trash-alt"></i>
                                            </a><?php } echo '
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

<script>
    function deleteProject(projectId) {
        Swal.fire({
            title: 'Are you sure you want to delete this project?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete'
        }).then((result) => {
            if (result.isConfirmed) {
                // Send AJAX request or redirect to delete_project.php with projectId
                window.location.href = "../backend/delete_project.php?id=" + projectId;
            }
        });
    }

    function editProject(projectId) {
        Swal.fire({
            title: 'Are you sure you want to update this project?',
            text: "This action cannot be undone!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirm'
        }).then((result) => {
            if (result.isConfirmed) {
                // Send AJAX request or redirect to delete_project.php with projectId
                window.location.href = "../frontend/edit_gia.php?id=" + projectId;
            }
        });
        
    }

    function printReport() {
        // Clone the table and prepare it for printing
        const originalTable = document.getElementById('example2');
        const printSection = document.querySelector('.print-section');
        const printTableContainer = document.getElementById('print-table-container');
        
        // Clear previous content
        printTableContainer.innerHTML = '';
        
        // Clone the table
        const tableClone = originalTable.cloneNode(true);
        
        // Remove the action column
        const headers = tableClone.querySelectorAll('th');
        const lastHeader = headers[headers.length - 1];
        if (lastHeader.textContent.trim().toLowerCase() === 'action') {
            lastHeader.remove();
        }
        
        const rows = tableClone.querySelectorAll('tr');
        rows.forEach(row => {
            const cells = row.querySelectorAll('td');
            if (cells.length > 0) {
                const lastCell = cells[cells.length - 1];
                if (lastCell.querySelector('.btn-group')) {
                    lastCell.remove();
                }
            }
        });
        
        // Add the modified table to the print section
        printTableContainer.appendChild(tableClone);
        
        // Show print section
        printSection.style.display = 'block';
        
        // Print
        window.print();
        
        // Hide print section after printing
        setTimeout(() => {
            printSection.style.display = 'none';
        }, 1000);
    }

    function exportToExcel() {
        // Create a form to submit the POST request
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '../backend/export_gia_excel.php';
        
        // Get the table data
        const table = document.getElementById('example2');
        const tableHTML = table.outerHTML;
        
        // Create a hidden input field with the table data
        const hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = 'table_data';
        hiddenInput.value = tableHTML;
        
        // Append the input to the form
        form.appendChild(hiddenInput);
        
        // Append the form to the body and submit it
        document.body.appendChild(form);
        form.submit();
        
        // Remove the form from the document
        document.body.removeChild(form);
    }

    // Add class to elements that shouldn't be printed
    document.addEventListener('DOMContentLoaded', function() {
        const noPrintElements = [
            '.main-header',
            '.main-sidebar',
            '.content-header',
            '.btn-group'
        ];
        
        noPrintElements.forEach(selector => {
            document.querySelectorAll(selector).forEach(el => {
                el.classList.add('no-print');
            });
        });
    });

    // Add this new function for tag filtering
    document.getElementById('tagFilter').addEventListener('change', function() {
        const selectedTag = this.value;
        const table = $('#example2').DataTable();
        
        // Clear any existing filter and apply new filter if a tag is selected
        table.column(0).search(selectedTag).draw();
    });

    // Modify the DataTable initialization
    $(document).ready(function() {
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "order": [[4, "desc"]] // Sort by Date Approved by default
        });
    });
</script>
<?php
include 'template/footer.php';
?>