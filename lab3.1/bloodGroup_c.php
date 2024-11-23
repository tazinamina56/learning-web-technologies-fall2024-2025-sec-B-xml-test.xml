<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Group</title>
</head>
<body>
    <?php
    $bloodGroup = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $bloodGroup = $_POST['bloodGroup'];
    }
    ?>
    <form method="POST" action="">
        <fieldset>
            <legend>Blood Group</legend>
            <select name="bloodGroup" id="bloodGroupSelect">
                <option value="A+" <?php if ($bloodGroup == "A+") echo "selected"; ?>>A+</option>
                <option value="A-" <?php if ($bloodGroup == "A-") echo "selected"; ?>>A-</option>
                <option value="B+" <?php if ($bloodGroup == "B+") echo "selected"; ?>>B+</option>
                <option value="B-" <?php if ($bloodGroup == "B-") echo "selected"; ?>>B-</option>
                <option value="O+" <?php if ($bloodGroup == "O+") echo "selected"; ?>>O+</option>
                <option value="O-" <?php if ($bloodGroup == "O-") echo "selected"; ?>>O-</option>
                <option value="AB+" <?php if ($bloodGroup == "AB+") echo "selected"; ?>>AB+</option>
                <option value="AB-" <?php if ($bloodGroup == "AB-") echo "selected"; ?>>AB-</option>
            </select><hr>
            <input type="submit" value="Submit">
        </fieldset>
    </form><br>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "Your blood group is : " . $bloodGroup;
    }
    ?>
</body>
</html>