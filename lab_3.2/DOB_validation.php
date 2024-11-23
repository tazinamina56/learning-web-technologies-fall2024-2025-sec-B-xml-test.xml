<!DOCTYPE html>
<html>
<head>
    <title>Form Validation</title>
</head>
<body>
    <?php
    $dobError = '';
    $dob = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $dob = $_POST['dob'];
        if (empty($dob)) {
            $dobError = "Date of Birth cannot be empty.";
        } elseif (!preg_match("/^(19[5-9][3-9]|199[0-8])-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/", $dob)) {
            $dobError = "Invalid date. Format must be yyyy-mm-dd (dd: 1-31, mm: 1-12, yyyy: 1953-1998).";
        }
    }
    ?>
    <form action="" method="post">
        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" value="<?php echo htmlspecialchars($dob); ?>">
        <span style="color:red;"><?php echo $dobError; ?></span><br><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
