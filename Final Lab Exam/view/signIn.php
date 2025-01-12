<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <script src="../assest/js/signInCheck.js"></script>
    <script src="../assest/js/validation.js"></script>
    
</head>
<body>
<?php
require_once ('../model/userModel.php');
$errorMsgUserName="";
$errorMsgPassword="";
$afterReg="";
$errorMsgInvalidUser="";
if(isset($_GET['success'])){
    $afterReg="successfully created";
}
if (isset($_GET['errorMsgUserName'])) {
    $errorMsgEmail = $_GET["errorMsgUserName"];
    
}
if (isset($_GET['errorMsgPassword'])) {
    $errorMsgPassword = $_GET["errorMsgPassword"];
    
}
$userName='';
if(isset($_GET['userName'])){
    $userName=$_GET['userName'];
}
if(isset($_GET['errorMsg'])){
    $errorMsg=$_GET['errorMsg'];
    switch($errorMsg){
        case 'invalidUserName':{
            $errorMsgUserName='Invalid user name';
            break;
        }
        case 'invalidPassword':{
            $errorMsgPassword="Password is invalid.NOTE:Password must have special character,Capital letter,small letter and number and length not less than 8";
            break;
        }
        case 'invalidUser':{
            $errorMsgInvalidUser="Invalid user";
        }
    }
}
?>
<h1 align="center">Welcome to Shop Management System</h1>
<?php echo "<h5>{$afterReg}</h5>"?><br>


<form onsubmit="validateForm()" action="../controller/signInCheck.php" method="POST">
    Username: <input type="text" name="userName" id="userName"value="<?php echo $userName;?>"><?php   echo $errorMsgUserName;  ?><br><br>
    Password: <input type="password" name="password" id="password"><?php  echo $errorMsgPassword;  ?>
    
    <?php echo "<h3 id='errorMsgInvalidUser'>{$errorMsgInvalidUser}</h3>";?>
    <input type="submit" name="signIn" id="" value="signIn"><br><br>
    
</form>
<h4>Not registered yet?<a href="userRegistration.php">Register here!</a></h4>

</body>
</html>