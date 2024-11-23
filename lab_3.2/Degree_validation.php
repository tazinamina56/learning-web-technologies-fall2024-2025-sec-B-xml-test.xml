<!DOCTYPE html>
<html>
<head>
    <title>Form Validation</title>
</head>
<body>
    <?php
    $degreeError = '';
    $degrees = isset($_POST['degrees']) ? $_POST['degrees'] : [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (count($degrees) < 2) {
            $degreeError = "Please select at least two degrees.";
        }
    }
    ?>
    <form action="" method="post">
        <label><input type="checkbox" name="degrees[]" value="HSC" <?php echo in_array('HSC', $degrees) ? 'checked' : ''; ?>> HSC</label>
        <label><input type="checkbox" name="degrees[]" value="BSc" <?php echo in_array('BSc', $degrees) ? 'checked' : ''; ?>> BSc</label>
        <label><input type="checkbox" name="degrees[]" value="MSc" <?php echo in_array('MSc', $degrees) ? 'checked' : ''; ?>> MSc</label>
        <label><input type="checkbox" name="degrees[]" value="PhD" <?php echo in_array('PhD', $degrees) ? 'checked' : ''; ?>> PhD</label>
        <span style="color:red;"><?php echo $degreeError; ?></span><br><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
