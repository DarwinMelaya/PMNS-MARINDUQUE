<?php
include '../../connection/connection.php';

$project_id = $_GET['project_id']; // Assuming it is passed as a query parameter

// Use prepared statements to avoid SQL injection
$stmt = $conn->prepare("
    SELECT d.doc_id, d.document_title, p.file_name,
           CASE WHEN p.doc_id IS NOT NULL THEN 1 ELSE 0 END AS is_uploaded
    FROM docs_list d 
    LEFT JOIN pidocs_uploads p 
    ON d.doc_id = p.doc_id AND p.project_id = ? 
    WHERE d.gia_req = '1' order by d.gia_arr asc
"); 
$stmt->bind_param("s", $project_id); // Bind the project ID as a string
$stmt->execute();
$result = $stmt->get_result();

$documents = []; // Initialize array to store document data

while ($row = $result->fetch_assoc()) {
    $is_na = ($row['file_name'] === "N/A") ? " (Not Required)" : ""; // Append "(Not Required)" if file_name is "N/A"

    $documents[] = [
        'document_title' => $row['document_title'] . $is_na, // Use "." for string concatenation
        'is_uploaded' => (int)$row['is_uploaded'], // Ensure it's an integer
    ];
}

// Return the result as a JSON response
echo json_encode($documents);

// Close connections
$stmt->close();
$conn->close();
?>
