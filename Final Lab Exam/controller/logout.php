<?php
    session_start();
    session_destroy();

    
    setcookie('logged_in', true, time()-1, '/');
    setcookie('username', $username, time()-1, '/');

    header('location: ../view/signIn.php');

?>