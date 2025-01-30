<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - Job Marketplace</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>
<body>
    <header>
        <h1>Job Marketplace</h1>
    </header>
    <main>
        <h1>Sign In</h1>
        <?php if (isset($_SESSION['error'])): ?>
            <div class="error">
                <?= $_SESSION['error'] ?>
                <?php unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>
        <form class="form-signin" action="../Controller/signin_process.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>

            <button type="submit" class="btn">Sign In</button>
            <p>
                <a href="forgot_password.php">Forgot Password?</a>
                &nbsp;|&nbsp;
                <a href="signup.php">Sign Up</a>
            </p>
        </form>
    </main>
    <footer>
        &copy; 2024 Job Marketplace
    </footer>
</body>
</html>
