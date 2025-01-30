<?php
session_start();
require_once('../Model/db.php');
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['mydata'])) {
    $jsonData = $_POST['mydata'];
    $user = json_decode($jsonData, true);
    echo json_encode($user);
    exit();
}

if (!isset($_SESSION['user_id'])) {
    die("<p>You must be logged in to edit your profile.</p>");
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];

    $query = $conn->prepare("UPDATE users SET full_name = ?, email = ?, dob = ?, gender = ?, address = ? WHERE id = ? AND user_type = 'Job Seeker'");
    $query->bind_param("sssssi", $full_name, $email, $dob, $gender, $address, $user_id);
    $query->execute();
    sleep(3);
    header("Location: ../View/jobseeker_view.php");
    exit();
}

$query = $conn->prepare("SELECT full_name, email, dob, gender, address FROM users WHERE id = ? AND user_type = 'Job Seeker'");
$query->bind_param("i", $user_id);
$query->execute();
$result = $query->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    $user = null;
}

?>