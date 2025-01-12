<?php
require_once ('db.php');
function getAllEmployees(){
    $con = dbConnection();
    $sql = "SELECT * from employees";
    
    if($result = mysqli_query($con, $sql)){
        $employees = array();
        while($employee = mysqli_fetch_assoc($result)){
            array_push($employees, $employee);
        }
        return $employees;
    }
    return false;
}
function deleteEmployee($employeeId){
    $deleteId=$employeeId;
    $con=dbConnection();
    $sql="DELETE FROM employees WHERE employeeId='{$deleteId}';";
    if(mysqli_query($con,$sql)){
        return true;
    }
    else{
        return false;
    }
}
function getEmployeeWithId($employeeId){
    $con = dbConnection();
    $sql = "SELECT * from employees where employeeId='{$employeeId}';";
    
    if($result = mysqli_query($con, $sql)){
        return mysqli_fetch_assoc($result);
    }
    return false;
}
function updateEmployee($employeeId,$employeeName,$contactNo,$userName,$password){
    $con=dbConnection();
    $sql ="UPDATE employees SET employeeId='$employeeId', employeeName='$employeeName', contactNo='$contactNo', userName='$userName', password='$password'  WHERE employeeId='$employeeId';";
    if(mysqli_query($con,$sql)){
        return true;
    }
    else{
        return false;
    }
}
function addEmployee($employeeName,$contactNo,$userName,$password){
    $con = dbConnection();
    $sql = "INSERT INTO employees (employeeName,contactNo,userName,password) VALUES(
                                    '{$employeeName}',
                                    '{$contactNo}',
                                    '{$userName}',
                                    '{$password}')";

    if(mysqli_query($con, $sql)){
        return true;
    }else {
        mysqli_error($con);
        return false;
    }
}
function getSearchEmployeesByUserName($userName){
    $con = dbConnection();
    $sql = "SELECT * from employees where userName='{$userName}'";
    
    if($result = mysqli_query($con, $sql)){
        $employees = array();
        while($employee = mysqli_fetch_assoc($result)){
            array_push($employees, $employee);
        }
        return $employees;
    }
    return false;
}
?>