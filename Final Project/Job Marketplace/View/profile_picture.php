<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Profile Picture</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>
<body>
    <header>
        <h1>Job Marketplace</h1>
    </header>
    <main>
        <h1>Change Profile Picture</h1>
        <div class="current-picture">
            <h4>Current Profile Picture:</h4>
            <img id="current-picture" src="<?= $profile_picture ?>?t=<?= time() ?>" alt="Profile Picture">          
        </div>
        <form id="profile-picture-form" enctype="multipart/form-data">
            <h4>Upload a new profile picture:</h4>
            <div class="upload-section">
                <input type="file" id="profile-pic" name="profile_pic" accept="image/*" required>
            </div>
            <div style="margin-top: 20px;">
                <h4>Preview:</h4>
                <img id="preview-image" style="max-width: 100%; max-height: 300px; display: none; object-fit: contain; border: 2px dashed #ddd;">
            </div>
            <button type="button" id="upload-btn">Upload</button>
        </form>
        <p id="upload-status" style="color: green; display: none;">Profile picture updated successfully!</p>
    </main>
    <script>
        document.getElementById('profile-pic').addEventListener('change', function(event) {
            const preview = document.getElementById('preview-image');
            const file = event.target.files[0];
            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';
            }
        });

        document.getElementById('upload-btn').addEventListener('click', function() {
            const formData = new FormData(document.getElementById('profile-picture-form'));
            const xhttp = new XMLHttpRequest();

            xhttp.open('POST', '../Controller/profile_picture_logic.php', true);
            xhttp.onload = function() {
                if (this.status === 200) {
                    const response = JSON.parse(this.responseText);
                    if (response.success) {
                        document.getElementById('current-picture').src = response.new_picture_url + '?t=' + new Date().getTime();
                        document.getElementById('upload-status').style.display = 'block';
                    } else {
                        alert('Error: ' + response.error);
                    }
                }
            };
            xhttp.send(formData);
        });
    </script>
    <footer>
        &copy; 2024 Job Marketplace
    </footer>
</body>
</html>
