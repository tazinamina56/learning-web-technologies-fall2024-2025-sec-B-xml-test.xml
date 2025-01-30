<?php
session_start();
require_once('../Model/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $dob = trim($_POST['dob']);
    $gender = trim($_POST['gender']);
    $address = trim($_POST['address']);
    $userType = trim($_POST['user_type']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirm_password']);
    $query = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $query->bind_param("s", $email);
    $query->execute();
    $query->store_result();
    if ($query->num_rows > 0) {
        $_SESSION['error'] = 'Email is already registered.';
        header('Location: ../View/signup.php');
        exit();
    }
    if ($password !== $confirmPassword) {
        $_SESSION['error'] = 'Passwords do not match.';
        header('Location: ../View/signup.php');
        exit();
    }
    if (!preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $password)) {
        $_SESSION['error'] = 'Password must be at least 8 characters long and include at least one uppercase letter, one number, and one special character.';
        header('Location: ../View/signup.php');
        exit();
    }
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $insertQuery = $conn->prepare("INSERT INTO users (full_name, email, dob, gender, address, user_type, password_hash) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $insertQuery->bind_param("sssssss", $fullName, $email, $dob, $gender, $address, $userType, $passwordHash);
    if ($insertQuery->execute()) {
        $_SESSION['success'] = 'Account created successfully. Please log in.';
        header('Location: ../View/signin.php');
        exit();
    } else {
        $_SESSION['error'] = 'Failed to create account. Please try again later.';
        header('Location: ../View/signup.php');
        exit();
    }
}
if ($userType === 'Admin' && !isset($_SESSION['is_super_admin'])) {
    $_SESSION['error'] = 'You are not authorized to register as an Admin.';
    header('Location: ../View/signup.php');
    exit();
}
?>