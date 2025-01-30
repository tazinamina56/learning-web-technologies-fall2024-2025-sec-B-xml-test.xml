<?php
function uploadFile($file, $allowedTypes, $uploadDir = "../uploads/")
{
    $errors = [];
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }
    $fileName = basename($file['name']);
    $fileTmp = $file['tmp_name'];
    $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $targetFile = $uploadDir . uniqid() . '.' . $fileType;

    if (!in_array($fileType, $allowedTypes)) {
        $errors[] = "Invalid file type. Allowed types: " . implode(", ", $allowedTypes);
    }
    if ($file['error'] !== 0) {
        $errors[] = "An error occurred while uploading the file.";
    }
    if (empty($errors)) {
        if (move_uploaded_file($fileTmp, $targetFile)) {
            return [
                "success" => true,
                "path" => $targetFile,
                "message" => "File uploaded successfully."
            ];
        } else {
            $errors[] = "Failed to move the uploaded file.";
        }
    }
    return [
        "success" => false,
        "errors" => $errors
    ];
}
?>
