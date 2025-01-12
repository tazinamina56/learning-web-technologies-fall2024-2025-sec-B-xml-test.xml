<?php
session_start();
require_once("../model/employeesModel.php");
if(!isset($_SESSION['loggedIn']))
{
    header('location:signIn.php');
}
$user=$_SESSION["user"];
if($user["role"]!="admin"){
    header("location:../view/dashBoard.php?userName={$user['userName']}");
    exit();
}
else{
    $employees=getAllEmployees();
}
?>
 <table border=1>
            <tr>
                <td>ID</td>
                <td>Employee Name</td>
                <td>Contact no</td>
                <td>Username</td>
                <td>Password</td>
                <td>Action</td>
            </tr>
    <?php   for($i=0; $i<count($employees); $i++){ ?>
            <tr>
                <td><?=$employees[$i]['employeeId']?></td>
                <td><?=$employees[$i]['employeeName']?></td>
                <td><?=$employees[$i]['contactNo']?></td>
                <td><?=$employees[$i]['userName']?></td>
                <td><?=$employees[$i]['password']?></td>
                <td>
                <a href="../controller/manageEmployeesCheck.php?employeeId=<?= urlencode($employees[$i]['employeeId']) ?>&update=true"> Update </a> |
                <a href="../controller/manageEmployeesCheck.php?employeeId=<?= urlencode($employees[$i]['employeeId']) ?>&delete=true"> DELETE </a>
                </td>
            </tr>
        <?php } ?>            
        </table>
        <a href="addEmployee.php?addEmployee=true">Add Employee</a>
        
        <?php if(isset($_GET['deleteStatus'])){echo "<h3>deleted successfully</h3>";}?>
        <?php if(isset($_GET['addSuccess'])){echo "<h3>Added successfully</h3>";}?>
        <a href="adminDashboard.php">Back</a>
        <a href="../controller/logout.php">Logout</a>