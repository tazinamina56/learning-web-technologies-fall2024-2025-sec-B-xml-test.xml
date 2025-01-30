<?php require_once('../Model/db.php');

$query = "SELECT * FROM candidates WHERE status = 'pending'";
$result = $conn->query($query);

if (!$result) {
    die("Database query failed: " . $conn->error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $candidate_id = (int) $_POST['candidate_id'];
    $action = $_POST['action'];

    if ($action === 'accept') {
        $notification = $conn->real_escape_string("You have been accepted for 'Company Name'!");
        $candidate_id = (int) $candidate_id; // Ensure it's an integer
        $query = "UPDATE candidates SET status = 'accepted', notification_message = '$notification' WHERE id = $candidate_id";
        
        if (!$conn->query($query)) {
            die("Error updating candidate status: " . $conn->error);
        }
    } elseif ($action === 'reject') {
        $candidate_id = (int) $candidate_id; // Ensure it's an integer
        $query = "DELETE FROM candidates WHERE id = $candidate_id";

        if (!$conn->query($query)) {
            die("Error deleting candidate: " . $conn->error);
        }
    }

    header("Location: ../View/candidate_management.php");
    exit;
}
?>
