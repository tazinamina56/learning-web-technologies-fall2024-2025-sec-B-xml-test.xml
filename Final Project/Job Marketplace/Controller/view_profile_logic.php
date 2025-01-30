<?php require_once('../Model/db.php');

if (isset($_GET['id'])) {
    $user_id = intval($_GET['id']);

    $query = "SELECT id, full_name, email, dob, gender, address, user_type, created_at 
              FROM users WHERE id = $user_id";

    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $users = $result->fetch_assoc();
    } else {
        $error = "User not found!";
    }
} else {
    $error = "Invalid request. User ID is missing!";
}
?>
