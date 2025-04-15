<?php
// Start Session
session_start();

// Get the actual date in Manila
date_default_timezone_set('Asia/Manila');

// Remove unauthorized users
if ($_SESSION['id'] == "") header("Location:../../../");

// Include the  database connection php script
include '../../connection/connection.php';
$email = base64_encode($_GET['email']);
if (isset($_GET['password'])) {
    $password = password_hash(sha1($_GET["password"]), PASSWORD_BCRYPT, ['cost' => 12]);
    $sql = "UPDATE users SET username=?, password=?, user_fname=?, user_lname=?, email=?, date_updated=? WHERE user_id=?";
    $date_updated = date("Y-m-d | H:i:s");

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "ssssssi",
        $_GET['username'],
        $password,
        $_GET['fname'],
        $_GET['lname'],
        $email,
        $date_updated,
        $_SESSION['id'] // Assuming 'project_id' is passed in the GET parameters for identifying the record to update
    );
} else {
    $sql = "UPDATE users SET username=?, user_fname=?, user_lname=?, email=?, date_updated=? WHERE user_id=?";
    $date_updated = date("Y-m-d | H:i:s");

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "sssssi",
        $_GET['username'],
        $_GET['fname'],
        $_GET['lname'],
        $email,
        $date_updated,
        $_SESSION['id'] // Assuming 'project_id' is passed in the GET parameters for identifying the record to update
    );
}
// Prepare SQL statement for update

// Execute the statement
if ($stmt->execute()) {
    header("Location: ../frontend/profile.php?id=" . $_SESSION['id']);
} else {
    echo "Error: " . $conn->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
