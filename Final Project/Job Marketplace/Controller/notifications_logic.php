<?php
require_once('../Model/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mydata'])) {
    $jsonData = $_POST['mydata'];
    $data = json_decode($jsonData, true);

    if (isset($data['message']) && !empty($data['message'])) {
        $message = $conn->real_escape_string($data['message']);
        $query = "INSERT INTO notifications (message) VALUES ('$message')";
        $conn->query($query);

        echo json_encode(['message' => $message]);

        exit();
    }
    echo json_encode(['error' => 'Message cannot be empty.']);
    exit();
}
$query = "SELECT * FROM notifications ORDER BY created_at DESC";
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    while ($notification = $result->fetch_assoc()) {
        echo "<div class='message'>" . htmlspecialchars($notification['message']) . "</div>";
    }
} else {
    echo "<p>No notifications yet.</p>";
}
?>
