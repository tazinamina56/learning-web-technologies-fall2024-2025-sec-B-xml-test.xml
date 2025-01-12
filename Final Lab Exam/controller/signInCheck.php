<?php
session_Start();
require_once ('../model/userModel.php');
$userName=$_POST['userName'];
$password=$_POST["password"];

if(!isset($_POST['signIn'])) {header('location: ../view/signIn.php');}
if(empty($email)) {
    header("location: ../view/signIn.php?errorMsgUserName=Field is empty&userName={$userName}&submit=true"); 
    exit();
}
else{
    if(!isValidUserName($userName)){
        header("location: ../view/signIn.php?errorMsg=invalidUserName&userName={$userName}&submit=true"); 
        exit();
    }
}
if(empty($password)) {
    header("location: ../view/signIn.php?errorMsgPassword=Field is empty&firstName={$firstName}&lastName={$lastName}&userName={$userName}&email={$email}&phone={$phone}&submit=true"); 
    exit();
}
else{
    if(!isValidPassword($password)){
        header("location: ../view/signIn.php?errorMsg=invalidPassword&firstName={$firstName}&lastName={$lastName}&userName={$userName}&email={$email}&phone={$phone}&submit=true"); 
        exit();
    }
}
if(logIn($userName,$password)){
    $user=getUser($userName);
    $_SESSION['loggedIn']=true;
    $_SESSION['userName']=$user['userName'];
    $_SESSION['user']=$user;
    $_SESSION['role']=$user['role'];
    setcookie('loggedIn', true, time()+10000000000, '/');
    setcookie('userName', $userName, time()+10000000000, '/');
    if($_SESSION['role']==='admin'){
        header("location:../view/adminDashboard.php?userName={$user['userName']}");
        exit();
    }
    
    else{
        header("location: ../view/dashBoard.php?userName={$user['userName']}");
        exit();
    }
    
    
}
else{
    header("location: ../view/signIn.php?errorMsg=invalidUser");
}
?>