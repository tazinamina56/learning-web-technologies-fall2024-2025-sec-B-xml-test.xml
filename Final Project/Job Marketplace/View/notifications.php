<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications Posting</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>
<body>
    <header>
        <h1>Job Marketplace</h1>
    </header>
    <main>
        <h1 id="head">Notifications Posting</h1>
        <form method="POST" action="notifications.php">
            <label for="message">Write a Message:</label>
            <textarea id="message" name="message" rows="4" placeholder="Type your message here..."></textarea>
            <button type="button" onclick="ajax()">Post via AJAX</button>
        </form>
        <div class="messages">
            <h2>Posted Messages</h2>
            <div id="notification-list">
                <?php require_once('../Controller/notifications_logic.php'); ?>
            </div>
        </div>
    </main>
    <script>
        function ajax() {
            const message = document.getElementById('message').value.trim();

            if (!message) {
                alert("Message cannot be empty!");
                return;
            }
            if (message.length > 500) {
                alert("Message is too long. Please limit your message to 500 characters.");
            }

            const json = { message: message };
            const data = JSON.stringify(json);

            const xhttp = new XMLHttpRequest();
            xhttp.open('POST', '../Controller/notifications_logic.php', true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send('mydata=' + data);

            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const response = JSON.parse(this.responseText);
                    const notificationList = document.getElementById('notification-list');
                    const newMessage = document.createElement('div');
                    newMessage.className = 'message';
                    newMessage.innerText = response.message;
                    notificationList.prepend(newMessage);
                }
            };
        }
    </script>
    <footer>
        &copy; 2024 Job Marketplace
    </footer>
</body>
</html>
