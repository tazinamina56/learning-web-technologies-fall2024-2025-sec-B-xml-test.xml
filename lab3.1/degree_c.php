<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Degree</title>
</head>
<body>
    <?php
    $SSC = "";
    $HSC = "";
    $BSC = "";
    $MSC = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $SSC = isset($_POST['SSC']) ? "SSC" : "";
        $HSC = isset($_POST['HSC']) ? "HSC" : "";
        $BSC = isset($_POST['BSC']) ? "BSC" : "";
        $MSC = isset($_POST['MSC']) ? "MSC" : "";
    }
    ?>

    <form method="POST" action="">
        <fieldset>
            <legend>Degree</legend>
            <input type="checkbox" name="SSC" id="SSC" value="SSC" <?php if ($SSC == "SSC") echo "checked"; ?>>SSC
            <input type="checkbox" name="HSC" id="HSC" value="HSC" <?php if ($HSC == "HSC") echo "checked"; ?>>HSC
            <input type="checkbox" name="BSC" id="BSC" value="BSC" <?php if ($BSC == "BSC") echo "checked"; ?>>BSC
            <input type="checkbox" name="MSC" id="MSC" value="MSC" <?php if ($MSC == "MSC") echo "checked"; ?>>MSC
            <hr>
            <input type="submit" value="Submit">
        </fieldset>
    </form><br>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $selectedDegrees = array();

        if (!empty($SSC)) {
            $selectedDegrees[] = $SSC;
        }

        if (!empty($HSC)) {
            $selectedDegrees[] = $HSC;
        }

        if (!empty($BSC)) {
            $selectedDegrees[] = $BSC;
        }

        if (!empty($MSC)) {
            $selectedDegrees[] = $MSC;
        }

        echo "Your selected degrees are: " . implode(", ", $selectedDegrees);
    }
    ?>
</body>
</html>