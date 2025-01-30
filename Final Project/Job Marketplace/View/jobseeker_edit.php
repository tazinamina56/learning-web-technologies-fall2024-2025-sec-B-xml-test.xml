<?php require_once '../Controller/jobseeker_edit_logic.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Job Seeker Profile</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>
<body>
    <header>
        <h1>Edit Job Seeker Profile</h1>
        <p id="head"></p>

    </header>
    <main>
        <?php if (isset($user)): ?>
            <form id="EditForm" method="POST">
                <label for="full_name">Full Name:</label>
                <input type="text" id="full_name" name="full_name" value="<?= htmlspecialchars($user['full_name']) ?>" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>

                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" value="<?= htmlspecialchars($user['dob']) ?>" required>

                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="Male" <?= $user['gender'] === 'Male' ? 'selected' : '' ?>>Male</option>
                    <option value="Female" <?= $user['gender'] === 'Female' ? 'selected' : '' ?>>Female</option>
                    <option value="Other" <?= $user['gender'] === 'Other' ? 'selected' : '' ?>>Other</option>
                </select>

                <label for="address">Address:</label>
                <textarea id="address" name="address" required><?= htmlspecialchars($user['address']) ?></textarea>

                <button type="submit">Save Changes</button>
                <button type="submit" onclick="ajax()">Save Changes via AJAX</button>
            </form>
            <script>
                function ajax(){
                const full_name = document.getElementById('full_name').value;
                const email = document.getElementById('email').value;
                const dob = document.getElementById('dob').value;
                const gender = document.getElementById('gender').value;
                
                const address = document.getElementById('address').value;
                

                const json = { full_name: full_name, email: email, dob:dob, gender:gender, address:address};
                const data = JSON.stringify(json);

                const xhttp = new XMLHttpRequest();
                xhttp.open('POST', '../Controller/jobseeker_edit_logic.php', true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send('mydata='+data);

                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        const user = JSON.parse(this.responseText);
                        document.getElementById('head').innerHTML = `Full Name: ${user.full_name}, Email: ${user.email}, DOB: ${user.dob}, Gender: ${user.gender}, Address: ${user.full_name}`;
                    }
                }
                }
            </script>
        <?php else: ?>
            <p>No Jobseeker profile found to edit.</p>
        <?php endif; ?>
    </main>
    <script src="../assets/editForm_validation.js"></script>

    <footer>
        &copy; 2024 Job Marketplace
    </footer>
</body>
</html>
