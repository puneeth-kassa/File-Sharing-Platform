<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Files - File Sharing Platform</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    <header>
        <h1>File Sharing Platform</h1>
        <nav>
            <ul>
                <li><a href="index2.php">Home</a></li>
                <li><a href="myfilespage.php">My Files</a></li>
                <li><a href="sharedwithme.php">Shared with Me</a></li>
                <li><a href="index.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="files">
            <h2>My Files</h2>
            <ul id="fileList">
                <?php
                // Connect to the database
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "files";

                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Query to fetch filenames from the database
                $sql = "SELECT filename FROM files";
                $result = $conn->query($sql);

                // Display filenames
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<li>{$row['filename']}</li>";
                    }
                } else {
                    echo "No files found.";
                }

                // Close the connection
                $conn->close();
                ?>
            </ul>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 File Sharing Platform. All rights reserved.</p>
    </footer>
</body>
</html>
