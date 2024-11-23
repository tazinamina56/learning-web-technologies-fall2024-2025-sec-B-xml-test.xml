<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="">
        <fieldset>
            <legend>Name</legend>
            <input type="text" name="name" id="" value="">
            <hr>
            <input type="submit" name="submit" id="" value="submit">
        </fieldset>
    </form>
    <?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name=$_POST['name'];
    echo "Name is : ".$name;
}
?>
</body>

</html>