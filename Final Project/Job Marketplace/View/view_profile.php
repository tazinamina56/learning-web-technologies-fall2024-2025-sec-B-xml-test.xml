<?php require_once '../Controller/view_profile_logic.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles.css">
    <title>User Profile</title>
</head>
<body>
    <header>
        <h1>Job Marketplace</h1>
    </header>
    <main>
        <h1>User Profile</h1>
        <?php if (isset($error)): ?>
            <p class="error"><?= $error ?></p>
        <?php else: ?>
            <div class="user-profile">
                <h2><?= htmlspecialchars($users['full_name']) ?></h2>
                <p><strong>Email:</strong> <?= htmlspecialchars($users['email']) ?></p>
                <p><strong>Date of Birth:</strong> <?= htmlspecialchars($users['dob']) ?></p>
                <p><strong>Gender:</strong> <?= htmlspecialchars($users['gender']) ?></p>
                <p><strong>Address:</strong> <?= htmlspecialchars($users['address']) ?></p>
                <p><strong>Account Type:</strong> <?= ucfirst(htmlspecialchars($users['user_type'])) ?></p>
                <p><strong>Account Created:</strong> <?= $users['created_at'] ?></p>
            </div>
        <?php endif; ?>
    </main>
    <footer>
        &copy; 2024 Job Marketplace
    </footer>
</body>
</html>
