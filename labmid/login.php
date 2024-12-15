<?php
session_start();


if ($valid_login) {
    $_SESSION['id'] = $login_id;
    $_SESSION['name'] = $name;
    $_SESSION['user_type'] = $user_type;

    if ($user_type == 'admin') {
        header('Location: admin_home.php');
    } else {
        header('Location: user_home.php');
    }
} else {
    echo "Invalid login credentials.";
}