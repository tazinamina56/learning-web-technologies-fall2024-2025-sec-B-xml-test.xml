<?php
require_once('../Model/db.php');
header('Content-Type: application/json');

$defaultImage = '../uploads/default.png';

// Handle AJAX file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile_pic'])) {
    $target_dir = "../uploads/";

    if (!is_dir($target_dir) && !mkdir($target_dir, 0755, true)) {
        echo json_encode(['success' => false, 'error' => 'Failed to create directory.']);
        exit();
    }

    $file_extension = strtolower(pathinfo($_FILES["profile_pic"]["name"], PATHINFO_EXTENSION));
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];

    if (!in_array($file_extension, $allowed_extensions)) {
        echo json_encode(['success' => false, 'error' => 'Invalid file type.']);
        exit();
    }

    $target_file = $target_dir . "user_1_profile_" . uniqid() . ".$file_extension";

    if ($_FILES['profile_pic']['error'] === UPLOAD_ERR_OK && move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {
        $user_id = 1;
        $escaped_file = $conn->real_escape_string($target_file);

        // Update database
        $update_query = "
            INSERT INTO profile_pictures (user_id, picture_url) 
            VALUES ($user_id, '$escaped_file') 
            ON DUPLICATE KEY UPDATE picture_url = '$escaped_file'
        ";

        if ($conn->query($update_query)) {
            echo json_encode(['success' => true, 'new_picture_url' => $escaped_file]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Database update failed.']);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'File upload failed.']);
    }
    exit();
}

// Fetch current profile picture
$query = "SELECT picture_url FROM profile_pictures WHERE user_id = 1 LIMIT 1";
$result = $conn->query($query);

if ($result && $row = $result->fetch_assoc()) {
    $profile_picture = $row['picture_url'];
    if (!file_exists($profile_picture)) {
        $profile_picture = $defaultImage;
    }
} else {
    $profile_picture = $defaultImage;
}
?>
