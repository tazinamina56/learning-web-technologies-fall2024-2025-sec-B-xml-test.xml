<?php
session_start();
require_once('../Model/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email address.";
        header('Location: ../View/forgot_password.php');
        exit();
    }
    $query = $db->prepare("SELECT * FROM users WHERE email = ?");
    $query->execute([$email]);
    $user = $query->fetch();

    if ($user) {
        $token = bin2hex(random_bytes(16));
        $expires_at = date("Y-m-d H:i:s", strtotime('+1 hour'));

        $insertQuery = $db->prepare("INSERT INTO password_resets (email, token, expires_at) VALUES (?, ?, ?)");
        $insertQuery->execute([$email, $token, $expires_at]);

        $resetLink = "../View/reset_password.php?token=$token";
        mail($email, "Reset Your Password", "Click this link to reset your password: $resetLink");

        $_SESSION['success'] = "A reset link has been sent to your email.";
        header('Location: ../View/forgot_password.php');
    } else {
        $_SESSION['error'] = "No account found with that email address.";
        header('Location: ../View/forgot_password.php');
    }
    exit();
}
