<?php
session_start();
$filename = 'users.txt';
$user = $_SESSION['user'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];
    
    $users = file($filename, FILE_IGNORE_NEW_LINES);
    foreach ($users as &$line) {
        list($id, $name, $pass, $type) = explode('|', $line);
        if ($id === $user['ID'] && $currentPassword === $pass) {
            $line = "$id|$name|$newPassword|$type";
            file_put_contents($filename, implode("\n", $users));
            $success = "Password changed successfully!";
            break;
        }
    }
}
?>

<h2>Change Password</h2>
<form method="POST">
    Current Password: <input type="password" name="current_password" required><br>
    New Password: <input type="password" name="new_password" required><br><br>
    <button type="submit">Change</button>
</form>
<?php if (isset($success)) echo "<p style='color:green;'>$success</p>"; ?>
<a href="profile.php">Go Back</a>