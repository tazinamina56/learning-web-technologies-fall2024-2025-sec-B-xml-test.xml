<!DOCTYPE html>
<html>
<head>
    <title>Form Validation</title>
</head>
<body>
    <?php
    $nameError = '';
    $name = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        if (empty($name)) {
            $nameError = "Name cannot be empty.";
        } elseif (!preg_match("/^[a-zA-Z][a-zA-Z.\- ]+$/", $name)) {
            $nameError = "Name must start with a letter and contain only a-z, A-Z, period, or dash.";
        } elseif (str_word_count($name) < 2) {
            $nameError = "Name must contain at least two words.";
        }
    }
    ?>
    <form action="" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>">
        <span style="color:red;"><?php echo $nameError; ?></span><br><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
