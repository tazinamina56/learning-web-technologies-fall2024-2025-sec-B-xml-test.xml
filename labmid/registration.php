<?php

session_start();

$_SESSION['id'] = $id;
$_SESSION['name'] = $name;
$_SESSION['user_type'] = $user_type;

if ($user_type == 'admin') {
    header('Location: home.php');
} else {
    header('Location: home.php');
}