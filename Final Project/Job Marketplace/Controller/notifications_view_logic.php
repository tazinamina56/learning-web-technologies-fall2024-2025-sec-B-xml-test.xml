<?php 
require_once('../Model/db.php');
$query = "SELECT * FROM notifications ORDER BY created_at DESC";
$result = $conn->query($query);
?>
