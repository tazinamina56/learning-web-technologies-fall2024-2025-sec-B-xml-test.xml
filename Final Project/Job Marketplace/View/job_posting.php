<?php require_once('../Controller/job_posting_logic.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post a Job</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>
<body>
    <header>
        <h1>Job Marketplace</h1>
    </header>
    <main>
        <h1 id='head'>Post a Job</h1>
        <form method="POST" action="../Controller/job_posting_logic.php">
            <label for="title">Job Title:</label>
            <input type="text" id="title" name="title" value="" onblur="f1()" onkeyup="validateLetter()" />
            <p id="msg1"></p>

            <label for="company">Company Name:</label>
            <input type="text" id="company" name="company" onblur="f2()" />
            <p id="msg2"></p>

            <label for="salary">Salary:</label>
            <input type="number" id="salary" name="salary" onblur="f3()" />
            <p id="msg3"></p>

            <button type="submit" name="submit" onclick="f4()">Post Job</button>
            <button type="button" onclick="ajax()">Post via AJAX</button>
        </form>

        <script>
            function validateLetter() {
                var textInput = document.getElementById('title').value;
                var replacedInput = textInput.replace(/[^A-Za-z\s]/g, "");
                if (textInput != replacedInput) {
                    alert("Error message: Title must contain only alphabets and spaces!");
                }
                document.getElementById('title').value = replacedInput;
            }

            function f1() {
                const title = document.getElementById('title').value;
                if (title == "") {
                    document.getElementById('msg1').innerHTML = "Title is required!";
                } else {
                    document.getElementById('msg1').innerHTML = "";
                }
                document.getElementById('msg1').style.color = "red";
            }

            function f2() {
                const company = document.getElementById('company').value;
                if (company == "") {
                    document.getElementById('msg2').innerHTML = "Company name is required!";
                } else {
                    document.getElementById('msg2').innerHTML = "";
                }
                document.getElementById('msg2').style.color = "red";
            }

            function f3() {
                const salary = document.getElementById('salary').value;
                if (salary == "") {
                    document.getElementById('msg3').innerHTML = "Salary amount is required!";
                } else {
                    document.getElementById('msg3').innerHTML = "";
                }
                document.getElementById('msg3').style.color = "red";
            }

            function f4() {
                f1();
                f2();
                f3();
            }

            function ajax() {
                const title = document.getElementById('title').value;
                const company = document.getElementById('company').value;
                const salary = document.getElementById('salary').value;

                if (title == "" || company == "" || salary == "") {
                    alert("All fields need to be filled up");
                } 
                const json = { title: title, company: company, salary: salary };
                const data = JSON.stringify(json);

                const xhttp = new XMLHttpRequest();
                xhttp.open('POST', '../Controller/job_posting_logic.php', true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send('mydata='+data);

                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        const user = JSON.parse(this.responseText);
                        document.getElementById('head').innerHTML = `Title: ${user.title}, Company: ${user.company}, Salary: ${user.salary}`;
                    }
                }
            }
        </script>
    </main>
</body>
</html>
