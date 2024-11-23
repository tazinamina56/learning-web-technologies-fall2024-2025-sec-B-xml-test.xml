<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $email = ""; 

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $_POST['email']; 
    }
    ?>

    <form method="POST" action="">
        <fieldset>
            <legend>Email</legend>
            <input type="email" name="email" id="" value="<?php echo $email; ?>">
            <input type="submit" name="submit" id="" value="Submit">
        </fieldset>
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        echo "Your email is : ".$email;
    }
    ?>

</body>
</html>