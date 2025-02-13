<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
    // Database connection (replace with your database credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "files";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // File upload variables
    $file = $_FILES['fileToUpload']['name'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];

    

    // Insert file details into database
    $sql = "INSERT INTO files (filename) VALUES ('$file')";
    if ($conn->query($sql) === TRUE) {
        echo "File uploaded successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
