<?php
$SSC = isset($_POST['SSC']) ? $_POST['SSC'] : "";
$HSC = isset($_POST['HSC']) ? $_POST['HSC'] : "";
$BSC = isset($_POST['BSC']) ? $_POST['BSC'] : "";
$MSC = isset($_POST['MSC']) ? $_POST['MSC'] : "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "selected degrees are: ";

    $selectedDegrees = [];

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

    if (empty($selectedDegrees)) {
        echo "None selected";
    } else {
        echo implode(", ", $selectedDegrees);
    }
}
?>