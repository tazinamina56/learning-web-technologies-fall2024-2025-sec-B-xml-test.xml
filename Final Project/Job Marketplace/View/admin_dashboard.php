<?php
session_start();
if ($_SESSION['user_type'] !== 'Admin') {
    header('Location: ../View/signin.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>
<body>
    <header>
        <h1>Job Marketplace</h1>
    </header>
    <main>
        <h1>Welcome, <?= htmlspecialchars($_SESSION['name']) ?>!</h1>
        <div class="menu">
            <a href="../View/users.php" class="btn">User Management</a>
            <a href="../View/jobs.php" class="btn">Job Management</a>
            <a href="../View/notifications.php" class="btn">Post Notification</a>
            <a href="../View/profile_picture.php" class="btn">Change Profile Picture</a>
            <a href="../View/notification_view.php" class="btn">Notification</a>
            <a href=".." class="btn">Change Password</a>
            <a href="../View/about_us.php" class="btn">About Us</a>
            <a href="../Controller/logout.php" class="btn btn-danger">Logout</a>
        </div>
    </main>
    <p id="demo"></p>
    <button type="button" onclick="ajax()">Show Via Ajax</button>
<script>
function ajax() {
 const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("demo").innerHTML = this.responseText;
  }
  xhttp.open("GET", "../assets/ajax_admin_dashboard.txt");
  xhttp.send();
}
            
</script>
    <footer>
        &copy; 2024 Job Marketplace
    </footer>
</body>
</html>
