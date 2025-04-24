<?php
session_start();
include '../../connection/connection.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    
    switch ($action) {
        case 'add':
            $type_name = $_POST['type_name'] ?? '';
            if (!empty($type_name)) {
                $sql = "INSERT INTO beneficiary_types (type_name) VALUES (?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $type_name);
                
                if ($stmt->execute()) {
                    echo json_encode(['success' => true, 'id' => $conn->insert_id, 'message' => 'Type added successfully']);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Error adding type']);
                }
                $stmt->close();
            }
            break;
            
        case 'remove':
            $type_id = $_POST['type_id'] ?? '';
            if (!empty($type_id)) {
                $sql = "DELETE FROM beneficiary_types WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $type_id);
                
                if ($stmt->execute()) {
                    echo json_encode(['success' => true, 'message' => 'Type removed successfully']);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Error removing type']);
                }
                $stmt->close();
            }
            break;
            
        case 'get':
            $sql = "SELECT * FROM beneficiary_types ORDER BY type_name";
            $result = $conn->query($sql);
            $types = [];
            
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $types[] = $row;
                }
            }
            echo json_encode(['success' => true, 'types' => $types]);
            break;
    }
}

$conn->close();
?> 