<?php
require_once('../Model/db.php');
require_once('../Controller/upload_file.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['mydata'])) {
    $jsonData = $_POST['mydata'];
    $user = json_decode($jsonData, true);
    echo json_encode($user);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    
    $name = $conn->real_escape_string($_POST['full_name']);
    $email = $conn->real_escape_string($_POST['email']);

     if($name==null || $email==null){
        sleep(3);
        header('location: ../View/job_application.php');
        exit();
    }
    
      if (!empty($name) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
        
        if (isset($_FILES['resume'])) {
            $allowedTypes = ['pdf', 'doc', 'docx']; 
            $uploadResult = uploadFile($_FILES['resume'], $allowedTypes);

            if(!$uploadResult['success']){
                sleep(3);
                header('location: ../View/job_application.php');
                exit();
            }

            else if ($uploadResult['success']) {
                $resumePath = $uploadResult['path'];

                $query = "INSERT INTO candidates (full_name, email, resume_link) VALUES ('$name', '$email', '$resumePath')";

                if ($conn->query($query)) {
                    echo "<p>Your application has been submitted successfully!</p>";
                } else {
                    echo "<p>There was an error submitting your application. Please try again later.</p>";
                }
            } else {
               
                echo "<p>Error uploading resume: " . implode(", ", $uploadResult['errors']) . "</p>";
            }
        } else {
            echo "<p>Please upload your resume.</p>";
        }
    } else {
        echo "<p>Please fill in all fields correctly.</p>";
    }
}
?>
