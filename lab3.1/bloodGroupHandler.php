<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $bloodGroup=$_POST['bloodGroup'];

    echo "Your blood group is : ".$bloodGroup;
}

?>