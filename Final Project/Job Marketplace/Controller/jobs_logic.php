<?php
require_once('../Model/db.php');

$query = "SELECT * FROM jobs WHERE status = 'pending'";
$result = $conn->query($query);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $job_id = intval($_POST['job_id']);
    $action = $_POST['action'];

    if (in_array($action, ['approved', 'rejected'])) {
        $sanitized_action = $conn->real_escape_string($action);

        $update_query = "UPDATE jobs SET status = '$sanitized_action' WHERE id = $job_id";

        if ($conn->query($update_query)) {
            header("Location: ../View/jobs.php");
            exit();
        } else {
            echo "Error updating job: " . $conn->error;
        }
    } else {
        echo "Invalid action.";
    }
}
?>
