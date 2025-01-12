<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update Employee</title>
    <script src="../assest/js/updateEmployee.js"></script>
    <script src="../assest/js/validation.js"></script>
   
    
</head>
<body>
<?php
session_start();
if (!isset($_SESSION['loggedIn'])) {
    header('location: signIn.php');
    exit();
}
require_once("../model/employeesModel.php");
$employeeId="";
$employeeName="";
$contactNo="";
$userName="";
$password="";

if(!isset($_GET['employeeId'])){
    header('location:../view/manageEmployees.php?updateStatus=false');
}

else{
    $employeeId=$_GET['employeeId'];
    $employee=getEmployeeWithId($employeeId);
    if(!$employee){
        header('location:../view/manageEmployees.php?updateStatus=false');
        exit();
    }
    else{
        $employeeName=$employee['employeeName'];
        $contactNo=$employee['contactNo'];
        $userName=$employee['userName'];
        $password=$employee['password'];
    }
}

?>
<form onsubmit="validateForm()" action="../controller/manageEmployeesCheck.php" method="POST">
    Employee Name: <input type="text" name="updateEmployeeName" id="employeeName" value="<?php echo $employeeName;?>">
    Contact no: <input type="text" name="updateContactNo" id="contactNo" value="<?php echo $contactNo;?>">
    Username: <input type="text" name="updateUserName" id="userName" value="<?php echo $userName;?>">
    Password: <input type="text" name="updatePassword" id="password" value="<?php echo $password;?>">
    Employee id: <input type="text" name="updateEmployeeId" id="employeeId" value="<?php echo $employeeId;?>">
    <input type="submit" name="updateEmployeeSubmit" value="Update">
</form>
<a href="manageEmployees.php">Back</a>
<a href="../controller/logout.php">Logout</a>

</body>