<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['TYPE'] !== 'Admin') {
    header('Location: login.php');
    exit;
}

$filename = 'users.txt';
$users = file($filename, FILE_IGNORE_NEW_LINES);
?>

<h2>View Users</h2>
<table border="1">
    <tr><th>ID</th><th>NAME</th><th>TYPE</th></tr>
    <?php foreach ($users as $user): 
        list($id, $name, , $type) = explode('|', $user); ?>
        <tr>
            <td><?php echo $id; ?></td>
            <td><?php echo $name; ?></td>
            <td><?php echo $type; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="admin.php">Go Back</a>
