<?php
session_start();
?>

<h2>Admin Home Page</h2>
<p>Welcome, <?php echo $_SESSION['user']['NAME']; ?>!</p>
<ul>
    <li><a href="profile.php">Profile</a></li>
    <li><a href="user.php">Users</a></li>
    <li><a href="view_users.php">View Users</a></li>
    <li><a href="change_password.php">Change Password</a></li>
    <li><a href="logout.php">Logout</a></li>
</ul>
