<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Degree</title>
</head>

<body>
    <form method="POST" action="">
        <fieldset>
            <legend>Degree</legend>
            <input type="checkbox" name="degrees[]" id="SSC" value="SSC">SSC
            <input type="checkbox" name="degrees[]" id="HSC" value="HSC">HSC
            <input type="checkbox" name="degrees[]" id="BSC" value="BSc">BSc
            <input type="checkbox" name="degrees[]" id="MSC" value="MSC">MSc
            <hr>
            <input type="submit" value="Submit">
        </fieldset>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['degrees'])) {
            $selectedDegrees = $_POST['degrees'];
            echo "Your selected degrees are: " . implode(", ", $selectedDegrees);
        } else {
            echo "No degrees selected.";
        }
    }
    ?>
</body>

</html>