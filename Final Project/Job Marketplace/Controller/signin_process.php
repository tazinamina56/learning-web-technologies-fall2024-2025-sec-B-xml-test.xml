<?php
session_start();
require_once('../Model/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $query = $conn->prepare("SELECT id, full_name, user_type, password_hash FROM users WHERE email = ?");
    $query->bind_param("s", $email);
    $query->execute();
    $query->bind_result($id, $fullName, $userType, $passwordHash);

    if ($query->fetch()) {
        if (password_verify($password, $passwordHash)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['name'] = $fullName;
            $_SESSION['user_type'] = $userType;

            if ($userType === 'Admin') {
                header('Location: ../View/admin_dashboard.php');
            } elseif ($userType === 'Employer') {
                header('Location: ../View/employer_dashboard.php');
            } elseif ($userType === 'Job Seeker') {
                header('Location: ../View/jobseeker_dashboard.php');
            }
            exit();
        } else {
            $_SESSION['error'] = 'Invalid email or password.';
            header('Location: ../View/signin.php');
            exit();
        }
    } else {
        $_SESSION['error'] = 'Invalid email or password.';
        header('Location: ../View/signin.php');
        exit();
    }
}
?>
