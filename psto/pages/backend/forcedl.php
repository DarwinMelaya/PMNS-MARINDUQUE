<?php

include("../../connection/connection.php");
if (isset($_REQUEST["file_id"])) {
    // Get parameters
    $file = urldecode($_REQUEST["file_id"]); // Decode URL-encoded string
    $id = $_REQUEST["file_id"];

    $sql = "SELECT * FROM project_files pf
    left join document_name dn on pf.doc_id = dn.doc_id
    WHERE file_id=$id";

    $result = mysqli_query($conn, $sql);
    $file = mysqli_fetch_assoc($result);
    $filepath = '../uploads/' . $file['filename'] . '.' . $file['type'];

    // Process download
    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $file['doc_name'] . '.' . $file['type'] . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        flush(); // Flush system output buffer
        readfile($filepath);
        die();
    } else {
        http_response_code(404);
        die();
    }
}
