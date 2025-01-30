<?php
require_once('../Model/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['mydata'])) {
    $jsonData = $_POST['mydata'];
    $user = json_decode($jsonData, true);
    echo json_encode($user);
    exit();
}

if (isset($_POST['search']) && !empty($_POST['search'])) {
    $search = $conn->real_escape_string($_POST['search']);

   
    $query = "SELECT * FROM jobs WHERE status = 'approved' AND (title LIKE '%$search%' OR company LIKE '%$search%')";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        echo "<ul class='job-list'>";
        while ($job = $result->fetch_assoc()) {
            echo "<li class='job-item'>";
            echo "<h2>" . htmlspecialchars($job['title']) . "</h2>";
            echo "<p>Company: " . htmlspecialchars($job['company']) . "</p>";
            echo "<p>Salary: $" . htmlspecialchars($job['salary']) . "</p>";
            echo "<form method='GET' action='job_application.php'>";
            echo "<input type='hidden' name='job_id' value='" . $job['id'] . "'>";
            echo "<button type='submit'>Apply</button>";
            echo "</form>";
            echo "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No approved jobs found matching your criteria.</p>";
    }
} else {
    echo "<p>Please enter a search query to find jobs.</p>";
}
?>
