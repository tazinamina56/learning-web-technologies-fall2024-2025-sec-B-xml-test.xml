<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Search</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>
<body>
    <header>
        <h1>Job Marketplace</h1>
    </header>
    <main>
        <h1 id="head">Search for Jobs</h1>
        <form method="POST" action="job_search.php">
            <label for="search">Search:</label>
            <input type="text" id="search" name="search" placeholder="Enter job title or company name" onkeyup="ajax()"/>
            <button type="submit" id="submit">Search</button>
        </form>
       
        <script>
           function ajax() {
                const search = document.getElementById('search').value;
                const json = { search: search};
                const data = JSON.stringify(json);

                const xhttp = new XMLHttpRequest();
                xhttp.open('POST', '../Controller/job_search_logic.php', true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send('mydata='+data);

                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        const user = JSON.parse(this.responseText);
                        document.getElementById('head').innerHTML = `You searched: ${user.search}`;
                    }
                }
            }
        </script>
        
        <div class="results">
            <?php require_once('../Controller/job_search_logic.php');?>
        </div>
    </main>
</body>
</html>
