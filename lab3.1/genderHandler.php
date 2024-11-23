<?php

$gender=$_POST['gender'];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    echo "selected gender is : ".$gender;
}

?>