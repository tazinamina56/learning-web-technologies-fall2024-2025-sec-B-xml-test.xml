<?php require_once '../Controller/jobs_logic.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Management</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>
<body>
    <header>
        <h1>Job Marketplace</h1>
    </header>
    <main>
        <h1>Job Management</h1>
        <ul class="job-list">
            <?php while ($job = $result->fetch_assoc()): ?>
                <li class="job-item">
                    <h2><?= htmlspecialchars($job['title']) ?></h2>
                    <p>Company: <?= htmlspecialchars($job['company']) ?></p>
                    <p>Salary: $<?= htmlspecialchars($job['salary']) ?></p>
                    <form method="POST" action="../Controller/jobs_logic.php">
                        <input type="hidden" name="job_id" value="<?= $job['id'] ?>">
                        <button type="submit" name="action" value="approved">Approve</button>
                        <button type="submit" name="action" value="rejected">Reject</button>
                    </form>
                </li>
            <?php endwhile; ?>
        </ul>
    </main>
    <footer>
        &copy; 2024 Job Marketplace
    </footer>
</body>
</html>
