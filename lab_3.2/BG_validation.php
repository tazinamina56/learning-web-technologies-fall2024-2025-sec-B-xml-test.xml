<!DOCTYPE html>
<html>
<head>
    <title>Form Validation</title>
</head>
<body>
    <?php
    $bloodGroupError = '';
    $bloodGroup = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (empty($_POST['blood_group'])) {
            $bloodGroupError = "Please select a blood group.";
        } else {
            $bloodGroup = $_POST['blood_group'];
        }
    }
    ?>
    <form action="" method="post">
        <label for="blood_group">Blood Group:</label>
        <select name="blood_group" id="blood_group">
            <option value="">Select</option>
            <option value="A+" <?php echo $bloodGroup == 'A+' ? 'selected' : ''; ?>>A+</option>
            <option value="A-" <?php echo $bloodGroup == 'A-' ? 'selected' : ''; ?>>A-</option>
            <option value="B+" <?php echo $bloodGroup == 'B+' ? 'selected' : ''; ?>>B+</option>
            <option value="B-" <?php echo $bloodGroup == 'B-' ? 'selected' : ''; ?>>B-</option>
            <option value="AB+" <?php echo $bloodGroup == 'AB+' ? 'selected' : ''; ?>>AB+</option>
            <option value="AB-" <?php echo $bloodGroup == 'AB-' ? 'selected' : ''; ?>>AB-</option>
            <option value="O+" <?php echo $bloodGroup == 'O+' ? 'selected' : ''; ?>>O+</option>
            <option value="O-" <?php echo $bloodGroup == 'O-' ? 'selected' : ''; ?>>O-</option>
        </select>
        <span style="color:red;"><?php echo $bloodGroupError; ?></span><br><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
