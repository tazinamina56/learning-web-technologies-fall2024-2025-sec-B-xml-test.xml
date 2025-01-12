<?php
session_start();
require_once('../model/employeesModel.php');
if(!isset($_SESSION['loggedIn'])) {header('location: ../view/signIn.php');}
if(isset($_GET['delete'])){
$employeeId=$_GET['employeeId'];
$deleteStatus=deleteEmployee($employeeId);
if($deleteStatus){
    header('location:../view/manageEmployees.php?deleteStatus=success');
}
}

if(isset($_GET['update'])){
    $employeeId=$_GET['employeeId'];
header("location:../view/updateEmployee.php?employeeId=$employeeId");
}
if(isset($_POST['updateEmployeeSubmit'])){
    $employeeId=$_POST['updateEmployeeId'];
    $employeeName=$_POST['updateEmployeeName'];
    $contactNo=$_POST['updateContactNo'];
    $userName=$_POST['updateUserName'];
    $password=$_POST['updatePassword'];
    if(empty($employeeId) || empty($employeeName) || empty($contactNo) || empty($userName) || empty($password)){
        header("location:../view/updateEmployee.php");
    }
    else{
        $updateStatus=updateEmployee($employeeId,$employeeName,$contactNo,$userName,$password);
        if($updateStatus){
            header('location:../view/manageEmployees.php?updateStatus=success');
        }
    }
    
}
    
?>