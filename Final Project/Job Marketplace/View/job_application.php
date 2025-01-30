<?php require_once('../Controller/job_posting_logic.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles.css">
</head>
<body>
    <header>
        <h1>Job Marketplace</h1>
    </header>
    <main>
        <h1  id="head">Apply for a Job</h1>
        <form method="POST" action="../Controller/job_application_logic.php" enctype="multipart/form-data">
            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="full_name" placeholder="Enter your full name" onblur="f1()" onkeyup="validateLetter()"/>
            <p id="msg1"></p>

            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email address" onblur="f2()"/>
            <p id="msg2"></p>

            <label for="resume">Upload Your Resume:</label>
            <input type="file" id="resume" name="resume" accept=".pdf, .doc, .docx" >
            
            <button type="submit" name="submit" onclick="f3()">Submit Application</button>
            <button type="button" onclick="ajax()">Post via AJAX</button>
        </form>
        <script>
            function validateLetter() {
                const textInput = document.getElementById('full_name').value;
                const replacedInput = textInput.replace(/[^A-Za-z\s]/g, "");
                if (textInput != replacedInput) {
                    alert("Error message: Name must contain only alphabets and spaces!");
                }
                document.getElementById('full_name').value = replacedInput;
            }

            function f1() {
                const full_name = document.getElementById('full_name').value;
                if (full_name == "") {
                    document.getElementById('msg1').innerHTML = "Full name is required!";
                } else {
                    document.getElementById('msg1').innerHTML = "";
                }
                document.getElementById('msg1').style.color = "red";
            }

            function f2() {
                const email = document.getElementById('email').value;
                if (email == "") {
                    document.getElementById('msg2').innerHTML = "Email is required!";
                } else {
                    document.getElementById('msg2').innerHTML = "";
                }
                document.getElementById('msg2').style.color = "red";
            }

            function f3() {
                f1();
                f2();
            }

            function ajax() {
                const full_name = document.getElementById('full_name').value;
                const email = document.getElementById('email').value;
                const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
                
                if (full_name == "" || email == "") {
                    alert("All fields need to be filled up");
                } 
                
                if (!emailRegex.test(email)) {
                     alert("Email is invalid. Please enter a valid email address.");
                } 

                const json = { full_name: full_name, email: email};
                const data = JSON.stringify(json);

                const xhttp = new XMLHttpRequest();
                xhttp.open('POST', '../Controller/job_application_logic.php', true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send('mydata='+data);

                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        const user = JSON.parse(this.responseText);
                        document.getElementById('head').innerHTML = `Full Name: ${user.full_name}, Email: ${user.email}`;
                    }
                }
            }
        </script>
    </main>
</body>
</html>
