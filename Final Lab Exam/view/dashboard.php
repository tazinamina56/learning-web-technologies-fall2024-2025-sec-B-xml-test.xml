<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>
<body>
    <header>
        <h1>online shop management</h1>
    </header>
    <main>
        <!-- Display the user's full name -->
        <h1>Welcome, <?= isset($users['full_name']) ? htmlspecialchars($users['full_name']) : 'Amina Tazin' ?>!</h1>
        <p>Select an option from the menu below to manage your account or explore features.</p>
        
        <div class="menu">
            <a href="../View/employee_search.php" class="btn">Search Employee</a> </br>
            <a href="../View/employee_update.php" class="btn">Update Employee</a> </br>
            <a href="../View/employee_delete.php" class="btn">Delete Employee</a> </br>
            <a href="../View/user_registration.php" class="btn">User Registration</a> </br>     
            <a href="../Controller/logout.php" class="btn btn-danger">Logout</a> </br>
        </div>
    </main>
    
</body>
</html>
