<?php
session_start();
?>

<h2>User Home Page</h2>
<p>Welcome, <?php echo $_SESSION['user']['NAME']; ?>!</p>
<ul>
    <li><a href="profile.php">Profile</a></li>
    <li><a href="change_password.php">Change Password</a></li>
    <li><a href="logout.php">Logout</a></li>
</ul>
