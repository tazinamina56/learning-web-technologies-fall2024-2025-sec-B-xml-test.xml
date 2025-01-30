<?php
session_start();
require_once('../Model/db.php');
if (!isset($_SESSION['user_id'])) {
    echo "<p>You must be logged in to view this page.</p>";
    exit();
}

$user_id = $_SESSION['user_id'];

$query = $conn->prepare("SELECT full_name, email, dob, gender, address FROM users WHERE id = ? AND user_type = 'Job Seeker'");
$query->bind_param("i", $user_id);
$query->execute();
$result = $query->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    echo "<h2>" . htmlspecialchars($user['full_name']) . "</h2>";
    echo "<p>Email: " . htmlspecialchars($user['email']) . "</p>";
    echo "<p>Date of Birth: " . htmlspecialchars($user['dob']) . "</p>";
    echo "<p>Gender: " . htmlspecialchars($user['gender']) . "</p>";
    echo "<p>Address: " . htmlspecialchars($user['address']) . "</p>";
} else {
    echo "<p>You are not authorized to view this profile.</p>";
}
?>
