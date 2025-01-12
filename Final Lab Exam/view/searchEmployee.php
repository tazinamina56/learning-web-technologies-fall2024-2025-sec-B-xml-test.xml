<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Complaints</title>
    <script src="../assest/js/search.js"></script>
    <script src="../assest/js/validation.js"></script>
</head>
<body>
<?php
session_start();
if (!isset($_SESSION['loggedIn'])) {
    header('location: signIn.php');
    exit();
}
?>
 userName: <input type="text" name="search" id="search">
 <input type="button"  value="search" onclick="ajax()">
    <div id="searchText">
        <table id='table' border='1'>
            
            
        </table>
    </div>
    

</body>
</html>