<?php
session_start();

$filename = 'users.txt';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $password = $_POST['password'];

    $users = file($filename, FILE_IGNORE_NEW_LINES);
    $found = false;

    foreach ($users as $user) {
        list($uid, $name, $pass, $type) = explode('|', $user);
        if ($id == $uid && $password == $pass) {
            $found = true;
            $_SESSION['user'] = ['ID' => $id, 'NAME' => $name, 'TYPE' => $type];

            header("Location: " . ($type === 'Admin' ? "admin.php" : "user.php"));
            exit;
        }
    }
    if (!$found) {
        $error = "Invalid ID or Password!";
    }
}
?>

<html>
    <head>
</head>
<body>
<h2>Login</h2>
<form method="POST">
    ID: <input type="text" name="id" required><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit">Login</button>
</form>

<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
<a href="logout.php">Logout</a>
</body>
</html>