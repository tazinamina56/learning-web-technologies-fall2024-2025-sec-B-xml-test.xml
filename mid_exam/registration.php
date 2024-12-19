<?php
session_start();

$filename = 'users.txt';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $userType = $_POST['user_type'];

    if (empty($id) || empty($name) || empty($password) || empty($userType)) {
        $error = "All fields are required!";
    } else {
        $line = "$id|$name|$password|$userType\n";
        file_put_contents($filename, $line, FILE_APPEND);
        $success = "Registration successful! You can now log in.";
    }
}
?>

<html>
    <head>
</head>
<body>
<h2>Register</h2>
<form method="POST">
    ID: <input type="text" name="id" required><br>
    Name: <input type="text" name="name" required><br>
    Password: <input type="password" name="password" required><br>
    User Type: 
    <select name="user_type">
        <option value="Admin">Admin</option>
        <option value="User">User</option>
    </select><br><br>
    <button type="submit">Register</button>
</form>

<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
<?php if (isset($success)) echo "<p style='color:green;'>$success</p>"; ?>

<a href="login.php">Login</a>
</body>
</html>
