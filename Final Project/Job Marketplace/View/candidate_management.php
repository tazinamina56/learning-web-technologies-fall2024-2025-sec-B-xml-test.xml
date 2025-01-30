<?php require_once '../Controller/candidates_logic.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles.css">
    <title>Candidate Management</title>
</head>
<body>
    <header>
        <h1>Job Marketplace</h1>
    </header>
    <main>
        <h1 class='done'>Candidate Management</h1>
        <?php while ($candidate = $result->fetch_assoc()): ?>
            <div class="candidate">
                <h2><?= htmlspecialchars($candidate['full_name']) ?></h2>
                <p>Email: <?= htmlspecialchars($candidate['email']) ?></p>
                <p>Resume: <a href="<?= htmlspecialchars($candidate['resume_link']) ?>" target="_blank">Download</a></p>
                <div class="actions">
                    <form method="POST" style="display: inline;">
                        <input type="hidden" name="candidate_id" value="<?= $candidate['id'] ?>">
                      
                        <button type="submit" name="action" value="accept" class="shortlist">Accept</button>
                        
                        <button type="submit" name="action" value="reject" class="reject">Reject</button>
                    </form>
                </div>
            </div>
        <?php endwhile; ?>
    </main>   
    <footer>
        &copy; 2024 Job Marketplace
    </footer>
</body>
</html>
