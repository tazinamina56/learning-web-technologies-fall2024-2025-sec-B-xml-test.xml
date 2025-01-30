<?php require_once('../Model/db.php');

$query = "SELECT * FROM users";
$result = $conn->query($query);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $delete_query = "DELETE FROM users WHERE id = $user_id";
    $conn->query($delete_query);
    header("Location: ../View/users.php");
}
?>
