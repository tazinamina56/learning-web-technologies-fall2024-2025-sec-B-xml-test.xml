<?php require_once '../Controller/users_logic.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>
<body>
    <header>
        <h1>Job Marketplace</h1>
    </header>
    <main>
        <h1>User Management</h1>
        <ul class="user-list">
            <?php while ($user = $result->fetch_assoc()): ?>
                <li class="user-item">
                    <h2><?= $user['full_name'] ?></h2>
                    <p>Email: <?= $user['email'] ?></p>
                    <p>Type: <?= ucfirst($user['user_type']) ?></p>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                        <button type="submit">Remove User</button>
                    </form>
                    <a href="view_profile.php?id=<?= $user['id'] ?>" class="view-profile-button">View Profile</a>
                </li>
            <?php endwhile; ?>
        </ul>
    </main>
    <footer>
        &copy; 2024 Job Marketplace
    </footer>
</body>
</html>
