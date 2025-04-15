<?php
// connect to the database
include("../../connection/connection.php");

if ($_SESSION['id'] == "") header("Location:../../../");
$prj_id = $_GET["id"];

$sql = "SELECT * FROM project_files pf
left join document_name dn on pf.doc_id = dn.doc_id
where project_id = $prj_id";

$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);
// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked

    $doc_id = $_POST['docid'];
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $filename1 = pathinfo($filename, PATHINFO_FILENAME);

    // destination of the file on the server
    $destination = '../uploads/' . sha1($filename1) . '.' . $extension;

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql1 = "INSERT INTO project_files (filename,type, size, downloads,project_id,doc_id) VALUES (sha1('$filename1'),'$extension', $size, 0,$prj_id,$doc_id)";
            if (mysqli_query($conn, $sql1)) {
                echo "File uploaded successfully";
            }
        } else {
            echo "Failed to upload file.";
        }
    }
}
