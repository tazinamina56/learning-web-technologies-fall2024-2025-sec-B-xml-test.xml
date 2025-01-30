<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>
<body>
    <header>
        <h1>About Us</h1>
    </header>
    <main>
        <p><b>
            Welcome to Job Marketplace, a leading online platform designed to connect talent with opportunity. Our mission is to create a seamless, efficient, and transparent environment for employers and job seekers to collaborate, find the perfect job, and hire the best candidates.
        </b></p>
        <p><b>
            At Job Marketplace, we leverage cutting-edge technology and innovative tools to simplify the hiring process. Whether you're looking for your next career move or searching for the ideal candidate, we provide all the necessary features to make your experience smooth and successful.
            </b></p>
        <p><b>
            We prioritize security, transparency, and user satisfaction, ensuring a trustworthy and efficient marketplace for all. Thank you for choosing Job Marketplace as your partner in the journey toward professional growth and success!
            </b></p>
    </main>
    <p id="demo"></p>
    <button type="button" onclick="ajax()">Show Via Ajax</button>
<script>
function ajax() {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("demo").innerHTML = this.responseText;
  }
  xhttp.open("GET", "../assets/ajax_about us.txt");
  xhttp.send();
}
</script>
    <footer>
        &copy; 2024 Job Marketplace
    </footer>
</body>
</html>