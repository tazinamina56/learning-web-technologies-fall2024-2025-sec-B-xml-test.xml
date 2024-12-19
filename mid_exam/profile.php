<?php
session_start();
$user = $_SESSION['user'];
?>

<h2>Profile</h2>
<table border="1">
    <tr><th>ID</th><td><?php echo $user['ID']; ?></td></tr>
    <tr><th>Name</th><td><?php echo $user['NAME']; ?></td></tr>
    <tr><th>User Type</th><td><?php echo $user['TYPE']; ?></td></tr>
</table>
<a href='registration.php'>Go Home</a>
