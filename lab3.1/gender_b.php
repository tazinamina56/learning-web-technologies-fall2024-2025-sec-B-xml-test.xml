<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gender</title>
</head>
<body>
    <form method="POST" action="" enctype="">
        <fieldset>
            <legend>Gender</legend>
            <input type="radio" name="gender" id="" value="Male">Male
            <input type="radio" name="gender" id="" value="Female">Female
            <input type="radio" name="gender" id="" value="Other">Other<hr>
            <input type="submit" value="Submit">
        </fieldset>
    </form>
    <br>
    <?php

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $gender=$_POST['gender'];
        echo "gender is : ".$gender;
    }

    ?>

</body>
</html>