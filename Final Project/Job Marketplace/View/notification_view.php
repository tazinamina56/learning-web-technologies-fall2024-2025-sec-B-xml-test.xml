<?php require_once '../Controller/notifications_view_logic.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Notifications</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>
<body>
    <header>
        <h1>Job Marketplace</h1>
    </header>
    <main>
        <h1>Notifications</h1>
        <div class="notifications-list">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($notification = $result->fetch_assoc()): ?>
                    <div class="notification-item">
                        <p><?= $notification['message'] ?></p>
                        <span class="timestamp"><?= date('F j, Y, g:i a', strtotime($notification['created_at'])) ?></span>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No notifications available.</p>
            <?php endif; ?>
        </div>
    </main>
    <footer>
        &copy; 2024 Job Marketplace
    </footer>
</body>
</html>
