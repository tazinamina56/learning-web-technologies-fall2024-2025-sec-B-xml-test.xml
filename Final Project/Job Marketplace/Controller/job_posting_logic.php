<?php
require_once('../Model/db.php');

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['mydata'])) {
    $jsonData = $_POST['mydata'];
    $user = json_decode($jsonData, true);
    echo json_encode($user);
    exit();
}


if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $title = $conn->real_escape_string($_POST['title']);
    $company = $conn->real_escape_string($_POST['company']);
    $salary = $conn->real_escape_string($_POST['salary']);

    if($title==null || $company==null || $salary==null){
        sleep(3);
        header('location: ../View/job_posting.php');
        exit();
    }

    else{
    $query = "INSERT INTO jobs (title, company, salary, status) VALUES ('$title', '$company', '$salary', 'pending')";

    if ($conn->query($query)) {
        echo "Job posted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
    }
    
}
?>
