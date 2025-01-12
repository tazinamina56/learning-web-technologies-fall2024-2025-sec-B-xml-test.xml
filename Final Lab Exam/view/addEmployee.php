<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <script src="../assest/js/addEmployee.js"></script>
    <script src="../assest/js/validation.js"></script>
   
    
</head>
<body>

<?php
session_start();
if (!isset($_SESSION['loggedIn'])) {
    header('location: signIn.php');
    exit();
}
if(!isset($_GET['addEmployee'])){
    header('location:../view/manageEmployees.php?updateStatus=false');
    exit();
}
?>
<form onsubmit="validateForm()" action="../controller/addEmployeeCheck.php" method="POST">
    Employee Name: <input type="text" name="employeeName" id="employeeName"><br><br>
    Contact no: <input type="text" name="contactNo" id="contactNo"><br><br>
    Username: <input type="text" name="userName" id="userName"><br><br>
    Password: <input type="text" name="password" id="password"><br><br>
    <input type="submit" name="submit" value="Add">
</form>
<a href="manageEmployees.php">Back</a>
<a href="../controller/logout.php">Logout</a>

</body>